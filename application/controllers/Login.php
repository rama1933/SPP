<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function index()
	{	
		$this->load->view('login');
		
	}
	function proses_login(){
		// waitr ya saya lupa tunggu bentar
		$this->load->model("M_login");
		$username=$this->input->post("username");
		$password=$this->input->post("password");
		$a=$this->M_login->hash_string($password);
		$cek = $this->M_login->cek($username,$a);
		$pecah = $this->M_login->pecah($username,$a);
		// $hitung = count($pecah);
		if(!$this->M_login->hash_verify($password,$pecah->password)){
				echo "salah";
			}else{
				$newdata = array(
						'kode_user' 		=> $pecah->kode_user,
				        'username'    		=> $pecah->username,
				        'nama_lengkap'    	=> $pecah->nama_lengkap,
				        'jenis_kelamin'    	=> $pecah->jenis_kelamin,
				        'alamat'    		=> $pecah->alamat,
				        'level'   			=> $pecah->level,
				        'status' 			=> 'login_admin',
				);
				$this->session->set_userdata($newdata);
				// echo $this->session->userdata('nama');
				echo "ok";
			}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('Login');
	}



	
}
