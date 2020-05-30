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
<div class="card-header py-3">
    <button type="button" class="btn btn-outline-primary tambahJenisKayu" data-toggle="modal" data-target="#tampilModal"><i class="fa fa-plus"></i> Tambah Data</button>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Jenis Kayu</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($jeniskayu as $data) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data->kd_jenis; ?></td>
                <td><?= $data->nama; ?></td>
                <td><?= $data->keterangan; ?></td>
                <td>
                    <button href="<?= base_url(); ?>jeniskayu/edit/<?= $data->id; ?>" class="btn btn-info btn-circle btn-sm ubahJenisKayu" data-toggle="modal" data-target="#tampilModal" data-id="<?= $data->id; ?>" ><i class="fa fa-edit"></i></button>
                    <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="Jenis <?= $data->nama?>" href="<?= base_url(); ?>jeniskayu/hapus/<?= $data->id; ?>"><i class="fa fa-trash"></i></button>
                </td>
                <form action="" method="POST" id="deleteForm">
                    <input type="submit" value="" style="display:none">
                </form>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
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
      <form action="" method="POST" id="formModal">
      <input type="hidden" name="id" id="id">
        <div class="box-body">
            <p></p>
            <div class="form-group row">
                <label for="kd_jenis" class="col-sm-3 col-form-label text-md-right">Kode</label>
                <div class="col-md-7">
                    <input id="kd_jenis" type="text" class="form-control" name="kd_jenis" autocomplete="kd_jenis" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label text-md-right">Nama</label>
                <div class="col-md-7">
                    <input id="nama" type="text" class="form-control" name="nama" autocomplete="nama">
                </div>
            </div>

            <div class="form-group row">
                <label for="keterangan" class="col-sm-3 col-form-label text-md-right">Keterangan</label>
                <div class="col-md-7">
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