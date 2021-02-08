<?php 

class Jadwal extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index($id_sanggar)
	{
		$data ['judul'] = 'Jadwal Sanggar';
		$user = $this->session->userdata('id');
		$data['sanggar'] = $this->db->query("SELECT * FROM user_sanggar WHERE id_sanggar='$id_sanggar'")->row_array();
		$data['jadwal'] = $this->db->query("SELECT * FROM s_jadwal_latihan jl JOIN s_kelas k ON jl.kelas_id = k.id WHERE jl.sanggar_id='$id_sanggar'")->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar');
		$this->load->view('user/jadwal/index', $data);
		$this->load->view('templates/user_footer');
	}
}