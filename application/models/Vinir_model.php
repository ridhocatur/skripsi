<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vinir_model extends CI_Model {

    private $vinir = 'vinir';
    private $jeniskayu = 'jeniskayu';
    private $ukuran = 'ukuran';

    public function rules()
	{
		return [
			[
				'field' => 'id_jenis',
                'label' => 'Jenis Kayu',
                'rules' => 'required'
            ],
            [
				'field' => 'tebal',
                'label' => 'Ukuran',
                'rules' => 'required'
            ],
            [
				'field' => 'kubikasi',
                'label' => 'Kubikasi',
                'rules' => 'numeric|required'
            ],
            [
				'field' => 'stok',
                'label' => 'Stok',
                'rules' => 'numeric|required'
            ],
		];
    }

    public function rulesEdit()
	{
		return [
            [
				'field' => 'tebal',
                'label' => 'Ukuran',
                'rules' => 'required'
            ],
            [
				'field' => 'kubikasi',
                'label' => 'Kubikasi',
                'rules' => 'numeric|required'
            ],
            [
				'field' => 'stok',
                'label' => 'Stok',
                'rules' => 'numeric|required'
            ],
		];
    }

    public function getAll ()
    {
        return $this->db->get($this->vinir)->result();
    }

    public function getJoinAll ()
    {
        $this->db->select($this->vinir.'.* ,'.$this->jeniskayu.'.nama,'.$this->jeniskayu.'.kd_jenis,')
        ->from($this->vinir)
        ->join($this->jeniskayu, $this->vinir.'.id_jenis =.'.$this->jeniskayu.'.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function forChart($id, $pjg)
    { //, CONCAT_WS('x',tebal,panjang,lebar) as ukuran
        $this->db->select("IFNULL(SUM(kubikasi),0) as kubikasi")
        ->from($this->vinir)
        ->where("id_jenis = '$id' ")
        ->where("panjang = '$pjg' ")
        ->order_by("id_jenis");
        $query = $this->db->get();
        return $query->result();
    }

    public function getById ($id)
    {
        return $this->db->get_where($this->vinir, ["id" => $id])->row();
    }

    public function getByJenis ($id)
    {
        $this->db->select($this->vinir.'.id as vinirid ,'.$this->vinir.'.tebal, '.$this->vinir.'.panjang, '.$this->vinir.'.lebar, '.$this->jeniskayu.'.nama,'.$this->jeniskayu.'.kd_jenis')
        ->from($this->vinir)
        ->join($this->jeniskayu, $this->vinir.'.id_jenis =.'.$this->jeniskayu.'.id', 'left')
        ->where('id_jenis', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getTebal ($id)
    {
        $this->db->select($this->vinir.'.id as vinirid ,'.$this->vinir.'.tebal')
        ->from($this->vinir)
        ->join($this->jeniskayu, $this->vinir.'.id_jenis =.'.$this->jeniskayu.'.id', 'left')
        ->where($this->vinir.'.id', $id);
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
        $this->db->where($this->vinir.'.stok >', 0)
        ->order_by($this->vinir.'.id_jenis', 'ASC')
        ->order_by($this->vinir.'.tebal', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function report($tgl_awal, $tgl_akhir, $ukuran,$id_jenis)
    {
        $kondisi = "";
        // $sql = "SELECT ".$this->vinir.".*, ".$this->jeniskayu.".nama
        // FROM ".$this->vinir."
        // LEFT JOIN ".$this->jeniskayu." ON ".$this->vinir.".id_jenis = ".$this->jeniskayu.".id" ;
        // if ($ukuran != "" && $id_jenis != "") {
        //     $kondisi .= " WHERE ".$this->vinir.".panjang = '$ukuran' AND ".$this->jeniskayu.".id = '$id_jenis' AND ".$this->vinir.".stok > 0";
        // } else if ($ukuran == "" && $id_jenis != "") {
        //     $kondisi .= " WHERE ".$this->jeniskayu.".id = '$id_jenis' AND ".$this->vinir.".stok > 0";
        // } else if ($ukuran != "" && $id_jenis == "") {
        //     $kondisi .= " WHERE ".$this->vinir.".panjang = '$ukuran' AND ".$this->vinir.".stok > 0";
        // } else {
        //     $kondisi .= " WHERE ".$this->vinir.".stok > 0";
        // }
        $sql = "SELECT vinir.tebal, vinir.id, vinir.panjang, vinir.lebar, jeniskayu.nama, SUM(dtl_plywood.stok_keluar) AS stok_keluar, SUM(dtl_plywood.kubik_keluar) AS kubik_keluar FROM vinir
                LEFT JOIN jeniskayu ON vinir.id_jenis = jeniskayu.id
                LEFT JOIN dtl_plywood ON vinir.id = dtl_plywood.id_vinir
                LEFT JOIN plywood ON plywood.id = dtl_plywood.id_plywood
                WHERE plywood.tgl BETWEEN '$tgl_awal' AND '$tgl_akhir'";
        if ($ukuran != "" && $id_jenis != "") {
            $kondisi .= " AND ".$this->vinir.".panjang = '$ukuran' AND ".$this->jeniskayu.".id = '$id_jenis' AND stok_keluar > 0 GROUP BY dtl_plywood.id_vinir";
        } else if ($ukuran == "" && $id_jenis != "") {
            $kondisi .= " AND ".$this->jeniskayu.".id = '$id_jenis' AND stok_keluar > 0 GROUP BY dtl_plywood.id_vinir";
        } else if ($ukuran != "" && $id_jenis == "") {
            $kondisi .= " AND ".$this->vinir.".panjang = '$ukuran' AND stok_keluar > 0 GROUP BY dtl_plywood.id_vinir";
        } else {
            $kondisi .= " AND stok_keluar > 0 GROUP BY dtl_plywood.id_vinir";
        }
        $query = $this->db->query($sql.$kondisi);
        return $query->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = array(
            'id' => uniqid(),
            'id_jenis' => $post["id_jenis"],
            'tebal' => str_replace(",",".",$post["tebal"]),
            'panjang' => $post["pjg"],
            'lebar' => $post["lbr"],
            'stok' => $post["stok"],
            'kubikasi' => $post["kubikasi"],
            'keterangan' => $post["keterangan"]
        );
        $a = $this->db->select('id_jenis, panjang, lebar')
            ->where('id_jenis', $post["id_jenis"])
            ->where('tebal', $post["tebal"])
            ->where('panjang', $post["pjg"])
            ->where('lebar', $post["lbr"]);
        $cek = $a->get($this->vinir)->row_array();

        if ($cek["id_jenis"] == $post["id_jenis"]) {
            if ($cek["tebal"] == $post["tebal"] || $cek["panjang"] == $post["pjg"] || $cek["lebar"] == $post["lbr"]) {
                $this->session->set_flashdata('danger', 'Data Sudah Ada');
                redirect(site_url('vinir'));
            } else {
                $this->db->insert($this->vinir, $data);
            }
        } else {
            $this->db->insert($this->vinir, $data);
        }
    }

    public function update()
    {
        $post = $this->input->post();
        $data = array(
            'id' => $post["id"],
            'tebal' => str_replace(",",".",$post["tebal"]),
            'stok' => $post["stok"],
            'kubikasi' => $post["kubikasi"],
            'keterangan' => $post["keterangan"]
        );

        return $this->db->update($this->vinir, $data, array('id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->vinir, array("id" => $id));
    }

}