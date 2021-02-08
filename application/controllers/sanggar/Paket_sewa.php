<?php 

class Paket_sewa extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data['judul'] = 'Halaman kelola paket sewa';
		$data['user_sanggar'] 		= $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array();
		$user = $this->session->userdata('id_sanggar');
		$data['paket_sewa'] = $this->db->query("SELECT * FROM s_atribut tr, user_sanggar cs WHERE tr.id_sanggar
        = cs.id_sanggar AND cs.id_sanggar='$user' ORDER BY id DESC")->result_array();
		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/paket_sewa/index', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function tambah_paket_sewa()
	{
		$gambar = $_FILES['gambar'];
		if ($gambar=''){}else
			{
				$config['upload_path']		= './assets/gambar_paket_sewa/';
				$config['allowed_types']	= 'jpg|png|gif|jpeg|JPEG';
				$config['max_size']			= '2048';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('gambar'))
				{
					$gambar = $this->upload->data('file_name');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali foto yang anda upload!</div>');
					redirect('sanggar/paket_sewa/index');
				}
			}

		$data = [
			'jenis_atribut' 		=> htmlspecialchars($this->input->post('jenis_atribut', true)),
			'nama_atribut' 			=> htmlspecialchars($this->input->post('nama_atribut', true)),
			'keterangan_atribut' 	=> htmlspecialchars($this->input->post('keterangan_atribut', true)),
			'harga' 				=> htmlspecialchars($this->input->post('harga', true)),
			'denda' 				=> htmlspecialchars($this->input->post('denda', true)),
			'gambar' 				=> $gambar,
			'status' 				=> htmlspecialchars($this->input->post('status', true)),
			'id_sanggar' 			=> $this->input->post('id_sanggar')
		];

		$this->db->insert('s_atribut', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan paket sewa baru</div>');
		redirect('sanggar/paket_sewa/index');
	}

	public function hapus_paket_sewa($id)
	{
		$this->Admin_model->hapusPaketSewa($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus paket sewa</div>');
		redirect('sanggar/paket_sewa/index');
	}

	public function proses_edit($id)
	{
		$jenis_atribut 		= $this->input->post('jenis_atribut');
		$nama_atribut 		= $this->input->post('nama_atribut');
		$keterangan_atribut = $this->input->post('keterangan_atribut');
		$harga				= $this->input->post('harga');
		$denda				= $this->input->post('denda');
		$status				= $this->input->post('status');

		$gambar = $_FILES['gambar'];
			if($gambar=''){}else 
			{
				$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/gambar_paket_sewa/';	
				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar')) 
				{
					$new_gambar = $this->upload->data('file_name');
					$this->db->set('gambar', $new_gambar);
				} else {
					echo $this->upload->display_errors('gambar');
				}
			}


		$this->db->set('jenis_atribut', $jenis_atribut);
		$this->db->set('nama_atribut', $nama_atribut);
		$this->db->set('keterangan_atribut', $keterangan_atribut);
		$this->db->set('harga', $harga);
		$this->db->set('denda', $denda);
		$this->db->set('status', $status);
		$this->db->where('id', $id);
		$this->db->update('s_atribut');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengubah paket sewa</div>');
		redirect('sanggar/paket_sewa/index');
	}
}