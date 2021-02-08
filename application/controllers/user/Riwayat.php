<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}

	public function penyewaan()
	{
		$user = $this->session->userdata('id');
		$data = [
			'judul'			=> 'Riwayat Penyewaan',
			'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'		=> $this->session->userdata('nama'),
			'penyewaan'		=> $this->MU_riwayat->getAllPenyewaan($user)->result_array()
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/riwayat/penyewaan', $data);
		$this->load->view('templates/user_footer');
	}

	public function detail_penyewaan($kode_sewa)
	{
		$user = $this->session->userdata('id');
		$data = [
			'judul'			=> 'Detail Penyewaan',
			'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'		=> $this->session->userdata('nama'),
			'sanggar'		=> $this->db->query("SELECT * FROM tb_penyewaan JOIN user_sanggar ON tb_penyewaan.id_sanggar = user_sanggar.id_sanggar WHERE kode_sewa = '$kode_sewa' ")->row_array(),
			'penyewaan'		=> $this->MU_riwayat->getAllPenyewaanByKode($user, $kode_sewa)->row_array(),
			'rekening'		=> $this->db->query("SELECT * FROM tb_rekening")->result_array()
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/riwayat/detail_penyewaan', $data);
		$this->load->view('templates/user_footer');
	}		

	public function pendaftaran()
	{
		$user = $this->session->userdata('id');
		$data = [
			'judul'			=> 'Riwayat Pendaftaran',
			'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'		=> $this->session->userdata('nama'),
			'pendaftaran'	=> $this->MU_riwayat->getAllPendaftaran($user)->result_array()
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/riwayat/pendaftaran', $data);
		$this->load->view('templates/user_footer');
	}	

	public function detail_pendaftaran($kode_pendaftaran)
	{
		$user = $this->session->userdata('id');
		$data = [
			'judul'			=> 'Detail Pendaftaran',
			'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'		=> $this->session->userdata('nama'),
			'pendaftaran'	=> $this->MU_riwayat->getAllPendaftaranByKode($user, $kode_pendaftaran)->row_array()
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/riwayat/detail_pendaftaran', $data);
		$this->load->view('templates/user_footer');
	}	

	public function batal_sewa($kode_sewa)
	{
		$data 	= $this->db->query("SELECT * FROM tb_penyewaan WHERE kode_sewa = '$kode_sewa' ")->row_array();
		
		$id_atribut 	= $data['id_atribut'];
		$status 		= 1;

		$this->db->set('status', $status);
		$this->db->where('id', $id_atribut);
		$this->db->update('s_atribut');

		$this->db->where('kode_sewa', $kode_sewa);
		$this->db->delete('tb_penyewaan');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil membatalkan penyewaan</div>');
		redirect('user/riwayat/penyewaan');
	}

	public function pengundang()
	{
		$user = $this->session->userdata('id');
		$data = [
			'judul'			=> 'Riwayat Undang',
			'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'		=> $this->session->userdata('nama'),
			'undang'		=> $this->MU_riwayat->getAllUndang($user)->result_array()
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/riwayat/pengundang', $data);
		$this->load->view('templates/user_footer');
	}	

	public function detail_undang($kode_undang)
	{
		$user = $this->session->userdata('id');
		$data = [
			'judul'			=> 'Detail Undang',
			'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'sanggar'		=> $this->db->query("SELECT * FROM tb_pengundang JOIN user_sanggar ON tb_pengundang.id_sanggar = user_sanggar.id_sanggar WHERE kode_undang = '$kode_undang' ")->row_array(),
			'tb_user'		=> $this->session->userdata('nama'),
			'undang'		=> $this->MU_riwayat->getAllUndangByKode($user, $kode_undang)->row_array()
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/riwayat/detail_undang', $data);
		$this->load->view('templates/user_footer');
	}	

	public function batal_undang($kode_undang)
	{
		$this->db->where('kode_undang', $kode_undang);
		$this->db->delete('tb_pengundang');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil membatalkan undang sanggar</div>');
		redirect('user/riwayat/pengundang');
	}

	public function batal_daftar($kode_pendaftaran)
	{
		$this->db->where('kode_pendaftaran', $kode_pendaftaran);
		$this->db->delete('tb_pendaftaran');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil membatalkan pendaftaran sanggar</div>');
		redirect('user/riwayat/pendaftaran');
	}

}