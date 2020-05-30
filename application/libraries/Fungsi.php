<?php

class Fungsi {

    protected $ci;

    function __construct()
    {
        $this->ci =& get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('Pegawai_model');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->Pegawai_model->getById($user_id);
        return $user_data;
    }
}