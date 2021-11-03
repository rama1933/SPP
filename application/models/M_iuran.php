<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_iuran extends CI_Model {

	var $table="tbliuran";
	var $table2="jurusan";
	var $table3="tingkat";
	var $table4="tahun_ajaran";

	function json()
	{
        $this->datatables->select('
        	tbliuran.id_iuran,
        	tbliuran.id_tahun_ajaran,
        	tbliuran.jumlah,
        	tbliuran.id_tingkat,
        	tbliuran.id_jurusan,
        	tbliuran.jenis_iuran,
        	jurusan.id_jurusan,
        	jurusan.jurusan,
        	tingkat.id_tingkat,
        	tingkat.tingkat,
        	tahun_ajaran.id_tahun_ajaran,
        	tahun_ajaran.tahun');
        $this->datatables->from($this->table);
        $this->datatables->join($this->table2,'jurusan.id_jurusan=tbliuran.id_jurusan');
        $this->datatables->join($this->table3,'tingkat.id_tingkat=tbliuran.id_tingkat');
        $this->datatables->join($this->table4,'tahun_ajaran.id_tahun_ajaran=tbliuran.id_tahun_ajaran');
        $this->datatables->add_column('action',
        	'<a class="btn btn-xs btn-warning waves-effect" href="javascript:void(0);" onclick="btnedit($1)" title="Edit SPP"><i class="fa fa-pencil"></i></a>

        	<a class="btn btn-xs btn-danger waves-effect" href="javascript:void(0);" title="Hapus SPP" onclick="hapus($1)"><i class="fa fa-trash"></i></a>
        	 ','id_iuran');
        $this->db->order_by('id_iuran','desc');
        return $this->datatables->generate();
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
	function tahun_ajaran(){
		$this->db->where('status','Y');
		return $this->db->get($this->table4)->row();
	}
	function hapus($id_iuran)
    {
        $this->db->where('id_iuran',$id_iuran);
        $this->db->delete($this->table);
    }
    function tampil($id_iuran){
        $this->db->where('id_iuran',$id_iuran);
        return $this->db->get($this->table)->row();
    }
    function update($id_iuran,$data)
	{
		$this->db->set($data);
		$this->db->where('id_iuran',$id_iuran);
		$this->db->update($this->table);
	}
	function cek_tahun($tahun){
		$this->db->where('tahun',$tahun);
		return $this->db->get($this->table4)->row();
	}

}

/* End of file M_iuran.php */
/* Location: ./application/models/M_iuran.php */