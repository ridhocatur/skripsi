<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
    	$this->load->model(array('Bahanbantu_model','Bahanmasuk_model','Gluemix_model','Kayulog_model','Kayumasuk_model','Pegawai_model','Vinir_model','Vinirmasuk_model','Jeniskayu_model','Ukuran_model','Kategori_model','Supplier_model','Plywood_model'));
        check_not_login();
    }

    public function index() {
    	$data['title'] = "Cetak Laporan";
        $data['isi'] = "laporan/index2";
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
        $data['title'] = "Laporan Penggunaan Bahan Bantu";
        $tgl_awal        = $this->input->post('tglsatu');
        $tgl_akhir       = $this->input->post('tgldua');
        $tipe_glue       = $this->input->post('nm_bahan');
        $data['tanggal'] = $tgl_awal;
        $stokbahan       = $this->Bahanbantu_model->report($tgl_awal, $tgl_akhir, $tipe_glue);
        $i = 0;
        foreach($stokbahan as $bahan){
            $data['stokbahan'][$i]['id']          = $bahan['id'];
            $data['stokbahan'][$i]['tipe_glue']   = $bahan['tipe_glue'];
            $data['stokbahan'][$i]['nama']        = $bahan['nama'];
            $data['stokbahan'][$i]['nm_kateg']    = $bahan['nm_kateg'];
            $data['stokbahan'][$i]['kd_bahan']    = $bahan['kd_bahan'];
            $data['stokbahan'][$i]['stok_keluar'] = $bahan['stok_keluar'];

            $bahanmasuk                           = $this->Bahanmasuk_model->idBahan($bahan['id']);

            $data['stokbahan'][$i]['item'] = [];
            foreach($bahanmasuk as $masuk){
                $data['stokbahan'][$i]['item'][] = [
                    'masuk' => $masuk->masuk
                ];
            }
            $i++;
        }
        $this->load->view("laporan/bahanbantu/cetak_stok", $data);
    }
    public function bahanmasuk()
    {
        $tgl_awal = $this->input->post('tglsatu');
        $tgl_akhir = $this->input->post('tgldua');
        $id_supplier = $this->input->post('suplier');
        $data['title'] = 'Laporan Pemasukan Bahan Bantu';
        $data['bahanmasuk'] = $this->Bahanmasuk_model->report($tgl_awal, $tgl_akhir, $id_supplier);
        $this->load->view('laporan/bahanbantu/cetak_masuk', $data);
    }
    public function gluemix()
    {
        $data['gluemix'] = [];
        $tgl_awal = $this->input->post('tglsatu');
        $tgl_akhir = $this->input->post('tgldua');
        $shift = $this->input->post('shift');
        $tipelem = $this->input->post('lem');
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
        $id_jenis         = $this->input->post('jeniskayu');
        $tgl_awal         = $this->input->post('tglsatu');
        $tgl_akhir        = $this->input->post('tgldua');
        $data['tanggal']  = $tgl_awal;
        $data['title']    = "Laporan Penggunaan Kayu Log";
        $data['stokkayu'] = $this->Kayulog_model->report($tgl_awal, $tgl_akhir, $id_jenis);
        // $i = 0;
        // foreach($stokkayu as $kayu){
        //     $data['stokkayu'][$i]['id']          = $kayu['id'];
        //     $data['stokkayu'][$i]['kd_kayu']     = $kayu['kd_kayu'];
        //     $data['stokkayu'][$i]['nama']        = $kayu['nama'];
        //     $data['stokkayu'][$i]['jml_log']     = $kayu['jml_log'];
        //     $data['stokkayu'][$i]['kubik_log']   = $kayu['kubik_log'];

        //     $kayumasuk                           = $this->Bahanmasuk_model->idBahan($kayu['id']);

        //     $data['stokkayu'][$i]['item'] = [];
        //     foreach($kayumasuk as $masuk){
        //         $data['stokkayu'][$i]['item'][] = [
        //             'masuk' => $masuk->masuk
        //         ];
        //     }
        //     $i++;
        // }
        $this->load->view("laporan\kayulog\cetak_stok", $data);
    }
    public function kayumasuk()
    {
        $data['kayumasuk'] = [];
        $tgl_awal = $this->input->post('tglsatu');
        $tgl_akhir = $this->input->post('tgldua');
        $id_jenis = $this->input->post('jeniskayu');
        $supkayu = $this->input->post('suplier');
        $data['title'] = 'Laporan Pemasukan Kayu Log';
        $kayumasuk = $this->Kayumasuk_model->report($tgl_awal, $tgl_akhir, $supkayu);
        $i = 0;
        foreach($kayumasuk as $masuk){
            $data['kayumasuk'][$i]['id'] = $masuk['id'];
            $data['kayumasuk'][$i]['nm_sup'] = $masuk['nm_sup'];
            $data['kayumasuk'][$i]['tgl'] = $masuk['tgl'];
            $data['kayumasuk'][$i]['jml_stok'] = $masuk['jml_stok'];
            $data['kayumasuk'][$i]['jml_kubik'] = $masuk['jml_kubik'];
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
        if ($id_jenis == "") {
            $this->load->view('laporan\kayulog\cetak_masuk', $data);
        } else {
            $this->load->view('laporan\kayulog\cetak_masuk_jenis', $data);
        }
    }

    // ----------------------------------------------
    //  VINIR
    // ----------------------------------------------

    public function stokvinir()
    {
        $ukuran            = $this->input->post('sizevin');
        $id_jenis          = $this->input->post('jenis');
        $tgl_awal          = $this->input->post('tglsatu');
        $tgl_akhir         = $this->input->post('tgldua');
        $data['tanggal']   = $tgl_awal;
        $data['title']     = "Laporan Penggunaan Vinir";
		$data['stokvinir'] = $this->Vinir_model->report($tgl_awal,$tgl_akhir,$ukuran,$id_jenis);
        $this->load->view('laporan\vinir\cetak_stok', $data);
    }
    public function vinirmasuk()
    {
        $tgl_awal = $this->input->post('tglsatu');
        $tgl_akhir = $this->input->post('tgldua');
        $id_kayu = $this->input->post('kayulog');
        $data['title'] = "Laporan Pengolahan Vinir";
		$data['vinirmasuk'] = $this->Vinirmasuk_model->report($id_kayu,$tgl_awal,$tgl_akhir);
        $this->load->view('laporan\vinir\cetak_masuk', $data);
    }
    public function plywood()
    {
        $data['plywood'] = [];
        $tgl_awal = $this->input->post('tglsatu');
        $tgl_akhir = $this->input->post('tgldua');
        $ukuran = $this->input->post('ukuran');
        $tipeglue = $this->input->post('lem');
        $shift = $this->input->post('shift');
        $data['title'] = 'Laporan Hasil Produksi Plywood';
        $plywood = $this->Plywood_model->report($tgl_awal, $tgl_akhir, $ukuran, $tipeglue, $shift);
        $i = 0;
        foreach($plywood as $item){
            $data['plywood'][$i]['id'] = $item['id'];
            $data['plywood'][$i]['tgl'] = $item['tgl'];
            $data['plywood'][$i]['shift'] = $item['shift'];
            $data['plywood'][$i]['tebal'] = $item['tebal'];
            $data['plywood'][$i]['panjang'] = $item['panjang'];
            $data['plywood'][$i]['lebar'] = $item['lebar'];
            $data['plywood'][$i]['tipe_glue'] = $item['tipe_glue'];
            $data['plywood'][$i]['tipe_ply'] = $item['tipe_ply'];
            $data['plywood'][$i]['total_prod'] = $item['total_prod'];
            $data['plywood'][$i]['total_kubik'] = $item['total_kubik'];
            $dataplywood = $this->Plywood_model->getDetail($item['id']);
            $data['plywood'][$i]['item'] = [];
            foreach($dataplywood as $detail){
                $data['plywood'][$i]['item'][] = [
                    'nama' => $detail->nama,
                    'jenis' => $detail->jenis,
                    'tblvin' => $detail->tblvin,
                    'pjgvin' => $detail->pjgvin,
                    'lbrvin' => $detail->lbrvin,
                    'stok_keluar' => $detail->stok_keluar,
                    'kubik_keluar' => $detail->kubik_keluar
                ];
            }
            $i++;
        }
        $this->load->view('laporan\plywood\cetak_stok', $data);
    }
}
