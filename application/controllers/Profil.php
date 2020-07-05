<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model');
		check_not_login();
	}

	public function index()
	{
		$data['title'] = "Profil";
		$data['isi'] = "profil/index";
		$this->load->view('template',$data);
	}

	public function ubahFoto()
	{
		$id = $this->input->post('id');
		if(!isset($id)) redirect('profil');

		$pegawai = $this->Pegawai_model;
		$pegawai->updateFoto($id);
		$this->session->set_flashdata('info', 'Foto Berhasil Di Ubah');

		redirect(site_url('profil'));
	}

	public function ubahProfil()
	{
		$id = $this->input->post('id');
		if(!isset($id)) redirect('profil');

		$pegawai = $this->Pegawai_model;
		$pegawai->updateProfil($id);
		$this->session->set_flashdata('info', 'Data Profil Berhasil Di Ubah');

		redirect(site_url('profil'));
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
