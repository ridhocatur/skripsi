<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card shadow">
<div class="card-body">
    <h5>Detail Plywood</h5>
    <table class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Shift</th>
                <th>Tipe Lem</th>
                <th>Lapisan</th>
                <th>Ukuran</th>
                <th>Total Produksi (pcs)</th>
                <th>Total Kubikasi (M<sup>3</sup>)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= date('d-m-Y' ,strtotime($byId->tgl)); ?></td>
                <td><?= $byId->shift; ?></td>
                <td><?= $byId->tipe_glue; ?></td>
                <td><?= $byId->tipe_ply; ?> Ply</td>
                <td><?= $byId->tebal; ?> mm x <?= $byId->panjang; ?> x <?= $byId->lebar; ?></td>
                <td><?= $byId->total_prod; ?></td>
                <td><?= $byId->total_kubik; ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <h5>Detail Penggunaan Vinir</h5>
    <table class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Jenis Kayu</th>
                <th>Jenis Vinir</th>
                <th>Ukuran</th>
                <th>Vinir Terpakai (pcs)</th>
                <th>Kubikasi (M<sup>3</sup>)</th>
            </tr>
        </thead>
        <tbody>
            <?php $total1 = 0; $total2 =  0; foreach($detail as $data) : ?>
            <tr>
                <td><?= $data->nama; ?></td>
                <td><?= ucfirst($data->jenis); ?></td>
                <td><?= $data->tblvin; ?> mm x <?= $data->pjgvin; ?> x <?= $data->lbrvin; ?></td>
                <td align="center"><?= $data->stok_keluar; ?></td>
                <td align="center"><?= $data->kubik_keluar; ?></td>
                <?php $total1 += intval($data->stok_keluar) ?>
                <?php $total2 += floatval($data->kubik_keluar) ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tr>
            <td colspan="3" align="center"><b>TOTAL PENGGUNAAN : </b></td>
            <td align="center"><b><?= $total1; ?></b></td>
            <td align="center"><b><?= $total2; ?></b></td>
        </tr>
    </table>
    <br>
    <div class="row justify-content-center">
        <a href="<?= base_url('plywood'); ?>" class="btn btn-outline-secondary btn-lg"><i class="fa fa-arrow-circle-left" ></i> Kembali</a>
    </div>
</div>
</div>