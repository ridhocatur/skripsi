<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php elseif ($this->session->flashdata('danger')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $this->session->flashdata('danger'); ?>
    </div>
<?php endif; ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Selamat Datang!</h1>
</div>

<div style="text-align: center;">
    <!-- <img src="<?= base_url(); ?>assets\img\logotrp.JPG" alt="" align="center" style="width: 35%; height: 35%;"> -->
    <h1>PT. TANJUNG RAYA PLYWOOD</h1>
    <h4>Desa Tinggiran II Luar, Kec. Tamban, Kel. Barito Kuala, Banjarmasin</h4>
</div>