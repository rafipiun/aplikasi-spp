<?php

function check_already_login(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('id_petugas');
    if($user_session){
        redirect('dashboard');
    }
}
function check_not_login(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('id_petugas');
    if(!$user_session){
        redirect('auth');
    }
}
function check_level_1(){
    $ci =& get_instance();
    $session = $ci->session->userdata('level');
    if($session != 1){
        echo "<h1><center>Anda tidak berhak mengakses halaman ini !!!</center></h1>";
        die();
    }
}
function check_level_1_or_2(){
    $ci =& get_instance();
    $session = $ci->session->userdata('level');
    $level_session = array(1,2);
    if(!in_array($session, $level_session)){
        echo "<h1><center>Anda tidak berhak mengakses halaman ini !!!</center></h1>";
        die();
    }
}
function check_level_3(){
    $ci =& get_instance();
    $session = $ci->session->userdata('level');
    if($session != 3){
        echo "<h1><center>Anda tidak berhak mengakses halaman ini !!!</center></h1>";
        die();
    }
}
