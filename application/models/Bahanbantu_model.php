<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanbantu_model extends CI_Model {

    private $bahanbantu = 'bahan_bantu';
    private $kategori = 'kategori';

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
        $this->db->select($this->bahanbantu.'.* ,'.$this->kategori.'.nm_kateg')->from($this->bahanbantu)->join($this->kategori, $this->bahanbantu.'.id_kategori =.'.$this->kategori.'.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById ($id)
    {
        return $this->db->get_where($this->bahanbantu, ["id" => $id])->row();
    }

    public function report($id_kategori)
    {
        $this->db->select($this->bahanbantu.'.* ,'.$this->kategori.'.nm_kateg')
        ->from($this->bahanbantu)
        ->join($this->kategori, $this->bahanbantu.'.id_kategori = '.$this->kategori.'.id', 'left');
        if ($id_kategori != "") {
            $this->db->where($this->kategori.'.id', $id_kategori);
        }
        $query = $this->db->get_where();
        return $query->result();
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