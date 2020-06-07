<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <title><?= $title; ?></title>
</head>
<body>
<center>
    <table>
        <tr>
            <td>
                <img src="<?= base_url(); ?>assets/img/logotrp.JPG" style="width: 100px; height: 100px;">
            </td>
            <td>&nbsp;</td>
            <td>
                <center>
                    <h3>DATA <?= strtoupper($title); ?></h3>
                    <h4>PT. TANJUNG RAYA PLYWOOD</h4>
                    <h6>Desa Tinggiran II Luar, Barito Kuala</h6>
                </center>
            </td>
        </tr>
    </table>
</center>
<br>
<br>
<table class="table" width="800">
    <tr>
        <td colspan="3" align="center">
            <table width="max">
                <thead>
                    <tr align="center">
                        <th>No.</th>
                        <th>Invoice</th>
                        <th>Tanggal</th>
                        <th>Supplier</th>
                        <th>Kode Kayu</th>
                        <th>Nama</th>
                        <th>Ukuran (Cm)<br><small>P x D1 x D2</small></th>
                        <th>Stok Masuk (Pcs)</th>
                        <th>Kubikasi (M<sup>3</sup>)</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; $totalstok = 0; $totalkubik = 0; ?>
                <?php foreach($kayumasuk as $data) : ?>
                <tr>
                    <?php if (sizeof($data['item']) > 0) : ?>
                    <?php $x = count($data['item']); $row = $x + 1; ?>
                    <td align="center" rowspan="<?php echo $row; ?>"><?= $no; ?></td>
                    <td align="center" rowspan="<?php echo $row; ?>"><?= $data['invoice']; ?></td>
                    <td align="center" rowspan="<?php echo $row; ?>"><?= date('d-m-Y' ,strtotime($data['tgl'])); ?></td>
                    <td align="center" rowspan="<?php echo $row; ?>"><?= $data['nm_sup']; ?></td>
                    <?php foreach($data['item'] as $i) : ?>
                        <tr>
                            <td align="right"><?= $i['kd_kayu']; ?></td>
                            <td align="right"><?= $i['nama']; ?></td>
                            <td align="right"><?= $i['panjang']; ?> x <?= $i['diameter1']; ?> x <?= $i['diameter2']; ?></td>
                            <td align="right"><?= $i['stok_masuk']; ?></td>
                            <td align="right"><?= $i['kubik_masuk']; ?></td>
                        </tr>
                        <?php $totalstok += intval($i['stok_masuk']);
                              $totalkubik += floatval($i['kubik_masuk']);?>
                    <?php endforeach; ?>
                    <td align="center" colspan="7"><b>T O T A L</b></td>
                    <td align="right"><b><?= $totalstok; ?></b></td>
                    <td align="right"><b><?= $totalkubik; ?></b></td>
                <?php endif; ?>
                <?php $no++; ?>
                <?php endforeach; ?>
                </tr>
                </tbody>
            </table>
            <br>
        </td>
    </tr>

</table>
<script>
    // window.print();
</script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
</body>
</html>