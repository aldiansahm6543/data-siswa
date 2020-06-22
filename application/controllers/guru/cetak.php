<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

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
		$this->load->model('nilai_model');
	}

	public function nilai()
	{
		
		$data['nilai'] = $this->nilai_model->nilai();

		$html = $this->load->view('guru/nilai/pdf',$data,true);
        require_once('./asset/html2pdf/html2pdf.class.php');
	    $pdf = new HTML2PDF('P','A4','en');
	    $pdf->WriteHTML($html);
	    $pdf->Output('Data Siswa.pdf', 'D');
	}

}

/* End of file nilai.php */
/* Location: ./application/controllers/admin/nilai.php */