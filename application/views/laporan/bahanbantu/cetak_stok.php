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
                    <b>Periode : <?= date('F Y',strtotime($tanggal)); ?></b>
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
                    <!-- <tr>
                        <div class="chart-area" id="grafik"></div>
                    </tr> -->
                    <tr align="center">
                        <th>Kode Bahan</th>
                        <th>Nama</th>
                        <th>Tipe Lem</th>
                        <th>Kategori</th>
                        <!-- <th>Stok Bahan</th> -->
                        <th>Penggunaan Bahan</th>
                        <!-- <th>Bahan yang Tersedia</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php foreach($stokbahan as $item) : ?>
                    <tr>
                        <td><?= $item['kd_bahan'];?></td>
                        <td><?= $item['nama'];?></td>
                        <td><?= $item['tipe_glue'];?></td>
                        <td><?= $item['nm_kateg'];?></td>
                        <!-- <?php if (sizeof($item['item']) > 0) : ?>
                          <?php foreach ($item['item'] as $i) : ?>
                            <td align="right"><?= $i['masuk']; ?> Kg</td>
                          <?php $masuk  = $i['masuk']; endforeach; ?>
                        <?php endif; $keluar = $item['stok_keluar']; $total  = $masuk - $keluar; ?> -->
                        <td align="right"><?= $item['stok_keluar']; ?> Kg</td>
                        <!-- <td align="right"><b><?= $total; ?> Kg</b></td> -->
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="3" style="border: none;"></td>
                        <td colspan="2" align="center" style="border: none;">Tinggiran II Luar, <?= date('d-m-Y'); ?> <br>Dibuat Oleh,</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="border: none;"></td>
                        <td colspan="2" align="center" style="border: none;"></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="border: none;"></td>
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