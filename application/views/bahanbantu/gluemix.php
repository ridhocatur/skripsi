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
                        </td>
                        <form action="" method="POST" id="deleteForm">
                            <input type="submit" value="" style="display:none">
                        </form>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <div class="card-header py-3">
            <button type="button" class="btn btn-outline-primary tambahGluemix" data-toggle="modal" data-target="#tampilModal"><i class="fa fa-plus"></i> Tambah Data</button>
            <button id="cetakdata" class="btn btn-outline-info pull-right" data-toggle="modal" data-target="#cetakData"><i class="fa fa-print"></i> Cetak Data</button>
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
    <?php } ?>
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
      <form action="<?= base_url(); ?>gluemix/tambah" method="POST" id="Gluemix">
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
                  <select class="form-control" name="tipe_glue" id="tipe_glue" onchange="pilihGlue()">
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
                        <th style="width: 16%">Tepung</th>
                        <th style="width: 16%">Lem LFE</th>
                        <th style="width: 16%">Lem MF</th>
                        <th style="width: 16%">HU-100</th>
                        <th style="width: 16%">HU-103</th>
                        <th style="width: 16%">HU-360</th>
                    </tr>
                </thead>
                <tbody id="form-body" class="formData">
                    <tr style="text-align:center">
                        <td>
                            <input type="hidden" name="id_bahan[]" id="id_bahan" value="<?= $tepung->id ?>">
                            <input id="stokkeluar" type="text" class="form-control calc_stok_keluar tepung" name="stokkeluar[]" value="0" readonly>
                        </td>
                        <td>
                            <input type="hidden" name="id_bahan[]" id="id_bahan" value="<?= $lfe->id ?>">
                            <input id="stokkeluar" type="text" class="form-control calc_stok_keluar lfe" name="stokkeluar[]" value="0" readonly>
                        </td>
                        <td>
                            <input type="hidden" name="id_bahan[]" id="id_bahan" value="<?= $mf->id ?>">
                            <input id="stokkeluar" type="text" class="form-control calc_stok_keluar mf" name="stokkeluar[]" value="0" readonly>
                        </td>
                        <td>
                            <input type="hidden" name="id_bahan[]" id="id_bahan" value="<?= $hu100->id ?>">
                            <input id="stokkeluar" type="text" class="form-control calc_stok_keluar hu100" name="stokkeluar[]" value="0" readonly>
                        </td>
                        <td>
                            <input type="hidden" name="id_bahan[]" id="id_bahan" value="<?= $hu103->id ?>">
                            <input id="stokkeluar" type="text" class="form-control calc_stok_keluar hu103" name="stokkeluar[]" value="0" readonly>
                        </td>
                        <td>
                            <input type="hidden" name="id_bahan[]" id="id_bahan" value="<?= $hu360->id ?>">
                            <input id="stokkeluar" type="text" class="form-control calc_stok_keluar hu360" name="stokkeluar[]" value="0" readonly>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group row">
                <label for="total" class="col-sm-3 col-form-label text-md-right">Total</label>
                <div class="col-md-8">
                    <input id="total" type="text" class="form-control" name="total" autocomplete="total" value="" readonly>
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
        <form action="<?= base_url(); ?>laporan/gluemix" method="POST" target="_blank">
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
                <label for="lem" class="col-sm-3 col-form-label text-md-right">Jenis Lem</label>
                <div class="col-md-8">
                <select class="form-control" name="lem" id="lem">
                    <option selected disabled>-- Pilih Tipe Lem --</option>
                    <option value="">Semua Tipe Lem</option>
                    <option value="Type-1 Melamine">Type-1 Melamine</option>
                    <option value="Type-2 LFE">Type-2 LFE</option>
                </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="shift" class="col-sm-3 col-form-label text-md-right">Shift</label>
                <div class="col-md-8">
                <select class="form-control" name="shift" id="shift">
                    <option value="d" selected disabled>-- Pilih Shift --</option>
                    <option value="">Semua Shift</option>
                    <option value="1">Shift 1</option>
                    <option value="2">Shift 2</option>
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
    function pilihGlue()
    {
        if ($("#tipe_glue").val() == "Type-1 Melamine") {
            $(".lfe").attr('readonly', true).val(0);
            $(".mf").attr('readonly', false);
            $(".tepung").attr('readonly', false);
            $(".hu100").attr('readonly', true).val(0);
            $(".hu103").attr('readonly', true).val(0);
            $(".hu360").attr('readonly', false);
        } else if ($("#tipe_glue").val() == "Type-2 LFE"){
            $(".lfe").attr('readonly', false);
            $(".mf").attr('readonly', true).val(0);
            $(".tepung").attr('readonly', false);
            $(".hu100").attr('readonly', false);
            $(".hu103").attr('readonly', false)
            $(".hu360").attr('readonly', true).val(0);
        }
        kalkulasi();
    }

        //------------------ tombol Reset
    $('.tombolReset').on('click', function() {
        $('#Gluemix')[0].reset();
    });
</script>