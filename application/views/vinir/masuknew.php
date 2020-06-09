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
    <button type="button" class="btn btn-outline-primary tambahVinirMasuk" data-toggle="modal" data-target="#tampilModal"><i class="fa fa-plus"></i> Tambah Data</button>
    <button type="button" class="btn btn-outline-success editNilaiTetap" data-toggle="modal" data-target="#tampilModal"><i class="fa fa-edit"></i> Edit Nilai Baku</button>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kode Log</th>
                <th>Jenis Kayu</th>
                <th>Tebal (mm)</th>
                <th>Ukuran (mm)</th>
                <th>Pemakaian Log</th>
                <th>Stok (pcs)</th>
                <th>Kubikasi (M<sup>3</sup>)</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- <?php $no=1; foreach ($vinirmasuk as $data) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= date('d-m-Y' ,strtotime($data->tgl)); ?></td>
                <td><?= $data->kd_kayu; ?></td>
                <td><?= $data->tebal; ?> mm x <?= $data->panjang; ?> x <?= $data->lebar; ?></td>
                <td><?= $data->jml_log; ?></td>
                <td><?= $data->stok_masuk; ?></td>
                <td><?= $data->kubik_masuk; ?></td>
                <td><?= $data->keterangan; ?></td>
                <td>
                    <a href="<?= base_url(); ?>vinirmasuk/ubahMasuk/<?= $data->id; ?>" class="btn btn-info btn-circle btn-sm tombolUbahVinirMasuk" data-toggle="modal" data-target="#tampilModal" data-id="<?= $data->id; ?>" ><i class="fa fa-edit"></i></a>
                    <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="Tanggal <?= $data->tgl?>" href="<?= base_url(); ?>vinirmasuk/hapusMasuk/<?= $data->id; ?>"><i class="fa fa-trash"></i></button>
                </td>
                <form action="" method="POST" id="deleteForm">
                    <input type="submit" value="" style="display:none">
                </form>
            </tr>
            <?php endforeach; ?> -->
        </tbody>
    </table>
</div>
</div>

<!-- MODAL Tambah Data-->
<div class="modal fade" id="tampilModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
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
        <input type="hidden" name="id_kayu" id="id_kayu" value="">
            <div class="box-body">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="Dbobin">Ø Bobin</label>
                        <input type="text" name="Dbobin" id="Dbobin" class="form-control" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="kerapatan">Kerapatan</label>
                        <input type="text" name="kerapatan" id="kerapatan" class="form-control" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="Vbobin">Vol. Bobin</label>
                        <input type="text" name="Vbobin" id="Vbobin" class="form-control" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="Vlogsisa">Vol. Log Core</label>
                        <input type="text" name="Vlogsisa" id="Vlogsisa" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="jeniskayu">Jenis Kayu</label>
                        <select class="form-control" name="jeniskayu" id="jeniskayu" onchange="jenis();">
                            <option selected disabled>-- Pilih Data --</option>
                            <?php foreach($jeniskayu as $data): ?>
                            <option value="<?= $data->id; ?>"><?= $data->nama; ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="kubiklog">Jml. Kubik Terpakai</label>
                        <input type="text" name="kubiklog" id="kubiklog" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="kayulog">Jml. Log Terpakai</label>
                        <input type="text" name="kayulog" id="kayulog" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="ukuran">Ukuran Potongan</label>
                        <select class="form-control" name="ukuran" id="ukuran" onchange="">
                            <option selected disabled>-- Pilih Data --</option>
                            <option value="pendek"> 183 cm </option>
                            <option value="panjang"> 244 cm </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="tebalvinir">Tebal Vinir</label>
                        <input type="text" name="tebalvinir" id="tebalvinir" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="ukuranvinir">Ukuran Vinir</label>
                        <div class="row">
                            <div class="col-md-6" name="ukuranvinir">
                                <input type="text" name="pjg" id="pjg" class="form-control" placeholder="Pjg">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="lbr" id="lbr" class="form-control" placeholder="Lbr">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="jenisvinir">Jenis Vinir</label>
                        <select class="form-control" name="jenisvinir" id="jenisvinir" onchange="">
                            <option selected disabled>-- Pilih Data --</option>
                            <option value="fb"> Face / Back </option>
                            <option value="core"> Core </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <label for="jari">Jari-Jari Reeling</label>
                        <input type="text" name="jari" id="jari" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="volreeling">Vol. Reeling (M<sup>3</sup>)</label>
                        <input type="text" name="volreeling" id="volreeling" class="form-control">
                    </div>
                    <div class="col-md-2"></div>
                </div>

                <div class="form-group row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <label for="volvinir">Vol. Vinir per Lembar(M<sup>3</sup>)</label>
                        <input type="text" name="volvinir" id="volvinir" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="jml_vinir">Jumlah Vinir (pcs)</label>
                        <input type="text" name="jml_vinir" id="jml_vinir" class="form-control">
                    </div>
                    <div class="col-md-2"></div>
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
    function jenis(){
        var id = document.getElementById('jeniskayu').value;
        $.ajax({
            url:"<?php echo base_url();?>vinirmasuk/cariJenis",
            data: {id : id},
            type: "post",
            dataType: "JSON",
            success:function(data){
                $('#id_kayu').val(data[0].kayuid);
                var x = "";
                var i;
                x = '<option value="" disabled selected>-- Pilih Data -- </option>';
                for (i in data[1]){
                    x += '<option value="'+ data[1][i].vinirid +'">'+ data[1][i].tebal +' mm x '+ data[1][i].panjang +' x '+ data[1][i].lebar +'</option>';
                }
                $('#id_vinir').html(x);
            },
            error : function(){
                alert('Data Belum Ada!');
            }
        });
    }
    function autofill(){
        var id = document.getElementById('id_vinir').value;
        $.ajax({
            url:"<?php echo base_url();?>vinirmasuk/cariUkuran",
            data: {id_vinir : id},
            type: "post",
            dataType: "JSON",
            success:function(data){
                var t = parseFloat((data.tebal)/10);
                var p = parseFloat((data.panjang)/10);
                var l = parseFloat((data.lebar)/10);
                $('#tbl').val(t);
                $('#pjg').val(p);
                $('#lbr').val(l);
            },
            error : function(){
                alert('Data Belum Ada!');
            }
        });
    }
    function hitungkubik() {
        var tbl = $('#tbl').val();
        var pjg = $('#pjg').val();
        var lbr = $('#lbr').val();
        var kubik = 0;
        var stokvinir = $('#stokvinirmasuk').val();
        $('.vinirmsk').each(function(){
            if (!isNaN(kubik) && kubik.length != 0){
                kubik = parseFloat((tbl*pjg*lbr)/1000000) * stokvinir;
            }
        });
        $('#kubikvinirmasuk').val(kubik.toFixed(2));
    }
</script>