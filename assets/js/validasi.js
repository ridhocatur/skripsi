$(function () {
    $('.tombolReset').on('click', function() {
        $("#formModal").validate().resetForm();
    });
    $("#formModaPass").validate({
        rules: {
            ubahPassword: {
                required: true,
                minlength: 5
            },
            cubahPassword: {
                required: true,
                equalTo: "#ubahPassword",
                minlength: 5
            },
        },
        messages: {
            ubahPassword: {
                required: "Kolom masih kosong. Harap Diisi",
                minlength: "Mohon masukkan lebih dari {0}"
            },
            cubahPassword: {
                required: "Kolom masih kosong. Harap Diisi",
                minlength: "Mohon masukkan lebih dari {0}",
                equalTo: "Password tidak sama!"
            },
        },
    });
    $("#formProfil").validate({
        rules: {
            profpass: {
                minlength: 5
            },
            cprofpass: {
                equalTo: "#profpass",
                minlength: 5
            },
        },
        messages: {
            profpass: {
                minlength: "Mohon masukkan lebih dari {0}"
            },
            cprofpass: {
                minlength: "Mohon masukkan lebih dari {0}",
                equalTo: "Password tidak sama!"
            },
        },
    });

    // Bahan Bantu Master
    $("#bahanMaster").validate({
        rules: {
            kd_bahan: {
                required: true,
            },
            nama: {
                required: true,
                minlength: 3
            },
            stok: {
                required: true,
                number: true
            },
            id_kategori: {
                required: true,
            },
        },
        messages: {
            nama: {
                required: "Kolom masih kosong. Harap Diisi",
                minlength: "Mohon masukkan lebih dari {0}"
            },
            stok: {
                required: "Kolom masih kosong. Harap Diisi",
                number: "Harap Masukkan Hanya Angka"
            },
            kd_bahan: {
                required: "Kolom masih kosong. Harap Diisi"
            },
            id_kategori: {
                required: "Kolom masih kosong. Harap Diisi"
            },
        },
    });
    $("#penggunaanBahanBantu").validate({
        rules: {
            tglsatu: {
                required: true
            },
            tgldua: {
                required: true
            },
            nm_bahan: {
                required: true
            },
        },
        messages: {
            tglsatu: {
                required: "Harap Diisi"
            },
            tgldua: {
                required: "Harap Diisi"
            },
            nm_bahan: {
                required: "Harap Diisi"
            },
        },
    });

    // Bahan Bantu Masuk
    $("#bahanMasuk").validate({
        rules: {
            tgl: {
                required: true,
            },
            id_bahan: {
                required: true,
            },
            stok_masuk: {
                required: true,
                number: true
            },
            id_supplier: {
                required: true,
            },
        },
        messages: {
            tgl: {
                required: "Tanggal masih kosong. Harap Diisi"
            },
            id_bahan: {
                required: "Harap dipilih terlebih dahulu"
            },
            stok_masuk: {
                required: "Kolom masih kosong. Harap Diisi",
                number: "Hanya diisi dengan angka"
            },
            id_supplier: {
                required: "Harap dipilih terlebih dahulu"
            },
        },
    });

    // Gluemix
    $("#Gluemix").validate({
        rules: {
            tgl: {
                required: true,
            },
            tipe_glue: {
                required: true,
            },
            shift: {
                required: true,
            },
        },
        messages: {
            tgl: {
                required: "Tanggal masih kosong. Harap Diisi"
            },
            tipe_glue: {
                required: "Kolom masih kosong. Harap Diisi"
            },
            shift: {
                required: "Harap dipilih"
            },
        },
    });

    // Kayu Log Master
    $("#kayumaster").validate({
        rules: {
            kd_kayu: {
                required: true,
            },
            kd_jenis: {
                required: true,
            },
            stok: {
                required: true,
                number: true
            },
            kubikasi: {
                required: true,
                number: true
            },
        },
        messages: {
            kd_kayu: {
                required: "Kolom masih kosong. Harap Diisi"
            },
            kd_jenis: {
                required: "Harap dipilih terlebih dahulu"
            },
            stok: {
                required: "Kolom masih kosong. Harap Diisi",
                number: "Hanya angka saja"
            },
            kubikasi: {
                required: "Kolom masih kosong. Harap Diisi",
                number: "Hanya angka saja"
            },
        },
    });
    $("#penggunaanKayu").validate({
        rules: {
            tglsatu: {
                required: true
            },
            tgldua: {
                required: true
            },
        },
        messages: {
            tglsatu: {
                required: "Harap Diisi"
            },
            tgldua: {
                required: "Harap Diisi"
            },
        },
    });

    // Kayu Log Masuk
    $("#kayumasuk").validate({
        rules: {
            tgl: {
                required: true,
            },
            id_supplier: {
                required: true,
            },
            panjang: {
                required: true,
                number: true
            },
            diameter1: {
                required: true,
                number: true
            },
            diameter2: {
                required: true,
                number: true
            },
            jmlstokkayu: {
                required: true,
                number: true
            },
        },
        messages: {
            tgl: {
                required: "Tanggal masih kosong. Harap Diisi"
            },
            id_supplier: {
                required: "Harap dipilih terlebih dahulu"
            },
            panjang: {
                required: "Harap diisi",
                number: "Hanya angka"
            },
            diameter1: {
                required: "Harap diisi",
                number: "Hanya angka"
            },
            diameter2: {
                required: "Harap diisi",
                number: "Hanya angka"
            },
            jmlstokkayu: {
                required: "Harap diisi",
                number: "Hanya angka"
            },
        },
    });

    // Vinir Master
    $("#vinirmaster").validate({
        rules: {
            id_jenis: {
                required: true,
            },
            tebal: {
                required: true,
                number: true
            },
            ukurpot: {
                required: true,
            },
            stok: {
                required: true,
                number: true
            },
            kubikasi: {
                required: true,
                number: true
            },
        },
        messages: {
            id_jenis: {
                required: "Harap dipilih terlebih dahulu"
            },
            tebal: {
                required: "Harap diisi terlebih dahulu",
                number: "Hanya angka"
            },
            ukurpot: {
                required: "Harap dipilih",
            },
            stok: {
                required: "Harap diisi terlebih dahulu",
                number: "Hanya angka"
            },
            kubikasi: {
                required: "Harap diisi terlebih dahulu",
                number: "Hanya angka"
            },
        },
    });

    // Vinir Masuk
    $("#vinirMasuk").validate({
        rules: {
            jeniskayu: {
                required: true,
            },
            jmlkubik: {
                required: true,
                number: true
            },
            tgl: {
                required: true,
            },
            ukurpot: {
                required: true,
            },
            jari: {
                required: true,
                number: true
            },
        },
        messages: {
            jeniskayu: {
                required: "Harap dipilih"
            },
            jmlkubik: {
                required: "Harap diisi",
                number: "Hanya angka"
            },
            tgl: {
                required: "Tanggal masih kosong"
            },
            ukurpot: {
                required: "Harap dipilih"
            },
            jari: {
                required: "Harap diisi",
                number: "Hanya angka"
            },
        },
    });

    // Plywood
    $("#Plywood").validate({
        rules: {
            tipe_glue: {
                required: true,
            },
            id_ukuran: {
                required: true,
            },
            tgl: {
                required: true,
            },
            lapisanply: {
                required: true,
            },
            shift: {
                required: true,
            },
            vinir_keluar: {
                required: true,
                number: true
            },
        },
        messages: {
            tipe_glue: {
                required: "Harap dipilih"
            },
            id_ukuran: {
                required: "Harap dipilih"
            },
            tgl: {
                required: "Tanggal masih kosong"
            },
            lapisanply: {
                required: "Harap dipilih"
            },
            shift: {
                required: "Harap dipilih"
            },
            jari: {
                required: "Harap diisi",
                number: "Hanya angka"
            },
            vinir_keluar: {
                required: "Harap diisi",
                number: "Hanya angka"
            },
        },
    });

    $("#formModal").validate({
        rules: {
            // Field yang sama di semua form
            nama: {
                required: true,
                minlength: 3
            },
            stok: {
                required: true,
                number: true
            },
            kd_jenis: {
                required: true,
            },
            telp: {
                required: true,
                number: true,
                minlength: 3
            },

            // Kategori
            nm_kateg: {
                required: true,
            },

            // Ukuran
            panjang: {
                required: true,
                number: true
            },
            lebar: {
                required: true,
                number: true
            },

            // Supplier
            nm_sup: {
                required: true,
                minlength: 3
            },
            sup: {
                required: true,
                minlength: 3
            },
            alamat: {
                required: true,
                minlength: 3
            },

            // Pegawai
            nik: {
                required: true
            },
            username: {
                required: true
            },
            password: {
                required: true,
                minlength: 5
            },
            cpassword: {
                required: true,
                equalTo: "#password",
                minlength: 5
            },

            // Master Vinir
            tebal: {
                required: true,
                number: true
            },
        },
        //For custom messages
        messages: {
            // Field yang sama di semua form
            nama: {
                required: "Kolom masih kosong. Harap Diisi",
                minlength: "Mohon masukkan lebih dari {0}"
            },
            stok: {
                required: "Kolom masih kosong. Harap Diisi",
                number: "Harap Masukkan Hanya Angka"
            },
            kd_jenis: {
                required: "Kolom masih kosong. Harap Diisi"
            },
            telp: {
                required: "Kolom masih kosong. Harap Diisi",
                minlength: "Mohon masukkan lebih dari {0}",
                number: "Harap Masukkan Hanya Angka"
            },
            kubikasi: {
                required: "Kolom masih kosong. Harap Diisi",
                number: "Harap Masukkan Hanya Angka"
            },

            // Kategori
            nm_kateg: {
                required: "Kolom masih kosong. Harap Diisi"
            },

            // Ukuran
            panjang: {
                required: "Kolom masih kosong. Harap Diisi",
                number: "Harap Masukkan Hanya Angka"
            },
            lebar: {
                required: "Kolom masih kosong. Harap Diisi",
                number: "Harap Masukkan Hanya Angka"
            },

            // Supplier
            nm_sup: {
                required: "Kolom masih kosong. Harap Diisi",
                minlength: "Mohon masukkan lebih dari {0}"
            },
            sup: {
                required: "Kolom masih kosong. Harap Diisi",
                minlength: "Mohon masukkan lebih dari {0}"
            },
            alamat: {
                required: "Kolom masih kosong. Harap Diisi",
                minlength: "Mohon masukkan lebih dari {0}"
            },
            email : {
                email: "Harap masukkan email dengan benar"
            },

            // Pegawai
            nik: {
                required: "Kolom masih kosong. Harap Diisi"
            },
            username: {
                required: "Kolom masih kosong. Harap Diisi"
            },
            password: {
                required: "Kolom masih kosong. Harap Diisi",
                minlength: "Mohon masukkan lebih dari {0}"
            },
            cpassword: {
                required: "Kolom masih kosong. Harap Diisi",
                minlength: "Mohon masukkan lebih dari {0}",
                equalTo: "Password tidak sama!"
            },
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
    });
});
// TIPS -----------------------------
// messages: {
// 	required: "This field is required.",
// 	remote: "Please fix this field.",
// 	email: "Please enter a valid email address.",
// 	url: "Please enter a valid URL.",
// 	date: "Please enter a valid date.",
// 	dateISO: "Please enter a valid date ( ISO ).",
// 	number: "Please enter a valid number.",
// 	digits: "Please enter only digits.",
// 	creditcard: "Please enter a valid credit card number.",
// 	equalTo: "Please enter the same value again.",
// 	maxlength: $.validator.format( "Please enter no more than {0} characters." ),
// 	minlength: $.validator.format( "Please enter at least {0} characters." ),
// 	rangelength: $.validator.format( "Please enter a value between {0} and {1} characters long." ),
// 	range: $.validator.format( "Please enter a value between {0} and {1}." ),
// 	max: $.validator.format( "Please enter a value less than or equal to {0}." ),
// 	min: $.validator.format( "Please enter a value greater than or equal to {0}." )
// }

