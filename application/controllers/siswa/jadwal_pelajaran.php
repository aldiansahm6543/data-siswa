<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_pelajaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$logged_in = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(empty($logged_in))
		{
			redirect('auth');
		}
		if($level != 'siswa')
		{
			redirect('auth');
		}

		$this->load->model('auth_model');
		$this->load->model('jadwal_pelajaran_model', 'jadwal');
	}

	public function index()
	{
		$data['title'] = 'jadwal';
		$data['judul'] = "Jadwal Pelajaran";
		$data['user'] = $this->auth_model->siswa_login();
		$nik = $this->session->userdata('nik');
		$id_kelas = $this->db->where('nik',$nik)->get('siswa_has_kelas')->row();
		$id_kelas = $id_kelas->id_kelas;
		$kelas = $this->db->select('siswa_has_kelas.nik,ruang_kelas.nama_ruangan,ruang_kelas.id as id_kelas')->from('siswa_has_kelas')->join('ruang_kelas','ruang_kelas.id=siswa_has_kelas.id_kelas')->get()->row();
		$data['jadwal'] = $this->jadwal->getjadwalsiswa($id_kelas);
		if ($this->input->post('hari')) {
			$data['jadwal'] = $this->jadwal->getharisiswa($id_kelas);
		}
		$data['page'] = 'siswa/jadwal-pelajaran/index';
		view('template/v_template', $data);
	}

}

/* End of file jadwal_pelajaran.php */
/* Location: ./application/controllers/siswa/jadwal_pelajaran.php */