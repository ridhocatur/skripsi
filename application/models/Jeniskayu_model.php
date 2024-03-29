<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jeniskayu_model extends CI_Model {

    private $jeniskayu = 'jeniskayu';
    private $vinir = 'vinir';
    private $kayu = 'kayu';

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

    public function count()
    {
        return $this->db->count_all($this->jeniskayu);
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
        $vinir = $this->db->select('id_jenis')->from($this->vinir)->where('id_jenis', $id)->count_all_results();
        $kayu = $this->db->select('id_jenis')->from($this->kayu)->where('id_jenis', $id)->count_all_results();
        if ($vinir > 0 && $kayu > 0) {
            $this->session->set_flashdata('danger', 'Data Masih Digunakan');
            redirect(site_url('jeniskayu'));
        } else {
            $this->db->delete($this->jeniskayu, array("id" => $id));
			$this->session->set_flashdata('info', 'Berhasil Di Hapus');
            redirect(site_url('jeniskayu'));
        }
    }
}