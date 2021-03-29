<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        //$this->load->model('order_model');   
        $this->load->model('product_model');
        
    }   

    public function index()
    {
        $data['product'] = $this->product_model->get_product();
        $this->template->load('template','admin/v_order', $data);
        
    }
    function add()
    {
        $id = $this->input->post('product_id');
        $produk=$this->product_model->get_product_id($id);
        $i=$produk->row_array();
        $data = array(
            'id' => $i['product_id'],
            'name' => $i['name'],
            'qty' => $this->input->post('qty'),
            'price' => $i['price']
        );
        if (!empty($this->cart->total_items())) {
                foreach ($this->cart->contents() as $items){
                $id=$items['id'];	
                $qtylama=$items['qty'];
                $row_id=$items['rowid'];
                $product_id=$this->input->post('product_id');
                $qty_baru = $qtylama + 1;
                if($id==$product_id){
                    $up=array(
                        'rowid'=> $row_id,
                        'qty'=>$qty_baru
                    );
                    $this->cart->update($up);
                    
                }
                else{
                        $this->cart->insert($data); 
                    
                }
            }
        }else{
            $this->cart->insert($data); 
        }
        
        redirect('order');
        
    }

    function remove()
    {
       $row_id = $this->uri->segment(3);
       $this->cart->update(array(
           'rowid' => $row_id,
           'qty' => 0
       ));
       redirect('order');
       
    }

    function reset()
    {
        $this->cart->destroy();
        redirect('order');
    }
    function update()
    {
        
            $row_id = $this->uri->segment(3);
            $qtylama = 0;
            $qty_baru = 0;
            foreach ($this->cart->contents() as $items){
                $qtylama=$items['qty'];
                $id = $items['id'];
                $product_id=$this->input->post('id');
                if (isset($_POST['incqty'])) {
                    $qty_baru = $qtylama + 1;
                    if($id == $product_id){
                        $this->cart->update(array(
                            'rowid' => $row_id,
                            'qty' => $qty_baru
                        ));
                        
                        redirect('order');
                    }
                    
                }
                else{
                    echo "Maaf ada yang error";
                }
                if(!empty($_POST['decqty'])){
                    if (isset($_POST['decqty'])) {
                        $qty_baru = $qtylama - 1;
                        if($id == $product_id){
                        $this->cart->update(array(
                            'rowid' => $row_id,
                            'qty' => $qty_baru
                        ));
        
                        redirect('order');
                    }
                
                }else{
                    echo "Maaf ada yang error";
                }
                   
              }
    
         }
        
    }


    function simpan(){
            $total=$this->input->post('total');
            $jml_uang=str_replace(",", "", $this->input->post('jml_uang'));
            $kembalian=$jml_uang-$total;
            if(!empty($total) && !empty($jml_uang)){
                if($jml_uang < $total){
                    echo $this->session->set_flashdata('msg','<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
                    redirect('order');
                }else{
                    $nofak=$this->product_model->get_nofak();
                    $this->session->set_userdata('nofak',$nofak);
                    $order_proses=$this->product_model->simpan_penjualan($nofak,$total,$jml_uang,$kembalian);
                    if($order_proses){
                        $this->cart->destroy(); 
                        
                        $this->load->view('admin/alert/alert_sukses');
                    }else{
                        redirect('penjualan');
                    }
                }
                
            }else{
                echo $this->session->set_flashdata('msg','<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
                redirect('penjualan');
            }
    
    
        }

    function cetak_faktur(){
        $id = $this->uri->segment(3);
        $x['data']=$this->product_model->cetak_faktur($id);
        $this->load->view('admin/laporan/v_faktur',$x);
        $this->session->unset_userdata('nofak');
    }
    

    function history(){
        $data['history'] = $this->product_model->get_history();  
        $this->template->load('template','admin/v_riwayat', $data);
    }
    function delete()
    {
        $id = $this->uri->segment(3);
        $this->product_model->delete_faktur($id);
        redirect('order/history');
    }

    function laporan()
    {
        echo "sabar ya :v";
    }
}

/* End of file Controllername.php */
 ?>