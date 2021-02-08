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
		$dariDB 				= $this->MS_penyewaan->cekkodesewa();
        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut 				= substr($dariDB, 3, 3);
        $kodesewaSekarang 		= $nourut + 1;
		$user 					= $this->session->userdata('id_sanggar');

		$data	=	[
			'judul'				=> 'Halaman Penyewa',
			'user_sanggar'		=> $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array(),
			'kode_penyewa' 		=> $kodesewaSekarang,
			'penyewa'			=> $this->MS_penyewaan->getAllPenyewa($user)->result_array(),
			'tb_user'			=> $this->MA_admin->getAllUser()->result_array(),
			'tb_atribut'		=> $this->MA_admin->getAllAtribut()->result_array(),
			'penyewaan'			=> $this->MS_penyewaan->getAllPenyewa($user)->result_array(),
			'total_penyewa'		=> $this->MS_penyewaan->getAllPenyewa($user)->num_rows(),
			'status'			=> $this->MA_admin->getAllStatus()->result_array()
		];
		
		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar',$data);
		$this->load->view('sanggar/penyewa/index', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function detail_penyewa($kode_sewa)
	{
		$user 	= $this->session->userdata('id_sanggar');
		$data	=	[
			'judul'			=> 'Detail penyewaan',
			'penyewa'		=> $this->MS_penyewaan->getPenyewaById($kode_sewa),
			'data_penyewa'	=> $this->MS_penyewaan->getDataPenyewaById($kode_sewa),
			'user_sanggar'	=> $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array(),
		];

		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar',$data);
		$this->load->view('sanggar/penyewa/detail_penyewa', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function hapus_penyewa($kode_sewa)
	{
		$this->MS_penyewaan->hapusPenyewa($kode_sewa);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus data penyewa</div>');
		redirect('sanggar/penyewa/index');
	}


	public function selesai($kode_sewa)
	{
		$tanggal_kembali	= $this->input->post('tanggal_kembali');
		$denda				= $this->input->post('denda');
		$kembali 			= $this->input->post('tanggal_pengembalian');
		$status 			= $this->input->post('status_sewa');

        $x = strtotime($kembali);
		$y = strtotime($tanggal_kembali);
	    $jumlah = abs(($x - $y)/(60*60*24));

        $total = $jumlah * $denda;
		
		$this->db->set('tanggal_pengembalian', $kembali);
		$this->db->set('denda_sewa', $total);
		$this->db->set('status_sewa', $status);
		$this->db->where('kode_sewa', $kode_sewa);
		$this->db->update('tb_penyewaan');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengubah status penyewaan</div>');
		redirect('sanggar/penyewa/index');
	}

	public function buka_sewa($id_sanggar)
	{
		$penyewaan = $this->input->post('penyewaan');

		$this->db->set('penyewaan', $penyewaan);
		$this->db->where('id_sanggar', $id_sanggar);
		$this->db->update('user_sanggar');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil membuka penyewaan</div>');
		redirect('sanggar/penyewa/index');
	}

	public function changeAccess_buka()
	{
		$penyewaan 	= $this->input->post('penyewaan');
		$id_sanggar 	= $this->input->post('id_sanggar');

		$this->db->set('penyewaan', $penyewaan);
		$this->db->where('id_sanggar', $id_sanggar);
		$this->db->update('user_sanggar');

		if ($penyewaan == 1) {
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">penyewaan dibuka !</div>');
		} else {
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">penyewaan ditutup !</div>');	
		}
	}

	public function cetak_penyewa($id_sanggar)
	{
		$user 					= $this->session->userdata('id_sanggar');
		$this->load->library('dompdf_gen');
		$data['judul']			= 'Cetak penyewa';
		$data['penyewa']		= $this->db->query("SELECT * FROM tb_penyewaan tp JOIN user u ON tp.id_user = u.id JOIN user_sanggar us ON tp.id_sanggar = us.id_sanggar JOIN s_atribut sk ON tp.id_atribut = sk.id WHERE tp.id_sanggar = '$id_sanggar' ")->result_array();
		$data['user_sanggar']		= $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array();
		$data['gambar']				= FCPATH.'assets/img/logo2.png';
		$this->load->view('sanggar/penyewa/laporan_penyewa', $data);

		$paper_size		= 'A4';
		$orientation	= 'potrait';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_data_penyewaan.pdf", array('Attachment' =>0));
	}

	public function filter($id_sanggar){
		$tanggalawal	= $this->input->post('tanggalawal');
		$tanggalakhir	= $this->input->post('tanggalakhir');

		$user 			= $this->session->userdata('id_sanggar');
		$this->load->library('dompdf_gen');
		$data = [
			'judul'			=> 'Laporan penyewaan berdasarkan tanggal',
			'subtitle'		=> 'Dari tanggal :'.$tanggalawal.'Sampai tanggal'.$tanggalakhir,
			'data_filter'	=> $this->MS_penyewaan->filterbytanggal($tanggalawal,$tanggalakhir,$id_sanggar),
			'user_sanggar'	=> $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array(),
			'gambar'		=> FCPATH.'assets/img/logo2.png',
		];

		$this->load->view('sanggar/penyewa/laporan_penyewaan_tanggal', $data);

		$paper_size		= 'A4';
		$orientation	= 'potrait';
		$html 			= $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);

		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("laporan_data_penyewaan_by_tanggal.pdf", array('Attachment' =>0));
	}
		
	public function cek_status($kode_sewa)
	{
		$email_penyewa = $this->input->post('email_penyewa');
		$nama_sanggar = $this->input->post('nama_sanggar');
		$status = $this->input->post('status_sewa');
		
		$this->db->set('status_sewa', $status);
		$this->db->where('kode_sewa', $kode_sewa);
		$this->db->update('tb_penyewaan');

		$this->_sendEmail($email_penyewa, $nama_sanggar, 'verify');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengubah status penyewaan</div>');
		redirect('sanggar/penyewa/index');
	}

	private function _sendEmail($email_penyewa, $nama_sanggar, $type)
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
		$this->email->to($email_penyewa);

		if ($type == 'verify') {
			$this->email->subject('penyewaan atribut');
			$this->email->message('Selamat, penyewaan ke sanggar '.$nama_sanggar.' telah dikonfirmasi');
		} 

		if ($this->email->send()) {
			return true;
		}else {
			echo $this->email->print_debugger();
			die;
		}

	}

}