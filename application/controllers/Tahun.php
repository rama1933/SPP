<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun extends CI_Controller {

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
		$this->load->model('M_tahun');
		$this->load->library('datatables');
	}

	function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('tahun');
		$this->load->view('template/footer');
		$this->load->view('js/datatabletahun');
	}
	function json(){
		echo $this->M_tahun->json();
	}
	function hapus($id_tahun_ajaran)
	{
		$this->M_tahun->hapus($id_tahun_ajaran);
		echo json_encode((array("status" => true)));
	}
	function edit($id_tahun_ajaran){
		
		$data = $this->M_tahun->tampil($id_tahun_ajaran);
		echo json_encode($data);
	}

	function tambah(){
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('tambah_tahun');
		$this->load->view('template/footer');
	}
	function prosestambah(){
		$tahun = $this->input->post('tahun');
		$status = $this->input->post('status');
		$cek = $this->M_tahun->cek($tahun);
		
		if ($cek > 0) {
			echo 'sudah_ada';
		}else{
			if ($status == 'Y') {
				$cek_status = $this->M_tahun->cek_status($status);
				if ($cek_status == 1) {
					echo 'sudah_digunakan';
				}else{
					$data = array(
					'tahun' => $tahun,
					'status' => $status,
					);
					$this->M_tahun->insert($data);
					echo "ok";
				}
			}else{
				$data = array(
				'tahun' => $tahun,
				'status' => $status,
				);
				$this->M_tahun->insert($data);
				echo "ok";
			}
			
		}
		
	}
	function prosesedit()
	{
		$id_tahun_ajaran = $this->input->post('id_tahun_ajaran');
		$tahun = $this->input->post('tahun');
		$status = $this->input->post('status');
		$cek = $this->M_tahun->cek($tahun);

		if ($status == 'Y') {
			$cek_status = $this->M_tahun->cek_status($status);
				if ($cek_status == 1) {
					echo 'sudah_digunakan';
				}else{
					$data = array(
						'tahun' => $tahun,
						'status' => $status,
					);
					$this->M_tahun->update($id_tahun_ajaran,$data);
					echo 'ok';
				}
			}else{
					$data = array(
						'tahun' => $tahun,
						'status' => $status,
					);
					$this->M_tahun->update($id_tahun_ajaran,$data);
					echo 'ok';
			}
			

			

	}

}

/* End of file Tahun.php */
/* Location: ./application/controllers/Tahun.php */