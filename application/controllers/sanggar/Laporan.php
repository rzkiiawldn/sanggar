<?php 

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data['judul'] = 'Halaman Laporan';
		$user = $this->session->userdata('id_sanggar');
		$data['user_sanggar'] 		= $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array();
		$data['user_sanggar'] 		= $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/laporan/index', $data);
		$this->load->view('templates/sanggar_footer');
	}
}