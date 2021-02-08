<?php 

class Sanggar extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data['judul']			= 'Admin | total sanggar';
		$data['sanggar'] 		= $this->Admin_model->getAllSanggar()->result_array();		
		$data['total_sanggar'] 	= $this->Admin_model->total_sanggar()->num_rows();
		$data['user'] 			= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/sanggar/index', $data);
		$this->load->view('templates/admin_footer');
	}

	public function detail($id_sanggar)
	{
		$data['judul'] 		= 'Detail Sanggar';
		$data['sanggar'] 	= $this->db->query("SELECT * FROM user_sanggar JOIN kategori_tipe_sanggar ON user_sanggar.tipe_sanggar_id = kategori_tipe_sanggar.id WHERE id_sanggar='$id_sanggar'")->row_array();
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/sanggar/detail', $data);
		$this->load->view('templates/admin_footer');
	}

	public function tambah_sanggar()
	{
		$this->form_validation->set_rules('nama_sanggar', 'Nama Sanggar', 'required');
		$this->form_validation->set_rules('nama_ketua', 'Nama Ketua', 'required');
		$this->form_validation->set_rules('nik_ketua', 'NIK Ketua Sanggar', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
				'matches' => 'password dont match!',
				'min_length' => 'password to short!'
			]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if( $this->form_validation->run() == false )
		{
			$data['tipe_sanggar'] = $this->Admin_model->getAllTipe();
			$data['judul']	 = 'Tambah Data Sanggar';
			$data['user']	 = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar');
			$this->load->view('templates/admin_topbar', $data);
			$this->load->view('admin/sanggar/tambah', $data);
			$this->load->view('templates/admin_footer');	
		} else {
			$data = [
				'nama_sanggar' 		=> htmlspecialchars($this->input->post('nama_sanggar', true)),
				'nama_ketua' 		=> htmlspecialchars($this->input->post('nama_ketua', true)),
				'nik_ketua'			=> htmlspecialchars($this->input->post('nik_ketua', true)),
				'tipe_sanggar_id'	=> htmlspecialchars($this->input->post('tipe_sanggar_id', true)),
				'deskripsi_seni' 	=> htmlspecialchars($this->input->post('deskripsi_seni', true)),
				'nomor_telepon'		=> htmlspecialchars($this->input->post('nomor_telepon', true)),
				'email'				=> htmlspecialchars($this->input->post('email', true)),
				'alamat'			=> htmlspecialchars($this->input->post('alamat', true)),
				'kota'				=> htmlspecialchars($this->input->post('kota', true)),
				'kecamatan'			=> htmlspecialchars($this->input->post('kecamatan', true)),
				'kelurahan'			=> htmlspecialchars($this->input->post('kelurahan', true)),
				'kode_pos'			=> htmlspecialchars($this->input->post('kode_pos', true)),
				'gambar'			=> 'default.jpg',
				'foto_ketua_sanggar'=> 'avatar.jpg',
				'password'			=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' 			=> 2,
				'is_active' 		=> 1,
				'date_created' 		=> time()
			];

			$this->db->insert('user_sanggar', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan sanggar baru</div>');
			redirect('administrator/sanggar/index');
		}
		
	}

	public function edit($id_sanggar)
	{
		$this->form_validation->set_rules('nama_sanggar', 'Nama Sanggar', 'required');
		$this->form_validation->set_rules('nama_ketua', 'Nama Ketua', 'required');
		$this->form_validation->set_rules('nik_ketua', 'NIK Ketua Sanggar', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		if( $this->form_validation->run() == false )
		{
			$data['tipe_sanggar'] = $this->Admin_model->getAllTipe();
			$data['judul']	 = 'Edit Data Sanggar';
			$data['sanggar'] = $this->Admin_model->getSanggarById($id_sanggar);
			$data['user']	 = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar');
			$this->load->view('templates/admin_topbar', $data);
			$this->load->view('admin/sanggar/edit', $data);
			$this->load->view('templates/admin_footer');	
		} else {

				$nama_sanggar 		= htmlspecialchars($this->input->post('nama_sanggar', true));
				$nama_ketua 		= htmlspecialchars($this->input->post('nama_ketua', true));
				$nik_ketua			= htmlspecialchars($this->input->post('nik_ketua', true));
				$tipe_sanggar_id	= htmlspecialchars($this->input->post('tipe_sanggar_id', true));
				$deskripsi_seni 	= htmlspecialchars($this->input->post('deskripsi_seni', true));
				$nomor_telepon		= htmlspecialchars($this->input->post('nomor_telepon', true));
				$email				= htmlspecialchars($this->input->post('email', true));
				$alamat				= htmlspecialchars($this->input->post('alamat', true));
				$kota				= htmlspecialchars($this->input->post('kota', true));
				$kecamatan			= htmlspecialchars($this->input->post('kecamatan', true));
				$kelurahan			= htmlspecialchars($this->input->post('kelurahan', true));
				$kode_pos			= htmlspecialchars($this->input->post('kode_pos', true));

			$this->db->set('nama_sanggar', $nama_sanggar);
			$this->db->set('nama_ketua', $nama_ketua);
			$this->db->set('nik_ketua', $nik_ketua);
			$this->db->set('tipe_sanggar_id', $tipe_sanggar_id);
			$this->db->set('deskripsi_seni', $deskripsi_seni);
			$this->db->set('nomor_telepon', $nomor_telepon);
			$this->db->set('email', $email);
			$this->db->set('alamat', $alamat);
			$this->db->set('kota', $kota);
			$this->db->set('kecamatan', $kecamatan);
			$this->db->set('kelurahan', $kelurahan);
			$this->db->set('kode_pos', $kode_pos);
			$this->db->where('id_sanggar', $id_sanggar);

			$this->db->update('user_sanggar');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengubah data sanggar</div>');
			redirect('administrator/sanggar/index');
		}
		
	}

	public function hapus($id_sanggar)
	{
		$this->Admin_model->hapusSanggar($id_sanggar);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus member</div>');
		redirect('administrator/sanggar/index');
	}

	public function change_password($id_sanggar)
	{
		// $this->form_validation->set_rules('password', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

		if($this->form_validation->run() == false) 
		{
			$data['judul']		= 'Ubah password sanggar';
			$data['sanggar'] 	= $this->Admin_model->getSanggarById($id_sanggar);
			$data['user']		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar');
			$this->load->view('templates/admin_topbar', $data);
			$this->load->view('admin/sanggar/ubah_password', $data);
			$this->load->view('templates/admin_footer');
		} else {
			$password 		= $this->input->post('password');
			$new_password 	= $this->input->post('new_password1');

			
			// password sudah ok
			$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

			$this->db->set('password', $password_hash);
			$this->db->where('id_sanggar', $id_sanggar);
			$this->db->update('user_sanggar');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil di ubah!</div>');
			redirect('administrator/sanggar/index');
		}
	}

	public function cetak_data()
	{
		$this->load->library('dompdf_gen');
		$data['judul']		= 'Cetak data sanggar';
		$data['sanggar']	= $this->db->query("SELECT * FROM user_sanggar JOIN kategori_tipe_sanggar ON user_sanggar.tipe_sanggar_id = kategori_tipe_sanggar.id")->result_array();	
		$data['gambar']		= FCPATH.'assets/img/logo2.png';	
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('admin/sanggar/cetak_data', $data);

		$paper_size		= 'A4';
		$orientation	= 'potrait';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_data_sanggar.pdf", array('Attachment' =>0));
	}
}