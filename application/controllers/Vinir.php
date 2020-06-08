<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vinir extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(array('Kayulog_model','Jeniskayu_model','Vinir_model','Vinirmasuk_model','Ukuran_model'));
	}

	// ---------------------------------------------
	// Master Vinir
	// ---------------------------------------------

	public function index()
	{
		$data['title'] = "Data Vinir";
		$data['isi'] = "vinir/index";
		$data['vinir'] = $this->Vinir_model->getJoinAll();
		$data['jenis'] = $this->Jeniskayu_model->getAll();
		$data['ukuran'] = $this->Ukuran_model->getAll();
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
		redirect(site_url('vinir'));
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
		$valid->set_rules($this->Vinir_model->rulesEdit());

		if ($valid->run() == TRUE) {
			$this->Vinir_model->update($id);
			$this->session->set_flashdata('info', 'Berhasil Di Ubah');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Ubah');
		}

		$data["vinir"] = $this->Vinir_model->getById($id);
		if(!$data["vinir"]) show_404();

		redirect(site_url('vinir'));
	}

	public function hapus($id = null)
	{
		if(!isset($id)) show_404();

		if ($this->Vinir_model->delete($id)){
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
		}
		redirect(site_url('vinir'));
	}


	// ---------------------------------------------
	// Vinir Masuk
	// ---------------------------------------------

	public function vinirmasuk()
	{
		$data['title'] = "Data Hasil Kupasan Kayu Log (Vinir)";
		$data['isi'] = "vinir/masuknew";
		$data['vinirmasuk'] = $this->Vinirmasuk_model->getJoinAll();
        $data['vinir'] = $this->Vinir_model->getJoinAll();
        $data['jeniskayu'] = $this->Jeniskayu_model->getAll();
		$this->load->view('template', $data);
	}

	public function tambahMasuk()
	{
		$valid = $this->form_validation;
		$valid->set_rules($this->Vinirmasuk_model->rules());

		if ($valid->run() == TRUE) {
			$this->Vinirmasuk_model->save();
			$this->session->set_flashdata('success', 'Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Simpan');
		}
		redirect(site_url('vinirmasuk'));
	}

	public function geteditMasuk()
    {
		echo json_encode($this->Vinirmasuk_model->getById($_POST['id']));
    }

	public function ubahMasuk()
	{
		$id = $this->input->post('id');
		if(!isset($id)) redirect('vinirmasuk');

		$valid = $this->form_validation;
		$valid->set_rules($this->Vinirmasuk_model->rules());

		if ($valid->run() == TRUE) {
			$this->Vinirmasuk_model->update($id);
			$this->session->set_flashdata('info', 'Berhasil Di Ubah');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Ubah');
		}

		$data["vinirmasuk"] = $this->Vinirmasuk_model->getById($id);
		if(!$data["vinirmasuk"]) show_404();

		redirect(site_url('vinirmasuk'));
	}

	public function hapusMasuk($id = null)
	{
		if(!isset($id)) show_404();

		if ($this->Vinirmasuk_model->delete($id)){
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
		}
		redirect(site_url('vinirmasuk'));
	}

	public function cariJenis()
	{
		$id = $_POST['id'];
		$kayulog = $this->Kayulog_model->getByJenis($id);
		$vinir = $this->Vinir_model->getByJenis($id);
		echo json_encode(array($kayulog, $vinir));
	}

	public function cariUkuran()
	{
		$id = $_POST['id_vinir'];
		$data = $this->Vinir_model->getByUkuran($id);
		echo json_encode($data);
	}

}
