<?php

    function check_already_login()
    {
        $ci =& get_instance();
        $sesi_user = $ci->session->userdata('userid');
        if($sesi_user) {
            redirect('welcome');
        }
    }

    function check_not_login()
    {
        $ci =& get_instance();
        $sesi_user = $ci->session->userdata('userid');
        if(!$sesi_user) {
            redirect('auth/login');
        }
    }

    function check_admin()
    {
        $ci =& get_instance();
        $ci->load->library('fungsi');
        if($ci->fungsi->user_login()->level != 'admin') {
            $ci->session->set_flashdata('danger', 'Maaf, Halaman Tidak Dapat Di Akses');
            redirect('welcome');
        }
    }

