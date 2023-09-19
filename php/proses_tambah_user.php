<?php
// Mengambil data dari form
$name = $_POST['name'];
$nim = $_POST['nim'];
$role = strtolower($_POST['role']); // Mengubah peran menjadi huruf kecil

// Menentukan password berdasarkan role
if ($role == 'praktikan') {
    $password = $nim;
} elseif ($role == 'asisten') {
    $password = $nim;
} elseif ($role == 'admin') {
    $password = $nim . '99';
}

// Koneksi ke database
include 'db_connect.php';
// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menyimpan data ke database
$sql = "INSERT INTO users (name, nim, pass, role) VALUES ('$name', '$nim', '$password', '$role')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    // Lanjutkan dengan tindakan selanjutnya
    header("Location: ../html/admin/adminuser.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
