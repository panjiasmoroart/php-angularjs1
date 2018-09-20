<?php 
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "phpangularjs158";

$connection = new mysqli($servername, $username, $password, $database);

//cek conecction
if($connection->connect_error) {
    die("Connection Failed " . $connection->connect_error);
}
