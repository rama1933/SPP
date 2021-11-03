<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengeluaran extends CI_Model {

	var $table="pengeluaran";

	function json()
	{
        $this->datatables->select('id_pengeluaran,tgl_pengeluaran,keterangan,sejumlah');
        $this->datatables->from($this->table);
        $this->datatables->add_column('action',
        	'<a class="btn btn-xs btn-warning waves-effect" href="javascript::;" onclick="btnedit($1)"><i class="fa fa-pencil"></i></a>

        	<a class="btn btn-xs btn-danger waves-effect" href="javascript:void(0);" onclick="hapus($1)"><i class="fa fa-trash"></i></a>
        	 ','id_pengeluaran');
        $this->db->order_by('id_pengeluaran','desc');
        return $this->datatables->generate();
	}
	function hapus($id_pengeluaran)
    {
        $this->db->where('id_pengeluaran',$id_pengeluaran);
        $this->db->delete($this->table);
    }
    function insert($data)
	{
		$this->db->insert($this->table,$data);
	}
	function tampil($id_pengeluaran){
        $this->db->select('id_pengeluaran,tgl_pengeluaran,keterangan,sejumlah');
        $this->db->where('id_pengeluaran',$id_pengeluaran);
        return $this->db->get($this->table)->row();
    }
    function update($id_pengeluaran,$data)
	{
		$this->db->set($data);
		$this->db->where('id_pengeluaran',$id_pengeluaran);
		$this->db->update($this->table);
	}

}

/* End of file M_pengeluaran.php */
/* Location: ./application/models/M_pengeluaran.php */