<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vinirmasuk_model extends CI_Model {

    private $vinir = 'vinir';
    private $vinir_masuk = 'vinir_masuk';
    private $jeniskayu = 'jeniskayu';
    private $ukuran = 'ukuran';
    private $kayu = 'kayu';

    public function rules()
	{
		return [
			[
				'field' => 'tgl',
                'label' => 'Tanggal Masuk',
                'rules' => 'required'
            ],
            [
				'field' => 'kubikvinirmasuk',
                'label' => 'Kubikasi',
                'rules' => 'numeric|required'
            ],
            [
				'field' => 'stokvinirmasuk',
                'label' => 'Stok',
                'rules' => 'numeric|required'
            ],
            [
				'field' => 'kayu_log',
                'label' => 'Pemakaian Log',
                'rules' => 'numeric|required'
            ],
		];
    }

    public function getAll ()
    {
        return $this->db->get($this->vinir_masuk)->result();
    }

    public function getJoinAll ()
    {
        $this->db->select($this->vinir_masuk.'.* ,'.$this->kayu.'.kd_kayu,'.$this->vinir.'.tebal, '.$this->ukuran.'.panjang, '.$this->ukuran.'.lebar, '.$this->jeniskayu.'.nama ')
        ->from($this->vinir_masuk)
        ->join($this->vinir, $this->vinir_masuk.'.id_vinir = '.$this->vinir.'.id', 'left')
        ->join($this->jeniskayu, $this->vinir.'.id_jenis = '.$this->jeniskayu.'.id', 'left')
        ->join($this->kayu, $this->kayu.'.id_jenis = '.$this->jeniskayu.'.id', 'left')
        ->join($this->ukuran, $this->vinir.'.id_ukuran = '.$this->ukuran.'.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById ($id)
    {
        return $this->db->get_where($this->vinir_masuk, ["id" => $id])->row();
    }

    public function report($id_kayu)
    {
        $kondisi = "";
        $sql = "SELECT ".$this->vinir_masuk.".* ,".$this->kayu.".kd_kayu, ".$this->jeniskayu.".nama, ".$this->vinir.".tebal, ".$this->ukuran.".panjang, ".$this->ukuran.".lebar
        FROM ".$this->vinir_masuk."
        LEFT JOIN ".$this->vinir." ON ".$this->vinir_masuk.".id_vinir = ".$this->vinir.".id
        LEFT JOIN ".$this->kayu." ON ".$this->vinir_masuk.".id_kayu = ".$this->kayu.".id
        LEFT JOIN ".$this->ukuran." ON ".$this->vinir.".id_ukuran = ".$this->ukuran.".id
        LEFT JOIN ".$this->jeniskayu." ON ".$this->vinir.".id_jenis = ".$this->jeniskayu.".id";
        if ($id_kayu != "") {
            $kondisi .= " WHERE ".$this->kayu.".id = '$id_kayu'";
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
            'stok_masuk' => $post["stokvinirmasuk"],
            'kubik_masuk' => $post["kubikvinirmasuk"],
            'jml_log' => $post["kayu_log"],
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

}