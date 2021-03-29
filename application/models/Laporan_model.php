<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    function get_bulan_pembayaran(){
		$hsl=$this->db->query("SELECT DISTINCT DATE_FORMAT(tgl_bayar,'%M %Y') AS bulan FROM pembayaran");
		return $hsl;
	}
	function get_tahun_pembayaran(){
		$hsl=$this->db->query("SELECT DISTINCT YEAR(tgl_bayar) AS tahun FROM pembayaran");
		return $hsl;
    }
    function get_data_bayar_pertanggal($tanggal){
		
		$hsl=$this->db->query("SELECT id_pembayaran,DATE_FORMAT(tgl_bayar,'%d %M %Y') AS tgl_bayar,pembayaran.nisn,nama,nama_kelas,bulan_dibayar,tahun_dibayar,jumlah_bayar FROM pembayaran JOIN siswa ON pembayaran.nisn=siswa.nisn JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE DATE(tgl_bayar)='$tanggal' ORDER BY id_pembayaran ASC");
        return $hsl;
	}
	function get_data_total_bayar_pertanggal($tanggal){
		$hsl=$this->db->query("SELECT DATE_FORMAT(tgl_bayar,'%d %M %Y') as tanggal,SUM(jumlah_bayar) as total FROM pembayaran WHERE DATE(tgl_bayar)='$tanggal'");
		return $hsl;
    }
    
    function get_data_bayar_perbulan($bulan){
		$hsl=$this->db->query("SELECT id_pembayaran,DATE_FORMAT(tgl_bayar,'%d %M %Y') AS tgl_bayar,pembayaran.nisn,nama,nama_kelas,bulan_dibayar,tahun_dibayar,jumlah_bayar FROM pembayaran JOIN siswa ON pembayaran.nisn=siswa.nisn JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE DATE_FORMAT(tgl_bayar, '%M %Y')='$bulan' ORDER BY id_pembayaran ASC");
		return $hsl;
	}
	function get_data_total_bayar_perbulan($bulan){
		$hsl=$this->db->query("SELECT DATE_FORMAT(tgl_bayar,'%M %Y') as bulan,SUM(jumlah_bayar) as total FROM pembayaran WHERE DATE_FORMAT(tgl_bayar, '%M %Y')='$bulan'");
		return $hsl;
    }
    
    function get_data_bayar_pertahun($tahun){
		$hsl=$this->db->query("SELECT id_pembayaran,YEAR(tgl_bayar) AS tahun,DATE_FORMAT(tgl_bayar,'%M %Y') AS bulan,DATE_FORMAT(tgl_bayar,'%d %M %Y') AS  tanggal,nama,pembayaran.nisn,nama_kelas,bulan_dibayar,tahun_dibayar,jumlah_bayar FROM pembayaran JOIN siswa ON pembayaran.nisn=siswa.nisn JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE YEAR(tgl_bayar)='$tahun' 
        ORDER BY id_pembayaran ASC");
		return $hsl;
	}
	function get_data_total_bayar_pertahun($tahun){
		$hsl=$this->db->query("SELECT jual_id,YEAR(jual_tanggal) AS tahun,DATE_FORMAT(jual_tanggal,'%M %Y') AS bulan,DATE_FORMAT(jual_tanggal,'%d %M %Y') AS 
        jual_tanggal,d_jual_produk_nama,d_jual_produk_harga,qty,SUM(d_jual_total) as total FROM tbl_jual JOIN tbl_detail_jual ON jual_id=d_jual_nofak WHERE 
        YEAR(jual_tanggal)='$tahun' ORDER BY jual_id DESC");
		return $hsl;
	}

}

/* End of file Laporan_model.php */


?>