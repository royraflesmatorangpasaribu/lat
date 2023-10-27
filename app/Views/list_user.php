<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?php $no = 1; ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <!-- Navbar -->
    <div class="container-fluid">
        <a class="navbar-brand" href="#">List User</a>
    </div>
</nav>

<div class="container">
    <figure>
        <h1>College Student Data</h1>
            <blockquote class="blockquote">
                <p>Data Mahasiswa yang ada didalam Database</p>
            </blockquote>
        <figcaption class="blockquote-footer">
            FMIPA <cite title="Source Title">Ilmu Komputer @2023</cite>
        </figcaption>
    </figure>
    
    <a href="<?= base_url('user/create') ?>" type="button" class="btn btn-primary mb-3">Tambah Data</a>

    <!-- Tabel -->
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th class="col justify-content-center text-center" >ID</th>
                <th class="col justify-content-center text-center" >Nama</th>
                <th class="col justify-content-center text-center" >NPM</th>
                <th class="col justify-content-center text-center" >Kelas</th>
                <th class="col justify-content-center text-center" style="width: 220px;">Aksi</th>
            </tr>
            </thead>
                <tbody>
                    <?php 
                        foreach($users as $user){
                    ?>
                        <tr>
                            <td class="col justify-content-center text-center"><?= $user['id'] ?></td>
                            <td class="col justify-content-center"><?= $user['nama'] ?></td>
                            <td class="col justify-content-center text-center"><?= $user['npm'] ?></td>
                            <td class="col justify-content-center text-center"><?= $user['nama_kelas'] ?></td>
                            <td class="col justify-content-center text-center">
                                <a href="<?= base_url('user/' . $user['id']) ?>" class="btn btn-success">Detail</a>
                                <a href="<?= base_url('user/' . $user['id'] . '/edit') ?>" class="btn btn-warning">Edit</a>
                                <form action="<?= base_url('user/' . $user['id']) ?>" method="post" style="display:inline-block">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
    </table>
</div>
<?= $this->endSection() ?>