<?php 

class Kriteria extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data = [
			'judul'		=> 'Kriteria sanggar',
			'user'		=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'pm'		=> $this->db->query("SELECT * FROM profile_matching JOIN user_sanggar ON profile_matching.nama = user_sanggar.id_sanggar")->result_array(),
			'jk' 		=> $this->db->query("SELECT * FROM profile_matching_jenis_kriteria")->row_array()
			];
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar');
		$this->load->view('admin/kriteria/index', $data);
		$this->load->view('templates/admin_footer');
	}	

	public function lihat()
	{
		$data = [
			'judul'			=> 'Nilai Kriteria sanggar',
			'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'sanggar'		=> $this->Admin_model->getAllSanggar()->result_array(),	
			'pm'			=> $this->db->query("SELECT * FROM profile_matching JOIN user_sanggar ON profile_matching.nama = user_sanggar.id_sanggar")->result_array()
			];
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar');
		$this->load->view('admin/kriteria/lihat_nilai', $data);
		$this->load->view('templates/admin_footer');
	}

	public function hitung()
	{
		$data['judul'] = 'Perhitungan ranking';
		$data['profile_matching'] = $this->db->query("SELECT * FROM profile_matching JOIN user_sanggar ON profile_matching.nama = user_sanggar.id_sanggar")->result_array();
		$data['pm'] = $this->M_spk->hitung($data['profile_matching']);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/kriteria/hitung', $data);
		$this->load->view('templates/admin_footer');
	}

// UBAH FAKTOR
	public function ubah_faktor()
	{
		$id 			= $this->input->post('id');
		$pendidikan 	= $this->input->post('pendidikan');
		$umur 			= $this->input->post('umur');
		$biaya 			= $this->input->post('biaya');
		$sarana 		= $this->input->post('sarana');
		$prasarana 		= $this->input->post('prasarana');
		$jadwal 		= $this->input->post('jadwal');
		$percentace 	= $this->input->post('percentace');

		$this->db->set('pendidikan', $pendidikan);
		$this->db->set('umur', $umur);
		$this->db->set('biaya', $biaya);
		$this->db->set('sarana', $sarana);
		$this->db->set('prasarana', $prasarana);
		$this->db->set('jadwal', $jadwal);
		$this->db->set('percentace', $percentace);
		$this->db->where('id', $id);
		$this->db->update('profile_matching_jenis_kriteria');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit faktor kriteria</div>');
		redirect('administrator/kriteria/index');

	}

