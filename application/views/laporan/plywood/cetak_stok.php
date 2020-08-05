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
                        <th rowspan="2" style="vertical-align: middle;">No.</th>
                        <th rowspan="2" style="vertical-align: middle;">Tanggal</th>
                        <th rowspan="2" style="vertical-align: middle;">Shift</th>
                        <th rowspan="2" style="vertical-align: middle;">Tipe Lem</th>
                        <th rowspan="2" style="vertical-align: middle;">Jenis Ketebalan</th>
                        <th rowspan="2" style="vertical-align: middle;">Ukuran</th>
                        <th rowspan="2" style="vertical-align: middle;">Total Plywood (pcs)</th>
                        <th rowspan="2" style="vertical-align: middle;">Kubikasi (M<sup>3</sup>)</th>
                        <th colspan="5">Detail Pemakaian Vinir</th>
                    </tr>
                    <tr align="center">
                        <th style="vertical-align: middle;">Jenis Kayu</th>
                        <th style="vertical-align: middle;">Jenis Vinir</th>
                        <th style="vertical-align: middle;">Ukuran</th>
                        <th style="vertical-align: middle;">Vinir Terpakai (pcs)</th>
                        <th style="vertical-align: middle;">Kubikasi (M<sup>3</sup>)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($plywood as $data) : ?>
                    <tr>
                        <?php if (sizeof($data['item']) > 0) : ?>
                        <?php $x = count($data['item']); $row = $x + 1; ?>
                        <td align="center" rowspan="<?php echo $row; ?>"><?= $no; ?></td>
                        <td align="center" rowspan="<?php echo $row; ?>"><?= date('d-m-Y' ,strtotime($data['tgl'])); ?></td>
                        <td align="center" rowspan="<?php echo $row; ?>"><?= $data['shift']; ?></td>
                        <td align="center" rowspan="<?php echo $row; ?>"><?= $data['tipe_glue']; ?></td>
                        <td align="center" rowspan="<?php echo $row; ?>"><?= $data['tipe_ply']; ?> Ply</td>
                        <td align="center" rowspan="<?php echo $row; ?>"><?= $data['tebal']; ?> mm x <?= $data['panjang']; ?> x <?= $data['lebar']; ?></td>
                        <td align="center" rowspan="<?php echo $row; ?>"><?= $data['total_prod']; ?></td>
                        <td align="center" rowspan="<?php echo $row; ?>"><?= $data['total_kubik']; ?></td>
                        <?php foreach($data['item'] as $i) : ?>
                            <tr>
                                <td><?= $i['nama']; ?></td>
                                <td><?= ucfirst($i['jenis']); ?></td>
                                <td><?= $i['tblvin']; ?> x <?= $i['pjgvin']; ?> x <?= $i['lbrvin']; ?></td>
                                <td align="center"><?= $i['stok_keluar']; ?></td>
                                <td align="right"><?= $i['kubik_keluar']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <?php $no++; ?>
                        <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td colspan="11" style="border: none;"></td>
                        <td colspan="2" align="center" style="border: none;">Tinggiran II Luar, <?= date('d-m-Y'); ?> <br>Dibuat Oleh,</td>
                    </tr>
                    <tr>
                        <td colspan="11" style="border: none;"></td>
                        <td colspan="2" align="center" style="border: none;"></td>
                    </tr>
                    <tr>
                        <td colspan="11" style="border: none;"></td>
                        <td colspan="2" align="center" style="border: none;"><?= $this->fungsi->user_login()->nama; ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
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