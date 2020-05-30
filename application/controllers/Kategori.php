<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_model');
		check_not_login();
	}

	public function index()
	{
		$data['title'] = "List Kategori";
		$data['isi'] = "kategori/index";
		$data['kategori'] = $this->Kategori_model->getAll();
		$this->load->view('template',$data);
	}

	public function tambah()
	{
		$kategori = $this->Kategori_model;
		$valid = $this->form_validation;
		$valid->set_rules($kategori->rules());

		if ($valid->run() == TRUE) {
			$kategori->save();
			$this->session->set_flashdata('success', 'Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Simpan');
		}
		redirect(site_url('kategori'));
	}

	public function getedit()
    {
		$id = $this->input->post('id');
		$kategori = $this->Kategori_model;
		echo json_encode($kategori->getById($id));
    }

	public function ubah()
	{
		$id = $this->input->post('id');
		if(!isset($id)) redirect('kategori');

		$kategori = $this->Kategori_model;
		$valid = $this->form_validation;
		$valid->set_rules($kategori->rules());

		if ($valid->run() == TRUE) {
			$kategori->update($id);
			$this->session->set_flashdata('info', 'Berhasil Di Ubah');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Ubah');
		}

		$data["kategori"] = $kategori->getById($id);
		if(!$data["kategori"]) show_404();

		redirect(site_url('kategori'));
	}

	public function hapus($id = null)
	{
		if(!isset($id)) show_404();

		if ($this->Kategori_model->delete($id)){
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
			redirect(site_url('kategori'));
		}
	}

}
