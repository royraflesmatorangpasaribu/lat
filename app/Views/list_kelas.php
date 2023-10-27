<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="databasetabd">
    <div class="container">
        <a href="<?= base_url('kelas/create') ?>" type="button" class="btn btn-primary mb-3">Tambah Kelas</a>
    <!-- Tabel -->
        <main class="table">
            <section class="table__header">
                <h1>Data Kelas</h1>   
            </section>
                
            <section class="table__body"> 
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th class="col justify-content-center text-center" >ID</th>
                            <th class="col justify-content-center text-center" >Nama Kelas</th>
                            <th class="col justify-content-center text-center" >Daya Tampung</th>
                            <th class="col justify-content-center text-center" style="width: 220px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($kelas as $key){
                        ?>
                            <tr>
                                <td class="col justify-content-center text-center"><?= $key['id'] ?></td>
                                <td class="col justify-content-center text-center"><?= $key['nama_kelas'] ?></td>
                                <td class="col justify-content-center text-center"><?= $key['dayaTampung'] ?></td>
                                <td class="col justify-content-center text-center">
                                    <a href="<?= base_url('kelas/' . $key['id'] . '/edit') ?>" class="btn btn-warning">Edit</a>
                                    <form action="<?= base_url('kelas/' . $key['id']) ?>" method="post" style="display:inline-block">
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