<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Edit Mahasiswa</h1>
        <a href="list_mahasiswa.php">Kembali ke Daftar Mahasiswa</a>
    </header>

    <?php
    include '../include/config.php';

    if ($_GET['NIM']) {
        $NIM = $_GET['NIM'];
        $query = "SELECT * FROM mahasiswa WHERE NIM = '$NIM'";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_mhs = $_POST['nama_mhs'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];

        $query = "UPDATE mahasiswa SET 
                  nama_mhs = '$nama_mhs',
                  tgl_lahir = '$tgl_lahir',
                  alamat = '$alamat',
                  jenis_kelamin = '$jenis_kelamin'
                  WHERE NIM = '$NIM'";

        if (mysqli_query($conn, $query)) {
            header("Location: list_mahasiswa.php");
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>

    <form action="edit_mahasiswa.php?NIM=<?php echo $NIM; ?>" method="post">
        <label for="nama_mhs">Nama Mahasiswa:</label>
        <input type="text" nim="nama_mhs" name="nama_mhs" value=<?php echo $data['nama_mhs']; ?> ><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $date['tgl_lahir']; ?>"><br>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat"><?php echo $data['alamat']; ?></textarea><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="L" <?php if ($data['jenis_kelamin'] == 'L') echo 'selected'; ?>>Laki-laki</option>
            <option value="P" <?php if ($data['jenis_kelamin'] == 'P') echo 'selected'; ?>>Perempuan</option>
        </select><br>

        <input type="submit" value="Update Mahasiswa">
    </form>
</body>
</html>
