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
		if($level != 'siswa')
		{
			redirect('auth');
		}

		$this->load->model('auth_model');
	}

	public function index()
	{
		$data['title'] = 'dashboard';
		$data['page'] = 'siswa/dashboard';
		$data['user'] = $this->auth_model->siswa_login();
		view('template/v_template', $data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/guru/dashboard.php */