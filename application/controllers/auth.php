<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			view('auth/login');
		} else {
			$this->_login();
		}
		
	}

	private function _login()
	{
		$email = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$user = $this->db->get_where('user', ['username' => $email])->row_array();
		if ($user) {
			if ($user['__active'] == 1) {
				if ($user['password'] == $password) {
					$data = [
						'logged_in' => true,
						'id' => $user['id'],
						'nama' => $user['nama'],
						'nik' => $user['nik'],
						'level' => $user['level']
					];
					$this->session->set_userdata($data);
					if ($user['level'] == admin) {
						redirect('admin/dashboard');
					}
					elseif ($user['level'] == guru) {
						redirect('guru/dashboard');
					}
					elseif ($user['level'] == siswa) {
						redirect('siswa/dashboard');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">this user has not been activated!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">user is not registered</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('nik');
		$this->session->unset_userdata('level');
		session_destroy();

		redirect('auth');
	}

}