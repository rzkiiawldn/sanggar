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
		$data['event']	= $this->Admin_model->getAllEvent();
		$data['total_event'] = $this->Admin_model->total_event()->num_rows();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/event/index', $data);
		$this->load->view('templates/admin_footer');
	}

	public function tambah_event()
	{
		$gambar = $_FILES['gambar'];
			if ($gambar='')
			{

			} else {
				$config['upload_path']		= './assets/gambar_event';
				$config['allowed_types']	= 'jpg|JPEG|jpeg|gif|png';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('gambar'))
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali foto yang anda upload</div>');
						redirect('administrator/event/index');
				} else {
					$gambar = $this->upload->data('file_name');
				}
			}
			$data = [
				'judul_event' 	=> htmlspecialchars($this->input->post('judul_event', true)),
				'keterangan' 	=> $this->input->post('keterangan', true),
				'pengirim' 		=> htmlspecialchars($this->input->post('pengirim', true)),
				'tanggal_event' => $this->input->post('tanggal_event', date('Y-m-d')),
				'date_created' 	=> time(),
				'gambar' 		=> $gambar
			];

			$this->db->insert('tb_event', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan event baru</div>');
			redirect('administrator/event/index');
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
		redirect('administrator/event/index');
	}

	public function detail_event($id)
	{
		$data['judul'] = 'Detail Event';
		$data['event'] = $this->Admin_model->getEventById($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/event/detail', $data);
		$this->load->view('templates/admin_footer');
	}

	public function hapus_event($id)
	{
		$this->Admin_model->hapusEvent($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus event</div>');
		redirect('administrator/event/index');
	}


}