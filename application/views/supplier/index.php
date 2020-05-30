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
    <button type="button" class="btn btn-outline-primary tambahSupplier" data-toggle="modal" data-target="#tampilModal"><i class="fa fa-plus"></i> Tambah Data</button>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Supplier</th>
                <th>Menyuplai</th>
                <th>Alamat</th>
                <th>E-mail</th>
                <th>Telepon</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($supplier as $data) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data->nm_sup ?></td>
                <td><?= $data->sup ?></td>
                <td><?= $data->alamat ?></td>
                <td><?= $data->email ?></td>
                <td><?= $data->telp ?></td>
                <td><?= $data->keterangan ?></td>
                <td>
                    <button href="<?= base_url(); ?>supplier/ubah/<?= $data->id; ?>" class="btn btn-info btn-circle btn-sm tombolUbahSupplier" data-toggle="modal" data-target="#tampilModal" data-id="<?= $data->id; ?>" ><i class="fa fa-edit"></i></button>
                    <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="<?= $data->nm_sup?>" href="<?= base_url(); ?>supplier/hapus/<?= $data->id; ?>"><i class="fa fa-trash"></i></button>
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
        <h5 class="modal-title" id="ModalLabel">Tambah Data Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post" id="formModal">
      <input type="hidden" name="id" id="id">
        <div class="box-body">
            <p></p>
            <div class="form-group row">
                <label for="nm_sup" class="col-sm-3 col-form-label text-md-right">Nama</label>
                <div class="col-md-8">
                    <input id="nm_sup" type="text" class="form-control" name="nm_sup" autocomplete="nm_sup" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="sup" class="col-sm-3 col-form-label text-md-right">Menyuplai</label>
                <div class="col-md-8">
                    <input id="sup" type="text" class="form-control" name="sup" autocomplete="sup">
                </div>
            </div>

            <div class="form-group row">
                <label for="alamat" class="col-sm-3 col-form-label text-md-right">Alamat</label>
                <div class="col-md-8">
                    <input id="alamat" type="text" class="form-control" name="alamat" autocomplete="alamat">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label text-md-right">E-mail</label>
                <div class="col-md-8">
                    <input id="email" type="email" class="form-control" name="email" autocomplete="email">
                </div>
            </div>

            <div class="form-group row">
                <label for="telp" class="col-sm-3 col-form-label text-md-right">Telepon</label>
                <div class="col-md-8">
                    <input id="telp" type="text" class="form-control" name="telp" autocomplete="telp">
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