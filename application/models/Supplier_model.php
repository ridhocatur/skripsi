<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

    private $supplier = 'supplier';

    public $id;
    public $nm_sup;
    public $sup;
    public $alamat;
    public $email;
    public $telp;
    public $keterangan;

    public function rules()
	{
		return [
			[
				'field' => 'nm_sup',
                'label' => 'Nama Supplier',
                'rules' => 'required'
            ],
            [
				'field' => 'sup',
                'label' => 'Menyuplai',
                'rules' => 'required'
            ],
            [
				'field' => 'telp',
                'label' => 'Telepon',
                'rules' => 'numeric'
            ],
		];
    }

    public function count()
    {
        return $this->db->count_all($this->supplier);
    }

    public function getAll ()
    {
        return $this->db->get($this->supplier)->result();
    }

    public function getById ($id)
    {
        return $this->db->get_where($this->supplier, ["id" => $id])->row();
    }

    public function SupBahan ()
    {
        $this->db->select('*')->from($this->supplier)->like('sup' , 'bahan');
        $query = $this->db->get();
        return $query->result();
    }

    public function SupKayu ()
    {
        $this->db->select('*')->from($this->supplier)->like('sup' , 'kayu');
        $query = $this->db->get();
        return $query->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = array(
            'id' => uniqid(),
            'nm_sup' => $post["nm_sup"],
            'sup' => $post["sup"],
            'alamat' => $post["alamat"],
            'email' => $post["email"],
            'telp' => $post["telp"],
            'keterangan' => $post["keterangan"]
        );

        return $this->db->insert($this->supplier, $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = array(
            'id' => $post["id"],
            'nm_sup' => $post["nm_sup"],
            'sup' => $post["sup"],
            'alamat' => $post["alamat"],
            'email' => $post["email"],
            'telp' => $post["telp"],
            'keterangan' => $post["keterangan"]
        );
        return $this->db->update($this->supplier, $data, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->supplier, array("id" => $id));
    }
}