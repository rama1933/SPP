<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SPP extends CI_Controller {

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
		$this->load->model('M_spp');
		$this->load->library('datatables');
	}
	function index()
	{
		$data['jurusan'] = $this->M_spp->jurusan();
		$data['tingkat'] = $this->M_spp->tingkat();
		$data['tahun'] = $this->M_spp->tahun_ajaran();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('spp',$data);
		$this->load->view('template/footer');
		$this->load->view('js/datatablespp');


	}
	function json(){
		echo $this->M_spp->json();
	}
	function tambah(){

		$tahun = $this->input->post('tahun');

		$id_jurusan = $this->input->post('id_jurusan');
		$id_tingkat = $this->input->post('id_tingkat');
		$a = $this->input->post('jumlah');
        $rupiah1 = str_replace("Rp", "", $a);
        $jumlah= str_replace(".", "", $rupiah1);
        
        $id_tahun_ajaran = $this->M_spp->cek_tahun($tahun);
        $query= $this->M_spp->bulan();
        $id_tah=$id_tahun_ajaran->id_tahun_ajaran;
        $cek=$this->M_spp->cek($id_tah,$id_jurusan,$id_tingkat);
        if ($cek>0) {
        	echo json_encode(array("status" => false));
        }else{
        	foreach ($query->result_object() as $bulan) {
        	$data = array(
			'id_tahun_ajaran' => $id_tahun_ajaran->id_tahun_ajaran,
			'jumlah' => $jumlah,
			'id_tingkat' => $id_tingkat,
			'id_jurusan' => $id_jurusan,
			'id_bulan' => $bulan->id_bulan
			);
			$this->M_spp->insert($data);
			
	        }
	        echo json_encode(array("status" => true));
        }
       
	}
	function hapus($id_spp)
	{
		$this->M_spp->hapus($id_spp);
		echo json_encode((array("status" => true)));
	}
	function edit($id_spp){
		$data = $this->M_spp->tampil($id_spp);
		echo json_encode($data);
	}
	function prosesedit()
	{
		$id_spp = $this->input->post('id_spp');
		$id_tahun_ajaran = $this->input->post('id_tahun_ajaran');
		$id_jurusan = $this->input->post('id_jurusan');
		$id_tingkat = $this->input->post('id_tingkat');
		$a = $this->input->post('jumlah');
        $rupiah1 = str_replace("Rp", "", $a);
        $jumlah= str_replace(".", "", $rupiah1);
        $cek = $this->M_spp->cek($id_tahun_ajaran,$id_jurusan,$id_tingkat);
		if ($cek > 0) {
        	echo json_encode(array("status" => false));
        }else{
        	$data = array(
				'id_tahun_ajaran' => $id_tahun_ajaran,
				'jumlah' => $jumlah,
				'id_tingkat' => $id_tingkat,
				'id_jurusan' => $id_jurusan,
			);
			$this->M_spp->update($id_spp,$data);
			echo json_encode(array("status" => true));
        }
		
	}

}

/* End of file SPP.php */
/* Location: ./application/controllers/SPP.php */