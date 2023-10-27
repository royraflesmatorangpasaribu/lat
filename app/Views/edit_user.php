<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div style="background-color: #717274;">
    <div class="container custom-container">
        <div class="col-md-6 custom-form">
            <h1 class="text-center" style="color: #717274;">Page Edit User</h1>
            <?php $nama_kelas = session()->getFlashdata('nama_kelas'); ?>
            <form action="<?= base_url('/user/' . $user['id']) ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <?= csrf_field() ?>
                <div class="mb-3">
                <center>
                <img src="<?= $user['foto'] ?? base_url('/assets/img/foto_def.png')?>" alt="foto" style="height: 250px; width: 250px; border-radius: 50%; object-fit: cover; object-position: 0 -8px;"  border="2px" ><br>
                Priview Foto
                </center>  
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control <?= (empty(validation_show_error('foto'))) ? '' : 'is-invalid' ?>"  id="foto" name="foto">
                    <div class='invalid-feedback'>
                        <?= validation_show_error('foto'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input name="nama" type="text"  class="form-control <?= (empty(validation_show_error('nama'))) ? '' : 'is-invalid' ?>"  value="<?= $user['nama'] ?>" id="nama" placeholder="Ex : Budi Ahmad">
                    <div class='invalid-feedback'>
                        <?= validation_show_error('nama'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="npm" class="form-label">NPM</label>
                    <input name="npm" type="text" class="form-control <?= (empty(validation_show_error('npm'))) ? '' : 'is-invalid' ?>"  value="<?= $user['npm'] ?>" id="npm" placeholder="Ex : 2117051000">
                    <div class='invalid-feedback'>
                        <?= validation_show_error('npm'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="kelas" class="col-sm-10 col-form-label">Kelas</label>
                    <select name="kelas" id="kelas" class="form-select <?= (empty(validation_show_error('kelas'))) ? '' : 'is-invalid' ?>" >
                        
                        <?php
                        foreach ($kelas as $item){
                        ?>
                            <option value="<?= $item['id']?>" <?=$user['id_kelas'] == $item['id']? 'selected' : ''?>> 
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
</div>

<?= $this->endSection() ?>