<!--  -->
<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div style="background-color: #717274;">


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
    </div>
    <?= $this->endSection() ?>