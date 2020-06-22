<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mata_pelajaran extends CI_Controller {

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
		$this->load->helper('string');
		$this->load->library('form_validation');
		
	}

	public function input()
	{
		
		$this->form_validation->set_rules('kode_mapel', 'Kode Mapel', 'trim|required');
		$this->form_validation->set_rules('nama_mapel', 'Kode Mapel', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = "Input Mata Pelajaran";
			$data['title'] = "Input";
			$data['page'] = 'admin/mata-pelajaran/mata_pelajaran_input';
			view('template/v_template', $data);
		} else {
			do{
			$id = random_string('alnum',15);
			$cek = $this->db->where('id',$id)->get('mapel')->result();
			$cek_id = count($cek);
			}while($cek_id > 0);

				$data['id'] = $id;
				$data['kode_mapel'] = $this->input->post('kode_mapel',true);
				$data['nama_mapel'] = $this->input->post('nama_mapel',true);
				$nama = $this->input->post('nama_mapel',true);

				$this->db->insert('mapel',$data);
				$this->session->set_flashdata('info', 'Berhasi ditambahkan');
					redirect('admin/mata_pelajaran/input');
		}

		
	}

	public function lihatdata()
	{
		$data['title'] = 'list';
		$data['judul'] = "Lihat Data Mata pelajaran";
		$data['mapel'] = $this->db->get('mapel')->result();
		$data['page'] = 'admin/mata-pelajaran/lihatdata';
		view('template/v_template', $data);
	}

	public function edit($id)
	{
		$data['title'] = 'list';
		$data['judul'] = "Lihat Data Mata pelajaran";
		$data['mapel'] = $this->db->get_where('mapel', ['id' => $id])->row();
		$data['page'] = 'admin/mata-pelajaran/edit';
		view('template/v_template', $data);
	}

	public function do_edit()
	{
		$id = $this->input->post('id');
			$kode_mapel = $this->input->post('kode_mapel');
			$nama_mapel = $this->input->post('nama_mapel');
		$this->db->set('kode_mapel', $kode_mapel);
		$this->db->set('nama_mapel', $nama_mapel);
		$this->db->where(['id' => $id]);
		$this->db->update('mapel');
		$this->session->set_flashdata('info', 'Berhasi diubah');
		redirect('admin/mata_pelajaran/lihatdata');
	}

}

/* End of file mata_pelajaran.php */
/* Location: ./application/controllers/admin/mata_pelajaran.php */