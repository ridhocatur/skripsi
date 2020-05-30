<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KayuLog extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Kayulog_model','Jeniskayu_model','Kayumasuk_model','Supplier_model'));
		check_not_login();
	}

	// ---------------------------------------------
	// Kayu Log
	// ---------------------------------------------

	public function index()
	{
		$data['title'] = "Data Master Kayu Log";
		$data['isi'] = "kayulog/index";
		$data['kayulog'] = $this->Kayulog_model->getJoinAll();
		$data['jeniskayu'] = $this->Jeniskayu_model->getAll();
		$this->load->view('template',$data);
	}

	public function tambahKayu()
	{
		$valid = $this->form_validation;
		$valid->set_rules($this->Kayulog_model->rules());
		if ($valid->run() == TRUE) {
			$this->Kayulog_model->save();
			$this->session->set_flashdata('success', 'Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Simpan');
		}
		redirect(site_url('kayulog'));
	}

	public function geteditKayu()
    {
		echo json_encode($this->Kayulog_model->getById($_POST['id']));
    }

	public function ubahKayu()
	{
		$id = $this->input->post('id');
		if(!isset($id)) redirect('kayulog');

		$valid = $this->form_validation;
		$valid->set_rules($this->Kayulog_model->rules());

		if ($valid->run() == TRUE) {
			$this->Kayulog_model->update($id);
			$this->session->set_flashdata('info', 'Berhasil Di Ubah');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Ubah');
		}

		$data["kayulog"] = $this->Kayulog_model->getById($id);
		if(!$data["kayulog"]) show_404();

		redirect(site_url('kayulog'));
	}

	public function hapusKayu($id = null)
	{
		if(!isset($id)) show_404();

		if ($this->Kayulog_model->delete($id)){
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
			redirect(site_url('kayulog'));
		}
	}

	// ---------------------------------------------
	// Kayu Masuk
	// ---------------------------------------------

	public function kayumasuk()
	{
		$data['title'] = "Data Pemasukan Kayu Log";
		$data['isi'] = "kayulog/masuk";
		$data['kayumasuk'] = $this->Kayumasuk_model->getJoinAll();
		$data['supkayu'] = $this->Supplier_model->SupKayu();
		$data['kayulog'] = $this->Kayulog_model->getAll();
		$this->load->view('template',$data);
	}

	public function tambahMasuk()
	{
		$valid = $this->form_validation;
		$valid->set_rules($this->Kayumasuk_model->rules());

		if ($valid->run() == TRUE) {
			$this->Kayumasuk_model->save();
			$this->session->set_flashdata('success', 'Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Simpan');
		}
		redirect(site_url('kayumasuk'));
	}

	public function detailMasuk($id)
    {
		$data['title'] = "Data Detail";
		$data['isi'] = "kayulog/detail";
        $data['detail'] = $this->Kayumasuk_model->getDetail($id);
		$data['byId'] = $this->Kayumasuk_model->getById($id);
		$this->load->view('template',$data);

    }

	public function hapusMasuk($id = null)
	{
		if(!isset($id)) show_404();

		if ($this->Kayumasuk_model->delete($id)){
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
		}
		redirect(site_url('kayumasuk'));
	}

}
