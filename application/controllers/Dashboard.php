<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    function __construct()
    {
        parent::__construct();
		$this->load->model('Pegawai_model');
	}

	public function admin()
	{
		$this->load->view('admin/dashboard');
	}

	public function manager()
	{
		echo "Halaman Manager";
	}

	public function user()
	{
		echo "Halaman User";
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}