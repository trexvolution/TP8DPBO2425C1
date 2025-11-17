<?php
require_once 'Database.php';

class Publication {
    private $db;
    private $table = 'publications';

    public function __construct() {
        $this->db = new Database();
    }

    // (READ) Mengambil semua data publikasi dengan nama dosennya
    public function getAll() {
        $sql = "SELECT p.*, l.name as lecturer_name 
                FROM {$this->table} p
                LEFT JOIN lecturers l ON p.lecturer_id = l.id
                ORDER BY p.year DESC, p.title ASC";
                
        $result = $this->db->conn->query($sql);
        return $result;
    }

    // (READ) Mengambil satu data publikasi berdasarkan ID
    public function getById($id) {
        $stmt = $this->db->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // (CREATE) Menambah data publikasi baru
    public function create($data) {
        $title = $data['title'];
        $journal = $data['journal'];
        $year = $data['year'];
        $lecturer_id = $data['lecturer_id'];

        $stmt = $this->db->conn->prepare(
            "INSERT INTO {$this->table} (title, journal, year, lecturer_id) 
             VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("ssii", $title, $journal, $year, $lecturer_id);
        return $stmt->execute();
    }

    // (UPDATE) Mengubah data publikasi
    public function update($id, $data) {
        $title = $data['title'];
        $journal = $data['journal'];
        $year = $data['year'];
        $lecturer_id = $data['lecturer_id'];

        $stmt = $this->db->conn->prepare(
            "UPDATE {$this->table} SET 
             title = ?, journal = ?, year = ?, lecturer_id = ? 
             WHERE id = ?"
        );
        $stmt->bind_param("ssiii", $title, $journal, $year, $lecturer_id, $id);
        return $stmt->execute();
    }

    // (DELETE) Menghapus data publikasi
    public function delete($id) {
        $stmt = $this->db->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>