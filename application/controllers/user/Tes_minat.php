<?php 

class Tes_minat extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}

	public function index()
	{
		$this->db->empty_table('profile_matching_nilai');
		$this->db->empty_table('profile_matching_rangking');
		$data = [
			'judul'				=> 'Tes Minat',
			'user'				=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'			=> $this->session->userdata('nama'),
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/tes_minat/index', $data);
		$this->load->view('templates/user_footer');
	}
}