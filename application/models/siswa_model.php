<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	public function input($data)
	{
		$this->db->insert('siswa',$data);
	}	

	public function user($data2)
	{
		$this->db->insert('user',$data2);
	}

	public function shs($data3)
	{
		$this->db->insert('siswa_has_kelas', $data3);
	}

	public function getsiswa()
	{
		$this->db->from('siswa');
		$this->db->join('ruang_kelas', 'ruang_kelas.id = siswa.id_kelas');
		$this->db->order_by('nama_ruangan');
		$this->db->order_by('nama');
		$query = $this->db->get();
		return $query->result();
	}

	public function cari()
	{
		$keyword = $this->input->post('cari', true);
		$this->db->from('siswa');
		$this->db->join('ruang_kelas', 'ruang_kelas.id = siswa.id_kelas');
		$this->db->order_by('nama_ruangan');
		$this->db->order_by('nama');
		$this->db->like('nama', $keyword );
		$this->db->or_like('nik', $keyword );
		$query = $this->db->get();
		return $query->result();
	}

	public function getbyid($id)
	{
		$this->db->from('siswa');
		$this->db->join('ruang_kelas', 'ruang_kelas.id = siswa.id_kelas');
		$this->db->order_by('nama_ruangan');
		$this->db->order_by('nama');
		$this->db->where(['id_siswa' => $id]);
		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file guru_model.php */
/* Location: ./application/models/guru_model.php */