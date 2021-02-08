<?php 

class Penyewaan extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index($id)
	{
		$this->form_validation->set_rules('biaya_sewa', 'Biaya Sewa', 'required|trim');

		if( $this->form_validation->run() == false )
		{
			$dariDB = $this->Admin_model->cekkodesewa();
	        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
	        $nourut = substr($dariDB, 3, 3);
	        $kodesewaSekarang = $nourut + 1;
	        $data = array('kode_penyewa' => $kodesewaSekarang);

			$data ['judul'] = 'Penyewaan';
			$user = $this->session->userdata('id');
			$data['sanggar'] = $this->db->query("SELECT * FROM user_sanggar")->row_array();
			$data['atribut'] = $this->db->query("SELECT * FROM s_atribut WHERE id='$id'")->result_array();
			$this->load->view('templates/user_header', $data);
			$this->load->view('templates/user_navbar');
			$this->load->view('user/penyewaan/index', $data);
			$this->load->view('templates/user_footer');
		} else {

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
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menyewa atribut sanggar, silahkan selesaikan pembayaran !</div>');
			redirect('member/riwayat/penyewaan');
		}
	}

	public function tambah_penyewa()
	{
		
	}

}