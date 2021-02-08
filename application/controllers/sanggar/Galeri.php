<?php 

class Galeri extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{

		$user 	= $this->session->userdata('id_sanggar');
		$data	=	[
			'judul'				=> 'Halaman Galeri Sanggar',
			'user_sanggar'		=> $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array(),
			'galeri'			=> $this->MS_galeri->getAllGaleri($user)->result_array()
		];
		
		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/galeri/index', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function tambah_galeri()
	{
		$gambar = $_FILES['foto'];
			if ($gambar=''){}else
				{
					$config['upload_path']		= './assets/gambar_galeri_sanggar/';
					$config['allowed_types']	= 'jpg|png|gif|jpeg|JPEG';
					$config['max_size']			= '2048';

					$this->load->library('upload',$config);

					if($this->upload->do_upload('foto'))
					{
						$gambar = $this->upload->data('file_name');
					} else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali foto yang anda upload!</div>');
						redirect('sanggar/galeri/index');
					}
				}

		$data = [
			'foto'			=> $gambar,
			'id_sanggar' 	=> htmlspecialchars($this->input->post('id_sanggar', true))
		];

		$this->db->insert('s_galeri', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan foto baru</div>');
		redirect('sanggar/galeri/index');
	}

	public function hapus_foto($foto)
	{
		unlink(FCPATH.'assets/gambar_galeri_sanggar/'.$foto);
		$this->db->where('foto', $foto);
		$this->db->delete('s_galeri');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus foto</div>');
		redirect('sanggar/galeri/index');
	}
}