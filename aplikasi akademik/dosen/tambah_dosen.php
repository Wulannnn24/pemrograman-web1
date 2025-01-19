<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Dosen</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Tambah Data Dosen</h1>
        <a href="list_dosen.php">Kembali ke Daftar Dosen</a>
    </header>

    <form action="tambah_dosen.php" method="post">
        <label for="NIDN">NIDN:</label>
        <input type="text" id="NIDN" name="NIDN" required><br>

        <label for="nama_dosen">Nama Dosen:</label>
        <input type="text" id="nama_dosen" name="nama_dosen" required><br>

        <input type="submit" value="Tambah Dosen">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '../include/config.php';
        $NIDN = $_POST['NIDN'];
        $nama_dosen = $_POST['nama_dosen'];

        $query = "INSERT INTO dosen (NIDN, nama_dosen) VALUES ('$NIDN', '$nama_dosen')";
        if (mysqli_query($conn, $query)) {
            echo "<p>Dosen berhasil ditambahkan!</p>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>
</body>
</html>
