<?php
class Koneksi {
    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect() {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }
        return $conn;
    }

    public function getDataAsJson($tablename) {
        $conn = $this->connect();
        $sql = "SELECT * FROM $tablename";
        $result = $conn->query($sql);
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        $conn->close();
        return json_encode(array('Hasil' =>$data));
        // return json_encode($data);
    }
}   

// Inisialisasi objek database
// $database = new Koneksi("localhost", "root", "", "db_healt");
// // Mengambil data sebagai JSON
// $jsonData = $database->getDataAsJson("tb_pdf");
// // Menampilkan hasil JSON
// echo ($jsonData);
?>