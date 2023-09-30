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
    
    <!-- <a href="#" type="button" class="btn btn-primary">Tambah Data</a> -->

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
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
    </table>
</div>
<?= $this->endSection() ?>