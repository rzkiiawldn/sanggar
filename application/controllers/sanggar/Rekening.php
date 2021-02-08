<?php 

class Rekening extends CI_Controller
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
			'judul'				=> 'Halaman Rekening Bank sanggar',
			'user_sanggar'		=> $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array(),
			'rekening'			=> $this->db->query("SELECT * FROM tb_rekening WHERE id_sanggar = '$user' ")->result_array()
		];

		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/rekening/index', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function tambah_rekening()
	{
		$data = [
			'id_sanggar' 		=> htmlspecialchars($this->input->post('id_sanggar', true)),
			'nama_bank' 		=> htmlspecialchars($this->input->post('nama_bank', true)),
			'nomor_rekening' 	=> htmlspecialchars($this->input->post('nomor_rekening', true)),
			'nama_pemilik' 	=> htmlspecialchars($this->input->post('nama_pemilik', true))
		];

		$this->db->insert('tb_rekening', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan rekening bank baru</div>');
		redirect('sanggar/rekening/index');
	}

	public function edit_rekening($id)
	{
		$nama_bank 			= $this->input->post('nama_bank');
		$nomor_rekening		= $this->input->post('nomor_rekening');
		$nama_pemilik 		= $this->input->post('nama_pemilik');

		$this->db->set('nama_bank', $nama_bank);
		$this->db->set('nomor_rekening', $nomor_rekening);
		$this->db->set('nama_pemilik', $nama_pemilik);
		$this->db->where('id', $id);
		$this->db->update('tb_rekening');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengubah rekening bank</div>');
		redirect('sanggar/rekening/index');
	}

	public function hapus_rekening($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_rekening');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus rekening</div>');
		redirect('sanggar/rekening/index');
	}
}