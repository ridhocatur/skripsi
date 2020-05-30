<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Supplier_model');
		check_not_login();
	}

	public function index()
	{
		$data['title'] = "Data Supplier";
		$data['isi'] = "supplier/index";
		$data['supplier'] = $this->Supplier_model->getAll();
		$this->load->view('template',$data);
	}

	public function tambah()
	{
		$supplier = $this->Supplier_model;
		$valid = $this->form_validation;
		$valid->set_rules($supplier->rules());

		if ($valid->run() == TRUE) {
			$supplier->save();
			$this->session->set_flashdata('success', 'Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Simpan');
		}
		redirect(site_url('supplier'));
	}

	public function getedit()
    {
		$supplier = $this->Supplier_model;
		echo json_encode($supplier->getById($_POST['id']));
    }

	public function ubah()
	{
		$id = $this->input->post('id');
		if(!isset($id)) redirect('supplier');

		$supplier = $this->Supplier_model;
		$valid = $this->form_validation;
		$valid->set_rules($supplier->rules());

		if ($valid->run() == TRUE) {
			$supplier->update($id);
			$this->session->set_flashdata('info', 'Berhasil Di Ubah');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Ubah');
		}

		$data["supplier"] = $supplier->getById($id);
		if(!$data["supplier"]) show_404();

		redirect(site_url('supplier'));
	}

	public function hapus($id = null)
	{
		if(!isset($id)) show_404();

		if ($this->Supplier_model->delete($id)){
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
			redirect(site_url('supplier'));
		}
	}
}
