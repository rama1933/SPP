<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

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
		$this->load->model('M_kelas');
		$this->load->library('datatables');
	}
	
	function index()
	{
		$data['jurusan'] = $this->M_kelas->jurusan();
		$data['tingkat'] = $this->M_kelas->tingkat();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('kelas',$data);
		$this->load->view('template/footer');
		$this->load->view('js/datatablekelas');
	}
	function json(){
		echo $this->M_kelas->json();
	}
	function hapus($id_kelas)
	{
		$this->M_kelas->hapus($id_kelas);
		echo json_encode((array("status" => true)));
	}
	function tambah(){
		$kelas = $this->input->post('kelas');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_tingkat = $this->input->post('id_tingkat');

			$data = array(
				'kelas' => $kelas,
				'id_jurusan' => $id_jurusan,
				'id_tingkat' => $id_tingkat,
			);
			$this->M_kelas->insert($data);
			echo json_encode(array("status" => true));
		
	}
	function edit($id_kelas){
		$data = $this->M_kelas->tampil($id_kelas);
		echo json_encode($data);
	}
	function prosesedit()
	{
		$id_kelas = $this->input->post('id_kelas');
		$kelas = $this->input->post('kelas');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_tingkat = $this->input->post('id_tingkat');
		$cek = $this->M_kelas->cek($kelas,$id_jurusan,$id_tingkat);

			$data = array(
				'kelas' => $kelas,
				'id_jurusan' => $id_jurusan,
				'id_tingkat' => $id_tingkat,
			);
			$this->M_kelas->update($id_kelas,$data);
			echo json_encode(array("status" => true));
		
		
	}


}

/* End of file Kelas.php */
/* Location: ./application/controllers/Kelas.php */