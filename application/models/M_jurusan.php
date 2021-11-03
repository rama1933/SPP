<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jurusan extends CI_Model {

	var $table="jurusan";

	function json()
	{
        $this->datatables->select('id_jurusan,jurusan');
        $this->datatables->from($this->table);
        $this->datatables->add_column('action',
        	'<a class="btn btn-xs btn-warning waves-effect" href="javascript:void(0);" onclick="btnedit($1)" title="Edit Tahun Ajaran"><i class="fa fa-pencil"></i></a>

        	<a class="btn btn-xs btn-danger waves-effect" href="javascript:void(0);" title="Hapus Pendaftar" onclick="hapus($1)"><i class="fa fa-trash"></i></a>
        	 ','id_jurusan');
        $this->db->order_by('id_jurusan','desc');
        return $this->datatables->generate();
	}
	function hapus($id_jurusan)
    {
        $this->db->where('id_jurusan',$id_jurusan);
        $this->db->delete($this->table);
    }
    function tampil($id_jurusan){
        $this->db->select('id_jurusan,jurusan');
        $this->db->where('id_jurusan',$id_jurusan);
        return $this->db->get($this->table)->row();
    }
    function update($id_jurusan,$data)
	{
		$this->db->set($data);
		$this->db->where('id_jurusan',$id_jurusan);
		$this->db->update($this->table);
	}
	function insert($data)
	{
		$this->db->insert($this->table,$data);
	}

}

/* End of file M_jurusan.php */
/* Location: ./application/models/M_jurusan.php */