<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		check_not_login();
		$data['title'] = "About";
		$data['isi'] = "about";
		$this->load->view('template',$data);
	}
}
