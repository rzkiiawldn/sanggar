<?php 

class Event extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$data['judul'] = 'Halaman Event';
		$user = $this->session->userdata('nama_sanggar');
		$data['user_sanggar'] 	= $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array();
		$data['event']	= $this->db->query("SELECT * FROM tb_event tr, user_sanggar cs WHERE tr.pengirim
        = cs.nama_sanggar AND cs.nama_sanggar='$user' ORDER BY id DESC")->result_array();
		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/event/index', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function tambah_event()
	{
		$gambar = $_FILES['gambar'];
		if ($gambar=''){}else
			{
				$config['upload_path']		= './assets/gambar_event/';
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
				'judul_event' 	=> htmlspecialchars($this->input->post('judul_event', true)),
				'keterangan'	=> $this->input->post('keterangan', true),
				'pengirim' 		=> htmlspecialchars($this->input->post('pengirim', true)),
				'tanggal_event' => $this->input->post('tanggal_event', date('Y-m-d')),
				'date_created' 	=> time(),
				'gambar' 		=> $gambar
			];

			$this->db->insert('tb_event', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan event baru</div>');
			redirect('sanggar/event/index');
	}

	public function edit_event($id)
	{
		$judul_event	= $this->input->post('judul_event');
		$keterangan 	= $this->input->post('keterangan');
		$tanggal_event	= $this->input->post('tanggal_event');

		$gambar = $_FILES['gambar'];
			if($gambar) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/gambar_event/';	
				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar')) {
					$old_gambar = $data['user']['gambar'];
					if($old_gambar != 'default.jpg') {
						unlink(FCPATH . 'assets/gambar_event/' . $old_gambar);
					}

					$new_gambar = $this->upload->data('file_name');
					$this->db->set('gambar', $new_gambar);
				} else {
					echo $this->upload->display_errors('gambar');
				}
			}

		$this->db->set('judul_event', $judul_event);
		$this->db->set('keterangan', $keterangan);
		$this->db->set('tanggal_event', $tanggal_event);
		$this->db->where('id', $id);
		$this->db->update('tb_event');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit event</div>');
		redirect('sanggar/event/index');
	}

	public function detail_event($id)
	{
		$data['judul'] = 'Detail Event';
		$user = $this->session->userdata('id_sanggar');
		$data['user_sanggar'] 	= $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array();
		$data['event'] = $this->Admin_model->getEventById($id);
		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/event/detail', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function hapus_event($id)
	{
		$this->Admin_model->hapusEvent($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus event</div>');
		redirect('sanggar/event/index');
	}


}