<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Bahanbantu_model','Kayulog_model','Vinir_model','Pegawai_model','Jeniskayu_model','Ukuran_model','Supplier_model'));
		check_not_login();
	}

	public function index()
	{
		$data['title'] = "Halaman Utama";
		$data['isi'] = "home";
		$data['pegawai'] = $this->Pegawai_model->count();
		$data['jeniskayu'] = $this->Jeniskayu_model->count();
		$data['ukuran'] = $this->Ukuran_model->count();
		$data['supplier'] = $this->Supplier_model->count();
		$this->load->view('template',$data);
	}

	public function grafikStokBahanBantu()
	{
		$data = $this->Bahanbantu_model->getAll();
        $response = [];
        foreach ($data as $result) {
            $response[] = [
                'y' => intval($result->stok),
                'name' => $result->nama
            ];
        }
        echo json_encode($response);
	}

	public function grafikStokKayulog()
	{
		$data = $this->Kayulog_model->getJoinAll();
        $response = [];
        foreach ($data as $result) {
            $response[] = [
                'y' => floatval($result->kubikasi),
                'name' => $result->nama
            ];
        }
        echo json_encode($response);
	}

	public function grafikStokVinir()
	{
		$jenis = $this->Jeniskayu_model->getAll();
        foreach ($jenis as $result) {
			$namajenis[] = $result->nama;
			$pdk = $this->Vinir_model->forChart($result->id, "1900");
			foreach ($pdk as $pen) {
				$data1[] = floatval($pen->kubikasi);
			}
			$pjg = $this->Vinir_model->forChart($result->id, "2600");
			foreach ($pjg as $pan) {
				$data2[] = floatval($pan->kubikasi);
			}
		}

		$kategori = ["categories" => $namajenis];
		$pendek = ["name"=>"Pendek (1900 x 950)", "data" => $data1];
		$panjang = ["name"=>"Panjang (2600 x 1300)", "data" => $data2];
        echo json_encode(array($kategori, $pendek, $panjang));
	}
}
