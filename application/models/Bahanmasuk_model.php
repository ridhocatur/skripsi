<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanmasuk_model extends CI_Model {

    private $bahanbantu = 'bahan_bantu';
    private $bahanmasuk = 'bahan_masuk';
    private $supplier = 'supplier';

    public $id;
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
        $this->db->select($this->bahanmasuk.'.* ,'.$this->supplier.'.nm_sup ,'.$this->bahanbantu.'.kd_bahan ,')->from($this->bahanmasuk);
        $this->db->join($this->supplier, $this->bahanmasuk.'.id_supplier = '.$this->supplier.'.id', 'left');
        $this->db->join($this->bahanbantu, $this->bahanmasuk.'.id_bahan = '.$this->bahanbantu.'.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById ($id)
    {
        return $this->db->get_where($this->bahanmasuk, ["id" => $id])->row();
    }

    public function idBahan($id)
    {
        $sql = "SELECT SUM(stok_masuk) AS masuk FROM bahan_masuk WHERE id_bahan = '$id' GROUP BY id_bahan";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function report($tglawal,$tglakhir,$supplier)
    {
        $kondisi = "";
        $sql = "SELECT ".$this->bahanmasuk.".* ,".$this->supplier.".nm_sup
        FROM ".$this->bahanmasuk."
        LEFT JOIN ".$this->supplier." ON ".$this->bahanmasuk.".id_supplier = ".$this->supplier.".id
        LEFT JOIN ".$this->bahanbantu." ON ".$this->bahanmasuk.".id_bahan = ".$this->bahanbantu.".id" ;
        if ($tglawal != "" && $tglakhir == "") {
            $kondisi .= " WHERE ".$this->bahanmasuk.".tgl = '$tglawal'";
        } else if ($tglawal == "" && $tglakhir != "") {
            $kondisi .= " WHERE ".$this->bahanmasuk.".tgl = '$tglakhir'";
        } else if ($tglawal != "" && $tglakhir != "") {
            $kondisi .= " WHERE ".$this->bahanmasuk.".tgl BETWEEN '$tglawal' AND '$tglakhir'";
        }
        if ($supplier != "") {
            if ($kondisi != "") {
                $kondisi .= " AND ".$this->bahanmasuk.".id_supplier = '$supplier' ORDER BY tgl ASC";
            } else {
                $kondisi .= " WHERE ".$this->bahanmasuk.".id_supplier = '$supplier' ORDER BY tgl ASC";
            }
        }
        $query = $this->db->query($sql.$kondisi);
        return $query->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $id_bahan = $post["id_bahan"];
        $query = $this->db->query("SELECT ".$this->bahanbantu.".stok FROM ".$this->bahanbantu." WHERE ".$this->bahanbantu.".id = '$id_bahan'");
        $stokAwal = $query->row('stok');
        $data = array(
            'id' => uniqid(),
            'tgl' => $post["tgl"],
            'id_bahan' => $post["id_bahan"],
            'nama' => $post["nm_bahan"],
            'stok_awal' => $stokAwal,
            'stok_masuk' => $post["stok_masuk"],
            'keterangan' => $post["keterangan"],
            'id_supplier' => $post["id_supplier"]
        );

        return $this->db->insert($this->bahanmasuk, $data);
    }

    public function update($id)
    {
        $post = $this->input->post();
        $data = array(
            'tgl' => $post["tgl"],
            'id_bahan' => $post["id_bahan"],
            'nama' => $post["nm_bahan"],
            'stok_masuk' => $post["stok_masuk"],
            'keterangan' => $post["keterangan"],
            'id_supplier' => $post["id_supplier"]
        );
        return $this->db->update($this->bahanmasuk, $data, array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->bahanmasuk, array("id" => $id));
    }
}