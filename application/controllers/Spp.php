<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Spp extends CI_Controller {

    
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('siswa_model');   
    }
    function index()
    {
        $data['spp'] = $this->siswa_model->get_spp();
        $this->template->load('template','admin/v_spp', $data);      
    }
    function add_new(){
        $this->template->load('template','admin/v_add_spp');
            
        }
    function save(){
        $tahun = $this->input->post('tahun');
        $tahun = abs($tahun);
        $nominal = $this->input->post('nominal');

        $check_tahun = $this->db->query("SELECT * FROM spp WHERE tahun = '$tahun' ");
            if($check_tahun->num_rows() > 0) {
                echo "<script>
				alert('Tahun sudah ada, Coba ganti tahun !!!');
				window.location='".site_url('spp/add_new')."';
				</script>";
            }else{
                $this->siswa_model->save_spp($tahun,$nominal);
                redirect('spp');
            }
      }

    function delete()
    {
        $id = $this->uri->segment(3);
        $this->siswa_model->spp_delete($id);
        redirect('spp');
    }
    
    function get_edit()
    {
        $id = $this->uri->segment(3);
        $result = $this->siswa_model->get_spp_id($id);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id_spp' => $i['id_spp'],
                'tahun' => $i['tahun'],
                'nominal' => $i['nominal']
            );
           $this->template->load('template','admin/v_edit_spp', $data);
            
        }
    }

    function update(){
        $id = $this->input->post('id_spp');
        $tahun = $this->input->post('tahun');
        $nominal = $this->input->post('nominal');
            $this->siswa_model->spp_update($id,$tahun,$nominal);
        redirect('spp');
    }

}

/* End of file Controllername.php */
 ?>