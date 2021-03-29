<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    function __construct()
    {
        //$this->load->model('product_model');
        //$this->load->model('laporan_model');
        parent::__construct();
        check_not_login();
        check_level_1();
        $this->load->model('laporan_model');   
        $this->load->model('product_model');
        $this->load->model('siswa_model');
        
    }

    function index()
    {
        $data['bayar_bln']=$this->laporan_model->get_bulan_pembayaran();
        $data['bayar_thn']=$this->laporan_model->get_tahun_pembayaran();
        $this->template->load('template','admin/v_laporan', $data);       
    }

    function lap_pembayaran_pertanggal(){
        $tgl=$this->input->post('tgl');
        $tanggal = str_replace('\'',' ', $tgl);
        $x['jml']=$this->laporan_model->get_data_total_bayar_pertanggal($tanggal);
        $x['data']=$this->laporan_model->get_data_bayar_pertanggal($tanggal);
        $this->load->view('admin/laporan/v_pertanggal',$x);
	}

    function lap_pembayaran_perbulan(){
        $bln=$this->input->post('bln');
        $bulan = str_replace('\'',' ', $bln);
        $x['jml']=$this->laporan_model->get_data_total_bayar_perbulan($bulan);
        $x['data']=$this->laporan_model->get_data_bayar_perbulan($bulan);
        $this->load->view('admin/laporan/v_perbulan',$x);
    }
    
    function lap_pembayaran_pertahun(){
        $thn=$this->input->post('thn');
        $tahun = str_replace('\'',' ', $thn);
        $x['jml']=$this->laporan_model->get_data_total_bayar_pertahun($tahun);
        $x['data']=$this->laporan_model->get_data_bayar_pertahun($tahun);
        $this->load->view('admin/laporan/v_pertahun',$x);
	}

}

/* End of file Laporan.php */

?>