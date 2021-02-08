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
		$user = $this->session->userdata('nama_sanggar');
		$data['user_sanggar'] 	= $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array();
		$data['berita'] = $this->db->query("SELECT * FROM tb_berita tr, user_sanggar cs WHERE tr.pengirim
        = cs.nama_sanggar AND cs.nama_sanggar='$user' ORDER BY id DESC")->result_array();
		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/berita/index', $data);
		$this->load->view('templates/sanggar_footer');
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
					redirect('sanggar/kelas/index');
				}
			}

		$data = [
			'judul_berita'	=> htmlspecialchars($this->input->post('judul_berita', true)),
			'redaksi' 		=> htmlspecialchars($this->input->post('redaksi', true)),
			'pengirim' 		=> htmlspecialchars($this->input->post('pengirim', true)),
			'date_created'	=> time(),
			'gambar' 		=> $gambar
		];

		$this->db->insert('tb_berita', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan berita baru</div>');
		redirect('sanggar/berita/index');	
	}

	public function detail_berita($id)
	{
		$data['judul'] = 'Detail berita';
		$data['berita'] = $this->Admin_model->getBeritaById($id);
		$user = $this->session->userdata('id_sanggar');
		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/berita/detail', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function hapus_berita($id)
	{
		$this->Admin_model->hapusBerita($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus berita</div>');
		redirect('sanggar/berita/index');
	}

	public function proses_edit($id)
	{
		$judul_berita 		= $this->input->post('judul_berita');
		$redaksi			= $this->input->post('redaksi');

		$gambar = $_FILES['gambar'];
			if($gambar=''){}else 
			{
				$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/gambar_berita/';	
				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar')) 
				{
					$new_gambar = $this->upload->data('file_name');
					$this->db->set('gambar', $new_gambar);
				} else {
					echo $this->upload->display_errors('gambar');
				}
			}


		$this->db->set('judul_berita', $judul_berita);
		$this->db->set('redaksi', $redaksi);
		$this->db->where('id', $id);
		$this->db->update('tb_berita');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengubah berita</div>');
		redirect('sanggar/berita/index');
	}
}