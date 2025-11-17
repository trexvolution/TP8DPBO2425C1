-- 1. Buat Database
CREATE DATABASE IF NOT EXISTS tp_mvc25;
USE tp_mvc25;

-- 2. Buat Tabel 'departments' (Tabel Baru)
-- (Satu Jurusan punya banyak Dosen)
CREATE TABLE departments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  department_name VARCHAR(100) NOT NULL,
  faculty VARCHAR(100)
);

-- 3. Buat Tabel 'lecturers' (Dimodifikasi)
-- (Satu Dosen milik satu Jurusan)
CREATE TABLE lecturers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  nidn VARCHAR(20) NOT NULL UNIQUE,
  phone VARCHAR(20),
  join_date DATE,
  department_id INT, -- Atribut baru untuk relasi
  FOREIGN KEY (department_id) 
    REFERENCES departments(id) 
    ON DELETE SET NULL -- Jika jurusan dihapus, dosen tsb 'department_id'-nya jadi NULL
);

-- 4. Buat Tabel 'publications' (Tabel Baru)
-- (Satu Dosen punya banyak Publikasi)
CREATE TABLE publications (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  journal VARCHAR(150),
  year INT,
  lecturer_id INT, -- Atribut baru untuk relasi
  FOREIGN KEY (lecturer_id) 
    REFERENCES lecturers(id) 
    ON DELETE CASCADE -- Jika dosen dihapus, publikasinya ikut terhapus
);

-- Gunakan database yang relevan
USE tp_mvc25;

-- 1. Masukkan data ke tabel 'departments'
-- (Akan menghasilkan ID: 1, 2, 3)
INSERT INTO departments (department_name, faculty) VALUES
('Teknik Informatika', 'Fakultas Ilmu Komputer'),
('Sistem Informasi', 'Fakultas Ilmu Komputer'),
('Manajemen Bisnis', 'Fakultas Ekonomi dan Bisnis');

-- 2. Masukkan data ke tabel 'lecturers'
-- (Menggunakan department_id 1, 2, dan 3 dari atas)
-- (Akan menghasilkan ID: 1, 2, 3, 4)
INSERT INTO lecturers (name, nidn, phone, join_date, department_id) VALUES
('Dr. Budi Santoso', '12345601', '08123456789', '2010-03-01', 1), -- Dosen T. Info
('Prof. Indah Cahyani', '12345602', '08123456790', '2015-09-15', 1), -- Dosen T. Info
('Ahmad Zailani, M.Kom.', '12345603', '08123456791', '2018-01-20', 2), -- Dosen S. Info
('Dr. Rina Wulandari', '12345604', '08123456792', '2012-05-10', 3); -- Dosen Manajemen

-- 3. Masukkan data ke tabel 'publications'
-- (Menggunakan lecturer_id 1, 2, dan 4 dari atas)
INSERT INTO publications (title, journal, year, lecturer_id) VALUES
('Penerapan AI dalam Analisis Big Data', 'Jurnal Ilmiah Komputer', 2023, 1), -- Publikasi Dr. Budi
('Machine Learning untuk Prediksi Pasar', 'IEEE Transactions', 2024, 1), -- Publikasi Dr. Budi
('Keamanan Jaringan Nirkabel', 'Jurnal Internasional Cyber', 2022, 2), -- Publikasi Prof. Indah
('Strategi Pemasaran Digital UKM', 'Jurnal Manajemen Modern', 2023, 4); -- Publikasi Dr. Rina
-- (Ahmad Zailani, ID 3, sengaja tidak memiliki publikasi untuk contoh)