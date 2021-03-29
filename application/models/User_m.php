<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->where('username',$post['username']);  
        $this->db->where('password',sha1($post['password'])); 
        $query = $this->db->get();
        return $query;      
    }
    public function login_siswa($post)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('nis',$post['username']);  
        $this->db->where('password',md5($post['password'])); 
        $query_siswa = $this->db->get();
        return $query_siswa;      
    }

    public function get($id = null)
    {
        $this->db->from('petugas');
        if($id != null){
            $this->db->where('id_petugas', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_siswa($id = null)
    {
        $this->db->from('siswa');
        if($id != null){
            $this->db->where('nisn', $id);
        }
        $query = $this->db->get();
        return $query;
    }
// ------------------------------------------------
    public function add($post)
    {
        $params['nama_petugas'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['level'] = $post['level'];
        $this->db->insert('petugas',$params);
    }

    public function edit($post)
    {
        $params['nama_petugas'] = $post['fullname'];
        $params['username'] = $post['username'];
        if(!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['level'] = $post['level'];
        $this->db->where('id_petugas', $post['id_petugas']);
        $this->db->update('petugas',$params);   
    }

    public function del($id)
    {
        $this->db->where('id_petugas',$id);
        $this->db->delete('petugas');
    }
}