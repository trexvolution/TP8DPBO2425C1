<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="public/css/bootstrap.min.css" rel="stylesheet">
  <title><?php echo isset($title) ? $title : 'Sistem CRUD MVC'; ?></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Data Kampus</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=lecturer&action=index">Lecturers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=department&action=index">Departments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?controller=publication&action=index">Publications</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container my-4">