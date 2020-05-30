<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model');
    }

	public function login()
	{
        check_already_login();
		$this->load->view('login');
    }

    public function proses()
    {
        $post = $this->input->post();
        if (isset($post['login'])) {
            $query = $this->Pegawai_model->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'userid' => $row->id,
                    'nama' =>$row->nama,
                    'level' => $row->level
                );
                $this->session->set_userdata($params);
                $this->Pegawai_model->_updateLastLogin($row->id);
                $this->session->set_flashdata('success', 'Login Berhasil, Selamat Datang <b>'.$row->nama.'</b>');
                redirect(site_url('welcome'));
            } else {
                $this->session->set_flashdata('danger', 'Login Gagal, Username / Password Salah');
                redirect(site_url('auth/login'));
            }
        }
    }

    public function logout()
    {
        $params = array('userid', 'level', 'nama');
        $this->session->unset_userdata($params);
        $this->session->set_flashdata('success', 'Logout Berhasil, Silahkan Login Kembali');
        redirect('auth/login');
    }
}