<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
<body>
    <p>Ini Halaman Create User</p>
    <form action="<?= base_url('/user/store') ?>" method="POST">
        <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>
                <input type="text" name="nama" id="nama">
            </td>
        </tr>
        <tr>
            <td>NPM</td>
            <td>:</td>
            <td>
                <input type="text" name="npm" id="npm">
            </td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td>
                <input type="text" name="kelas" id="kelas">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="submit">
            </td>
    
        </tr>
</table>
    </form>
</body>
</html>