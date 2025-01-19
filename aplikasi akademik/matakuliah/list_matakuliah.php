<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mata Kuliah</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Daftar Mata Kuliah</h1>
        <a href="tambah_matakuliah.php">Tambah Mata Kuliah</a>
    </header>

    <?php
    include '../include/config.php';
    $query = "SELECT * FROM matakuliah";
    $result = mysqli_query($conn, $query);

    echo "<table>
            <tr>
                <th>Kode</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['kode_matakuliah']}</td>
                <td>{$row['nama_matakuliah']}</td>
                <td>{$row['sks']}</td>
                <td>
                    <a href='edit_matakuliah.php?kode_matakuliah={$row['kode_matakuliah']}'>Edit</a> | 
                    <a href='hapus_matakuliah.php?kode_matakuliah={$row['kode_matakuliah']}'>Hapus</a>
                        
                </td>
              </tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