// PENDIDIKAN

	public function pendidikan()
	{
		$data =	[
			'judul'			=> 'Kriteria pendidikan',
			'user'			=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'jk'			=> $this->db->query("SELECT * FROM profile_matching_jenis_kriteria")->row_array(),
			'pendidikan'	=> $this->db->query("SELECT * FROM k_pendidikan_id JOIN kategori_tipe_sanggar ON k_pendidikan_id.tipe_sanggar_id = kategori_tipe_sanggar.id")->result_array()
		];

		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/kriteria/k_pendidikan', $data);
		$this->load->view('templates/admin_footer');	
	}

	public function tambah_pendidikan()
	{
		$data = [
			'pendidikan' 		=> $this->input->post('pendidikan'),
			'tipe_sanggar_id'	=> $this->input->post('tipe_sanggar_id')
		];

		$this->db->insert('k_pendidikan_id', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan subkriteria baru</div>');
		redirect('administrator/kriteria/pendidikan');
	}

	public function edit_pendidikan($id_pendidikan)
	{
		$id_pendidikan  	= $this->input->post('id_pendidikan');
		$pendidikan  		= $this->input->post('pendidikan');
		$tipe_sanggar_id  	= $this->input->post('tipe_sanggar_id');

		$this->db->set('pendidikan', $pendidikan);
		$this->db->set('tipe_sanggar_id', $tipe_sanggar_id);
		$this->db->where('id_pendidikan', $id_pendidikan);
		$this->db->update('k_pendidikan_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit subkriteria</div>');
		redirect('administrator/kriteria/pendidikan');
	}

	public function hapus_pendidikan($id_pendidikan)
	{
		$this->db->where('id_pendidikan', $id_pendidikan);
		$this->db->delete('k_pendidikan_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus subkriteria</div>');
		redirect('administrator/kriteria/pendidikan');
	}

// UMUR

	public function umur()
	{
		$data =	[
			'judul'			=> 'Kriteria umur',
			'user'			=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'jk'			=> $this->db->query("SELECT * FROM profile_matching_jenis_kriteria")->row_array(),
			'umur'			=> $this->db->query("SELECT * FROM k_umur")->result_array()
		];

		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/kriteria/k_umur', $data);
		$this->load->view('templates/admin_footer');	
	}

	public function tambah_umur()
	{
		$data = [
			'umur' 		=> $this->input->post('umur')
		];

		$this->db->insert('k_umur', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan subkriteria baru</div>');
		redirect('administrator/kriteria/umur');
	}

	public function edit_umur($id_umur)
	{
		$id_umur  	= $this->input->post('id_umur');
		$umur  		= $this->input->post('umur');

		$this->db->set('umur', $umur);
		$this->db->where('id_umur', $id_umur);
		$this->db->update('k_umur');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit subkriteria</div>');
		redirect('administrator/kriteria/umur');
	}

	public function hapus_umur($id_umur)
	{
		$this->db->where('id_umur', $id_umur);
		$this->db->delete('k_umur');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus subkriteria</div>');
		redirect('administrator/kriteria/umur');
	}

// BIAYA

	public function biaya()
	{
		$data =	[
			'judul'			=> 'Kriteria biaya',
			'user'			=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'jk'			=> $this->db->query("SELECT * FROM profile_matching_jenis_kriteria")->row_array(),
			'biaya'	=> $this->db->query("SELECT * FROM k_biaya")->result_array()
		];

		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/kriteria/k_biaya', $data);
		$this->load->view('templates/admin_footer');	
	}

	public function tambah_biaya()
	{
		$data = [
			'biaya' 		=> $this->input->post('biaya'),
			'nilai' 		=> $this->input->post('nilai'),
		];

		$this->db->insert('k_biaya', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan subkriteria baru</div>');
		redirect('administrator/kriteria/biaya');
	}

	public function edit_biaya($id_biaya)
	{
		$id_biaya  	= $this->input->post('id_biaya');
		$biaya  	= $this->input->post('biaya');
		$nilai  	= $this->input->post('nilai');

		$this->db->set('biaya', $biaya);
		$this->db->set('nilai', $nilai);
		$this->db->where('id_biaya', $id_biaya);
		$this->db->update('k_biaya');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit subkriteria</div>');
		redirect('administrator/kriteria/biaya');
	}

	public function hapus_biaya($id_biaya)
	{
		$this->db->where('id_biaya', $id_biaya);
		$this->db->delete('k_biaya');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus subkriteria</div>');
		redirect('administrator/kriteria/biaya');
	}

// SARANA

	public function sarana()
	{
		$data =	[
			'judul'			=> 'Kriteria sarana',
			'user'			=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'jk'			=> $this->db->query("SELECT * FROM profile_matching_jenis_kriteria")->row_array(),
			'sarana'		=> $this->db->query("SELECT * FROM k_sarana")->result_array()
		];

		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/kriteria/k_sarana', $data);
		$this->load->view('templates/admin_footer');	
	}

	public function tambah_sarana()
	{
		$data = [
			'sarana' 		=> $this->input->post('sarana')
		];

		$this->db->insert('k_sarana', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan subkriteria baru</div>');
		redirect('administrator/kriteria/sarana');
	}

	public function edit_sarana($id_sarana)
	{
		$id_sarana  	= $this->input->post('id_sarana');
		$sarana  		= $this->input->post('sarana');

		$this->db->set('sarana', $sarana);
		$this->db->where('id_sarana', $id_sarana);
		$this->db->update('k_sarana');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit subkriteria</div>');
		redirect('administrator/kriteria/sarana');
	}

	public function hapus_sarana($id_sarana)
	{
		$this->db->where('id_sarana', $id_sarana);
		$this->db->delete('k_sarana');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus subkriteria</div>');
		redirect('administrator/kriteria/sarana');
	}

// PRASARANA

	public function prasarana()
	{
		$data =	[
			'judul'			=> 'Kriteria prasarana',
			'user'			=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'jk'			=> $this->db->query("SELECT * FROM profile_matching_jenis_kriteria")->row_array(),
			'prasarana'		=> $this->db->query("SELECT * FROM k_prasarana")->result_array()
		];

		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/kriteria/k_prasarana', $data);
		$this->load->view('templates/admin_footer');	
	}

	public function tambah_prasarana()
	{
		$data = [
			'prasarana' 		=> $this->input->post('prasarana')
		];

		$this->db->insert('k_prasarana', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan subkriteria baru</div>');
		redirect('administrator/kriteria/prasarana');
	}

	public function edit_prasarana($id_prasarana)
	{
		$id_prasarana  	= $this->input->post('id_prasarana');
		$prasarana  		= $this->input->post('prasarana');

		$this->db->set('prasarana', $prasarana);
		$this->db->where('id_prasarana', $id_prasarana);
		$this->db->update('k_prasarana');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit subkriteria</div>');
		redirect('administrator/kriteria/prasarana');
	}

	public function hapus_prasarana($id_prasarana)
	{
		$this->db->where('id_prasarana', $id_prasarana);
		$this->db->delete('k_prasarana');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus subkriteria</div>');
		redirect('administrator/kriteria/prasarana');
	}

// JADWAL

	public function jadwal()
	{
		$data =	[
			'judul'			=> 'Kriteria jadwal',
			'user'			=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'jk'			=> $this->db->query("SELECT * FROM profile_matching_jenis_kriteria")->row_array(),
			'jadwal'		=> $this->db->query("SELECT * FROM k_jadwal")->result_array()
		];

		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/kriteria/k_jadwal', $data);
		$this->load->view('templates/admin_footer');	
	}

	public function tambah_jadwal()
	{
		$data = [
			'jadwal' 		=> $this->input->post('jadwal')
		];

		$this->db->insert('k_jadwal', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan subkriteria baru</div>');
		redirect('administrator/kriteria/jadwal');
	}

	public function edit_jadwal($id_jadwal)
	{
		$id_jadwal  	= $this->input->post('id_jadwal');
		$jadwal  		= $this->input->post('jadwal');

		$this->db->set('jadwal', $jadwal);
		$this->db->where('id_jadwal', $id_jadwal);
		$this->db->update('k_jadwal');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit subkriteria</div>');
		redirect('administrator/kriteria/jadwal');
	}

	public function hapus_jadwal($id_jadwal)
	{
		$this->db->where('id_jadwal', $id_jadwal);
		$this->db->delete('k_jadwal');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus subkriteria</div>');
		redirect('administrator/kriteria/jadwal');
	}

	/*public function proses()
	{
		$this->_rulesProses();

		if($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$id_subkriteria = $this->input->post('id_subkriteria', true);

			$query 	= $this->db->query("SELECT * FROM n_penilaian JOIN n_subkriteria ON n_penilaian.id_subkriteria = n_subkriteria.id_subkriteria WHERE n_penilaian.id_subkriteria = '$id_subkriteria'")->result_array();

			$data = [
				'n_penilaian'		=>	$query,
				'id_subkriteria'	=> $id_subkriteria
				];

			$data['judul']	= 'Data';
			$data['user']	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar');
			$this->load->view('templates/admin_topbar');
			$this->load->view('admin/kriteria/data', $data);
			$this->load->view('templates/admin_footer');
		}
	}

	public function _rulesProses()
	{
		$this->form_validation->set_rules('id_subkriteria', 'ID SUB','required');
	}*/

}