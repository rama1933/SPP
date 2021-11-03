<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iuran extends CI_Controller {

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
		$this->load->model('M_iuran');
		$this->load->library('datatables');
	}
	function index()
	{
		$data['jurusan'] = $this->M_iuran->jurusan();
		$data['tingkat'] = $this->M_iuran->tingkat();
		$data['tahun'] = $this->M_iuran->tahun_ajaran();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('iuran',$data);
		$this->load->view('template/footer');
		$this->load->view('js/datatableiuran');
	}
	function json(){
		echo $this->M_iuran->json();
	}
	function tambah(){
		$jenis_iuran = $this->input->post('jenis_iuran');
		$tahun = $this->input->post('tahun');

		$id_jurusan = $this->input->post('id_jurusan');
		$id_tingkat = $this->input->post('id_tingkat');
		$a = $this->input->post('jumlah');
        $rupiah1 = str_replace("Rp", "", $a);
        $jumlah= str_replace(".", "", $rupiah1);
        $id_tahun_ajaran = $this->M_iuran->cek_tahun($tahun);
        $data = array(
			'id_tahun_ajaran' => $id_tahun_ajaran->id_tahun_ajaran,
			'id_tingkat' => $id_tingkat,
			'id_jurusan' => $id_jurusan,
			'jenis_iuran' => $jenis_iuran,
			'jumlah' => $jumlah,		
		);
		$this->M_iuran->insert($data);
		echo json_encode(array("status" => true));

	}
	function hapus($id_iuran)
	{
		$this->M_iuran->hapus($id_iuran);
		echo json_encode((array("status" => true)));
	}
	function edit($id_iuran){
		$data = $this->M_iuran->tampil($id_iuran);
		echo json_encode($data);
	}
	function prosesedit()
	{
		$id_iuran = $this->input->post('id_iuran');
		$jenis_iuran = $this->input->post('jenis_iuran');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_tingkat = $this->input->post('id_tingkat');
		$a = $this->input->post('jumlah');
        $rupiah1 = str_replace("Rp", "", $a);
        $jumlah= str_replace(".", "", $rupiah1);
        $data = array(
			'id_tingkat' => $id_tingkat,
			'id_jurusan' => $id_jurusan,
			'jenis_iuran' => $jenis_iuran,
			'jumlah' => $jumlah,		
		);
		$this->M_iuran->update($id_iuran,$data);
		echo json_encode(array("status" => true));
		
	}

}

/* End of file Iuran.php */
/* Location: ./application/controllers/Iuran.php */