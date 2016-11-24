<?php 
$server = "localhost";
$username = "root";
$password = "";
$database = "siakadta";

// Koneksi dan memilih database di server
$konek = mysqli_connect($server,$username,$password,$database) or die("Koneksi gagal");
?>