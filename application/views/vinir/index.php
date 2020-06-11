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
    <button type="button" class="btn btn-outline-primary tambahVinir" data-toggle="modal" data-target="#modalVinir"><i class="fa fa-plus"></i> Tambah Data</button>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Kayu</th>
                <th>Tebal</th>
                <th>Ukuran</th>
                <th>Stok (pcs)</th>
                <th>Kubikasi (M<sup>3</sup>)</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($vinir as $data) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data->nama; ?></td>
                <td><?= $data->tebal; ?> mm</td>
                <td><?= $data->panjang; ?> x <?= $data->lebar; ?></td>
                <td><?= $data->stok; ?></td>
                <td><?= $data->kubikasi; ?></td>
                <td><?= $data->keterangan; ?></td>
                <td>
                    <button href="<?= base_url(); ?>vinir/edit/<?= $data->id; ?>" class="btn btn-info btn-circle btn-sm ubahVinir" data-toggle="modal" data-target="#modalVinir" data-id="<?= $data->id; ?>" ><i class="fa fa-edit"></i></button>
                    <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="Jenis <?= $data->nama?>" href="<?= base_url(); ?>vinir/hapus/<?= $data->id; ?>"><i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="modalVinir" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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
                <label for="id_jenis" class="col-sm-3 col-form-label text-md-right">Jenis Kayu</label>
                <div class="col-md-8">
                <select class="form-control" name="id_jenis" id="id_jenis">
                  <option value="" disabled selected>-- Pilih Data --</option>
                  <?php foreach($jenis as $data): ?>
                    <option value="<?= $data->id; ?>"><?= $data->nama; ?></option>
                  <?php endforeach; ?>
                </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="jenisvinir" class="col-sm-3 col-form-label text-md-right">Jenis Vinir</label>
                <div class="col-md-8">
                    <select class="form-control" name="jenisvinir" id="jenisvinir">
                        <option selected disabled>-- Pilih Data --</option>
                        <option value="face back"> Face / Back </option>
                        <option value="core"> Core </option>
                        <option value="long grain"> Long Grain </option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="tebal" class="col-sm-3 col-form-label text-md-right">Tebal (mm)</label>
                <div class="col-md-8">
                    <input id="tebal" type="text" class="form-control" name="tebal" required placeholder="Tebal">
                </div>
            </div>

            <div class="form-group row">
                <label for="ukurpot" class="col-sm-3 col-form-label text-md-right">Ukuran (mm)</label>
                <div class="col-md-4">
                    <select class="form-control" name="ukurpot" id="ukurpot" onchange="ukurpotong();">
                        <option selected disabled>-- Pilih Data --</option>
                        <option value="pendek"> 1900 </option>
                        <option value="panjang"> 2600 </option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="text" name="pjg" id="pjg" class="form-control" placeholder="P" readonly>
                </div>
                <div class="col-md-2">
                    <input type="text" name="lbr" id="lbr" class="form-control" placeholder="L" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="stok" class="col-sm-3 col-form-label text-md-right">Stok (pcs)</label>
                <div class="col-md-8">
                    <input id="stok" type="text" class="form-control" name="stok" require autocomplete="stok">
                </div>
            </div>

            <div class="form-group row">
                <label for="kubikasi" class="col-sm-3 col-form-label text-md-right">Kubikasi (M<sup>3</sup>)</label>
                <div class="col-md-8">
                    <input id="kubikasi" type="text" class="form-control" name="kubikasi" require autocomplete="kubikasi">
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
<script type="text/javascript">
    function ukurpotong(){
        if($('#ukurpot').val() == 'pendek'){
            $('#pjg').val(1900);
            $('#lbr').val(parseInt(1900/2));
        } else if($('#ukurpot').val() == 'panjang'){
            $('#pjg').val(2600);
            $('#lbr').val(parseInt(2600/2));
        }
    };
</script>