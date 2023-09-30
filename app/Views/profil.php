<div style="background-color: #717274;">
<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>


<nav class="navbar navbar-expand-lg bg-body-tertiary" >
    <div class="container-fluid" >
        <a class="navbar-brand" href="#">Profile</a>
     </div>
</nav>
    <div style="text-align:center;">
        <img src="<?php echo base_url('assets/img/foto_royraflesmatorangpasaribu.jpg'); ?>" alt="fotoroy" style="height: 260px; width: 260px; border-radius: 50%; object-fit: cover; object-position: 0 -8px;"  border="2px" ><br>
        <p><h2><b>Hi, I'm</b></h2></p>  
        <button type="button" class="btn btn-secondary" style="width: 300px;"><?= $nama ?></button><br><br>
        <button type="button" class="btn btn-secondary" style="width: 300px;">Kelas <?= $kelas ?></button><br><br>
        <button type="button" class="btn btn-secondary" style="width: 300px;">NPM <?= $npm ?></button><br><br>
        <p><i>@Computer Science 2021 University of Lampung</i></p>
    </div>
</div>
<?= $this->endSection() ?>