<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $data["title"] ? $data["title"] : "ADMIN" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
      body{
        font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
    </style>
</head>
<body>
<div style="background-color: #6610f2;">
  <nav class="mb-3 navbar navbar-expand-lg">
    <div class="container-fluid container">
      <a class="text-light text-opacity-50 navbar-brand" href="<?= BASE_URL; ?>">AcademicAPP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="<?= BASE_URL; ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled text-white" href="">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?= BASE_URL; ?>students">Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?= BASE_URL; ?>students/add">Add</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-white px-3 py-1 rounded-pill" 
              style="background-color: #dc3545;" 
              href="<?= BASE_URL; ?>auth/logout">
              Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>