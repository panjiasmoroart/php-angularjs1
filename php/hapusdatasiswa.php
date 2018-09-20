<?php 
include "connection.php";

//query delete siswa 
$hapus = "DELETE FROM siswa WHERE id=".$_REQUEST["siswaid"];
$connection->query($hapus);

mysqli_close($connection);
