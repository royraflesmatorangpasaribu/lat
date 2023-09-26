<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <!-- Tambahkan link ke Bootstrap CSS -->
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
<body style="background-color: #717274;">
    <div class="container custom-container">
        <div class="col-md-6 custom-form">
            <h1 class="text-center" style="color: #717274;">Page Create User</h1>
            <?php $nama_kelas = session()->getFlashdata('nama_kelas'); ?>
            <form action="<?= base_url('/user/store') ?>" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input name="nama" type="text"  class="form-control <?= (empty(validation_show_error('nama'))) ? '' : 'is-invalid' ?>"  value="<?= old('nama') ?>" id="nama" placeholder="Ex : Budi Ahmad">
                    <div class='invalid-feedback'>
                        <?= validation_show_error('nama'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="npm" class="form-label">NPM</label>
                    <input name="npm" type="text" class="form-control <?= (empty(validation_show_error('npm'))) ? '' : 'is-invalid' ?>"  value="<?= old('npm') ?>" id="npm" placeholder="Ex : 2117051000">
                    <div class='invalid-feedback'>
                        <?= validation_show_error('npm'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="col-sm-10 col-form-label">Kelas</label>
                    <select name="kelas" id="kelas" class="form-select <?= (empty(validation_show_error('kelas'))) ? '' : 'is-invalid' ?>" >
                        <option selected hidden value="<?= old('kelas') ?>">
                            <?= ($nama_kelas == '')? 'Pilih Kelas' : $nama_kelas?>
                        </option>
                        <?php
                        foreach ($kelas as $item){
                        ?>
                            <option value="<?= $item['id']?>">
                                <?= $item['nama_kelas']?>
                            </option>
                        <?php
                        } 
                        ?>
                    </select>
                    <div class='invalid-feedback'>
                        <?= validation_show_error('kelas'); ?>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-secondary">Kirim</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1