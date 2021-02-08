<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewaan extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}

	public function index()
	{
		$data = [
			'judul'			=> 'Halaman atribut',
			'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'		=> $this->session->userdata('nama'),
			'atribut'		=> $this->MU_atribut->getAllAtribut()->result_array()
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/penyewaan/index', $data);
		$this->load->view('templates/user_footer');
	}	

	public function detail_sewa($id)
	{
		$data = [
			'judul'			=> 'Halaman sewa',
			'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'tb_user'		=> $this->session->userdata('nama'),
			'atribut'		=> $this->MU_atribut->getAtributById($id)->row_array()
		];
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar', $data);
		$this->load->view('user/penyewaan/detail', $data);
		$this->load->view('templates/user_footer');
	}

	public function sewa($id)
	{

		$dariDB 				= $this->MS_penyewaan->cekkodesewa();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut 				= substr($dariDB, 3, 3);
        $kodesewaSekarang 		= $nourut + 1;

		$this->form_validation->set_rules('tanggal_sewa', 'Tanggal sewa', 'required|trim', ['required' => 'Tanggal tidak boleh kosong']);
		$this->form_validation->set_rules('tanggal_kembali', 'Tanggal sewa', 'required|trim', ['required' => 'Tanggal tidak boleh kosong']);

		if( $this->form_validation->run() == false )
		{
			$data = [
				'judul'			=> 'Sewa',
				'user'			=>  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
				'tb_user'		=> $this->session->userdata('nama'),
				'kode_penyewa' 	=> $kodesewaSekarang,
				'atribut'		=> $this->MU_atribut->getAtributById($id)->row_array()
			];
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_navbar', $data);
			$this->load->view('user/penyewaan/sewa', $data);
			$this->load->view('templates/user_footer');
		} else {

			$kode_sewa			=	htmlspecialchars($this->input->post('kode_sewa', true));
			$id_user			=	htmlspecialchars($this->input->post('id_user', true));
			$id_sanggar			=	htmlspecialchars($this->input->post('id_sanggar', true));
			$id_atribut			=	htmlspecialchars($this->input->post('id_atribut', true));
			$tanggal_sewa		=	htmlspecialchars($this->input->post('tanggal_sewa', true));
			$tanggal_kembali	=	htmlspecialchars($this->input->post('tanggal_kembali', true));
			$harga_sewa			=	htmlspecialchars($this->input->post('harga_sewa', true));
			$denda_sewa			=	htmlspecialchars($this->input->post('denda_sewa', true));

			$x = strtotime($tanggal_kembali);
            $y = strtotime($tanggal_sewa);
            $jumlah = abs(($x - $y)/(60*60*24));

            $total = $jumlah * $harga_sewa;

			$data =	[
				'kode_sewa'				=> $kode_sewa,
				'id_user'				=> $id_user,
				'id_sanggar'			=> $id_sanggar,
				'id_atribut'			=> $id_atribut,
				'tanggal_sewa'			=> $tanggal_sewa,
				'tanggal_kembali'		=> $tanggal_kembali,
				'lama_sewa'				=> $jumlah,
				'harga_sewa'			=> $total,
				'denda_sewa'			=> '',
				'tanggal_pengembalian'	=> '-',
				'bukti_pembayaran'		=> '',
				'status_sewa'			=> 0,
				'status_pengembalian'	=> 0,
			];

			$this->db->insert('tb_penyewaan', $data);

			$status = '0';
			$id 	= $id_atribut;

			$this->db->set('status', $status);
			$this->db->where('id', $id);
			$this->db->update('s_atribut');

			$this->session->set_flashdata('message', '<div id="alert" class="alert alert-success" role="alert"> Transaksi sewa berhasil, silahkan lanjutkan pembayaran dan hubungi pihak sanggar terkait </div>');
			redirect('user/riwayat/penyewaan');
		}
	}

	public function upload($kode_sewa)
	{
		$nama_penyewa	= $this->input->post('nama');
		$email_sanggar	= $this->input->post('email');

		$bukti_pembayaran = $_FILES['bukti_pembayaran'];
			if($bukti_pembayaran) {
				$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/bukti_pembayaran_sewa/';	
				$this->load->library('upload', $config);

				if($this->upload->do_upload('bukti_pembayaran')) {
					$old_bukti_pembayaran = $data['user']['bukti_pembayaran'];
					if($old_bukti_pembayaran != 'default.jpg') {
						unlink(FCPATH . 'assets/bukti_pembayaran_sewa/' . $old_bukti_pembayaran);
					}

					$new_bukti_pembayaran = $this->upload->data('file_name');
					$this->db->set('bukti_pembayaran', $new_bukti_pembayaran);
				} else {
					echo $this->upload->display_errors('bukti_pembayaran');
				}
			}

		$this->db->where('kode_sewa', $kode_sewa);
		$this->db->update('tb_penyewaan');


		$this->_sendEmail($nama_penyewa, $email_sanggar, 'verify');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil meng-upload bukti pembayaran, silahkan tunggu informasi selanjutnya</div>');
		redirect('user/riwayat/detail_penyewaan/'.$kode_sewa);
	}


	private function _sendEmail($nama_penyewa, $email_sanggar, $type)
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
			$this->email->subject('Penyewaan atribut ke-sanggar anda');
			$this->email->message($nama_penyewa.' Telah melakukan pembayaran ke sanggar anda, silahkan cek pembayaran pada akun anda dan konfirmasi penyewaan');
		} 

		if ($this->email->send()) {
			return true;
		}else {
			echo $this->email->print_debugger();
			die;
		}

	}

	public function cetak_invoice($kode_sewa)
	{
		$data['penyewaan'] = $this->db->query("SELECT * FROM tb_penyewaan tp, user u, user_sanggar us, s_atribut sa WHERE tp.id_user=u.id AND tp.id_sanggar=us.id_sanggar AND tp.id_atribut=sa.id AND tp.kode_sewa='$kode_sewa' ")->row_array();

		$this->load->view('user/penyewaan/cetak', $data);
	}
}