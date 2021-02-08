<?php 

class Pendaftar extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$dariDB = $this->Admin_model->cekkodependaftar();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB, 3, 3);
        $kodependaftarSekarang = $nourut + 1;
        $data = array('kode_pendaftar' => $kodependaftarSekarang);

		$data['judul'] = ('Data pendaftar');
		$data['pendaftaran'] = $this->db->query("SELECT * FROM tb_pendaftaran JOIN user_sanggar ON tb_pendaftaran.id_sanggar = user_sanggar.id_sanggar JOIN s_kelas ON tb_pendaftaran.id_kelas = s_kelas.id JOIN user ON tb_pendaftaran.id_user = user.id")->result_array();
		$data['user_id'] = $this->Admin_model->getAllUserByRoleId();
		$data['user_sanggar_id'] = $this->Admin_model->getAllSanggarByRoleId();
		$data['kelas_id'] = $this->Admin_model->getAllKelas();
		$data['total_pendaftar'] = $this->Admin_model->total_pendaftar()->num_rows();
		$data['diterima'] = $this->db->query("SELECT * FROM tb_pendaftaran WHERE status_pendaftaran = 2")->num_rows();
		$data['diproses'] = $this->db->query("SELECT * FROM tb_pendaftaran WHERE status_pendaftaran = 1")->num_rows();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['status'] = $this->db->query("SELECT * FROM status WHERE id BETWEEN '1' AND '2'")->result_array();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar');
		$this->load->view('admin/pendaftar/index', $data);
		$this->load->view('templates/admin_footer');
	}

	public function tambah_pendaftar()
	{
		$data = [
			"kode_pendaftaran" 		=> htmlspecialchars($this->input->post('kode_pendaftaran', true)),
			"tanggal_pendaftaran" 	=> date('Y-m-d'),
			"id_user"				=> htmlspecialchars($this->input->post('id_user', true)),
			"id_sanggar"			=> htmlspecialchars($this->input->post('id_sanggar', true)),
			"id_kelas" 				=> htmlspecialchars($this->input->post('id_kelas', true)),
			"status"				=> 1
		];
		$this->db->insert('tb_pendaftaran', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan data pendaftaran sanggar</div>');
		redirect('administrator/pendaftar/index');
	}

	public function hapus_pendaftar($kode_pendaftaran)
	{
		$this->Admin_model->hapusPendaftar($kode_pendaftaran);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus data pendaftar</div>');
		redirect('administrator/pendaftar/index');
	}

	public function cek_status($kode_pendaftaran)
	{
		$status = $this->input->post('status');
		
		$this->db->set('status', $status);
		$this->db->where('kode_pendaftaran', $kode_pendaftaran);
		$this->db->update('tb_pendaftaran');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengubah status pendaftaran</div>');
		redirect('administrator/pendaftar/index');
	}

	public function detail_pendaftar($kode_pendaftaran)
	{
		$data['judul'] 		= 'Detail Pendaftaran';
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pendaftar'] 	= $this->db->query("SELECT * FROM tb_pendaftaran JOIN user ON tb_pendaftaran.id_user = user.id JOIN user_sanggar ON tb_pendaftaran.id_sanggar = user_sanggar.id_sanggar JOIN s_kelas ON tb_pendaftaran.id_kelas = s_kelas.id JOIN k_umur ON s_kelas.id_umur = k_umur.id_umur WHERE kode_pendaftaran='$kode_pendaftaran'")->row_array();
		$data['data_kelas'] 	= $this->db->query("SELECT * FROM tb_pendaftaran JOIN s_kelas ON tb_pendaftaran.id_kelas = s_kelas.id JOIN k_umur ON s_kelas.id_umur = k_umur.id_umur WHERE kode_pendaftaran='$kode_pendaftaran'")->row_array();
		$data['data_pendaftar'] 	= $this->db->query("SELECT * FROM tb_pendaftaran JOIN user ON tb_pendaftaran.id_user = user.id WHERE kode_pendaftaran='$kode_pendaftaran'")->row_array();
		$data['data_sanggar'] 	= $this->db->query("SELECT * FROM tb_pendaftaran JOIN user_sanggar ON tb_pendaftaran.id_sanggar = user_sanggar.id_sanggar JOIN kategori_tipe_sanggar ON user_sanggar.tipe_sanggar_id = kategori_tipe_sanggar.id WHERE kode_pendaftaran='$kode_pendaftaran'")->row_array();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar');
		$this->load->view('admin/pendaftar/detail', $data);
		$this->load->view('templates/admin_footer');
	}

	public function cetak_data()
	{
		$this->load->library('dompdf_gen');
		$data['judul']		= 'Cetak data pendaftar';
		$data['pendaftar']	= $this->db->query("SELECT * FROM tb_pendaftaran JOIN user ON tb_pendaftaran.id_user = user.id JOIN user_sanggar ON tb_pendaftaran.id_sanggar = user_sanggar.id_sanggar JOIN s_kelas ON tb_pendaftaran.id_kelas = s_kelas.id JOIN k_umur ON s_kelas.id_umur = k_umur.id_umur")->result_array();	
		$data['gambar']		= FCPATH.'assets/img/logo2.png';	
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('admin/pendaftar/cetak_data', $data);

		$paper_size		= 'A4';
		$orientation	= 'potrait';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_data_pendaftaran.pdf", array('Attachment' =>0));
	}
}