<?php
session_start();
$nim= $_SESSION['nim'];
$name= $_SESSION['name'];

// Include the necessary files
include 'db_connect.php';

function putDataInAG($nim,$input){
    global $conn;

    // Check if the table already has a row for the given 'nim'
    $checkQuery = "SELECT COUNT(*) as count FROM hasil_ag_asisten WHERE nim = '$nim'";
    $result = $conn->query($checkQuery);
    $row = $result->fetch_assoc();
    $count = $row['count'];

    //CHange the structure of the variable into string
    $binaryArray = '';
    for ($i = 0; $i <= 23; $i++) {
        if (in_array($i, $input)) {
            $binaryArray .= '1';
        } else {
            $binaryArray .= '0';
        }
    }

    if ($count > 0) {
        // Update the existing row
        $query = "UPDATE hasil_ag_asisten
                INNER JOIN users ON hasil_ag_asisten.nim = users.nim
                SET hasil_ag_asisten.jadwal_ngajar = '$binaryArray'
                WHERE users.nim = '$nim'";
    } else {
        //If no data found
        echo "No Data Was found";
    }

    // Execute the query using the database connection
    if ($conn->query($query) === TRUE) {
        echo "Binary line and nim stored in the database.";
        
    } else {
        echo "Error storing binary line and nim in the database: ";
    }
}

function putDataIndividual($nim,$name,$binaryArray){
    global $conn;
    $nama_prak = null;
    $sql = "SELECT nama_prak FROM hasil_ag_asisten WHERE nim = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nim);
    $stmt->execute();
    $stmt->bind_result($nama_prak);
    $stmt->fetch();
    $praktikum = $nama_prak;
    $stmt->close();
    
    // Iterate over the input and insert data into the table
    foreach ($binaryArray as $key => $value) {
        switch ($value) {
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
        $sql = "INSERT INTO jadwal_ngajar (nim, name, hari, shift, id_praktikum) 
                SELECT '$nim', '$name', '$hari', $shift, p.id_praktikum
                FROM praktikum p
                WHERE p.nama_prak = '$praktikum'";
        
        $sqlKuota = "UPDATE kuota_prak
                    SET kuota = kuota + 4
                    WHERE nama_prak = '$praktikum' AND hari = '$hari' AND shift = '$shift'";

        // Execute the SQL statement
        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully for value $value\n";
        } else {
            echo "Error inserting data for value $value: " . mysqli_error($conn) . "\n";
        }

        // Execute the SQL statement
        if (mysqli_query($conn, $sqlKuota)) {
            echo "Data inserted successfully for value $value\n";
        } else {
            echo "Error inserting data for value $value: " . mysqli_error($conn) . "\n";
        }
    }
}

// Check if the data is sent from the web page
if (isset($_POST['binary'])) {
    // Retrieve the binaryArray from the POST data
    $binaryArray = $_POST['binary'];

    //Call Function to put data binaryArray in Database hasil_AG
    putDataInAG($nim,$binaryArray);

    //Call Function to put data binaryArray individually in Database jadwal_prak
    putDataIndividual($nim,$name,$binaryArray);

    // Close the database connection
    $conn->close();

    // Send a response back to the JavaScript code if necessary
    $response = "Received binaryArray successfully.";
    echo $response;
} else {
    // Handle the case when binaryArray is not received
    $response = "Binary array not found in the request.";
    echo $response;
}


?>
