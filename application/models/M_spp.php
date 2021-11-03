<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_spp extends CI_Model {

	var $table="tblspp";
	var $table2="jurusan";
	var $table3="tingkat";
	var $table4="tahun_ajaran";
	var $table5="bulan";

	function json()
	{
        $this->datatables->select('
        	tblspp.id_spp,
        	tblspp.id_tahun_ajaran,
        	tblspp.jumlah,
        	tblspp.id_tingkat,
        	tblspp.id_jurusan,
        	tblspp.id_bulan,
        	jurusan.id_jurusan,
        	jurusan.jurusan,
        	tingkat.id_tingkat,
        	tingkat.tingkat,
        	tahun_ajaran.id_tahun_ajaran,
        	tahun_ajaran.tahun,
        	bulan.id_bulan,
        	bulan.bulan
        	');
        $this->datatables->from($this->table);
        $this->datatables->join($this->table2,'jurusan.id_jurusan=tblspp.id_jurusan');
        $this->datatables->join($this->table3,'tingkat.id_tingkat=tblspp.id_tingkat');
        $this->datatables->join($this->table4,'tahun_ajaran.id_tahun_ajaran=tblspp.id_tahun_ajaran');
        $this->datatables->join($this->table5,'bulan.id_bulan=tblspp.id_bulan');
        $this->datatables->add_column('action',
        	'<a class="btn btn-xs btn-danger waves-effect" href="javascript:void(0);" title="Hapus SPP" onclick="hapus($1)"><i class="fa fa-trash"></i></a>
        	 ','id_spp');
        $this->db->order_by('id_spp','desc');
        return $this->datatables->generate();
	}
	function jurusan(){
		return $this->db->get($this->table2)->result_object();
	}
	function tingkat(){
		return $this->db->get($this->table3)->result_object();
	}
	function tahun_ajaran(){
		$this->db->where('status','Y');
		return $this->db->get($this->table4)->row();
	}
	function insert($data)
	{
		$this->db->insert($this->table,$data);
	}
	function cek($id_tahun_ajaran,$id_jurusan,$id_tingkat){
		$this->db->where('id_tahun_ajaran',$id_tahun_ajaran);
		$this->db->where('id_jurusan',$id_jurusan);
		$this->db->where('id_tingkat',$id_tingkat);
		return $this->db->get($this->table)->num_rows();
	}
	function hapus($id_spp)
    {
        $this->db->where('id_spp',$id_spp);
        $this->db->delete($this->table);
    }
    function tampil($id_spp){
        $this->db->where('id_spp',$id_spp);
        return $this->db->get($this->table)->row();
    }
    function update($id_spp,$data)
	{
		$this->db->set($data);
		$this->db->where('id_spp',$id_spp);
		$this->db->update($this->table);
	}
	function cek_tahun($tahun){
		$this->db->where('tahun',$tahun);
		return $this->db->get($this->table4)->row();
	}
	function bulan(){
		return $this->db->get('bulan');
	}

}

/* End of file M_spp.php */
/* Location: ./application/models/M_spp.php */