<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksiiuran extends CI_Model {

	function tahun(){
		$this->db->where('status','Y');
		return $this->db->get('tahun_ajaran')->row();
	}
	function cek_siswa($NIS,$id_tahun_ajaran){
		$this->db->where('NIS',$NIS);
		$this->db->where('id_tahun_ajaran',$id_tahun_ajaran);
		return $this->db->get("tblsiswa")->num_rows();
	}
	function informasi($NIS,$id_tahun_ajaran){
		$this->db->select('
			tblsiswa.id_siswa,
			tblsiswa.NIS,
			tblsiswa.nama,
			tblsiswa.id_tahun_ajaran,
			tblsiswa.id_kelas,
			tblsiswa.foto,
			kelas.id_kelas,
			kelas.kelas,
			jurusan.id_jurusan,
			jurusan.jurusan,
			tingkat.id_tingkat,
			tingkat.tingkat,
			tahun_ajaran.id_tahun_ajaran,
			tahun_ajaran.tahun,
			');
		$this->db->from('tblsiswa');
		$this->db->join('tahun_ajaran','tahun_ajaran.id_tahun_ajaran=tblsiswa.id_tahun_ajaran','left');
		$this->db->join('kelas','kelas.id_kelas=tblsiswa.id_kelas','left');
		$this->db->join('jurusan','jurusan.id_jurusan=kelas.id_jurusan','left');
		$this->db->join('tingkat','tingkat.id_tingkat=kelas.id_tingkat');
		$this->db->where('tblsiswa.NIS',$NIS);
		$this->db->where('tblsiswa.id_tahun_ajaran',$id_tahun_ajaran);
		return $this->db->get()->row();
	}
	function iuran($id_tahun_ajaran,$id_tingkat,$id_jurusan){
		$this->db->select('
			tbliuran.id_iuran,
        	tbliuran.id_tahun_ajaran,
        	tbliuran.jumlah,
        	tbliuran.id_tingkat,
        	tbliuran.id_jurusan,
        	tbliuran.jenis_iuran');
		$this->db->where('id_tahun_ajaran',$id_tahun_ajaran);
		$this->db->where('id_tingkat',$id_tingkat);
		$this->db->where('id_jurusan',$id_jurusan);
		return $this->db->get('tbliuran')->result_object();
	}
	function cek($NIS,$id_iuran){
		$this->db->select_sum('jumlah_bayar');
		$this->db->where('NIS',$NIS);
		$this->db->where('id_iuran',$id_iuran);
		$this->db->group_by('id_iuran');
		return $this->db->get('byrnonspp');
		

	}
	function insert($data){
		$this->db->insert('byrnonspp',$data);
	}
	function cek_iuran($id_iuran){
		$this->db->select('jumlah');
		$this->db->where('id_iuran',$id_iuran);
		return $this->db->get('tbliuran')->row();
	}
	function cek_cek($NIS,$id_iuran){
		return $this->db->query('SELECT sum(jumlah_bayar) as jml FROM byrnonspp WHERE NIS='.$NIS.' AND id_iuran='.$id_iuran.' GROUP BY id_iuran	 ');

	}

}

/* End of file M_transaksiiuran.php */
/* Location: ./application/models/M_transaksiiuran.php */