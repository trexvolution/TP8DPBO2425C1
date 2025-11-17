<?php
require_once 'Database.php';

class Lecturer {
    private $db;
    private $table = 'lecturers';

    public function __construct() {
        $this->db = new Database();
    }

    // (READ) Mengambil semua data dosen dengan nama jurusannya
    public function getAll() {
        // Query JOIN untuk mengambil nama departemen
        $sql = "SELECT l.*, d.department_name 
                FROM {$this->table} l
                LEFT JOIN departments d ON l.department_id = d.id
                ORDER BY l.name ASC";
                
        $result = $this->db->conn->query($sql);
        return $result;
    }

    // (READ) Mengambil satu data dosen berdasarkan ID
    public function getById($id) {
        $stmt = $this->db->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id); // "i" berarti integer
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // (CREATE) Menambah data dosen baru
    public function create($data) {
        $name = $data['name'];
        $nidn = $data['nidn'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $department_id = $data['department_id'];

        // Menggunakan prepared statement untuk keamanan SQL Injection
        $stmt = $this->db->conn->prepare(
            "INSERT INTO {$this->table} (name, nidn, phone, join_date, department_id) 
             VALUES (?, ?, ?, ?, ?)"
        );
        
        // "ssssi" = string, string, string, string, integer
        $stmt->bind_param("ssssi", $name, $nidn, $phone, $join_date, $department_id);
        
        return $stmt->execute();
    }

    // (UPDATE) Mengubah data dosen
    public function update($id, $data) {
        $name = $data['name'];
        $nidn = $data['nidn'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $department_id = $data['department_id'];

        $stmt = $this->db->conn->prepare(
            "UPDATE {$this->table} SET 
             name = ?, nidn = ?, phone = ?, join_date = ?, department_id = ? 
             WHERE id = ?"
        );

        // "ssssii" = string, string, string, string, integer, integer
        $stmt->bind_param("ssssii", $name, $nidn, $phone, $join_date, $department_id, $id);
        
        return $stmt->execute();
    }

    // (DELETE) Menghapus data dosen
    public function delete($id) {
        $stmt = $this->db->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>