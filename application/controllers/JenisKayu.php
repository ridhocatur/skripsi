<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JenisKayu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Jeniskayu_model', 'Pegawai_model'));
		check_not_login();
	}

	public function index()
	{
		$data['title'] = "List Jenis Kayu";
		$data['isi'] = "jeniskayu/index";
		$data['jeniskayu'] = $this->Jeniskayu_model->getAll();
		$this->load->view('template',$data);
	}

	public function tambah()
	{
		$jeniskayu = $this->Jeniskayu_model;
		$valid = $this->form_validation;
		$valid->set_rules($jeniskayu->rules());

		if ($valid->run() == TRUE) {
			$jeniskayu->save();
			$this->session->set_flashdata('success', 'Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Simpan');
		}
		redirect(site_url('jeniskayu'));
	}

	public function getedit()
    {
		$jeniskayu = $this->Jeniskayu_model;
		echo json_encode($jeniskayu->getById($_POST['id']));
    }

	public function ubah()
	{
		$id = $this->input->post('id');
		if(!isset($id)) redirect('jeniskayu');

		$jeniskayu = $this->Jeniskayu_model;
		$valid = $this->form_validation;
		$valid->set_rules($jeniskayu->rules());

		if ($valid->run() == TRUE) {
			$jeniskayu->update($id);
			$this->session->set_flashdata('info', 'Berhasil Di Ubah');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Ubah');
		}

		$data["jeniskayu"] = $jeniskayu->getById($id);
		if(!$data["jeniskayu"]) show_404();

		redirect(site_url('jeniskayu'));
	}

	public function hapus($id = null)
	{
		if(!isset($id)) show_404();

		if ($this->Jeniskayu_model->delete($id)){
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
			redirect(site_url('jeniskayu'));
		}
	}
}
