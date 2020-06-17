<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h3>Tipe Lem : <b><?= $byId->tipe_glue; ?></b></h3>
    <h5>Shift : <b><?= $byId->shift; ?></b></h5>
    <h5>Tanggal : <b><?= date('d-F-Y' ,strtotime($byId->tgl)); ?></b></h5>
    <a class="btn btn-info" href="<?= base_url(); ?>gluemix">Kembali</a>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Kode Bahan</th>
                <th>Stok Keluar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($detail as $data) : ?>
            <tr>
                <td value="<?= $data->id_bahan; ?>"><?= $data->kd_bahan; ?></td>
                <td><?= $data->stok_keluar; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tr>
            <th style="display: none;"></th>
            <th><center> <b>TOTAL : </b> </center></th>
            <th><?= $byId->total; ?></th>
        </tr>
    </table>
    <br>
</div>
</div>