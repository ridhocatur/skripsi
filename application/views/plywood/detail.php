<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h4>Tipe Lem : <b><?= $data2['vinir']['tipe_glue']; ?></b></h4>
    <h5>Shift : <b><?= $data2['vinir']['shift']; ?></b></h5>
    <h5>Tanggal : <b><?= date('d-F-Y' ,strtotime($data2['vinir']['tgl'])); ?></b></h5>
    <a class="btn btn-info" href="<?= BASEURL; ?>/vinirkeluar/">Kembali</a>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Jenis</th>
                <th>Ukuran</th>
                <th>Stok Keluar</th>
                <th>Kubikasi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['dtl_vinir'] as $data) : ?>
            <tr>
                <td><?= $data['kd_jenis']; ?></td>
                <td><?= $data['ukuran']; ?></td>
                <td><?= $data['stok_keluar']; ?></td>
                <td><?= $data['kubik_keluar']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tr>
            <td colspan="2"><center> <b>TOTAL : </b> </center></td>
            <td><?= $data2['vinir']['jml_stok']; ?></td>
            <td><?= $data2['vinir']['jml_kubikasi']; ?></td>
        </tr>
    </table>
    <br>
</div>
</div>