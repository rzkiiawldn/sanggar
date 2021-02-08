<?php

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data['judul'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/profile/index', $data);
		$this->load->view('templates/admin_footer');
	}	

	public function edit()
	{
		$data['judul'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


		$this->form_validation->set_rules('nama','Nama Lengkap','required|trim',[
			'required' => 'Nama tidak boleh kosong'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar');
			$this->load->view('templates/admin_topbar', $data);
			$this->load->view('admin/profile/edit', $data);
			$this->load->view('templates/admin_footer');			
		} else {
			$nama 	= $this->input->post('nama');
			$email 	= $this->input->post('email');
			// Gambar
			$gambar = $_FILES['gambar']['name'];

			if($gambar) {
				$config['allowed_types']	= 'gif|png|jpg|PNG|JPEG|jpeg';
				$config['max_size']			= '2048';
				$config['upload_path']		= './assets/img/profile/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar')) {

					$old_gambar = $data['user']['gambar'];
					
					if($old_gambar != 'avatar.jpg') {
						unlink(FCPATH.'assets/img/profile/'.$old_gambar);
					}

					$new_gambar = $this->upload->data('file_name');
					$this->db->set('gambar', $new_gambar);

				} else {
					echo $this->upload->display_errors();
				}

			}


			$this->db->set('nama', $nama);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat profil berhasil diubah</div>');
			redirect('administrator/profile');
		}
	}

	public function edit_password()
	{
		$data['judul'] 	= 'Edit Password';
		$data['user'] 	= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('pw1', 'Password Lama' ,'required|trim',['required' => 'Password Tidak boleh kosong']);
		$this->form_validation->set_rules('pw2', 'Password Baru' ,'required|trim|min_length[4]|matches[pw3]',[
			'required' 		=> 'Password Tidak boleh kosong',
			'min_length' 	=> 'Password terlalu pendek',
			'matches' 		=> 'Password tidak sama',
		]);
		$this->form_validation->set_rules('pw3', 'Konfirmasi Password Baru' ,'required|trim|min_length[4]|matches[pw2]');

		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/admin_header', $data);
			$this->load->view('templates/admin_sidebar');
			$this->load->view('templates/admin_topbar', $data);
			$this->load->view('admin/profile/edit_password', $data);
			$this->load->view('templates/admin_footer');		
		} else {
			$pw1	= $this->input->post('pw1');
			$pw2	= $this->input->post('pw2');

			if(!password_verify($pw1, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Salah!</div>');
				redirect('administrator/profile/edit_password');
			} else {
				if($pw1 == $pw2) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama!</div>');
					redirect('administrator/profile/edit_password');
				} else {
					// jika password sudah benar
					$password_hash = password_hash($pw2, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil diubah!</div>');
					redirect('administrator/profile');

				}
			}
		}
	}	
}