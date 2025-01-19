<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Perkuliahan</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Hapus Perkuliahan</h1>
        <a href="list_perkuliahan.php">Kembali ke Daftar Perkuliahan</a>
    </header>

    <?php
    // Koneksi ke database
    include '../include/config.php';

    // Cek apakah ada parameter 'id' yang dikirimkan melalui URL
    if (isset($_GET['nim'])) {
        $id = $_GET['nim'];

        // Query untuk menghapus data perkuliahan berdasarkan ID
        $query_delete = "DELETE FROM perkuliahan WHERE nim = '$nim'";

        // Eksekusi query
        if (mysqli_query($conn, $query_delete)) {
            echo "<p>Perkuliahan dengan NIM $nim berhasil dihapus!</p>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p>NIM perkuliahan tidak ditemukan!</p>";
    }
    ?>
</body>
</html>
