<?php
session_start();
$nim = $_SESSION['nim'];

require_once '../php/db_connect.php';

//Function to add Data ngajar to database
function addDataToDatabse($combinedBinaryArray, $nim) {
    global $conn;
    // Prepare the SQL query with a parameterized statement
    $sql = "UPDATE hasil_ag_asistent SET jadwal_ngajar = ? WHERE nim = ?";
    $stmt = $conn->prepare($sql);

    $binaryString = implode("", $combinedBinaryArray); // Convert the binary array to a string
    $stmt->bind_param("ss", $binaryString, $nim); // Assuming 'nim' is of string type

    // Execute the statement
    if ($stmt->execute()) {
        // The string representation of the binary array was successfully added to the column
        echo "String added to the column.";
    } else {
        // An error occurred
        echo "Error adding string to the column: " . $stmt->error;
    }

}

// Retrieve the combinedBinaryArray sent from the JavaScript
$combinedBinaryArray = $_POST['combinedBinaryArray'];

addDataToDatabse($combinedBinaryArray,$nim);


?>