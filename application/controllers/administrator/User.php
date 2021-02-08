<?php 

class User extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data['judul']	= ('Admin | User');
		$data['data_user'] = $this->Admin_model->getAllUser();		
		$data['total_user'] = $this->Admin_model->total_user()->num_rows();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/user/index', $data);
		$this->load->view('templates/admin_footer');
	}

	public function tambah_user()
	{
		// if($this->session->userdata('email')) {
		// 	redirect('user');
		// }
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email ini sudah digunakan!'
		]);
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
				'matches' => 'password dont match!',
				'min_length' => 'password to short!'
			]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if( $this->form_validation->run() == false )
		{
			$data['judul']	= ('Tambah User');
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar');
			$this->load->view('templates/admin_topbar', $data);
			$this->load->view('admin/user/tambah', $data);
			$this->load->view('templates/admin_footer');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
				'tanggal_lahir' => $this->input->post('tanggal_lahir', date('Y-m-d')),
				'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'gambar' => 'avatar.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 4,
				'is_active' => 1,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan member baru</div>');
			redirect('administrator/user/index');
		}
	}

	public function detail_user($id)
	{
		$data['judul'] = 'Detail User';
		$data['data_user'] = $this->Admin_model->getUserById($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/user/detail', $data);
		$this->load->view('templates/admin_footer');
	}

	public function hapus_user($id)
	{
		$this->Admin_model->hapusUser($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus member</div>');
		redirect('administrator/user/index');
	}

	public function edit_user($id)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$data['judul'] = 'Ubah data member';
			$data['data_user'] = $this->Admin_model->getUserById($id);
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar');
			$this->load->view('templates/admin_topbar', $data);
			$this->load->view('admin/user/ubah', $data);
			$this->load->view('templates/admin_footer');
		}
		else {

			$nama 			= $this->input->post('nama');
			$email 			= $this->input->post('email');
			$nomor_telepon 	= $this->input->post('nomor_telepon');
			$tempat_lahir	= $this->input->post('tempat_lahir');
			$tanggal_lahir 	= $this->input->post('tanggal_lahir');
			$jenis_kelamin 	= $this->input->post('jenis_kelamin');
			$alamat 		= $this->input->post('alamat');

			$gambar = $_FILES['gambar'];
			if($gambar) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
				$config['max_size']		 = '2048';
				$config['upload_path']	 = './assets/img/profile/';	

				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar')) {	
					$old_gambar		 = $data['data_user']['gambar'];
					if($old_gambar 	!= 'avatar.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_gambar);
					}

					$new_gambar = $this->upload->data('file_name');
					$this->db->set('gambar', $new_gambar);
				} else {
					echo $this->upload->display_errors('gambar');
				}
			}

				$this->db->set('nama', $nama);
				$this->db->set('email', $email);
				$this->db->set('nomor_telepon', $nomor_telepon);
				$this->db->set('tempat_lahir', $tempat_lahir);
				$this->db->set('tanggal_lahir', $tanggal_lahir);
				$this->db->set('jenis_kelamin', $jenis_kelamin);
				$this->db->set('alamat', $alamat);
				$this->db->where('id', $id);
				$this->db->update('user');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil mengedit profil!</div>');
				redirect('administrator/user');
		}
	}

	public function change_password($id)
	{
		// $this->form_validation->set_rules('password', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

		if($this->form_validation->run() == false) 
		{
			$data['judul']		= 'Ubah password member';
			$data['data_user']	= $this->Admin_model->getUserById($id);
			$data['user']		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar');
			$this->load->view('templates/admin_topbar', $data);
			$this->load->view('admin/user/ubah_password', $data);
			$this->load->view('templates/admin_footer');
		} else {
			$password 		= $this->input->post('password');
			$new_password 	= $this->input->post('new_password1');

			
			// password sudah ok
			$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

			$this->db->set('password', $password_hash);
			$this->db->where('id', $id);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil di ubah!</div>');
			redirect('administrator/user/index');
		}
	}

	public function cetak_data()
	{
		$this->load->library('dompdf_gen');
		$data['judul']		= 'Cetak data pengguna';
		$data['data_user']	= $this->db->query("SELECT * FROM user")->result_array();	
		$data['gambar']		= FCPATH.'assets/img/logo2.png';	
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('admin/user/cetak_data', $data);

		$paper_size		= 'A4';
		$orientation	= 'potrait';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_data_pendaftaran.pdf", array('Attachment' =>0));
	}

}