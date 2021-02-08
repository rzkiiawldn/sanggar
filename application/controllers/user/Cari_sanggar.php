<?php 

class Cari_sanggar extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}

	public function index($id)
	{
		$data['judul'] 		= ('Sanggar');
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sanggar'] 	= $this->MU_sanggar->getSanggarByTipe($id);
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/sanggar/index', $data);
		$this->load->view('templates/user_footer');
	}

	public function cari()
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
				'judul'				=> 'Data sanggar',
				'user'				=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
				'tb_user'			=> $this->session->userdata('nama'),
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
			$this->load->view('templates/user_navbar', $data);
			$this->load->view('user/sanggar/data_sanggar', $data);
			$this->load->view('templates/user_footer');
		}
	}

	public function kriteria()
	{
		$id_user		= $this->input->post('id_user');
		$tipe_sanggar 	= $this->input->post('tipe_sanggar');
		$pendidikan 	= $this->input->post('pendidikan');
		$umur 			= $this->input->post('umur');
		$jadwal 		= $this->input->post('jadwal');
		$sarana 		= $this->input->post('sarana');
		$prasarana 		= $this->input->post('prasarana');
		$biaya 			= $this->input->post('biaya');

		$hitungpen		= count($pendidikan);
		$hitungu		= count($umur);
		$hitungj		= count($jadwal);
		$hitungs		= count($sarana);
		$hitungpras		= count($prasarana);
		$hitungb		= $biaya;

		if ($hitungpen >= "6") {
			echo $hitungPendidikanHasil = 5;
		} elseif ($hitungpen == "5") {
			echo $hitungPendidikanHasil = 4;
		} elseif ($hitungpen == "4") {
			echo $hitungPendidikanHasil = 3;
		} elseif ($hitungpen == "3") {
			echo $hitungPendidikanHasil = 2;
		} else {
			echo $hitungPendidikanHasil = 1;
		}


		if ($hitungu >= "4") {
			echo $hitungUmurHasil = 3;
		} elseif ($hitungu == "3") {
			echo $hitungUmurHasil = 2;
		} else {
			echo $hitungUmurHasil = 1;
		}

		if ($hitungj >= "10") {
			echo $hitungJadwalHasil = 3;
		} elseif ($hitungj >= "4") {
			echo $hitungJadwalHasil = 2;
		} else {
			echo $hitungJadwalHasil = 1;
		}

		if ($hitungs >= "8") {
			echo $hitungSaranaHasil = 3;
		} elseif ($hitungs >= "4") {
			echo $hitungSaranaHasil = 2;
		} else {
			echo $hitungSaranaHasil = 1;
		}

		if ($hitungpras >= "10") {
			echo $hitungPrasaranaHasil = 3;
		} elseif ($hitungpras >= "5") {
			echo $hitungPrasaranaHasil = 2;
		} else {
			echo $hitungPrasaranaHasil = 1;
		}

		if ($hitungb == "<= 1 juta") {
			echo $hitungBiayaHasil = 5;
		} elseif ($hitungb == "2 jt s/d 4 juta") {
			echo $hitungBiayaHasil = 4;
		} elseif ($hitungb == "5 jt s/d 7 juta") {
			echo $hitungBiayaHasil = 3;
		} elseif ($hitungb == "8 jt s/d 10 juta") {
			echo $hitungBiayaHasil = 2;
		} else {
			echo $hitungBiayaHasil = 1;
		}



		$data = [
			'pendidikan' 		=> $hitungPendidikanHasil,
			'umur'		 		=> $hitungUmurHasil,
			'biaya'		 		=> $hitungBiayaHasil,
			'sarana'		 	=> $hitungSaranaHasil,
			'prasarana'		 	=> $hitungPrasaranaHasil,
			'jadwal'		 	=> $hitungJadwalHasil
		];

		$data_transaksi = [
			'id_user'	=> $id_user
		];

		$this->db->insert('profile_matching_nilai', $data);
		$this->db->insert('jumlah_transaksi', $data_transaksi);
		redirect('user/cari_sanggar/kriteria_sanggar');
	}

	public function kriteria_sanggar()
	{
		$data = [
			'judul'				=> 'Kriteria sanggar',
			'user'				=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'			=> $this->session->userdata('nama'),
			'sanggar'			=> $this->MU_sanggar->getAllSanggar()->result_array(),
			'kriteria'			=> $this->db->query("SELECT * FROM tb_kriteria")->result_array(),
			'corefaktor'		=> $this->db->query("SELECT * FROM profile_matching_jenis_kriteria")->result_array(),
			'penilaian'			=> $this->db->query("SELECT * FROM profile_matching_nilai")->result_array(),
			'profile_matching'	=> $this->db->query("SELECT * FROM profile_matching JOIN user_sanggar ON profile_matching.nama = user_sanggar.id_sanggar")->result_array(),
			'ranking' 			=> $this->db->query("SELECT * FROM profile_matching_rangking JOIN user_sanggar ON profile_matching_rangking.alternatif = user_sanggar.id_sanggar ORDER BY nilai DESC")->result_array(),
			'subkriteria'		=> $this->db->query("SELECT * FROM tb_subkriteria JOIN tb_kriteria ON tb_subkriteria.id_kriteria = tb_kriteria.id_kriteria")->result_array()
		];

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/sanggar/data_ranking', $data);
		$this->load->view('templates/user_footer');
	}
}