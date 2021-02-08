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
		$dariDB			 		= $this->MS_pengundang->cekkodeundang();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut 				= substr($dariDB, 3, 3);
        $kodeundangSekarang 	= $nourut + 1;
        $user 					= $this->session->userdata('id_sanggar');

		$data	=	[
			'judul'				=> 'Halaman Undang',
			'user_sanggar'		=> $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array(),
			'kode_undang' 		=> $kodeundangSekarang,
			'tb_user'			=> $this->MA_admin->getAllUser()->result_array(),
			'tb_paket_undang'	=> $this->MA_admin->getAllPaket_undang()->result_array(),
			'undang'			=> $this->MS_pengundang->getAllPengundang($user)->result_array(),
			'total_undang'		=> $this->MS_pengundang->getAllPengundang($user)->num_rows(),
			'status'			=> $this->MA_admin->getAllStatus()->result_array()
		];
		
		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar',$data);
		$this->load->view('sanggar/pengundang/index', $data);
		$this->load->view('templates/sanggar_footer');
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
			"bukti_pembayaran"	=> 1,
			"status"			=> 0
		];
		$this->db->insert('tb_pengundang', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan data pengundang paket sanggar</div>');
		redirect('sanggar/undang/index');
	}

	public function hapus_pengundang($kode_undang)
	{
		$this->Admin_model->hapusPengundang($kode_undang);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus data pengundang</div>');
		redirect('sanggar/undang/index');
	}


	public function detail_pengundang($kode_sewa)
	{
		$user 	= $this->session->userdata('id_sanggar');
		$data	=	[
			'judul'				=> 'Detail pengundang',
			'pengundang'		=> $this->MS_pengundang->getPengundangByKode($kode_sewa),
			'data_pengundang'	=> $this->MS_pengundang->getDataPengundangByKode($kode_sewa),
			'user_sanggar'		=> $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array(),
		];

		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar',$data);
		$this->load->view('sanggar/pengundang/detail_pengundang', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function changeAccess_buka()
	{
		$undang_acara 	= $this->input->post('undang_acara');
		$id_sanggar 	= $this->input->post('id_sanggar');

		$this->db->set('undang_acara', $undang_acara);
		$this->db->where('id_sanggar', $id_sanggar);
		$this->db->update('user_sanggar');

		if ($undang_acara == 1) {
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">undang sanggar dibuka !</div>');
		} else {
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">undang sanggar ditutup !</div>');	
		}
	}

	public function cetak_pengundang($id_sanggar)
	{
		$user 						= $this->session->userdata('id_sanggar');
		$this->load->library('dompdf_gen');
		$data['judul']				= 'Cetak pengundang';
		$data['undang']		= $this->db->query("SELECT * FROM tb_pengundang tp JOIN user u ON tp.id_user = u.id JOIN user_sanggar us ON tp.id_sanggar = us.id_sanggar JOIN s_paket_undang sk ON tp.id_paket_undang = sk.id WHERE tp.id_sanggar = '$id_sanggar' ")->result_array();
		$data['user_sanggar']		= $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array();
		$data['gambar']				= FCPATH.'assets/img/logo2.png';
		$this->load->view('sanggar/pengundang/laporan_pengundang', $data);

		$paper_size		= 'A4';
		$orientation	= 'potrait';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_data_pengundang.pdf", array('Attachment' =>0));
	}

	public function filter($id_sanggar){
		$tanggalawal	= $this->input->post('tanggalawal');
		$tanggalakhir	= $this->input->post('tanggalakhir');

		$user 			= $this->session->userdata('id_sanggar');
		$this->load->library('dompdf_gen');
		$data = [
			'judul'			=> 'Laporan pengundang berdasarkan tanggal',
			'subtitle'		=> 'Dari tanggal :'.$tanggalawal.'Sampai tanggal'.$tanggalakhir,
			'data_filter'	=> $this->MS_pengundang->filterbytanggal($tanggalawal,$tanggalakhir,$id_sanggar),
			'user_sanggar'	=> $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array(),
			'gambar'		=> FCPATH.'assets/img/logo2.png',
		];

		$this->load->view('sanggar/pengundang/laporan_pengundang_tanggal', $data);

		$paper_size		= 'A4';
		$orientation	= 'potrait';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_data_pengundang_by_tanggal.pdf", array('Attachment' =>0));
	}

	public function cek_status($kode_undang)
	{
		$email_undang = $this->input->post('email_undang');
		$nama_sanggar = $this->input->post('nama_sanggar');
		$status_undang = $this->input->post('status_undang');
		
		$this->db->set('status_undang', $status_undang);
		$this->db->where('kode_undang', $kode_undang);
		$this->db->update('tb_pengundang');

		$this->_sendEmail($email_undang, $nama_sanggar, 'verify');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengubah status undang</div>');
		redirect('sanggar/undang/index');
	}

	private function _sendEmail($email_undang, $nama_sanggar, $type)
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
		$this->email->to($email_undang);

		if ($type == 'verify') {
			$this->email->subject('undang paket sanggar');
			$this->email->message('Selamat, undang sanggar '.$nama_sanggar.' telah dikonfirmasi');
		} 

		if ($this->email->send()) {
			return true;
		}else {
			echo $this->email->print_debugger();
			die;
		}

	}
}