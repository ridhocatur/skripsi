<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model');
		check_not_login();
		check_admin();
	}

	public function index()
	{
		$data['title'] = "Data Pegawai / User";
		$data['isi'] = "pegawai/index";
		$data['pegawai'] = $this->Pegawai_model->getAll();
		$this->load->view('template',$data);
	}

	public function tambah()
	{
		$pegawai = $this->Pegawai_model;
		$valid = $this->form_validation;
		$valid->set_rules($pegawai->rules());

		if ($valid->run() == TRUE) {
			$pegawai->save();
			$this->session->set_flashdata('success', 'Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Simpan');
		}
		redirect(site_url('pegawai'));
	}

	public function getedit()
    {
		$pegawai = $this->Pegawai_model;
		echo json_encode($pegawai->getById($_POST['id']));
    }

	public function ubah()
	{
		$id = $this->input->post('id');
		if(!isset($id)) redirect('pegawai');

		$pegawai = $this->Pegawai_model;
		$valid = $this->form_validation;
		$valid->set_rules($pegawai->rules());

		if ($valid->run() == TRUE) {
			$pegawai->update($id);
			$this->session->set_flashdata('info', 'Berhasil Di Ubah');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Ubah');
		}

		$data["pegawai"] = $pegawai->getById($id);
		if(!$data["pegawai"]) show_404();

		redirect(site_url('pegawai'));
	}

	public function hapus($id = null)
	{
		if(!isset($id)) show_404();

		if ($this->Pegawai_model->delete($id)){
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
			redirect(site_url('pegawai'));
		}
	}
}
