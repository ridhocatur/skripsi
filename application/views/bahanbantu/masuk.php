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
                        <th>Kode Bahan</th>
                        <th>Stok Masuk</th>
                        <th>Supplier</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($bahanmasuk as $data) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= date('d-m-Y' ,strtotime($data->tgl)); ?></td>
                        <td><?= $data->kd_bahan; ?></td>
                        <td><?= $data->stok_masuk; ?></td>
                        <td><?= $data->nm_sup; ?></td>
                        <td><?= $data->keterangan; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <div class="card-header py-3">
            <button type="button" class="btn btn-outline-primary tambahBahanMasuk" data-toggle="modal" data-target="#tampilModal"><i class="fa fa-plus"></i> Tambah Data</button>
            <button id="cetakdata" class="btn btn-outline-info pull-right" data-toggle="modal" data-target="#cetakData"><i class="fa fa-print"></i> Cetak Data</button>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tgl. Masuk</th>
                        <th>Kode Bahan</th>
                        <th>Stok Masuk</th>
                        <th>Supplier</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($bahanmasuk as $data) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= date('d-m-Y' ,strtotime($data->tgl)); ?></td>
                        <td><?= $data->kd_bahan; ?></td>
                        <td><?= $data->stok_masuk; ?></td>
                        <td><?= $data->nm_sup; ?></td>
                        <td><?= $data->keterangan; ?></td>
                        <td>
                            <button href="<?= base_url(); ?>bahanmasuk/ubahMasuk/<?= $data->id; ?>" class="btn btn-info btn-circle btn-sm tombolUbahBahanMasuk" data-toggle="modal" data-target="#tampilModal" data-id="<?= $data->id; ?>" ><i class="fa fa-edit"></i></button>
                            <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="<?= $data->kd_bahan?>" href="<?= base_url(); ?>bahanmasuk/hapusMasuk/<?= $data->id; ?>"><i class="fa fa-trash"></i></button>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="bahanMasuk">
        <input type="hidden" name="id" id="id">
            <div class="box-body">
                <p></p>
                <div class="form-group row">
                    <label for="tgl" class="col-sm-3 col-form-label text-md-right">Tgl. Masuk</label>
                    <div class="col-md-8">
                        <input id="tgl" type="date" class="form-control" name="tgl" required autocomplete="tgl">
                    </div>
                </div>

                <div class="form-group row">
                <label for="id_bahan" class="col-sm-3 col-form-label text-md-right">Jenis Bahan</label>
                <div class="col-md-8">
                    <select class="form-control" name="id_bahan" id="id_bahan" onchange="return autofill();">
                    <option value="" disabled selected>-- Pilih Data --</option>
                    <?php foreach($bahanbantu as $data): ?>
                        <option value="<?= $data->id; ?>"><?= $data->kd_bahan; ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                </div>

                <div class="form-group row">
                    <label for="nm_bahan" class="col-sm-3 col-form-label text-md-right">Nama Bahan</label>
                    <div class="col-md-8">
                        <input id="nm_bahan" type="text" class="form-control" name="nm_bahan" autocomplete="nm_bahan" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="stok_masuk" class="col-sm-3 col-form-label text-md-right">Stok Masuk</label>
                    <div class="col-md-8">
                        <input id="stok_masuk" type="text" class="form-control" name="stok_masuk" required autocomplete="stok_masuk">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="id_supplier" class="col-sm-3 col-form-label text-md-right">Supplier</label>
                    <div class="col-md-8">
                    <select class="form-control" name="id_supplier" id="id_supplier">
                        <option value="" disabled selected>-- Pilih Data --</option>
                        <?php foreach($supbahan as $data): ?>
                        <option value="<?= $data->id; ?>"><?= $data->nm_sup; ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="keterangan" class="col-sm-3 col-form-label text-md-right">Keterangan</label>
                    <div class="col-md-8">
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
      <form action="<?= base_url(); ?>laporan/bahanmasuk" method="POST" target="_blank">
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
                <label for="suplier" class="col-sm-3 col-form-label text-md-right">Supplier</label>
                <div class="col-md-8">
                <select class="form-control" name="suplier" id="suplier">
                    <option disabled selected>-- Pilih Data --</option>
                    <option value="">Semua Supplier</option>
                    <?php foreach($supbahan as $data): ?>
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

<script>
    function autofill(){
        var id = document.getElementById('id_bahan').value;
        $.ajax({
            url:"<?php echo base_url();?>bahanmasuk/cariMasuk",
            data: {id : id},
            type: "post",
            dataType: "JSON",
            success:function(data){
                $('#nm_bahan').val(data.nama);
            }
        });
    }

    //------------------ tombol Reset
    $('.tombolReset').on('click', function() {
        $('#bahanMasuk')[0].reset();
        $("#bahanMasuk").validate().resetForm();
    });
</script>