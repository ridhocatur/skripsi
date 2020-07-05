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
    <button type="button" class="btn btn-outline-primary tambahPlywood" data-toggle="modal" data-target="#tampilModal"><i class="fa fa-plus"></i> Tambah Data</button>
</div>
<div class="card-body">
    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Shift</th>
                <th>Tipe Glue</th>
                <th>Ukuran</th>
                <th>Total Produksi (lembar)</th>
                <th>Total Kubikasi (M<sup>3</sup>)</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($plywood as $data) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= date('d-m-Y' ,strtotime($data->tgl)); ?></td>
                <td align="center"><?= $data->shift; ?></td>
                <td><?= $data->tipe_glue; ?></td>
                <td><?= $data->tebal; ?> mm x <?= $data->panjang; ?> x <?= $data->lebar; ?></td>
                <td align="center"><?= $data->total_prod; ?></td>
                <td align="center"><?= $data->total_kubik; ?></td>
                <td><?= $data->keterangan; ?></td>
                <td>
                    <a class="btn btn-info btn-circle btn-sm" data-id="<?= $data->id; ?>" href="<?= base_url(); ?>plywood/detail/<?= $data->id; ?>"><i class="fa fa-eye"></i></a>
                    <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="Tanggal <?= date('d-m-Y' ,strtotime($data->tgl)); ?>" href="<?= base_url(); ?>/plywood/hapus/<?= $data->id; ?>"><i class="fa fa-trash"></i></button>
                </td>
                <form action="" method="POST" id="deleteForm">
                    <input type="submit" value="" style="display:none">
                </form>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
