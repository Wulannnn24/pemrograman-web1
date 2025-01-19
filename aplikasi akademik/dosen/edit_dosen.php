<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dosen</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Edit Dosen</h1>
        <a href="list_dosen.php">Kembali ke Daftar Dosen</a>
    </header>

    <?php
    include '../include/config.php';
    if ($_GET['NIDN']) {
        $NIDN = $_GET['NIDN'];
        $query = "SELECT * FROM dosen WHERE NIDN = '$NIDN'";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_dosen = $_POST['nama_dosen'];
        $query = "UPDATE dosen SET nama_dosen = '$nama_dosen' WHERE NIDN = '$NIDN'";
        if (mysqli_query($conn, $query)) {
            header("Location: list_dosen.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        if (mysqli_num_rows($result) > 0) {
            $edit_dosen = mysqli_fetch_assoc($result);
        } else {
            echo "Data dosen tidak ditemukan.";
        }
       
    
    
    }
    ?>

    <form action="edit_dosen.php?NIDN=<?php echo $NIDN; ?>" method="post">
        <label for="nama_dosen">Nama Dosen:</label>
        <input type="text" nidn="nama_dosen" name="nama_dosen" value="<?php echo $data ['nama_dosen']; ?>" required><br>

        <input type="submit" value="Update Dosen">
    </form>
</body>
</html>
