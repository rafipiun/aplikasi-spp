<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    
    function __construct()
    {
        parent::__construct();
        check_level_1();
        $this->load->model('siswa_model');   
    }
    function index()
    {
        $data['siswa'] = $this->siswa_model->get_siswa();
       // $data['kelas'] = $this->siswa_model->get_kelas();
        $this->template->load('template','admin/v_siswa', $data);      
    }
    function add_new(){
        $data['data_kelas']=$this->siswa_model->get_kelas();
        $data['data_spp']=$this->siswa_model->get_spp();
        $this->template->load('template','admin/v_add_siswa', $data);
            
        }
    function save(){
        $nisn = $this->input->post('nisn');
        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $id_spp = $this->input->post('id_spp');
        $id_kelas = $this->input->post('id_kelas');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');
        $password = $this->input->post('password');
        $this->siswa_model->save_siswa($nisn,$nis,$nama,$id_spp,$id_kelas,$alamat,$no_telp,$password);
        redirect('siswa');
      }

    function delete()
    {
        $id = $this->uri->segment(3);
        $this->product_model->delete($id);
        redirect('product');
    }
    
    function get_edit()
    {
        $id = $this->uri->segment(3);
        $result = $this->siswa_model->get_siswa_id($id);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'nisn' => $i['nisn'],
                'nis' => $i['nis'],
                'nama' => $i['nama'],
                'id_spp' => $i['id_spp'],
                'id_kelas' => $i['id_kelas'],
                'alamat' => $i['alamat'],
                'no_telp' => $i['no_telp'],
                'password' => $i['password'],
                'nama_kelas' => $i['nama_kelas']
            );
            $data['data_kelas']=$this->siswa_model->get_kelas();
           $this->template->load('template','admin/v_edit_siswa', $data);
            
        }
    }

    function update(){
        $nisn = $this->input->post('nisn');
        $nis = $this->input->post('nis');
        $nama = $this->input->post('nama');
        $id_spp = $this->input->post('id_spp');
        $id_kelas = $this->input->post('id_kelas');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');
        $password = $this->input->post('password');
        
        $this->siswa_model->siswa_update($nisn,$nis,$nama,$id_spp,$id_kelas,$password,$alamat,$no_telp);
        redirect('siswa');
    }

}

/* End of file Controllername.php */
 ?>