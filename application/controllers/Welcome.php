<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data = [
			'judul'			=> 'Selamat datang',
			'sanggar'		=> $this->MU_sanggar->getAllSanggar()->result_array(),
			'berita'		=> $this->MU_sanggar->getAllBerita()->result_array(),
			'event'			=> $this->MU_sanggar->getAllEvent()->result_array(),
			'tipe_sanggar'	=> $this->MU_sanggar->getAllTipeSanggar()->result_array()
		];

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/umum_navbar', $data);
		$this->load->view('welcome', $data);
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
			'sanggar'		=> $this->MU_sanggar->getSanggar($data['keyword'])->result_array(),
			'total_sanggar'	=> $this->MU_sanggar->getSanggar($data['keyword'])->num_rows()
		];

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/umum_navbar', $data);
		$this->load->view('user/sanggar/hasil_cari', $data);
		$this->load->view('templates/user_footer');
			
	}

	public function berita()
	{
		$data = [
			'judul'			=> 'Halaman Berita',
			'berita'		=> $this->MU_sanggar->getAllBerita()->result_array()
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/umum_navbar', $data);
		$this->load->view('user/berita/index', $data);
		$this->load->view('templates/user_footer');
	}	

	public function detail_berita($id)
	{
		$data = [
			'judul'			=> 'Detail Berita',
			'berita'		=> $this->MU_sanggar->getBeritaById($id),
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/umum_navbar', $data);
		$this->load->view('user/berita/detail', $data);
		$this->load->view('templates/user_footer');
	}

	public function cari_sanggar()
	{
		$this->form_validation->set_rules('tipe_sanggar_id', 'ID SUB','required');

		if($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$tipe_sanggar_id = $this->input->post('tipe_sanggar_id', true);

			$query 	= $this->MU_pm->getSanggarByTipe($tipe_sanggar_id)->result_array();

			$data = [
				'sanggar'			=>	$query,
				'tipe_sanggar_id'	=> $tipe_sanggar_id
				];

			$data = [
				'judul'				=> 'Data penilaian',
				'sanggar'			=> $this->MU_pm->getSanggarByTipe($tipe_sanggar_id)->result_array(),
				'tipe_sanggar'		=> $this->MU_pm->getAllTipe($tipe_sanggar_id)->row_array(),
				'total_sanggar'		=> $this->MU_pm->getSanggarByTipe($tipe_sanggar_id)->num_rows(),
				'kriteria'			=> $this->MU_pm->getAllKriteria()->result_array(),
				'subkriteria'		=> $this->MU_pm->getAllSubkriteria()->result_array(),
				'k_pendidikan'		=> $this->db->query("SELECT * FROM k_pendidikan")->result_array(),
				'umur'				=> $this->MU_pm->getAllUmur()->result_array(),
				'jadwal'			=> $this->MU_pm->getAllJadwal()->result_array(),
				'sarana'			=> $this->MU_pm->getAllSarana()->result_array(),
				'prasarana'			=> $this->MU_pm->getAllPrasarana()->result_array(),
				'biaya'				=> $this->MU_pm->getAllBiaya()->result_array(),
				'n_kriteria'		=> $this->db->query("SELECT * FROM n_kriteria")->result_array()
			];
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/umum_navbar', $data);
			$this->load->view('user/sanggar/data_sanggar', $data);
			$this->load->view('templates/user_footer');
		}
	}

	public function detail_sanggar($id_sanggar)
	{
		$data = [
			'judul'				=> 'Detail sanggar',
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
		$this->load->view('templates/umum_navbar', $data);
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

	public function event()
	{
		$data = [
			'judul'			=> 'Event',
			'event'			=> $this->MU_sanggar->getAllEvent()->result_array()
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/umum_navbar', $data);
		$this->load->view('user/event/index', $data);
		$this->load->view('templates/user_footer');
	}

	public function detail_event($id)
	{
		$data = [
			'judul'			=> 'Detail event',
			'event'			=> $this->MU_sanggar->getEventById($id)
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/umum_navbar', $data);
		$this->load->view('user/event/detail', $data);
		$this->load->view('templates/user_footer');
	}
}