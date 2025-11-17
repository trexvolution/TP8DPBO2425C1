# Tugas Praktikum 8 DPBO - MVC project

Tugas ini merupakan bagian dari Tugas Praktikum 8 mata kuliah Desain Pemrograman Berorientasi Objek (DPBO). 
Pada praktikum ini, saya mengembangkan sebuah sistem informasi akademik sederhana berbasis PHP dengan arsitektur MVC (Model-View-Controller).

## Janji

Saya Nur Abdillah Ifhamuddin dengan NIM 2408515 mengerjakan Tugas Praktikum 8 
dalam Mata Kuliah Desain Pemrograman Berorientasi Objek. 
Untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah di spesifikasikan. Aamiin.

## Desain Program

Program dibangun menggunakan MVC untuk memisahkan logika aplikasi (Model), tampilan (View), dan pengendali alur (Controller). Adapun entitas utama yang digunakan:

1. Lecturers (Dosen)
2. Departments (Program Studi)
3. Publications (Publikasi)

Dengan bentuk database seperti berikut

<img width="904" height="373" alt="Screenshot 2025-11-17 211616" src="https://github.com/user-attachments/assets/81f5f6ad-e5de-400d-8bbd-5c1b2d44abfd" />

## Struktur Folder

<img width="557" height="598" alt="Screenshot 2025-11-17 205033" src="https://github.com/user-attachments/assets/58c6ca7a-ba6c-4708-b817-149a36c82b42" />

## Fitur Utama

1. CRUD Dosen
2. CRUD Department
3. CRUD Publikasi
4. Keamanan: Pencegahan SQL Injection dengan prepared statements.
5. Memiliki Dropdown pada pemilihan program studi di Dosen dan Dosen di publikasi

## Alur Program

1. Permintaan (Request): Pengguna mengklik tautan atau mengirimkan form. Contoh: index.php?controller=lecturer&action=edit&id=10
2. Routing (index.php): File index.php utama membaca parameter $_GET:
    - controller = 'lecturer' → akan memuat LecturerController.
    - action = 'edit' → akan memanggil method edit().
    - id = 10 → akan diteruskan sebagai parameter ke method edit(10).
3. Controller: index.php memuat app/controllers/LecturerController.php dan membuat instance baru.
4. Eksekusi Aksi: Controller memanggil method edit(10).
5. Interaksi Model: Di dalam method edit(), Controller:
   - Membuat instance dari app/models/Lecturer.php.
   - Memanggil $lecturerModel->getById(10) untuk mengambil data dosen.
   - Membuat instance dari app/models/Department.php dan memanggil $departmentModel->getAll() untuk mengisi dropdown jurusan.
6. Database: Model (Lecturer.php) mengeksekusi query SQL yang aman (SELECT... WHERE id=10) dan mengembalikan hasilnya ke Controller.
7. Render View: Controller kini memiliki semua data yang dibutuhkan (data dosen dan daftar jurusan).
8. Controller kemudian memuat file View yang sesuai: require 'app/views/lecturers/edit.php';
9. Tampilan (Response): File edit.php (dibantu oleh header.php dan footer.php) me-render HTML, mengisi form dengan data yang diterima dari Controller.
10. HTML final dikirimkan kembali ke browser pengguna.

## Dokumentasi

https://github.com/user-attachments/assets/641f0973-b7ec-4e8f-ba79-2d9683999d9e

