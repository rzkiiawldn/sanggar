<?php 

class Banding extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data ['judul'] = 'Bandingkan Sanggar';
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sanggar']	= $this->db->query("SELECT * FROM user_sanggar JOIN kategori_tipe_sanggar ON user_sanggar.tipe_sanggar_id = kategori_tipe_sanggar.id")->result_array();
		$data['kategori']	= $this->db->query("SELECT * FROM kategori_tipe_sanggar")->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/banding', $data);
		$this->load->view('templates/user_footer');
	}

	public function bandingkan()
	{
		$this->_rulesbanding();

		if($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$tipe_sanggar_id = $this->input->post('tipe_sanggar_id', true);

			$query 	= $this->db->query("SELECT * FROM user_sanggar JOIN kategori_tipe_sanggar ON user_sanggar.tipe_sanggar_id = kategori_tipe_sanggar.id WHERE user_sanggar.tipe_sanggar_id = '$tipe_sanggar_id'")->result_array();

			$data = [
				'sanggar'		=>	$query,
				'tipe_sanggar_id'	=> $tipe_sanggar_id
				];

			$data = [
				'judul'			=> 'Bandingkan sanggar',
				'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
				'sanggar'		=> $this->db->query("SELECT * FROM user_sanggar JOIN kategori_tipe_sanggar ON user_sanggar.tipe_sanggar_id = kategori_tipe_sanggar.id WHERE user_sanggar.tipe_sanggar_id = '$tipe_sanggar_id'")->result_array(),	
				'tipe_sanggar'		=> $this->db->query("SELECT * FROM kategori_tipe_sanggar WHERE id = '$tipe_sanggar_id'")->row_array(),	
				'n_kriteria' 	=> $this->Kriteria_model->getAlln_kriteria()->result_array(),
				'n_subkriteria' => $this->Kriteria_model->getAlln_subkriteria()->result_array(),		
				'n_penilaian' 	=> $this->db->query("SELECT * FROM n_penilaian JOIN user_sanggar ON n_penilaian.id_sanggar = user_sanggar.id_sanggar JOIN n_subkriteria ON n_penilaian.id_subkriteria = n_subkriteria.id_subkriteria")->result_array()
			];
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_navbar', $data);
			$this->load->view('user/data_banding', $data);
			$this->load->view('templates/user_footer');
		}
	}

	public function _rulesbanding()
	{
		$this->form_validation->set_rules('tipe_sanggar_id', 'ID SUB','required');
	}	

// PERBANDINGAN SANGGAR 

	public function perbandingan()
	{
		$this->_rulesperbandingan();

		if($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$id_sanggar_1 = $this->input->post('id_sanggar_1', true);
			$id_sanggar_2 = $this->input->post('id_sanggar_2', true);

			$query 	= $this->db->query("SELECT * FROM user_sanggar WHERE id_sanggar = '$id_sanggar_1'")->result_array();
			$query_2 	= $this->db->query("SELECT * FROM user_sanggar WHERE id_sanggar = '$id_sanggar_2'")->result_array();

			$data = [
				'sanggar_1'		=>	$query,
				'sanggar_2'		=>	$query_2,
				'id_sanggar_1'	=> $id_sanggar_1,
				'id_sanggar_2'	=> $id_sanggar_2
				];

			$data = [
				'judul'			=> 'perbandinganan sanggar',
				'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
				'sanggar'		=> $this->db->query("SELECT * FROM user_sanggar WHERE id_sanggar = '$id_sanggar_1'")->result_array(),
				'sanggar_2'		=> $this->db->query("SELECT * FROM user_sanggar WHERE id_sanggar = '$id_sanggar_2'")->result_array(),
				// 'tipe_sanggar'		=> $this->db->query("SELECT * FROM kategori_tipe_sanggar WHERE id = '$tipe_sanggar_id'")->row_array(),	
				'n_kriteria' 	=> $this->Kriteria_model->getAlln_kriteria()->result_array(),
				'n_subkriteria' => $this->Kriteria_model->getAlln_subkriteria()->result_array(),		
				'n_penilaian' 	=> $this->db->query("SELECT * FROM n_penilaian JOIN user_sanggar ON n_penilaian.id_sanggar = user_sanggar.id_sanggar JOIN n_subkriteria ON n_penilaian.id_subkriteria = n_subkriteria.id_subkriteria")->result_array()
			];
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_navbar', $data);
			$this->load->view('user/data_perbandingan', $data);
			$this->load->view('templates/user_footer');
		}
	}

	public function _rulesperbandingan()
	{
		$this->form_validation->set_rules('id_sanggar_1', 'ID SUB','required');
		$this->form_validation->set_rules('id_sanggar_2', 'ID SUB','required');
	}
}