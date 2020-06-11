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
    <button type="button" href="<?= base_url(); ?>vinirmasuk/ubahBaku/1" data-id="1" class="btn btn-outline-success editNilaiTetap" data-toggle="modal" data-target="#tampilBaku"><i class="fa fa-edit"></i> Edit Nilai Baku</button>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis Kayu</th>
                <th>Ukuran (mm)</th>
                <th>Stok (pcs)</th>
                <th>Kubikasi (M<sup>3</sup>)</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($vinirmasuk as $data) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= date('d-m-Y' ,strtotime($data->tgl)); ?></td>
                <td><?= $data->nama; ?></td>
                <td><?= $data->tebal; ?> mm x <?= $data->panjang; ?> x <?= $data->lebar; ?></td>
                <td><?= $data->stok_masuk; ?></td>
                <td><?= $data->kubik_masuk; ?></td>
                <td><?= $data->keterangan; ?></td>
                <td>
                    <a href="<?= base_url(); ?>vinirmasuk/detailMasuk/<?= $data->id; ?>" class="btn btn-info btn-circle btn-sm" data-id="<?= $data->id; ?>" ><i class="fa fa-eye"></i></a>
                    <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="Tanggal <?= $data->tgl?>" href="<?= base_url(); ?>vinirmasuk/hapusMasuk/<?= $data->id; ?>"><i class="fa fa-trash"></i></button>
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
        <h5 class="modal-title" id="ModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="formModal">
        <input type="hidden" name="id" id="id">
        <input type="hidden" name="id_kayu" id="id_kayu" value="">
        <input type="hidden" name="id_vinir" id="id_vinir" value="">
            <div class="box-body">
                <?php foreach($nilaibaku as $i) : ?>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="Dbobin">Ø Bobin (m)</label>
                        <input type="text" name="Dbobin" id="Dbobin" class="form-control" value="<?= $i->dbobin; ?>" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="kerapatan">Kerapatan</label>
                        <input type="text" name="kerapatan" id="kerapatan" class="form-control" value="<?= $i->kerapatan; ?>" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="Vbobin">Vol. Bobin (m)</label>
                        <input type="text" name="Vbobin" id="Vbobin" class="form-control" value="<?= $i->vbobin; ?>" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="nilaiphi">Nilai Phi</label>
                        <input type="text" name="nilaiphi" id="nilaiphi" class="form-control" value="<?= $i->phi; ?>" readonly>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-3">
                        <label for="jeniskayu">Jenis Kayu</label>
                        <select class="form-control" name="jeniskayu" id="jeniskayu" onchange="jenis();">
                            <option selected disabled>-- Pilih Data --</option>
                            <?php foreach($jeniskayu as $data): ?>
                            <option value="<?= $data->id; ?>"><?= $data->nama; ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="perlog">Kubik per Log</label>
                        <input type="text" name="perlog" id="perlog" class="form-control" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="jmlkubik">Jml. Kubik Terpakai</label>
                        <input type="text" name="jmlkubik" id="jmlkubik" class="form-control jmlkubik" onchange="hitunglog();">
                    </div>
                    <div class="col-md-3">
                        <label for="kayulog">Jml. Log Terpakai</label>
                        <input type="text" name="kayulog" id="kayulog" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-md-4">
                        <label for="ukurpot">Tanggal</label>
                        <input type="date" name="tgl" id="tgl" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="ukurpot">Ukuran Vinir</label>
                        <select class="form-control ukurpot" name="ukurpot" id="ukurpot">
                            <option selected disabled>-- Pilih Data --</option>
                        </select>
                        <input type="hidden" name="pjg" id="pjg" class="form-control" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="volvinir">Vol. Vinir/lembar (M<sup>3</sup>)</label>
                        <input type="text" name="volvinir" id="volvinir" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="jari">r Reeling (Cm)</label>
                        <input type="text" name="jari" id="jari" class="form-control jarijari" onchange="hitungreel();">
                    </div>
                    <div class="col-md-4">
                        <label for="volreeling">Vol. Reeling (M<sup>3</sup>)</label>
                        <input type="text" name="volreeling" id="volreeling" class="form-control" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="jml_vinir">Jml. Vinir/reeling (pcs)</label>
                        <input type="text" name="jml_vinir" id="jml_vinir" class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-md-2">
                        <label for="rendemen">Rendemen</label>
                        <input type="text" name="rendem" id="rendem" value="<?= $i->rendem; ?>" class="form-control" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="ttl_vinir">Total Vinir (pcs)</label>
                        <input type="text" name="ttl_vinir" id="ttl_vinir" class="form-control" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="ttl_kubik">Total Kubikasi (M<sup>3</sup>)</label>
                        <input type="text" name="ttl_kubik" id="ttl_kubik" class="form-control" readonly>
                    </div>
                </div>
                <?php endforeach; ?>
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

