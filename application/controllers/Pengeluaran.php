<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

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
		$this->load->model('M_pengeluaran');
		$this->load->library('datatables');
	}
	function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('pengeluaran');
		$this->load->view('template/footer');
		$this->load->view('js/datatablepengeluaran');
	}
	function json(){
		echo $this->M_pengeluaran->json();
	}
	function hapus($id_pengeluaran)
	{
		$this->M_pengeluaran->hapus($id_pengeluaran);
		echo json_encode((array("status" => true)));
	}
	function tambah(){
		$keterangan = $this->input->post('keterangan');
		$tgl_pengeluaran = date('Y-m-d');
		$a = $this->input->post('sejumlah');
        $rupiah1 = str_replace("Rp", "", $a);
        $sejumlah= str_replace(".", "", $rupiah1);

        $data = array(
			'tgl_pengeluaran' => $tgl_pengeluaran,
			'keterangan' => $keterangan,
			'sejumlah' => $sejumlah,	
		);
		$this->M_pengeluaran->insert($data);
		echo json_encode(array("status" => true));
	}
	function edit($id_pengeluaran){
		
		$data = $this->M_pengeluaran->tampil($id_pengeluaran);
		echo json_encode($data);
	}
	function prosesedit(){
		$id_pengeluaran = $this->input->post('id_pengeluaran');
		$keterangan = $this->input->post('keterangan');
		$a = $this->input->post('sejumlah');
        $rupiah1 = str_replace("Rp", "", $a);
        $sejumlah= str_replace(".", "", $rupiah1);

        $data = array(
			'keterangan' => $keterangan,
			'sejumlah' => $sejumlah,	
		);
		$this->M_pengeluaran->update($id_pengeluaran,$data);
		echo json_encode(array("status" => true));
	}

}

/* End of file Pengeluaran.php */
/* Location: ./application/controllers/Pengeluaran.php */