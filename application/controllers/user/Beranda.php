<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}

	public function index()
	{
		$data = [
			'judul'			=> 'Halaman Utama',
			'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'		=> $this->session->userdata('nama'),
			'sanggar'		=> $this->MU_sanggar->getAllSanggar()->result_array(),
			'berita'		=> $this->MU_sanggar->getAllBerita()->result_array(),
			'event'			=> $this->MU_sanggar->getAllEvent()->result_array(),
			'tipe_sanggar'	=> $this->MU_sanggar->getAllTipeSanggar()->result_array()
		];

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/user_footer');
	}

	public function cari()
	{
		if ($this->input->post('submit'))
		{
			$data['keyword'] = $this->input->post('keyword');
		} else {
			$data['keyword'] = null;
		}

		$data = [
			'judul'			=> 'Data sanggar',
			'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'		=> $this->session->userdata('nama'),
			'sanggar'		=> $this->MU_sanggar->getSanggar($data['keyword'])->result_array(),
			'total_sanggar'	=> $this->MU_sanggar->getSanggar($data['keyword'])->num_rows()
		];

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/sanggar/hasil_cari', $data);
		$this->load->view('templates/user_footer');
			
	}
}