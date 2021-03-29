<?php

Class Fungsi{
    protected $ci;

    function __construct()
    {
     $this->ci =& get_instance();   
    }

    function user_login(){
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('id_petugas');
        if($this->ci->session->userdata('level') !== 3){
            $user_data = $this->ci->user_m->get($user_id)->row();
            return $user_data;
        }else{
            $user_data = $this->ci->user_m->get_siswa($user_id)->row();
            return $user_data;
        }
    }

    public function count_product(){
        $this->ci->load->model('product_model');
        return $this->ci->product_model->get_product()->num_rows();
    }

    public function count_user(){
        $this->ci->load->model('user_m');
        return $this->ci->user_m->get()->num_rows();
    }

    public function count_history(){
        $this->ci->load->model('product_model');
        return $this->ci->product_model->get_history()->num_rows();
    }
    

}