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
		$user = $this->session->userdata('nama_sanggar');
		$data['user_sanggar'] 		= $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array();
		$id_user = $this->session->userdata('id_sanggar');
		$tipe_sanggar_id = $this->session->userdata('tipe_sanggar_id');
		$data = [
				'judul'			=> 'Halaman Kriteria',
				'user_sanggar'		=> $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array(),
				'k_biaya' 		=> $this->Kriteria_model->getAllk_biaya()->result_array(),
				'k_jadwal'		=> $this->Kriteria_model->getAllk_jadwal()->result_array(),
				'k_prasarana'	=> $this->Kriteria_model->getAllk_prasarana()->result_array(),
				'k_pendidikan'	=> $this->Kriteria_model->getAllk_pendidikan()->result_array(),
				'k_sarana'		=> $this->Kriteria_model->getAllk_sarana()->result_array(),
				'k_umur'		=> $this->Kriteria_model->getAllk_umur()->result_array(),

				'n_biaya' 		=> $this->db->query("SELECT * FROM n_biaya JOIN k_biaya ON n_biaya.id_biaya = k_biaya.id_biaya WHERE id_sanggar = '$id_user'")->result_array(),
				'n_pendidikan' 	=> $this->db->query("SELECT * FROM n_pendidikan WHERE id_sanggar = '$id_user'")->result_array(),
				'total_b' 		=> $this->db->query("SELECT * FROM n_biaya WHERE id_sanggar = '$id_user'")->num_rows(),
				'total_j'		=> $this->db->query("SELECT * FROM n_jadwal WHERE id_sanggar = '$id_user'")->num_rows(),
				'total_pras'	=> $this->db->query("SELECT * FROM n_prasarana WHERE id_sanggar = '$id_user'")->num_rows(),
				'total_pen'		=> $this->db->query("SELECT * FROM n_pendidikan WHERE id_sanggar = '$id_user'")->num_rows(),
				'total_s'		=> $this->db->query("SELECT * FROM n_sarana WHERE id_sanggar = '$id_user'")->num_rows(),
				'total_u'		=> $this->db->query("SELECT * FROM n_umur WHERE id_sanggar = '$id_user'")->num_rows()
			];
		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/kriteria/index', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function nilai()
	{
		$user = $this->session->userdata('nama_sanggar');
		$id_user = $this->session->userdata('id_sanggar');
		$data['user_sanggar'] 		= $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array();
		$data = [
				'judul'			=> 'Total nilai',
				'n_kriteria' 	=> $this->Kriteria_model->getAlln_kriteria()->result_array(),
				'k_biaya' 		=> $this->Kriteria_model->getAllk_biaya()->result_array(),
				'k_jadwal'		=> $this->Kriteria_model->getAllk_jadwal()->result_array(),
				'k_prasarana'	=> $this->Kriteria_model->getAllk_prasarana()->result_array(),
				'k_pendidikan'	=> $this->Kriteria_model->getAllk_pendidikan()->result_array(),
				'k_sarana'		=> $this->Kriteria_model->getAllk_sarana()->result_array(),
				'k_umur'		=> $this->Kriteria_model->getAllk_umur()->result_array(),

				'n_biaya' 		=> $this->db->query("SELECT * FROM n_biaya JOIN k_biaya ON n_biaya.id_biaya = k_biaya.id_biaya WHERE id_sanggar = '$id_user'")->result_array(),
				'total_b' 		=> $this->db->query("SELECT * FROM n_biaya WHERE id_sanggar = '$id_user'")->num_rows(),
				'total_j'		=> $this->db->query("SELECT * FROM n_jadwal WHERE id_sanggar = '$id_user'")->num_rows(),
				'total_pras'	=> $this->db->query("SELECT * FROM n_prasarana WHERE id_sanggar = '$id_user'")->num_rows(),
				'total_pen'		=> $this->db->query("SELECT * FROM n_pendidikan WHERE id_sanggar = '$id_user'")->num_rows(),
				'total_s'		=> $this->db->query("SELECT * FROM n_sarana WHERE id_sanggar = '$id_user'")->num_rows(),
				'total_u'		=> $this->db->query("SELECT * FROM n_umur WHERE id_sanggar = '$id_user'")->num_rows()
			];
		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/kriteria/nilai', $data);
		$this->load->view('templates/sanggar_footer');
	}

	// public function tambah_pendidikan()
	// {
	// 	$id_pendidikan 		= $this->input->post('id_pendidikan');
	// 	$id_sanggar 		= $this->input->post('id_sanggar');

	// 	for($i=0; $i<count($id_pendidikan); $i++){

	// 		$data[] = [
	// 			'id_pendidikan' 	=> $id_pendidikan[$i],
	// 			'id_sanggar' 		=> $id_sanggar[$i]
	// 		];

	// 	}

	// 	$this->db->insert_batch('n_pendidikan', $data);
	// 	$this->session->set_flashdata('pendidikan', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan jurusan baru</div>');
	// 	redirect('sanggar/kriteria/index');	
	// }

	// public function tambah_jadwal()
	// {
	// 	$id_jadwal 		= $this->input->post('id_jadwal');
	// 	$id_sanggar 		= $this->input->post('id_sanggar');

	// 	for($i=0; $i<count($id_jadwal); $i++){

	// 		$data[] = [
	// 			'id_jadwal' 	=> $id_jadwal[$i],
	// 			'id_sanggar' 		=> $id_sanggar[$i]
	// 		];

	// 	}

	// 	$this->db->insert_batch('n_jadwal', $data);
	// 	$this->session->set_flashdata('jadwal', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan jurusan baru</div>');
	// 	redirect('sanggar/kriteria/index');	
	// }

	// public function tambah_umur()
	// {
	// 	$id_umur 		= $this->input->post('id_umur');
	// 	$id_sanggar 		= $this->input->post('id_sanggar');

	// 	for($i=0; $i<count($id_umur); $i++){

	// 		$data[] = [
	// 			'id_umur' 	=> $id_umur[$i],
	// 			'id_sanggar' 		=> $id_sanggar[$i]
	// 		];

	// 	}

	// 	$this->db->insert_batch('n_umur', $data);
	// 	$this->session->set_flashdata('umur', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan jurusan baru</div>');
	// 	redirect('sanggar/kriteria/index');	
	// }

	// public function tambah_prasarana()
	// {
	// 	$id_prasarana 		= $this->input->post('id_prasarana');
	// 	$id_sanggar 		= $this->input->post('id_sanggar');

	// 	for($i=0; $i<count($id_prasarana); $i++){

	// 		$data[] = [
	// 			'id_prasarana' 	=> $id_prasarana[$i],
	// 			'id_sanggar' 		=> $id_sanggar[$i]
	// 		];

	// 	}

	// 	$this->db->insert_batch('n_prasarana', $data);
	// 	$this->session->set_flashdata('prasarana', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan jurusan baru</div>');
	// 	redirect('sanggar/kriteria/index');	
	// }

	// public function tambah_sarana()
	// {
	// 	$id_sarana 		= $this->input->post('id_sarana');
	// 	$id_sanggar 		= $this->input->post('id_sanggar');

	// 	for($i=0; $i<count($id_sarana); $i++){

	// 		$data[] = [
	// 			'id_sarana' 	=> $id_sarana[$i],
	// 			'id_sanggar' 		=> $id_sanggar[$i]
	// 		];

	// 	}

	// 	$this->db->insert_batch('n_sarana', $data);
	// 	$this->session->set_flashdata('message_s', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan jurusan baru</div>');
	// 	redirect('sanggar/kriteria/index');	
	// }

	// public function tambah_biaya()
	// {
	// 	$id_biaya 			= $this->input->post('id_biaya');
	// 	$id_sanggar 		= $this->input->post('id_sanggar');

	// 	for($i=0; $i<count($id_biaya); $i++){

	// 		$data[] = [
	// 			'id_biaya' 			=> $id_biaya[$i],
	// 			'id_sanggar' 		=> $id_sanggar[$i]
	// 		];

	// 	}

	// 	$this->db->insert_batch('n_biaya', $data);
	// 	$this->session->set_flashdata('message_b', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan jurusan baru</div>');
	// 	redirect('sanggar/kriteria/index');	
	// }


	// public function tambah_event()
	// {
	// 	$gambar = $_FILES['gambar'];
	// 	if ($gambar=''){}else
	// 		{
	// 			$config['upload_path']		= './assets/gambar_event/';
	// 			$config['allowed_types']	= 'jpg|png|gif|jpeg|JPEG';
	// 			$config['max_size']			= '2048';

	// 			$this->load->library('upload',$config);

	// 			if($this->upload->do_upload('gambar'))
	// 			{
	// 				$gambar = $this->upload->data('file_name');
	// 			} else {
	// 				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali foto yang anda upload!</div>');
	// 				redirect('sanggar/kelas/index');
	// 			}
	// 		}

	// 		$data = [
	// 			'judul_event' 	=> htmlspecialchars($this->input->post('judul_event', true)),
	// 			'keterangan'	=> htmlspecialchars($this->input->post('keterangan', true)),
	// 			'pengirim' 		=> htmlspecialchars($this->input->post('pengirim', true)),
	// 			'id_sanggar_event' => $this->input->post('tanggal_event', date('Y-m-d')),
	// 			'date_created' 	=> time(),
	// 			'gambar' => $gambar
	// 		];

	// 		$this->db->insert('tb_event', $data);
	// 		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan event baru</div>');
	// 		redirect('sanggar/event/index');
	// 	}

	// public function detail_event($id)
	// {
	// 	$data['judul'] = 'Detail Event';
	// 	$user = $this->session->userdata('id_sanggar');
	// 	$data['event'] = $this->Admin_model->getEventById($id);
	// 	$this->load->view('templates/sanggar_header', $data);
	// 	$this->load->view('templates/sanggar_sidebar');
	// 	$this->load->view('templates/sanggar_topbar');
	// 	$this->load->view('admin/event/detail', $data);
	// 	$this->load->view('templates/sanggar_footer');
	// }

	// public function hapus_event($id)
	// {
	// 	$this->Admin_model->hapusEvent($id);
	// 	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus event</div>');
	// 	redirect('administrator/event/index');
	// }

	public function changeAccess_pendidikan()
	{
		$id_pendidikan = $this->input->post('id_pendidikan');
		$id_sanggar = $this->input->post('id_sanggar');

		$data = [
			'id_pendidikan' => $id_pendidikan,
			'id_sanggar' => $id_sanggar
		];

		$result = $this->db->get_where('n_pendidikan', $data);

		if($result->num_rows() < 1) {
			$this->db->insert('n_pendidikan', $data);
		} else {
			$this->db->delete('n_pendidikan', $data);
		}

		$this->session->set_flashdata('message_pen', '<div class="alert alert-success" role="alert"> Access Changed! </div>');
	}

	public function changeAccess_umur()
	{
		$id_umur = $this->input->post('id_umur');
		$id_sanggar = $this->input->post('id_sanggar');

		$data = [
			'id_umur' => $id_umur,
			'id_sanggar' => $id_sanggar
		];

		$result = $this->db->get_where('n_umur', $data);

		if($result->num_rows() < 1) {
			$this->db->insert('n_umur', $data);
		} else {
			$this->db->delete('n_umur', $data);
		}

		$this->session->set_flashdata('message_u', '<div class="alert alert-success" role="alert"> Access Changed! </div>');
	}

	public function changeAccess_jadwal()
	{
		$id_jadwal = $this->input->post('id_jadwal');
		$id_sanggar = $this->input->post('id_sanggar');

		$data = [
			'id_jadwal' => $id_jadwal,
			'id_sanggar' => $id_sanggar
		];

		$result = $this->db->get_where('n_jadwal', $data);

		if($result->num_rows() < 1) {
			$this->db->insert('n_jadwal', $data);
		} else {
			$this->db->delete('n_jadwal', $data);
		}

		$this->session->set_flashdata('message_j', '<div class="alert alert-success" role="alert"> Access Changed! </div>');
	}

	public function changeAccess_sarana()
	{
		$id_sarana = $this->input->post('id_sarana');
		$id_sanggar = $this->input->post('id_sanggar');

		$data = [
			'id_sarana' => $id_sarana,
			'id_sanggar' => $id_sanggar
		];

		$result = $this->db->get_where('n_sarana', $data);

		if($result->num_rows() < 1) {
			$this->db->insert('n_sarana', $data);
		} else {
			$this->db->delete('n_sarana', $data);
		}

		$this->session->set_flashdata('message_s', '<div class="alert alert-success" role="alert"> Access Changed! </div>');
	}

	public function changeAccess_prasarana()
	{
		$id_prasarana = $this->input->post('id_prasarana');
		$id_sanggar = $this->input->post('id_sanggar');

		$data = [
			'id_prasarana' => $id_prasarana,
			'id_sanggar' => $id_sanggar
		];

		$result = $this->db->get_where('n_prasarana', $data);

		if($result->num_rows() < 1) {
			$this->db->insert('n_prasarana', $data);
		} else {
			$this->db->delete('n_prasarana', $data);
		}

		$this->session->set_flashdata('message_pras', '<div class="alert alert-success" role="alert"> Access Changed! </div>');
	}

	public function changeAccess_biaya()
	{
		$id_biaya = $this->input->post('id_biaya');
		$id_sanggar = $this->input->post('id_sanggar');

		$this->db->set('id_biaya', $id_biaya);
		$this->db->where('id_sanggar', $id_sanggar);
		$this->db->update('n_biaya');

		// $data = [
		// 	'id_biaya' => $id_biaya,
		// 	'id_sanggar' => $id_sanggar
		// ];

		// $result = $this->db->get_where('n_biaya', $data);

		// if($result->num_rows() < 1) {
		// 	$this->db->insert('n_biaya', $data);
		// } else {
		// 	$this->db->delete('n_biaya', $data);
		// }

		$this->session->set_flashdata('message_b', '<div class="alert alert-success" role="alert"> Access Changed! </div>');
	}

	public function changeAccess_nilai()
	{
		$nilai 		= $this->input->post('nilai');
		$id_sanggar = $this->input->post('id_sanggar');

		$data = [
			'nilai' 		=> $nilai,
			'id_sanggar' 	=> $id_sanggar
		];

		$result = $this->db->get_where('n_nilai', $data);

		if($result->num_rows() < 1) {
			$this->db->insert('n_nilai', $data);
		} else {
			$this->db->delete('n_nilai', $data);
		}

		$this->session->set_flashdata('message_b', '<div class="alert alert-success" role="alert"> Access Changed! </div>');
	}

	// public function edit_pendidikan()
	// {
	// 	$id_pendidikan 		= $this->input->post('id_pendidikan');
	// 	$id_sanggar 		= $this->input->post('id_sanggar');
	// 	$id_npen 			= $this->input->post('id_npen');

	// 	/*for($i=0; $i<count($id_pendidikan); $i++){

	// 		$data_pendidikan[] = [
	// 			'id_pendidikan' 	=> $id_pendidikan[$i],
	// 			'id_sanggar' 		=> $id_sanggar[$i],
	// 			'id_npen' 			=> $id_npen[$i]
	// 		];
	// 	}
		
	// 	$this->db->set('id_pendidikan', $data_pendidikan['id_pendidikan']);
	// 	$this->db->set('id_sanggar', $data_pendidikan['id_sanggar']);
	// 	$this->db->where('id_npen', $data_pendidikan['id_npen']);
	// 	$this->db->update('n_pendidikan');*/

	// 	$data  = array(
 //                'package_name' => $package
 //                'package_name' => $package
 //            );
 //            $this->db->where('package_id',$id);
 //            $this->db->update('package', $data);
             
 //            //DELETE DETAIL PACKAGE
 //            $this->db->delete('detail', array('detail_package_id' => $id));
 
 //            $result = array();
 //                foreach($product AS $key => $val){
 //                     $result[] = array(
 //                      'detail_package_id'   => $id,
 //                      'detail_product_id'   => $_POST['product_edit'][$key]
 //                     );
 //                }      
 //            //MULTIPLE INSERT TO DETAIL TABLE
 //            $this->db->insert_batch('detail', $result)

	// 	redirect('sanggar/kriteria/index');
	// }

}