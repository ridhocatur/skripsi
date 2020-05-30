<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kayulog_model extends CI_Model {

    private $kayulog = 'kayu';
    private $jeniskayu = 'jeniskayu';

    public function rules()
	{
		return [
			[
				'field' => 'kd_kayu',
                'label' => 'Kode Log',
                'rules' => 'required'
            ],
            [
				'field' => 'kd_jenis',
                'label' => 'Jenis Kayu',
                'rules' => 'required'
            ],
            [
				'field' => 'kubikasi',
                'label' => 'Kubikasi',
                'rules' => 'numeric'
            ],
            [
				'field' => 'stok',
                'label' => 'Stok',
                'rules' => 'numeric'
            ],
		];
    }

    public function getAll ()
    {
        return $this->db->get($this->kayulog)->result();
    }

    public function getJoinAll ()
    {
        $this->db->select($this->kayulog.'.* ,'.$this->jeniskayu.'.nama,'.$this->jeniskayu.'.kd_jenis')->from($this->kayulog)->join($this->jeniskayu, $this->kayulog.'.id_jenis =.'.$this->jeniskayu.'.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById ($id)
    {
        return $this->db->get_where($this->kayulog, ["id" => $id])->row();
    }

    public function getByJenis ($id)
    {
        $this->db->select($this->kayulog.'.id as kayuid ,'.$this->jeniskayu.'.nama,'.$this->jeniskayu.'.kd_jenis')
        ->from($this->kayulog)
        ->join($this->jeniskayu, $this->kayulog.'.id_jenis =.'.$this->jeniskayu.'.id', 'left')
        ->where('id_jenis', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = array(
            'id' => uniqid(),
            'kd_kayu' => $post["kd_kayu"],
            'id_jenis' => $post["kd_jenis"],
            'stok' => $post["stok"],
            'kubikasi' => $post["kubikasi"],
            'keterangan' => $post["keterangan"]
        );

        return $this->db->insert($this->kayulog, $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = array(
            'id' => $post["id"],
            'kd_kayu' => $post["kd_kayu"],
            'id_jenis' => $post["kd_jenis"],
            'stok' => $post["stok"],
            'kubikasi' => $post["kubikasi"],
            'keterangan' => $post["keterangan"]
        );
        return $this->db->update($this->kayulog, $data, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->kayulog, array("id" => $id));
    }

}