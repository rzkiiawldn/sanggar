<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengundang extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}

	public function index()
	{
		$data = [
			'judul'			=> 'Halaman undang',
			'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'		=> $this->session->userdata('nama'),
			'sanggar'		=> $this->MU_sanggar->getAllSanggar()->result_array(),
			'undang'		=> $this->MU_undang->getAllUndang()->result_array()
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/pengundang/index', $data);
		$this->load->view('templates/user_footer');
	}	

	public function detail_undang($id)
	{
		$data = [
			'judul'			=> 'Halaman undang',
			'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'		=> $this->session->userdata('nama'),
			'sanggar'		=> $this->MU_sanggar->getAllSanggar()->result_array(),
			'undang'		=> $this->MU_undang->getUndangById($id)->row_array()
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/pengundang/detail', $data);
		$this->load->view('templates/user_footer');
	}

	public function undang($id)
	{

		$dariDB 				= $this->MU_undang->cekkodeundang();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut 				= substr($dariDB, 3, 3);
        $kodeundangSekarang 	= $nourut + 1;

		$this->form_validation->set_rules('nama_acara', 'Nama acara', 'required|trim', ['required' => 'Tanggal tidak boleh kosong']);
		$this->form_validation->set_rules('tanggal_acara', 'Tanggal undang', 'required|trim', ['required' => 'Tanggal tidak boleh kosong']);

		if( $this->form_validation->run() == false )
		{
			$data = [
				'judul'				=> 'undang',
				'user'				=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
				'tb_user'			=> $this->session->userdata('nama'),
				'kode_pengundang'	=> $kodeundangSekarang,
				'undang'			=> $this->MU_undang->getUndangById($id)->row_array()
			];
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_navbar', $data);
			$this->load->view('user/pengundang/undang', $data);
			$this->load->view('templates/user_footer');
		} else {

			$kode_undang		=	htmlspecialchars($this->input->post('kode_undang', true));
			$id_user			=	htmlspecialchars($this->input->post('id_user', true));
			$id_sanggar			=	htmlspecialchars($this->input->post('id_sanggar', true));
			$id_paket_undang	=	htmlspecialchars($this->input->post('id_paket_undang', true));
			$nama_acara			=	htmlspecialchars($this->input->post('nama_acara', true));
			$tanggal_acara		=	htmlspecialchars($this->input->post('tanggal_acara', true));
			$biaya_undang		=	htmlspecialchars($this->input->post('biaya_undang', true));

			$data =	[
				'kode_undang'			=> $kode_undang,
				'id_user'				=> $id_user,
				'id_sanggar'			=> $id_sanggar,
				'id_paket_undang'		=> $id_paket_undang,
				'nama_acara'			=> $nama_acara,
				'tanggal_undang'		=> date('Y-m-d'),
				'tanggal_acara'			=> $tanggal_acara,
				'biaya_undang'			=> $biaya_undang,
				'bukti_pembayaran'		=> NULL,
				'status_undang'			=> 0
			];

			$this->db->insert('tb_pengundang', $data);

			$status = '0';
			$id 	= $id_paket_undang;

			$this->db->set('status', $status);
			$this->db->where('id', $id);
			$this->db->update('s_paket_undang');

			$this->session->set_flashdata('message', '<div id="alert" class="alert alert-success" role="alert"> Transaksi undang berhasil, silahkan lanjutkan pembayaran dan hubungi pihak sanggar terkait </div>');
			redirect('user/riwayat/pengundang');
		}
	}

	public function upload($kode_undang)
	{
		$nama_pengundang	= $this->input->post('nama');
		$email_sanggar	= $this->input->post('email');

		$bukti_pembayaran = $_FILES['bukti_pembayaran'];
			if($bukti_pembayaran) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/bukti_pembayaran_undang/';	
				$this->load->library('upload', $config);

				if($this->upload->do_upload('bukti_pembayaran')) {
					$old_bukti_pembayaran = $data['user']['bukti_pembayaran'];
					if($old_bukti_pembayaran != 'default.jpg') {
						unlink(FCPATH . 'assets/bukti_pembayaran_undang/' . $old_bukti_pembayaran);
					}

					$new_bukti_pembayaran = $this->upload->data('file_name');
					$this->db->set('bukti_pembayaran', $new_bukti_pembayaran);
				} else {
					echo $this->upload->display_errors('bukti_pembayaran');
				}
			}

		$this->db->where('kode_undang', $kode_undang);
		$this->db->update('tb_pengundang');

		$this->_sendEmail($nama_pengundang, $email_sanggar, 'verify');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil meng-upload bukti pembayaran, silahkan tunggu informasi selanjutnya</div>');
		redirect('user/riwayat/detail_undang/'.$kode_undang);
	}

	private function _sendEmail($nama_pengundang, $email_sanggar, $type)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'sanggarsans@gmail.com',
			'smtp_pass' => 'sanggarsans123',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('sanggarsans@gmail.com', 'SanggarSans');
		$this->email->to($email_sanggar);

		if ($type == 'verify') {
			$this->email->subject('Undang Paket Sanggar');
			$this->email->message($nama_pengundang.' Telah melakukan pembayaran ke sanggar anda, silahkan cek pembayaran pada akun anda dan konfirmasi undang');
		} 

		if ($this->email->send()) {
			return true;
		}else {
			echo $this->email->print_debugger();
			die;
		}

	}

	public function cetak_invoice($kode_undang)
	{
		$data['pengundang'] = $this->db->query("SELECT * FROM tb_pengundang tp, user u, user_sanggar us, s_paket_undang sa WHERE tp.id_user=u.id AND tp.id_sanggar=us.id_sanggar AND tp.id_paket_undang=sa.id AND tp.kode_undang='$kode_undang' ")->row_array();

		$this->load->view('user/pengundang/cetak', $data);
	}
}