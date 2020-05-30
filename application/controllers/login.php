<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        // $this->load->library('form_validation');
        //load model admin
        $this->load->model('Pegawai_model');
    }

    public function index()
    {
		if($this->Pegawai_model->is_logged_in())
		{
			if($this->session->userdata("level") == "admin"){
			redirect('admin/dashboard');}
			if($this->session->userdata("level") == "manager"){
			redirect('manager/dashboard');}
			if($this->session->userdata("level") == "user"){
			redirect('user/dashboard');}
		}else{

			//jika session belum terdaftar

			//set form validation
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			//cek validasi
			if ($this->form_validation->run() == TRUE) {

				//get data dari FORM
				$username = $this->input->post("username", TRUE);
				$password = MD5($this->input->post("password", TRUE));

				//checking data via model
				$checking = $this->Pegawai_model->check_login('pegawai', array('username' => $username), array('password' => $password));

				//jika ditemukan, maka create session
				if ($checking != FALSE) {
					foreach ($checking as $apps) {
						$session_data = array(
							'user_id'   => $apps->id,
							'user_name' => $apps->username,
							'user_pass' => $apps->password,
							'user_nama' => $apps->nama,
							'user_pict' => $apps->gambar,
							'level'     => $apps->level
						);
						//set session userdata
						$this->session->set_userdata($session_data);
						$this->Pegawai_model->_updateLastLogin($apps->id);
						//redirect berdasarkan level user
						if($this->session->userdata("level") == "admin"){
							redirect('admin/dashboard');
						}elseif ($this->session->userdata("level") == "manager"){
							redirect('manager/dashboard');
						} else {
							redirect('user/dashboard');
						}
					}
				}else{

					$this->session->set_flashdata('danger','Username Atau Password Salah');
					$this->load->view('login');
				}

			}else{

				$this->load->view('login');
			}
		}
	}
}
