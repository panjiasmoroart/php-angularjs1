<?php 
include "connection.php";

//tampung variabel dari form 
$nis         = $_REQUEST["nis"];
$nama        = $_REQUEST["nama"];
$alamat      = $_REQUEST["alamat"];
$tahun_masuk = $_REQUEST["tahun_masuk"];

$save = "INSERT INTO siswa(nis,nama,alamat,tahun_masuk) values('".$nis."','".$nama."','".$alamat."','".$tahun_masuk."')";
$connection->query($save);

mysqli_close($connection);