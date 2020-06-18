<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plywood_model extends CI_Model {

    private $vinir = 'vinir';
    private $plywood = 'plywood';
    private $dtl_plywood = 'dtl_plywood';
    private $jeniskayu = 'jeniskayu';
    private $ukuran = 'ukuran';
    private $kayu = 'kayu';

    public function rules()
	{
		return [
			[
				'field' => 'tgl',
                'label' => 'Tanggal Masuk',
                'rules' => 'required'
            ],
            [
				'field' => 'tipe_glue',
                'label' => 'Jenis Lem',
                'rules' => 'required'
            ],
            [
				'field' => 'vinir_keluar',
                'label' => 'Jumlah Vinir Terpakai',
                'rules' => 'numeric|required'
            ],
            [
				'field' => 'jml_pcs',
                'rules' => 'numeric|required'
            ],
            [
				'field' => 'jml_kubik',
                'rules' => 'numeric|required'
            ],
		];
    }

    public function getAll ()
    {
        return $this->db->get($this->plywood)->result();
    }

    public function getJoinAll ()
    {
        $this->db->select($this->plywood.'.* ,'.$this->ukuran.'.panjang, '.$this->ukuran.'.lebar,')
        ->from($this->plywood)
        ->join($this->ukuran, $this->plywood.'.id_ukuran = '.$this->ukuran.'.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getByUkuran($pjg)
    {
        $this->db->select($this->vinir.'.id as vinirid ,'.$this->vinir.'.tebal, '.$this->vinir.'.panjang, '.$this->vinir.'.lebar, '.$this->jeniskayu.'.nama ')
        ->from($this->vinir)
        ->join($this->jeniskayu, $this->vinir.'.id_jenis =.'.$this->jeniskayu.'.id', 'left');
        if ($pjg <= '1900') {
            $this->db->like($this->vinir.'.panjang', '1900');
        } else if ($pjg >= '1900') {
            $this->db->like($this->vinir.'.panjang', '2600');
        }
        $this->db->order_by($this->vinir.'.tebal', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById ($id)
    {
        $this->db->select($this->plywood.'.* ,'.$this->ukuran.'.panjang, '.$this->ukuran.'.lebar,')
        ->from($this->plywood)
        ->join($this->ukuran, $this->plywood.'.id_ukuran = '.$this->ukuran.'.id', 'left')
        ->where($this->plywood.'.id', $id);
        $query = $this->db->get_where();
        return $query->row();
    }

    public function getDetail($id)
    {
        $this->db->select($this->dtl_plywood.'.*, '.$this->vinir.'.lebar as lbrvin, '.$this->vinir.'.panjang as pjgvin, '.$this->vinir.'.tebal as tblvin, '.$this->jeniskayu.'.nama')
        ->from($this->dtl_plywood)
        ->join($this->plywood, $this->dtl_plywood.'.id_plywood = '.$this->plywood.'.id' , 'left')
        ->join($this->vinir, $this->dtl_plywood.'.id_vinir = '.$this->vinir.'.id' , 'left')
        ->join($this->jeniskayu, $this->vinir.'.id_jenis = '.$this->jeniskayu.'.id' , 'left')
        ->where($this->plywood.'.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function report($tgl_awal, $tgl_akhir, $ukuran, $tipeglue)
    {
        $kondisi = "";
        $sql = "SELECT ".$this->plywood.".*, ".$this->ukuran.".panjang, ".$this->ukuran.".lebar
        FROM ".$this->plywood." LEFT JOIN ".$this->ukuran." ON ".$this->plywood.".id_ukuran = ".$this->ukuran.".id";
        if ($tgl_awal == $tgl_akhir) {
            $kondisi .= " WHERE ".$this->plywood.".tgl = '$tgl_awal'";
        } else if ($tgl_awal != $tgl_akhir) {
            $kondisi .= " WHERE ".$this->plywood.".tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'";
        }
        if ($ukuran != "" && $tipeglue != "") {
            if ($kondisi != "") {
                $kondisi .= " AND ".$this->plywood.".id_ukuran = '$ukuran' AND ".$this->plywood.".tipe_glue = '$tipeglue' ORDER BY tgl ASC";
            }
        } else if ($ukuran != "" && $tipeglue == "") {
            if ($kondisi != "") {
                $kondisi .= " AND ".$this->plywood.".id_ukuran = '$ukuran' ORDER BY tgl ASC";
            }
        } else if ($ukuran == "" && $tipeglue != "") {
            if ($kondisi != "") {
                $kondisi .= " AND ".$this->plywood.".tipe_glue = '$tipeglue' ORDER BY tgl ASC";
            }
        }
        $query = $this->db->query($sql.$kondisi);
        return $query->result_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = array(
            'tgl' => $post["tgl"],
            'shift' => $post["shift"],
            'tipe_glue' => $post["tipe_glue"],
            'tipe_ply' => $post["lapisanply"],
            'tebal' => $post["ttl_tebal"],
            'panjang' => $post["pjgs"],
            'lebar' => $post["lbrply"],
            'total_prod' => $post["jml_pcs"],
            'total_kubik' => $post["jml_kubik"],
            'keterangan' => $post["keterangan"]
        );
        $this->db->insert($this->plywood, $data);

        $getId = $this->db->insert_id();
        $count = $post["lapisanply"];
        $data2 = array();
        for ($i=0; $i < $count; $i++) {
            $data2[] = array (
                'id_vinir' => $post["ukurvinir"][$i],
                'id_plywood' => $getId,
                'jenis' => $post["jenis"][$i],
                'stok_keluar' => $post["vinir_keluar"],
                'kubik_keluar' => $post["jml_kubikvinir"][$i]
            );
        }
        $this->db->insert_batch($this->dtl_plywood, $data2);
    }

    public function delete($id)
    {
        return $this->db->delete($this->plywood, array("id" => $id));
    }

}