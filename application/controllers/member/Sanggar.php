<?php 

class Sanggar extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function tari()
	{
		$data ['judul'] = 'Sanggar Tari';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tari'] = $this->db->query("SELECT * FROM user_sanggar us JOIN kategori_tipe_sanggar kt ON us.tipe_sanggar_id = kt.id WHERE tipe_sanggar_id=1 ")->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/sanggar/tari', $data);
		$this->load->view('templates/user_footer');
	}

	public function teater()
	{
		$data ['judul'] = 'Sanggar Teater';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['teater'] = $this->db->query("SELECT * FROM user_sanggar us JOIN kategori_tipe_sanggar kt ON us.tipe_sanggar_id = kt.id WHERE tipe_sanggar_id=2 ")->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/sanggar/teater', $data);
		$this->load->view('templates/user_footer');
	}

	public function musik()
	{
		$data ['judul'] = 'Sanggar Musik';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['musik'] = $this->db->query("SELECT * FROM user_sanggar us JOIN kategori_tipe_sanggar kt ON us.tipe_sanggar_id = kt.id WHERE tipe_sanggar_id=3 ")->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/sanggar/musik', $data);
		$this->load->view('templates/user_footer');
	}

	public function detail_sanggar($id_sanggar)
	{
		$dariDB = $this->Admin_model->cekkodependaftar();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB, 3, 3);
        $kodependaftarSekarang = $nourut + 1;
        $data = array('kode_pendaftar' => $kodependaftarSekarang);

		$data ['judul'] = 'Detail Sanggar';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['sanggar'] = $this->Admin_model->getSanggarById($id_sanggar);
		$data['sanggar'] = $this->db->query("SELECT * FROM user_sanggar JOIN kategori_tipe_sanggar ON user_sanggar.tipe_sanggar_id = kategori_tipe_sanggar.id WHERE id_sanggar='$id_sanggar'")->row_array();
		$data['kelas_id'] = $this->db->query("SELECT * FROM s_kelas tr JOIN user_sanggar cs ON tr.sanggar_id
        = cs.id_sanggar AND cs.id_sanggar='$id_sanggar'")->result_array();
        $data['galeri'] = $this->db->query("SELECT * FROM s_galeri tr JOIN user_sanggar cs ON tr.sanggar_id
        = cs.id_sanggar AND cs.id_sanggar='$id_sanggar'")->result_array();

		$data['atribut'] = $this->db->query("SELECT * FROM s_atribut WHERE sanggar_id='$id_sanggar'")->result_array();		
		$data['undang'] = $this->db->query("SELECT * FROM s_paket_undang WHERE sanggar_id='$id_sanggar'")->result_array();
		$data['jadwal'] = $this->db->query("SELECT * FROM s_jadwal_latihan jl JOIN s_kelas k ON jl.kelas_id = k.id WHERE jl.sanggar_id='$id_sanggar'")->result_array();

		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/sanggar/detail_sanggar', $data);
		$this->load->view('templates/user_footer', $data);
	}

	public function daftar_sanggar()
	{
		$data = [
			"kode_pendaftaran" 		=> htmlspecialchars($this->input->post('kode_pendaftaran', true)),
			"tanggal_pendaftaran" 	=> time(),
			"user_id"				=> htmlspecialchars($this->input->post('user_id', true)),
			"user_sanggar_id"		=> htmlspecialchars($this->input->post('user_sanggar_id', true)),
			"kelas_id" 				=> htmlspecialchars($this->input->post('kelas_id', true)),
			"status"				=> 1
		];
		$this->db->insert('tb_pendaftaran', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mendaftar ke sanggar, silahkan tunggu proses selanjutnya</div>');
		redirect('member/riwayat/pendaftaran');
	}
}