<!-- MODAL Nilai Baku-->
<div class="modal fade" id="tampilBaku" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Edit Nilai Baku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url();?>vinirmasuk/ubahBaku" method="POST" id="formModal">
        <input type="hidden" name="id_baku" id="id_baku">
            <div class="box-body">
            <div class="form-group row">
                <label for="dia_bobin" class="col-sm-3 col-form-label text-md-right">Ø Bobin (m)</label>
                <div class="col-md-8">
                    <input id="dia_bobin" type="text" class="form-control" name="dia_bobin">
                </div>
            </div>
            <div class="form-group row">
                <label for="density" class="col-sm-3 col-form-label text-md-right">Kerapatan</label>
                <div class="col-md-8">
                    <input id="density" type="text" class="form-control" name="density">
                </div>
            </div>
            <div class="form-group row">
                <label for="vol_bobin" class="col-sm-3 col-form-label text-md-right">Volume Bobin</label>
                <div class="col-md-8">
                    <input id="vol_bobin" type="text" class="form-control" name="vol_bobin">
                </div>
            </div>
            <div class="form-group row">
                <label for="n_phi" class="col-sm-3 col-form-label text-md-right">Nilai Phi</label>
                <div class="col-md-8">
                    <input id="n_phi" type="text" class="form-control" name="n_phi">
                </div>
            </div>
            <div class="form-group row">
                <label for="rendemen" class="col-sm-3 col-form-label text-md-right">Rendemen</label>
                <div class="col-md-8">
                    <input id="rendemen" type="text" class="form-control" name="rendemen">
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
    function jenis(){
        var id = $('#jeniskayu').val();
        $.ajax({
            url:"<?php echo base_url();?>vinirmasuk/cariJenis",
            data: {id : id},
            type: "post",
            dataType: "JSON",
            success:function(data){
                $('#id_kayu').val(data[0].id);
                var kubiklog = data[0].kubikasi;
                var stoklog = data[0].stok;
                var perlog = parseFloat(kubiklog/stoklog);
                $('#perlog').val(perlog.toFixed(2));
                var y ="";
                var i;
                y = '<option value="" disabled selected>-- Pilih Data -- </option>';
                for (i in data[1]){
                    var pj = (data[1][i].panjang);
                    var lb = (data[1][i].lebar);
                    y += '<option id="'+ data[1][i].vinirid +'" data-tebal="'+data[1][i].tebal+'" data-panjang="'+pj+'" data-lebar="'+lb+'">'+ data[1][i].tebal +' mm x '+ pj +' x '+ lb +' </option>';
                }
                $('#ukurpot').html(y);
                $('#ukurpot').change(function(){
                    var getID = $(this).children(':selected').attr('id');
                    var getTebal = $(this).children(':selected').data('tebal');
                    var getPanjang = $(this).children(':selected').data('panjang');
                    var getLebar = $(this).children(':selected').data('lebar');
                    $('#id_vinir').val(getID);
                    $('#pjg').val(getPanjang/1000);
                    var vol = 0;
                    $('.ukurpot').each(function(){
                        if (!isNaN(vol) && vol.length != 0){
                            vol = parseFloat((getTebal*getPanjang*getLebar)/1000000000);
                        }
                    });
                    $('#volvinir').val(vol.toFixed(4));
                });
            },
            error : function(){
                alert('Data Belum Ada!');
            }
        });
    };

    function hitunglog() {
        var perlog = $('#perlog').val();
        var jmlkubik = $('#jmlkubik').val();
        var batang = 0;
        $('.jmlkubik').each(function(){
            if (!isNaN(batang) && batang.length != 0){
                batang = parseInt(jmlkubik/perlog);
            }
        });
        $('#kayulog').val(batang);
    };

    function hitungreel(){
        var jari = parseFloat(($('#jari').val())/100);
        var dbobin = parseFloat($('#Dbobin').val());
        var kerapatan = parseFloat($('#kerapatan').val());
        var vbobin = parseFloat($('#Vbobin').val());
        var phi = parseFloat($('#nilaiphi').val());
        var logkubik = parseFloat($('#jmlkubik').val());
        var rend = parseFloat($('#rendem').val());
        var panjang = parseFloat($('#pjg').val());
        var volvinir = parseFloat($('#volvinir').val());
        var nilai1 = parseFloat((Math.pow(parseFloat(jari+jari+dbobin),2))*phi*panjang);
        var nilai2 = parseFloat(vbobin*kerapatan);
        var nilaiakhir = 0, jmlvinir = 0, totalvin = 0, kubikvin = 0;
        $('.jarijari').each(function(){
            if (!isNaN(nilaiakhir) && nilaiakhir.length != 0){
                nilaiakhir = nilai1-nilai2;
                jmlvinir = Math.round(nilaiakhir/volvinir);
                var vin = Math.round(logkubik/nilaiakhir);
                totalvin = Math.round(vin*jmlvinir*rend);
                kubikvin = parseFloat(totalvin*volvinir);
            }
        });
        $('#volreeling').val(nilaiakhir.toFixed(4));
        $('#jml_vinir').val(jmlvinir);
        $('#ttl_vinir').val(totalvin);
        $('#ttl_kubik').val(kubikvin.toFixed(2));
    };
</script>