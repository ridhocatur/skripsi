<!-- Page Heading -->
<div class="card shadow col-md-8">
<div class="card-body">
    <form action="" method="POST">
        <div class="row">
            <label>Menu yang Ingin Di Cetak</label>
        </div>
        <div class="mb-3 row">
            <div class="col-md-6">
                <select class="form-control menu_utama" name="menu_utama" id="menu_utama" onchange="menuUtama()">
                    <option value="d" selected disabled>-- Pilih Data --</option>
                    <option value="bahanbantu">Bahan Bantu</option>
                    <option value="kayulog">Kayu Log</option>
                    <option value="vinir">Vinir</option>
                    <option value="plywood">Plywood</option>
                </select>
            </div>
            <div class="col-md-6">
                <select class="form-control" name="menu_bahan" id="menu_bahan" style="display: none;" onchange="menuBahan()">
                    <option selected disabled>-- Pilih Data Bahan Bantu--</option>
                    <option value="stokbahansemua">Stok Bahan Bantu (Semua)</option>
                    <option value="stokbahanbulan">Stok Bahan Bantu (Per Bulan)</option>
                    <option value="bahanmasuk">Pemasukan Bahan Bantu</option>
                    <option value="gluemix">Pengadukan Bahan / Gluemix</option>
                </select>
                <select class="form-control" name="menu_kayu" id="menu_kayu" style="display: none;" onchange="menuKayu()">
                    <option selected disabled>-- Pilih Data Kayu --</option>
                    <option value="stokkayu">Stok Kayu Log</option>
                    <option value="kayumasuk">Pemasukan Kayu Log</option>
                </select>
                <select class="form-control" name="menu_vinir" id="menu_vinir" style="display: none;" onchange="menuVinir()">
                    <option selected disabled>-- Pilih Data Vinir--</option>
                    <option value="stokvinir">Stok Vinir</option>
                    <option value="vinirmasuk">Pengolahan Vinir</option>
                </select>
                <select class="form-control" name="menu_plywood" id="menu_plywood" style="display: none;" onchange="menuPlywood()">
                    <option selected disabled>-- Pilih Data Plywood--</option>
                    <option value="plywood">Hasil Produksi Plywood</option>
                </select>
            </div>
        </div>
        <div class="row">
        <table class="table table-borderless">
            <tr>
                <td style="width: 50%;" align="center" rowspan="3">
                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%" value="">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                    <input type="hidden" name="satutgl" id="satutgl" value="" disabled>
                    <input type="hidden" name="duatgl" id="duatgl" value="" disabled>

                </td>
            </tr>
            <tr>
                <td style="width: 25%;">
                    <select class="form-control" name="select1" id="select1">
                    </select>
                </td>
                <td style="width: 25%;">
                    <select class="form-control" name="select2" id="select2">
                    </select>
                </td>
                <tr>
                    <td colspan="2">
                        <select class="form-control" name="shift" id="shift" disabled>
                            <option value="d" selected disabled>-- Pilih Shift --</option>
                            <option value="">Semua Shift</option>
                            <option value="1">Shift 1</option>
                            <option value="2">Shift 2</option>
                        </select>
                    </td>
                </tr>
            </tr>
        </table>
        </div>
        <button type="submit" class="btn btn-outline-success tombolcetak" formtarget="_blank">Tampilkan</button>
        <button type="button" class="btn btn-outline-danger" onclick="clearForm()">Clear</button>
    </form>
    <p><small>*Untuk Satu Tanggal, isi salah satu kolom pada tanggal</small></p>
    </div>
</div>

