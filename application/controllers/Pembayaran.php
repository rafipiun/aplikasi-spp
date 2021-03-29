<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_level_1_or_2();
        $this->load->model('pembayaran_model');   
        $this->load->model('siswa_model');   
    }
    function index()
    {   
        if($this->session->userdata('level') != 1){
            $data['pembayaran'] = $this->pembayaran_model->get_pembayaran_petugas();
            $this->template->load('template','admin/v_pembayaran', $data);
        }else{
            $data['pembayaran'] = $this->pembayaran_model->get_pembayaran();
            $this->template->load('template','admin/v_pembayaran', $data);
        }
    }
    function add_new(){
        $data['data_siswa']=$this->siswa_model->get_siswa();
        $data['data_spp']=$this->siswa_model->get_spp();
        $this->template->load('template','admin/v_add_pembayaran', $data);
            
        }
    function save(){
        $id_petugas = $this->input->post('id_petugas');
        $nisn = $this->input->post('nisn');
        $tgl_bayar = $this->input->post('tgl_bayar');
        $bln_dibayar = $this->input->post('bulan');
        $thn_dibayar = $this->input->post('tahun');
        $jml_dibayar = $this->input->post('jml');
        
        $id_spp = $this->pembayaran_model->get_id_spp($thn_dibayar);
        foreach($id_spp->result() as $d){
            $id_spp = $d->id_spp;
        }

        $this->pembayaran_model->save_pembayaran($id_petugas,$nisn,$tgl_bayar,$bln_dibayar,$thn_dibayar,$id_spp,$jml_dibayar);
        echo "<script>
				alert('Transaksi berhasil dibuat');
				window.location='".site_url('pembayaran')."';
				</script>";
      }

    function delete()
    {
        check_level_1();
        $id = $this->uri->segment(3);
        $this->pembayaran_model->pembayaran_delete($id);
        redirect('pembayaran');
    }
    
    function get_edit()
    {
        check_level_1();
        $id = $this->uri->segment(3);
        $result = $this->pembayaran_model->get_pembayaran_id($id);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id_pembayaran' => $i['id_pembayaran'],
                'id_petugas' => $i['id_petugas'],
                'nisn' => $i['nisn'],
                'tgl_bayar' => $i['tgl_bayar'],
                'bulan_dibayar' => $i['bulan_dibayar'],
                'tahun_dibayar' => $i['tahun_dibayar'],
                'jumlah_bayar' => $i['jumlah_bayar'],
                'nama_petugas' => $i['nama_petugas'],
                'nama' => $i['nama']
            );
            $data['data_spp']=$this->siswa_model->get_spp();
           $this->template->load('template','admin/v_edit_pembayaran', $data);
            
        }
    }

    function update(){
        check_level_1();
        $id_pembayaran = $this->input->post('id_pembayaran');
        $tgl_bayar = $this->input->post('tgl_bayar');
        $bln_dibayar = $this->input->post('bulan');
        $thn_dibayar = $this->input->post('tahun');
        $jml_dibayar = $this->input->post('jml');
        
        $aaaaaa = $this->pembayaran_model->pembayaran_update($id_pembayaran,$tgl_bayar,$bln_dibayar,$thn_dibayar,$jml_dibayar);
        redirect('pembayaran');
    }

    function cetak(){
        $id = $this->uri->segment(3);
        $x['data']=$this->pembayaran_model->cetak_faktur($id);
        $this->load->view('admin/laporan/v_faktur',$x);
    }

}

/* End of file Controllername.php */
 ?>