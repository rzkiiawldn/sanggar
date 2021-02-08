<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}

	public function index()
	{
		$data = [
			'judul'			=> 'Halaman Berita',
			'berita'		=> $this->MU_sanggar->getAllBerita()->result_array(),
			'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'		=> $this->session->userdata('nama'),
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/index', $data);
		$this->load->view('templates/user_footer');
	}	

	public function detail($id)
	{
		$data = [
			'judul'			=> 'Detail Berita',
			'berita'		=> $this->MU_sanggar->getBeritaById($id),
			'user'				=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'		=> $this->session->userdata('nama'),
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/berita/detail', $data);
		$this->load->view('templates/user_footer');
	}
}