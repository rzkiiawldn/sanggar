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
		$data ['judul'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jenis_kelamin'] = ['Laki-laki','Perempuan'];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar');
		$this->load->view('user/profile/index', $data);
		$this->load->view('templates/user_footer');
	}

	public function proses_edit($id)
	{
		$nama 			= $this->input->post('nama');
		$tempat_lahir	= $this->input->post('tempat_lahir');
		$tanggal_lahir 	= $this->input->post('tanggal_lahir');
		$jenis_kelamin 	= $this->input->post('jenis_kelamin');
		$alamat 		= $this->input->post('alamat');

		$gambar = $_FILES['gambar'];
			if($gambar=''){}else 
			{
				$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/img/profile/';	
				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar')) 
				{
					$new_gambar = $this->upload->data('file_name');
					$this->db->set('gambar', $new_gambar);
				} else {
					echo $this->upload->display_errors('gambar');
				}
			}


		$this->db->set('nama', $nama);
		$this->db->set('tempat_lahir', $tempat_lahir);
		$this->db->set('tanggal_lahir', $tanggal_lahir);
		$this->db->set('jenis_kelamin', $jenis_kelamin);
		$this->db->set('alamat', $alamat);
		$this->db->where('id', $id);
		$this->db->update('user');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengubah profile</div>');
		redirect('member/profile/index');
	}
}