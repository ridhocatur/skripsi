<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanbantu_model extends CI_Model {

    private $bahanbantu = 'bahan_bantu';
    private $kategori = 'kategori';
    private $viewstok = 'v_bahanbantu_stok';

    public $id;
    public $kd_bahan;
    public $nama;
    public $merk;
    public $stok;
    public $id_kategori;
    public $keterangan;

    public function rules()
	{
		return [
			[
				'field' => 'kd_bahan',
                'label' => 'Kode Bahan',
                'rules' => 'required'
            ],
            [
				'field' => 'nama',
                'label' => 'Nama Bahan',
                'rules' => 'required'
            ],
            [
				'field' => 'stok',
                'label' => 'Stok',
                'rules' => 'numeric'
            ],
		];
    }

    public function getAll ()
    {
        return $this->db->get($this->bahanbantu)->result();
    }

    public function getLfe ()
    {
        $this->db->like('kd_bahan','lfe');
        return $this->db->get($this->bahanbantu)->row();
    }
    public function getMf ()
    {
        $this->db->like('kd_bahan','mf');
        return $this->db->get($this->bahanbantu)->row();
    }
    public function getTepung ()
    {
        $this->db->like('kd_bahan','tpng')->or_like('nama', 'tepung');
        return $this->db->get($this->bahanbantu)->row();
    }
    public function get100 ()
    {
        $this->db->like('kd_bahan','100');
        return $this->db->get($this->bahanbantu)->row();
    }
    public function get103 ()
    {
        $this->db->like('kd_bahan','103');
        return $this->db->get($this->bahanbantu)->row();
    }
    public function get360 ()
    {
        $this->db->like('kd_bahan','360');
        return $this->db->get($this->bahanbantu)->row();
    }

    public function getJoinAll ()
    {
        $this->db->select($this->bahanbantu.'.* ,'.$this->kategori.'.nm_kateg')
                ->from($this->bahanbantu)
                ->join($this->kategori, $this->bahanbantu.'.id_kategori =.'.$this->kategori.'.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById ($id)
    {
        return $this->db->get_where($this->bahanbantu, ["id" => $id])->row();
    }

    public function report($tgl_awal, $tgl_akhir, $tipe_glue)
    {
        // if ($a != "") {
        //     return $this->db->get_where($this->viewstok, ["id" => $a])->result();
        // } else {
        //     return $this->db->get($this->viewstok)->result();
        // }
        $kondisi = "";
        $sql = "SELECT gluemix.tipe_glue, bahan_bantu.id, bahan_bantu.nama, bahan_bantu.kd_bahan, kategori.nm_kateg, SUM(dtl_gluemix.stok_keluar) AS stok_keluar FROM gluemix
        LEFT JOIN dtl_gluemix ON gluemix.id = dtl_gluemix.id_gluemix
        LEFT JOIN bahan_bantu ON bahan_bantu.id = dtl_gluemix.id_bahan
        LEFT JOIN kategori ON bahan_bantu.id_kategori = kategori.id
        WHERE gluemix.tgl BETWEEN '$tgl_awal' AND '$tgl_akhir' AND gluemix.tipe_glue = '$tipe_glue' AND stok_keluar > 0 GROUP BY dtl_gluemix.id_bahan";
        // if ($tgl_awal != "" && $tgl_akhir == "") {
        //     $kondisi .= " WHERE gluemix.tgl = '$tgl_awal'";
        // } else if ($tgl_awal == "" && $tgl_akhir != "") {
        //     $kondisi .= " WHERE gluemix.tgl = '$tgl_akhir'";
        // } else if ($tgl_awal != "" && $tgl_akhir != "") {
        //     $kondisi .= " WHERE gluemix.tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'";
        // }
        // if ($tipe_glue != "") {
        //     if ($kondisi != "") {
        //         $kondisi .= " AND gluemix.tipe_glue = '$tipe_glue' AND stok_keluar > 0 GROUP BY dtl_gluemix.id_bahan";
        //     } else {
        //         $kondisi .= " WHERE gluemix.tipe_glue = '$tipe_glue' AND stok_keluar > 0 GROUP BY dtl_gluemix.id_bahan";
        //     }
        // }
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = array(
            'id' => uniqid(),
            'kd_bahan' => $post["kd_bahan"],
            'nama' => $post["nama"],
            'stok' => $post["stok"],
            'id_kategori' => $post["id_kategori"],
            'keterangan' => $post["keterangan"]
        );

        return $this->db->insert($this->bahanbantu, $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = array(
            'id' => $post["id"],
            'kd_bahan' => $post["kd_bahan"],
            'nama' => $post["nama"],
            'stok' => $post["stok"],
            'id_kategori' => $post["id_kategori"],
            'keterangan' => $post["keterangan"]
        );
        return $this->db->update($this->bahanbantu, $data, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->bahanbantu, array("id" => $id));
    }
}