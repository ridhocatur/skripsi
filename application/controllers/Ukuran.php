<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ukuran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Ukuran_model');
		check_not_login();
	}

	public function index()
	{
		$data['title'] = "List Ukuran Plywood";
		$data['isi'] = "ukuran/index";
		$data['ukuran'] = $this->Ukuran_model->getAll();
		$this->load->view('template',$data);
	}

	public function tambah()
	{
		$ukuran = $this->Ukuran_model;
		$valid = $this->form_validation;
		$valid->set_rules($ukuran->rules());

		if ($valid->run() == TRUE) {
			$ukuran->save();
			$this->session->set_flashdata('success', 'Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Simpan');
		}
		redirect(site_url('ukuran'));
	}

	public function getedit()
    {
		$ukuran = $this->Ukuran_model;
		echo json_encode($ukuran->getById($_POST['id']));
    }

	public function ubah()
	{
		$id = $this->input->post('id');
		if(!isset($id)) redirect('ukuran');

		$ukuran = $this->Ukuran_model;
		$valid = $this->form_validation;
		$valid->set_rules($ukuran->rules());

		if ($valid->run() == TRUE) {
			$ukuran->update($id);
			$this->session->set_flashdata('info', 'Berhasil Di Ubah');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Ubah');
		}

		$data["ukuran"] = $ukuran->getById($id);
		if(!$data["ukuran"]) show_404();

		redirect(site_url('ukuran'));
	}

	public function hapus($id = null)
	{
		if(!isset($id)) show_404();
		$this->Ukuran_model->delete($id);
	}
}
