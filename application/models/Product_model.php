<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function barang_list(){
		$hasil=$this->db->query("SELECT * FROM product");
		return $hasil->result();
	}

    function get_product(){
        $result = $this->db->get('siswa');
        return $result;
    }
    
    function save($name,$price)
    {
        $data = array(
            'name' => $name,
            'price' => $price
        );
        $this->db->insert('product', $data);
        
    }

    function delete($id){
        $this->db->where('product_id', $id);
        $this->db->delete('product');
      }

      function get_product_id($id){
        $query = $this->db->get_where('product', array('product_id' => $id));
        return $query;
      }

    function update($id,$name,$price){
        $data = array(
            'name' => $name,
            'price' => $price
        );
        $this->db->where('product_id', $id);
        $this->db->update('product', $data);
    }


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