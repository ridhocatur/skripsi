<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanmasuk_model extends CI_Model {

    private $bahanbantu = 'bahan_bantu';
    private $bahanmasuk = 'bahan_masuk';
    private $supplier = 'supplier';

    public $id;
    public $invoice;
    public $tgl;
    public $id_bahan;
    public $nm_bahan;
    public $stok_masuk;
    public $keterangan;
    public $id_supplier;

    public function rules()
	{
		return [
			[
				'field' => 'invoice',
                'label' => 'Invoice',
                'rules' => 'required'
            ],
			[
				'field' => 'tgl',
                'label' => 'Tgl. Masuk',
                'rules' => 'required'
            ],
			[
				'field' => 'id_bahan',
                'label' => 'Jenis Bahan',
                'rules' => 'required'
            ],
			[
				'field' => 'nm_bahan',
                'label' => 'Nama Bahan',
                'rules' => 'required'
            ],
			[
				'field' => 'stok_masuk',
                'label' => 'Stok Masuk',
                'rules' => 'required'
            ],
			[
				'field' => 'id_supplier',
                'label' => 'Supplier',
                'rules' => 'required'
            ],
		];
    }

    public function getAll ()
    {
        return $this->db->get($this->bahanmasuk)->result();
    }

    public function getJoinAll ()
    {
        $this->db->select($this->bahanmasuk.'.* ,'.$this->supplier.'.nm_sup ,'.$this->bahanbantu.'.kd_bahan ,'.$this->bahanbantu.'.merk')->from($this->bahanmasuk);
        $this->db->join($this->supplier, $this->bahanmasuk.'.id_supplier = '.$this->supplier.'.id', 'left');
        $this->db->join($this->bahanbantu, $this->bahanmasuk.'.id_bahan = '.$this->bahanbantu.'.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById ($id)
    {
        return $this->db->get_where($this->bahanmasuk, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = array(
            'id' => uniqid(),
            'invoice' => $post["invoice"],
            'tgl' => $post["tgl"],
            'id_bahan' => $post["id_bahan"],
            'nama' => $post["nm_bahan"],
            'stok_masuk' => $post["stok_masuk"],
            'keterangan' => $post["keterangan"],
            'id_supplier' => $post["id_supplier"]
        );

        return $this->db->insert($this->bahanmasuk, $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = array(
            'id' => $post["id"],
            'invoice' => $post["invoice"],
            'tgl' => $post["tgl"],
            'id_bahan' => $post["id_bahan"],
            'nama' => $post["nm_bahan"],
            'stok_masuk' => $post["stok_masuk"],
            'keterangan' => $post["keterangan"],
            'id_supplier' => $post["id_supplier"]
        );
        return $this->db->update($this->bahanmasuk, $data, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->bahanmasuk, array("id" => $id));
    }
}