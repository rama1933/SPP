<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksiiuran extends CI_Controller {

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
		$this->load->model('M_transaksiiuran');
		
	}

	function index()
	{
		$data['tahun'] = $this->M_transaksiiuran->tahun();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('transaksi_iuran',$data);
		$this->load->view('template/footer');
		$this->load->view('js/datatabletransaksiiuran');
	}
	function iuran(){
		$NIS=$this->input->post('NIS');
		$id_tahun_ajaran=$this->input->post('id_tahun_ajaran');
		$cek_siswa = $this->M_transaksiiuran->cek_siswa($NIS,$id_tahun_ajaran);
		if ($cek_siswa == 0) {
			echo "tidak_ditemukan";
		}	
	}
	function tampil($NIS='',$id_tahun_ajaran=''){
		$info = $this->M_transaksiiuran->informasi($NIS,$id_tahun_ajaran);
		$a = $info->id_tahun_ajaran;
		$b = $info->id_tingkat;
		$c = $info->id_jurusan;
		$data['informasi'] = $this->M_transaksiiuran->informasi($NIS,$id_tahun_ajaran);
		// $data['spp'] = $this->M_transaksi->total_spp($a,$b,$c);
		$data['bayar'] = $this->M_transaksiiuran->iuran($a,$b,$c);
		$this->load->view('tampil_iuran',$data);

	}
	function tambah(){
		$id_iuran=$this->input->post('id_iuran');
		$NIS=$this->input->post('NIS');
		$jumlah_bayar	=$this->input->post('jumlah_bayar');
		$tgl_bayar=date('Y-m-d');
		$cek_iuran = $this->M_transaksiiuran->cek_iuran($id_iuran);
		$cek = $this->M_transaksiiuran->cek_cek($NIS,$id_iuran)->row();
		$sisa = $cek_iuran->jumlah-$cek->jml;
		$jml=$cek->jml;
		$jumlah=$cek_iuran->jumlah;
		if ($jml<$jumlah) {
			if ($jumlah_bayar>$jumlah) {
				echo 'lebih_besar_dari_tagihan';
			}else if ($jumlah_bayar>$sisa){
				echo 'lebih_besar_dari_sisa';
			}else{
				$data=array(
							'tgl_bayar' => $tgl_bayar,
							'NIS' => $NIS,
							'id_iuran' => $id_iuran,
							'jumlah_bayar' => $jumlah_bayar
						);

						$this->M_transaksiiuran->insert($data);
						echo 'bayar';
			}
				
		
		}else{
			echo "lunas";
		}


	
	}

}

/* End of file Transaksiiuran.php */
/* Location: ./application/controllers/Transaksiiuran.php */