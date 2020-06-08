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
<table class="table">
    <tr>
        <td colspan="3" align="center">
            <table width="max">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Kode Log</th>
                        <th>Jenis</th>
                        <th>Ukuran</th>
                        <th>Stok (pcs)</th>
                        <th>Kubikasi (M<sup>3</sup>)</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                <?php $totalstok = 0; ?>
                <?php $totalkubik = 0; ?>
                <?php foreach($vinirmasuk as $item) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= date('d-m-Y' ,strtotime($item['tgl'])); ?></td>
                        <td><?= $item['kd_kayu']; ?></td>
                        <td><?= $item['nama']; ?></td>
                        <td><?= $item['tebal']; ?> mm x <?= $item['panjang']; ?> x <?= $item['lebar']; ?></td>
                        <td align="right"><?= $item['stok_masuk']; ?></td>
                        <td align="right"><?= $item['kubik_masuk']; ?></td>
                        <?php $totalstok += intval($item['stok_masuk']) ?>
                        <?php $totalkubik += floatval($item['kubik_masuk']) ?>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="5" align="center"><b>T O T A L</b></td>
                    <td align="right"><b><?= $totalstok; ?></b></td>
                    <td align="right"><b><?= $totalkubik; ?></b></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
<script>
    window.print();
</script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
</body>
</html>