<?php 

class Dinas extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function syarat()
	{
		$data['judul'] = 'Halaman syarat sertifikasi';
		$data['dinas'] = $this->Admin_model->getAllSyarat();
		$data['total_syarat'] = $this->Admin_model->total_syarat()->num_rows();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/dinas/syarat_sertifikasi', $data);
		$this->load->view('templates/admin_footer');
	}

	public function proses_tambah()
	{
		$this->db->insert('d_syarat', ["syarat" => htmlspecialchars($this->input->post('syarat', true))]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan syarat sertifikasi</div>');
		redirect('administrator/dinas/syarat');
	}

	public function edit_data($id)
	{
		$data['dinas'] = $this->Admin_model->getSyaratById($id);
		
	}

	public function proses_edit($id)
	{
		$syarat = $this->input->post('syarat');
		
		$this->db->set('syarat', $syarat);
		$this->db->where('id', $id);
		$this->db->update('d_syarat');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengubah syarat sertifikasi</div>');
		redirect('administrator/dinas/syarat');
	}

	public function hapus_syarat($id)
	{
		{
		$this->Admin_model->hapusSyarat($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus syarat</div>');
		redirect('administrator/dinas/syarat');
		}
	}

	public function sertifikasi()
	{
		$data['judul'] = 'Halaman sertifikasi';
		$data['dinas'] = $this->Admin_model->getAllSyarat();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/dinas/index', $data);
		$this->load->view('templates/admin_footer');
	}
}