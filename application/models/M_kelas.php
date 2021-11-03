<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelas extends CI_Model {

	var $table ="kelas";
	var $table2="jurusan";
	var $table3="tingkat";

	function json()
	{
        $this->datatables->select('kelas.id_kelas,kelas.kelas,kelas.id_jurusan,kelas.id_tingkat,jurusan.id_jurusan,jurusan.jurusan,tingkat.id_tingkat,tingkat.tingkat');
        $this->datatables->from($this->table);
        $this->datatables->join($this->table2,'jurusan.id_jurusan=kelas.id_jurusan','left');
        $this->datatables->join($this->table3,'tingkat.id_tingkat=kelas.id_tingkat','left');
        $this->datatables->add_column('action',
        	'<a class="btn btn-xs btn-warning waves-effect" href="javascript:void(0);" onclick="btnedit($1)" title="Edit Kelas"><i class="fa fa-pencil"></i></a>

        	<a class="btn btn-xs btn-danger waves-effect" href="javascript:void(0);" title="Hapus Kelas" onclick="hapus($1)"><i class="fa fa-trash"></i></a>
        	 ','id_kelas');
        $this->db->order_by('id_kelas','desc');
        return $this->datatables->generate();
	}
	function hapus($id_kelas)
    {
        $this->db->where('id_kelas',$id_kelas);
        $this->db->delete($this->table);
    }
    function insert($data)
	{
		$this->db->insert($this->table,$data);
	}
	function jurusan(){
		return $this->db->get($this->table2)->result_object();
	}
	function tingkat(){
		return $this->db->get($this->table3)->result_object();
	}
	function cek($kelas,$id_jurusan,$id_tingkat){
		$this->db->where('kelas',$kelas);
		$this->db->where('id_jurusan',$id_jurusan);
		$this->db->where('id_tingkat',$id_tingkat);
		return $this->db->get($this->table)->num_rows();
	}
	function tampil($id_kelas){
        $this->db->where('id_kelas',$id_kelas);
        return $this->db->get($this->table)->row();
    }
    function update($id_kelas,$data)
	{
		$this->db->set($data);
		$this->db->where('id_kelas',$id_kelas);
		$this->db->update($this->table);
	}

}

/* End of file M_kelas.php */
/* Location: ./application/models/M_kelas.php */