<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Tambah Mata Kuliah</h1>
        <a href="list_matakuliah.php">Kembali ke Daftar Mata Kuliah</a>
    </header>

    <form action="tambah_matakuliah.php" method="post">
        <label for="kode_matakuliah">Kode Mata Kuliah:</label>
        <input type="text" id="kode_matakuliah" name="kode_matakuliah" required><br>

        <label for="nama_matakuliah">Nama Mata Kuliah:</label>
        <input type="text" id="nama_matakuliah" name="nama_matakuliah" required><br>

        <label for="sks">SKS:</label>
        <input type="number" id="sks" name="sks" required><br>

        <input type="submit" value="Tambah Mata Kuliah">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '../include/config.php';
        $kode_matakuliah = $_POST['kode_matakuliah'];
        $nama_matakuliah = $_POST['nama_matakuliah'];
        $sks = $_POST['sks'];

        $query = "INSERT INTO matakuliah (kode_matakuliah, nama_matakuliah, sks)
                  VALUES ('$kode_matakuliah', '$nama_matakuliah', '$sks')";
        if (mysqli_query($conn, $query)) {
            echo "<p>Mata Kuliah berhasil ditambahkan!</p>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>
</body>
</html>
