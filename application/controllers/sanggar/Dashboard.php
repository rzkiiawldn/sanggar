<?php 

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}

	public function index()
	{
		$user 						= $this->session->userdata('id_sanggar');
		
		$data	=	[
			'judul'				=> 'Halaman sanggar',
			'user_sanggar'		=> $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array(),
			'total_pendaftar'	=> $this->MS_sanggar->getAllPendaftar($user)->num_rows(),
			'sanggar'			=> $this->MS_sanggar->getAllPendaftaran()->result_array(),
			'total_penyewa'		=> $this->MS_sanggar->getAllPenyewa($user)->num_rows(),
			'total_pengundang'	=> $this->MS_sanggar->getAllPengundang($user)->num_rows(),
			'pendaftar'			=> $this->db->query("SELECT * FROM tb_pendaftaran ")->result_array(),
			'Jan'				=> $this->db->query("SELECT * FROM jumlah_pengunjung WHERE id_sanggar = '$user' AND tgl = 'Jan' ")->num_rows(),
			'Feb'				=> $this->db->query("SELECT * FROM jumlah_pengunjung WHERE id_sanggar = '$user' AND tgl = 'Feb' ")->num_rows(),
			'Mar'				=> $this->db->query("SELECT * FROM jumlah_pengunjung WHERE id_sanggar = '$user' AND tgl = 'Mar' ")->num_rows(),
			'Apr'				=> $this->db->query("SELECT * FROM jumlah_pengunjung WHERE id_sanggar = '$user' AND tgl = 'Apr' ")->num_rows(),
			'May'				=> $this->db->query("SELECT * FROM jumlah_pengunjung WHERE id_sanggar = '$user' AND tgl = 'May' ")->num_rows(),
			'Jun'				=> $this->db->query("SELECT * FROM jumlah_pengunjung WHERE id_sanggar = '$user' AND tgl = 'Jun' ")->num_rows(),
			'Jul'				=> $this->db->query("SELECT * FROM jumlah_pengunjung WHERE id_sanggar = '$user' AND tgl = 'Jul' ")->num_rows(),
			'Aug'				=> $this->db->query("SELECT * FROM jumlah_pengunjung WHERE id_sanggar = '$user' AND tgl = 'Aug' ")->num_rows(),
			'Sep'				=> $this->db->query("SELECT * FROM jumlah_pengunjung WHERE id_sanggar = '$user' AND tgl = 'Sep' ")->num_rows(),
			'Oct'				=> $this->db->query("SELECT * FROM jumlah_pengunjung WHERE id_sanggar = '$user' AND tgl = 'Oct' ")->num_rows(),
			'Nov'				=> $this->db->query("SELECT * FROM jumlah_pengunjung WHERE id_sanggar = '$user' AND tgl = 'Nov' ")->num_rows(),
			'Dec'				=> $this->db->query("SELECT * FROM jumlah_pengunjung WHERE id_sanggar = '$user' AND tgl = 'Dec' ")->num_rows()
		];

		

		// Line Chart
        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['cbm'] = [];

        foreach ($bln as $b) {
            $data['cbm'][] = $this->Admin_model->datapengunjung($b);
        }

		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/index', $data);
		$this->load->view('templates/sanggar_footer', $data);
	}
}