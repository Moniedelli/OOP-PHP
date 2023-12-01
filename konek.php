<?php
class koneksi{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "be203"; 
    
    public $conn;

    public function __construct()
    {
        
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if (!$this->conn){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit;
        }else{
            // echo "koneksi berhasil"; 
        }

        return $this->conn;

    }

    public function getConn()
    {
        return $this->conn;
    }
}
?>