<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

	public function input($data)
	{
		$this->db->insert('guru',$data);
	}	

	public function user($data2)
	{
		$this->db->insert('user',$data2);
	}

	public function getguru()
	{
		$this->db->order_by('nama');
		return $this->db->get('guru')->result();
	}

	public function getkelas()
	{
		$this->db->get('ruang_kelas')->result();
	}

	public function getsiswa()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('ruang_kelas', 'ruang_kelas.id = siswa.id_kelas');
		$query = $this->db->get();
		return $query->result();
	}

	public function getsk()
	{
		$keyword = $this->input->post('kelas', true);
		$this->db->from('siswa');
		$this->db->join('ruang_kelas', 'ruang_kelas.id = siswa.id_kelas');
		$this->db->where(['id_kelas' => $keyword ]);
		$query = $this->db->get();
		return $query->result();
	}

	public function getbyId($id)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('ruang_kelas', 'ruang_kelas.id = siswa.id_kelas');
		$this->db->where(['id_siswa' => $id ]);
		$query = $this->db->get();
		return $query->row();
	}

	public function mapel()
	{
		return $this->db->get('mapel')->result();
	}

	public function cari()
	{
		$keyword = $this->input->post('cari', true);
		$this->db->from('guru');
		$this->db->like('nama', $keyword );
		$this->db->or_like('nip', $keyword );
		$query = $this->db->get();
		return $query->result();
	}

	public function getid($id)
	{
		return $this->db->get_where('guru', ['id_guru' => $id])->row();
	}

}

/* End of file guru_model.php */
/* Location: ./application/models/guru_model.php */