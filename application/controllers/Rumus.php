<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumus extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		check_not_login();
	}

	public function index()
	{
		$data['title'] = "Kumpulan Rumus";
		$data['isi'] = "rumus/index";
		$this->load->view('template', $data);
	}
}
