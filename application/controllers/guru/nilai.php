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
		if($level != 'guru')
		{
			redirect('auth');
		}

		$this->load->model('auth_model');
		$this->load->model('guru_model');
		$this->load->model('nilai_model');
		$this->load->helper('string');
	}

	public function input()
	{
		$data['title'] = 'input';
		$data['judul'] = "Input Data Siswa";
		$data['kelas'] = $this->db->like('nama_ruangan')->get('ruang_kelas')->result();
		$data['siswa'] = $this->guru_model->getsiswa();
		if ($this->input->post('kelas')) {
			$data['siswa'] = $this->guru_model->getsk();
		}
		$data['user'] = $this->auth_model->user_login();
		$data['page'] = 'guru/nilai/nilai_input';
		view('template/v_template', $data);
	}

	public function do_input($id)
	{
			$data['title'] = 'input';
			$data['judul'] = "input nilai";
			$data['siswa'] = $this->guru_model->getbyId($id);
			$data['mapel'] = $this->guru_model->mapel();
			$data['user'] = $this->auth_model->user_login();
			$data['page'] = 'guru/nilai/nilai_do_input';
			view('template/v_template', $data);
	}

	public function insert()
	{
			do{
				$iid = random_string('alnum',15);
				$cek = $this->db->where('id_nilai',$iid)->get('nilai_siswa')->result();
				$cek_id = count($cek);
			}while($cek_id > 0);
			$tugas = $this->input->post('tugas',true);
			$uts = $this->input->post('uts',true);
			$uas = $this->input->post('uas',true);
			$data = [
				'id_nilai' => $iid,
				'nik_siswa' => $this->input->post('nik_siswa'),
				'id_kelas' => $this->input->post('kelas'),
				'kode_mapel' => $this->input->post('mapel',true),
				'semester' => $this->input->post('semester',true),
				'thn_ajaran' => $this->input->post('thn_ajaran',true),
				'tugas' => $tugas,
				'uts' => $uts,
				'uas' => $uas,
				'rata' => ($tugas + $uts + $uas) / 3,
				'nip_guru' => $this->session->userdata('nik')
			];

			$this->nilai_model->input($data);
			$this->session->set_flashdata('info','Nilai berhasil di input');
			redirect('guru/nilai/input');
	}

	public function list_nilai()
	{
		$data['title'] = 'List';
		$data['judul'] = "List Nilai";
		$data['kelas'] = $this->db->order_by('nama_ruangan')->get('ruang_kelas')->result();
		$data['list_nilai'] = $this->nilai_model->nilai();
		if ($this->input->post('kelas')) {
			$data['list_nilai'] = $this->nilai_model->getkelas();
		}
		$data['user'] = $this->auth_model->user_login();
		$data['page'] = 'guru/nilai/nilai_list';
		view('template/v_template', $data);
	}

	public function edit($id)
	{
		$data['title'] = 'List';
		$data['judul'] = "Edit Nilai";
		$data['mapel'] = $this->guru_model->mapel();
		$data['nilai_siswa'] = $this->nilai_model->getnilai($id); 
		$data['user'] = $this->auth_model->user_login();
		$data['page'] = 'guru/nilai/edit';
		view('template/v_template', $data);
	}

	public function do_edit()
	{
		$tugas = $this->input->post('tugas');
		$uts = $this->input->post('uts');
		$uas = $this->input->post('uas');
		$id_nilai = $this->input->post('id_nilai');
		$data = [
			'kode_mapel' => $this->input->post('mapel'),
			'semester' => $this->input->post('semester'),
			'thn_ajaran' => $this->input->post('thn_ajaran'),
			'tugas' => $tugas,
			'uas' => $uts,
			'uts' => $uas,
			'rata' => ($tugas + $uts + $uas) / 3
		];

		$this->db->where('id_nilai', $id_nilai);
		$this->db->update('nilai_siswa', $data);
		$this->session->set_flashdata('info','berhasil di edit');
		redirect('guru/nilai/list_nilai');
		
	}

	public function hapus($id)
	{
		$this->db->where(['id_nilai' => $id]);
		$this->db->delete('nilai_siswa');
		$this->session->set_flashdata('info','berhasil dihapus');
		redirect('guru/nilai/list_nilai');
	}






	private function _rules()
	{
		$this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'trim|required');
		$this->form_validation->set_rules('semester', 'Semester', 'trim|required');
		$this->form_validation->set_rules('thn_ajaran', 'Mata Pelajaran', 'trim|required');
		$this->form_validation->set_rules('tugas', 'Tugas', 'trim|required|numeric');
		$this->form_validation->set_rules('uas', 'Uas', 'trim|required|numeric');
		$this->form_validation->set_rules('uts', 'Uts', 'trim|required|numeric');
	}

}

/* End of file nilai.php */
/* Location: ./application/controllers/guru/nilai.php */