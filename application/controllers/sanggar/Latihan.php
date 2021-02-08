<?php 

class Latihan extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$user = $this->session->userdata('id_sanggar');
		$data	=	[
			'judul'				=> 'Halaman Jadwal Latihan',
			'user_sanggar'		=> $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array(),
			'jadwal_latihan'	=> $this->MS_jadwal->getAllJadwal_latihan($user)->result_array(),
			'kelas'				=> $this->MS_kelas->getAllKelas($user)->result_array(),
			'hari'				=> $this->db->query("SELECT * FROM k_jadwal WHERE id_jadwal BETWEEN 1 AND 7")->result_array()
		];

		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/jadwal_latihan/index', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function tambah_jadwal_latihan()
	{

		$data = [
			'judul_latihan' => htmlspecialchars($this->input->post('judul_latihan', true)),
			'id_kelas' 		=> htmlspecialchars($this->input->post('id_kelas', true)),
			'id_jadwal' 	=> htmlspecialchars($this->input->post('id_jadwal', true)),
			'jam_latihan' 	=> htmlspecialchars($this->input->post('jam_latihan', true)),
			'id_sanggar' 	=> htmlspecialchars($this->input->post('id_sanggar', true))
		];

		$this->db->insert('s_jadwal_latihan', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan jadwal latihan baru</div>');
		redirect('sanggar/latihan/index');
	}

	public function hapus_jadwal_latihan($id_jadwal_latihan)
	{
		$this->MS_jadwal->hapusJadwalLatihan($id_jadwal_latihan);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus jadwal latihan</div>');
		redirect('sanggar/latihan/index');
	}

	public function proses_edit($id_jadwal_latihan)
	{
		$judul_latihan 		= $this->input->post('judul_latihan');
		$id_kelas			= $this->input->post('id_kelas');
		$id_jadwal 			= $this->input->post('id_jadwal');
		$jam_latihan 		= $this->input->post('jam_latihan');

		$this->db->set('judul_latihan', $judul_latihan);
		$this->db->set('id_kelas', $id_kelas);
		$this->db->set('id_jadwal', $id_jadwal);
		$this->db->set('jam_latihan', $jam_latihan);
		$this->db->where('id_jadwal_latihan', $id_jadwal_latihan);
		$this->db->update('s_jadwal_latihan');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengubah paket kelas</div>');
		redirect('sanggar/latihan/index');
	}
}