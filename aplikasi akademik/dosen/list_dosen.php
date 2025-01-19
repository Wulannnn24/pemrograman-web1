<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dosen</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Daftar Dosen</h1>
        <a href="tambah_dosen.php">Tambah Dosen</a>
    </header>

    <?php
    include '../include/config.php';
    $query = "SELECT * FROM dosen";
    $result = mysqli_query($conn, $query);
   

    echo "<table>
            <tr>
                <th>NIDN</th>
                <th>Nama Dosen</th>
                <th>Aksi</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['nidn']}</td>
                <td>{$row['nama_dosen']}</td>
                <td>
                    <a href='edit_dosen.php?NIDN={$row['nidn']}'>Edit</a> | 
                    <a href='hapus_dosen.php?NIDN={$row['nidn']}'>Hapus</a>
                </td>
              </tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
