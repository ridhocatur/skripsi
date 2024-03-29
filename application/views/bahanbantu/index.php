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
            <button id="cetakbahan" class="btn btn-outline-info pull-right" data-toggle="modal" data-target="#CetakData"><i class="fa fa-print"></i> Cetak Data</button>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Bahan</th>
                        <th>Nama Bahan</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($bahanbantu as $data) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data->kd_bahan; ?></td>
                        <td><?= $data->nama; ?></td>
                        <td><?= $data->stok; ?>&nbsp;KG</td>
                        <td><?= $data->nm_kateg; ?></td>
                        <td><?= $data->keterangan; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <div class="card-header py-3">
            <button class="btn btn-outline-primary tambahbahanbantu" data-toggle="modal" data-target="#ModalBahan"><i class="fa fa-plus"></i> Tambah Data</button>
            <button id="cetakbahan" class="btn btn-outline-info pull-right" data-toggle="modal" data-target="#CetakData"><i class="fa fa-print"></i> Cetak Data</button>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Bahan</th>
                        <th>Nama Bahan</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($bahanbantu as $data) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data->kd_bahan; ?></td>
                        <td><?= $data->nama; ?></td>
                        <td><?= $data->stok; ?>&nbsp;KG</td>
                        <td><?= $data->nm_kateg; ?></td>
                        <td><?= $data->keterangan; ?></td>
                        <td>
                            <button href="<?= base_url(); ?>bahanbantu/editBantu/<?= $data->id; ?>" class="btn btn-info btn-circle btn-sm ubahbahanbantu" data-toggle="modal" data-target="#ModalBahan" data-id="<?= $data->id; ?>" ><i class="fa fa-edit"></i></button>
                            <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="<?= $data->nama?>" href="<?= base_url(); ?>bahanbantu/hapusBantu/<?= $data->id; ?>"><i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="ModalBahan" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" id="bahanMaster">
      <input type="hidden" name="id" id="id">
        <div class="box-body">
            <p></p>
            <div class="form-group row">
                <label for="kd_bahan" class="col-sm-3 col-form-label text-md-right">Kode Bahan</label>
                <div class="col-md-8">
                    <input id="kd_bahan" type="text" class="form-control" name="kd_bahan" autocomplete="kd_bahan" autofocus require>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label text-md-right">Nama Bahan</label>
                <div class="col-md-8">
                    <input id="nama" type="text" class="form-control" name="nama" autocomplete="nama" require>
                </div>
            </div>

            <div class="form-group row">
                <label for="stok" class="col-sm-3 col-form-label text-md-right">Stok</label>
                <div class="col-md-8">
                    <input id="stok" type="text" class="form-control" name="stok" autocomplete="stok" require>
                </div>
            </div>

            <div class="form-group row">
                <label for="id_kategori" class="col-sm-3 col-form-label text-md-right">Kategori</label>
                <div class="col-md-8">
                <select class="form-control" name="id_kategori" id="id_kategori" require>
                  <option value="" disabled selected>-- Pilih Data --</option>
                  <?php foreach($kategori as $data): ?>
                    <option value="<?= $data->id; ?>"><?= $data->nm_kateg; ?></option>
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
<div class="modal fade" id="CetakData" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Cetak Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('laporan/stokbahan'); ?>" method="POST" target="_blank" id="penggunaanBahanBantu">
      <input type="hidden" name="id" id="id">
        <div class="box-body">
            <p></p>

            <div class="form-group row">
                <label for="tglsatu" class="col-sm-3 col-form-label text-md-right">Tgl. Awal</label>
                <div class="col-md-8">
                    <input id="tglsatu" type="date" class="form-control" value="<?= date('Y-m-d'); ?>" name="tglsatu">
                </div>
            </div>

            <div class="form-group row">
                <label for="tgldua" class="col-sm-3 col-form-label text-md-right">Tgl. Akhir</label>
                <div class="col-md-8">
                    <input id="tgldua" type="date" class="form-control" value="<?= date('Y-m-d'); ?>" name="tgldua">
                </div>
            </div>

            <div class="form-group row">
                <label for="nm_bahan" class="col-sm-3 col-form-label text-md-right">Tipe Lem</label>
                <div class="col-md-8">
                <select class="form-control" name="nm_bahan" id="nm_bahan">
                    <option disabled selected>-- Pilih Data --</option>
                    <option value="Type-1 Melamine">Type-1 Melamine</option>
                    <option value="Type-2 LFE">Type-2 LFE</option>
                </select>
                </div>
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
    $('button#cetakbahan').on('click', function(){
        $('#cetakBahan').submit();
    });

    // ------------------ tombol Reset
    $('.tombolReset').on('click', function() {
        $('#bahanMaster')[0].reset();
        $("#bahanMaster").validate().resetForm();
    });​
</script>
