<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="<?=base_url("assets/css/style.css")?>">
<body>

    <div class="box">
        <span class="boerderLine"></span>
        <form action="<?= base_url('/user/store') ?>" method="post">
            <h2>Page Create User</h2>
            <div class="inputBox">
                <input name="nama" type="text" required="required">
                <span>Nama</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input name="kelas" type="text" required="required">
                <span>Kelas</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input name="npm" type="text" required="required">
                <span>NPM</span>
                <i></i>
            </div>
            <input type="submit" value="Kirim">
        </form>
    </div>
</body>
</html>