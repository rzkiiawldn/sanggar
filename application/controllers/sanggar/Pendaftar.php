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
		$dariDB 				= $this->MS_pendaftaran->cekkodependaftar();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut 				= substr($dariDB, 3, 3);
        $kodependaftarSekarang 	= $nourut + 1;
		$user 					= $this->session->userdata('id_sanggar');

		$data	=	[
			'judul'				=> 'Halaman Pendaftar',
			'user_sanggar'		=> $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array(),
			'kode_pendaftar' 	=> $kodependaftarSekarang,
			'tb_user'			=> $this->MA_admin->getAllUser()->result_array(),
			'tb_kelas'			=> $this->MS_pendaftaran->getAllKelas($user)->result_array(),
			'pendaftaran'		=> $this->MS_pendaftaran->getAllPendaftar($user)->result_array(),
			'total_pendaftar'	=> $this->MS_pendaftaran->getAllPendaftar($user)->num_rows(),
			'status'			=> $this->db->query("SELECT * FROM status WHERE id BETWEEN '1' AND '2'")->result_array()
		];

		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/pendaftar/index', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function tambah_pendaftar()
	{
		$data = [
			"kode_pendaftaran" 		=> htmlspecialchars($this->input->post('kode_pendaftaran', true)),
			"id_user"				=> htmlspecialchars($this->input->post('id_user', true)),
			"id_sanggar"			=> htmlspecialchars($this->input->post('id_sanggar', true)),
			"id_kelas" 				=> htmlspecialchars($this->input->post('id_kelas', true)),
			"tanggal_pendaftaran" 	=> date('Y-m-d'),
			"status"				=> 1
		];
		$this->db->insert('tb_pendaftaran', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan data pendaftaran sanggar</div>');
		redirect('sanggar/pendaftar/index');
	}

	public function hapus_pendaftar($kode_pendaftaran)
	{
		$this->MS_pendaftaran->hapusPendaftar($kode_pendaftaran);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus data pendaftar</div>');
		redirect('sanggar/pendaftar/index');
	}

	public function cetak_pendaftar($id_sanggar)
	{
		$user 						= $this->session->userdata('id_sanggar');
		$this->load->library('dompdf_gen');
		$data['judul']				= 'Cetak pendaftar';
		$data['pendaftaran']		= $this->db->query("SELECT * FROM tb_pendaftaran tp JOIN user u ON tp.id_user = u.id JOIN user_sanggar us ON tp.id_sanggar = us.id_sanggar JOIN s_kelas sk ON tp.id_kelas = sk.id WHERE tp.id_sanggar = '$id_sanggar' ")->result_array();
		$data['user_sanggar']		= $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array();
		$data['gambar']				= FCPATH.'assets/img/logo2.png';
		$this->load->view('sanggar/pendaftar/laporan_pendaftaran', $data);

		$paper_size		= 'A4';
		$orientation	= 'potrait';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_data_pendaftaran.pdf", array('Attachment' =>0));
	}

	public function filter($id_sanggar){
		$tanggalawal	= $this->input->post('tanggalawal');
		$tanggalakhir	= $this->input->post('tanggalakhir');

		$user 			= $this->session->userdata('id_sanggar');
		$this->load->library('dompdf_gen');
		$data = [
			'judul'			=> 'Laporan pendaftaran berdasarkan tanggal',
			'subtitle'		=> 'Dari tanggal :'.$tanggalawal.'Sampai tanggal'.$tanggalakhir,
			'data_filter'	=> $this->MS_pendaftaran->filterbytanggal($tanggalawal,$tanggalakhir,$id_sanggar),
			'user_sanggar'	=> $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array(),
			'gambar'		=> FCPATH.'assets/img/logo2.png',
		];

		$this->load->view('sanggar/pendaftar/laporan_pendaftaran_tanggal', $data);

		$paper_size		= 'A4';
		$orientation	= 'potrait';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_data_pendaftaran_by_tanggal.pdf", array('Attachment' =>0));
	}

	public function detail_pendaftar($kode_pendaftaran)
	{
		$user 	= $this->session->userdata('id_sanggar');
		$data	=	[
			'judul'				=> 'Detail pendaftaran',
			'pendaftar'			=> $this->MS_pendaftaran->getPendaftarByKode($kode_pendaftaran),
			'data_pendaftar'	=> $this->MS_pendaftaran->getDataPendaftarByKode($kode_pendaftaran),
			'user_sanggar'		=> $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array(),
		];

		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar',$data);
		$this->load->view('sanggar/pendaftar/detail_pendaftar', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function changeAccess_buka()
	{
		$pendaftaran 	= $this->input->post('pendaftaran');
		$id_sanggar 	= $this->input->post('id_sanggar');

		$this->db->set('pendaftaran', $pendaftaran);
		$this->db->where('id_sanggar', $id_sanggar);
		$this->db->update('user_sanggar');

		if ($pendaftaran == 1) {
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran dibuka !</div>');
		} else {
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pendaftaran ditutup !</div>');	
		}
	}

	public function cek_status($kode_pendaftaran)
	{
		$email_pendaftar 	= $this->input->post('email_pendaftar');
		$nama_sanggar 		= $this->input->post('nama_sanggar');
		$status 			= $this->input->post('status_pendaftaran');
		
		$this->db->set('status_pendaftaran', $status);
		$this->db->where('kode_pendaftaran', $kode_pendaftaran);
		$this->db->update('tb_pendaftaran');

		$this->_sendEmail($email_pendaftar, $nama_sanggar, 'verify');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengubah status pendaftaran</div>');
		redirect('sanggar/pendaftar/index');
	}

	private function _sendEmail($email_pendaftar, $nama_sanggar, $type)
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
		$this->email->to($email_pendaftar);

		if ($type == 'verify') {
			$this->email->subject('Pendaftaran ke-sanggar');
			$this->email->message('Selamat, pendaftaran ke sanggar '.$nama_sanggar.' telah diterima');
		} 

		if ($this->email->send()) {
			return true;
		}else {
			echo $this->email->print_debugger();
			die;
		}

	}

}