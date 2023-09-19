<?php
session_start();
$nim= $_SESSION['nim'];
$name= $_SESSION['name'];

function inputJadwal($nim,$jadwal,$category){
    global $conn;

    // Check if the table already has a row for the given 'nim'
    $checkQuery = "SELECT COUNT(*) as count FROM hasil_ag WHERE nim = '$nim'";
    $result = $conn->query($checkQuery);
    $row = $result->fetch_assoc();
    $count = $row['count'];

    if ($count > 0) {
        // Update the existing row
        $query = "UPDATE hasil_ag
                INNER JOIN users ON hasil_ag.nim = users.nim
                SET hasil_ag.jadwal_kuliah = '$jadwal', hasil_ag.tipe_prak = '$category'
                WHERE users.nim = '$nim'";
    } else {
        // Insert a new row
        $query = "INSERT INTO hasil_ag (nim, jadwal_kuliah, tipe_prak,jadwal_prak) VALUES ('$nim', '$jadwal', '$category','')";
    }

    // Execute the query using the database connection
    if ($conn->query($query) === TRUE) {
        echo "Binary line and nim stored in the database.";
    } else {
        echo "Error storing binary line and nim in the database: ";
    }
}

function inputJadwalIndividual($nim,$jadwal){
    global $conn;

    $jadwalArray = str_split($jadwal);

    foreach ($jadwalArray as $key => $value) {
        if ($value == 1){
            switch ($key) {
                case 0:
                    $hari = 'Senin';
                    $shift = 1;
                    break;
                case 1:
                    $hari = 'Senin';
                    $shift = 2;
                    break;
                case 2:
                    $hari = 'Senin';
                    $shift = 3;
                    break;
                case 3:
                    $hari = 'Senin';
                    $shift = 4;
                    break;
                case 4:
                    $hari = 'Selasa';
                    $shift = 1;
                    break;
                case 5:
                    $hari = 'Selasa';
                    $shift = 2;
                    break;
                case 6:
                    $hari = 'Selasa';
                    $shift = 3;
                    break;
                case 7:
                    $hari = 'Selasa';
                    $shift = 4;
                    break;
                case 8:
                    $hari = 'Rabu';
                    $shift = 1;
                    break;
                case 9:
                    $hari = 'Rabu';
                    $shift = 2;
                    break;
                case 10:
                    $hari = 'Rabu';
                    $shift = 3;
                    break;
                case 11:
                    $hari = 'Rabu';
                    $shift = 4;
                    break;
                case 12:
                    $hari = 'Kamis';
                    $shift = 1;
                    break;
                case 13:
                    $hari = 'Kamis';
                    $shift = 2;
                    break;
                case 14:
                    $hari = 'Kamis';
                    $shift = 3;
                    break;
                case 15:
                    $hari = 'Kamis';
                    $shift = 4;
                    break;
                case 16:
                    $hari = 'Jumat';
                    $shift = 1;
                    break;
                case 17:
                    $hari = 'Jumat';
                    $shift = 2;
                    break;
                case 18:
                    $hari = 'Jumat';
                    $shift = 3;
                    break;
                case 19:
                    $hari = 'Jumat';
                    $shift = 4;
                    break;
                case 20:
                    $hari = 'Sabtu';
                    $shift = 1;
                    break;
                case 21:
                    $hari = 'Sabtu';
                    $shift = 2;
                    break;
                case 22:
                    $hari = 'Sabtu';
                    $shift = 3;
                    break;
                case 23:
                    $hari = 'Sabtu';
                    $shift = 4;
                    break;
                default:
                    $hari = '';
                    $shift = '';
                    break;
            }

            // Prepare the SQL statement
            $sql = "INSERT INTO jadwal_mahasiswa (nim, hari, shift) SELECT '$nim', '$hari', $shift";

            // Execute the first SQL statement to insert data into jadwal_prak
            if (mysqli_query($conn, $sql)) {
                echo "Data inserted successfully.\n";
            } else {
                echo "Error inserting data: " . mysqli_error($conn) . "\n";
            }
        }
        
    }
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Include the necessary files
include 'db_connect.php';

// Check if the data is sent from the web page
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the binaryArray from the POST data
    $category = $_POST["category"];
    $jadwal = $_POST["jadwal"];

    //Call Function to put jadwal in Database hasil_AG
    inputJadwal($nim,$jadwal,$category);

    //Call function to put jadwal kuliah individually
    inputJadwalIndividual($nim,$jadwal);

    // Close the database connection
    $conn->close();

    // Send a response back to the JavaScript code if necessary
    $response = "Received binaryJadwal successfully.";
    echo $response;
} else {
    // Handle the case when binaryArray is not received
    $response = "Binary Jadwal not found in the request.";
    echo $response;
}

?>
