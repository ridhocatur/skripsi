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
                <th>Total Produksi (Pcs)</th>
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
                <td><?= $data->shift; ?></td>
                <td><?= $data->tipe_glue; ?></td>
                <td><?= $data->ukuran; ?></td>
                <td><?= $data->total_prod; ?></td>
                <td><?= $data->total_kubik; ?></td>
                <td><?= $data->keterangan; ?></td>
                <td>
                    <a class="btn btn-info btn-circle btn-sm" data-id="<?= $data->id; ?>" href="<?= base_url(); ?>/plywood/detail/<?= $data->id; ?>"><i class="fa fa-eye"></i></a>
                    <button id="delete" class="btn btn-danger btn-circle btn-sm" data-title="Tanggal <?= $data->tgl?>" href="<?= base_url(); ?>/plywood/hapus/<?= $data->id; ?>"><i class="fa fa-trash"></i></button>
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
                <label for="id_ukuran" class="col-sm-3 col-form-label text-md-right">Ukuran</label>
                <div class="col-md-8">
                    <select class="form-control idukuran" name="id_ukuran[]" id="id_ukuran" onchange="panjang();">
                        <option selected disabled>-- Pilih Data --</option>
                        <?php foreach($ukuran as $data): ?>
                            <option id="<?= $data->id; ?>" data-panjang="<?= $data->panjang; ?>" data-lebar="<?= $data->lebar; ?>"><?= $data->panjang; ?> x <?= $data->lebar; ?></option>
                        <?php endforeach;?>
                    </select>
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
                <label for="level" class="col-sm-3 text-md-right">Shift</label>
                <div class="col-md-4">
                  <label class="radio-inline"><input type="radio" name="shift" id="shift" value="1"> 1 (Satu) </label>
                  <label class="radio-inline"><input type="radio" name="shift" id="shift" value="2"> 2 (Dua) </label>
                </div>
            </div>

            <table class="table table-borderless">
                <thead>
                    <tr style="text-align:center">
                        <th style="width: 10%"></th>
                        <th style="width: 50%">Vinir</th>
                        <th style="width: 10%"></th>
                    </tr>
                </thead>
                <tbody id="form-body">
                    <tr style="text-align:center">
                        <td></td>
                        <td>
                            <select class="form-control idvinir" name="id_vinir[]" id="id_vinir" onchange="autofill(this)">
                              <option selected disabled>-- Pilih Data --</option>
                            </select>
                            <input type="hidden" id="tblply" class="tbl_ply" name="tblply[]" value="">
                        </td>
                        <td>
                            <div class="input-group-btn">
                            <button class="btn btn-success" onclick="add_form();" type="button">+</button>
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="total_tbl">Tebal Plywood</label>
                    <input type="text" id="total_tbl" name="total_tbl" value="" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="total_tbl">Jumlah Vinir Terpakai</label>
                    <input id="total_stok" type="text" class="form-control" name="total_stok" autocomplete="total_stok" value="">
                </div>
                <div class="col-md-4">
                    <label for="total_tbl">Jumlah Kubikasi</label>
                    <input id="total_kubik" type="text" class="form-control" name="total_kubik" autocomplete="total_kubik" value="">
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
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    var x = 1;
    function panjang() {
        var pjg = $('#id_ukuran').children(':selected').data('panjang');
        var lbrs = $('#id_ukuran').children(':selected').data('lebar');
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
                    x += '<option value="'+ data[i].vinirid +'" data-tebal="'+ data[i].tebal +'">'+ data[i].nama +', '+ data[i].tebal +' mm x '+ data[i].panjang +' x '+ data[i].lebar +'</option>';
                }
                $('#id_vinir').html(x);
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
                    html += '<td><select class="form-control idvinir" name="id_vinir[]" id="id_vinir" onchange="autofill(this)">';
                    html += '<option selected disabled>-- Pilih Data --</option>';
                    for (i in data){
                        html += '<option value="'+ data[i].vinirid +'" data-tebal="'+ data[i].tebal +'">'+ data[i].nama +', '+ data[i].tebal +' mm x '+ data[i].panjang +' x '+ data[i].lebar +'</option>';
                    }
                    html += '<input type="hidden" id="tblply" class="tbl_ply" name="tblply[]" value=""></td>';
                    html += '<td><button type="button" class="btn btn-danger" onclick="del_form(this)">-</button></td>';
                    html += '</select>';
                    html += '</tr>';

                    $('#form-body').append(html);
                },
                error : function(XMLHttpRequest, textStatus, errorThrown){
                    alert('Data Belum Ada atau ada Kesalahan');
                }
            });
            tebal();
            x++;
        }
    }

    function del_form(id)
    {
        id.closest('tr').remove();
        tebal();
        x--;
    }

    function autofill(id_value){
        var id = id_value.value;
        $.ajax({
            url:"<?php echo base_url();?>vinirmasuk/cariTebal",
            data: {id : id},
            type: "post",
            dataType: "JSON",
            success:function(data){
                $('.tbl_ply').val(data[0].tebal);
            },
            error : function(){
                alert('Data Belum Ada!');
            }
        });
    }

    function tebal() {
        var total = 0;
        $(".tbl_ply").each(function() {
            if (!isNaN(this.value) && this.value.length != 0) {
            total += parseFloat(this.value);
            }
        });
        $('#total_tbl').val(total.toFixed(1));
    }

    function stok() {
        var total = 0;
        $("#tblply").each(function() {
            if (!isNaN(this.value) && this.value.length != 0) {
            total += parseFloat(this.value);
            }
        });
        $('#total_tbl').val(total.toFixed(1));
    }
</script>
