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
                      <th>Kode Log</th>
                      <th>Jenis Kayu</th>
                      <th>Stok (pcs)</th>
                      <th>Kubikasi (M<sup>3</sup>)</th>
                      <th>Keterangan</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no=1; foreach($kayulog as $data) : ?>
                  <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $data->kd_kayu; ?></td>
                      <td><?= $data->nama; ?></td>
                      <td><?= $data->stok; ?></td>
                      <td><?= $data->kubikasi; ?></td>
                      <td><?= $data->keterangan; ?></td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
      </div>
    <?php } else { ?>
      <div class="card-header py-3">
          <button type="button" class="btn btn-outline-primary tambahKayu" data-toggle="modal" data-target="#tampilModal"><i class="fa fa-plus"></i> Tambah Data</button>
          <button id="cetakdata" class="btn btn-outline-info pull-right" data-toggle="modal" data-target="#cetakData"><i class="fa fa-print"></i> Cetak Data</button>
      </div>
      <div class="card-body">
          <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Kode Log</th>
                      <th>Jenis Kayu</th>
                      <th>Stok (pcs)</th>
                      <th>Kubikasi (M<sup>3</sup>)</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no=1; foreach($kayulog as $data) : ?>
                  <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $data->kd_kayu; ?></td>
                      <td><?= $data->nama; ?></td>
                      <td><?= $data->stok; ?></td>
                      <td><?= $data->kubikasi; ?></td>
                      <td><?= $data->keterangan; ?></td>
                      <td>
                          <button href="<?= base_url(); ?>kayulog/editKayu/<?= $data->id; ?>" class="btn btn-info btn-circle btn-sm tombolUbahKayu" data-toggle="modal" data-target="#tampilModal" data-id="<?= $data->id; ?>" ><i class="fa fa-edit"></i></button>
                          <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="<?= $data->kd_kayu?>" href="<?= base_url(); ?>kayulog/hapusKayu/<?= $data->id; ?>"><i class="fa fa-trash"></i></button>
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
        <h5 class="modal-title" id="ModalLabel">Tambah Data Kayu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" id="kayumaster">
      <input type="hidden" name="id" id="id">
        <div class="box-body">
            <p></p>
            <div class="form-group row">
                <label for="kd_kayu" class="col-sm-3 col-form-label text-md-right">Kode Log</label>
                <div class="col-md-8">
                    <input id="kd_kayu" type="text" class="form-control" name="kd_kayu" required autocomplete="kd_kayu" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="kd_jenis" class="col-sm-3 col-form-label text-md-right">Jenis Kayu</label>
                <div class="col-md-8">
                <select class="form-control" name="kd_jenis" id="kd_jenis">
                  <option value="" disabled selected>-- Pilih Data --</option>
                  <?php foreach($jeniskayu as $data): ?>
                    <option value="<?= $data->id; ?>"><?= $data->nama; ?></option>
                  <?php endforeach; ?>
                </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="stok" class="col-sm-3 col-form-label text-md-right">Stok</label>
                <div class="col-md-8">
                    <input id="stok" type="text" class="form-control" name="stok" required autocomplete="stok">
                </div>
            </div>

            <div class="form-group row">
                <label for="kubikasi" class="col-sm-3 col-form-label text-md-right">Kubikasi</label>
                <div class="col-md-8">
                    <input id="kubikasi" type="text" class="form-control" name="kubikasi" required austocomplete="kubikasi">
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
      <form action="<?= base_url(); ?>laporan/stokkayu" method="POST" target="_blank">
        <div class="box-body">
            <p></p>
            <div class="form-group row">
                <label for="jeniskayu" class="col-sm-3 col-form-label text-md-right">Jenis Kayu</label>
                <div class="col-md-8">
                <select class="form-control" name="jeniskayu" id="jeniskayu">
                  <option value="" disabled selected>-- Pilih Data --</option>
                  <option value=""> Semua Jenis </option>
                  <?php foreach($jeniskayu as $data): ?>
                    <option value="<?= $data->id; ?>"><?= $data->nama; ?></option>
                  <?php endforeach; ?>
                </select>
                </div>
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
    $('button#cetakdata').on('click', function(){
        $('#formModal').attr('action','');
    });

    //------------------ tombol Reset
    $('.tombolReset').on('click', function() {
        $('#kayumaster')[0].reset();
        $("#kayumaster").validate().resetForm();
    });
</script>