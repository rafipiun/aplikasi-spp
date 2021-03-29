<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    

// -------------------------------------------------------------------------------------------
    function get_pembayaran(){
        $this->db->from('pembayaran');
        $this->db->join('petugas', 'pembayaran.id_petugas = petugas.id_petugas');
        $this->db->order_by('tgl_bayar','desc');
        $result = $this->db->get();
        return $result;
    }
    function get_pembayaran_petugas(){
        $this->db->from('pembayaran');
        $this->db->join('petugas', 'pembayaran.id_petugas = petugas.id_petugas');
        $this->db->order_by('tgl_bayar','desc');
        $this->db->where('pembayaran.id_petugas',$this->session->userdata('id_petugas'));
        $result = $this->db->get();
        return $result;
    }
// -------------------------------------------------------------------------------------------

    function get_id_spp($thn_dibayar){
        $this->db->select('*');    
        $this->db->from('spp');
        $this->db->where('tahun', $thn_dibayar);
        
        $id_spp = $this->db->get();
        return $id_spp;
      }

// -------------------------------------------------------------------------------------------    
    function save_pembayaran($id_petugas,$nisn,$tgl_bayar,$bln_dibayar,$thn_dibayar,$id_spp,$jml_dibayar)
    {
        $data = array(
            'id_petugas' => $id_petugas,
            'nisn' => $nisn,
            'tgl_bayar' => $tgl_bayar,
            'bulan_dibayar' => $bln_dibayar,
            'tahun_dibayar' => $thn_dibayar,
            'id_spp' => $id_spp,
            'jumlah_bayar' => $jml_dibayar
        );
        $this->db->insert('pembayaran', $data);
        
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
    function pembayaran_delete($id){
        $this->db->where('id_pembayaran', $id);
        $this->db->delete('pembayaran');
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
      function get_pembayaran_id($id){
        $this->db->select('*');    
        $this->db->from('pembayaran');
        $this->db->join('siswa', 'pembayaran.nisn = siswa.nisn');
        $this->db->join('petugas', 'pembayaran.id_petugas = petugas.id_petugas');
        $this->db->where('id_pembayaran', $id);
        
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
    
    function pembayaran_update($id_pembayaran,$tgl_bayar,$bln_dibayar,$thn_dibayar,$jml_dibayar){
        $data = array(
            'tgl_bayar' => $tgl_bayar,
            'bulan_dibayar' => $bln_dibayar,
            'tahun_dibayar' => $thn_dibayar,
            'jumlah_bayar' => $jml_dibayar
        );
        $this->db->where('id_pembayaran', $id_pembayaran);
        $this->db->update('pembayaran', $data);
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
       
        $hsl=$this->db->query("SELECT * FROM pembayaran JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas JOIN siswa ON pembayaran.nisn=siswa.nisn JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE id_pembayaran='$id'");
        
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