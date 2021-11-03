<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		if ($this->session->userdata("status") != "login_admin")
		{
			$this->session->set_flashdata('message', 
					'<div class="alert alert-danger">
                    <h4>Login Gagal</h4>
                    <p>Periksa kembali username/password anda</p>
                	</div>'
                );
			redirect('Login');
		}
		$this->load->model('M_jurusan');
		$this->load->library('datatables');
	}
	function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('jurusan');
		$this->load->view('template/footer');
		$this->load->view('js/datatablejurusan');
	}
	function json(){
		echo $this->M_jurusan->json();
	}
	function hapus($id_jurusan)
	{
		$this->M_jurusan->hapus($id_jurusan);
		echo json_encode((array("status" => true)));
	}
	function edit($id_jurusan){
		$data = $this->M_jurusan->tampil($id_jurusan);
		echo json_encode($data);
	}
	function prosesedit()
	{
		$id_jurusan = $this->input->post('id_jurusan');
		$jurusan = $this->input->post('jurusan');
		$data = array(
			'jurusan' => $jurusan,
		);
		$this->M_jurusan->update($id_jurusan,$data);
		echo json_encode(array("status" => true));
		
	}
	function tambah(){
		$jurusan = $this->input->post('jurusan');
		$data = array(
			'jurusan' => $jurusan,
		);
		$this->M_jurusan->insert($data);
		echo json_encode(array("status" => true));
		
		
	}

}

/* End of file Jurusan.php */
/* Location: ./application/controllers/Jurusan.php */