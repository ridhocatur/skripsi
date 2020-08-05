<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3>Jenis Kayu : <b><?= $detail->nama; ?></b></h3>
        <h5>Shift : <b><?= $detail->shift; ?></b></h5>
        <h5>Tanggal : <b><?= date('d-F-Y' ,strtotime($detail->tgl)); ?></b></h5>
    </div>
    <div class="card-body">
        <div class="row">
            <h5>Detail Kayu Log</h5>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                <label for="jeniskayu">Kode Log</label>
                <input type="text" name="jeniskayu" id="jeniskayu" class="form-control" value="<?= $detail->kd_kayu; ?>" readonly>
            </div>
            <div class="col-md-2">
                <label for="perlog">Jumlah Log Terpakai (pcs)</label>
                <input type="text" name="perlog" id="perlog" class="form-control" value="<?= $detail->jml_log; ?>" readonly>
            </div>
            <div class="col-md-2">
                <label for="jmlkubik">Jumlah Log Terpakai (M<sup>3</sup>)</label>
                <input type="text" name="jmlkubik" id="jmlkubik" class="form-control" value="<?= $detail->kubik_log; ?>" readonly>
            </div>
        </div>
        <hr>
        <div class="row">
            <h5>Ukuran Vinir</h5>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
                <label for="ukurpot">Tebal</label>
                <input type="text" name="tebal" id="tebal" class="form-control" value="<?= $detail->tebal; ?> mm" readonly>
            </div>
            <div class="col-md-2">
                <label for="ukurpot">Panjang</label>
                <input type="text" name="tebal" id="tebal" class="form-control" value="<?= $detail->panjang; ?> mm" readonly>
            </div>
            <div class="col-md-2">
                <label for="ukurpot">Lebar</label>
                <input type="text" name="tebal" id="tebal" class="form-control" value="<?= $detail->lebar; ?> mm" readonly>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <label for="ttl_vinir">Total Vinir (pcs)</label>
                <input type="text" name="ttl_vinir" id="ttl_vinir" class="form-control" value="<?= $detail->stok_masuk; ?>" readonly>
            </div>
            <div class="col-md-3">
                <label for="ttl_kubik">Total Vinir (M<sup>3</sup>)</label>
                <input type="text" name="ttl_kubik" id="ttl_kubik" class="form-control" value="<?= $detail->kubik_masuk; ?>" readonly>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <a href="<?= base_url('vinirmasuk'); ?>" class="btn btn-secondary btn-lg"><i class="fa fa-arrow-circle-left" ></i> Kembali</a>
</div>