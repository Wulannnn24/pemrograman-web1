<?php
include '../include/config.php';

if ($_GET['NIM']) {
    $NIM = $_GET['nim'];
    $query = "DELETE FROM mahasiswa WHERE nim= '$nim'";
    if (mysqli_query($conn, $query)) {
        header("Location: list_mahasiswa.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>