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
    <button type="button" class="btn btn-outline-primary tambahGluemix" data-toggle="modal" data-target="#tampilModal"><i class="fa fa-plus"></i> Tambah Data</button>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Tipe Lem</th>
                <th>Shift</th>
                <th>Total</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($gluemix as $data) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= date('d-m-Y' ,strtotime($data->tgl)); ?></td>
                <td><?= $data->tipe_glue; ?></td>
                <td><?= $data->shift; ?></td>
                <td><?= $data->total; ?></td>
                <td><?= $data->keterangan; ?></td>
                <td>
                    <a href="<?= base_url(); ?>gluemix/detailGlue/<?= $data->id; ?>" data-id="<?= $data->id; ?>" class="btn btn-info btn-circle btn-sm"><i class="fa fa-eye"></i></a>
                    <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="Tanggal <?= date('d-m-Y' ,strtotime($data->tgl)); ?>" href="<?= base_url(); ?>gluemix/hapusGlue/<?= $data->id; ?>"><i class="fa fa-trash"></i></button>
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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Tambah Data Gluemix</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url(); ?>gluemix/tambah" method="POST" id="formModal">
      <input type="hidden" name="id" id="id">
        <div class="box-body">
            <p></p>
            <div class="form-group row">
                <label for="tgl" class="col-sm-3 col-form-label text-md-right">Tanggal</label>
                <div class="col-md-8">
                    <input id="tgl" type="date" class="form-control" name="tgl" required autocomplete="tgl">
                </div>
            </div>

            <div class="form-group row">
                <label for="tipe_glue" class="col-sm-3 col-form-label text-md-right">Jenis Lem</label>
                <div class="col-md-8">
                  <select class="form-control" name="tipe_glue" id="tipe_glue">
                    <option value="" selected disabled>-- Pilih Data --</option>
                    <option value="Type-1 Melamine">Type-1 Melamine</option>
                    <option value="Type-2 LFE">Type-2 LFE</option>
                  </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="shift" class="col-sm-3 text-md-right">Shift</label>
                <div class="col-md-4">
                  <label class="radio-inline"><input type="radio" name="shift" id="shift" value="1"> 1 (Satu) </label>
                  <label class="radio-inline"><input type="radio" name="shift" id="shift" value="2"> 2 (Dua) </label>
                </div>
            </div>

            <table class="table table-borderless">
                <thead>
                    <tr style="text-align:center">
                        <th style="width: 10%"></th>
                        <th style="width: 40%">Kode Bahan</th>
                        <th style="width: 40%">Jml. Pemakaian</th>
                        <th style="width: 10%"></th>
                    </tr>
                </thead>
                <tbody id="form-body">
                    <tr style="text-align:center">
                        <td></td>
                        <td>
                            <select class="form-control" name="id_bahan[]" id="id_bahan">
                              <option selected disabled>-- Pilih Data --</option>
                              <?php foreach($bahanbantu as $data): ?>
                                <option value="<?= $data->id; ?>"><?= $data->kd_bahan; ?></option>
                              <?php endforeach;?>
                            </select>
                        </td>
                        <td>
                            <input id="stokkeluar" name="stokkeluar[]" type="text" class="form-control calc_stok_keluar" autocomplete="stokkeluar">
                        </td>
                        <td>
                            <div class="input-group-btn">
                            <button class="btn btn-success" onclick="add_form()" type="button">+</button>
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group row">
                <label for="total" class="col-sm-3 col-form-label text-md-right">Total</label>
                <div class="col-md-8">
                    <input id="total" type="text" class="form-control" name="total" autocomplete="total" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Keterangan</label>
                <div class="col-md-8">
                    <input id="keterangan" type="text" class="form-control" name="keterangan" autocomplete="keterangan">
                </div>
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary keluar" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-warning tombolReset">Reset</button>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
      </div>
    </div>
  </div>
</div>
<script type ="text/javascript">
function kalkulasi() {
    //Initialize total to 0
    var total = 0;
    $(".calc_stok_keluar").each(function() {
      // Sum only if the text entered is number and greater than 0
      if (!isNaN(this.value) && this.value.length != 0) {
        total += parseFloat(this.value);
      }
    });
    //Assign the total to label
    //.toFixed() method will roundoff the final sum to 2 decimal places
    $('#total').val(total.toFixed(0));
  }
	</script>
<script type="text/javascript">
        function add_form()
        {
            var html = '';

            html += '<tr style="text-align:center">';
            html += '<td></td>';
            html += '<td><select class="form-control" name="id_bahan[]" id="id_bahan"><option selected disabled>-- Pilih Data --</option><?php foreach($bahanbantu as $data): ?><option value="<?= $data->id; ?>"><?= $data->kd_bahan; ?></option><?php endforeach;?></select></td>';
            html += '<td><input id="stokkeluar" name="stokkeluar[]" type="text" class="form-control calc_stok_keluar" required autocomplete="stokkeluar"></td>';
            html += '<td><button type="button" class="btn btn-danger" onclick="del_form(this)">-</button></td>';
            html += '</tr>';

            $('#form-body').append(html);
            $('#total').blur( function(){
              kalkulasi();
            });

        }

        function del_form(id)
        {
            id.closest('tr').remove();
            kalkulasi();
        }
</script>