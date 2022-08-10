<?php 

    include 'config/app.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>
<title><?= $title; ?></title>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed">
            <div class="container">
                <a class="navbar-brand" href="#">CRUD PHP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <?php if($_SESSION['level'] == 1 or $_SESSION['level'] == 2) : ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">Barang</a>
                            </li>
                        <?php endif; ?>
                        
                        <?php if($_SESSION['level'] == 1 or $_SESSION['level'] == 3) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="crud-modal.php">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a>
                        </li>
                    </ul>
                </div>
                <div>
                <a class="navbar-brand" href="#"><?= $_SESSION['nama'] ?></a>
                </div>
            </div>
        </nav>
    </div>