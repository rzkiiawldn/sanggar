<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}

	public function index($id_sanggar)
	{
		$dariDB 				= $this->MS_pendaftaran->cekkodependaftar();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut 				= substr($dariDB, 3, 3);
        $kodependaftarSekarang 	= $nourut + 1;

        $this->form_validation->set_rules('id_kelas', 'Program', 'required|trim', ['required' => 'Program tidak boleh kosong']);

		if( $this->form_validation->run() == false )
		{
			$data = [
				'judul'			=> 'Form pendaftaran',
				'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
				'tb_user'		=> $this->session->userdata('nama'),
				'kode_pendaftar'=> $kodependaftarSekarang,
				'sanggar'		=> $this->MU_sanggar->getSanggarById($id_sanggar),
				'kelas'			=> $this->MU_kelas->getKelasByIdSanggar($id_sanggar)->result_array(),
			];
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_navbar', $data);
			$this->load->view('user/pendaftaran/index', $data);
			$this->load->view('templates/user_footer');
		} else {
			$email_sanggar			=	htmlspecialchars($this->input->post('email_sanggar', true));
			$kode_pendaftaran		=	htmlspecialchars($this->input->post('kode_pendaftaran', true));
			$id_user				=	htmlspecialchars($this->input->post('id_user', true));
			$id_sanggar				=	htmlspecialchars($this->input->post('id_sanggar', true));
			$id_kelas				=	htmlspecialchars($this->input->post('id_kelas', true));
			$tanggal_pendaftaran	=	date('Y-m-d');
			$status					=	1;

			$data =	[
				'kode_pendaftaran'		=> $kode_pendaftaran,
				'id_user'				=> $id_user,
				'id_sanggar'			=> $id_sanggar,
				'id_kelas'				=> $id_kelas,
				'tanggal_pendaftaran'	=> $tanggal_pendaftaran,
				'status_pendaftaran'	=> $status
			];

			$data_daftar = [
				'judul'					=> 'Cek pendaftaran',
				'user'					=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
				'tb_user'				=> $this->session->userdata('nama'),
				'kode_pendaftar'		=> $kodependaftarSekarang,
				'sanggar'				=> $this->MU_sanggar->getSanggarById($id_sanggar),
				'kelas'					=> $this->MU_kelas->getKelasByIdSanggar($id_sanggar)->result_array(),
				'email_sanggar'			=> $email_sanggar,
				'kode_pendaftaran'		=> $kode_pendaftaran,
				'id_user'				=> $id_user,
				'id_sanggar'			=> $id_sanggar,
				'id_kelas'				=> $id_kelas,
				'tanggal_pendaftaran'	=> $tanggal_pendaftaran,
				'status_pendaftaran'	=> $status
			];
			$this->load->view('templates/user_header', $data_daftar);
			$this->load->view('templates/user_navbar', $data_daftar);
			$this->load->view('user/pendaftaran/cek', $data_daftar);
			$this->load->view('templates/user_footer');

			// $this->db->insert('tb_pendaftaran', $data);
		}

	}	
	

	public function daftar()
	{
		$nama_pendaftar			=	htmlspecialchars($this->input->post('nama_pendaftar', true));
		$email_sanggar			=	htmlspecialchars($this->input->post('email_sanggar', true));

		$kode_pendaftaran		=	htmlspecialchars($this->input->post('kode_pendaftaran', true));
		$id_user				=	htmlspecialchars($this->input->post('id_user', true));
		$id_sanggar				=	htmlspecialchars($this->input->post('id_sanggar', true));
		$id_kelas				=	htmlspecialchars($this->input->post('id_kelas', true));
		$tanggal_pendaftaran	=	date('Y-m-d');
		$status					=	1;

		$data =	[
			'kode_pendaftaran'		=> $kode_pendaftaran,
			'id_user'				=> $id_user,
			'id_sanggar'			=> $id_sanggar,
			'id_kelas'				=> $id_kelas,
			'tanggal_pendaftaran'	=> $tanggal_pendaftaran,
			'status_pendaftaran'	=> $status
		];

		$this->db->insert('tb_pendaftaran', $data);
		$this->_sendEmail($nama_pendaftar, $kode_pendaftaran ,$email_sanggar, 'verify');

		$this->session->set_flashdata('message', '<div id="alert" class="alert alert-success" role="alert"> Pendaftaran berhasil dilakukan, silahkan tunggu konfirmasi dari pihak sanggar </div>');
		redirect('user/riwayat/pendaftaran');
	}

	private function _sendEmail($nama_pendaftar, $kode_pendaftaran ,$email_sanggar, $type)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'sanggarsans@gmail.com',
			'smtp_pass' => 'sanggarsans123',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('sanggarsans@gmail.com', 'SanggarSans');
		$this->email->to($email_sanggar);

		if ($type == 'verify') {
			$this->email->subject('Pendaftaran ke-sanggar anda');
			$this->email->message('Selamat, '.$nama_pendaftar.' Telah mendaftar ke sanggar anda, dengan kode pendaftaran : '.$kode_pendaftaran.', Silahkan Login aplikasi sanggarsans untuk konfirmasi pendaftaran: <a href="'. base_url() . 'auth/index' . '">Login</a>');
		} 

		if ($this->email->send()) {
			return true;
		}else {
			echo $this->email->print_debugger();
			die;
		}

	}

	public function cetak_invoice($kode_pendaftaran)
	{
		$data['pendaftaran'] = $this->db->query("SELECT * FROM tb_pendaftaran tp, user u, user_sanggar us, s_kelas sk WHERE tp.id_user=u.id AND tp.id_sanggar=us.id_sanggar AND tp.id_kelas=sk.id AND tp.kode_pendaftaran='$kode_pendaftaran' ")->row_array();

		$this->load->view('user/pendaftaran/cetak', $data);
	}

}