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
                    <option value="">-- Pilih Data --</option>
                    <option value="Type-1 Melamine">Type-1 Melamine</option>
                    <option value="Type-2 LFE">Type-2 LFE</option>
                  </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="id_ukuran" class="col-sm-3 col-form-label text-md-right">Ukuran</label>
                <div class="col-md-8">
                    <select class="form-control idukuran" name="id_ukuran[]" id="id_ukuran" onchange="ukuran()">
                        <option selected disabled>-- Pilih Data --</option>
                        <?php foreach($ukuran as $data): ?>
                            <option value="<?= $data->id; ?>"><?= $data->panjang; ?> x <?= $data->lebar; ?></option>
                        <?php endforeach;?>
                    </select>
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
                        <!-- <th style="width: 40%">Ukuran</th> -->
                        <th style="width: 50%">Vinir</th>
                        <!-- <th style="width: 20%">Kubikasi</th> -->
                        <th style="width: 10%"></th>
                    </tr>
                </thead>
                <tbody id="form-body">
                    <tr style="text-align:center">
                        <td></td>
                        <!-- <td>
                            <select class="form-control idukuran" name="id_ukuran[]" id="id_ukuran" onchange="ukuran()">
                                <option selected disabled>-- Pilih Data --</option>
                                <?php foreach($ukuran as $data): ?>
                                    <option value="<?= $data->id; ?>"><?= $data->panjang; ?> x <?= $data->lebar; ?></option>
                                <?php endforeach;?>
                            </select>
                        </td> -->
                        <td>
                            <select class="form-control" name="id_vinir[]" id="id_vinir" onchange="autofill()">
                              <option selected disabled>-- Pilih Data --</option>
                            </select>
                            <input type="hidden" id="tblply" class="tbl_ply" name="tblply[]" value="" onchange="tebal()">
                        </td>
                        <!-- <td>
                            <input id="vinirstokkeluar" type="text" class="form-control vinir_stok_keluar" name="vinirstokkeluar[]" required>
                        </td>
                        <td>
                            <input id="kubikkeluar" type="text" class="form-control kubik_keluar" name="kubikkeluar[]" required autocomplete="kubikasi">
                        </td> -->
                        <td>
                            <div class="input-group-btn">
                            <button class="btn btn-success" onclick="add_form()" type="button">+</button>
                        </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" id="total_tbl" name="total_tbl" value="">
            <input type="hidden" id="pjgply" name="pjgply" value="">
            <input type="hidden" id="lbrply" name="lbrply" value="">
            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Jumlah Vinir Terpakai</label>
                <div class="col-md-8">
                    <input id="total_stok" type="text" class="form-control" name="total_stok" autocomplete="total_stok" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="col-sm-3 col-form-label text-md-right">Jumlah Kubikasi</label>
                <div class="col-md-8">
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
    var html = '';
    var max_field = 21;
    var x = 1;

    // html += '<tr style="text-align:center">';
    // html += '<td></td>';
    // html += '<td><select class="form-control idukuran" name="id_ukuran[]" id="" onchange="ukuran()"><option selected disabled>-- Pilih Data --</option><?php foreach($ukuran as $data): ?><option value="<?= $data->id; ?>"><?= $data->panjang; ?> x <?= $data->lebar; ?></option><?php endforeach;?></select></td>';
    // html += '<td><select class="form-control" name="id_vinir[]" id="" onchange="autofill()"><option selected disabled>-- Pilih Data --</option></select><input type="hidden" id="tblply" class="tbl_ply" name="tblply[]" value="" onchange="tebal()"></td>';
    // html += '<td><button type="button" class="btn btn-danger" onclick="del_form(this)">-</button></td>';
    // html += '</tr>';

    html += '<tr style="text-align:center">';
    html += '<td></td>';
    html += '<td><select class="form-control" name="id_vinir[]" id="" onchange="autofill()"><option selected disabled>-- Pilih Data --</option></select><input type="hidden" id="tblply" class="tbl_ply" name="tblply[]" value="" onchange="tebal()"></td>';
    html += '<td><button type="button" class="btn btn-danger" onclick="del_form(this)">-</button></td>';
    html += '</tr>';

    function add_form()
    {
        if (x == max_field) {
            alert('Form Telah Melebihi Batas Hingga '+x+' !')
        } else {
            $('#form-body').append(html);
            ukuran();
            x++;
        }
    }

    function del_form(id)
    {
        id.closest('tr').remove();
        // calc_stok();
        // calc_kubik();
        x--;
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
                $('#tblply').val(t);
                $('#pjgply').val(p);
                $('#lbrply').val(l);
            },
            error : function(){
                alert('Data Belum Ada!');
            }
        });
    }

    function ukuran(){
        var id = $("#id_ukuran").val();
        console.log(id);
        $.ajax({
            url:"<?php echo base_url();?>plywood/cariUkuran",
            data: {id_ukuran : id},
            type: "post",
            dataType: "JSON",
            success:function(data){
                var x = "";
                var i;
                x += '<option selected disabled>-- Pilih Data --</option>';
                for (i in data){
                    x += '<option value="'+ data[i].vinirid +'">'+ data[i].nama +', '+ data[i].tebal +' mm x '+ data[i].panjang +' x '+ data[i].lebar +'</option>';
                }
                $('#id_vinir').html(x);
            },
            error : function(XMLHttpRequest, textStatus, errorThrown){
                alert('Data Belum Ada atau ada Kesalahan '+XMLHttpRequest.responseText);
            }
        });
    }

    function ukuran2(id){
        $('.idukuran').each(function() {
            var id = $(this).val();
            console.log(id);
            $.ajax({
                url:"<?php echo base_url();?>plywood/cariUkuran",
                data: {id_ukuran : id},
                type: "post",
                dataType: "JSON",
                success:function(data){
                    var x = "";
                    var i;
                    x += '<option selected disabled>-- Pilih Data --</option>';
                    for (i in data){
                        x += '<option value="'+ data[i].vinirid +'">'+ data[i].nama +', '+ data[i].tebal +' mm x '+ data[i].panjang +' x '+ data[i].lebar +'</option>';
                    }
                    id.html(x);
                },
                error : function(XMLHttpRequest, textStatus, errorThrown){
                    alert('Data Belum Ada atau ada Kesalahan '+XMLHttpRequest.responseText);
                }
            });
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
