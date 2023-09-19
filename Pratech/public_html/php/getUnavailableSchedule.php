<?php
session_start();
$nim = $_SESSION['nim'];

// Include the database connection file
require_once 'db_connect.php';

//Function to search data jadwal with the same nim
function getNamaPrak($nim) {
    global $conn;
    // Prepare the SQL query with a parameterized statement
    $sql = "SELECT nama_prak, jadwal_kuliah FROM hasil_ag_asisten WHERE nim = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nim); // Assuming 'nim' is of string type

    // Execute the prepared statement
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the first row
        $row = $result->fetch_assoc();

        $data = array(
            'nama_prak' => $row['nama_prak'],
            'jadwal_kuliah' => $row['jadwal_kuliah']
        );

        return $data;
    }

    return null; // Return null if no matching data is found
}


// Function to get the existing data ngajar in database
function getDataNgajar($nama_prak) {
    global $conn;

    // Prepare the SQL query with a parameterized statement
    $sql = "SELECT jadwal_ngajar FROM hasil_ag_asisten WHERE nama_prak = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nama_prak);

    // Execute the prepared statement
    $stmt->execute();

    $result = $stmt->get_result();
    $jadwal_ngajar_data = array();

    if ($result->num_rows > 0) {
        // Fetch all rows
        while ($row = $result->fetch_assoc()) {
            if (!empty($row['jadwal_ngajar'])) {
                $jadwal_ngajar_data[] = $row['jadwal_ngajar'];
            }
        }
    }

    $data = array(
        'nama_prak' => $nama_prak,
        'jadwal_ngajar' => $jadwal_ngajar_data
    );

    //Convert Data to be usabble
    $converted_data=[];

    // Access the 'jadwal_ngajar' data from the returned array
    $jadwal_ngajar_data = $data['jadwal_ngajar'];

    // Display the 'jadwal_kuliah' values
    foreach ($jadwal_ngajar_data as $jadwal_ngajar) {
        $data = str_split($jadwal_ngajar);
        $converted_data[] = $data;
    }

    // Re-index the array numerically
    $jadwalNgajar = $converted_data;
    return $jadwalNgajar;
}

//Count number of 1's in each index
function countOnesByIndex($jadwal){
    $countByIndex = array();
    foreach ($jadwal as $array) {
        foreach ($array as $index => $value) {
            if ($value == 1) {
                if (!isset($countByIndex[$index])) {
                    $countByIndex[$index] = 1;
                } else {
                    $countByIndex[$index]++;
                }
            }
        }
    }
    ksort($countByIndex);
    return $countByIndex;
}

//Function to check existing data ngajar
function convertDataNgajar($countOnes) {
    $converted = array();
        
    // Create a 24-bit array
    for ($i = 0; $i < 24; $i++) {
        // Check if the value in $inputArray is greater than or equal to 4
        if (isset($countOnes[$i]) && $countOnes[$i] >= 4) {
            $converted[$i] = 1;
        } else {
            $converted[$i] = 0;
        }
    }
    return $converted;
}

//---------------------------------------RUNDOWN UNAVAILABLE SCHEDULE-----------------------------------------
//Step 1 : Get nama prak which connected to nim
$dataPrak = getNamaPrak($nim);
    if ($dataPrak) {
        $nama_prak = $dataPrak['nama_prak'];
        $jadwal_kuliah = $dataPrak['jadwal_kuliah'];
    } else {
        $jsonData = "NAMA PRAK NOT FOUND";
        echo $jsonData;
    }

//Step 2 : get existing schedule
$jadwalNgajar = getDataNgajar($nama_prak);

if(!empty($jadwalNgajar)){
    //Step 3 : Count the number of 1 in each index
    $countOnes = countOnesByIndex($jadwalNgajar);

    //Step 4 : Filter out variable into binary value
    $converted = convertDataNgajar($countOnes);

    //Transfer Data
        // Create an associative array with the variables
            $data=array(
                'completeArray'=>$converted,
            );

        // Convert the array to JSON
            $jsonData = json_encode($data);
            

        // Set the response headers to indicate JSON
            header('Content-Type: application/json');

    }else{
        $jsonData = json_encode(array('completeArray' => []));
    }
// Last Step : Transfer Data to web page
echo $jsonData;

?>