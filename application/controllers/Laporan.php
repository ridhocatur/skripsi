<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
    	$this->load->model(array('Bahanbantu_model','Bahanmasuk_model','Gluemix_model','Kayulog_model','Kayumasuk_model','Pegawai_model','Vinir_model','Vinirmasuk_model','Jeniskayu_model','Ukuran_model','Kategori_model','Supplier_model'));
        check_not_login();
    }

    public function index() {
    	$data['title'] = "Cetak Laporan";
        $data['isi'] = "laporan/index";
        $data['ukuran'] = $this->Ukuran_model->getAll();
        $data['jeniskayu'] = $this->Jeniskayu_model->getAll();
        $data['kategori'] = $this->Kategori_model->getAll();
        $data['supbahan'] = $this->Supplier_model->SupBahan();
        $data['supkayu'] = $this->Supplier_model->SupKayu();
        $data['kayulog'] = $this->Kayulog_model->getAll();
		$this->load->view('template',$data);
    }

    // ----------------------------------------------
    //  BAHAN BANTU
    // ----------------------------------------------

	public function stokbahan()
    {
        $id_kategori = $this->input->post('select1');
        $data['title'] = "Laporan Stok Bahan Bantu";
		$data['stokbahan'] = $this->Bahanbantu_model->report($id_kategori);
		$this->load->view("laporan/bahanbantu/cetak_stok", $data);
    }
    public function bahanmasuk()
    {
        $tgl_awal = $this->input->post('satutgl');
        $tgl_akhir = $this->input->post('duatgl');
        $id_supplier = $this->input->post('select1');
        $data['title'] = 'Laporan Pemasukan Bahan Bantu';
        $data['bahanmasuk'] = $this->Bahanmasuk_model->report($tgl_awal, $tgl_akhir, $id_supplier) ;
        $this->load->view('laporan/bahanbantu/cetak_masuk', $data);
    }

    // ----------------------------------------------
    //  GLUEMIX
    // ----------------------------------------------

    public function gluemix()
    {
        $data['gluemix'] = [];
        $tgl_awal = $this->input->post('satutgl');
        $tgl_akhir = $this->input->post('duatgl');
        $shift = $this->input->post('shift');
        $tipelem = $this->input->post('select1');
        $data['title'] = 'Laporan Gluemix';
        $gluemix = $this->Gluemix_model->report($tgl_awal, $tgl_akhir, $shift, $tipelem);
        $i = 0;
        foreach($gluemix as $keluar){
            $data['gluemix'][$i]['tipe_glue'] = $keluar['tipe_glue'];
            $data['gluemix'][$i]['id'] = $keluar['id'];
            $data['gluemix'][$i]['shift'] = $keluar['shift'];
            $data['gluemix'][$i]['tgl'] = $keluar['tgl'];
            $data['gluemix'][$i]['total'] = $keluar['total'];
            $datagluemixdetail = $this->Gluemix_model->getDetail($keluar['id']);
            $data['gluemix'][$i]['item'] = [];
            foreach($datagluemixdetail as $gluemixdetail){
                $data['gluemix'][$i]['item'][] = [
                    'kd_bahan' => $gluemixdetail->kd_bahan,
                    'stok_keluar' => $gluemixdetail->stok_keluar
                ];
            }
            $i++;
        }
        $this->load->view('laporan/bahanbantu/cetak_gluemix', $data);
    }
    public function laporangluemix()
    {
        $data['gluemix'] = [];
        $tgl_awal = $_POST['tgl_awal'];
        $tgl_akhir = $_POST['tgl_akhir'];
        $shift = $_POST['shift'];
        $data['judul'] = 'Laporan Pengolahan Lem';
        $gluemix = $this->model('Gluemix_model')->getDataforReport($tgl_awal, $tgl_akhir, $shift);

        $this->view('laporan/gluemix_detail', $data);
    }

    public function laporangluemixsheet()
    {
        $data['gluemix'] = [];
        $tgl_awal = $_POST['tgl_awal'];
        $tgl_akhir = $_POST['tgl_akhir'];
        $shift = $_POST['shift'];
        $data['judul'] = 'Laporan Pengolahan Lem';
        $gluemix = $this->model('Gluemix_model')->getDataforReportSheet($tgl_awal, $tgl_akhir, $shift);
        $i = 0;
        foreach($gluemix as $keluar){
            $data['gluemix'][$i]['gluemix'] = $keluar['gluemix'];
            $data['gluemix'][$i]['id'] = $keluar['id'];
            $data['gluemix'][$i]['shift'] = $keluar['shift'];
            $data['gluemix'][$i]['tgl'] = $keluar['tgl'];
            $datagluemixdetail = $this->model('Gluemix_model')->getDetail($keluar['id']);
            $data['gluemix'][$i]['item'] = [];

            foreach($datagluemixdetail as $gluemixdetail){
                $data['gluemix'][$i]['item'][] = [
                    'kd_bahan' => $gluemixdetail['kd_bahan'],
                    'merk' => $gluemixdetail['merk'],
                    'stok_keluar' => $gluemixdetail['stok_keluar']
                ];
            }
            $i++;
        }
        $this->view('laporan/gluemix_sheet', $data);
    }

    // ----------------------------------------------
    //  KAYU LOG
    // ----------------------------------------------

    public function kayumasuk()
    {
        $data['judul'] = 'Laporan Pemasukan Kayu Log';
        $data['supplier'] = $this->model('Supplier_model')->getAll();
        $this->view('templates/head', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('laporan/kayumasuk', $data);
        $this->view('templates/footer');
        $this->view('templates/script');
    }
    public function laporankayumasuk()
    {
        $data['kayumasuk'] = [];
        $tgl_awal = $_POST['tgl_awal'];
        $tgl_akhir = $_POST['tgl_akhir'];
        $id_supplier = $_POST['id_supplier'];
        $data['judul'] = 'Laporan Pemasukan Kayu Log';
        $kayumasuk = $this->model('KayuMasuk_model')->getDataByDate($tgl_awal, $tgl_akhir, $id_supplier);
        $i = 0;
        foreach($kayumasuk as $masuk){
            $data['kayumasuk'][$i]['invoice'] = $masuk['invoice'];
            $data['kayumasuk'][$i]['supplier'] = $masuk['nm_sup'];
            $data['kayumasuk'][$i]['tanggal'] = $masuk['tgl'];
            $datakayumasukdetail = $this->model('KayuMasuk_model')->getDetailbyInvoice($masuk['invoice']);
            $data['kayumasuk'][$i]['item'] = [];

            foreach($datakayumasukdetail as $kayudetail){
                $data['kayumasuk'][$i]['item'][] = [
                    'kdkayu' => $kayudetail['kd_kayu'],
                    'stokmasuk' => $kayudetail['stok_masuk'],
                    'kubikmasuk' => $kayudetail['kubik_masuk']
                ];
            }
            $i++;
        }
        $this->view('laporan/kayumasuk_detail', $data);
    }

    // ----------------------------------------------
    //  VINIR
    // ----------------------------------------------

    public function vinirmasuk()
    {
        $data['judul'] = 'Laporan Hasil Kupasan Kayu Log / Vinir';
        $data['kayu'] = $this->model('Kayu_model')->getAll();
        $this->view('templates/head', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('laporan/vinirmasuk', $data);
        $this->view('templates/footer');
        $this->view('templates/script');
    }
    public function laporanvinirmasuk()
    {
        $tgl_awal = $_POST['tgl_awal'];
        $tgl_akhir = $_POST['tgl_akhir'];
        $id_kayu = $_POST['id_kayu'];
        $data['judul'] = 'Laporan Hasil Kupasan Kayu Log / Vinir';
        $data['vinirmasuk'] = $this->model('VinirMasuk_model')->getDataforReport($tgl_awal, $tgl_akhir, $id_kayu);
        $this->view('laporan/vinirmasuk_detail', $data);
    }

    public function vinirkeluar()
    {
        $data['judul'] = 'Laporan Penggunaan Vinir';
        $data['supplier'] = $this->model('Supplier_model')->getAll();
        $this->view('templates/head', $data);
        $this->view('templates/sidebar');
        $this->view('templates/topbar');
        $this->view('laporan/vinirkeluar', $data);
        $this->view('templates/footer');
        $this->view('templates/script');
    }
    public function laporanvinirkeluar()
    {
        $data['vinirkeluar'] = [];
        $tgl_awal = $_POST['tgl_awal'];
        $tgl_akhir = $_POST['tgl_akhir'];
        $shift = $_POST['shift'];
        $data['judul'] = 'Laporan Penggunaan Vinir';
        $vinirkeluar = $this->model('VinirKeluar_model')->getDataforReport($tgl_awal, $tgl_akhir, $shift);
        $i = 0;
        foreach($vinirkeluar as $keluar){
            $data['vinirkeluar'][$i]['tipe_glue'] = $keluar['tipe_glue'];
            $data['vinirkeluar'][$i]['id'] = $keluar['id'];
            $data['vinirkeluar'][$i]['shift'] = $keluar['shift'];
            $data['vinirkeluar'][$i]['tgl'] = $keluar['tgl'];
            $datavinirkeluar = $this->model('VinirKeluar_model')->getDetail($keluar['id']);
            $data['vinirkeluar'][$i]['item'] = [];

            foreach($datavinirkeluar as $detail){
                $data['vinirkeluar'][$i]['item'][] = [
                    'kd_jenis' => $detail['kd_jenis'],
                    'ukuran' => $detail['ukuran'],
                    'kubik_keluar' => $detail['kubik_keluar'],
                    'stok_keluar' => $detail['stok_keluar']
                ];
            }
            $i++;
        }
        $this->view('laporan/vinirkeluar_detail', $data);
    }
}