<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kayumasuk_model extends CI_Model {

    private $kayulog = 'kayu';
    private $kayu_masuk = 'kayu_masuk';
    private $dtl_kayu_masuk = 'dtl_kayu_masuk';
    private $supplier = 'supplier';

    public function rules()
	{
		return [
			[
				'field' => 'invoice',
                'label' => 'Invoice',
                'rules' => 'required'
            ],
            [
				'field' => 'id_supplier',
                'label' => 'Supplier',
                'rules' => 'required'
            ],
            [
				'field' => 'total_kubik',
                'label' => 'Total Kubikasi',
                'rules' => 'numeric'
            ],
            [
				'field' => 'total_stok',
                'label' => 'Total Stok',
                'rules' => 'numeric'
            ],
		];
    }

    public function getAll ()
    {
        return $this->db->get($this->kayu_masuk)->result();
    }

    public function getJoinAll ()
    {
        $this->db->select($this->kayu_masuk.'.* ,'.$this->supplier.'.nm_sup')
        ->from($this->kayu_masuk)
        ->join($this->supplier, $this->kayu_masuk.'.id_supplier =.'.$this->supplier.'.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById ($id)
    {
        $this->db->select($this->kayu_masuk.'.* ,'.$this->supplier.'.nm_sup')
        ->from($this->kayu_masuk)
        ->join($this->supplier, $this->kayu_masuk.'.id_supplier = '. $this->supplier.'.id', 'left')
        ->where($this->kayu_masuk.'.id', $id);
        $query = $this->db->get();
        return $query->row();
        // return $this->db->get_where($this->kayu_masuk, ["id" => $id])->row();
    }

    public function getDetail ($id)
    {
        $this->db->select($this->dtl_kayu_masuk.'.* ,'.$this->kayulog.'.kd_kayu, '.$this->kayu_masuk.'.invoice, '.$this->kayu_masuk.'.tgl')
        ->from($this->dtl_kayu_masuk)
        ->join($this->kayulog, $this->kayulog.'.id = '. $this->dtl_kayu_masuk.'.id_kayu', 'left')
        ->join($this->kayu_masuk, $this->kayu_masuk.'.id = '. $this->dtl_kayu_masuk.'.id_masuk', 'left')
        ->where($this->kayu_masuk.'.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = array(
            'tgl' => $post["tgl"],
            'invoice' => $post["invoice"],
            'id_supplier' => $post["id_supplier"],
            'jml_stok' => $post["total_stok"],
            'jml_kubik' => $post["total_kubik"],
            'keterangan' => $post["keterangan"]
        );
        $this->db->insert($this->kayu_masuk, $data);

        $get_id = $this->db->insert_id();
        $count = count($post["id_kayu"]);
        $data2 = array();
        for ($i=0 ; $i < $count ; $i++) {
            $data2[] = array(
                'id_kayu'=> $post["id_kayu"][$i],
                'id_masuk'=> $get_id,
                'panjang'=> $post["panjang"][$i],
                'diameter1'=> $post["diameter1"][$i],
                'diameter2'=> $post["diameter2"][$i],
                'stok_masuk'=> $post["jmlstokkayu"][$i],
                'kubik_masuk'=> $post["jmlkubikkayu"][$i]
            );
        }
            $this->db->insert_batch($this->dtl_kayu_masuk, $data2);
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
        return $this->db->delete($this->kayu_masuk, array("id" => $id));
    }

}