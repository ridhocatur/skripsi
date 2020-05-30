<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jeniskayu_model extends CI_Model {

    private $jeniskayu = 'jeniskayu';

    public $id;
    public $kd_jenis;
    public $nama;
    public $keterangan;

    public function rules()
	{
		return [
			[
				'field' => 'kd_jenis',
                'label' => 'Kode',
                'rules' => 'required'
            ],
            [
				'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ]
		];
    }

    public function getAll ()
    {
        return $this->db->get($this->jeniskayu)->result();
    }

    public function getById ($id)
    {
        return $this->db->get_where($this->jeniskayu, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = array(
            'id' => uniqid(),   
            'kd_jenis' => $post["kd_jenis"],
            'nama' => $post["nama"],
            'keterangan' => $post["keterangan"]
        );

        return $this->db->insert($this->jeniskayu, $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = array(
            'id' => $post["id"],
            'kd_jenis' => $post["kd_jenis"],
            'nama' => $post["nama"],
            'keterangan' => $post["keterangan"]
        );
        return $this->db->update($this->jeniskayu, $data, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->jeniskayu, array("id" => $id));
    }
}