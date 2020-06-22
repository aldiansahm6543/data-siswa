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
		if($level != 'guru')
		{
			redirect('auth');
		}

		$this->load->model('auth_model');
		$this->load->model('jadwal_pelajaran_model', 'jadwal');
		$this->load->helper('string');
	}

	public function index()
	{
		$data['title'] = 'Jadwal Pelajaran';
		$data['user'] = $this->auth_model->user_login();
		$data['jadwal'] = $this->jadwal->getjadwal();
		if ($this->input->post('hari')) {
			$data['jadwal'] = $this->jadwal->gethari();
		}
		$data['page'] = 'guru/jadwal-pelajaran/list';
		view('template/v_template', $data);
	}

}

/* End of file jadwal_pelajaran.php */
/* Location: ./application/controllers/guru/jadwal_pelajaran.php */