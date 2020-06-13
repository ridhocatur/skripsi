<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plywood extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(array('Vinir_model','Ukuran_model','Plywood_model'));
	}

	public function index()
	{
		$data['title'] = "Data Produksi Plywood";
		$data['isi'] = "plywood/index";
		$data['vinir'] = $this->Vinir_model->getJoinAll();
		$data['ukuran'] = $this->Ukuran_model->getAll();
		$data['plywood'] = $this->Plywood_model->getAll();
		$this->load->view('template',$data);
	}

	public function tambah()
	{
		$valid = $this->form_validation;
		$valid->set_rules($this->Vinir_model->rules());

		if ($valid->run() == TRUE) {
			$this->Vinir_model->save();
			$this->session->set_flashdata('success', 'Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Simpan');
		}
		redirect(site_url('vinirmasuk'));
	}

	public function getedit()
    {
		echo json_encode($this->Vinir_model->getById($_POST['id']));
    }

	public function ubah()
	{
		$id = $this->input->post('id');
		if(!isset($id)) redirect('vinir');

		$valid = $this->form_validation;
		$valid->set_rules($this->Vinir_model->rules());

		if ($valid->run() == TRUE) {
			$this->Vinir_model->update($id);
			$this->session->set_flashdata('info', 'Berhasil Di Ubah');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Ubah');
		}

		$data["vinir"] = $this->Vinir_model->getById($id);
		if(!$data["vinir"]) show_404();

		redirect(site_url('vinirmasuk'));
	}

	public function hapus($id = null)
	{
		if(!isset($id)) show_404();

		if ($this->Vinir_model->delete($id)){
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
		}
		redirect(site_url('vinirmasuk'));
	}
}
