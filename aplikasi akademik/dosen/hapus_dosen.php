<?php
include '../include/config.php';

if ($_GET['NIDN']) {
    $NIDN = $_GET['NIDN'];
    $query = "DELETE FROM dosen WHERE NIDN = '$NIDN'";
    if (mysqli_query($conn, $query)) {
        header("Location: list_dosen.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
