<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

	var $table="tblsiswa";
	var $table2="jurusan";
	var $table3="tingkat";
	var $table4="tahun_ajaran";
	var $table5="kelas";

	function json()
	{
        $this->datatables->select('
        	tblsiswa.id_siswa,
        	tblsiswa.NIS,
        	tblsiswa.nama,
        	tblsiswa.id_kelas,
        	kelas.id_kelas,
        	kelas.kelas,
        	jurusan.id_jurusan,
        	jurusan.jurusan,

        	');
        $this->datatables->from($this->table);
        $this->datatables->join($this->table5,'kelas.id_kelas=tblsiswa.id_kelas');

        $this->datatables->join($this->table2,'jurusan.id_jurusan=kelas.id_jurusan');
        $this->datatables->add_column('action',
        	'<a class="btn btn-xs btn-warning waves-effect" href="'.site_url("Siswa/edit/").'$1" title="Edit Siswa"><i class="fa fa-pencil"></i></a>

        	<a class="btn btn-xs btn-danger waves-effect" href="javascript:void(0);" title="Hapus Siswa" onclick="hapus($1)"><i class="fa fa-trash"></i></a>
        	 ','id_siswa');
        $this->db->order_by('id_siswa','desc');
        return $this->datatables->generate();
	}
	function tahun_ajaran(){
		$this->db->where('status','Y');
		return $this->db->get($this->table4)->row();
	}
	function tingkat(){
		return $this->db->get($this->table3)->result_object();
	}
	function kelas($id_tingkat){
		$this->db->select('kelas.*,jurusan.*');
		$this->db->join('jurusan','jurusan.id_jurusan=kelas.id_jurusan');
		$this->db->where('id_tingkat',$id_tingkat);
		return $this->db->get($this->table5)->result_object();
	}
	function insert($array)
	{
		$this->db->insert($this->table,$array);
	}
	function delete($id_siswa)
	{
		$this->db->select('id_siswa,foto');
		$this->db->where('id_siswa',$id_siswa);
       	$query = $this->db->get($this->table);
        $row = $query->row();
        unlink("./foto_siswa/$row->foto");
        $this->db->delete($this->table, array('id_siswa' => $id_siswa));
	}
	function cek($NIS){
		$this->db->where('NIS',$NIS);
		return $this->db->get($this->table)->num_rows();
	}
	function siswa($id_siswa){
		$this->db->select('
			tblsiswa.id_siswa,
			tblsiswa.NIS,
			tblsiswa.nama,
			tblsiswa.tmpt_lhr,
			tblsiswa.tgl_lhr,
			tblsiswa.jk,
			tblsiswa.id_tahun_ajaran,
			tblsiswa.id_kelas,
			tblsiswa.alamat,
			tblsiswa.foto,
			kelas.id_kelas,
			kelas.kelas,
			kelas.id_jurusan,
			kelas.id_tingkat,
			tingkat.id_tingkat,
			tingkat.tingkat,
			jurusan.id_jurusan,
			jurusan.jurusan
			');
		$this->db->from($this->table);
		$this->db->join('kelas','kelas.id_kelas=tblsiswa.id_kelas','left');
		$this->db->join('tingkat','tingkat.id_tingkat=kelas.id_tingkat','left');
		$this->db->join('jurusan','jurusan.id_jurusan=kelas.id_jurusan','left');
		$this->db->where('id_siswa',$id_siswa);
		return $this->db->get()->row();
	}
	function tingkat_kelas(){
		$this->db->select('
			kelas.id_kelas,
			kelas.id_tingkat,
			tingkat.id_tingkat,
			tingkat.tingkat
			');
		$this->db->join('tingkat','tingkat.id_tingkat=kelas.id_tingkat','left');
		return $this->db->get($this->table5)->result_object();
	}
	function kelas_biasa(){
		$this->db->select('
			kelas.id_kelas,
			kelas.kelas,
			kelas.id_jurusan,
			jurusan.id_jurusan,
			jurusan.jurusan
			');
		$this->db->join('jurusan','jurusan.id_jurusan=kelas.id_jurusan','left');
		return $this->db->get($this->table5)->result_object();
	}
	function update_siswa_dengan_foto($id_siswa,$array){
        $this->db->where('id_siswa',$id_siswa);
        $query = $this->db->get($this->table);
        $row = $query->row();
        unlink("./foto_siswa/$row->foto");
        $this->db->update($this->table,$array, array('id_siswa' => $id_siswa));
    }
    function update_siswa_tanpa_foto($id_siswa,$array2){
        $this->db->set($array2);
        $this->db->where('id_siswa',$id_siswa);
        $this->db->update($this->table);
    }
	

}

/* End of file M_siswa.php */
/* Location: ./application/models/M_siswa.php */