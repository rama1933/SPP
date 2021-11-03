<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

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
		$this->load->model('M_transaksi');
		// $this->load->library('datatables');
	}
	function index()
	{
		$data['tahun'] = $this->M_transaksi->tahun();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('transaksi',$data);
		$this->load->view('template/footer');
		$this->load->view('js/datatabletransaksi');
	}
	function view($NIS='',$id_tahun_ajaran=''){

		$NIS = $this->input->post('NIS');
		$tahun = $this->input->post('tahun');
		$cek_tahun = $this->M_transaksi->cek_tahun($tahun);
		$id_tahun_ajaran = $cek_tahun->id_tahun_ajaran;
		$cek_siswa = $this->M_transaksi->cek_siswa($NIS,$id_tahun_ajaran);
		if ($cek_siswa == 0) {
			echo "<script>
			alert('Siswa tidak ditemukan');
			window.history.back();
			</script>";
		}else{
			$data['informasi'] = $this->M_transaksi->informasi($NIS,$id_tahun_ajaran);
		$informasi=$this->M_transaksi->informasi($NIS,$id_tahun_ajaran);
		$data['spp'] = $this->M_transaksi->spp($informasi->id_tahun_ajaran,$informasi->id_tingkat,$informasi->id_jurusan);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('view_transaksi',$data);
		$this->load->view('template/footer');
		$this->load->view('js/datatabletransaksi');
		}
		
	}
	function spp(){
		$NIS=$this->input->post('NIS');
		$id_tahun_ajaran=$this->input->post('id_tahun_ajaran');
		$cek_siswa = $this->M_transaksi->cek_siswa($NIS,$id_tahun_ajaran);
		if ($cek_siswa == 0) {
			echo "tidak_ditemukan";
		}	
	}
	function tampil($NIS='',$id_tahun_ajaran){
		$info = $this->M_transaksi->informasi($NIS,$id_tahun_ajaran);
		$a = $info->id_tahun_ajaran;
		$b = $info->id_tingkat;
		$c = $info->id_jurusan;
		$data['informasi'] = $this->M_transaksi->informasi($NIS,$id_tahun_ajaran);
		$data['spp'] = $this->M_transaksi->total_spp($a,$b,$c);
		$data['bayar'] = $this->M_transaksi->spp($NIS,$a,$b,$c);
		$this->load->view('tampil_spp',$data);
	}
	function bayar_spp(){
		$id_spp=$this->input->post('id_spp');
		$NIS=$this->input->post('NIS');
		$tgl_bayar=date('Y-m-d');
		$data=array(
				'tgl_bayar' => $tgl_bayar,
				'NIS' => $NIS,
				'id_spp' => $id_spp,
		);
		$this->M_transaksi->bayar($data);
		echo "<script>window.history.back();</script>";
	}
	function hapus_spp(){
		$id_spp=$this->input->post('id_spp');
		$this->M_transaksi->hapus_spp($id_spp);
		echo "<script>window.history.back();</script>";
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */