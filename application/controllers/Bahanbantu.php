<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BahanBantu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$models = array(
			'Bahanbantu_model' => 'bahanbantu',
			'Bahanmasuk_model' => 'bahanmasuk',
			'Gluemix_model' => 'gluemix',
			'Kategori_model' => 'kategori',
			'Supplier_model' => 'supplier',
			'Pegawai_model' => 'pegawai'
		);

		foreach ($models as $file => $object_name) {
			$this->load->model($file, $object_name);
		}
		check_not_login();
	}

	// ---------------------------------------------
	// Bahan Bantu
	// ---------------------------------------------

	public function index()
	{
		$data['title'] = "Data Bahan Bantu";
		$data['isi'] = "bahanbantu/index";
		$data['bahanbantu'] = $this->bahanbantu->getJoinAll();
		$data['kategori'] = $this->kategori->getAll();
		$this->load->view('template',$data);
	}

	public function tambahBantu()
	{
		$valid = $this->form_validation;
		$valid->set_rules($this->bahanbantu->rules());
		// echo $this->db->last_query(); die();
		if ($valid->run() == TRUE) {
			$this->bahanbantu->save();
			$this->session->set_flashdata('success', 'Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Simpan');
		}
		redirect(site_url('bahanbantu'));
	}

	public function geteditBantu()
    {
		echo json_encode($this->bahanbantu->getById($_POST['id']));
    }

	public function ubahBantu()
	{
		$id = $this->input->post('id');
		if(!isset($id)) redirect('bahanbantu');

		$valid = $this->form_validation;
		$valid->set_rules($this->bahanbantu->rules());

		if ($valid->run() == TRUE) {
			$this->bahanbantu->update($id);
			$this->session->set_flashdata('info', 'Berhasil Di Ubah');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Ubah');
		}

		$data["bahanbantu"] = $this->bahanbantu->getById($id);
		if(!$data["bahanbantu"]) show_404();

		redirect(site_url('bahanbantu'));
	}

	public function hapusBantu($id = null)
	{
		if(!isset($id)) show_404();

		if ($this->bahanbantu->delete($id)){
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
			redirect(site_url('bahanbantu'));
		}
	}

	// ---------------------------------------------
	// Bahan Masuk
	// ---------------------------------------------

	public function bahanmasuk()
	{
		$data['title'] = "Data Pemasukan Bahan Bantu";
		$data['isi'] = "bahanbantu/masuk";
		$data['bahanmasuk'] = $this->bahanmasuk->getJoinAll();
		$data['supbahan'] = $this->supplier->SupBahan();
		$data['bahanbantu'] = $this->bahanbantu->getAll();
		$this->load->view('template',$data);
	}

	public function tambahMasuk()
	{
		$valid = $this->form_validation;
		$valid->set_rules($this->bahanmasuk->rules());

		if ($valid->run() == TRUE) {
			$this->bahanmasuk->save();
			$this->session->set_flashdata('success', 'Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Simpan');
		}
		redirect(site_url('bahanmasuk'));
	}

	public function geteditMasuk()
    {
		echo json_encode($this->bahanmasuk->getById($_POST['id']));
    }

	public function ubahMasuk()
	{
		$id = $this->input->post('id');
		if(!isset($id)) redirect('bahanmasuk');

		$valid = $this->form_validation;
		$valid->set_rules($this->bahanmasuk->rules());

		if ($valid->run() == TRUE) {
			$this->bahanmasuk->update($id);
			$this->session->set_flashdata('info', 'Berhasil Di Ubah');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Ubah');
		}

		$data["bahanmasuk"] = $this->bahanmasuk->getById($id);
		if(!$data["bahanmasuk"]) show_404();

		redirect(site_url('bahanmasuk'));
	}

	public function hapusMasuk($id = null)
	{
		if(!isset($id)) show_404();

		if ($this->bahanmasuk->delete($id)){
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
		}
		redirect(site_url('bahanmasuk'));
	}

	public function cariMasuk()
	{
		$id = $_POST['id'];
		$cari = $this->bahanbantu->getById($id);
		echo json_encode($cari);
	}

	// ---------------------------------------------
	// Bahan Gluemix
	// ---------------------------------------------

	public function gluemix()
	{
		$data['title'] = "Data Pengolahan Lem (Gluemix)";
		$data['isi'] = "bahanbantu/gluemix";
		$data['gluemix'] = $this->gluemix->getAll();
		$data['lfe'] = $this->bahanbantu->getLfe();
		$data['mf'] = $this->bahanbantu->getMf();
		$data['tepung'] = $this->bahanbantu->getTepung();
		$data['hu100'] = $this->bahanbantu->get100();
		$data['hu103'] = $this->bahanbantu->get103();
		$data['hu360'] = $this->bahanbantu->get360();
		$this->load->view('template', $data);
	}

	public function tambahGlue()
	{
		$valid = $this->form_validation;
		$valid->set_rules($this->gluemix->rules());

		if ($valid->run() == TRUE) {
			$this->gluemix->save();
			$this->session->set_flashdata('success', 'Berhasil Di Simpan');
		} else {
			$this->session->set_flashdata('danger', 'Gagal Di Simpan');
		}
		redirect(site_url('gluemix'));
	}

	public function detailGlue($id)
    {
		$data['title'] = "Data Detail";
		$data['isi'] = "bahanbantu/detail";
        $data['detail'] = $this->gluemix->getDetail($id);
		$data['byId'] = $this->gluemix->getById($id);
		$this->load->view('template',$data);

    }

	public function hapusGlue($id = null)
	{
		if(!isset($id)) show_404();

		if ($this->gluemix->delete($id)){
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
			redirect(site_url('gluemix'));
		}
	}
}
