<?php 

class Undang extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$dariDB = $this->Admin_model->cekkodeundang();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB, 3, 3);
        $kodeundangSekarang = $nourut + 1;
        $data = array('kode_pengundang' => $kodeundangSekarang);

		$data['judul']	= ('Halaman data undang sanggar');
		$data['undang'] = $this->Admin_model->getAllPengundang();
		$data['user_id'] = $this->Admin_model->getAllUserByRoleId();
		$data['user_sanggar_id'] = $this->Admin_model->getAllSanggarByRoleId();
		$data['paket_undang_id'] = $this->Admin_model->getAllPaket_undang();	
		$data['total_undang'] = $this->Admin_model->total_undang()->num_rows();
		$data['diterima'] = $this->db->query("SELECT * FROM tb_pengundang WHERE status_undang = 1")->num_rows();
		$data['diproses'] = $this->db->query("SELECT * FROM tb_pengundang WHERE status_undang = 0")->num_rows();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['status'] = $this->Admin_model->getAllStatus();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/undang/index', $data);
		$this->load->view('templates/admin_footer');
	}

	public function tambah_pengundang()
	{
		$data = [
			"kode_undang" 		=> htmlspecialchars($this->input->post('kode_undang', true)),
			"user_id"			=> htmlspecialchars($this->input->post('user_id', true)),
			"user_sanggar_id"	=> htmlspecialchars($this->input->post('user_sanggar_id', true)),
			"paket_undang_id" 	=> htmlspecialchars($this->input->post('paket_undang_id', true)),
			"nama_acara"		=> htmlspecialchars($this->input->post('nama_acara', true)),
			"tanggal_undang"	=> date('Y-m-d'),
			"tanggal_acara"		=> $this->input->post('tanggal_acara', date('Y-m-d')),
			"lama_undang"		=> htmlspecialchars($this->input->post('lama_undang', true)),
			"biaya_undang"		=> htmlspecialchars($this->input->post('biaya_undang', true)),
			"bukti_pembayaran"	=> "",
			"status"			=> 0
		];
		$this->db->insert('tb_pengundang', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan data pengundang paket sanggar</div>');
		redirect('administrator/undang/index');
	}

	public function hapus_pengundang($kode_undang)
	{
		$this->Admin_model->hapusPengundang($kode_undang);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus data pengundang</div>');
		redirect('administrator/undang/index');
	}

	public function cek_status($kode_undang)
	{
		$status = $this->input->post('status');
		
		$this->db->set('status', $status);
		$this->db->where('kode_undang', $kode_undang);
		$this->db->update('tb_pengundang');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengubah status undang</div>');
		redirect('administrator/undang/index');
	}

	public function detail($kode_undang)
	{
		$data['judul'] 		= 'Detail Undang';
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['undang'] 	= $this->db->query("SELECT * FROM tb_pengundang JOIN user ON tb_pengundang.id_user = user.id JOIN user_sanggar ON tb_pengundang.id_sanggar = user_sanggar.id_sanggar JOIN s_paket_undang ON tb_pengundang.id_paket_undang = s_paket_undang.id WHERE kode_undang='$kode_undang'")->row_array();
		$data['data_paket'] 	= $this->db->query("SELECT * FROM tb_pengundang JOIN s_paket_undang ON tb_pengundang.id_paket_undang = s_paket_undang.id WHERE kode_undang='$kode_undang'")->row_array();
		$data['data_pengundang'] 	= $this->db->query("SELECT * FROM tb_pengundang JOIN user ON tb_pengundang.id_user = user.id WHERE kode_undang='$kode_undang'")->row_array();
		$data['data_sanggar'] 	= $this->db->query("SELECT * FROM tb_pengundang JOIN user_sanggar ON tb_pengundang.id_sanggar = user_sanggar.id_sanggar JOIN kategori_tipe_sanggar ON user_sanggar.tipe_sanggar_id = kategori_tipe_sanggar.id WHERE kode_undang='$kode_undang'")->row_array();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar');
		$this->load->view('admin/undang/detail', $data);
		$this->load->view('templates/admin_footer');
	}

	public function cetak_data()
	{
		$this->load->library('dompdf_gen');
		$data['judul']		= 'Cetak data pengundang';
		$data['undang']	= $this->db->query("SELECT * FROM tb_pengundang JOIN user ON tb_pengundang.id_user = user.id JOIN user_sanggar ON tb_pengundang.id_sanggar = user_sanggar.id_sanggar JOIN s_paket_undang ON tb_pengundang.id_paket_undang = s_paket_undang.id")->result_array();	
		$data['gambar']		= FCPATH.'assets/img/logo2.png';	
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('admin/undang/cetak_data', $data);

		$paper_size		= 'A4';
		$orientation	= 'landscape';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_data_pengundangan.pdf", array('Attachment' =>0));
	}
}

