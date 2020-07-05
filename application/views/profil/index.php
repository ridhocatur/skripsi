<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
</style>
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
</div>
<div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Foto Profil</h6>
            </div>
            <div class="card-body align-items-center">
                <form action="<?= base_url('profil/ubahFoto'); ?>" method="POST" id="formModal" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?= $this->fungsi->user_login()->id; ?>">
                    <img src="<?= base_url('upload/pegawai/'.$this->fungsi->user_login()->gambar); ?>" alt="<?= $this->fungsi->user_login()->nama; ?>" style="border:2px solid black; width: 250px; height: auto;" class="center">
                    <br>
                    <div class="col-md-8"><input type="file" id="gambar" name="gambar" class="form-control-file"></div>
                    <br>
                    <button type="submit" class="btn btn-outline-success center"><i class="fa fa-save"></i> Simpan Foto</button>
                    <input type="hidden" name="old_image" id="old_image" value="" />
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Profil</h6>
            </div>
            <div class="card-body align-items-center">
                <form action="<?= base_url('profil/ubahProfil'); ?>" method="POST">
                    <input type="hidden" name="id" id="id" value="<?= $this->fungsi->user_login()->id; ?>">
                    <div class="row">
                        <div class="col-md-4">
                            <?php if ($this->session->userdata('level') == 'admin') { ?>
                                <label for="nik">NIK</label>
                                <input id="nik" type="text" class="form-control" name="nik" value="<?= $this->fungsi->user_login()->nik; ?>">
                            <?php } else { ?>
                                <label for="nik">NIK</label>
                                <input id="nik" type="text" class="form-control" name="nik" value="<?= $this->fungsi->user_login()->nik; ?>" readonly>
                                <small>Perubahan NIK, silahkan hubungi Admin</small>
                            <?php } ?>
                        </div>
                        <div class="col-md-4">
                            <label for="nama">Nama Lengkap</label>
                            <input id="nama" type="text" class="form-control" name="nama" value="<?= $this->fungsi->user_login()->nama; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="telp">No. Telepon</label>
                            <input id="telp" type="text" class="form-control" name="telp" value="<?= $this->fungsi->user_login()->telp; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control" name="username" value="<?= $this->fungsi->user_login()->username; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="profpass">Password</label>
                            <input id="profpass" type="password" class="form-control" name="profpass" placeholder="Kosongkan Bila Tidak Ada Perubahan">
                        </div>
                        <div class="col-md-4">
                            <label for="cprofpass">Ulangi Password</label>
                            <input id="cprofpass" type="password" class="form-control" name="cprofpass">
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-outline-success"><i class="fa fa-save"></i> Simpan</button>
                        <a href="<?= base_url(); ?>" class="btn btn-outline-secondary"><i class="fa fa-arrow-circle-left" ></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
