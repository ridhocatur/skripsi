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
                    <tr align="center">
                        <th>No.</th>
                        <th>Kode Kayu Log</th>
                        <th>Nama</th>
                        <th>Stok (Pcs)</th>
                        <th>Kubikasi (M<sup>3</sup>)</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1; ?>
                <?php $total1 = 0; $total2 =  0; ?>
                <?php foreach($stokkayu as $item) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $item->kd_kayu;?></td>
                        <td><?= $item->nama;?></td>
                        <td align="right"><?= $item->stok; ?></td>
                        <td align="right"><?= $item->kubikasi; ?></td>
                        <?php $total1 += intval($item->stok) ?>
                        <?php $total2 += floatval($item->kubikasi) ?>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" align="center"><b>T O T A L</b></td>
                    <td align="right"><b><?= $total1; ?></b></td>
                    <td align="right"><b><?= $total2; ?></b></td>
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