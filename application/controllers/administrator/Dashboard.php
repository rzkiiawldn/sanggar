<?php 

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
		
	public function index()
	{
		
		$this->db->empty_table('profile_matching_nilai');
		$this->db->empty_table('profile_matching_rangking');
		$data['judul'] = ('Halaman Utama');

		$data['user'] = $this->Admin_model->getAllUser();
		$data['sanggar'] = $this->db->query("SELECT * FROM user_sanggar JOIN kategori_tipe_sanggar ON user_sanggar.tipe_sanggar_id = kategori_tipe_sanggar.id")->result_array();
		$data['total_user'] = $this->Admin_model->total_user()->num_rows();
		$data['total_berita'] = $this->Admin_model->total_berita()->num_rows();
		$data['total_event'] = $this->Admin_model->total_event()->num_rows();		
		$data['total_sanggar'] = $this->Admin_model->total_sanggar()->num_rows();
		$data['total_pendaftar'] = $this->Admin_model->total_pendaftar()->num_rows();		
		$data['total_penyewa'] = $this->Admin_model->total_penyewa()->num_rows();
		$data['total_pengundang'] = $this->Admin_model->total_pengundang()->num_rows();
		$data['total_transaksi'] = $this->db->query("SELECT * FROM jumlah_pengunjung")->num_rows();
		$data['jenis_sanggar'] = $this->db->query("SELECT * FROM kategori_tipe_sanggar")->row_array();

		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['s'] = [];

        foreach ($bln as $b) {
            $data['s'][] = $this->Admin_model->nama_sanggar($b);
        }

		$this->load->view('templates/admin_header', $data);
		$this->load->view('templates/admin_sidebar');
		$this->load->view('templates/admin_topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/admin_footer');
	}
}