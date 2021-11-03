<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	var $table="tahun_ajaran";
	var $table2="tblsiswa";
	var $table3="byrspp";

	function tahun(){
		$this->db->where('status','Y');
		return $this->db->get($this->table)->row();
	}
	function cek_tahun($tahun){
		$this->db->where('tahun',$tahun);
		return $this->db->get($this->table)->row();
	}
	function cek_siswa($NIS,$id_tahun_ajaran){
		$this->db->where('NIS',$NIS);
		$this->db->where('id_tahun_ajaran',$id_tahun_ajaran);
		return $this->db->get($this->table2)->num_rows();
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
	function spp($NIS,$id_tahun_ajaran,$id_tingkat,$id_jurusan){
		$this->db->select('
			tblspp.id_spp,
        	tblspp.id_tahun_ajaran,
        	tblspp.jumlah,
        	tblspp.id_tingkat,
        	tblspp.id_jurusan,
        	tblspp.id_bulan,
        	bulan.id_bulan,
        	bulan.bulan,
        	CASE WHEN (SELECT id_spp from byrspp where id_spp=tblspp.id_spp AND NIS='.$NIS.') THEN "Lunas"
        	ELSE "Belum Lunas"
        	END as status',false);
        $this->db->join('bulan','bulan.id_bulan=tblspp.id_bulan','left');
		$this->db->where('id_tahun_ajaran',$id_tahun_ajaran);
		$this->db->where('id_tingkat',$id_tingkat);
		$this->db->where('id_jurusan',$id_jurusan);
		$this->db->order_by('tblspp.id_spp','asc');
		$this->db->order_by('bulan.id_bulan','asc');
		return $this->db->get('tblspp')->result_object();
	}
	function status($id_spp){
		$this->db->where('id_spp',$id_spp);
		return $this->db->get('byrspp')->num_rows();
	}
	function json($id_tahun_ajaran,$id_tingkat,$id_jurusan)
	{
        $this->datatables->select('
        	tblspp.id_spp,
        	tblspp.id_tahun_ajaran,
        	tblspp.jumlah,
        	tblspp.id_tingkat,
        	tblspp.id_jurusan,
        	tblspp.id_bulan,
        	bulan.id_bulan,
        	bulan.bulan,
        	CASE WHEN (SELECT id_spp from byrspp where id_spp=tblspp.id_spp) THEN "Lunas"
        	ELSE "Belum Lunas"
        	END as status',FALSE);
        $this->datatables->from('tblspp');
        $this->datatables->join('bulan','bulan.id_bulan=tblspp.id_bulan','left');
		$this->datatables->where('id_tahun_ajaran',$id_tahun_ajaran);
		$this->datatables->where('id_tingkat',$id_tingkat);
		$this->datatables->where('id_jurusan',$id_jurusan);
		$this->db->order_by('bulan.id_bulan','asc');
		
        return $this->datatables->generate();
	}
	function bayar($data){
		$this->db->insert($this->table3,$data);
	}
	function total_spp($id_tahun_ajaran,$id_tingkat,$id_jurusan){
		$this->db->select('jumlah,id_bulan');
		$this->db->select_sum('jumlah');
		$this->db->where('id_tahun_ajaran',$id_tahun_ajaran);
		$this->db->where('id_tingkat',$id_tingkat);
		$this->db->where('id_jurusan',$id_jurusan);
		$this->db->group_by(array('id_tahun_ajaran','id_tingkat','id_jurusan'));
		return $this->db->get('tblspp')->row();
	}
	function get_id_spp($id_spp){
		$this->db->where('id_spp',$id_spp);
		return $this->db->get('tblspp')->row();
	}
	function hapus_spp($id_spp)
    {
        $this->db->where('id_spp',$id_spp);
        $this->db->delete('byrspp');
    }


}

/* End of file M_transaksi.php */
/* Location: ./application/models/M_transaksi.php */