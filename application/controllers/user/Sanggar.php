<?php 

class Sanggar extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}

	public function index($id)
	{
		$data['judul'] 			= ('Sanggar');
		$data['tipe_sanggar'] 	= $this->MU_sanggar->getTipeSanggarById($id)->row_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tb_user']		= $this->session->userdata('nama');
		$data['sanggar'] 		= $this->MU_sanggar->getSanggarByTipe($id)->result_array();
		$data['total_sanggar']	= $this->MU_sanggar->getSanggarByTipe($id)->num_rows();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/sanggar/index', $data);
		$this->load->view('templates/user_footer');
	}	

	public function cari()
	{
		$this->db->empty_table('profile_matching_nilai');
		$this->db->empty_table('profile_matching_rangking');
		$data = [
			'judul'				=> 'Temukan sanggar',
			'user'				=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'			=> $this->session->userdata('nama'),
			'kriteria'			=> $this->MU_pm->getAllKriteria()->result_array(),
			'subkriteria'		=> $this->MU_pm->getAllSubkriteria()->result_array(),
			'k_pendidikan'		=> $this->db->query("SELECT * FROM k_pendidikan")->result_array(),
			'umur'				=> $this->MU_pm->getAllUmur()->result_array(),
			'jadwal'			=> $this->MU_pm->getAllJadwal()->result_array(),
			'sarana'			=> $this->MU_pm->getAllSarana()->result_array(),
			'prasarana'			=> $this->MU_pm->getAllPrasarana()->result_array(),
			'biaya'				=> $this->MU_pm->getAllBiaya()->result_array(),
			'n_kriteria'		=> $this->db->query("SELECT * FROM n_kriteria")->result_array(),
			'total_transaksi'	=> $this->db->query("SELECT * FROM jumlah_transaksi")->num_rows()
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/sanggar/cari_sanggar', $data);
		$this->load->view('templates/user_footer');
	}

	public function detail_sanggar($id_sanggar)
	{
		$data = [
			'judul'				=> 'Detail sanggar',
			'user'				=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'			=> $this->session->userdata('nama'),
			'sanggar'			=> $this->MU_sanggar->getSanggarById($id_sanggar),
			'total_pendaftar'	=> $this->MU_sanggar->getAllPendaftar($id_sanggar)->num_rows(),
			'total_pengunjung'	=> $this->MU_sanggar->getAllPengunjung($id_sanggar)->num_rows(),
			'kelas'				=> $this->MU_kelas->getKelasByIdSanggar($id_sanggar)->result_array(),
			'atribut'			=> $this->MU_atribut->getAtributByIdSanggar($id_sanggar)->result_array(),
			'undang'			=> $this->MU_undang->getUndangByIdSanggar($id_sanggar)->result_array(),
			'galeri'			=> $this->MU_galeri->getGaleriByIdSanggar($id_sanggar)->result_array(),
			'jadwal'			=> $this->MU_jadwal->getJadwalByIdSanggar($id_sanggar)->result_array(),
			'n_pendidikan'		=> $this->MU_kategori->getpendidikan($id_sanggar)->result_array(),
			'n_umur'			=> $this->MU_kategori->getumur($id_sanggar)->result_array(),
			'n_biaya'			=> $this->MU_kategori->getbiaya($id_sanggar)->result_array(),
			'n_jadwal'			=> $this->MU_kategori->getjadwal($id_sanggar)->result_array(),
			'n_sarana'			=> $this->MU_kategori->getsarana($id_sanggar)->result_array(),
			'n_prasarana'		=> $this->MU_kategori->getprasarana($id_sanggar)->result_array(),
			];

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/sanggar/detail_sanggar', $data);
		$this->load->view('templates/user_footer', $data);

		$sanggar = $id_sanggar;

		$data = [
		  'id_sanggar'  => $sanggar,
		  'tgl'         => date('M')
		];

		$this->db->insert('jumlah_pengunjung', $data);
		
		$this->db->query("UPDATE user_sanggar SET view = view+1 WHERE id_sanggar = $id_sanggar ");

	}
}