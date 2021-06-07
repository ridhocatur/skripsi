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
    <button type="button" class="btn btn-outline-primary tambahUpdatestok" data-toggle="modal" data-target="#tampilModal"><i class="fa fa-plus"></i> Tambah Data</button>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <tr>
                <th>No</th>
                <th>Kode Bahan</th>
                <th>Nama Bahan</th>
                <th>Total Stok Sekarang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($updatestok as $data) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data->kode_bahan; ?></td>
                <td><?= $data->nama_bahan; ?></td>
                <td><?= $data->total_stok_sekarang; ?></td>
                <td>
                    <button href="<?= base_url(); ?>updatestok/ubah/<?= $data->id; ?>" class="btn btn-info btn-circle btn-sm tombolUbahUpdatestok" data-toggle="modal" data-target="#tampilModal" data-id="<?= $data->id; ?>" ><i class="fa fa-edit"></i></button>
                    <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="<?= $data->nama_bahan?>" href="<?= base_url(); ?>updatestok/hapus/<?= $data->id; ?>"><i class="fa fa-trash"></i></button>
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
        <h5 class="modal-title" id="ModalLabel">Tambah Kategori</h5>
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
                <label for="kd_bahan" class="col-sm-3 col-form-label text-md-right">Jenis Bahan</label>
                <div class="col-md-8">
                    <select class="form-control" name="kd_bahan" id="kd_bahan" onchange="autofill();">
                    <option value="" disabled selected>-- Pilih Data --</option>
                    <?php foreach($bahanbantu as $data): ?>
                        <option value="<?= $data->kd_bahan; ?>" data-kode="<?=$data->id?>"><?= $data->kd_bahan; ?></option>
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
                <label for="stok" class="col-sm-3 col-form-label text-md-right">Total Stok Sekarang</label>
                <div class="col-md-7">
                    <input id="stok" type="text" class="form-control" name="stok" autocomplete="stok">
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

<script>
    function autofill(){
        var id = $('#kd_bahan').children(':selected').data('kode');
        console.log(id);
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