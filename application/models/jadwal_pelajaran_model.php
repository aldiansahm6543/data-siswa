<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_pelajaran_model extends CI_Model {

	public function input($data)
	{
		$this->db->insert('jadwal_pelajaran',$data);
	}	

	public function getjadwal()
	{
		$this->db->select('*');
		$this->db->from('jadwal_pelajaran');
		$this->db->join('ruang_kelas', 'ruang_kelas.id = jadwal_pelajaran.id_kelas');
		$this->db->join('guru', 'guru.nip = jadwal_pelajaran.nip');
		$this->db->join('mapel', 'mapel.kode_mapel = jadwal_pelajaran.kode_mapel');
		$this->db->order_by('hari', 'desc');
		$this->db->order_by('jam_awal');
		$this->db->where(['jadwal_pelajaran.nip' => $this->session->userdata('nik')]);
		$query = $this->db->get();
		return $query->result();
	}

	public function gethari()
	{
		$keyword = $this->input->post('hari', true);
		$this->db->from('jadwal_pelajaran');
		$this->db->join('ruang_kelas', 'ruang_kelas.id = jadwal_pelajaran.id_kelas');
		$this->db->join('guru', 'guru.nip = jadwal_pelajaran.nip');
		$this->db->join('mapel', 'mapel.kode_mapel = jadwal_pelajaran.kode_mapel');
		$this->db->order_by('jam_awal');
		$this->db->where(['jadwal_pelajaran.nip' => $this->session->userdata('nik'),'hari' => $keyword]);
		$query = $this->db->get();
		return $query->result();
	}

	public function getjadwalsiswa($id_kelas)
	{
		$this->db->select('*');
		$this->db->from('jadwal_pelajaran');
		$this->db->join('ruang_kelas', 'ruang_kelas.id = jadwal_pelajaran.id_kelas');
		$this->db->join('guru', 'guru.nip = jadwal_pelajaran.nip');
		$this->db->join('mapel', 'mapel.kode_mapel = jadwal_pelajaran.kode_mapel');
		$this->db->order_by('hari', 'desc');
		$this->db->order_by('jam_awal');
		$this->db->where(['id_kelas' => $id_kelas]);
		$query = $this->db->get();
		return $query->result();
	}

	public function getharisiswa($id_kelas)
	{
		$keyword = $this->input->post('hari', true);
		$this->db->from('jadwal_pelajaran');
		$this->db->join('ruang_kelas', 'ruang_kelas.id = jadwal_pelajaran.id_kelas');
		$this->db->join('guru', 'guru.nip = jadwal_pelajaran.nip');
		$this->db->join('mapel', 'mapel.kode_mapel = jadwal_pelajaran.kode_mapel');
		$this->db->order_by('jam_awal');
		$this->db->where(['id_kelas' => $id_kelas,'hari' => $keyword]);
		$query = $this->db->get();
		return $query->result();
	}

	public function jadwalpelajaran()
	{
		$this->db->select('*');
		$this->db->from('jadwal_pelajaran');
		$this->db->join('ruang_kelas', 'ruang_kelas.id = jadwal_pelajaran.id_kelas');
		$this->db->join('guru', 'guru.nip = jadwal_pelajaran.nip');
		$this->db->join('mapel', 'mapel.kode_mapel = jadwal_pelajaran.kode_mapel');
		$this->db->order_by('hari', 'desc');
		$this->db->order_by('nama_ruangan');
		$this->db->order_by('jam_awal');
		$query = $this->db->get();
		return $query->result();
	}

	public function cari()
	{
		$keyword = $this->input->post('kelas', true);
		$this->db->from('jadwal_pelajaran');
		$this->db->join('ruang_kelas', 'ruang_kelas.id = jadwal_pelajaran.id_kelas');
		$this->db->join('guru', 'guru.nip = jadwal_pelajaran.nip');
		$this->db->join('mapel', 'mapel.kode_mapel = jadwal_pelajaran.kode_mapel');
		$this->db->order_by('hari', 'desc');
		$this->db->order_by('nama_ruangan');
		$this->db->order_by('jam_awal');
		$this->db->where(['id_kelas' => $keyword]);
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file jadwal_pelajaran_model.php */
/* Location: ./application/models/jadwal_pelajaran_model.php */