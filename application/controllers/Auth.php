<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		//check_already_login();
		$this->load->view('login');
	}
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
			$this->load->model('user_m');
			$query = $this->user_m->login($post);
			if($query->num_rows() > 0){
				$row = $query->row();
				$params = array(
					'nama_petugas' => $row->nama_petugas,
					'id_petugas' => $row->id_petugas,
					'level' => $row->level
				);
				$this->session->set_userdata($params);
				echo "<script>
				alert('selamat, login berhasil');
				window.location='".site_url('dashboard')."';
				</script>";
			}else{
				$query_siswa = $this->user_m->login_siswa($post);
				if($query_siswa->num_rows() > 0){
					$row = $query_siswa->row();
					$params = array(
						'nama_petugas' => $row->nama,
						'id_petugas' => $row->nisn,
						'level' => 3
					);
					$this->session->set_userdata($params);
					echo "<script>
					alert('selamat, login berhasil');
					window.location='".site_url('riwayat')."';
					</script>";
				}else{
					echo "<script>
					alert('Login gagal, username / password salah');
					window.location='".site_url('auth')."';
					</script>";
				}
			}
		}
	}
	public function logout()
	{
		$params = array('nama_petugas','id_petugas','level','status');
		$this->session->unset_userdata($params);
		redirect('auth');
	}
}
