<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kenaikan extends CI_Model {

	function tahun_ajaran(){
		$this->db->where('status','Y');
		return $this->db->get('tahun_ajaran')->row();
	}
	function tingkat(){
		return $this->db->get('tingkat')->result_object();

	}
	function jurusan(){
		return $this->db->get('jurusan')->result_object();

	}
	function kelas($id_tingkat,$id_jurusan){
		$this->db->where('id_tingkat',$id_tingkat);
		$this->db->where('id_jurusan',$id_jurusan);
		return $this->db->get('kelas')->result_object();
	}
	function siswa($id_kelas,$id_tahun_ajaran){
		$this->db->select('
			tblsiswa.id_siswa,
			tblsiswa.NIS,
			tblsiswa.nama,
			tblsiswa.id_tahun_ajaran,
			tblsiswa.id_kelas
			');
		$this->db->where('id_kelas',$id_kelas);
		$this->db->where('id_tahun_ajaran',$id_tahun_ajaran);
		return $this->db->get('tblsiswa')->result_object();
	}
	function cek($id_jurusan,$naik_tingkat){
		$this->db->where('id_jurusan',$id_jurusan);
		$this->db->where('id_tingkat',$naik_tingkat);
		return $this->db->get('kelas')->row();
	}
	function update($id_kelas,$data)
	{
		$this->db->set($data);
		$this->db->where('id_kelas',$id_kelas);
		return $this->db->update('tblsiswa');

	}

}

/* End of file M_kenaikan.php */
/* Location: ./application/models/M_kenaikan.php */