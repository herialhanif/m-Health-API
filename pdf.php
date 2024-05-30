<?php
include('koneksi.php');

$conn = new Koneksi("localhost", "root", "", "db_healt");

$jsonData = $conn->getDataAsJson("tb_pdf");
// Menampilkan hasil JSON
echo ($jsonData);

?>