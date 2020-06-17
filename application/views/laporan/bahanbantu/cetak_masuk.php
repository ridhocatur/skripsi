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
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Kode Bahan</th>
                        <th>Supplier</th>
                        <th>Stok Masuk (Kg)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php $total = 0; ?>
                    <?php foreach($bahanmasuk as $item) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= date('d-m-Y' ,strtotime($item->tgl));?></td>
                            <td><?= $item->nama;?></td>
                            <td align="center"><?= $item->kd_bahan; ?></td>
                            <td><?= $item->nm_sup;?></td>
                            <td align="right"><?= $item->stok_masuk; ?></td>
                            <?php $total += intval($item->stok_masuk) ?>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="5" align="center"><b>T O T A L</b></td>
                        <td align="right"><b><?= $total; ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="border: none;"></td>
                        <td colspan="2" align="center" style="border: none;">Tinggiran II Luar, <?= date('d-m-Y'); ?> <br>Dibuat Oleh,</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="border: none;"></td>
                        <td colspan="2" align="center" style="border: none;"></td>
                    </tr>
                    <tr>
                        <td colspan="4" style="border: none;"></td>
                        <td colspan="2" align="center" style="border: none;"><?= $this->fungsi->user_login()->nama; ?></td>
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