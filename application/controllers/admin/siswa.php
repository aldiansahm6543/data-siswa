<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

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
		$this->load->model('siswa_model');
	}

	public function input()
	{
			$data['judul'] = "Input Data Guru";
			$data['title'] = "Input";
			$data['kelas'] = $this->db->get('ruang_kelas')->result();
			$data['page'] = 'admin/siswa/siswa_input';
			view('template/v_template', $data);
	}

	public function do_input ()
	{

			$this->load->library('upload');
			$config['upload_path'] = './asset/img/siswa/'; //path folder
    		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
   			 $config['encrypt_name'] = FALSE; //nama yang terupload nantinya

   			 $this->upload->initialize($config);
    		if(!empty($_FILES['gambar']['name'])){
        		if ($this->upload->do_upload('gambar')){
        			$gbr = $this->upload->data();
            		//Compress Image
		            $config['image_library']='gd2';
		            $config['source_image']='./asset/img/siswa/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
		            $config['maintain_ratio']= FALSE;
		            $config['quality']= '60%';
		            $config['width']= 710;
		            $config['height']= 420;
		            $config['new_image']= './asset/img/siswa/'.$gbr['file_name'];
		            $this->load->library('image_lib', $config);
		            $this->image_lib->resize();
		     	do{
					$id = random_string('alnum',15);
					$cek = $this->db->where('id_siswa',$id)->get('siswa')->result();
					$cek_id = count($cek);
				}while($cek_id > 0);
					$nama = $this->input->post('nama',true);
					$ttl1 = $this->input->post('ttl1',true);
					$ttl2 = $this->input->post('ttl2',true);
					$nik = $this->input->post('nik',true);
					$data = [
						'id_siswa' => $id,
						'nik' => $nik,
						'id_kelas' => $this->input->post('id_kelas'),
						'nama' => $this->input->post('nama',true),
						'ttl' => $ttl1.' '.$ttl2,
						'thn_ajaran' => $this->input->post('thn_ajaran'),
						'nope' => $this->input->post('nope',true),
						'jk' => $this->input->post('jk',true),
						'photo' => $gbr['file_name'],
						'alamat' => $this->input->post('alamat',true),
						'agama' => $this->input->post('agama', true),
						'__active' => 1,
						'__created' => date('Y-m-d H:i:s')
					];
					$this->siswa_model->input($data);

					$data3 = [
						'id' => $id,
						'nik' => $nik,
						'id_kelas' => $this->input->post('id_kelas')
					];
					$this->siswa_model->shs($data3);

					$data2 = [
						'id' => $id,
						'nik' => $nik,
						'nama' => $this->input->post('nama',true),
						'username' => $this->input->post('nik',true),
						'password' => md5($this->input->post('password1')),
						'level' => 'siswa',
						'__active' => 0,
						'__created' => date('Y-m-d H:i:s')
						];
					$this->siswa_model->user($data2);

					$this->session->set_flashdata('info', 'Berhasi ditambahkan');
					redirect('admin/siswa/input');
				}else{
					echo "error";
	    		}
			}else {
				echo "error";
			}
	}

	public function lihatdata()
	{
		$data['title'] = 'list';
		$data['judul'] = "Lihat Data Siswa";
		$data['siswa'] = $this->siswa_model->getsiswa();
		if ($this->input->post('cari')) {
			$data['siswa'] = $this->siswa_model->cari();
		}
		$data['page'] = 'admin/siswa/siswa_list';
		view('template/v_template', $data);
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Nilai';
		$data['judul'] = "Edit Nilai";
		$data['kelas'] = $this->db->get('ruang_kelas')->result();
		$data['siswa'] = $this->siswa_model->getbyid($id);
		$data['page'] = 'admin/siswa/edit';
		view('template/v_template', $data);
	}

	public function do_edit()
	{

		$id_siswa = $this->input->post('id_siswa');
		$siswa['user'] = $this->db->get_where('siswa', ['id_siswa' => $id_siswa])->row_array();
			$data = [	
				'nik' => $this->input->post('nik'),
				'nama' => $this->input->post('nama',true),
				'ttl' => $this->input->post('ttl', true),
				'thn_ajaran' => $this->input->post('thn_ajaran',true),
				'nope' => $this->input->post('nope',true),
				'jk' => $this->input->post('jk',true),
				'alamat' => $this->input->post('alamat',true),
				'id_kelas' => $this->input->post('id_kelas',true),
				'agama' => $this->input->post('agama', true),
				'__active' => 1,
				'__updated' => date('Y-m-d H:i:s')
			];
			$upload_image = $_FILES['gambar']['name'];

			if ($upload_image) {
				$config['upload_path'] = './asset/img/siswa/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '2048';

				$this->load->library('upload', $config);
        		if ($this->upload->do_upload('gambar')){
        			$old_image = $siswa['user']['photo'];
						unlink(FCPATH . 'asset/img/siswa/' . $old_image);

					$new_image = $this->upload->data('file_name');
					$this->db->set('photo', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}	
			$this->db->where('id_siswa', $id_siswa);
			$this->db->update('siswa', $data);
			$this->session->set_flashdata('info', 'berhasil diubah');
			redirect('admin/siswa/lihatdata');
	}

	public function delete($id)
	{
		$user['siswa'] = $this->db->get_where('siswa', ['id_siswa' => $id])->row_array();
		$nik = $user['siswa']['nik'];
		$this->db->delete('siswa_has_kelas', ['nik' => $nik]);
		$this->db->delete('siswa', ['id_siswa' => $id]);
		
		$this->session->set_flashdata('info', 'berhasil dihapus');
		redirect('admin/siswa/lihatdata');
	}



	private function _rules()
	{
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required|numeric|is_unique[guru.nip]', [
			'is_unique' => 'This NIP has already registration!'
		]);
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('ttl1', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('ttl2', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('warganegara', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('nope', 'No Handphone', 'trim|required|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('gambar', 'Gambar', 'required');
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]',
			['matches' => 'password dont match!',
			'min_length' => 'password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
	}

}

/* End of file siswa.php */
/* Location: ./application/controllers/admin/siswa.php */