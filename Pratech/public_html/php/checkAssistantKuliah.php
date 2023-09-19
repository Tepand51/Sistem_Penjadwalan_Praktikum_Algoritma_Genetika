<?php
  session_start();
  // Include the database connection file
require_once 'db_connect.php';

// Assume you have already started the session and $nim is set
$nim = $_SESSION['nim'];

// Function to get the schedule data for a given nim from hasil_ag table
function getScheduleData($nim, $conn)
{
    $jadwalKul = "";
    $scheduleData = array();

    // Prepare the SQL statement to fetch the schedule data and tipe_prak
    $sql = "SELECT jadwal_kuliah FROM hasil_ag_asisten WHERE nim = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nim);
    $stmt->execute();

    // Bind the result to variables
    $stmt->bind_result($jadwalKul);

    // Fetch the data
    if ($stmt->fetch()) {
        // Check if the column jadwal_prak is not empty
        if (!empty($jadwalKul)) {
            // If data is found and not empty, split the binary string and store it in $scheduleData array
            $scheduleData = str_split($jadwalKul);
        }
    }

    // Close the statement
    $stmt->close();

    return $scheduleData;
}

function scheduleKuliah($scheduleData){
    $Kuliah = array();
    // Iterate through the original binary array
    foreach ($scheduleData as $bit) {
        // Repeat each value three times and add it to the new array
        $Kuliah[] = $bit;
        $Kuliah[] = $bit;
        $Kuliah[] = $bit;
    }
    return $Kuliah;
}


// Check if the session variable $nim is set
if (isset($nim)) {
    // Get the schedule data for the given $nim
    $scheduleData = getScheduleData($nim, $conn);
    
    //Call function to convert 24 bits into 72 bits
    $scheduleKuliah = scheduleKuliah($scheduleData);

    // Send the schedule data as a JSON response
    echo json_encode(['scheduleData' => $scheduleKuliah]);
} else {
    // If $nim is not set, send an empty response
    echo json_encode(['scheduleData' => []]);
}
?>
