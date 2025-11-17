<?php
// Ganti file connection.php Anda dengan ini
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "tp_mvc25";
    public $conn;

    // Constructor untuk otomatis terhubung saat object Database dibuat
    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Destructor untuk menutup koneksi saat object tidak lagi digunakan
    public function __destruct() {
        $this->conn->close();
    }
}
?>