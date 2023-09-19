<?php
// Mengambil data dari form
$nama_praktikum = $_POST['nama_praktikum'];
$hari = $_POST['hari'];
$shift = $_POST['shift'];
$kuota = $_POST['kuota'];

// Koneksi ke database
include 'db_connect.php';
// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menyimpan data ke database
$sql = "INSERT INTO kuota_prak (nama_prak, hari, shift, kuota) VALUES ('$nama_praktikum', '$hari', '$shift', '$kuota')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../html/admin/adminprak.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
