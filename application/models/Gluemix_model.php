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
        $this->db->select($this->dtl_gluemix.'.* ,'.$this->bahanbantu.'.kd_bahan,'.$this->gluemix.'.total,'.$this->gluemix.'.tipe_glue')->from($this->dtl_gluemix)->join($this->bahanbantu, $this->bahanbantu.'.id = '. $this->dtl_gluemix.'.id_bahan', 'left')->join($this->gluemix, $this->gluemix.'.id = '. $this->dtl_gluemix.'.id_gluemix', 'left')->where($this->gluemix.'.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getById ($id)
    {
        return $this->db->get_where($this->gluemix, ["id" => $id])->row();
    }

    public function report($tgl_awal, $tgl_akhir, $shift, $tipelem)
    {
        $kondisi = "";
        $sql = "SELECT ".$this->gluemix.".* FROM ".$this->gluemix;
        if ($tgl_awal == $tgl_akhir) {
            $kondisi .= " WHERE tgl = '$tgl_awal'";
        } else if ($tgl_awal != $tgl_akhir) {
            $kondisi .= " WHERE tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'";
        }
        if ($shift != "" && $tipelem != "") {
            $kondisi .= " AND shift = '$shift' AND tipe_lem = '$tipelem' ORDER BY tgl ASC";
        } else if ($shift == "" && $tipelem != "") {
            $kondisi .= " AND tipe_lem = '$tipelem' ORDER BY tgl ASC";
        } else if ($shift != "" && $tipelem == "") {
            $kondisi .= " AND shift = '$shift' ORDER BY tgl ASC";
        }
        $query = $this->db->query($sql.$kondisi);
        return $query->result_array();
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