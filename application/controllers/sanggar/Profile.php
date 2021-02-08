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
		$data['judul']			= 'Profil Sanggar';
		$data['user_sanggar']	= $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array();
		$data['tipe_sanggar']	= $this->db->query("SELECT * FROM kategori_tipe_sanggar")->result_array();
		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar', $data);
		$this->load->view('sanggar/profile/index', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function edit()
	{
		$data['judul'] = 'Edit Profile';
		$data['user_sanggar'] = $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array();
		$data['tipe_sanggar']	= $this->db->query("SELECT * FROM kategori_tipe_sanggar")->result_array();

		$this->form_validation->set_rules('nama_sanggar','Nama Sanggar','required|trim',[
			'required' => 'Nama sanggar tidak boleh kosong'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/sanggar_header', $data);
			$this->load->view('templates/sanggar_sidebar');
			$this->load->view('templates/sanggar_topbar', $data);
			$this->load->view('sanggar/profile/edit', $data);
			$this->load->view('templates/sanggar_footer');			
		} else {
			$nama_sanggar 		= $this->input->post('nama_sanggar');
			$nama_ketua 		= $this->input->post('nama_ketua');
			$tipe_sanggar_id 	= $this->input->post('tipe_sanggar_id');
			$deskripsi_seni 	= $this->input->post('deskripsi_seni');
			$nomor_telepon 		= $this->input->post('nomor_telepon');
			$email 				= $this->input->post('email');
			$alamat 			= $this->input->post('alamat');
			$latitude 			= $this->input->post('latitude');
			$longitude			= $this->input->post('longitude');
			// Gambar
			$foto_sanggar = $_FILES['foto_sanggar']['name'];

			if($foto_sanggar) {
				$config['allowed_types']	= 'gif|png|jpg|PNG|JPEG|jpeg';
				$config['max_size']			= '2048';
				$config['upload_path']		= './assets/img/sanggar/profile/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto_sanggar')) {

					$old_gambar = $data['user_sanggar']['foto_sanggar'];
					
					if($old_gambar != 'avatar.jpg') {
						unlink(FCPATH.'assets/img/profile/'.$old_gambar);
					}

					$new_gambar = $this->upload->data('file_name');
					$this->db->set('foto_sanggar', $new_gambar);

				} else {
					echo $this->upload->display_errors();
				}

			}


			$this->db->set('nama_sanggar', $nama_sanggar);
			$this->db->set('nama_ketua', $nama_ketua);
			$this->db->set('tipe_sanggar_id', $tipe_sanggar_id);
			$this->db->set('deskripsi_seni', $deskripsi_seni);
			$this->db->set('nomor_telepon', $nomor_telepon);
			$this->db->set('email', $email);
			$this->db->set('alamat', $alamat);
			$this->db->set('latitude', $latitude);
			$this->db->set('longitude', $longitude);
			$this->db->where('email', $email);
			$this->db->update('user_sanggar');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat profil berhasil diubah</div>');
			redirect('sanggar/profile');
		}
	}

	public function edit_password()
	{
		$data['judul'] 	= 'Edit Password';
		$data['user_sanggar'] 	= $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('pw1', 'Password Lama' ,'required|trim',['required' => 'Password Tidak boleh kosong']);
		$this->form_validation->set_rules('pw2', 'Password Baru' ,'required|trim|min_length[4]|matches[pw3]',[
			'required' 		=> 'Password Tidak boleh kosong',
			'min_length' 	=> 'Password terlalu pendek',
			'matches' 		=> 'Password tidak sama',
		]);
		$this->form_validation->set_rules('pw3', 'Konfirmasi Password Baru' ,'required|trim|min_length[4]|matches[pw2]',[
			'required' 		=> 'Password Tidak boleh kosong',
			'min_length' 	=> 'Password terlalu pendek',
			'matches' 		=> 'Password tidak sama',
		]);

		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/sanggar_header', $data);
			$this->load->view('templates/sanggar_sidebar');
			$this->load->view('templates/sanggar_topbar', $data);
			$this->load->view('sanggar/profile/edit_password', $data);
			$this->load->view('templates/sanggar_footer');		
		} else {
			$pw1	= $this->input->post('pw1');
			$pw2	= $this->input->post('pw2');

			if(!password_verify($pw1, $data['user_sanggar']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Salah!</div>');
				redirect('sanggar/profile/edit_password');
			} else {
				if($pw1 == $pw2) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama!</div>');
					redirect('sanggar/profile/edit_password');
				} else {
					// jika password sudah benar
					$password_hash = password_hash($pw2, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user_sanggar');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil diubah!</div>');
					redirect('sanggar/profile');

				}
			}
		}
	}	
}