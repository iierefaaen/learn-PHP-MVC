<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $data["title"] ? $data["title"] : "ADMIN" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistem Akademik</a>
        <div class="d-flex">
            <a href="/logout" class="btn btn-outline-light">Logout</a>
        </div>
    </div>
</nav>