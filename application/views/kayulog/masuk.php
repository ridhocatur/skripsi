<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="card shadow mb-4">
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php elseif ($this->session->flashdata('info')) : ?>
        <div class="alert alert-info" role="alert">
            <?= $this->session->flashdata('info'); ?>
        </div>
    <?php elseif ($this->session->flashdata('danger')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('danger'); ?>
        </div>
    <?php endif; ?>
    <?php if ($this->session->userdata('level') == 'manager') { ?>
        <div class="card-header py-3">
            <button id="cetakdata" class="btn btn-outline-info pull-right" data-toggle="modal" data-target="#cetakData"><i class="fa fa-print"></i> Cetak Data</button>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tgl. Masuk</th>
                        <th>Supplier</th>
                        <th>Total Stok (pcs)</th>
                        <th>Total Kubikasi (M<sup>3</sup>)</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;foreach($kayumasuk as $data) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= date('d-m-Y' ,strtotime($data->tgl)); ?></td>
                        <td><?= $data->nm_sup; ?></td>
                        <td><?= $data->jml_stok; ?></td>
                        <td><?= $data->jml_kubik; ?></td>
                        <td><?= $data->keterangan; ?></td>
                        <td>
                            <a class="btn btn-info btn-circle btn-sm" data-id="<?= $data->id; ?>" href="<?= base_url(); ?>kayumasuk/detailMasuk/<?= $data->id; ?>"><i class="fa fa-eye"></i></a>
                        </td>
                        <form action="" method="POST" id="deleteForm">
                            <input type="submit" value="" style="display:none">
                        </form>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <div class="card-header py-3">
            <button type="button" class="btn btn-outline-primary tambahKayuMasuk" data-toggle="modal" data-target="#tampilModal"><i class="fa fa-plus"></i> Tambah Data</button>
            <button id="cetakdata" class="btn btn-outline-info pull-right" data-toggle="modal" data-target="#cetakData"><i class="fa fa-print"></i> Cetak Data</button>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tgl. Masuk</th>
                        <th>Supplier</th>
                        <th>Total Stok (pcs)</th>
                        <th>Total Kubikasi (M<sup>3</sup>)</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;foreach($kayumasuk as $data) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= date('d-m-Y' ,strtotime($data->tgl)); ?></td>
                        <td><?= $data->nm_sup; ?></td>
                        <td><?= $data->jml_stok; ?></td>
                        <td><?= $data->jml_kubik; ?></td>
                        <td><?= $data->keterangan; ?></td>
                        <td>
                            <a class="btn btn-info btn-circle btn-sm" data-id="<?= $data->id; ?>" href="<?= base_url(); ?>kayumasuk/detailMasuk/<?= $data->id; ?>"><i class="fa fa-eye"></i></a>
                            <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="Tanggal <?= date('d-m-Y' ,strtotime($data->tgl)); ?>" href="<?= base_url(); ?>kayumasuk/hapusMasuk/<?= $data->id; ?>"><i class="fa fa-trash"></i></button>
                        </td>
                        <form action="" method="POST" id="deleteForm">
                            <input type="submit" value="" style="display:none">
                        </form>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</div>

<!-- MODAL Tambah Data-->
<div class="modal fade" id="tampilModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" id="kayumasuk">
        <input type="hidden" name="id" id="id">
        <div class="box-body">
            <p></p>
            <div class="form-group row">
                <label for="tgl" class="col-sm-4 col-form-label text-md-right">Tgl. Masuk</label>
                <div class="col-md-5">
                    <input id="tgl" type="date" class="form-control" name="tgl" autocomplete="tgl">
                </div>
            </div>

            <div class="form-group row">
                <label for="id_supplier" class="col-sm-4 col-form-label text-md-right">Supplier</label>
                <div class="col-md-5">
                <select class="form-control" name="id_supplier" id="id_supplier">
                    <option disabled selected>-- Pilih Supplier --</option>
                    <?php foreach($supkayu as $data): ?>
                      <option value="<?= $data->id; ?>"><?= $data->nm_sup; ?></option>
                    <?php endforeach;?>
                    </select>
                </div>
            </div>
                        <!--  ROW -->
            <table class="table table-borderless">
                <thead>
                    <tr style="text-align:center">
                        <th style="width: 1%"></th>
                        <th style="width: 22%">Kode Kayu</th>
                        <th style="width: 32%" colspan="3">Ukuran Kayu (Cm) <br> <small>P=Panjang, D=Diameter</small></th>
                        <th style="width: 22%">Stok Masuk</th>
                        <th style="width: 22%">Kubikasi (M<sup>3</sup>)</th>
                        <th style="width: 1%"></th>
                    </tr>
                </thead>
                <tbody id="form-body" class="formData">
                    <tr style="text-align:center">
                        <td></td>
                        <td>
                            <select class="form-control" name="id_kayu[]" id="id_kayu">
                                <option disabled selected>Pilih Data</option>
                                <?php foreach($kayulog as $data): ?>
                                    <option value="<?= $data->id; ?>"><?= $data->kd_kayu; ?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                        <td>
                            <input id="panjang" type="text" class="form-control panjang_kayu" placeholder="P" name="panjang[]" required>
                        </td>
                        <td>
                            <input id="diameter1" type="text" class="form-control diameter_kayu1" placeholder="D1" name="diameter1[]" required>
                        </td>
                        <td>
                            <input id="diameter2" type="text" class="form-control diameter_kayu2" placeholder="D2" name="diameter2[]" required>
                        </td>
                        <td>
                            <input id="jmlstokkayu" type="text" class="form-control jml_stok_kayu" name="jmlstokkayu[]" required>
                        </td>
                        <td>
                            <input id="jmlkubikkayu" type="text" class="form-control jml_kubik_kayu" name="jmlkubikkayu[]" required readonly>
                        </td>
                        <td>
                            <div class="input-group-btn">
                            <button class="btn btn-outline-success tambahForm" type="button" onclick="add_form()">+</button>
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group row">
                <label for="level" class="col-sm-4 col-form-label text-md-right">Total Stok Masuk</label>
                <div class="col-md-5">
                    <input id="total_stok" type="text" class="form-control" name="total_stok" autocomplete="total_stok" onblur="stok_kayu();" value="" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="total_kubik" class="col-sm-4 col-form-label text-md-right">Total Kubikasi</label>
                <div class="col-md-5">
                    <input id="total_kubik" type="text" class="form-control" name="total_kubik" autocomplete="total_kubik" onblur="kubik_kayu()" value="" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="keterangan" class="col-sm-4 col-form-label text-md-right">Keterangan</label>
                <div class="col-md-5">
                    <input id="keterangan" type="text" class="form-control" name="keterangan" autocomplete="keterangan">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-warning tombolReset">Reset</button>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
      </div>
    </div>
  </div>
</div>

<!-- MODAL Cetak Data-->
<div class="modal fade" id="cetakData" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Cetak Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(); ?>laporan/kayumasuk" method="POST" target="_blank">
        <div class="box-body">
            <p></p>
            <div class="form-group row">
                <label for="tglsatu" class="col-sm-3 col-form-label text-md-right">Tgl. Awal</label>
                <div class="col-md-8">
                    <input id="tglsatu" type="date" class="form-control" name="tglsatu">
                </div>
            </div>

            <div class="form-group row">
                <label for="tgldua" class="col-sm-3 col-form-label text-md-right">Tgl. Akhir</label>
                <div class="col-md-8">
                    <input id="tgldua" type="date" class="form-control" name="tgldua">
                </div>
            </div>

            <div class="form-group row">
                <label for="jeniskayu" class="col-sm-3 col-form-label text-md-right">Jenis Kayu</label>
                <div class="col-md-8">
                <select class="form-control" name="jeniskayu" id="jeniskayu">
                    <option disabled selected>-- Pilih Data --</option>
                    <option value="">Semua Jenis Kayu</option>
                    <?php foreach($jeniskayu as $data): ?>
                        <option value="<?= $data->id; ?>"><?= $data->nama; ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="suplier" class="col-sm-3 col-form-label text-md-right">Supplier</label>
                <div class="col-md-8">
                <select class="form-control" name="suplier" id="suplier">
                    <option disabled selected>-- Pilih Data --</option>
                    <option value="">Semua Supplier</option>
                    <?php foreach($supkayu as $data): ?>
                        <option value="<?= $data->id; ?>"><?= $data->nm_sup; ?></option>
                    <?php endforeach; ?>
                </select>
                </div>
            </div>
            <small>- Kosongkan kolom tanggal untuk menampilan semua tanggal</small><br>
            <small>- Isi salah satu kolom tanggal bila ingin mencari data dengan 1 tanggal</small><br>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Cetak</button>
    </form>
      </div>
    </div>
  </div>
</div>

<script type ="text/javascript">
    function stok_kayu() {
        var total = 0;
        $(".jml_stok_kayu").each(function() {
        if (!isNaN(this.value) && this.value.length != 0) {
            total += parseFloat(this.value);
        }
        });
        $('#total_stok').val(total.toFixed(0));
    }
    function kubik_kayu() {
    var total1 = 0;
    $(".jml_kubik_kayu").each(function() {
        if (!isNaN(this.value) && this.value.length != 0) {
        total1 += parseFloat(this.value);
        }
    });
    $('#total_kubik').val(total1.toFixed(2));
    }

    function add_form() {
        var html = '';
        var max_field = 20;
        var x = 0;

        html += '<tr style="text-align:center">';
        html += '<td></td>';
        html += '<td><select class="form-control" name="id_kayu[]" id="id_kayu"><option disabled selected>Pilih Data</option><?php foreach($kayulog as $data): ?><option value="<?= $data->id; ?>"><?= $data->kd_kayu; ?></option><?php endforeach;?></select></td>';
        html += '<td><input id="panjang" type="text" class="form-control panjang_kayu" placeholder="P" name="panjang[]" required></td>';
        html += '<td><input id="diameter1" type="text" class="form-control diameter_kayu1" placeholder="D1" name="diameter1[]" required></td>';
        html += '<td><input id="diameter2" type="text" class="form-control diameter_kayu2" placeholder="D2" name="diameter2[]" required></td>';
        html += '<td><input id="jmlstokkayu" type="text" class="form-control jml_stok_kayu" name="jmlstokkayu[]" required></td>';
        html += '<td><input id="jmlkubikkayu" type="text" class="form-control jml_kubik_kayu" name="jmlkubikkayu[]" required readonly></td>';
        html += '<td><button type="button" class="btn btn-outline-danger hapus" onclick="del_form(this)">-</button></td>';
        html += '</tr>';

        if (x < max_field) {
            x++;
            $('#form-body').append(html);
        } else {
            alert('Form Telah Melebihi Batas!')
        }
    }

    function del_form(id){
        id.closest('tr').remove();
        stok_kayu();
        kubik_kayu();
        x--;
    }

    //------------------ tombol Reset
    $('.tombolReset').on('click', function() {
        $('#kayumasuk')[0].reset();
    });
</script>