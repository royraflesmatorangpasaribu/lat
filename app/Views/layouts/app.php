<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
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
    
    <?= $this->renderSection('content')?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>