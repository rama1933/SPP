<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tahun extends CI_Model {

	var $table="tahun_ajaran";

	function json()
	{
        $this->datatables->select('id_tahun_ajaran,tahun,status');
        $this->datatables->from($this->table);
        $this->datatables->add_column('action',
        	'<a class="btn btn-xs btn-warning waves-effect" href="javascript::;" onclick="btnedit($1)" title="Edit Tahun Ajaran"><i class="fa fa-pencil"></i></a>

        	<a class="btn btn-xs btn-danger waves-effect" href="javascript:void(0);" title="Hapus Pendaftar" onclick="hapus($1)"><i class="fa fa-trash"></i></a>
        	 ','id_tahun_ajaran');
        $this->db->order_by('id_tahun_ajaran','desc');
        return $this->datatables->generate();
	}
	function hapus($id_tahun_ajaran)
    {
        $this->db->where('id_tahun_ajaran',$id_tahun_ajaran);
        $this->db->delete($this->table);
    }
    function tampil($id_tahun_ajaran){
        $this->db->select('id_tahun_ajaran,tahun,status');
        $this->db->where('id_tahun_ajaran',$id_tahun_ajaran);
        return $this->db->get($this->table)->row();
    }
    function update($id_tahun_ajaran,$data)
	{
		$this->db->set($data);
		$this->db->where('id_tahun_ajaran',$id_tahun_ajaran);
		$this->db->update($this->table);
	}
	function cek($tahun)
	{
		$this->db->where('tahun',$tahun);
		return $this->db->get($this->table)->num_rows();
	}
	function insert($data)
	{
		$this->db->insert($this->table,$data);
	}
	function cek_status($status)
	{	
		$this->db->where('status',$status);
		return $this->db->get($this->table)->num_rows();
	}

}

/* End of file M_tahun.php */
/* Location: ./application/models/M_tahun.php */