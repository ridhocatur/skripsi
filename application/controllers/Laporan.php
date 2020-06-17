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
        $data['title'] = "Laporan Stok Bahan Bantu";
		$data['stokbahan'] = $this->Bahanbantu_model->report();
		$this->load->view("laporan/bahanbantu/cetak_stok", $data);
    }
	public function stokbahanbulan()
    {
        $tgl = $this->input->post('satutgl');
        $data['title'] = "Laporan Stok Bahan Bantu";
		$data['stokbahan'] = $this->Bahanbantu_model->report_month($tgl);
		$data['bulan'] = $this->Bahanbantu_model->getMonth($tgl);
		$this->load->view("laporan/bahanbantu/cetak_stok_m", $data);
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

    // ----------------------------------------------
    //  KAYU LOG
    // ----------------------------------------------

    public function stokkayu()
    {
        $id_jenis = $this->input->post('select1');
        $data['title'] = "Laporan Stok Kayu Log";
		$data['stokkayu'] = $this->Kayulog_model->report($id_jenis);
        $this->load->view("laporan\kayulog\cetak_stok", $data);
    }
    public function kayumasuk()
    {
        $data['kayumasuk'] = [];
        $tgl_awal = $this->input->post('satutgl');
        $tgl_akhir = $this->input->post('duatgl');
        $id_jenis = $this->input->post('select1');
        $supkayu = $this->input->post('select2');
        $data['title'] = 'Laporan Pemasukan Kayu Log';
        $kayumasuk = $this->Kayumasuk_model->report($tgl_awal, $tgl_akhir, $supkayu);
        $i = 0;
        foreach($kayumasuk as $masuk){
            $data['kayumasuk'][$i]['id'] = $masuk['id'];
            $data['kayumasuk'][$i]['invoice'] = $masuk['invoice'];
            $data['kayumasuk'][$i]['nm_sup'] = $masuk['nm_sup'];
            $data['kayumasuk'][$i]['tgl'] = $masuk['tgl'];
            $datakayumasukdetail = $this->Kayumasuk_model->getDetailReport($masuk['id'], $id_jenis);
            $data['kayumasuk'][$i]['item'] = [];
            foreach($datakayumasukdetail as $kayudetail){
                $data['kayumasuk'][$i]['item'][] = [
                    'kd_kayu' => $kayudetail['kd_kayu'],
                    'nama' => $kayudetail['nama'],
                    'panjang' => $kayudetail['panjang'],
                    'diameter1' => $kayudetail['diameter1'],
                    'diameter2' => $kayudetail['diameter2'],
                    'stok_masuk' => $kayudetail['stok_masuk'],
                    'kubik_masuk' => $kayudetail['kubik_masuk']
                ];
            }
            $i++;
        }
        $this->load->view('laporan\kayulog\cetak_masuk', $data);
    }

    // ----------------------------------------------
    //  VINIR
    // ----------------------------------------------

    public function stokvinir()
    {
        $id_ukuran = $this->input->post('select1');
        $id_jenis = $this->input->post('select2');
        $data['title'] = "Laporan Stok Vinir";
		$data['stokvinir'] = $this->Vinir_model->report($id_ukuran,$id_jenis);
        $this->load->view('laporan\vinir\cetak_stok', $data);
    }
    public function vinirmasuk()
    {
        $tgl_awal = $this->input->post('satutgl');
        $tgl_akhir = $this->input->post('duatgl');
        $id_kayu = $this->input->post('select1');
        $data['title'] = "Laporan Pengolahan Vinir";
		$data['vinirmasuk'] = $this->Vinirmasuk_model->report($id_kayu);
        $this->load->view('laporan\vinir\cetak_masuk', $data);
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