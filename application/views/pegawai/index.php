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
    <button type="button" class="btn btn-outline-primary tambahPegawai" data-toggle="modal" data-target="#tampilModal"><i class="fa fa-plus"></i> Tambah Data</button>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Level</th>
                <th>Terakhir Login</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
            <?php foreach($pegawai as $data) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><img src="<?= base_url('upload/pegawai/'.$data->gambar) ?>" width="64"></td>
                <td><?= $data->nik; ?></td>
                <td><?= $data->nama; ?></td>
                <td><?= $data->telp; ?></td>
                <td><?= ucfirst($data->level); ?></td>
                <td><?= date('d-m-Y H:i' ,strtotime($data->last_login)); ?></td>
                <td>
                    <button href="<?= base_url(); ?>pegawai/ubah/<?= $data->id; ?>" class="btn btn-info btn-circle btn-sm tombolUbahPegawai" data-toggle="modal" data-target="#modalUbah" data-id="<?= $data->id; ?>" ><i class="fa fa-edit"></i></button>
                    <button href="<?= base_url(); ?>pegawai/ubahPass/<?= $data->id; ?>" class="btn btn-warning btn-circle btn-sm tombolUbahPass" data-toggle="modal" data-target="#modalPass" data-id="<?= $data->id; ?>" ><i class="fa fa-key"></i></button>
                    <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="<?= $data->nama?>" href="<?= base_url(); ?>pegawai/hapus/<?= $data->id; ?>"><i class="fa fa-trash"></i></button>
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
      <form action="" method="POST" id="formModal" enctype="multipart/form-data">
      <input type="hidden" name="id" id="id">
        <div class="box-body">
            <p></p>
            <div class="form-group row">
                <label for="nik" class="col-sm-4 col-form-label text-md-right">NIK</label>
                <div class="col-md-8">
                    <input id="nik" type="text" class="form-control" name="nik" required autocomplete="nik" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="username" class="col-sm-4 col-form-label text-md-right">Username</label>
                <div class="col-md-8">
                    <input id="username" type="text" class="form-control" name="username" required autocomplete="username">
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-4 col-form-label text-md-right">Password</label>
                <div class="col-md-8">
                    <input id="password" type="password" class="form-control" name="password" autocomplete="password">
                </div>
            </div>

            <div class="form-group row">
                <label for="cpassword" class="col-sm-4 col-form-label text-md-right">Ulangi Password</label>
                <div class="col-md-8">
                    <input id="cpassword" type="password" class="form-control" name="cpassword" autocomplete="cpassword">
                </div>
            </div>

            <div class="form-group row">
                <label for="nama" class="col-sm-4 col-form-label text-md-right">Nama</label>
                <div class="col-md-8">
                    <input id="nama" type="text" class="form-control" name="nama" required autocomplete="nama">
                </div>
            </div>

            <div class="form-group row">
                <label for="telp" class="col-sm-4 col-form-label text-md-right">Telepon</label>
                <div class="col-md-8">
                    <input id="telp" type="text" class="form-control" name="telp" autocomplete="telp">
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-4 col-form-label text-md-right">Level</label>
                <div class="col-md-8">
                    <select class="form-control" name="level" id="level">
                      <option value="" disabled selected>-- Pilih Data --</option>
                      <option value="admin">Admin</option>
                      <option value="manager">Manager</option>
                      <option value="user">User</option>
                      <option value="supplier">Supplier</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="foto" class="col-sm-4 col-form-label text-md-right">Foto</label>
                <div class="col-md-8"><input type="file" id="gambar" name="gambar" class="form-control-file"></div>
                <input type="hidden" name="old_image" id="old_image" value="" />
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

<!-- MODAL Edit Data-->
<div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="ubahUser" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahUser">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modalUbahUser">
      <form action="" method="POST" id="formModal" enctype="multipart/form-data">
      <input type="hidden" name="idUbah" id="idUbah">
        <div class="box-body">
            <p></p>
            <div class="form-group row">
                <label for="nikUbah" class="col-sm-4 col-form-label text-md-right">NIK</label>
                <div class="col-md-8">
                    <input id="nikUbah" type="text" class="form-control" name="nikUbah" required autocomplete="nikUbah" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="usernameUbah" class="col-sm-4 col-form-label text-md-right">Username</label>
                <div class="col-md-8">
                    <input id="usernameUbah" type="text" class="form-control" name="usernameUbah" required autocomplete="usernameUbah">
                </div>
            </div>

            <div class="form-group row">
                <label for="namaUbah" class="col-sm-4 col-form-label text-md-right">Nama</label>
                <div class="col-md-8">
                    <input id="namaUbah" type="text" class="form-control" name="namaUbah" required autocomplete="namaUbah">
                </div>
            </div>

            <div class="form-group row">
                <label for="telpUbah" class="col-sm-4 col-form-label text-md-right">Telepon</label>
                <div class="col-md-8">
                    <input id="telpUbah" type="text" class="form-control" name="telpUbah" autocomplete="telpUbah">
                </div>
            </div>

            <div class="form-group row">
                <label for="levelUbah" class="col-sm-4 col-form-label text-md-right">Level</label>
                <div class="col-md-8">
                    <select class="form-control" name="levelUbah" id="levelUbah">
                      <option value="" disabled selected>-- Pilih Data --</option>
                      <option value="admin">Admin</option>
                      <option value="manager">Manager</option>
                      <option value="user">User</option>
                      <option value="supplier">Supplier</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="foto" class="col-sm-4 col-form-label text-md-right">Foto</label>
                <div class="col-md-8"><input type="file" id="gambar" name="gambar" class="form-control-file"></div>
                <input type="hidden" name="old_imageUbah" id="old_imageUbah" value="" />
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

<!-- MODAL Ubah Password-->
<div class="modal fade" id="modalPass" tabindex="-1" role="dialog" aria-labelledby="labelModalPass" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelModalPass">Ganti Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modalUbahPass">
      <form action="" method="POST" id="formModaPass">
      <input type="hidden" name="idPass" id="idPass">
        <div class="box-body">
            <p></p>
            <div class="form-group row">
                <label for="ubahPassword" class="col-sm-4 col-form-label text-md-right">Password</label>
                <div class="col-md-8">
                    <input id="ubahPassword" type="password" class="form-control" name="ubahPassword" autocomplete="ubahPassword">
                </div>
            </div>
            <div class="form-group row">
                <label for="cubahPassword" class="col-sm-4 col-form-label text-md-right">Ulangi Password</label>
                <div class="col-md-8">
                    <input id="cubahPassword" type="password" class="form-control" name="cubahPassword" autocomplete="cubahPassword">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
      </div>
    </div>
  </div>
</div>