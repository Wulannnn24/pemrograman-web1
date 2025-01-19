<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Tambah Mahasiswa</h1>
        <a href="list_mahasiswa.php">Kembali ke Daftar Mahasiswa</a>
    </header>

    <form action="tambah_mahasiswa.php" method="post">
        <label for="NIM">NIM:</label>
        <input type="text" id="NIM" name="NIM" required><br>

        <label for="nama_mahasiswa">Nama Mahasiswa:</label>
        <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" required><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir"><br>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat"></textarea><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select><br>

        <input type="submit" value="Tambah Mahasiswa">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '../include/config.php';
        $nim = $_POST['NIM'];
        $nama_mhs = $_POST['nama_mahasiswa'];
        $tgl_lahir = $_POST['tanggal_lahir'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];

        $query = "INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat, jenis_kelamin)
                  VALUES ('$nim', '$nama_mhs', '$tgl_lahir', '$alamat', '$jenis_kelamin')";
        if (mysqli_query($conn, $query)) {
            echo "<p>Mahasiswa berhasil ditambahkan!</p>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>
</body>
</html>
