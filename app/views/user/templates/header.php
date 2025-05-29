<!-- views/templates/header.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?? 'Dashboard User' ?></title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Optional: Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/user/home">MyApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/user/profile">Profil</a></li>
        <li class="nav-item"><a class="nav-link" href="/user/settings">Pengaturan</a></li>
        <li class="nav-item"><a class="nav-link text-danger" href="/logout">Keluar</a></li>
      </ul>
    </div>
  </div>
</nav>
