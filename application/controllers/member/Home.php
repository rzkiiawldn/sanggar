<?php 

class Home extends CI_Controller 
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		
		$data ['judul'] = 'Member';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sanggar'] = $this->db->query("SELECT * FROM user_sanggar us JOIN kategori_tipe_sanggar kt ON us.tipe_sanggar_id = kt.id")->result_array();
		$data['berita']	= $this->db->query("SELECT * FROM tb_berita LIMIT 4")->result_array();
		$data['event']	= $this->db->query("SELECT * FROM tb_event LIMIT 4")->result_array();
		$data['total_pendaftaran'] = $this->db->query("SELECT * FROM tb_pendaftaran")->num_rows();
		$data['kategori']	= $this->db->query("SELECT * FROM kategori_tipe_sanggar")->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/user_footer');
	}
}