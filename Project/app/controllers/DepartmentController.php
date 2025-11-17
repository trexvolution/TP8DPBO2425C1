<?php
require_once 'app/models/Department.php';

class DepartmentController {

    // (READ) Menampilkan daftar semua jurusan
    public function index() {
        $departmentModel = new Department();
        $departments = $departmentModel->getAll();
        require 'app/views/departments/index.php';
    }

    // (CREATE) Menampilkan form & memproses tambah jurusan
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'department_name' => $_POST['department_name'],
                'faculty' => $_POST['faculty']
            ];
            
            $departmentModel = new Department();
            if ($departmentModel->create($data)) {
                header('Location: index.php?controller=department&action=index');
            } else {
                echo "Error: Gagal menambah data.";
            }
        } else {
            require 'app/views/departments/create.php';
        }
    }

    // (UPDATE) Menampilkan form & memproses edit jurusan
    public function edit($id) {
        $departmentModel = new Department();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'department_name' => $_POST['department_name'],
                'faculty' => $_POST['faculty']
            ];

            if ($departmentModel->update($id, $data)) {
                header('Location: index.php?controller=department&action=index');
            } else {
                echo "Error: Gagal mengupdate data.";
            }
        } else {
            $department = $departmentModel->getById($id);
            require 'app/views/departments/edit.php';
        }
    }

    // (DELETE) Menghapus data jurusan
    public function delete($id) {
        $departmentModel = new Department();
        
        // Tambahkan Error handling jika foreign key constraint gagal
        try {
            if ($departmentModel->delete($id)) {
                header('Location: index.php?controller=department&action=index');
            } else {
                echo "Error: Gagal menghapus data.";
            }
        } catch (mysqli_sql_exception $e) {
            echo "Error: Tidak dapat menghapus jurusan ini karena masih digunakan oleh data dosen. <br>";
            echo "<a href='index.php?controller=department&action=index'>Kembali</a>";
        }
    }
}
?>