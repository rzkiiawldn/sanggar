<?php 

class Penyewa extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{	
		$dariDB = $this->Admin_model->cekkodesewa();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB, 3, 3);
        $kodesewaSekarang = $nourut + 1;
        $data = array('kode_penyewa' => $kodesewaSekarang);

		$data['judul'] = ('Data Penyewa');
		$data['penyewa'] = $this->Admin_model->getAllPenyewa();
		$data['user_id'] = $this->Admin_model->getAllUserByRoleId();
		$data['user_sanggar_id'] = $this->Admin_model->getAllSanggarByRoleId();
		$data['atribut_id'] = $this->Admin_model->getAllPaket_sewa();	
		$data['total_penyewa'] = $this->Admin_model->total_penyewa()->num_rows();
		$data['diterima'] = $this->db->query("SELECT * FROM tb_penyewaan WHERE status_sewa = 1")->num_rows();
		$data['diproses'] = $this->db->query("SELECT * FROM tb_penyewaan WHERE status_sewa = 0")->num_rows();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['status'] = $this->Admin_model->getAllStatus();
		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar');
		$this->load->view('admin/penyewa/index', $data);
		$this->load->view('templates/admin_footer');
	}

	public function tambah_penyewa()
	{
		$data = [
			"kode_sewa" 		=> htmlspecialchars($this->input->post('kode_sewa', true)),
			"user_id"			=> htmlspecialchars($this->input->post('user_id', true)),
			"user_sanggar_id"	=> htmlspecialchars($this->input->post('user_sanggar_id', true)),
			"atribut_id" 		=> htmlspecialchars($this->input->post('atribut_id', true)),
			"tanggal_sewa"		=> time(),
			"lama_sewa"			=> htmlspecialchars($this->input->post('lama_sewa', true)),
			"biaya_sewa"		=> htmlspecialchars($this->input->post('biaya_sewa', true)),
			"bukti_pembayaran"	=> 1,
			"status"			=> 0
		];
		$this->db->insert('tb_penyewaan', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan data penyewa atribut sanggar</div>');
		redirect('administrator/penyewa/index');
	}

	public function hapus_penyewa($kode_sewa)
	{
		$this->Admin_model->hapusPenyewa($kode_sewa);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus data penyewa</div>');
		redirect('administrator/penyewa/index');
	}

	public function cek_status($kode_sewa)
	{
		$status = $this->input->post('status');
		
		$this->db->set('status', $status);
		$this->db->where('kode_sewa', $kode_sewa);
		$this->db->update('tb_penyewaan');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengubah status penyewaan</div>');
		redirect('administrator/penyewa/index');
	}

	public function detail($kode_sewa)
	{
		$data['judul'] 		= 'Detail Penyewaan';
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['penyewa'] 	= $this->db->query("SELECT * FROM tb_penyewaan JOIN user ON tb_penyewaan.id_user = user.id JOIN user_sanggar ON tb_penyewaan.id_sanggar = user_sanggar.id_sanggar JOIN s_atribut ON tb_penyewaan.id_atribut = s_atribut.id WHERE kode_sewa='$kode_sewa'")->row_array();
		$data['data_atribut'] 	= $this->db->query("SELECT * FROM tb_penyewaan JOIN s_atribut ON tb_penyewaan.id_atribut = s_atribut.id WHERE kode_sewa='$kode_sewa'")->row_array();
		$data['data_penyewa'] 	= $this->db->query("SELECT * FROM tb_penyewaan JOIN user ON tb_penyewaan.id_user = user.id WHERE kode_sewa='$kode_sewa'")->row_array();
		$data['data_sanggar'] 	= $this->db->query("SELECT * FROM tb_penyewaan JOIN user_sanggar ON tb_penyewaan.id_sanggar = user_sanggar.id_sanggar JOIN kategori_tipe_sanggar ON user_sanggar.tipe_sanggar_id = kategori_tipe_sanggar.id WHERE kode_sewa='$kode_sewa'")->row_array();

		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar');
		$this->load->view('admin/penyewa/detail', $data);
		$this->load->view('templates/admin_footer');
	}

	public function cetak_data()
	{
		$this->load->library('dompdf_gen');
		$data['judul']		= 'Cetak data penyewa';
		$data['penyewa']	= $this->db->query("SELECT * FROM tb_penyewaan JOIN user ON tb_penyewaan.id_user = user.id JOIN user_sanggar ON tb_penyewaan.id_sanggar = user_sanggar.id_sanggar JOIN s_atribut ON tb_penyewaan.id_atribut = s_atribut.id")->result_array();	
		$data['gambar']		= FCPATH.'assets/img/logo2.png';	
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('admin/penyewa/cetak_data', $data);

		$paper_size		= 'A4';
		$orientation	= 'landscape';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_data_penyewaan.pdf", array('Attachment' =>0));
	}

}