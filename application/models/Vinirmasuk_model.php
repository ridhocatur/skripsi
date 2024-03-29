<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vinirmasuk_model extends CI_Model {

    private $vinir = 'vinir';
    private $vinir_masuk = 'vinir_masuk';
    private $jeniskayu = 'jeniskayu';
    private $ukuran = 'ukuran';
    private $kayu = 'kayu';
    private $nilai_baku = 'nilai_baku';

    public function rules()
	{
		return [
			[
				'field' => 'tgl',
                'label' => 'Tanggal Masuk',
                'rules' => 'required'
            ],
            [
				'field' => 'ttl_kubik',
                'label' => 'Total Kubikasi',
                'rules' => 'numeric|required'
            ],
            [
				'field' => 'ttl_vinir',
                'label' => 'Total Vinir (pcs)',
                'rules' => 'numeric|required'
            ],
            [
				'field' => 'jmlkubik',
                'label' => 'Jml. Kubik Terpakai',
                'rules' => 'numeric|required'
            ],
            [
				'field' => 'ukurpot',
                'label' => 'Ukuran Potongan',
                'rules' => 'required'
            ]
		];
    }

    public function rulesBaku()
	{
		return [
            [
				'field' => 'dia_bobin',
                'label' => 'Ø Bobin (m)',
                'rules' => 'numeric|required'
            ],
            [
				'field' => 'density',
                'label' => 'Kerapatan',
                'rules' => 'numeric|required'
            ],
            [
				'field' => 'vol_bobin',
                'label' => 'Volume Bobin',
                'rules' => 'numeric|required'
            ],
            [
				'field' => 'n_phi',
                'label' => 'Nilai Phi',
                'rules' => 'numeric|required'
            ],
            [
				'field' => 'rendemen',
                'label' => 'Rendemen',
                'rules' => 'numeric|required'
            ]
		];
    }

    public function getAll ()
    {
        return $this->db->get($this->vinir_masuk)->result();
    }

    public function getNilaiBaku ()
    {
        return $this->db->get($this->nilai_baku)->result();
    }

    public function getJoinAll ()
    {
        $this->db->select($this->vinir_masuk.'.* ,'.$this->kayu.'.kd_kayu,'.$this->vinir.'.tebal, '.$this->vinir.'.panjang, '.$this->vinir.'.lebar, '.$this->jeniskayu.'.nama ')
        ->from($this->vinir_masuk)
        ->join($this->vinir, $this->vinir_masuk.'.id_vinir = '.$this->vinir.'.id', 'left')
        ->join($this->jeniskayu, $this->vinir.'.id_jenis = '.$this->jeniskayu.'.id', 'left')
        ->join($this->kayu, $this->kayu.'.id_jenis = '.$this->jeniskayu.'.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function forDetail ($id)
    {
        $this->db->select($this->vinir_masuk.'.* ,'.$this->kayu.'.kd_kayu,'.$this->vinir.'.tebal, '.$this->vinir.'.panjang, '.$this->vinir.'.lebar, '.$this->jeniskayu.'.nama ')
        ->from($this->vinir_masuk)
        ->join($this->vinir, $this->vinir_masuk.'.id_vinir = '.$this->vinir.'.id', 'left')
        ->join($this->jeniskayu, $this->vinir.'.id_jenis = '.$this->jeniskayu.'.id', 'left')
        ->join($this->kayu, $this->kayu.'.id_jenis = '.$this->jeniskayu.'.id', 'left')
        ->where($this->vinir_masuk.'.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getById ($id)
    {
        return $this->db->get_where($this->vinir_masuk, ["id" => $id])->row();
    }

    public function report($id_kayu,$tgl_awal,$tgl_akhir)
    {
        $kondisi = "";
        $sql = "SELECT ".$this->vinir_masuk.".* ,".$this->kayu.".kd_kayu, ".$this->jeniskayu.".nama, ".$this->vinir.".tebal, ".$this->vinir.".panjang, ".$this->vinir.".lebar
        FROM ".$this->vinir_masuk."
        LEFT JOIN ".$this->vinir." ON ".$this->vinir_masuk.".id_vinir = ".$this->vinir.".id
        LEFT JOIN ".$this->kayu." ON ".$this->vinir_masuk.".id_kayu = ".$this->kayu.".id
        LEFT JOIN ".$this->jeniskayu." ON ".$this->vinir.".id_jenis = ".$this->jeniskayu.".id";
        if ($tgl_awal != "" && $tgl_akhir == "") {
            $kondisi .= " WHERE ".$this->vinir_masuk.".tgl = '$tgl_awal'";
        } else if ($tgl_awal == "" && $tgl_akhir != "") {
            $kondisi .= " WHERE ".$this->vinir_masuk.".tgl = '$tgl_akhir'";
        } else if ($tgl_awal != "" && $tgl_akhir != "") {
            $kondisi .= " WHERE ".$this->vinir_masuk.".tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'";
        }
        if ($id_kayu != "") {
            if ($kondisi != "") {
                $kondisi .= " AND ".$this->kayu.".id = '$id_kayu' ORDER BY tgl ASC";
            } else {
                $kondisi .= " WHERE ".$this->kayu.".id = '$id_kayu' ORDER BY tgl ASC";
            }
        }
        $query = $this->db->query($sql.$kondisi);
        return $query->result_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = array(
            'id' => uniqid(),
            'id_kayu' => $post["id_kayu"],
            'id_vinir' => $post["id_vinir"],
            'tgl' => $post["tgl"],
            'jml_log' => $post["kayulog"],
            'kubik_log' => $post["jmlkubik"],
            'stok_masuk' => $post["ttl_vinir"],
            'kubik_masuk' => $post["ttl_kubik"],
            'keterangan' => $post["keterangan"]
        );

        return $this->db->insert($this->vinir_masuk, $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = array(
            'id' => $post["id"],
            'id_kayu' => $post["id_kayu"],
            'id_vinir' => $post["id_vinir"],
            'tgl' => $post["tgl"],
            'stok_masuk' => $post["stokvinirmasuk"],
            'kubik_masuk' => $post["kubikvinirmasuk"],
            'jml_log' => $post["kayu_log"],
            'keterangan' => $post["keterangan"]
        );
        return $this->db->update($this->vinir_masuk, $data, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->vinir_masuk, array("id" => $id));
    }

    public function getBaku ($id)
    {
        return $this->db->get_where($this->nilai_baku, ["id" => $id])->row();
    }
    public function updateBaku()
    {
        $post = $this->input->post();
        $data = array(
            'id' => $post["id_baku"],
            'dbobin' => $post["dia_bobin"],
            'vbobin' => $post["vol_bobin"],
            'kerapatan' => $post["density"],
            'phi' => $post["n_phi"],
            'rendem' => $post["rendemen"]
        );
        return $this->db->update($this->nilai_baku, $data, array('id' => $post["id_baku"]));
    }

}