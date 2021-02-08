<?php 

class Berita extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data ['judul'] = 'Berita Sanggarsans';
		$data['user'] 	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['berita']	= $this->Admin_model->getAllberita();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita', $data);
		$this->load->view('templates/user_footer');
	}
}