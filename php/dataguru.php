<?php 
//load koneksi database 
include "connection.php";

$siswa = "SELECT * FROM guru";
$result = $connection->query($siswa);

//jika ada data siswa dalam database 
if($result->num_rows > 0) {
    $dataguru = array();
    while($row = $result->fetch_assoc()) {
        //array_push digunakan untuk menambah satu atau elemen baru di akhir array
        array_push($dataguru, array("guruid" => $row['id'], "nama" => $row["nama"], "alamat" => $row["alamat"], "pendidikan" => $row["pendidikan"]));
    }
    
    echo json_encode($dataguru);

}
else{
    echo "0 results";
}

mysqli_close($connection);

