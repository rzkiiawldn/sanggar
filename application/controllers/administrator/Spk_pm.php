<?php 

class Spk_pm extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}

	public function nilai_gap()
	{
		$data['judul'] = 'Nilai GAP';		
		$data['nilai_ketetapan']	= $this->Spk_model->getAllNilaiKetetapan()->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/spk/nilai_gap', $data);
		$this->load->view('templates/admin_footer');
	}

// STAR KRITERIA PENILAIAN

	public function kriteria()
	{
		$data['judul'] 			= 'Penetapan Kriteria';				
		$data['kriteria']		= $this->db->query("SELECT * FROM tb_kriteria")->result_array();
		$data['total_kriteria']		= $this->db->query("SELECT * FROM tb_kriteria")->num_rows();
		$data['user'] 			= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['subkriteria']		= $this->db->query("SELECT * FROM tb_subkriteria JOIN tb_kriteria ON tb_subkriteria.id_kriteria = tb_kriteria.id_kriteria")->result_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/spk/kriteria', $data);
		$this->load->view('templates/admin_footer');
	}

	public function tambah_kriteria()
	{
		$data = [
			'kriteria'	=> htmlspecialchars($this->input->post('kriteria', true)),
			'jenis_kriteria'=> htmlspecialchars($this->input->post('jenis_kriteria', true)),
			'bobot_kriteria' => htmlspecialchars($this->input->post('bobot_kriteria', true))
		];

		$this->db->insert('tb_kriteria', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan kriteria baru</div>');
		redirect('administrator/spk_pm/kriteria');	
	}

	public function hapus_kriteria($id_kriteria)
	{
		$this->Spk_model->hapuskriteria($id_kriteria);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus kriteria penilaian</div>');
		redirect('administrator/spk_pm/kriteria');
	}

	public function edit_kriteria($id_kriteria)
	{
		$kriteria			= $this->input->post('kriteria');
		$bobot_kriteria 	= $this->input->post('bobot_kriteria');
		$jenis_kriteria 	= $this->input->post('jenis_kriteria');

		$this->db->set('kriteria', $kriteria);
		$this->db->set('bobot_kriteria', $bobot_kriteria);
		$this->db->set('jenis_kriteria', $jenis_kriteria);
		$this->db->where('id_kriteria', $id_kriteria);
		$this->db->update('tb_kriteria');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit kriteria</div>');
		redirect('administrator/spk_pm/kriteria');	
	}

	public function sub_kriteria($id_kriteria)
	{
		$data['judul'] 			= 'Sub Kriteria';
		$data['kriteria']		= $this->db->query("SELECT * FROM tb_kriteria WHERE id_kriteria = '$id_kriteria'")->row_array();
		$data['sub_kriteria']	= $this->db->query("SELECT * FROM tb_subkriteria WHERE id_kriteria = '$id_kriteria'")->result_array();
		$data['pendidikan']	= $this->db->query("SELECT * FROM k_pendidikan_id")->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/spk/sub_kriteria', $data);
		$this->load->view('templates/admin_footer');	
	}

	public function tambah_subkriteria()
	{
		$id_kriteria = $this->input->post('id_kriteria');
		$data = [
			'subkriteria'		=> htmlspecialchars($this->input->post('subkriteria', true)),
			'id_kriteria'		=> htmlspecialchars($this->input->post('id_kriteria', true))
		];

		$this->db->insert('tb_subkriteria', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan  Sub kriteria baru</div>');
		redirect('administrator/spk_pm/sub_kriteria/'.$id_kriteria);
	}

	public function edit_subkriteria($id_subkriteria)
	{
		$subkriteria			= $this->input->post('subkriteria');
		$id_subkriteria			= $this->input->post('id_subkriteria');
		$id_kriteria			= $this->input->post('id_kriteria');

		$this->db->set('subkriteria', $subkriteria);
		$this->db->set('id_kriteria', $id_kriteria);
		$this->db->where('id_subkriteria', $id_subkriteria);
		$this->db->update('tb_subkriteria');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit kriteria</div>');
		redirect('administrator/spk_pm/sub_kriteria/'.$id_kriteria);	
	}

	public function hapus_subkriteria($id_subkriteria)
	{
		$this->Spk_model->hapussubkriteria($id_subkriteria);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus sub kriteria penilaian</div>');
		redirect('administrator/spk_pm/sub_kriteria/');
	}

// END KRITERIA
	
	// public function index()
	// {
	// 	$data['judul'] = 'SPK';
	// 	$data['kriteria']			= $this->Spk_model->getAllKriteria()->result_array();
	// 	$data['sub_kriteria']		= $this->Spk_model->getAllSubKriteria()->result_array();		
	// 	$data['nilai_ketetapan']	= $this->Spk_model->getAllNilaiKetetapan()->result_array();
	// 	$data['nilai_ketentuan']	= $this->Spk_model->getAllNilaiKetentuan()->result_array();
	// 	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	// 	$this->load->view('templates/admin_header', $data);
	// 	$this->load->view('templates/admin_sidebar');
	// 	$this->load->view('templates/admin_topbar', $data);
	// 	$this->load->view('admin/spk/index', $data);
	// 	$this->load->view('templates/admin_footer');
	// }

	public function tambah_alternatif($id_sanggar)
	{
		$data['judul'] 			= 'Tambah Alternatif';
		$data['sanggar']		= $this->db->query("SELECT * FROM user_sanggar WHERE id_sanggar = '$id_sanggar'")->row_array();
		$data['kriteria']		= $this->Spk_model->getAllKriteria()->result_array();
		$data['sub_kriteria']	= $this->Spk_model->getAllSubKriteria()->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/spk/tambah_alternatif', $data);
		$this->load->view('templates/admin_footer');	
	}

	public function proses_tambah_alternatif()
	{
		$id_sanggar 		= $this->input->post('id_sanggar');
		$id_kriteria 		= $this->input->post('id_kriteria');
		$nilai 				= $this->input->post('nilai');

		for($i=0; $i<count($id_sanggar); $i++){

			$data[] = [
				'id_sanggar' 		=> $id_sanggar[$i],
				'id_kriteria' 		=> $id_kriteria[$i],
				'nilai' 			=> $nilai[$i]
			];

		}

		$this->db->insert_batch('tb_nilai', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan data alternatif</div>');
		redirect('administrator/spk_pm/alternatif');
	}

// ALTERNATIF

	public function alternatif()
	{
		$data['judul'] 		= 'Alternatif SPK';
		$data['sanggar']	= $this->Admin_model->getAllSanggar()->result_array();
		$data['nilai']			= $this->db->query("SELECT * FROM tb_nilai")->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/spk/alternatif', $data);
		$this->load->view('templates/admin_footer');
	}

	public function lihat_nilai()
	{
		$data['judul'] 		= 'Nilai Alternatif';
		$data['sanggar']	= $this->Admin_model->getAllSanggar()->result_array();
		$data['kriteria']	= $this->db->query("SELECT * FROM tb_kriteria")->result_array();
		$data['nilai']		= $this->db->query("SELECT * FROM tb_nilai")->result_array();		
		$data['profile_matching'] = $this->db->query("SELECT * FROM profile_matching")->result_array();
		$data['pm'] = $this->M_spk->hitung($data['profile_matching']);
		$data['subkriteria']		= $this->db->query("SELECT * FROM tb_subkriteria JOIN tb_kriteria ON tb_subkriteria.id_kriteria = tb_kriteria.id_kriteria")->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/spk/lihat_nilai', $data);
		$this->load->view('templates/admin_footer');
	}

	public function proses()
	{
		$nilai 				= $this->input->post('nilai');

		// foreach ($nilai as $n) {
			
		// }

		$data = [
			'pendidikan' 	=> $nilai[0],
			'umur' 			=> $nilai[1],
			'jadwal' 		=> $nilai[2],
			'sarana' 		=> $nilai[3],
			'prasarana' 	=> $nilai[4],
			'biaya' 		=> $nilai[5]
		];

		$this->db->insert('profile_matching_nilai', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan data alternatif</div>');
		redirect('administrator/spk_pm/report');
	}

	public function report()
	{
		$data['judul'] 		= 'Perhitungan';
		$data['sanggar']	= $this->Admin_model->getAllSanggar()->result_array();
		$data['kriteria']	= $this->db->query("SELECT * FROM tb_kriteria")->result_array();
		$data['corefaktor']	= $this->db->query("SELECT * FROM profile_matching_jenis_kriteria")->result_array();
		$data['nilai']		= $this->db->query("SELECT * FROM tb_nilai")->result_array();		
		$data['penilaian']		= $this->db->query("SELECT * FROM profile_matching_nilai")->result_array();		
		$data['profile_matching'] = $this->db->query("SELECT * FROM profile_matching")->result_array();		
		$data['ranking'] = $this->db->query("SELECT * FROM profile_matching_rangking ORDER BY nilai DESC")->result_array();
		$data['pm'] = $this->M_spk->hitung($data['profile_matching']);
		$data['subkriteria']		= $this->db->query("SELECT * FROM tb_subkriteria JOIN tb_kriteria ON tb_subkriteria.id_kriteria = tb_kriteria.id_kriteria")->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/spk/report', $data);
		$this->load->view('templates/admin_footer');
	}

	public function detail_nilai()
	{
		$id 				= $this->input->post('id');
		$alternatif 		= $this->input->post('alternatif');
		$nilai 				= $this->input->post('nilai');

		for($i=0; $i<count($id); $i++){

			$data[] = [
				'id' 				=> $id[$i],
				'alternatif' 		=> $alternatif[$i],
				'nilai' 			=> $nilai[$i]
			];

		}

		$this->db->insert_batch('profile_matching_rangking', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan data alternatif</div>');
		redirect('administrator/spk_pm/report_detail');
	}

	public function report_detail()
	{
		$data['judul'] 		= 'Perhitungan Detail';
		$data['sanggar']	= $this->Admin_model->getAllSanggar()->result_array();
		$data['kriteria']	= $this->db->query("SELECT * FROM tb_kriteria")->result_array();
		$data['corefaktor']	= $this->db->query("SELECT * FROM profile_matching_jenis_kriteria")->result_array();
		$data['nilai']		= $this->db->query("SELECT * FROM tb_nilai")->result_array();		
		$data['penilaian']		= $this->db->query("SELECT * FROM profile_matching_nilai")->result_array();		
		$data['profile_matching'] = $this->db->query("SELECT * FROM profile_matching")->result_array();		
		$data['ranking'] = $this->db->query("SELECT * FROM profile_matching_rangking ORDER BY nilai DESC")->result_array();
		$data['pm'] = $this->M_spk->hitung($data['profile_matching']);
		$data['nilai_max'] = $this->M_spk->nilai_akhir();
		$data['subkriteria']		= $this->db->query("SELECT * FROM tb_subkriteria JOIN tb_kriteria ON tb_subkriteria.id_kriteria = tb_kriteria.id_kriteria")->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/spk/report_detail', $data);
		$this->load->view('templates/admin_footer');
	}
}
