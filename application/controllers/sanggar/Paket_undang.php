<?php 

class Paket_undang extends CI_Controller
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
			'judul'				=> 'kelola paket undang',
			'user_sanggar'		=> $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array(),
			'paket_undang'		=> $this->db->query("SELECT * FROM s_paket_undang sp, user_sanggar us WHERE sp.id_sanggar = us.id_sanggar AND sp.id_sanggar = '$user' ")->result_array(),
		];

		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/paket_undang/index', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function tambah_paket_undang()
	{
		$gambar = $_FILES['gambar'];
		if ($gambar=''){}else
			{
				$config['upload_path']		= './assets/gambar_paket_undang/';
				$config['allowed_types']	= 'jpg|png|gif|jpeg|JPEG';
				$config['max_size']			= '2048';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('gambar'))
				{
					$gambar = $this->upload->data('file_name');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali foto yang anda upload!</div>');
					redirect('sanggar/paket_undang/index');
				}
			}


		$data = [
			'jenis_paket'		=> htmlspecialchars($this->input->post('jenis_paket', true)),
			'nama_paket' 		=> htmlspecialchars($this->input->post('nama_paket', true)),
			'keterangan_paket' 	=> htmlspecialchars($this->input->post('keterangan_paket', true)),
			'harga' 			=> htmlspecialchars($this->input->post('harga', true)),
			'gambar' 			=> $gambar,
			'status'			=> htmlspecialchars($this->input->post('status', true)),
			'id_sanggar' 		=> $this->input->post('id_sanggar')
		];

		$this->db->insert('s_paket_undang', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan paket undang baru</div>');
		redirect('sanggar/paket_undang/index');
	}

	public function hapus_paket_undang($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('s_paket_undang');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus paket undang</div>');
		redirect('sanggar/paket_undang/index');
	}

	public function proses_edit($id)
	{
		$user 					= $this->session->userdata('id_sanggar');
		$data['s_paket_undang']	= $this->db->query("SELECT * FROM s_paket_undang sp, user_sanggar us WHERE sp.id_sanggar = us.id_sanggar AND sp.id_sanggar = '$user' ")->row_array();

		$jenis_paket 		= $this->input->post('jenis_paket');
		$nama_paket 		= $this->input->post('nama_paket');
		$keterangan_paket 	= $this->input->post('keterangan_paket');
		$harga				= $this->input->post('harga');
		$status				= $this->input->post('status');

		$gambar = $_FILES['gambar']['name'];

		if($gambar) {
			$config['allowed_types']	= 'gif|png|jpg|PNG|JPEG|jpeg';
			$config['max_size']			= '5000';
			$config['upload_path']		= './assets/gambar_paket_undang/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('gambar')) {

				$new_gambar = $this->upload->data('file_name');
				$this->db->set('gambar', $new_gambar);

			} else {
				echo $this->upload->display_errors();
			}

		}


		$this->db->set('jenis_paket', $jenis_paket);
		$this->db->set('nama_paket', $nama_paket);
		$this->db->set('keterangan_paket', $keterangan_paket);
		$this->db->set('harga', $harga);
		$this->db->set('status', $status);
		$this->db->where('id', $id);
		$this->db->update('s_paket_undang');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengubah paket undang</div>');
		redirect('sanggar/paket_undang/index');
	}
}