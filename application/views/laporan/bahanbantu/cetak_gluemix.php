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
                        <th>Tanggal</th>
                        <th>Shift</th>
                        <th>Glue LFE</th>
                        <th>Glue MF</th>
                        <th>Tepung</th>
                        <th>HU-100</th>
                        <th>HU-103</th>
                        <th>HU-360</th>
                        <th>Total Penggunaan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($gluemix as $data) : ?>
                    <tr>
                        <td align="center"><?= $no; ?></td>
                        <td align="center"><?= date('d-m-Y' ,strtotime($data['tgl'])); ?></td>
                        <td align="center"><?= $data['shift']; ?></td>
                        <?php if (sizeof($data['item']) > 0) : ?>
                        <?php foreach($data['item'] as $i) : ?>
                        <td align="right"><?= $i['stok_keluar']; ?>&nbsp;kg</td>
                        <?php endforeach; ?>
                        <td align="right"><b><?= $data['total']; ?>&nbsp;kg</b></td>
                    <?php endif; ?>
                    <?php $no++; ?>
                    <?php endforeach; ?>
                    </tr>
                    <tr>
                        <td colspan="8" style="border: none;"></td>
                        <td colspan="2" align="center" style="border: none;">Tinggiran II Luar, <?= date('d-m-Y'); ?> <br>Dibuat Oleh,</td>
                    </tr>
                    <tr>
                        <td colspan="8" style="border: none;"></td>
                        <td colspan="2" align="center" style="border: none;"></td>
                    </tr>
                    <tr>
                        <td colspan="8" style="border: none;"></td>
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