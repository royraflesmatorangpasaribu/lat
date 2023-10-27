<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('./assets/CSS/style.css'); ?>">
    <style>
        /* CSS kustom untuk mengatur tampilan */
        .custom-container {
            background-color: transparent;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .custom-form {
            background-color: rgba(255, 255, 255, 0.8); /* Latar belakang transparan */
            padding: 20px;
            border-radius: 10px;
            border:100px;
        }
    </style>
</head>
<body>
<div class="navbar">
        <div class="navbar-container">
            <a class="brand" href="#">
                <img src="https://drive.google.com/uc?id=1jPPaKCLavSTLcfcpwCh1JBgmdfWnbvmb" alt="Logo" /> Universitas Lampung
            </a>
            <ul>
                <li><a href="<?= base_url('/') ?>">Home</a></li>
                <li><a href="<?= base_url('/user') ?>">List Users</a></li>
                <li><a href="<?= base_url('/kelas') ?>">List Kelas</a></li>
            </ul>
        </div>
    </div>
    <?= $this->renderSection('content')?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>