<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    // function barang_list(){
	// 	$hasil=$this->db->query("SELECT * FROM product");
	// 	return $hasil->result();
	// }
// -------------------------------------------------------------------------------------------
    function get_siswa(){
        $this->db->select('*');    
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $result = $this->db->get();
        return $result;
    }
    function get_kelas(){
        $result = $this->db->get('kelas');
        return $result;
    }
    function get_spp(){
        $result = $this->db->get('spp');
        return $result;
    }
// -------------------------------------------------------------------------------------------    
    function save_siswa($nisn,$nis,$nama,$id_spp,$id_kelas,$alamat,$no_telp,$password)
    {
        $data = array(
            'nisn' => $nisn,
            'nis' => $nis,
            'nama' => $nama,
            'id_spp' => $id_spp,
            'id_kelas' => $id_kelas,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'password' => md5($password)
        );
        $this->db->insert('siswa', $data);
        
    }

    function save_kelas($kelas,$kompetensi)
    {
        $data = array(
            'nama_kelas' => $kelas,
            'kompetensi_keahlian' => $kompetensi
        );
        $this->db->insert('kelas', $data);
        
    }
    function save_spp($tahun,$nominal)
    {
        $data = array(
            'tahun' => $tahun,
            'nominal' => $nominal
        );
        $this->db->insert('spp', $data);     
    }
// -------------------------------------------------------------------------------------------
    function delete($id){
        $this->db->where('product_id', $id);
        $this->db->delete('product');
      }
      
      function kelas_delete($id){
        $this->db->where('id_kelas', $id);
        $this->db->delete('kelas');
      }
      function spp_delete($id){
        $this->db->where('id_spp', $id);
        $this->db->delete('spp');
      }
// -------------------------------------------------------------------------------------------
      function get_kelas_id($id){
        $this->db->select('*');    
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $result = $this->db->get();
        return $result;
        $query = $this->db->get_where('kelas', array('id_kelas' => $id));
        return $query;
      }
      function get_siswa_id($id){
        $this->db->select('*');    
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $this->db->where('nisn', $id);
        
        $result = $this->db->get();
        return $result;
      }
      function get_spp_id($id){
        $this->db->select('*');    
        $this->db->from('spp');
        $this->db->where('id_spp', $id);
        
        $result = $this->db->get();
        return $result;
      }
// -------------------------------------------------------------------------------------------
    function siswa_update($nisn,$nis,$nama,$id_spp,$id_kelas,$password,$alamat,$no_telp){
        if(!empty($password)){
            $data = array(
                'nisn' => $nisn,
                'nis' => $nis,
                'nama' => $nama,
                'id_spp' => $id_spp,
                'id_kelas' => $id_kelas,
                'password' => md5($password),
                'alamat' => $alamat,
                'no_telp' => $no_telp
            );
        }else{
            $data = array(
                'nisn' => $nisn,
                'nis' => $nis,
                'nama' => $nama,
                'id_spp' => $id_spp,
                'id_kelas' => $id_kelas,
                'alamat' => $alamat,
                'no_telp' => $no_telp
            );
        }
        $this->db->where('nisn', $nisn);
        $this->db->update('siswa', $data);
    }
    
    function kelas_update($id,$kelas,$kompetensi){
        $data = array(
            'nama_kelas' => $kelas,
            'kompetensi_keahlian' => $kompetensi
        );
        $this->db->where('id_kelas', $id);
        $this->db->update('kelas', $data);
    }
    function spp_update($id,$tahun,$nominal){
        $data = array(
            'tahun' => $tahun,
            'nominal' => $nominal
        );
        $this->db->where('id_spp', $id);
        $this->db->update('spp', $data);
    }
// -------------------------------------------------------------------------------------------

    function get_nofak(){
		$q = $this->db->query("SELECT MAX(RIGHT(jual_id,3)) AS kd_max FROM tbl_jual WHERE DATE(jual_tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "101";
        }
        return date('dmy') . $kd;
    }
    

    function simpan_penjualan($nofak,$total,$jml_uang,$kembalian){
		$this->db->query("INSERT INTO tbl_jual (jual_id,jual_total,jual_tunai,jual_kembalian) VALUES ('$nofak','$total','$jml_uang','$kembalian')");
		foreach ($this->cart->contents() as $item) { 
			$data=array(
				'd_jual_nofak' 			=>	$nofak,
				'd_jual_produk_id'		=>	$item['id'],
				'd_jual_produk_nama'	=>	$item['name'],
				'd_jual_produk_harga'	=>	$item['price'],
				'qty'       			=>	$item['qty'],
				'd_jual_total'			=>	$item['subtotal']
            );
            $this->db->insert('tbl_detail_jual',$data);
		}
		return true;
    }
    
    function cetak_faktur($id){
        $nofak=$this->session->userdata('nofak');
        if(!empty($nofak)){
            $hsl=$this->db->query("SELECT jual_id,DATE_FORMAT(jual_tanggal,'%d/%m/%Y %H:%i:%s') AS jual_tanggal,jual_total,jual_tunai,jual_kembalian,d_jual_produk_nama,d_jual_produk_harga,qty,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_id=d_jual_nofak WHERE jual_id='$nofak'");
        }else{
            $hsl=$this->db->query("SELECT jual_id,DATE_FORMAT(jual_tanggal,'%d/%m/%Y %H:%i:%s') AS jual_tanggal,jual_total,jual_tunai,jual_kembalian,d_jual_produk_nama,d_jual_produk_harga,qty,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_id=d_jual_nofak WHERE jual_id='$id'");
        }
        
		return $hsl;
    }
    
    function get_history(){
        $result = $this->db->get('tbl_jual');
        return $result;
    }
    function delete_faktur($id){
        $this->db->where('d_jual_nofak', $id);
        $this->db->delete('tbl_detail_jual');
        $this->db->where('jual_id', $id);
        $this->db->delete('tbl_jual');
      }
      
}


/* End of file ModelName.php */


?>