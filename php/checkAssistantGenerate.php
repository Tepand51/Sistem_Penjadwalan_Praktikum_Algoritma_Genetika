<?php
  session_start();
  // Include the database connection file
require_once 'db_connect.php';

// Assume you have already started the session and $nim is set
$nim = $_SESSION['nim'];

// Function to get the schedule data for a given nim from hasil_ag table
function getScheduleData($nim, $conn)
{
    $jadwalNgajar = "";
    $scheduleData = array();

    // Prepare the SQL statement to fetch the schedule data and tipe_prak
    $sql = "SELECT jadwal_ngajar FROM hasil_ag_asisten WHERE nim = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nim);
    $stmt->execute();

    // Bind the result to variables
    $stmt->bind_result($jadwalNgajar);

    // Fetch the data
    if ($stmt->fetch()) {
        // Check if the column jadwal_prak is not empty
        if (!empty($jadwalNgajar)) {
            // If data is found and not empty, split the binary string and store it in $scheduleData array
            $scheduleData = str_split($jadwalNgajar);
        }
    }

    // Close the statement
    $stmt->close();

    return $scheduleData;
}



// Check if the session variable $nim is set
if (isset($nim)) {
    // Get the schedule data for the given $nim
    $scheduleData = getScheduleData($nim, $conn);
    // echo "Jadwal Ngajar : <br>";
    // print_r($scheduleData);

    // Send the schedule data as a JSON response
    echo json_encode(['scheduleData' => $scheduleData]);
} else {
    // If $nim is not set, send an empty response
    echo json_encode(['scheduleData' => []]);
}
?>
