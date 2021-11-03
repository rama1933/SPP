<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_createpdf extends CI_Model {

	function spp($NIS,$id_spp){
		return $this->db->query('SELECT 
			byrspp.id_spp,
			byrspp.NIS,
			byrspp.tgl_bayar,
			tblspp.id_spp,
			tblspp.id_tahun_ajaran,
			tblspp.jumlah,
			tblspp.id_tingkat,
			tblspp.id_jurusan,
			tblspp.id_bulan,
			bulan.id_bulan,
            tblsiswa.nama,
            tblsiswa.id_tahun_ajaran,
            tblsiswa.id_kelas,
            kelas.id_kelas,
            kelas.kelas,
            kelas.id_tingkat,
            kelas.id_jurusan,
            tingkat.id_tingkat,
            tingkat.tingkat,
            tahun_ajaran.id_tahun_ajaran,
            tahun_ajaran.tahun,
           	jurusan.id_jurusan,
            jurusan.jurusan,
			bulan.bulan
            FROM byrspp
            LEFT JOIN tblspp ON tblspp.id_spp=byrspp.id_spp
            LEFT JOIN bulan ON bulan.id_bulan=tblspp.id_bulan
            LEFT JOIN tblsiswa ON tblsiswa.NIS = byrspp.NIS
            LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = tblspp.id_tahun_ajaran
            LEFT JOIN kelas ON kelas.id_kelas=tblsiswa.id_kelas
            LEFT JOIN tingkat ON tingkat.id_tingkat = kelas.id_tingkat
            LEFT JOIN jurusan ON jurusan.id_jurusan = kelas.id_jurusan
            
            WHERE byrspp.NIS='.$NIS.' AND tblspp.id_spp='.$id_spp.'

			')->row();

	}
      function iuran($NIS,$id_iuran){
           return $this->db->query('SELECT 
            byrnonspp.id_bayar_iuran,
            byrnonspp.NIS,
            byrnonspp.jumlah_bayar,
            byrnonspp.tgl_bayar,
            byrnonspp.id_iuran,
            tbliuran.id_iuran,
            tbliuran.id_tahun_ajaran,
            tbliuran.jumlah,
            tbliuran.id_tingkat,
            tbliuran.id_jurusan,
            tbliuran.jenis_iuran,
            tblsiswa.nama,
            tblsiswa.id_tahun_ajaran,
            tblsiswa.id_kelas,
            kelas.id_kelas,
            kelas.kelas,
            kelas.id_tingkat,
            kelas.id_jurusan,
            tingkat.id_tingkat,
            tingkat.tingkat,
            tahun_ajaran.id_tahun_ajaran,
            tahun_ajaran.tahun,
            jurusan.id_jurusan,
            jurusan.jurusan
            FROM byrnonspp
            LEFT JOIN tbliuran ON tbliuran.id_iuran=byrnonspp.id_iuran
            LEFT JOIN tblsiswa ON tblsiswa.NIS = byrnonspp.NIS
            LEFT JOIN tahun_ajaran ON tahun_ajaran.id_tahun_ajaran = tbliuran.id_tahun_ajaran
            LEFT JOIN kelas ON kelas.id_kelas=tblsiswa.id_kelas
            LEFT JOIN tingkat ON tingkat.id_tingkat = kelas.id_tingkat
            LEFT JOIN jurusan ON jurusan.id_jurusan = kelas.id_jurusan
            WHERE byrnonspp.NIS='.$NIS.' AND tbliuran.id_iuran='.$id_iuran.'

            ')->row();
      }
      function cek_iuran($NIS,$id_iuran){
            return $this->db->query('SELECT sum(jumlah_bayar) as jml FROM byrnonspp WHERE NIS='.$NIS.' AND id_iuran='.$id_iuran.' GROUP BY id_iuran    ')->row();
      }
      function cek_jumlah_iuran($id_iuran){
            $this->db->select('jumlah');
            $this->db->where('id_iuran',$id_iuran);
            return $this->db->get('tbliuran')->row();
      }
            


}

/* End of file M_createpdf.php */
/* Location: ./application/models/M_createpdf.php */