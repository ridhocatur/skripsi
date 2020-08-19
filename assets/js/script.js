$(function () {
    // ------------------ tombol Reset
    $('.tombolReset').on('click', function() {
        $('#formModal')[0].reset();
        $('#vinir').html('<option selected disabled>-- Pilih Data --</option>');
    });

    //--------------------------------- Pegawai
    $('.tambahPegawai').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('#password').attr('placeholder','')
        // $('#formModal')[0].reset();
        $('.modal-body form').attr('action', 'http://localhost/trpbahanbaku/pegawai/tambah')
    });

    $('.tombolUbahPegawai').on('click', function(){
        $('#ubahUser').html('Ubah Data User')
        $('.modalUbahUser form').attr('action', 'http://localhost/trpbahanbaku/pegawai/ubah')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/trpbahanbaku/pegawai/getedit',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                $('#idUbah').val(data.id);
                $('#nikUbah').val(data.nik);
                $('#usernameUbah').val(data.username);
                $('#namaUbah').val(data.nama);
                $('#telpUbah').val(data.telp);
                $('#levelUbah').val(data.level);
                $('#old_imageUbah').val(data.gambar);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    $('.tombolUbahPass').on('click', function(){
        $('.modalUbahPass form').attr('action', 'http://localhost/trpbahanbaku/pegawai/ubahPass')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/trpbahanbaku/pegawai/getedit',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                $('#idPass').val(data.id);
                $('#labelModalPass').html('Ganti Password '+data.nama);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //------------------- Jenis Kayu
    $('.tambahJenisKayu').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        // $('#formModal')[0].reset();
        $('.modal-body form').attr('action', 'http://localhost/trpbahanbaku/jeniskayu/tambah')
    });

    $('.ubahJenisKayu').on('click', function(){
        $('#ModalLabel').html('Ubah Data Jenis Kayu')
        $('.modal-body form').attr('action', 'http://localhost/trpbahanbaku/jeniskayu/ubah')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/trpbahanbaku/jeniskayu/getedit',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                $('#id').val(data.id);
                $('#kd_jenis').val(data.kd_jenis);
                $('#nama').val(data.nama);
                $('#keterangan').val(data.keterangan);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Kategori
    $('.tambahKategori').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        // $('#formModal')[0].reset();
        $('.modal-body form').attr('action', 'http://localhost/trpbahanbaku/kategori/tambah')
    });

    $('.tombolUbahKategori').on('click', function(){
        $('#ModalLabel').html('Ubah Data Kategori')
        $('.modal-body form').attr('action', 'http://localhost/trpbahanbaku/kategori/ubah')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/trpbahanbaku/kategori/getedit',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                $('#id').val(data.id);
                $('#nm_kateg').val(data.nm_kateg);
                $('#keterangan').val(data.keterangan);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Ukuran
    $('.tambahUkuran').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        // $('#formModal')[0].reset();
        $('.modal-body form').attr('action', 'http://localhost/trpbahanbaku/ukuran/tambah')
    });

    $('.UbahUkuran').on('click', function(){
        $('#ModalLabel').html('Ubah Data Ukuran')
        $('.modal-body form').attr('action', 'http://localhost/trpbahanbaku/ukuran/ubah')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/trpbahanbaku/ukuran/getedit',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                $('#id').val(data.id);
                $('#panjang').val(data.panjang);
                $('#lebar').val(data.lebar);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Supplier
    $('.tambahSupplier').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        // $('#formModal')[0].reset();
        $('.modal-body form').attr('action', 'http://localhost/trpbahanbaku/supplier/tambah')
    });

    $('.tombolUbahSupplier').on('click', function(){
        $('#ModalLabel').html('Ubah Data Supplier')
        $('.modal-body form').attr('action', 'http://localhost/trpbahanbaku/supplier/ubah')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/trpbahanbaku/supplier/getedit',
            data: {id : id},
            type: "POST",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                // console.log(data);
                $('#id').val(data.id);
                $('#nm_sup').val(data.nm_sup);
                $('#sup').val(data.sup);
                $('#alamat').val(data.alamat);
                $('#email').val(data.email);
                $('#telp').val(data.telp);
                $('#keterangan').val(data.keterangan);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Kayu
    $('.tambahKayu').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('#kayumaster')[0].reset();
        $('form#kayumaster').attr('action', 'http://localhost/trpbahanbaku/kayulog/tambahKayu')
    });

    $('.tombolUbahKayu').on('click', function(){
        $('#ModalLabel').html('Ubah Data Kayu')
        $('form#kayumaster').attr('action', 'http://localhost/trpbahanbaku/kayulog/ubahKayu')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/trpbahanbaku/kayulog/geteditKayu',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                // console.log(data);
                $('#id').val(data.id);
                $('#kd_kayu').val(data.kd_kayu);
                $('#kd_jenis').val(data.id_jenis);
                $('#stok').val(data.stok);
                $('#kubikasi').val(data.kubikasi);
                $('#keterangan').val(data.keterangan);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Master Bahan Bantu
    $('.tambahbahanbantu').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('#bahanMaster')[0].reset();
        $('form#bahanMaster').attr('action', 'http://localhost/trpbahanbaku/bahanbantu/tambahBantu')
    });

    $('.ubahbahanbantu').on('click', function(){
        $('#ModalLabel').html('Ubah Data')
        $('form#bahanMaster').attr('action', 'http://localhost/trpbahanbaku/bahanbantu/ubahBantu')

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/trpbahanbaku/bahanbantu/geteditBantu',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                // console.log(data);
                $('#id').val(data.id);
                $('#kd_bahan').val(data.kd_bahan);
                $('#nama').val(data.nama);
                $('#merk').val(data.merk);
                $('#stok').val(data.stok);
                $('#id_kategori').val(data.id_kategori);
                $('#keterangan').val(data.keterangan);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Bahan Masuk
    $('.tambahBahanMasuk').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('form#bahanMasuk').attr('action', 'http://localhost/trpbahanbaku/bahanmasuk/tambahMasuk')
        $('#bahanMasuk')[0].reset();
        // $('#stok_masuk').prop("disabled", false);
    });

    $('.tombolUbahBahanMasuk').on('click', function(){
        $('#ModalLabel').html('Ubah Data Bahan')
        $('form#bahanMasuk').attr('action', 'http://localhost/trpbahanbaku/bahanmasuk/ubahMasuk')
        // $('#stok_masuk').prop("disabled", true);

        const id = $(this).data('id');
        // console.log(id);
        $.ajax({
            url: 'http://localhost/trpbahanbaku/bahanmasuk/geteditMasuk',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                // console.log(data);
                $('#id').val(data.id);
                $('#tgl').val(data.tgl);
                $('#id_bahan').val(data.id_bahan);
                $('#nm_bahan').val(data.nama);
                $('#stok_masuk').val(data.stok_masuk);
                $('#id_supplier').val(data.id_supplier);
                $('#keterangan').val(data.keterangan);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Master Vinir
    $('.tambahVinir').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('#vinirmaster')[0].reset();
        $('form#vinirmaster').attr('action', 'http://localhost/trpbahanbaku/vinir/tambah')
        $('#id_jenis').prop("disabled", false);
        $('#id_ukuran').prop("disabled", false);
    });

    $('.ubahVinir').on('click', function(){
        $('#ModalLabel').html('Ubah Data')
        $('form#vinirmaster').attr('action', 'http://localhost/trpbahanbaku/vinir/ubah')
        $('#id_jenis').prop("disabled", true);
        $('#id_ukuran').prop("disabled", true);

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/trpbahanbaku/vinir/getedit',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                // console.log(data);
                $('#id').val(data.id);
                $('#id_jenis').val(data.id_jenis);
                $('#tebal').val(data.tebal);
                $('#ukurpot').val(data.potongan);
                $('#pjg').val(data.panjang);
                $('#lbr').val(data.lebar);
                $('#stok').val(data.stok);
                $('#kubikasi').val(data.kubikasi);
                $('#keterangan').val(data.keterangan);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Vinir Masuk
    $('.tambahVinirMasuk').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('#vinirMasuk')[0].reset();
        $('form#vinirMasuk').attr('action', 'http://localhost/trpbahanbaku/vinirmasuk/tambahMasuk')
    });

    $('.tombolUbahVinirMasuk').on('click', function(){
        $('#ModalLabel').html('Ubah Data Bahan')
        $('form#vinirMasuk').attr('action', 'http://localhost/trpbahanbaku/vinirmasuk/ubahMasuk')
        $('#id_kayu').prop("disabled", true);

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/trpbahanbaku/vinirmasuk/geteditMasuk',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                $('#id').val(data.id);
                $('#id_kayu').val(data.id_kayu);
                $('#tgl').val(data.tgl);
                $('#id_vinir').val(data.id_vinir);
                $('#stok').val(data.stok_masuk);
                $('#kubikasi').val(data.kubik_masuk);
                $('#kayu_log').val(data.kayu_log);
                $('#keterangan').val(data.keterangan);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });
    $('.editNilaiTetap').on('click', function(){
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/trpbahanbaku/vinirmasuk/geteditBaku',
            data: {id : id},
            type: "post",
            dataType: "JSON",
            cache: false,
            success: function(data) {
                $('#id_baku').val(data.id);
                $('#dia_bobin').val(data.dbobin);
                $('#vol_bobin').val(data.vbobin);
                $('#density').val(data.kerapatan);
                $('#n_phi').val(data.phi);
                $('#rendemen').val(data.rendem);
            },
            error : function() {
                alert("Tidak ada Data!");
            }
        });
    });

    //----------------- Gluemix
    $('.tambahGluemix').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('form#Gluemix').attr('action', 'http://localhost/trpbahanbaku/gluemix/tambahGlue')
    });
     //---- sambungan form.php untuk kalkulasi total Gluemix
    $("body").on('keyup', '.calc_stok_keluar', function(e) {
        e.preventDefault();
        kalkulasi();
      });

      //----------------- Plywood
    $('.tambahPlywood').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('form#Plywood').attr('action', 'http://localhost/trpbahanbaku/plywood/tambah')
    });

    $(document).ready(function () {
        $(document).on("change", "#ukurvinir", function () {
            var getTebal = $(this).children(':selected').data('tebal');
            var getPanjang = $(this).children(':selected').data('panjang');
            var getLebar = $(this).children(':selected').data('lebar');
            $(this).closest('td').find('#tblply').val(getTebal);
            var stok = parseInt($("#vinir_keluar").val());
            var vol = 0;
            if (!isNaN(vol) && vol.length != 0){
                vol = parseFloat((getTebal*getPanjang*getLebar)/1000000000);
                var kubic = stok * vol;
            }
            $(this).closest('td').siblings().find('input[name^=jml_kubikvinir]').val(kubic.toFixed(2));
            tebal();
            hitungttl();
        });
    });

    //---- sambungan form.php untuk kalkulasi total Plywood
    $("body").on('keyup', '.vinir_stok_keluar', function(e) {
        e.preventDefault();
        calc_stok();
      });

    $("body").on('keyup', '.kubik_keluar', function(e) {
        e.preventDefault();
        calc_kubik();
      });

      //----------------- Kayu Masuk
    $('.tambahKayuMasuk').on('click', function() {
        $('#ModalLabel').html('Tambah Data Baru')
        $('form#kayumasuk').attr('action', 'http://localhost/trpbahanbaku/kayumasuk/tambahMasuk')
        // $('#formModal')[0].reset();
    });
      //---- sambungan form.php untuk kalkulasi total Kayu Masuk
    $("body").on('keyup', '.jml_stok_kayu', function(e) {
        e.preventDefault();
        stok_kayu();
      });

    $("body").on('keyup', '.jml_kubik_kayu', function(e) {
        e.preventDefault();
        kubik_kayu();
      });

    // Menghitung Kubikasi dalam Kayu Masuk
    $(document).ready(function () {
        $(document).on("change", "input[name^=panjang],input[name^=diameter1],input[name^=diameter2]", function () {
            $("input[name^=jmlstokkayu]").trigger("change");
        });
        $(document).on("change", "input[name^=jmlstokkayu]", function () {
            var stok = $(this).val() == "" ? 0 : $(this).val();
            var p = $(this).closest("td").siblings().find("input[name^=panjang]").val();
            var d1 = $(this).closest("td").siblings().find("input[name^=diameter1]").val();
            var d2 = $(this).closest("td").siblings().find("input[name^=diameter2]").val();
            var kubik = parseFloat((p*d1*d2*0.7854)/1000000) * stok;
            if (!isNaN(kubik) && kubik.length != 0){
                $(this).closest("td").siblings().find("input[name^=jmlkubikkayu]").val(kubik.toFixed(2));
                kubik_kayu();
                stok_kayu();
            }
        });
    });
});