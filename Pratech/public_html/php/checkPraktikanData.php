<?php
  session_start();
  // Include the database connection file
require_once 'db_connect.php';

// Assume you have already started the session and $nim is set
$nim = $_SESSION['nim'];

// Function to get the schedule data for a given nim from hasil_ag table
function getScheduleData($nim, $conn)
{
    $jadwalPrak = "";
    $tipePrak = "";
    $scheduleData = array();

    // Prepare the SQL statement to fetch the schedule data and tipe_prak
    $sql = "SELECT jadwal_prak, tipe_prak FROM hasil_ag WHERE nim = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nim);
    $stmt->execute();

    // Bind the result to variables
    $stmt->bind_result($jadwalPrak, $tipePrak);

    // Fetch the data
    if ($stmt->fetch()) {
        // Check if the column jadwal_prak is not empty
        if (!empty($jadwalPrak)) {
            // If data is found and not empty, split the binary string and store it in $scheduleData array
            $scheduleData = str_split($jadwalPrak);
        }
    }

    // Close the statement
    $stmt->close();

    return ['scheduleData' => $scheduleData, 'tipePrak' => $tipePrak];
}

function getTipePrak($tipePrak,$conn){
    $namaPrakList = array();
    $namaPrak = "";
    // Prepare the SQL statement to fetch the nama_prak from praktikum table based on tipe_prak
    $sql = "SELECT nama_prak FROM praktikum WHERE tipe_prak = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $tipePrak);
    $stmt->execute();

    // Bind the result to a variable
    $stmt->bind_result($namaPrak);

    // Fetch the data and store it in $namaPrakList array
    while ($stmt->fetch()) {
        $namaPrakList[] = $namaPrak;
    }

    // Close the statement
    $stmt->close();

    return $namaPrakList;
}

// Function to combine $namaPrak and $scheduleData arrays
function combineData($namaPrak, $scheduleData)
{
    $combinedData = array();
    $index = 0;
    
    // Loop through $namaPrak and find corresponding keys with value 1 in $scheduleData
    foreach ($namaPrak as $key => $value) {
        while ($index < count($scheduleData)) {
            if ($scheduleData[$index] == 1) {
                $combinedData[$index] = $value;
                $index++;
                break;
            }
            $index++;
        }
    }
    
    return $combinedData;
}



// Check if the session variable $nim is set
if (isset($nim)) {
    // Get the schedule data for the given $nim
    $scheduleDataAndTipePrak = getScheduleData($nim, $conn);

    //Separate the data from the array
    $scheduleData = $scheduleDataAndTipePrak['scheduleData'];
    $tipePrak = $scheduleDataAndTipePrak['tipePrak'];

    $namaPrak = getTipePrak($tipePrak,$conn);
    
    $combinedData = combineData($namaPrak, $scheduleData);

    // Send the schedule data as a JSON response
    echo json_encode(['scheduleData' => $combinedData]);
} else {
    // If $nim is not set, send an empty response
    echo json_encode(['scheduleData' => []]);
}
?>
