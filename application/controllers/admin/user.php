<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->load->model('auth_model');
	}

	public function index()
	{
		$data['title'] = 'list';
		$data['judul'] = "Lihat Data User";
		$data['user'] = $this->auth_model->getuser();
		if ($this->input->post('cari')) {
			$data['user'] = $this->auth_model->cari();
		}
		elseif ($this->input->post('level')) {
			$data['user'] = $this->auth_model->getlevel();
		}
		$data['page'] = 'admin/user/index';
		view('template/v_template', $data);
	}

	public function nonaktif($id)
	{
		$data = [
				'__updated' => date('Y-m-d H:i:s'),
				'__active' => 0
			];
		$this->db->update('user', $data, ['id' => $id]);
		redirect('admin/user');
	}

	public function aktif($id)
	{
		$data = [
				'__updated' => date('Y-m-d H:i:s'),
				'__active' => 1
			];
		$this->db->update('user', $data, ['id' => $id]);
		redirect('admin/user');
	}

}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */