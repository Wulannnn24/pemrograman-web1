<?php
// Koneksi ke database
include '../include/config.php';

if ($_GET['kode_matakuliah']) {
    $kode_matakuliah = $_GET['kode_matakuliah'];
    $query = "SELECT * FROM matakuliah WHERE kode_matakuliah = '$kode_matakuliah'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_matakuliah = $_POST['kode_matakuliah'];
    $nama_matakuliah = $_POST['nama_matakuliah'];
    $sks = $_POST['sks'];

    $query = "UPDATE matakuliah SET 
              nama_matakuliah = '$nama_matakuliah',
              sks = '$sks' 
              WHERE kode_matakuliah = '$kode_matakuliah'";

    if (mysqli_query($conn, $query)) {
        header("Location: list_matakuliah.php");  // Kembali ke daftar mata kuliah
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Edit Mata Kuliah</h1>
        <a href="list_matakuliah.php">Kembali ke Daftar Mata Kuliah</a>
    </header>

    <form action="edit_matakuliah.php?kode_matakuliah=<?php echo $kode_matakuliah; ?>" method="post">
        <label for="kode_matakuliah">Kode Mata Kuliah:</label>
        <input type="text" id="kode_matakuliah" name="kode_matakuliah" value="<?php echo $data['kode_matakuliah']; ?>" required readonly><br>

        <label for="nama_matakuliah">Nama Mata Kuliah:</label>
        <input type="text" id="nama_matakuliah" name="nama_matakuliah" value="<?php echo $data['nama_matakuliah']; ?>" required><br>

        <label for="sks">SKS:</label>
        <input type="number" id="sks" name="sks" value="<?php echo $data['sks']; ?>" required><br>

        <input type="submit" value="Update Mata Kuliah">
    </form>
</body>
</html>
