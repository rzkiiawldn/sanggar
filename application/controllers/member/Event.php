<?php 

class Event extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data ['judul'] = 'Event Sanggarsans';
		$data['user'] 	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['event']	= $this->Admin_model->getAllEvent();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/event', $data);
		$this->load->view('templates/user_footer');
	}
}