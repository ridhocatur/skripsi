<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h4>Supplier : <b><?= $byId->nm_sup; ?></b></h4>
    <h5>Tanggal : <b><?= date('d-F-Y' ,strtotime($byId->tgl)); ?></b></h5>
    <br>
</div>
<div class="card-body">
    <table class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr style="text-align: center;">
                <th style="width: 20%">Kode Kayu</th>
                <th style="width: 20%">Jenis Kayu</th>
                <th style="width: 20%">Ukuran Kayu Log (Cm)<br><small>P x D1 x D2</small></th>
                <th style="width: 20%">Stok Masuk</th>
                <th style="width: 20%">Kubik Masuk</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($detail as $data) : ?>
            <tr>
                <td><?= $data->kd_kayu; ?></td>
                <td><?= $data->nama; ?></td>
                <td><?= $data->panjang; ?> x <?= $data->diameter1; ?> x <?= $data->diameter2; ?></td>
                <td style="text-align: center;"><?= $data->stok_masuk; ?></td>
                <td style="text-align: right;"><?= $data->kubik_masuk; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tr>
            <th colspan="3"><center> <b>TOTAL : </b> </center></th>
            <th style="text-align: center;"><?= $byId->jml_stok; ?></th>
            <th style="text-align: right;"><?= $byId->jml_kubik; ?></th>
        </tr>
    </table>
    <br>
    <div class="row justify-content-center">
        <a href="<?= base_url('kayumasuk'); ?>" class="btn btn-outline-secondary btn-lg"><i class="fa fa-arrow-circle-left" ></i> Kembali</a>
    </div>
</div>
</div>