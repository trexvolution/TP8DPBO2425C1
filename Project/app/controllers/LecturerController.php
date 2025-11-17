<?php
require_once 'app/models/Lecturer.php';
require_once 'app/models/Department.php';

class LecturerController {

    // (READ) Menampilkan daftar semua dosen
    public function index() {
        $lecturerModel = new Lecturer();
        $lecturers = $lecturerModel->getAll();
        
        // Memuat view dan mengirimkan data $lecturers
        require 'app/views/lecturers/index.php';
    }

    // (CREATE) Menampilkan form untuk menambah dosen baru
    public function create() {
        // Kita butuh daftar jurusan untuk dropdown
        $departmentModel = new Department();
        $departments = $departmentModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Jika form disubmit, proses data
            $data = [
                'name' => $_POST['name'],
                'nidn' => $_POST['nidn'],
                'phone' => $_POST['phone'],
                'join_date' => $_POST['join_date'],
                'department_id' => $_POST['department_id']
            ];
            
            $lecturerModel = new Lecturer();
            if ($lecturerModel->create($data)) {
                // Jika sukses, redirect ke halaman index
                header('Location: index.php?controller=lecturer&action=index');
            } else {
                echo "Error: Gagal menambah data.";
            }
        } else {
            // Jika bukan POST, tampilkan form
            require 'app/views/lecturers/create.php';
        }
    }

    // (UPDATE) Menampilkan form untuk mengedit dosen
    public function edit($id) {
        $lecturerModel = new Lecturer();
        $departmentModel = new Department();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Jika form disubmit, proses update
            $data = [
                'name' => $_POST['name'],
                'nidn' => $_POST['nidn'],
                'phone' => $_POST['phone'],
                'join_date' => $_POST['join_date'],
                'department_id' => $_POST['department_id']
            ];

            if ($lecturerModel->update($id, $data)) {
                header('Location: index.php?controller=lecturer&action=index');
            } else {
                echo "Error: Gagal mengupdate data.";
            }
        } else {
            // Ambil data dosen yang mau diedit
            $lecturer = $lecturerModel->getById($id);
            // Ambil semua data jurusan untuk dropdown
            $departments = $departmentModel->getAll();
            
            // Tampilkan form edit
            require 'app/views/lecturers/edit.php';
        }
    }

    // (DELETE) Menghapus data dosen
    public function delete($id) {
        $lecturerModel = new Lecturer();
        if ($lecturerModel->delete($id)) {
            header('Location: index.php?controller=lecturer&action=index');
        } else {
            echo "Error: Gagal menghapus data.";
        }
    }
}
?>