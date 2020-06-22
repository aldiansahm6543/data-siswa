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
		if($level != 'siswa')
		{
			redirect('auth');
		}

		$this->load->model('auth_model');
		$this->load->model('nilai_model', 'nilai');
	}

	public function semester_ganjil()
	{
		$data['ganjil'] = $this->nilai->semester_ganjil();

		$html = $this->load->view('siswa/nilai/pdf',$data,true);
        require_once('./asset/html2pdf/html2pdf.class.php');
	    $pdf = new HTML2PDF('P','A4','en');
	    $pdf->WriteHTML($html);
	    $pdf->Output('Nilai_semester_ganjil.pdf', 'D');
	}

	public function semester_genap()
	{
		$data['ganjil'] = $this->nilai->semester_genap();

		$html = $this->load->view('siswa/nilai/pdf',$data,true);
        require_once('./asset/html2pdf/html2pdf.class.php');
	    $pdf = new HTML2PDF('P','A4','en');
	    $pdf->WriteHTML($html);
	    $pdf->Output('Nilai_semester_genap.pdf', 'D');
	}

}

/* End of file cetak.php */
/* Location: ./application/controllers/siswa/cetak.php */