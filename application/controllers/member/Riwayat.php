<?php 

class Riwayat extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function pendaftaran()
	{
		$data ['judul'] = 'Riwayat pendaftaran';
		$user = $this->session->userdata('id');
		$data['pendaftaran'] = $this->db->query("SELECT * FROM tb_pendaftaran tr JOIN user cs ON tr.user_id
        = cs.id JOIN user_sanggar s ON tr.user_sanggar_id = s.id_sanggar JOIN s_kelas k ON tr.kelas_id = k.id AND cs.id='$user'")->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar');
		$this->load->view('user/riwayat/pendaftaran', $data);
		$this->load->view('templates/user_footer');
	}

	public function hapus_pendaftar($kode_pendaftaran)
	{
		$this->db->where('kode_pendaftaran', $kode_pendaftaran);
		$this->db->delete('tb_pendaftaran');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil membatalkan pendaftaran</div>');
		redirect('member/riwayat/pendaftaran');
	}

	public function penyewaan()
	{
		$data ['judul'] = 'Riwayat penyewaan';
		$user = $this->session->userdata('id');
		$data['penyewaan'] = $this->db->query("SELECT * FROM tb_penyewaan tr JOIN user cs ON tr.user_id
        = cs.id JOIN user_sanggar s ON tr.user_sanggar_id = s.id_sanggar JOIN s_atribut k ON tr.atribut_id = k.id AND cs.id='$user'")->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar');
		$this->load->view('user/riwayat/penyewaan', $data);
		$this->load->view('templates/user_footer');
	}

	public function bayar_sewa($id)
	{
		$bukti_pembayaran = $_FILES['bukti_pembayaran'];
		if ($bukti_pembayaran=''){}else
			{
				$config['upload_path']		= './assets/bukti_pembayaran_sewa/';
				$config['allowed_types']	= 'jpg|png|gif|jpeg|JPEG';
				$config['max_size']			= '2048';

				$this->load->library('upload',$config);

				if($this->upload->do_upload('bukti_pembayaran'))
				{
					$bukti_pembayaran = $this->upload->data('file_name');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali foto yang anda upload!</div>');
					redirect('sanggar/kelas/index');
				}
			}

		$data = [
			'bukti_pembayaran' 		=> $bukti_pembayaran
		];

		$this->db->insert('tb_penyewaan', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengupload bukti pembayaran, silahkan tunggu proses selanjutnya</div>');
		redirect('member/riwayat/penyewaan');	
	}

	public function hapus_penyewa($kode_sewa)
	{
		$this->db->where('kode_sewa', $kode_sewa);
		$this->db->delete('tb_penyewaan');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil membatalkan penyewaan</div>');
		redirect('member/riwayat/penyewaan');
	}

	public function undang()
	{
		$data ['judul'] = 'Riwayat undang';
		$user = $this->session->userdata('id');
		$data['undang'] = $this->db->query("SELECT * FROM tb_pengundang tr JOIN user cs ON tr.user_id
        = cs.id JOIN user_sanggar s ON tr.user_sanggar_id = s.id_sanggar JOIN s_paket_undang k ON tr.paket_undang_id = k.id AND cs.id='$user'")->result_array();
		$this->load->view('templates/user_header', $data);
		$this->load->view('templates/user_navbar');
		$this->load->view('user/riwayat/undang', $data);
		$this->load->view('templates/user_footer');
	}
}