</div>
</div>

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
        <div class="box-body">
            <p></p>
            <div class="form-group row">
                <label for="tgl" class="col-sm-3 col-form-label text-md-right">Tanggal</label>
                <div class="col-md-8">
                    <input id="tgl" type="date" class="form-control" name="tgl" required autocomplete="tgl" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="tipe_glue" class="col-sm-3 col-form-label text-md-right">Jenis Lem</label>
                <div class="col-md-8">
                  <select class="form-control" name="tipe_glue" id="tipe_glue">
                    <option selected disabled>-- Pilih Data --</option>
                    <option value="Type-1 Melamine">Type-1 Melamine</option>
                    <option value="Type-2 LFE">Type-2 LFE</option>
                  </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="id_ukuran" class="col-sm-3 col-form-label text-md-right">Ukuran (mm)</label>
                <div class="col-md-8">
                    <select class="form-control idukuran" name="id_ukuran" id="id_ukuran" onchange="panjang();">
                        <option selected disabled>-- Pilih Data --</option>
                        <?php foreach($ukuran as $data): ?>
                            <option id="<?= $data->id; ?>" data-panjang="<?= $data->panjang; ?>" data-lebar="<?= $data->lebar; ?>"><?= $data->panjang; ?> x <?= $data->lebar; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="idukuran" id="idukuran" value="" >
                    <input type="hidden" name="pjgs" id="pjgs" value="" >
                    <input type="hidden" id="lbrply" name="lbrply" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="lapisanply" class="col-sm-3 col-form-label text-md-right">Lapisan Plywood</label>
                <div class="col-md-8">
                  <select class="form-control" name="lapisanply" id="lapisanply" onchange="lapisan();">
                    <option selected disabled>-- Pilih Data --</option>
                    <option value="3">3 Ply</option>
                    <option value="5">5 Ply</option>
                    <option value="7">7 Ply</option>
                    <option value="9">9 Ply</option>
                    <option value="11">11 Ply</option>
                  </select>
                  <input type="hidden" name="lapply" id="lapply" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="shift" class="col-sm-3 text-md-right">Shift</label>
                <div class="col-md-4">
                  <label class="radio-inline"><input type="radio" name="shift" id="shift" value="1"> 1 (Satu) </label>
                  <label class="radio-inline"><input type="radio" name="shift" id="shift" value="2"> 2 (Dua) </label>
                </div>
            </div>

            <div class="form-group row">
                <label for="vinir_keluar" class="col-sm-3 text-md-right">Jumlah Vinir Terpakai</label>
                <div class="col-md-4">
                    <input id="vinir_keluar" type="text" class="form-control" name="vinir_keluar" value="" onchange="hitungttl();">
                </div>
            </div>

            <table class="table table-borderless">
                <thead>
                    <tr style="text-align:center">
                        <th style="width: 5%"></th>
                        <th style="width: 40%">Vinir</th>
                        <th style="width: 20%">Jenis</th>
                        <th style="width: 20%">Kubikasi (M<sup>3</sup>)</th>
                        <th style="width: 5%"></th>
                    </tr>
                </thead>
                <tbody id="form-body">
                    <tr style="text-align:center">
                        <td></td>
                        <td>
                            <select class="form-control idvinir" name="ukurvinir[]" id="ukurvinir">
                                <option selected disabled>-- Pilih Data --</option>
                            </select>
                            <input type="hidden" id="tblply" class="tbl_ply" name="tblply[]" value="">
                        </td>
                        <td>
                            <select class="form-control" name="jenis[]" id="jenis">
                                <option selected disabled>-- Pilih Data --</option>
                                <option value="face back">Face Back</option>
                                <option value="core">Core</option>
                                <option value="long grain">Long Grain</option>
                            </select>
                        </td>
                        <td>
                            <input id="jml_kubikvinir" type="text" class="form-control jml_kubikvinir" name="jml_kubikvinir[]" required readonly>
                        </td>
                        <td>
                            <div class="input-group-btn">
                            <button class="btn btn-success" onclick="add_form();" type="button">+</button>
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group row justify-content-center">
                <div class="col-md-3">
                    <label for="ttl_tebal">Tebal Plywood</label>
                    <input type="text" id="ttl_tebal" name="ttl_tebal" value="" class="form-control" readonly>
                </div>
                <div class="col-md-3">
                    <label for="volply">Volume Plywood/lembar</label>
                    <input type="text" id="volply" name="volply" value="" class="form-control" readonly>
                </div>
                <div class="col-md-3">
                    <label for="jml_pcs">Jumlah Plywood (pcs)</label>
                    <input id="jml_pcs" type="text" class="form-control" name="jml_pcs" value="" placeholder="Pcs" readonly>
                </div>
                <div class="col-md-3">
                    <label for="jml_kubik">Jumlah Plywood (M<sup>3</sup>)</label>
                    <input id="jml_kubik" type="text" class="form-control" name="jml_kubik" placeholder="M<sup>3</sup>" value="" readonly>
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
        <button type="button" class="btn btn-secondary keluar" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-warning tombolReset">Reset</button>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    var x = 1;
    function panjang() {
        var id = $('#id_ukuran').children(':selected').attr('id');
        var pjg = $('#id_ukuran').children(':selected').data('panjang');
        var lbrs = $('#id_ukuran').children(':selected').data('lebar');
        $('#idukuran').val(id);
        $('#pjgs').val(pjg);
        $('#lbrply').val(lbrs);
        $.ajax({
            url:"<?php echo base_url();?>vinirmasuk/cariUkuran",
            data: {pjg : pjg},
            type: "post",
            dataType: "JSON",
            success:function(data){
                var x = "";
                var i;
                x += '<option selected disabled>-- Pilih Data --</option>';
                for (i in data){
                    x += '<option value="'+ data[i].vinirid +'" data-tebal="'+ data[i].tebal +'" data-panjang="'+ data[i].panjang +'" data-lebar="'+ data[i].lebar +'">'+ data[i].nama +', '+ data[i].tebal +' mm x '+ data[i].panjang +' x '+ data[i].lebar +'</option>';
                }
                $('#ukurvinir').html(x);
            },
            error : function(XMLHttpRequest, textStatus, errorThrown){
                alert('Data Belum Ada atau ada Kesalahan '+XMLHttpRequest.responseText);
            }
        });
    }

    function lapisan() {
        var max_field = $('#lapisanply').val();
        $('#lapply').val(max_field);
    }

    function add_form()
    {
        var max = parseInt($('#lapply').val());
        if (x == max) {
            alert('Form Telah Melebihi Batas Hingga '+x+' Baris!')
        } else if ( !max ) {
            alert('Lapisan Plywood belum ditentukan')
        } else {
            var pjg = $('#pjgs').val();
            $.ajax({
                url:"<?= base_url();?>vinirmasuk/cariUkuran",
                data: {pjg : pjg},
                type: "post",
                dataType: "JSON",
                success:function(data){
                    var html = '';
                    html += '<tr style="text-align:center">';
                    html += '<td></td>';
                    html += '<td><select class="form-control idvinir" name="ukurvinir[]" id="ukurvinir">';
                    html += '<option selected disabled>-- Pilih Data --</option>';
                    for (i in data){
                        html += '<option value="'+ data[i].vinirid +'" data-tebal="'+ data[i].tebal +'" data-panjang="'+ data[i].panjang +'" data-lebar="'+ data[i].lebar +'">'+ data[i].nama +', '+ data[i].tebal +' mm x '+ data[i].panjang +' x '+ data[i].lebar +'</option>';
                    }
                    html += '<input type="hidden" id="tblply" class="tbl_ply" name="tblply[]" value=""></td>';
                    html += '<td><select class="form-control" name="jenis[]" id="jenis"><option selected disabled>-- Pilih Data --</option><option value="face back">Face Back</option><option value="core">Core</option><option value="long grain">Long Grain</option></select></td>';
                    html += '<td><input id="jml_kubikvinir" type="text" class="form-control jml_kubikvinir" name="jml_kubikvinir[]" required readonly></td>';
                    html += '<td><button type="button" class="btn btn-danger" onclick="del_form(this)">-</button></td>';
                    html += '</select>';
                    html += '</tr>';

                    $('#form-body').append(html);
                },
                error : function(XMLHttpRequest, textStatus, errorThrown){
                    alert('Data Belum Ada atau ada Kesalahan');
                }
            });
            x++;
        }
    }

    function del_form(id)
    {
        id.closest('tr').remove();
        tebal();
        x--;
    }

    function tebal() {
        var total = 0;
        $(".tbl_ply").each(function() {
            if (!isNaN(this.value) && this.value.length != 0) {
                total += parseFloat(this.value);
            }
        });
        $('#ttl_tebal').val(total.toFixed(1));
    }

    function hitungttl(){
        var stok = parseInt($("#vinir_keluar").val());
        var tb = parseFloat($("#ttl_tebal").val());
        var pj = parseInt($("#pjgs").val());
        var lb = parseInt($("#lbrply").val());
        var volply = parseFloat((tb*pj*lb)/1000000000);
        $('#volply').val(volply.toFixed(4));
        var rdm = stok - (stok * 0.28);
        var kbk = parseFloat(volply.toFixed(4) * rdm);
        var pcs = kbk.toFixed(2) / volply.toFixed(4);
        $('#jml_pcs').val(Math.round(pcs));
        $('#jml_kubik').val(kbk.toFixed(2));
    }
</script>
