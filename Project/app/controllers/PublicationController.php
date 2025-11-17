<?php
require_once 'app/models/Publication.php';
require_once 'app/models/Lecturer.php'; // Dibutuhkan untuk list dosen

class PublicationController {

    // (READ) Menampilkan daftar semua publikasi
    public function index() {
        $publicationModel = new Publication();
        $publications = $publicationModel->getAll();
        require 'app/views/publications/index.php';
    }

    // (CREATE) Menampilkan form & memproses tambah publikasi
    public function create() {
        // Kita butuh daftar dosen untuk dropdown
        $lecturerModel = new Lecturer();
        $lecturers = $lecturerModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'title' => $_POST['title'],
                'journal' => $_POST['journal'],
                'year' => $_POST['year'],
                'lecturer_id' => $_POST['lecturer_id']
            ];
            
            $publicationModel = new Publication();
            if ($publicationModel->create($data)) {
                header('Location: index.php?controller=publication&action=index');
            } else {
                echo "Error: Gagal menambah data.";
            }
        } else {
            require 'app/views/publications/create.php';
        }
    }

    // (UPDATE) Menampilkan form & memproses edit publikasi
    public function edit($id) {
        $publicationModel = new Publication();
        $lecturerModel = new Lecturer();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'title' => $_POST['title'],
                'journal' => $_POST['journal'],
                'year' => $_POST['year'],
                'lecturer_id' => $_POST['lecturer_id']
            ];

            if ($publicationModel->update($id, $data)) {
                header('Location: index.php?controller=publication&action=index');
            } else {
                echo "Error: Gagal mengupdate data.";
            }
        } else {
            $publication = $publicationModel->getById($id);
            $lecturers = $lecturerModel->getAll(); // Ambil semua dosen untuk dropdown
            require 'app/views/publications/edit.php';
        }
    }

    // (DELETE) Menghapus data publikasi
    public function delete($id) {
        $publicationModel = new Publication();
        if ($publicationModel->delete($id)) {
            header('Location: index.php?controller=publication&action=index');
        } else {
            echo "Error: Gagal menghapus data.";
        }
    }
}
?>