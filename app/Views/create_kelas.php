<!--  -->
<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<div style="background-color: #717274;">


    <div class="container custom-container">
        <div class="col-md-6 custom-form">
            <h1 class="text-center" style="color: #717274;">Page Create Kelas</h1>
            <?php $nama_kelas = session()->getFlashdata('nama_kelas'); ?>
            <form action="<?= base_url('/kelas/store') ?>" method="post" enctype="multipart/form-data">
            <center>
                <img src="https://drive.google.com/uc?id=16Y9B5FQ58wxFVGe0ej0QVLvix0yZUqAe" style="width: 610px;">
            </center> 
               
                <div class="mb-3">
                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                    <input name="nama_kelas" type="text"  class="form-control <?= (empty(validation_show_error('nama_kelas'))) ? '' : 'is-invalid' ?>"  value="<?= old('nama_kelas') ?>" id="nama_kelas" placeholder="Ex : A">
                    <div class='invalid-feedback'>
                        <?= validation_show_error('nama_kelas'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="dayaTampung" class="form-label">Daya Tampung</label>
                    <input name="dayaTampung" type="text"  class="form-control <?= (empty(validation_show_error('dayaTampung'))) ? '' : 'is-invalid' ?>"  value="<?= old('dayaTampung') ?>" id="dayaTampung" placeholder="Ex : 20">
                    <div class='invalid-feedback'>
                        <?= validation_show_error('dayaTampung'); ?>
                    </div>
                </div>
               
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-secondary">Tambah Kelas</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <?= $this->endSection() ?>