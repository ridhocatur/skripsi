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

            // Bahan Bantu
            kd_bahan: {
                required: true,
            },

            // Bahan Masuk
            id_bahan: {
                required: true
            },
            stok_masuk: {
                required: true,
                number: true
            },

            // Master Kayu Log
            kd_kayu: {
                required: true,
            },
            kubikasi: {
                required: true,
                number: true
            },

            // Kayu Log Masuk
            invoice: {
                required: true
            },
            tgl: {
                required: true
            },
            jmlstokkayu: {
                number: true,
                required: true
            },
            panjang: {
                number: true,
                required: true
            },
            diameter1: {
                number: true,
                required: true
            },
            diameter2: {
                number: true,
                required: true
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

            // Bahan Bantu
            kd_bahan: {
                required: "Kolom masih kosong. Harap Diisi"
            },

            // Bahan Masuk
            id_bahan: {
                required: "Kolom masih kosong. Harap Diisi"
            },
            stok_masuk: {
                required: "Kolom masih kosong. Harap Diisi",
                number: "Harap Masukkan Hanya Angka"
            },

            // Kayu Log
            kd_kayu: {
                required: "Kolom masih kosong. Harap Diisi"
            },

            // Kayu Log Masuk
            invoice: {
                required: "Kolom masih kosong. Harap Diisi"
            },
            tgl: {
                required: "Harap masukkan tanggal dengan benar"
            },
            jmlstokkayu: {
                number: "Hanya Angka",
                required: "Harap Diisi"
            },
            panjang: {
                number: "Hanya Angka",
                required: "Harap Diisi"
            },
            diameter1: {
                number: "Hanya Angka",
                required: "Harap Diisi"
            },
            diameter2: {
                number: "Hanya Angka",
                required: "Harap Diisi"
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

            // Master Vinir
            tebal: {
                required: "Kolom masih kosong. Harap Diisi",
                number: "Harap Masukkan Hanya Angka"
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

