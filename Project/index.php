<?php
// Mulai session (berguna untuk notifikasi, dll)
session_start();

// 1. Tentukan Controller dan Action default
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Lecturer';
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

// 2. Bentuk nama file dan class Controller
$controllerFile = "app/controllers/{$controllerName}Controller.php";
$controllerClassName = "{$controllerName}Controller";

// 3. Periksa apakah file controller ada
if (file_exists($controllerFile)) {
    // 4. Muat file controller
    require_once $controllerFile;

    // 5. Periksa apakah class controller ada
    if (class_exists($controllerClassName)) {
        // 6. Buat instance controller
        $controller = new $controllerClassName();

        // 7. Tentukan method/action yang akan dipanggil
        $action = $actionName;

        // 8. Periksa apakah method ada di dalam controller
        if (method_exists($controller, $action)) {
            // 9. Panggil method, kirimkan ID jika ada
            if ($id !== null) {
                $controller->$action($id);
            } else {
                $controller->$action();
            }
        } else {
            die("Error: Action '$action' not found in controller '$controllerClassName'.");
        }
    } else {
        die("Error: Class '$controllerClassName' not found in file '$controllerFile'.");
    }
} else {
    // Default fallback jika controller tidak ditemukan (misal: halaman utama)
    if ($controllerName == 'Lecturer' && $actionName == 'index') {
        require_once 'app/controllers/LecturerController.php';
        $controller = new LecturerController();
        $controller->index();
    } else {
        die("Error: Controller file '$controllerFile' not found.");
    }
}
?>