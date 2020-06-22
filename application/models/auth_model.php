<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function user_login()
	{
		$this->db->select('*');
		$this->db->from('guru');
		$this->db->join('user', 'user.id = guru.id_guru');
		$this->db->where(array('id' => $this->session->userdata('id')));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function siswa_login()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('user', 'user.id = siswa.id_siswa');
		$this->db->where(array('id' => $this->session->userdata('id')));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getuser()
	{
		$this->db->order_by('level');
		return $this->db->get('user')->result();
	}

	public function cari()
	{
		$keyword = $this->input->post('cari', true);
		$this->db->like('nama', $keyword );
		$this->db->or_like('nik', $keyword );
		$query = $this->db->get('user');
		return $query->result();
	}

	public function getlevel()
	{
		$keyword = $this->input->post('level', true);
		$this->db->order_by('level');
		$this->db->where(['level' => $keyword]);
		$query = $this->db->get('user');
		return $query->result();
	}

}

/* End of file auth_model.php */
/* Location: ./application/models/auth_model.php */