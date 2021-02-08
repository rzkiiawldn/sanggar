<?php 

class Cari_sanggar extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$this->db->empty_table('profile_matching_nilai');
		$this->db->empty_table('profile_matching_rangking');
		$data ['judul'] = 'Pencarian Sanggar';
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sanggar']	= $this->db->query("SELECT * FROM user_sanggar JOIN kategori_tipe_sanggar ON user_sanggar.tipe_sanggar_id = kategori_tipe_sanggar.id")->result_array();
		$data['kategori']	= $this->db->query("SELECT * FROM kategori_tipe_sanggar")->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/cari_sanggar', $data);
		$this->load->view('templates/user_footer');
	}

	public function cari()
	{
		$this->_rulescari();

		if($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$tipe_sanggar_id = $this->input->post('tipe_sanggar_id', true);

			$query 	= $this->db->query("SELECT * FROM user_sanggar JOIN kategori_tipe_sanggar ON user_sanggar.tipe_sanggar_id = kategori_tipe_sanggar.id WHERE user_sanggar.tipe_sanggar_id = '$tipe_sanggar_id'")->result_array();

			$data = [
				'sanggar'		=>	$query,
				'tipe_sanggar_id'	=> $tipe_sanggar_id
				];

			$data = [
				'judul'			=> 'Data penilaian',
				'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
				'sanggar'		=> $this->db->query("SELECT * FROM user_sanggar JOIN kategori_tipe_sanggar ON user_sanggar.tipe_sanggar_id = kategori_tipe_sanggar.id WHERE user_sanggar.tipe_sanggar_id = '$tipe_sanggar_id'")->result_array(),	
				'tipe_sanggar'		=> $this->db->query("SELECT * FROM kategori_tipe_sanggar WHERE id = '$tipe_sanggar_id'")->row_array(),	
				'total'			=> $this->db->query("SELECT * FROM user_sanggar JOIN kategori_tipe_sanggar ON user_sanggar.tipe_sanggar_id = kategori_tipe_sanggar.id WHERE user_sanggar.tipe_sanggar_id = '$tipe_sanggar_id'")->num_rows(),	
				'kriteria' 		=> $this->db->query("SELECT * FROM tb_kriteria")->result_array(),
				'subkriteria' 	=> $this->db->query("SELECT * FROM tb_subkriteria")->result_array(),
				'k_pendidikan'	=> $this->db->query("SELECT * FROM k_pendidikan JOIN kategori_tipe_sanggar ON k_pendidikan.tipe_sanggar = kategori_tipe_sanggar.id WHERE k_pendidikan.tipe_sanggar = '$tipe_sanggar_id'")->result_array(),
				'k_umur'		=> $this->db->query("SELECT * FROM k_umur")->result_array(),
				'k_jadwal'		=> $this->db->query("SELECT * FROM k_jadwal")->result_array(),
				'k_sarana'		=> $this->db->query("SELECT * FROM k_sarana")->result_array(),
				'k_prasarana'	=> $this->db->query("SELECT * FROM k_prasarana")->result_array(),
				'k_biaya'		=> $this->db->query("SELECT * FROM k_biaya")->result_array(),
				'n_kriteria'		=> $this->db->query("SELECT * FROM n_kriteria")->result_array()
			];
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_navbar', $data);
			$this->load->view('user/data', $data);
			$this->load->view('templates/user_footer');
		}
	}

	public function _rulescari()
	{
		$this->form_validation->set_rules('tipe_sanggar_id', 'ID SUB','required');
	}

	// CARI GAP

	// public function kriteria()
	// {
	// 	$tipe_sanggar 	= $this->input->post('tipe_sanggar');
	// 	$nilai 	= $this->input->post('nilai');

	// 	$data = [
	// 		'pendidikan' 	=> $nilai[0],
	// 		'umur' 			=> $nilai[1],
	// 		'jadwal' 		=> $nilai[2],
	// 		'sarana' 		=> $nilai[3],
	// 		'prasarana' 	=> $nilai[4],
	// 		'biaya' 		=> $nilai[5]
	// 	];

	// 	$this->db->insert('profile_matching_nilai', $data);
	// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan data alternatif</div>');
	// 	redirect('member/cari_sanggar/kriteria_sanggar/'.$tipe_sanggar);
	// }
	public function kriteria()
	{
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
		$hitungb		= count($biaya);

		if ($hitungpen == "6") {
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


		if ($hitungu == "4") {
			echo $hitungUmurHasil = 3;
		} elseif ($hitungu == "3") {
			echo $hitungUmurHasil = 2;
		} else {
			echo $hitungUmurHasil = 1;
		}

		if ($hitungj >= "9") {
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

		if ($hitungb == "5") {
			echo $hitungBiayaHasil = 5;
		} elseif ($hitungb == "4") {
			echo $hitungBiayaHasil = 4;
		} elseif ($hitungb == "3") {
			echo $hitungBiayaHasil = 3;
		} elseif ($hitungb == "2") {
			echo $hitungBiayaHasil = 2;
		} else {
			echo $hitungBiayaHasil = 1;
		}



		$data = [
			'pendidikan' 		=> $hitungPendidikanHasil,
			'umur'		 		=> $hitungUmurHasil,
			'jadwal'		 	=> $hitungJadwalHasil,
			'sarana'		 	=> $hitungSaranaHasil,
			'prasarana'		 	=> $hitungPrasaranaHasil,
			'biaya'		 		=> $hitungBiayaHasil
		];

		$this->db->insert('profile_matching_nilai', $data);
		redirect('member/cari_sanggar/kriteria_sanggar/'.$tipe_sanggar);
	}

	public function kriteria_sanggar($tipe_sanggar)
	{
		$data ['judul'] = 'Kriteria Sanggar';
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['sanggar']	= $this->Admin_model->getAllSanggar()->result_array();
		$data['kriteria']	= $this->db->query("SELECT * FROM tb_kriteria")->result_array();
		$data['corefaktor']	= $this->db->query("SELECT * FROM profile_matching_jenis_kriteria")->result_array();
		$data['nilai']		= $this->db->query("SELECT * FROM tb_nilai")->result_array();		
		$data['penilaian']		= $this->db->query("SELECT * FROM profile_matching_nilai")->result_array();		
		$data['profile_matching'] = $this->db->query("SELECT * FROM profile_matching JOIN user_sanggar ON profile_matching.nama = user_sanggar.id_sanggar WHERE user_sanggar.tipe_sanggar_id = '$tipe_sanggar'")->result_array();		
		$data['ranking'] = $this->db->query("SELECT * FROM profile_matching_rangking JOIN user_sanggar ON profile_matching_rangking.alternatif = user_sanggar.id_sanggar WHERE user_sanggar.tipe_sanggar_id = '$tipe_sanggar' ORDER BY nilai DESC")->result_array();
		// $data['pm'] = $this->M_spk->hitung($data['profile_matching']);
		// $data['nilai_max'] = $this->M_spk->nilai_akhir();
		$data['subkriteria']		= $this->db->query("SELECT * FROM tb_subkriteria JOIN tb_kriteria ON tb_subkriteria.id_kriteria = tb_kriteria.id_kriteria")->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/kriteria_sanggar', $data);
		$this->load->view('templates/user_footer');
	}
}