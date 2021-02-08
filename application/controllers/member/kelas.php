<?php 

class Kelas extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data ['judul'] = 'Kelas ku';
		$user = $this->session->userdata('id');
		$data['pendaftaran'] = $this->db->query("SELECT * FROM tb_pendaftaran tr JOIN user cs ON tr.user_id
        = cs.id JOIN user_sanggar s ON tr.user_sanggar_id = s.id_sanggar JOIN s_kelas k ON tr.kelas_id = k.id AND cs.id='$user' WHERE tr.status = 2")->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar');
		$this->load->view('user/kelas/index', $data);
		$this->load->view('templates/user_footer');
	}

	// public function hapus_pendaftar($kode_pendaftaran)
	// {
	// 	$this->db->where('kode_pendaftaran', $kode_pendaftaran);
	// 	$this->db->delete('tb_pendaftaran');
	// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil membatalkan pendaftaran</div>');
	// 	redirect('member/kelas/index');
	// }
}