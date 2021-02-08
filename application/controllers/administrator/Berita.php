<?php 

class Berita extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data['judul'] = 'Halaman Berita';
		$data['berita']	= $this->Admin_model->getAllBerita();
		$data['total_berita'] = $this->Admin_model->total_berita()->num_rows();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/berita/index', $data);
		$this->load->view('templates/admin_footer');
	}

	public function tambah_berita()
	{

		$gambar = $_FILES['gambar'];
		if ($gambar=''){}else
			{
				$config['upload_path']		= './assets/gambar_berita/';
				$config['allowed_types']	= 'jpg|png|gif|jpeg|JPEG';
				$config['max_size']			= '2048';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('gambar'))
				{
					$gambar = $this->upload->data('file_name');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali foto yang anda upload!</div>');
					redirect('administrator/berita/index');
				}
			}
		$data = [
			'judul_berita'	=> htmlspecialchars($this->input->post('judul_berita', true)),
			'keterangan' 	=> $this->input->post('keterangan', true),
			'pengirim' 		=> htmlspecialchars($this->input->post('pengirim', true)),
			'date_created'	=> time(),
			'gambar'		=> $gambar
		];

		$this->db->insert('tb_berita', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan berita baru</div>');
		redirect('administrator/berita/index');
	}

	public function detail_berita($id)
	{
		$data['judul'] = 'Detail berita';
		$data['berita'] = $this->Admin_model->getBeritaById($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/berita/detail', $data);
		$this->load->view('templates/admin_footer');
	}

	public function hapus_berita($id)
	{
		$this->Admin_model->hapusBerita($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus berita</div>');
		redirect('administrator/berita/index');
	}

	public function edit_berita($id)
	{

		$judul_berita	= $this->input->post('judul_berita');
		$keterangan 	= $this->input->post('keterangan');

		$gambar = $_FILES['gambar'];
			if($gambar=''){}else 
			{
				$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/gambar_berita/';	
				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar')) {
					$old_gambar = $data['berita']['gambar'];
					if($old_gambar != 'default.jpg') {
						unlink(FCPATH . 'assets/gambar_berita/' . $old_gambar);
					}

					$new_gambar = $this->upload->data('file_name');
					$this->db->set('gambar', $new_gambar);
				} else {
					echo $this->upload->display_errors('gambar');
				}
			}

		$this->db->set('judul_berita', $judul_berita);
		$this->db->set('keterangan', $keterangan);
		$this->db->where('id', $id);
		$this->db->update('tb_berita');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit berita</div>');
		redirect('administrator/berita/index');
	}
}