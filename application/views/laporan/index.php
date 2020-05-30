<!-- Page Heading -->
<div class="card shadow col-md-8">
<div class="card-body">
    <form action="" method="POST">
        <div class="row">
            <label>Menu yang Ingin Di Cetak</label>
        </div>
        <div class="mb-3 row">
            <div class="col-md-6">
                <select class="form-control menu_utama" name="menu_utama" id="menu_utama">
                    <option selected disabled>-- Pilih Data --</option>
                    <option value="bahanbantu">Bahan Bantu</option>
                    <option value="kayulog">Kayu Log</option>
                    <option value="vinir">Vinir</option>
                </select>
            </div>
            <div class="col-md-6">
                <select class="form-control" name="menu_bahan" id="menu_bahan" style="display: none">
                    <option value="">-- Pilih Data Bahan Bantu--</option>
                    <option value="stokbahan">Stok Bahan Bantu</option>
                    <option value="bahanmasuk">Pemasukan Bahan Bantu</option>
                    <option value="gluemix">Pengadukan Bahan / Gluemix</option>
                </select>
                <select class="form-control" name="menu_kayu" id="menu_kayu" style="display: none">
                    <option value="">-- Pilih Data Kayu --</option>
                    <option value="stokkayu">Stok Kayu Log</option>
                    <option value="kayumasuk">Pemasukan Kayu Log</option>
                </select>
                <select class="form-control" name="menu_vinir" id="menu_vinir" style="display: none">
                    <option value="">-- Pilih Data Vinir--</option>
                    <option value="stokvinir">Stok Vinir</option>
                    <option value="vinirmasuk">Pengolahan Vinir</option>
                    <option value="plywood">Barang Jadi / Plywood</option>
                </select>
            </div>

        </div>
        <div class="mb-3 row">

        </div>
        <div class="mb-3 row">
            <br>
            <div class="tglawal">
                <label>Tanggal Awal</label>
                <div class="input-group">
                    <input id="datepicker1" type="date" class="form-control" placeholder="Tanggal 1" name="tgl_awal">
                </div>
            </div>
            <br>
            <div class="tglakhir">
                <label>Tanggal Akhir</label>
                <div class="input-group">
                    <input id="datepicker2" type="date" class="form-control" placeholder="Tanggal 2" name="tgl_akhir">
                </div>
            </div>
        </div>
    <div class="form-group supplier">
        <label>Supplier</label>
        <select class="form-control" name="id_supplier" id="id_supplier">
            <option value="">-- Pilih Supplier --</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success tombolcetak" formtarget="_blank">Tampilkan</button>
    <button type="button" class="btn btn-danger clearForm">Clear</button>
    </form>
    <p><h7>*kosongkan untuk tampil semua data</h7></p>
    </div>
</div>