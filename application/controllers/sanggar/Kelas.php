<?php 

class Kelas extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$user = $this->session->userdata('id_sanggar');
		$data	=	[
			'judul'				=> 'Halaman kelas sanggar',
			'user_sanggar'		=> $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array(),
			'kelas_id'			=> $this->MS_kelas->getAllKelas($user)->result_array(),
			'umur'				=> $this->MS_kriteria->getAllUmur()->result_array()
		];

		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/paket_kelas/index', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function tambah_kelas()
	{
		$gambar = $_FILES['gambar'];
			if ($gambar=''){}else
				{
					$config['upload_path']		= './assets/gambar_paket_kelas/';
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
			'nama_kelas' 		=> htmlspecialchars($this->input->post('nama_kelas', true)),
			'id_umur' 			=> htmlspecialchars($this->input->post('id_umur', true)),
			'deskripsi_kelas'	=> htmlspecialchars($this->input->post('deskripsi_kelas', true)),
			'gambar'			=> $gambar,
			'id_sanggar' 		=> htmlspecialchars($this->input->post('id_sanggar', true))
		];

		$this->db->insert('s_kelas', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan kelas baru</div>');
		redirect('sanggar/kelas/index');
	}

	public function hapus_kelas($id)
	{
		$this->MS_kelas->hapusKelas($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus kelas</div>');
		redirect('sanggar/kelas/index');
	}

	public function proses_edit($id)
	{
		$user 				= $this->session->userdata('id_sanggar');
		$data['s_kelas']	= $this->MS_kelas->getAllKelas($user)->row_array();
		$nama_kelas 		= $this->input->post('nama_kelas');
		$id_umur			= $this->input->post('id_umur');
		$deskripsi_kelas 	= $this->input->post('deskripsi_kelas');

		$gambar = $_FILES['gambar']['name'];

		if($gambar) {
			$config['allowed_types']	= 'gif|png|jpg|PNG|JPEG|jpeg';
			$config['max_size']			= '5000';
			$config['upload_path']		= './assets/gambar_paket_kelas/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('gambar')) {

				$new_gambar = $this->upload->data('file_name');
				$this->db->set('gambar', $new_gambar);

			} else {
				echo $this->upload->display_errors();
			}

		}


		$this->db->set('nama_kelas', $nama_kelas);
		$this->db->set('id_umur', $id_umur);
		$this->db->set('deskripsi_kelas', $deskripsi_kelas);
		$this->db->where('id', $id);
		$this->db->update('s_kelas');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengubah paket kelas</div>');
		redirect('sanggar/kelas/index');
	}
}