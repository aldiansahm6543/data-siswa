<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {

	public function input($data)
	{
		$this->db->insert('nilai_siswa',$data);
	}

	public function getkelas()
	{
		$keyword = $this->input->post('kelas', true);
		$this->db->select('*');
		$this->db->from('nilai_siswa');
		$this->db->join('ruang_kelas', 'ruang_kelas.id = nilai_siswa.id_kelas');
		$this->db->join('siswa', 'siswa.nik = nilai_siswa.nik_siswa');
		$this->db->join('mapel', 'mapel.kode_mapel = nilai_siswa.kode_mapel');
		$this->db->order_by('semester');
		$this->db->order_by('nama_ruangan');
		$this->db->order_by('nama');
		$this->db->where(['nilai_siswa.id_kelas' => $keyword, 'nip_guru' => $this->session->userdata('nik')]);
		$query = $this->db->get();
		return $query->result();
	}
	public function getnilai($id)
	{
		$this->db->select('*');
		$this->db->from('nilai_siswa');
		$this->db->join('ruang_kelas', 'ruang_kelas.id = nilai_siswa.id_kelas');
		$this->db->join('siswa', 'siswa.nik = nilai_siswa.nik_siswa');
		$this->db->join('mapel', 'mapel.kode_mapel = nilai_siswa.kode_mapel');
		$this->db->where(['id_nilai' => $id]);
		$query = $this->db->get();
		return $query->row();
	}

	public function nilai()
	{
		$this->db->select('*');
		$this->db->from('nilai_siswa');
		$this->db->join('ruang_kelas', 'ruang_kelas.id = nilai_siswa.id_kelas');
		$this->db->join('siswa', 'siswa.nik = nilai_siswa.nik_siswa');
		$this->db->join('mapel', 'mapel.kode_mapel = nilai_siswa.kode_mapel');
		$this->db->order_by('semester');
		$this->db->order_by('nama_ruangan');
		$this->db->order_by('nama');
		$this->db->where(['nip_guru' => $this->session->userdata('nik')]);
		$query = $this->db->get();
		return $query->result();
	}

	public function semester_ganjil()
	{
		$this->db->select('*');
		$this->db->from('nilai_siswa');
		$this->db->join('siswa', 'siswa.nik = nilai_siswa.nik_siswa');
		$this->db->join('mapel', 'mapel.kode_mapel = nilai_siswa.kode_mapel');
		$this->db->where(['semester' => 'Ganjil', 'nik' => $this->session->userdata('nik')]);
		$query = $this->db->get();
		return $query->result();
	}

	public function semester_genap()
	{
		$this->db->select('*');
		$this->db->from('nilai_siswa');
		$this->db->join('siswa', 'siswa.nik = nilai_siswa.nik_siswa');
		$this->db->join('mapel', 'mapel.kode_mapel = nilai_siswa.kode_mapel');
		$this->db->where(['semester' => 'Genap', 'nik' => $this->session->userdata('nik')]);
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file nilai_model.php */
/* Location: ./application/models/nilai_model.php */