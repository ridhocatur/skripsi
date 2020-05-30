<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ukuran_model extends CI_Model {

    private $ukuran = 'ukuran';

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
        return $this->db->delete($this->ukuran, array("id" => $id));
    }
}