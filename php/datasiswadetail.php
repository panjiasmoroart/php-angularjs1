<?php 
//load koneksi database 
include "connection.php";

$id     = $_REQUEST["siswaid"];
$siswa  = "SELECT * FROM siswa WHERE id=".$id;
$result = $connection->query($siswa);

//jika ada data siswa dalam database 
if($result->num_rows > 0) {
    $datasiswaDetail = array();
    while($row = $result->fetch_assoc()) {
        //array_push digunakan untuk menambah satu atau elemen baru di akhir array
        array_push($datasiswaDetail, array("nis" => $row["nis"],"nama" => $row["nama"], "alamat" => $row["alamat"], "thn_masuk" => $row["tahun_masuk"]));
    }
    
    echo json_encode($datasiswaDetail);

}
else{
    echo "0 results";
}

mysqli_close($connection);

