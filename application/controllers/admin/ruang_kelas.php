<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang_kelas extends CI_Controller {

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
		$this->load->model('ruang_kelas_model');
		$this->load->helper('string');
		$this->load->library('form_validation');
	}

	public function input()
	{
		$data['title'] = 'Input';
		$data['judul'] = 'Input Data Ruang Kelas';
		$data['page'] = 'admin/ruang-kelas/ruang_kelas_input';
		view('template/v_template', $data);
	}

	public function do_input()
	{
		$this->form_validation->set_rules('nama1', 'Nama Kelas', 'trim|required');
		$this->form_validation->set_rules('nama2', 'Jurusan', 'trim|required');
		$this->form_validation->set_rules('nama3', 'Nomor Kelas', 'trim|required');
		$this->form_validation->set_rules('jumlah_siswa', 'Jumlah Siswa', 'trim|required|numeric');
		$nama1 = $this->input->post('nama1',true);
		$nama2 = $this->input->post('nama2',true);
		$nama3 = $this->input->post('nama3',true);
		$jsiswa = $this->input->post('jumlah_siswa',true);
		$nama_ruangan = $nama1.' '.$nama2.' '.$nama3;

		do{
			$id = random_string('alnum', 10);
			$cek_id = $this->db->where('id',$id)->get('ruang_kelas')->result();
			$cek_id2 = count($cek_id);
		}while($cek_id2 > 0);

		$data = [
			'id' => $id,
			'nama_ruangan' => $nama_ruangan,
			'jumlah_siswa' => $jsiswa
		];
		$this->ruang_kelas_model->input($data);
		$this->session->set_flashdata('info','berhasil ditambahkan');

		redirect('admin/ruang_kelas/input');
	}

	public function lihatdata()
	{
		$data['title'] = 'list';
		$data['judul'] = "Lihat Data Kelas";
		$data['kelas'] = $this->ruang_kelas_model->getkelas();
		$data['page'] = 'admin/ruang-kelas/lihatdata';
		view('template/v_template', $data);
	}

	public function edit($id)
	{
		$data['title'] = 'Edit';
		$data['judul'] = "Edit Data Kelas";
		$data['kelas'] = $this->db->get_where('ruang_kelas', ['id' => $id])->row();
		$data['page'] = 'admin/ruang-kelas/edit';
		view('template/v_template', $data);
	}

	public function do_edit()
	{
		$id = $this->input->post('id');
		$kelas = $this->input->post('nama');
		$jumlah = $this->input->post('jumlah');
		$this->db->set('nama_ruangan', $kelas);
		$this->db->set('jumlah_siswa', $jumlah);
		$this->db->where(['id' => $id]);
		$this->db->update('ruang_kelas');
		$this->session->set_flashdata('info','berhasil diubah');
		redirect('admin/ruang_kelas/lihatdata');
	}

	public function delete($id)
	{
		$delete = $this->db->delete('ruang_kelas', ['id' => $id]);
		if (!$delete) {
			$this->session->set_flashdata('info','gagal dihapus');
			redirect('admin/ruang_kelas/lihatdata');	
		} else {
			$this->session->set_flashdata('info','berhasil dihapus');
			redirect('admin/ruang_kelas/lihatdata');
		}
	}

}

/* End of file ruang_kelas.php */
/* Location: ./application/controllers/admin/ruang_kelas.php */