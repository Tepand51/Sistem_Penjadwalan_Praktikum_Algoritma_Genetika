<?php
session_start();
// Include the necessary files
include 'db_connect.php';

function putDataIndividual($nim,$name,$binaryArray){
    global $conn;

    // Iterate over the input and insert data into the table
    foreach ($binaryArray as $key => $value) {
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
                $hari = 'rabu';
                $shift = 1;
                break;
            case 9:
                $hari = 'rabu';
                $shift = 2;
                break;
            case 10:
                $hari = 'rabu';
                $shift = 3;
                break;
            case 11:
                $hari = 'rabu';
                $shift = 4;
                break;
            case 12:
                $hari = 'kamis';
                $shift = 1;
                break;
            case 13:
                $hari = 'kamis';
                $shift = 2;
                break;
            case 14:
                $hari = 'kamis';
                $shift = 3;
                break;
            case 15:
                $hari = 'kamis';
                $shift = 4;
                break;
            case 16:
                $hari = 'jumat';
                $shift = 1;
                break;
            case 17:
                $hari = 'jumat';
                $shift = 2;
                break;
            case 18:
                $hari = 'jumat';
                $shift = 3;
                break;
            case 19:
                $hari = 'jumat';
                $shift = 4;
                break;
            case 20:
                $hari = 'sabtu';
                $shift = 1;
                break;
            case 21:
                $hari = 'sabtu';
                $shift = 2;
                break;
            case 22:
                $hari = 'sabtu';
                $shift = 3;
                break;
            case 23:
                $hari = 'sabtu';
                $shift = 4;
                break;
            default:
                $hari = '';
                $shift = '';
                break;
        }
    
        $praktikum = $value;

        // // Prepare the SQL statement
        $sql = "INSERT INTO jadwal_prak (nim, name, hari, shift, id_praktikum) 
                SELECT '$nim', '$name', '$hari', $shift, p.id_praktikum
                FROM praktikum p
                WHERE p.nama_prak = '$praktikum'";

        Echo "Key : ".$key;
        Echo "<br>nim : ".$nim;
        Echo "<br>name : ".$name;
        Echo "<br>praktikum : ".$praktikum;
        Echo "<br>hari : ".$hari;
        Echo "<br>shift : ".$shift;
        echo "<br><br>";

        $result = mysqli_query($conn, $sql);
        //Execute the SQL statement
        if ($result) {
            echo "Data inserted successfully for key $key\n";
        } else {
            echo "Error inserting data for key $key: " . mysqli_error($conn) . "\n";
        }
    }
}

    // Input
    $nim= 11;
    $name= "WHY";
    $binaryArray = [
        18 => 'Pemrograman Berbasis Objek',
        20 => 'Elektronika Dasar'
    ];

    //Call Function to put data binaryArray individually in Database jadwal_prak
    putDataIndividual($nim,$name,$binaryArray);

    // Close the database connection
    $conn->close();

?>
