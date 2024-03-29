<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

    private $pegawai = 'pegawai';

    public $id;
    public $nik;
    public $username;
    public $password;
    public $nama;
    public $telp;
    public $gambar = "default.jpg";
    public $level;

    public function rules()
	{
		return [
			[
				'field' => 'nik',
                'label' => 'NIK',
                'rules' => 'required'
            ],
			[
				'field' => 'nama',
                'label' => 'Nama Pegawai',
                'rules' => 'required'
            ],
            [
				'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ]
		];
    }

    public function count()
    {
        return $this->db->count_all($this->pegawai);
    }

    public function getAll ()
    {
        return $this->db->get($this->pegawai)->result();
    }

    public function getById ($id)
    {
        return $this->db->get_where($this->pegawai, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $data = array(
            'id' => uniqid(),
            'nik' => $post["nik"],
            'username' => $post["username"],
            'password' => md5($post["password"]),
            'nama' => $post["nama"],
            'telp' => $post["telp"],
            'level' => $post["level"],
            'gambar' => $this->uploadImage('gambar')
        );

        return $this->db->insert($this->pegawai, $data);
    }

    public function update($id)
    {
        $post = $this->input->post();
            if (!empty($_FILES["gambar"]["name"])) {
                $data = array(
                    'gambar' => $this->updateImage('gambar'),
                    'nik' => $post["nikUbah"],
                    'username' => $post["usernameUbah"],
                    'nama' => $post["namaUbah"],
                    'telp' => $post["telpUbah"],
                    'level' => $post["levelUbah"]
                );
            } else {
                $data = array(
                    'nik' => $post["nikUbah"],
                    'username' => $post["usernameUbah"],
                    'nama' => $post["namaUbah"],
                    'telp' => $post["telpUbah"],
                    'level' => $post["levelUbah"]
                );
            }
        return $this->db->update($this->pegawai, $data, array('id' => $id));
    }

    public function updatePass($id)
    {
        $post = $this->input->post();
        $data = array(
            'password' => md5($post["ubahPass"])
        );

        return $this->db->update($this->pegawai, $data, array('id' => $id));
    }

    public function updateFoto($id)
    {
        $data = array(
            'gambar' => $this->uploadImageProfil('gambar')
        );

        return $this->db->update($this->pegawai, $data, array('id' => $id));
    }

    public function updateProfil($id)
    {
        $post = $this->input->post();
        if (!empty($post["profpass"])) {
            $data = array(
                'nik' => $post["nik"],
                'username' => $post["username"],
                'password' => md5($post["profpass"]),
                'nama' => $post["nama"],
                'telp' => $post["telp"]
            );
        } else {
            $data = array(
                'nik' => $post["nik"],
                'username' => $post["username"],
                'nama' => $post["nama"],
                'telp' => $post["telp"]
            );
        }

        return $this->db->update($this->pegawai, $data, array('id' => $id));
    }

    public function delete($id)
    {
        $this->deleteImage($id);
        return $this->db->delete($this->pegawai, array("id" => $id));
    }

    private function uploadImage()
    {
        $config['upload_path'] = './upload/pegawai/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = str_replace(' ','',$this->input->post('nama')).'_'.$this->input->post('nik');
        $config['overwrite'] = true;
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
        // print_r($this->upload->display_errors());
    }

    private function updateImage()
    {
        $config['upload_path'] = './upload/pegawai/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = str_replace(' ','',$this->input->post('namaUbah')).'_'.$this->input->post('nikUbah');
        $config['overwrite'] = true;
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
        // print_r($this->upload->display_errors());
    }

    private function uploadImageProfil()
    {
        $config['upload_path'] = './upload/pegawai/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = str_replace(' ','',$this->fungsi->user_login()->nama).'_'.$this->fungsi->user_login()->nik;
        $config['overwrite'] = true;
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
        // print_r($this->upload->display_errors());
    }

    private function deleteImage($id)
    {
        $pegawai = $this->getById($id);
        if ($pegawai->gambar != "default.jpg") {
            $filename = explode(".", $pegawai->gambar)[0];
            return array_map('unlink', glob(FCPATH."upload/pegawai/$filename.*"));
        }
    }

    //fungsi check login
    public function login($post)
    {
        $this->db->from($this->pegawai)
        ->where('username', $post['username'])
        ->where('password', md5($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function _updateLastLogin($id){
        $sql = "UPDATE {$this->pegawai} SET last_login=now() WHERE id='{$id}'";
        $this->db->query($sql);
    }
}