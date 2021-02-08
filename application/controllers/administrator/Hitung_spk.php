<?php 

class Hitung_spk extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data['judul'] = 'Hitung';
		$data['profile_matching'] = $this->db->query("SELECT * FROM profile_matching JOIN user_sanggar ON profile_matching.nama = user_sanggar.id_sanggar")->result_array();
		$data['pm'] = $this->M_spk->hitung($data['profile_matching']);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/kriteria/index2', $data);
		$this->load->view('templates/admin_footer');
	}
}