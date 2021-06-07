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
        $this->db->select($this->kayulog.'.* ,'.$this->jeniskayu.'.nama,'.$this->jeniskayu.'.kd_jenis')
        ->from($this->kayulog)
        ->join($this->jeniskayu, $this->kayulog.'.id_jenis =.'.$this->jeniskayu.'.id', 'left')
        ->where('id_jenis', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function report($tgl_awal, $tgl_akhir, $id_jenis)
    {
        $sql2 = "";
        $sql  = "SELECT kayu.id, kayu.kd_kayu, jeniskayu.kd_jenis,  jeniskayu.nama, SUM(vinir_masuk.jml_log) AS jml_log, SUM(vinir_masuk.kubik_log) AS kubik_log FROM kayu
        LEFT JOIN jeniskayu ON kayu.id_jenis = jeniskayu.id
        LEFT JOIN vinir_masuk ON kayu.id = vinir_masuk.id_kayu
        WHERE vinir_masuk.tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'";
        if ($id_jenis != "") {
            $sql2 .= " AND kayu.id_jenis = '$id_jenis' GROUP BY vinir_masuk.id_kayu";
        } else {
            $sql2 .= " GROUP BY vinir_masuk.id_kayu";
        }
        // $this->db->select($this->kayulog.'.* ,'.$this->jeniskayu.'.nama')
        // ->from($this->kayulog)
        // ->join($this->jeniskayu, $this->kayulog.'.id_jenis = '.$this->jeniskayu.'.id', 'left');
        // if ($id_jenis != "") {
        //     $this->db->where($this->jeniskayu.'.id', $id_jenis);
        // }
        $query = $this->db->query($sql.$sql2);
        return $query->result();
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