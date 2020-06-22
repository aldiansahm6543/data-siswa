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
		if($level != 'admin')
		{
			redirect('auth');
		}

		$this->load->helper('string');
		$this->load->model('jadwal_pelajaran_model', 'jadwal');
	}

	public function input()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$data['mapel'] = $this->db->get('mapel')->result();
			$data['kelas'] = $this->db->order_by('nama_ruangan')->get('ruang_kelas')->result();
			$data['guru'] = $this->db->get('guru')->result();
			$data['title'] = 'input';
			$data['judul'] = "Input Jadwal Pelajaran";
			$data['page'] = 'admin/jadwal-pelajaran/create';
			view('template/v_template', $data);
		} else {
			do{
				$id = random_string('alnum',15);
				$cek = $this->db->where('id',$id)->get('jadwal_pelajaran')->result();
				$cek_id = count($cek);
			}while($cek_id > 0);

			$data = [
				'jam_awal' => $this->input->post('jam_awal',true),
				'menit_awal' => $this->input->post('menit_awal',true),
				'jam_akhir' => $this->input->post('jam_akhir',true),
				'menit_akhir' => $this->input->post('menit_akhir',true),
				'id' => $id,
				'id_kelas' => $this->input->post('id_kelas',true),
				'kode_mapel' => $this->input->post('kode_mapel',true),
				'hari' => $this->input->post('hari',true),
				'nip' => $this->input->post('nip',true)
			];

			$this->jadwal->input($data);

			$this->session->set_flashdata('info','Berhasil Ditambahkan');
			redirect('admin/jadwal_pelajaran/input');
		}	
	}

	public function lihatdata()
	{
		$data['title'] = 'list';
		$data['judul'] = "Lihat Data Guru";
		$data['jadwal'] = $this->jadwal->jadwalpelajaran();
		$data['kelas'] = $this->db->order_by('nama_ruangan')->get('ruang_kelas')->result();
		if ($this->input->post('kelas')) {
			$data['jadwal'] = $this->jadwal->cari();
		}
		$data['page'] = 'admin/jadwal-pelajaran/lihatdata';
		view('template/v_template', $data);
	}

	private function _rules()
	{
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('kode_mapel', 'Mata Pelajaran', 'trim|required');
		$this->form_validation->set_rules('hari', 'Hari', 'trim|required');
		$this->form_validation->set_rules('nip', 'Guru', 'trim|required');
	}

}

/* End of file jadwal_pelajaran.php */
/* Location: ./application/controllers/admin/jadwal_pelajaran.php */