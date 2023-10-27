<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div style="background-color: #717274;">
    <div class="container custom-container">
        <div class="col-md-6 custom-form">
            <h1 class="text-center" style="color: #717274;">Page Edit Kelas</h1>
            <?php $nama_kelas = session()->getFlashdata('nama_kelas'); ?>
            <form action="<?= base_url('/kelas/' . $kelas['id']) ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            <?= csrf_field() ?>
             
                <div class="mb-3">
                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                    <input name="nama_kelas" type="text"  class="form-control <?= (empty(validation_show_error('nama_kelas'))) ? '' : 'is-invalid' ?>"  value="<?= $kelas['nama_kelas'] ?>" id="nama_kelas" placeholder="Ex : A">
                    <div class='invalid-feedback'>
                        <?= validation_show_error('nama_kelas'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="dayaTampung" class="form-label">Daya Tampung</label>
                    <input name="dayaTampung" type="text"  class="form-control <?= (empty(validation_show_error('dayaTampung'))) ? '' : 'is-invalid' ?>"  value="<?= $kelas['dayaTampung'] ?>" id="dayaTampung" placeholder="Ex : 20">
                    <div class='invalid-feedback'>
                        <?= validation_show_error('dayaTampung'); ?>
                    </div>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-secondary">Update Kelas</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>