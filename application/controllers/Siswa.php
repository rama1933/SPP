<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

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
		$this->load->model('M_siswa');
		$this->load->library('datatables');
	}
	function index()
	{

		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('siswa');
		$this->load->view('template/footer');
		$this->load->view('js/datatablesiswa');
	}
	function json(){
		echo $this->M_siswa->json();
	}
	function ambil_kelas(){
		$id_tingkat = $this->input->post('id_tingkat');
		$data['kelas'] = $this->M_siswa->kelas($id_tingkat);
		$this->load->view('select_kelas',$data);
	}
	function tambah(){
		$config['upload_path']="./foto_siswa"; //path folder file upload
        $config['allowed_types']='gif|jpg|png|PNG|jpeg'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
       	//call library upload 
        $this->load->library('upload',$config);

		$NIS = $this->input->post('NIS');
        $nama = $this->input->post('nama');
        $tmpt_lhr = $this->input->post('tmpt_lhr');
        $tgl_lhr = $this->input->post('tgl_lhr');
        $jk = $this->input->post('jk');
        $id_tahun_ajaran = $this->input->post('id_tahun_ajaran');
        $id_kelas = $this->input->post('id_kelas');
        $alamat = $this->input->post('alamat');
        $cek = $this->M_siswa->cek($NIS);
        if ($cek > 0) {
        	$this->session->set_flashdata('message', '
            	<div class="alert alert-danger">
                	<p>Siswa dengan NIS tersebut sudah terdaftar</p>
              	</div>');
            	redirect('Siswa/tambahsiswa');
        }else{
			if($this->upload->do_upload("foto")){ //upload file
	            $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
	            //set file name ke variable image
	            $foto= $data['upload_data']['file_name'];
	            $array = array(
	                'NIS' =>$NIS,
	                'nama' =>$nama,
	                'tmpt_lhr' => $tmpt_lhr,
	                'tgl_lhr' =>$tgl_lhr,
	                'jk' =>$jk,
	                'id_tahun_ajaran' =>$id_tahun_ajaran,
	                'id_kelas' =>$id_kelas,
	                'alamat' =>$alamat,
	                'foto' =>$foto,
	            );
	            $this->M_siswa->insert($array);
	            $this->session->set_flashdata('message', '
            		<div class="alert alert-primary">
                        Berhasil Menambahkan siswa
                    </div>');
            		redirect('Siswa');
			}
		}
	}
	function hapus($id_siswa)
	{
		$this->M_siswa->delete($id_siswa);
		echo json_encode((array("status" => true)));
	}
	function tambahsiswa(){
		// $data['jurusan'] = $this->M_siswa->jurusan();
		$data['tingkat'] = $this->M_siswa->tingkat();
		$data['tahun'] = $this->M_siswa->tahun_ajaran();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('tambah_siswa',$data);
		$this->load->view('template/footer');
		$this->load->view('js/jstambahsiswa');
	}
	function edit($id_siswa){
		// $data['jurusan'] = $this->M_siswa->jurusan();
		$data['tingkat'] = $this->M_siswa->tingkat();
		$data['siswa'] = $this->M_siswa->siswa($id_siswa);
		$data['kelas'] = $this->M_siswa->kelas_biasa();
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('template/sidebar');
		$this->load->view('edit_siswa',$data);
		$this->load->view('template/footer');
		$this->load->view('js/jstambahsiswa');
	}
	function proses_edit(){
		$config['upload_path']="./foto_siswa"; //path folder file upload
        $config['allowed_types']='gif|jpg|png|PNG|jpeg'; //type file yang boleh di upload
        $config['encrypt_name'] = TRUE; //enkripsi file name upload
       	//call library upload 
        $this->load->library('upload',$config);

		$id_siswa = $this->input->post('id_siswa');
		$NIS = $this->input->post('NIS');
        $nama = $this->input->post('nama');
        $tmpt_lhr = $this->input->post('tmpt_lhr');
        $tgl_lhr = $this->input->post('tgl_lhr');
        $jk = $this->input->post('jk');
        $id_tahun_ajaran = $this->input->post('id_tahun_ajaran');
        $id_kelas = $this->input->post('id_kelas');
        $alamat = $this->input->post('alamat');
        $cek = $this->M_siswa->cek($NIS);

			if($this->upload->do_upload("foto")){ //upload file
	            $data = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
	            //set file name ke variable image
	            $foto= $data['upload_data']['file_name'];
	            $array = array(
	                'NIS' =>$NIS,
	                'nama' =>$nama,
	                'tmpt_lhr' => $tmpt_lhr,
	                'tgl_lhr' =>$tgl_lhr,
	                'jk' =>$jk,
	                'id_tahun_ajaran' =>$id_tahun_ajaran,
	                'id_kelas' =>$id_kelas,
	                'alamat' =>$alamat,
	                'foto' =>$foto,
	            );
	            $this->M_siswa->update_siswa_dengan_foto($id_siswa,$array);
	            $this->session->set_flashdata('message', '
            		<div class="alert alert-primary">
                		<h4>Sukses</h4>

                		<p>Berhasil Mengubah Data Siswa</p>
              		</div>');
            		redirect('Siswa');
			}else{
				$array2 = array(
	                'NIS' =>$NIS,
	                'nama' =>$nama,
	                'tmpt_lhr' => $tmpt_lhr,
	                'tgl_lhr' =>$tgl_lhr,
	                'jk' =>$jk,
	                'id_tahun_ajaran' =>$id_tahun_ajaran,
	                'id_kelas' =>$id_kelas,
	                'alamat' =>$alamat,
	            );
	            $this->M_siswa->update_siswa_tanpa_foto($id_siswa,$array2);
	            $this->session->set_flashdata('message', '
            		<div class="alert alert-primary">
                		<h4>Sukses</h4>

                		<p>Berhasil Mengubah Data Siswa</p>
              		</div>');
            		redirect('Siswa');
			}

	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */