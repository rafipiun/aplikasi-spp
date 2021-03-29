<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_level_1();
        $this->load->model('user_m');   
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->session->userdata('level') == 1){
            $data['row'] = $this->user_m->get();
            $this->template->load('template','user/user_data',$data);
        }else{
            echo "<center><h1>Anda Tidak Berhak Mengakses Halaman Ini !!!</h1></center>";
        }
    }

    public function add()
    {
        if($this->session->userdata('level') == 1){
            $this->form_validation->set_rules('fullname','Nama','required');
            $this->form_validation->set_rules('username','usernama','required|min_length[5]|is_unique[petugas.username]');
            $this->form_validation->set_rules('password','Password','required|min_length[5]');
            $this->form_validation->set_rules('passconf','Konfirmasi Password','required|matches[password]',
                array('matches' => '%s tidak sesuai dengan password')
        );
            $this->form_validation->set_rules('level','Level','required');
            $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
            $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
            $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan ganti');

            $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

            if ($this->form_validation->run() == FALSE){
            $this->template->load('template','user/user_form_add');
            }else{
                $post = $this->input->post(null, TRUE);
                $this->user_m->add($post);
                if($this->db->affected_rows() > 0){
                    echo "<script>alert('Data berhasil disimpan');</script>";
                }
                echo "<script>window.location='".site_url('user')."';</script>"; 
            }
        }else{
            echo "<center><h1>Anda Tidak Berhak Mengakses Halaman Ini !!!</h1></center>";
        }
    }

    public function edit($id)
    {
        if($this->session->userdata('level') == 1){
            $this->form_validation->set_rules('fullname','Nama','required');
            $this->form_validation->set_rules('username','usernama','required|min_length[5]|callback_username_check');
            if($this->input->post('password')) {
                $this->form_validation->set_rules('password','Password','min_length[5]');
                $this->form_validation->set_rules('passconf','Konfirmasi Password','matches[password]',
                array('matches' => '%s tidak sesuai dengan password')
        );
            }
            if ($this->input->post('passconf')){
                $this->form_validation->set_rules('passconf','Konfirmasi Password','matches[password]',
                array('matches' => '%s tidak sesuai dengan password')
                );
            }
            $this->form_validation->set_rules('level','Level','required');
            $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
            $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
            $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan ganti');

            $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

            if ($this->form_validation->run() == FALSE){
                $query = $this->user_m->get($id);
                if($query->num_rows() > 0){
                    $data['row'] = $query->row();
                    $this->template->load('template','user/user_form_edit', $data);
                }else{
                    echo "<script>alert('Data berhasil disimpan');</script>";
                    echo "<script>window.location='".site_url('user')."';</script>"; 
                }
            }else{
                $post = $this->input->post(null, TRUE);
                $this->user_m->edit($post);
                if($this->db->affected_rows() > 0){
                    echo "<script>alert('Data berhasil disimpan');</script>";
                }
                echo "<script>window.location='".site_url('user')."';</script>"; 
            }
        }else{
            echo "<center><h1>Anda Tidak Berhak Mengakses Halaman Ini !!!</h1></center>";
        }
    }

    public function username_check() {
        if($this->session->userdata('level') == 1){
            $post = $this->input->post(null,TRUE);
            $query = $this->db->query("SELECT * FROM petugas WHERE username = '$post[username]' AND id_petugas != '$post[id_petugas]'");
            if($query->num_rows() > 0) {
                $this->form_validation->set_message('username_check', '{field} ini sudah dipakai, silahkan ganti');
            }else{
                return TRUE;
            }
        }else{
            echo "<center><h1>Anda Tidak Berhak Mengakses Halaman Ini !!!</h1></center>";
        }
    }

    public function del()
    {
        if($this->session->userdata('level') == 1){
            $id = $this->input->post('id_petugas');
            $this->user_m->del($id);

            if($this->db->affected_rows() > 0){
                echo "<script>alert('Data berhasil dihapus');</script>";
            }
            echo "<script>window.location='".site_url('user')."';</script>";
        }else{
            echo "<center><h1>Anda Tidak Berhak Mengakses Halaman Ini !!!</h1></center>";
        } 
    }
    
}