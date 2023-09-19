<?php
// Validasi input
$id_praktikum = $_POST['id_praktikum'] ?? '';
$nim = $_POST['nim'] ?? '';
$name = $_POST['name'] ?? '';
$hari = $_POST['hari'] ?? '';
$shift = $_POST['shift'] ?? '';

// Lakukan validasi lebih lanjut di sini sesuai kebutuhan, contoh:
// if (empty($id_praktikum) || empty($nim) || empty($name) || empty($hari) || empty($shift)) {
//     die("Harap lengkapi semua field.");
// }

// Koneksi ke database
include 'db_connect.php';

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan role berdasarkan nim
$role_query = "SELECT role FROM users WHERE nim = ?";
$role_stmt = $conn->prepare($role_query);
$role_stmt->bind_param("s", $nim);
$role_stmt->execute();
$role_result = $role_stmt->get_result();
$role_row = $role_result->fetch_assoc();

if (!$role_row || $role_row['role'] !== 'praktikan') {
    // Jika role tidak ditemukan atau bukan 'asisten', tampilkan pesan alert dan kembali ke halaman "tambah_ngajar.php"
    echo '<script>alert("Nama dan NIM tersebut tidak ditemukan atau bukan merupakan praktikan."); window.location.href = "../html/admin/tambah_prak.php";</script>';
} else {
    // Menyiapkan statement SQL dengan parameter binding
    $sql = "INSERT INTO jadwal_prak (id_praktikum, nim, name, hari, shift) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error dalam persiapan statement: " . $conn->error);
    }

    // Binding parameter ke statement
    $stmt->bind_param("iisss", $id_praktikum, $nim, $name, $hari, $shift);

    // Eksekusi statement
    if ($stmt->execute()) {
        // Data berhasil disimpan, redirect ke halaman "adminpraktikan.php"
        header("Location: ../html/admin/adminpraktikan.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>
