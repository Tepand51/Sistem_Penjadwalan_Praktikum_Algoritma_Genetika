<?php
session_start();
$nim = $_SESSION['nim'];
$role = $_SESSION['role'];

require_once 'db_connect.php';

//Function to add Data ngajar to database hasil_ag_asisten
function addDataAG($idPraktikum,$nim,$binaryArray) {
    global $conn;
    $binaryString = implode('', $binaryArray);

    // Query to get the name of the praktikum based on id_praktikum
    $praktikum_query = "SELECT nama_prak FROM praktikum WHERE id_praktikum = ?";
    $praktikum_stmt = $conn->prepare($praktikum_query);
    $praktikum_stmt->bind_param("s", $idPraktikum);
    $praktikum_stmt->execute();
    $praktikum_result = $praktikum_stmt->get_result();
    $praktikum_row = $praktikum_result->fetch_assoc();
    $nama_prak = $praktikum_row['nama_prak'];

    // Query to check if the combination of nim and nama_prak already exists in the hasil_ag_asisten table
    $nim_check_query = "SELECT nim FROM hasil_ag_asisten WHERE nim = ?";
    $nim_check_stmt = $conn->prepare($nim_check_query);
    $nim_check_stmt->bind_param("s", $nim);
    $nim_check_stmt->execute();
    $nim_check_result = $nim_check_stmt->get_result();
    $nim_check_row = $nim_check_result->fetch_assoc();

    if ($nim_check_result->num_rows > 0) {
        // If the combination of nim and nama_prak exists, update the row
        $update_query = "UPDATE hasil_ag_asisten SET nama_prak = ?, jadwal_ngajar = ? WHERE nim = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("sss", $nama_prak, $binaryString, $nim );
        $update_stmt->execute();
        echo "Data Updated Successfully!";
    } else {
        // If the combination of nim and nama_prak doesn't exist, insert a new row
        $insert_query = "INSERT INTO hasil_ag_asisten (nim, nama_prak, jadwal_ngajar) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("sss", $nim, $nama_prak, $binaryString);
        $insert_stmt->execute();
        echo 'Data inserted successfully!';
    }
}

//Function to add Data ngajar to database jadwal_ngajar
function addDataNgajar($nim,$nama,$binaryArray,$idPraktikum){
    global $conn;
    foreach ($binaryArray as $key => $value) {
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
            $sql = "INSERT INTO jadwal_ngajar (nim, name, hari, shift, id_praktikum) 
            SELECT '$nim', '$nama', '$hari', $shift, $idPraktikum";

            // Execute the SQL statement
            if (mysqli_query($conn, $sql)) {
                echo "<br>Data inserted successfully for value $key\n";
            } else {
                echo "Error inserting data for value $key: " . mysqli_error($conn) . "\n";
            }
        }
    }
}

// Retrieve data ffrom AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPraktikum = $_POST['idPraktikum'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $binaryArray = $_POST['binaryArray'];

    // Query untuk mendapatkan role berdasarkan nim
    $role_query = "SELECT role FROM users WHERE nim = ? AND role = 'asisten'";
    $role_stmt = $conn->prepare($role_query);
    $role_stmt->bind_param("s", $nim);
    $role_stmt->execute();
    $role_result = $role_stmt->get_result();
    $role_row = $role_result->fetch_assoc();

    if (!$role_row) {
        // Jika role tidak ditemukan atau bukan 'asisten', tampilkan pesan alert dan kembali ke halaman "tambah_ngajar.php"
        echo 'Nama dan NIM tersebut tidak ditemukan atau bukan merupakan asisten.';
    } else {
        addDataAG($idPraktikum,$nim,$binaryArray);
        addDataNgajar($nim,$nama,$binaryArray,$idPraktikum);
    }
}


?>