<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    private $kategori = 'kategori';
    private $bahanbantu = 'bahan_bantu';

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

    public function count()
    {
        return $this->db->count_all($this->kategori);
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
        $this->db->select('id_kategori')->from($this->bahanbantu)->where('id_kategori', $id);
        $nilai = $this->db->count_all_results();
        if ($nilai > 0) {
            $this->session->set_flashdata('danger', 'Data Masih Digunakan');
            redirect(site_url('kategori'));
        } else {
            $this->db->delete($this->kategori, array("id" => $id));
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
            redirect(site_url('kategori'));
        }
        // return $this->db->delete($this->kategori, array("id" => $id));
    }
}