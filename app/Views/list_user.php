<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="databasetab">
    <div class="container">
        <a href="<?= base_url('user/create') ?>" type="button" class="btn btn-primary mb-3">Tambah Data</a>
        <!-- Tabel -->
        <main class="table">
            <section class="table__header">
                <h1>Data Mahasiswa</h1>
            </section>    
            <section class="table__body"> 
        
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
            </section>
        </main>
    </div>
</div>
<?= $this->endSection() ?>