<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Perkuliahan</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Edit Perkuliahan</h1>
        <a href="list_perkuliahan.php">Kembali ke Daftar Perkuliahan</a>
    </header>

    <?php
    // Koneksi ke database
    include '../include/config.php';

    // Cek apakah ada parameter 'id' yang dikirimkan melalui URL
    if (isset($_GET['nim'])) {
        $nim = $_GET['nim'];

        // Ambil data perkuliahan berdasarkan ID
        $query = "SELECT * FROM perkuliahan WHERE nim = '$nim'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "<p>Data perkuliahan tidak ditemukan!</p>";
            exit;
        }
    } else {
        echo "<p>NIM perkuliahan tidak ditemukan!</p>";
        exit;
    }
    ?>

    <form action="edit_perkuliahan.php?id=<?php echo $id; ?>" method="post">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?php echo $row['nim']; ?>" required><br>

        <label for="kode_matakuliah">Kode Mata Kuliah:</label>
        <input type="text" id="kode_matakuliah" name="kode_matakuliah" value="<?php echo $row['kode_matakuliah']; ?>" required><br>

        <label for="nidn">NIDN Dosen:</label>
        <input type="text" id="nidn" name="nidn" value="<?php echo $row['nidn']; ?>" required><br>

        <label for="nilai">Nilai:</label>
        <input type="text" id="nilai" name="nilai" value="<?php echo $row['nilai']; ?>" required><br>

        <input type="submit" value="Update Perkuliahan">
    </form>

    <?php
    // Proses update data setelah form disubmit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nim = $_POST['nim'];
        $kode_matakuliah = $_POST['kode_matakuliah'];
        $nidn = $_POST['nidn'];
        $nilai = $_POST['nilai'];

        // Query untuk memperbarui data perkuliahan
        $query_update = "UPDATE perkuliahan 
                         SET nim = '$nim', kode_matakuliah = '$kode_matakuliah', nidn = '$nidn', nilai = '$nilai'
                         WHERE nim = '$nim'";

        if (mysqli_query($conn, $query_update)) {
            echo "<p>Data Perkuliahan berhasil diperbarui!</p>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>
</body>
</html>
