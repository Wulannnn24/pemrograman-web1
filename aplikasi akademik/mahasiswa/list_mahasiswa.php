<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href= "../css/style.css">
</head>
<body>
    <header>
        <h1>Daftar Mahasiswa</h1>
        <a href="tambah_mahasiswa.php">Tambah Mahasiswa</a>
    </header>

    <?php
    include '../include/config.php';
    $query = "SELECT * FROM mahasiswa";
    $result = mysqli_query($conn, $query);

    echo "<table>
            <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['nim']}</td>
                <td>{$row['nama_mhs']}</td>
                <td>{$row['tgl_lahir']}</td>
                <td>{$row['alamat']}</td>
                <td>" . ($row['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan') . "</td>
                <td>
                    <a href='edit_mahasiswa.php?NIM={$row['nim']}'>Edit</a> | 
                    <a href='hapus_mahasiswa.php?NIM={$row['nim']}'>Hapus</a>
                </td>
              </tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
