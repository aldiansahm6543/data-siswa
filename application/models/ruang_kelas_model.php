<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang_kelas_model extends CI_Model {

	public function input($data)
	{
		$this->db->insert('ruang_kelas',$data);
	}

	public function getkelas()
	{
		$this->db->order_by('nama_ruangan');
		return $this->db->get('ruang_kelas')->result();
	}

}

/* End of file ruang_kelas_model.php */
/* Location: ./application/models/ruang_kelas_model.php */