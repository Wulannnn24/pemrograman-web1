<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Perkuliahan</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Tambah Perkuliahan</h1>
        <a href="list_matakuliah.php">Kembali ke Daftar Perkuliahan</a>
    </header>

    <form action="tambah_perkuliahan.php" method="post">
        <label for="nim">NIM:</label>
        <input type="text" nim="nim" name="nim" required><br>

        <label for="kode_matakuliah">Kode Mata Kuliah:</label>
        <input type="text" id="kode_matakuliah" name="kode_matakuliah" required><br>

        <label for="nidn">NIDN Dosen:</label>
        <input type="text" id="nidn" name="nidn" required><br>

        <label for="nilai">Nilai:</label>
        <input type="text" id="nilai" name="nilai" required><br>

        <input type="submit" value="Tambah  Perkuliahan">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '../include/config.php';
        $nim = $_POST['nim'];
        $kode_matakuliah = $_POST['kode_matakuliah'];
        $nidn = $_POST['nidn'];
        $nilai = $_POST['nilai'];

        // Query untuk memasukkan data ke dalam tabel perkuliahan
        $query = "INSERT INTO perkuliahan (nim, kode_matakuliah, nidn, nilai)
                  VALUES ('$nim', '$kode_matakuliah', '$nidn', '$nilai')";
        
        if (mysqli_query($conn, $query)) {
            echo "<p>Perkuliahan berhasil ditambahkan!</p>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>
</body>
</html>
