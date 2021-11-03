<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kenaikan extends CI_Controller {

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
		$this->load->model('M_kenaikan');
		// $this->load->library('datatables');
	}
	function index()
	{	
		$data['tahun_ajaran'] = $this->M_kenaikan->tahun_ajaran();
		$data['tingkat'] = $this->M_kenaikan->tingkat();
		$data['jurusan'] = $this->M_kenaikan->jurusan();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('kenaikan',$data);
		$this->load->view('template/footer');
		$this->load->view('js/jskenaikan');
		
	}
	function ambil_kelas(){
		$id_tingkat = $this->input->post('id_tingkat');
		$id_jurusan = $this->input->post('id_jurusan');
		$data['kelas'] = $this->M_kenaikan->kelas($id_tingkat,$id_jurusan);
		$this->load->view('select_kelas_kenaikan',$data);
	}
	function tampil_siswa($id_tingkat,$id_jurusan,$id_kelas,$id_tahun_ajaran){
		$data['siswa'] = $this->M_kenaikan->siswa($id_kelas,$id_tahun_ajaran);

		$this->load->view('tampil_siswa',$data);
	}
	function naik_tingkat(){
		$id_tingkat = $this->input->post('id_tingkat');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_kelas = $this->input->post('id_kelas');
		$id_tahun_ajaran = $this->input->post('id_tahun_ajaran');
		$naik_tingkat = $this->input->post('naik_tingkat');

		$cek = $this->M_kenaikan->cek($id_jurusan,$naik_tingkat);

		$data = array(
			'id_tahun_ajaran'=>$id_tahun_ajaran,
			'id_kelas' =>$cek->id_kelas
		);
		$query = $this->M_kenaikan->update($id_kelas,$data);
		if ($query > 0) {
			echo 'berhasil';
		}else{
			echo "gagal";
		}
		
	}

}

/* End of file Kenaikan.php */
/* Location: ./application/controllers/Kenaikan.php */