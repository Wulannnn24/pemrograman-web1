<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Perkuliahan</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Daftar Perkuliahan</h1>
        <a href="tambah_perkuliahan.php">Tambah Perkuliahan</a>
    </header>

    <?php
    // Koneksi ke database
    include '../include/config.php';

    // Query untuk mengambil daftar perkuliahan
    $query = "SELECT * FROM perkuliahan";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>NIM</th><th>Kode Mata Kuliah</th><th>NIDN</th><th>Nilai</th><th>Action</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['nim']}</td>
                    <td>{$row['kode_matakuliah']}</td>
                    <td>{$row['nidn']}</td>
                    <td>{$row['nilai']}</td>
                    <td>
                    <a href='edit_dosen.php?NIDN={$row['nidn']}'>Edit</a> | 
                    <a href='hapus_dosen.php?NIDN={$row['nidn']}'>Hapus</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Data perkuliahan tidak ditemukan!</p>";
    }
    ?>
</body>
</html>
