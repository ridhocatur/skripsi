<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gluemix_model extends CI_Model {

    private $bahanbantu = 'bahan_bantu';
    private $gluemix = 'gluemix';
    private $dtl_gluemix = 'dtl_gluemix';

    public function rules()
	{
		return [
			[
				'field' => 'tgl',
                'label' => 'Tanggal',
                'rules' => 'required'
            ],
            [
				'field' => 'tipe_glue',
                'label' => 'Jenis Lem',
                'rules' => 'required'
            ],
            [
				'field' => 'shift',
                'label' => 'Shift',
                'rules' => 'required'
            ],
            [
				'field' => 'stok_keluar',
                'label' => 'Stok Keluar',
                'rules' => 'numeric'
            ],
		];
    }

    public function getAll ()
    {
        return $this->db->get($this->gluemix)->result();
    }

    public function getDetail ($id)
    {
        $this->db->select($this->dtl_gluemix.'.* ,'.$this->bahanbantu.'.kd_bahan,'.$this->bahanbantu.'.merk,'.$this->gluemix.'.total,'.$this->gluemix.'.tipe_glue')->from($this->dtl_gluemix)->join($this->bahanbantu, $this->bahanbantu.'.id = '. $this->dtl_gluemix.'.id_bahan', 'left')->join($this->gluemix, $this->gluemix.'.id = '. $this->dtl_gluemix.'.id_gluemix', 'left')->where($this->gluemix.'.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getById ($id)
    {
        return $this->db->get_where($this->gluemix, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = array(
            'tgl' => $post["tgl"],
            'tipe_glue' => $post["tipe_glue"],
            'shift' => $post["shift"],
            'total' => $post["total"],
            'keterangan' => $post["keterangan"]
        );
        $this->db->insert($this->gluemix, $data);

        $get_id = $this->db->insert_id();
        $count = count($post["id_bahan"]);
        $data2 = array();
        for ($i=0 ; $i < $count ; $i++) {
            $data2[] = array(
                'id'=> uniqid(),
                'id_bahan'=> $post["id_bahan"][$i],
                'id_gluemix'=> $get_id,
                'stok_keluar'=> $post["stokkeluar"][$i]
            );
        }
            $this->db->insert_batch($this->dtl_gluemix, $data2);
    }

    public function delete($id)
    {
        return $this->db->delete($this->gluemix, array("id" => $id));
    }
}