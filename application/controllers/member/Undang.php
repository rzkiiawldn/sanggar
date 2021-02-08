<?php 

class Undang extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	

	public function index($id)
	{
		$this->form_validation->set_rules('biaya_sewa', 'Biaya Sewa', 'required|trim');
		$this->form_validation->set_rules('nama_acara', 'Nama Acara', 'required');

		if( $this->form_validation->run() == false )
		{
			$dariDB = $this->Admin_model->cekkodeundang();
	        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
	        $nourut = substr($dariDB, 3, 3);
	        $kodeundangSekarang = $nourut + 1;
	        $data = array('kode_pengundang' => $kodeundangSekarang);
			$data ['judul'] = 'Paket undang';
			$user = $this->session->userdata('id');
			$data['sanggar'] = $this->db->query("SELECT * FROM user_sanggar")->row_array();
			$data['undang'] = $this->db->query("SELECT * FROM s_paket_undang WHERE id='$id'")->result_array();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_navbar');
			$this->load->view('user/undang/index', $data);
			$this->load->view('templates/user_footer');
		} else {

			$data = [
				"kode_undang" 		=> htmlspecialchars($this->input->post('kode_undang', true)),
				"user_id"			=> htmlspecialchars($this->input->post('user_id', true)),
				"user_sanggar_id"	=> htmlspecialchars($this->input->post('user_sanggar_id', true)),
				"paket_undang_id"	=> htmlspecialchars($this->input->post('paket_undang_id', true)),
				"nama_acara" 		=> htmlspecialchars($this->input->post('nama_acara', true)),
				"tanggal_undang"	=> time(),
				"tanggal_acara"		=> $this->input->post('tanggal_acara', date('Y-m-d')),
				"lama_undang"		=> htmlspecialchars($this->input->post('lama_undang', true)),
				"biaya_undang"		=> htmlspecialchars($this->input->post('biaya_undang', true)),
				"bukti_pembayaran"	=> 1,
				"status"			=> 0
			];
			$this->db->insert('tb_pengundang', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengundang paket sanggar, silahkan selesaikan pembayaran !</div>');
			redirect('member/riwayat/undang');
		}
	}

}