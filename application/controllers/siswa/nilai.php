<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

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
		$this->load->model('nilai_model', 'nilai');
	}

	public function semester_ganjil()
	{
		$data['title'] = 'Nilai';
		$data['judul'] = "Nilai Semester Ganjil";
		$data['semester'] = $this->nilai->semester_ganjil();
		$data['page'] = 'siswa/nilai/semester_ganjil';
		$data['user'] = $this->auth_model->siswa_login();
		view('template/v_template', $data);
	}

	public function semester_genap()
	{
		$data['title'] = 'Nilai';
		$data['judul'] = "Nilai Semester Genap";
		$data['semester'] = $this->nilai->semester_genap();
		$data['page'] = 'siswa/nilai/semester_genap';
		$data['user'] = $this->auth_model->siswa_login();
		view('template/v_template', $data);
	}

}

/* End of file nilai.php */
/* Location: ./application/controllers/siswa/nilai.php */