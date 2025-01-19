<?php
// Koneksi ke database
include '../include/config.php';
// Cek apakah ada kode_matakuliah yang diterima
if ($_GET['kode_matakuliah']) {
    $kode_matakuliah = $_GET['kode_matakuliah'];
    // Query untuk menghapus mata kuliah berdasarkan kode_matakuliah
    $query = "DELETE FROM matakuliah WHERE kode_matakuliah = '$kode_matakuliah'";

    if (mysqli_query($conn, $query)) {
        // Setelah berhasil dihapus, redirect ke halaman daftar mata kuliah
        header("Location: list_matakuliah.php");
    } else {
        // Menampilkan pesan error jika gagal menghapus
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>
