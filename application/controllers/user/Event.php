<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}

	public function index()
	{
		$data = [
			'judul'			=> 'Halaman Kegiatan Sanggar',
			'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'		=> $this->session->userdata('nama'),
			'event'			=> $this->MU_sanggar->getAllEvent()->result_array()
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/event/index', $data);
		$this->load->view('templates/user_footer');
	}

	public function detail($id)
	{
		$data = [
			'judul'			=> 'Detail Kegiatan Sanggar',
			'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'		=> $this->session->userdata('nama'),
			'event'			=> $this->MU_sanggar->getEventById($id)
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/event/detail', $data);
		$this->load->view('templates/user_footer');
	}
}