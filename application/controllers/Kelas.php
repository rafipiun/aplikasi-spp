<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

    
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_level_1();
        $this->load->model('siswa_model');   
    }
    function index()
    {
        $data['kelas'] = $this->siswa_model->get_kelas();
        $this->template->load('template','admin/v_kelas', $data);      
    }
    function add_new(){
        $this->template->load('template','admin/v_add_kelas');
            
        }
    function save(){
        $kelas = $this->input->post('kelas');
        $kompetensi = $this->input->post('kompetensi');
        $this->siswa_model->save_kelas($kelas,$kompetensi);
        redirect('kelas');
      }

    function delete()
    {
        $id = $this->uri->segment(3);
        $this->siswa_model->kelas_delete($id);
        redirect('kelas');
    }
    
    function get_edit()
    {
        $id = $this->uri->segment(3);
        $result = $this->siswa_model->get_kelas_id($id);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id_kelas' => $i['id_kelas'],
                'nama_kelas' => $i['nama_kelas'],
                'kompetensi_keahlian' => $i['kompetensi_keahlian']
            );
           $this->template->load('template','admin/v_edit_kelas', $data);
            
        }
    }

    function update(){
        $id = $this->input->post('id_kelas');
        $kelas = $this->input->post('kelas');
        $kompetensi = $this->input->post('kompetensi');
            $this->siswa_model->kelas_update($id,$kelas,$kompetensi);
        redirect('kelas');
    }

}

/* End of file Controllername.php */
 ?>