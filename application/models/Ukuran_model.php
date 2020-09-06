<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ukuran_model extends CI_Model {

    private $ukuran = 'ukuran';
    private $plywood = 'plywood';

    public $id;
    public $panjang;
    public $lebar;

    public function rules()
	{
		return [
			[
				'field' => 'panjang',
                'label' => 'Panjang',
                'rules' => 'required'
            ],
            [
				'field' => 'lebar',
                'label' => 'Lebar',
                'rules' => 'required'
            ]
		];
    }

    public function count()
    {
        return $this->db->count_all($this->ukuran);
    }

    public function getAll ()
    {
        return $this->db->get($this->ukuran)->result();
    }

    public function getById ($id)
    {
        return $this->db->get_where($this->ukuran, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = array(
            'panjang' => $post["panjang"],
            'lebar' => $post["lebar"]
        );

        return $this->db->insert($this->ukuran, $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = array(
            'id' => $post["id"],
            'panjang' => $post["panjang"],
            'lebar' => $post["lebar"]
        );
        return $this->db->update($this->ukuran, $data, array('id' => $post['id']));
    }

    public function delete($id)
    {
        $this->db->select('id_ukuran')->from($this->plywood)->where('id_ukuran', $id);
        $nilai = $this->db->count_all_results();
        if ($nilai > 0) {
            $this->session->set_flashdata('danger', 'Data Masih Digunakan');
            redirect(site_url('ukuran'));
        } else {
            $this->db->delete($this->ukuran, array("id" => $id));
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
            redirect(site_url('ukuran'));
        }
    }
}