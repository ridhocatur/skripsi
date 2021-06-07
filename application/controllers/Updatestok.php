<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updatestok extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Updatestok_m','Bahanbantu_model'));
		check_not_login();
	}

	public function index()
	{
		$data['title'] = "Data Update Stok";
		$data['isi'] = "updatestok/index";
		$data['updatestok'] = $this->Updatestok_m->getAll();
		$data['bahanbantu'] = $this->Bahanbantu_model->getAll();
		$this->load->view('template',$data);
	}

	public function tambah()
	{
		$kategori = $this->Updatestok_m;
		$valid = $this->form_validation;
		$valid->set_rules($kategori->rules());

		if ($valid->run() == TRUE) {
			$kategori->save();
			$this->session->set_flashdata('success', 'Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Simpan');
		}
		redirect(site_url('updatestok'));
	}

	public function getedit()
    {
		$id = $this->input->post('id');
		$kategori = $this->Updatestok_m;
		echo json_encode($kategori->getById($id));
    }

	public function ubah()
	{
		$id = $this->input->post('id');
		if(!isset($id)) redirect('updatestok');

		$kategori = $this->Updatestok_m;
		$valid = $this->form_validation;
		$valid->set_rules($kategori->rules());

		if ($valid->run() == TRUE) {
			$kategori->update($id);
			$this->session->set_flashdata('info', 'Berhasil Di Ubah');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Ubah');
		}

		$data["updatestok"] = $kategori->getById($id);
		if(!$data["updatestok"]) show_404();

		redirect(site_url('updatestok'));
	}

	public function hapus($id = null)
	{
		if(!isset($id)) show_404();

		if ($this->Updatestok_m->delete($id)){
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
			redirect(site_url('updatestok'));
		}
	}

}
