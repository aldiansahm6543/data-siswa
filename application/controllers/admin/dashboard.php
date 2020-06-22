<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$logged_in = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(empty($logged_in))
		{
			redirect('auth');
		}
		if($level != 'admin')
		{
			redirect('auth');
		}
	}

	public function index()
	{
		$siswa = $this->db->get('siswa')->result();
		$data['total_siswa'] = count($siswa);
		$guru = $this->db->get('guru')->result();
		$data['total_guru'] = count($guru);
		$kelas = $this->db->get('ruang_kelas')->result();
		$data['total_kelas'] = count($kelas);
		$mapel = $this->db->get('mapel')->result();
		$data['total_mapel'] = count($mapel);
		$data['title'] = 'dashboard';
		$data['page'] = 'admin/dashboard';
		view('template/v_template', $data);
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */