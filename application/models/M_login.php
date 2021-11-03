<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	var $table = "tbl_login";
	function hash_string($string){
		$hashed_string = password_hash($string,PASSWORD_BCRYPT,['cost' => 9]);
		return $hashed_string;
	}
	function hash_verify($plain_text,$password_string){
		$hashed_string = password_verify($plain_text,$password_string);
		return $hashed_string;
	}
	function pecah($username){
		$this->db->where('username',$username);
		return $this->db->get($this->table)->row();
	}
	function cek($username){
		$this->db->where('username',$username);
		return $this->db->get($this->table)->row();
	}

}

/* End of file M_login.php */
/* Location: ./application/models/admin/M_login.php */