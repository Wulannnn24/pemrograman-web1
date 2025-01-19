<?php
$host = 'localhost';
$username = 'root'; // Ganti dengan username MySQL Anda
$password = '';      // Ganti dengan password MySQL Anda
$database = 'sistem_akademik'; // Nama database yang Anda buat


$conn =  new mysqli($host, $username, $password, $database);

if (!$conn) 
{
    die('Koneksi gagal: ' . mysqli_connect_error());
}
?>