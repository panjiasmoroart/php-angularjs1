<?php 
//load koneksi database 
include "connection.php";

$siswa = "SELECT * FROM siswa";
$result = $connection->query($siswa);

//jika ada data siswa dalam database 
if($result->num_rows > 0) {
    $datasiswa = array();
    while($row = $result->fetch_assoc()) {
        //array_push digunakan untuk menambah satu atau elemen baru di akhir array
        array_push($datasiswa, array("siswaid" => $row['id'], "nis" => $row["nis"],"nama" => $row["nama"], "alamat" => $row["alamat"], "thn_masuk" => $row["tahun_masuk"]));
    }
    
    echo json_encode($datasiswa);

}
else{
    echo "0 results";
}

mysqli_close($connection);

