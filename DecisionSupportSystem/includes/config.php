<?php
$hostname = "localhost";
$database = "dss_seblak";
$username = "root";
$password = "";
$koneksi = mysqli_connect($hostname, $username, $password, $database);
// script cek koneksi
if (!$koneksi) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}
?> 

