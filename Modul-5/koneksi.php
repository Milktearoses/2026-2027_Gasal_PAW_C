<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_penjualan";

// Membuat koneksi ke database MySQL
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Periksa apakah koneksi gagal
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
    } 
// else {
//     echo "Koneksi Berhasil!";
// }
?>