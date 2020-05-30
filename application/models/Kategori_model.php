<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    private $kategori = 'kategori';

    public $id;
    public $nm_kateg;
    public $keterangan;

    public function rules()
	{
		return [
			[
				'field' => 'nm_kateg',
                'label' => 'Nama Kategori',
                'rules' => 'required'
            ]
		];
    }

    public function getAll ()
    {
        return $this->db->get($this->kategori)->result();
    }

    public function getById ($id)
    {
        return $this->db->get_where($this->kategori, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = array(
            'id' => uniqid(),
            'nm_kateg' => $post["nm_kateg"],
            'keterangan' => $post["keterangan"]
        );

        return $this->db->insert($this->kategori, $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = array(
            'id' => $post["id"],
            'nm_kateg' => $post["nm_kateg"],
            'keterangan' => $post["keterangan"]
        );
        return $this->db->update($this->kategori, $data, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->kategori, array("id" => $id));
    }
}