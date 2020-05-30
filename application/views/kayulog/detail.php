<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h4>Invoice : <b><?= $byId->invoice; ?></b></h4>
    <h4>Supplier : <b><?= $byId->nm_sup; ?></b></h4>
    <h5>Tanggal : <b><?= date('d-F-Y' ,strtotime($byId->tgl)); ?></b></h5>
    <br>
    <a class="btn btn-outline-info" href="<?= base_url(); ?>kayumasuk">Kembali</a>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="width: 25%">Kode Kayu</th>
                <th style="width: 25%">Ukuran Kayu Log (Cm)<br><small>P x D1 x D2</small></th>
                <th style="width: 25%">Stok Masuk</th>
                <th style="width: 25%">Kubik Masuk</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($detail as $data) : ?>
            <tr>
                <td value="<?= $data->id; ?>"><?= $data->kd_kayu; ?></td>
                <td><?= $data->panjang; ?> x <?= $data->diameter1; ?> x <?= $data->diameter2; ?></td>
                <td><?= $data->stok_masuk; ?></td>
                <td><?= $data->kubik_masuk; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tr>
            <th colspan="2"><center> <b>TOTAL : </b> </center></th>
            <th><?= $byId->jml_stok; ?></th>
            <th><?= $byId->jml_kubik; ?></th>
        </tr>
    </table>
    <br>
</div>
</div>