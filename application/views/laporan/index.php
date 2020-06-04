<!-- Page Heading -->
<div class="card shadow col-md-10">
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
                </select>
            </div>
            <div class="col-md-6">
                <select class="form-control" name="menu_bahan" id="menu_bahan" style="display: none;" onchange="menuBahan()">
                    <option selected disabled>-- Pilih Data Bahan Bantu--</option>
                    <option value="stokbahan">Stok Bahan Bantu</option>
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
                    <option value="plywood">Barang Jadi / Plywood</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <br>
            <div class="tglawal col-md-6">
                <label>Tanggal Awal</label>
                <div class="input-group">
                    <input id="tglawal" type="date" class="form-control" placeholder="Tanggal 1" name="tgl_awal" disabled>
                </div>
            </div>
            <br>
            <div class="tglakhir col-md-6">
                <label>Tanggal Akhir</label>
                <div class="input-group">
                    <input id="tglakhir" type="date" class="form-control" placeholder="Tanggal 2" name="tgl_akhir" disabled>
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-4">
                <select class="form-control" name="select1" id="select1">
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-control" name="select2" id="select2">
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-control" name="select3" id="select3">
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-md-4">
                <select class="form-control" name="shift" id="shift" disabled>
                    <option value="d" selected disabled>-- Pilih Shift --</option>
                    <option value="">Semua Shift</option>
                    <option value="1">Shift 1</option>
                    <option value="2">Shift 2</option>
                </select>
            </div>
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

    function menuUtama()
    {
        if ($('#menu_utama').val() == 'bahanbantu') {
            $('#menu_bahan').attr('style', 'display: show');
            $('#menu_kayu').attr('style', 'display: none');
            $('#menu_vinir').attr('style', 'display: none');
        } else if($('#menu_utama').val() == 'kayulog') {
            $('#menu_bahan').attr('style', 'display: none');
            $('#menu_kayu').attr('style', 'display: show');
            $('#menu_vinir').attr('style', 'display: none');
        } else if($('#menu_utama').val() == 'vinir') {
            $('#menu_bahan').attr('style', 'display: none');
            $('#menu_kayu').attr('style', 'display: none');
            $('#menu_vinir').attr('style', 'display: show');
        } else {
            $('#menu_bahan').attr('style', 'display: none');
            $('#menu_kayu').attr('style', 'display: none');
            $('#menu_vinir').attr('style', 'display: none');
        }
    }

    function menuBahan(){
        if ($('#menu_bahan').val() == 'stokbahan') {
            $('#tglawal').attr('disabled', true);
            $('#tglakhir').attr('disabled', true);
            $('#select1').html(selkategori);
            $('#select2').empty();
            $('#shift').attr('disabled', true);
        } else if($('#menu_bahan').val() == 'bahanmasuk') {
            $('#tglawal').attr('disabled', false);
            $('#tglakhir').attr('disabled', false);
            $('#select1').html(selkategori);
            $('#select2').html(selsupbahan);
            $('#shift').attr('disabled', true);
        } else if($('#menu_bahan').val() == 'gluemix') {
            $('#tglawal').attr('disabled', false);
            $('#tglakhir').attr('disabled', false);
            $('#select1').empty();
            $('#select2').empty();
            $('#shift').attr('disabled', false);
        } else {
            $('#tglawal').attr('disabled', true);
            $('#tglakhir').attr('disabled', true);
            $('#select1').empty();
            $('#select2').empty();
            $('#shift').attr('disabled', true);
        }
    }

    function menuKayu(){
        if ($('#menu_kayu').val() == 'stokkayu') {
            $('#tglawal').attr('disabled', true);
            $('#tglakhir').attr('disabled', true);
            $('#select1').html(seljeniskayu);
            $('#select2').empty();
            $('#shift').attr('disabled', true);
        } else if($('#menu_kayu').val() == 'kayumasuk') {
            $('#tglawal').attr('disabled', false);
            $('#tglakhir').attr('disabled', false);
            $('#select1').html(seljeniskayu);
            $('#select2').html(selsupkayu);
            $('#shift').attr('disabled', true);
        } else {
            $('#tglawal').attr('disabled', true);
            $('#tglakhir').attr('disabled', true);
            $('#select1').empty();
            $('#select2').empty();
            $('#shift').attr('disabled', true);
        }
    }

    function menuVinir(){
        if ($('#menu_vinir').val() == 'stokvinir') {
            $('#tglawal').attr('disabled', true);
            $('#tglakhir').attr('disabled', true);
            $('#select1').html(selukuran);
            $('#select2').html(seljeniskayu);
            $('#shift').attr('disabled', true);
        } else if($('#menu_vinir').val() == 'vinirmasuk') {
            $('#tglawal').attr('disabled', false);
            $('#tglakhir').attr('disabled', false);
            $('#select1').html(selkayulog);
            $('#select2').empty();
            $('#shift').attr('disabled', true);
        } else if($('#menu_vinir').val() == 'plywood') {
            $('#tglawal').attr('disabled', false);
            $('#tglakhir').attr('disabled', false);
        } else {
            $('#tglawal').attr('disabled', true);
            $('#tglakhir').attr('disabled', true);
            $('#jeniskayu').attr('disabled', true);
            $('#id_supplier').attr('disabled', true);
            $('#shift').attr('disabled', true);
        }
    }

    function clearForm(){
        $('#menu_utama').val('d');
        $('#menu_bahan').attr('style', 'display: none');
        $('#menu_kayu').attr('style', 'display: none');
        $('#menu_vinir').attr('style', 'display: none');
        $('#tglawal').val('').attr('disabled', true);
        $('#tglakhir').val('').attr('disabled', true);
        $('#select1').empty();
        $('#select2').empty();
        $('#shift').val('d').attr('disabled', true);
    };
</script>