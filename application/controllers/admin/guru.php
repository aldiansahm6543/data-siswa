<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

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
		$this->load->model('guru_model');
		$this->load->helper('string');
		$this->load->library('form_validation');
	}

	public function input()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'input';
			$data['judul'] = "Input Data Guru";
			$data['page'] = 'admin/guru/guru_input';
			view('template/v_template', $data);
		} else {
			$this->do_input();
		}
			
	}

	public function do_input ()
	{
			$this->load->library('upload');
			$config['upload_path'] = './asset/img/guru/'; //path folder
    		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
   			 $config['encrypt_name'] = FALSE; //nama yang terupload nantinya

   			 $this->upload->initialize($config);
    		if(!empty($_FILES['gambar']['name'])){
        		if ($this->upload->do_upload('gambar')){
        			$gbr = $this->upload->data();
            		//Compress Image
		            $config['image_library']='gd2';
		            $config['source_image']='./asset/img/guru/'.$gbr['file_name'];
		            $config['create_thumb']= FALSE;
		            $config['maintain_ratio']= FALSE;
		            $config['quality']= '60%';
		            $config['width']= 710;
		            $config['height']= 420;
		            $config['new_image']= './asset/img/guru/'.$gbr['file_name'];
		            $this->load->library('image_lib', $config);
		            $this->image_lib->resize();
		     	do{
					$id = random_string('alnum',15);
					$cek = $this->db->where('id_guru',$id)->get('guru')->result();
					$cek_id = count($cek);
				}while($cek_id > 0);
					$nama = $this->input->post('nama',true);
					$ttl1 = $this->input->post('ttl1',true);
					$ttl2 = $this->input->post('ttl2',true);
					$nip = $this->input->post('nip',true);
					$data = [
						'id_guru' => $id,
						'nip' => $nip,
						'nama' => $this->input->post('nama',true),
						'ttl' => $ttl1.' '.$ttl2,
						'jabatan' => $this->input->post('jabatan',true),
						'nope' => $this->input->post('nope',true),
						'jk' => $this->input->post('jk',true),
						'photo' => $gbr['file_name'],
						'alamat' => $this->input->post('alamat',true),
						'warganegara' => $this->input->post('warganegara',true),
						'agama' => $this->input->post('agama', true),
						'__active' => 1,
						'__created' => date('Y-m-d H:i:s')
					];

					$this->guru_model->input($data);

					$data2 = [
						'id' => $id,
						'nik' => $nip,
						'nama' => $this->input->post('nama',true),
						'username' => $this->input->post('nip',true),
						'password' => md5($this->input->post('password1')),
						'level' => 'guru',
						'__active' => 0,
						'__created' => date('Y-m-d H:i:s')
						];
					$this->guru_model->user($data2);

					$this->session->set_flashdata('info', 'Berhasi ditambahkan');
					redirect('admin/guru/input');
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
		$data['judul'] = "Lihat Data Guru";
		$data['guru'] = $this->guru_model->getguru();
		if ($this->input->post('cari')) {
			$data['guru'] = $this->guru_model->cari();
		}
		$data['page'] = 'admin/guru/guru_list';
		view('template/v_template', $data);
	}

	public function edit($id)
	{
			$data['title'] = 'list';
			$data['judul'] = "Lihat Data Guru";
			$data['guru'] = $this->guru_model->getid($id);
			$data['page'] = 'admin/guru/guru_edit';
			view('template/v_template', $data);
	}

	public function do_edit()
	{

		$id_guru = $this->input->post('id_guru');
		$guru['user'] = $this->db->get_where('guru', ['id_guru' => $id_guru])->row_array();
			$data = [	
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama',true),
				'ttl' => $this->input->post('ttl', true),
				'jabatan' => $this->input->post('jabatan',true),
				'nope' => $this->input->post('nope',true),
				'jk' => $this->input->post('jk',true),
				'alamat' => $this->input->post('alamat',true),
				'warganegara' => $this->input->post('warganegara',true),
				'agama' => $this->input->post('agama', true),
				'__active' => 1,
				'__updated' => date('Y-m-d H:i:s')
			];
			$upload_image = $_FILES['gambar']['name'];

			if ($upload_image) {
				$config['upload_path'] = './asset/img/guru/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '2048';

				$this->load->library('upload', $config);
        		if ($this->upload->do_upload('gambar')){
        			$old_image = $guru['user']['photo'];
						unlink(FCPATH . 'asset/img/guru/' . $old_image);

					$new_image = $this->upload->data('file_name');
					$this->db->set('photo', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}	
			$this->db->where('id_guru', $id_guru);
			$this->db->update('guru', $data);
			$this->session->set_flashdata('info', 'berhasil diubah');
			redirect('admin/guru/lihatdata');
	}

	public function delete($id)
	{
		$this->db->delete('guru', ['id_guru' => $id]);
		$this->session->set_flashdata('info', 'berhasil dihapus');
		redirect('admin/guru/lihatdata');
	}




	private function _rules()
	{
		$this->form_validation->set_rules('nip', 'NIP', 'trim|required|numeric|is_unique[guru.nip]', [
			'is_unique' => 'This NIP has already registration!'
		]);
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('ttl1', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('ttl2', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('ttl', 'Tempat Tanggal Lahir', 'trim|required');
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

/* End of file guru.php */
/* Location: ./application/controllers/admin/guru.php */