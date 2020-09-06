<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

    private $supplier = 'supplier';
    private $bahan_masuk = 'bahan_masuk';
    private $kayu_masuk = 'kayu_masuk';

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
        $kayu = $this->db->select('id_supplier')->from($this->kayu_masuk)->where('id_supplier', $id)->count_all_results();
        $bahan = $this->db->select('id_supplier')->from($this->bahan_masuk)->where('id_supplier', $id)->count_all_results();
        // var_dump($kayu, $bahan); die();
        if ($kayu > 0) {
            $this->session->set_flashdata('danger', 'Data Masih Digunakan');
            redirect(site_url('supplier'));
        } else if ($bahan > 0) {
            $this->session->set_flashdata('danger', 'Data Masih Digunakan');
            redirect(site_url('supplier'));
        } else {
            $this->db->delete($this->supplier, array("id" => $id));
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
            redirect(site_url('supplier'));
        }
    }
}