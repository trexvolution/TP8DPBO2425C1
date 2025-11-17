<?php
require_once 'Database.php';

class Department {
    private $db;
    private $table = 'departments';

    public function __construct() {
        $this->db = new Database();
    }

    // (READ) Mengambil semua data jurusan
    public function getAll() {
        $sql = "SELECT * FROM {$this->table} ORDER BY department_name ASC";
        $result = $this->db->conn->query($sql);
        return $result;
    }

    // (READ) Mengambil satu data jurusan berdasarkan ID
    public function getById($id) {
        $stmt = $this->db->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // (CREATE) Menambah data jurusan baru
    public function create($data) {
        $department_name = $data['department_name'];
        $faculty = $data['faculty'];

        $stmt = $this->db->conn->prepare(
            "INSERT INTO {$this->table} (department_name, faculty) VALUES (?, ?)"
        );
        $stmt->bind_param("ss", $department_name, $faculty); // "ss" = string, string
        return $stmt->execute();
    }

    // (UPDATE) Mengubah data jurusan
    public function update($id, $data) {
        $department_name = $data['department_name'];
        $faculty = $data['faculty'];

        $stmt = $this->db->conn->prepare(
            "UPDATE {$this->table} SET department_name = ?, faculty = ? WHERE id = ?"
        );
        $stmt->bind_param("ssi", $department_name, $faculty, $id); // "ssi" = string, string, integer
        return $stmt->execute();
    }

    // (DELETE) Menghapus data jurusan
    public function delete($id) {
        $stmt = $this->db->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>