<script type="text/javascript">
    var selukuran = '<option selected disabled>- Pilih Ukuran -</option><option value="">Semua Ukuran</option><?php foreach($ukuran as $data): ?><option value="<?= $data->id; ?>"><?= $data->panjang; ?> x <?= $data->lebar; ?></option><?php endforeach; ?>';

    var seljeniskayu = '<option selected disabled>- Pilih Jenis Kayu -</option><option value="">Semua Jenis Kayu</option><?php foreach($jeniskayu as $data): ?><option value="<?= $data->id; ?>"><?= $data->nama; ?></option><?php endforeach; ?>';

    var selkategori = '<option selected disabled>- Pilih Kategori -</option><option value="">Semua Kategori</option><?php foreach($kategori as $data): ?><option value="<?= $data->id; ?>"><?= $data->nm_kateg; ?></option><?php endforeach; ?>';

    var selsupbahan = '<option selected disabled>- Pilih Supplier -</option><option value="">Semua Supplier</option><?php foreach($supbahan as $data): ?><option value="<?= $data->id; ?>"><?= $data->nm_sup; ?></option><?php endforeach; ?>';

    var selsupkayu = '<option selected disabled>- Pilih Supplier -</option><option value="">Semua Supplier</option><?php foreach($supkayu as $data): ?><option value="<?= $data->id; ?>"><?= $data->nm_sup; ?></option><?php endforeach; ?>';

    var selkayulog = '<option selected disabled>- Pilih Kode Log -</option><option value="">Semua Kayu Log</option><?php foreach($kayulog as $data): ?><option value="<?= $data->id; ?>"><?= $data->kd_kayu; ?></option><?php endforeach; ?>';

    var seltipeglue ='<option selected disabled>-- Pilih Tipe Lem --</option><option value="">Semua Tipe Lem</option><option value="Type-1 Melamine">Type-1 Melamine</option><option value="Type-2 LFE">Type-2 LFE</option>';

    function menuUtama()
    {
        if ($('#menu_utama').val() == 'bahanbantu') {
            $('#menu_bahan').attr('style', 'display: show');
            $('#menu_kayu').attr('style', 'display: none');
            $('#menu_vinir').attr('style', 'display: none');
            $('#menu_plywood').attr('style', 'display: none');
        } else if($('#menu_utama').val() == 'kayulog') {
            $('#menu_bahan').attr('style', 'display: none');
            $('#menu_kayu').attr('style', 'display: show');
            $('#menu_vinir').attr('style', 'display: none');
            $('#menu_plywood').attr('style', 'display: none');
        } else if($('#menu_utama').val() == 'vinir') {
            $('#menu_bahan').attr('style', 'display: none');
            $('#menu_kayu').attr('style', 'display: none');
            $('#menu_vinir').attr('style', 'display: show');
            $('#menu_plywood').attr('style', 'display: none');
        } else if($('#menu_utama').val() == 'plywood') {
            $('#menu_bahan').attr('style', 'display: none');
            $('#menu_kayu').attr('style', 'display: none');
            $('#menu_vinir').attr('style', 'display: none');
            $('#menu_plywood').attr('style', 'display: show');
        } else {
            $('#menu_bahan').attr('style', 'display: none');
            $('#menu_kayu').attr('style', 'display: none');
            $('#menu_vinir').attr('style', 'display: none');
            $('#menu_plywood').attr('style', 'display: none');
        }
    }

    function menuBahan(){
        if ($('#menu_bahan').val() == 'stokbahansemua') {
            $('.card-body form').attr('action', '<?= base_url(); ?>laporan/stokbahan');
            $('#satutgl').attr('disabled', true);
            $('#duatgl').attr('disabled', true);
            $('#select1').empty();
            $('#select2').empty();
            $('#shift').attr('disabled', true);
        } else if($('#menu_bahan').val() == 'stokbahanbulan') {
            $('.card-body form').attr('action', '<?= base_url(); ?>laporan/stokbahanbulan');
            $('#satutgl').attr('disabled', false);
            $('#duatgl').attr('disabled', true);
            $('#select1').empty();
            $('#select2').empty();
            $('#shift').attr('disabled', true);
        } else if($('#menu_bahan').val() == 'bahanmasuk') {
            $('.card-body form').attr('action', '<?= base_url(); ?>laporan/bahanmasuk');
            $('#satutgl').attr('disabled', false);
            $('#duatgl').attr('disabled', false);
            $('#select1').html(selsupbahan);
            $('#select2').empty();
            $('#shift').attr('disabled', true);
        } else if($('#menu_bahan').val() == 'gluemix') {
            $('.card-body form').attr('action', '<?= base_url(); ?>laporan/gluemix');
            $('#satutgl').attr('disabled', false);
            $('#duatgl').attr('disabled', false);
            $('#select1').html(seltipeglue);
            $('#select2').empty();
            $('#shift').attr('disabled', false);
        } else {
            $('#satutgl').attr('disabled', true);
            $('#duatgl').attr('disabled', true);
            $('#select1').empty();
            $('#select2').empty();
            $('#shift').attr('disabled', true);
        }
    }

    function menuKayu(){
        if ($('#menu_kayu').val() == 'stokkayu') {
            $('.card-body form').attr('action', '<?= base_url(); ?>laporan/stokkayu');
            $('#satutgl').attr('disabled', true);
            $('#duatgl').attr('disabled', true);
            $('#select1').html(seljeniskayu);
            $('#select2').empty();
            $('#shift').attr('disabled', true);
        } else if($('#menu_kayu').val() == 'kayumasuk') {
            $('.card-body form').attr('action', '<?= base_url(); ?>laporan/kayumasuk');
            $('#satutgl').attr('disabled', false);
            $('#duatgl').attr('disabled', false);
            $('#select1').html(seljeniskayu);
            $('#select2').html(selsupkayu);
            $('#shift').attr('disabled', true);
        } else {
            $('#satutgl').attr('disabled', true);
            $('#duatgl').attr('disabled', true);
            $('#select1').empty();
            $('#select2').empty();
            $('#shift').attr('disabled', true);
        }
    }

    function menuVinir(){
        if ($('#menu_vinir').val() == 'stokvinir') {
            $('.card-body form').attr('action', '<?= base_url(); ?>laporan/stokvinir');
            $('#satutgl').attr('disabled', true);
            $('#duatgl').attr('disabled', true);
            $('#select1').html(selukuran);
            $('#select2').html(seljeniskayu);
            $('#shift').attr('disabled', true);
        } else if($('#menu_vinir').val() == 'vinirmasuk') {
            $('.card-body form').attr('action', '<?= base_url(); ?>laporan/vinirmasuk');
            $('#satutgl').attr('disabled', false);
            $('#duatgl').attr('disabled', false);
            $('#select1').html(selkayulog);
            $('#select2').empty();
            $('#shift').attr('disabled', true);
        } else {
            $('#satutgl').attr('disabled', true);
            $('#duatgl').attr('disabled', true);
            $('#select1').empty();
            $('#select2').empty();
            $('#shift').attr('disabled', true);
        }
    }

    function menuPlywood(){
        if ($('#menu_plywood').val() == 'plywood') {
            $('.card-body form').attr('action', '<?= base_url(); ?>laporan/plywood');
            $('#satutgl').attr('disabled', false);
            $('#duatgl').attr('disabled', false);
            $('#select1').html(selukuran);
            $('#select2').html(seltipeglue);
        } else {
            $('#satutgl').attr('disabled', true);
            $('#duatgl').attr('disabled', true);
            $('#select1').empty();
            $('#select2').empty();
            $('#shift').attr('disabled', true);
        }
    }

    function clearForm(){
        $('.card-body form').attr('action', '');
        $('#menu_utama').val('d');
        $('#menu_bahan').attr('style', 'display: none');
        $('#menu_kayu').attr('style', 'display: none');
        $('#menu_vinir').attr('style', 'display: none');
        $('#satutgl').val('').attr('disabled', true);
        $('#duatgl').val('').attr('disabled', true);
        $('#select1').empty();
        $('#select2').empty();
        $('#shift').val('d').attr('disabled', true);
        $('input[type^=radio]').prop('checked', false);
        $('#reportrange').val('');
    }
</script>