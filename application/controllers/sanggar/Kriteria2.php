<?php 

class Kriteria2 extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
	}
	
	public function index()
	{
		$user = $this->session->userdata('nama_sanggar');
		$data['user_sanggar'] 		= $this->db->get_where('user_sanggar', ['email' => $this->session->userdata('email')])->row_array();
		$id_user = $this->session->userdata('id_sanggar');
		$data = [
				'judul'			=> 'Halaman Kriteria 2',
				'n_kriteria' 	=> $this->Kriteria_model->getAlln_kriteria()->result_array(),
				'n_subkriteria' 	=> $this->Kriteria_model->getAlln_subkriteria()->result_array()
			];
		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/kriteria/index2', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function nilai2()
	{
		$user = $this->session->userdata('nama_sanggar');
		$id_user = $this->session->userdata('id_sanggar');
		$data = [
				'judul'			=> 'Total nilai',
				'n_kriteria' 	=> $this->Kriteria_model->getAlln_kriteria()->result_array(),
				'k_biaya' 		=> $this->Kriteria_model->getAllk_biaya()->result_array(),
				'k_jadwal'		=> $this->Kriteria_model->getAllk_jadwal()->result_array(),
				'k_prasarana'	=> $this->Kriteria_model->getAllk_prasarana()->result_array(),
				'k_pendidikan'	=> $this->Kriteria_model->getAllk_pendidikan()->result_array(),
				'k_sarana'		=> $this->Kriteria_model->getAllk_sarana()->result_array(),
				'k_umur'		=> $this->Kriteria_model->getAllk_umur()->result_array(),

				'n_biaya' 		=> $this->db->query("SELECT * FROM n_biaya JOIN k_biaya ON n_biaya.id_biaya = k_biaya.id_biaya WHERE id_sanggar = '$id_user'")->result_array(),
				'n_penilaian' 	=> $this->db->query("SELECT * FROM n_penilaian JOIN n_subkriteria ON n_penilaian.id_subkriteria = n_subkriteria.id_subkriteria WHERE id_sanggar = '$id_user'")->result_array(),
				'total_b' 		=> $this->db->query("SELECT * FROM n_biaya WHERE id_sanggar = '$id_user'")->num_rows(),
				'total_j'		=> $this->db->query("SELECT * FROM n_jadwal WHERE id_sanggar = '$id_user'")->num_rows(),
				'total_pras'	=> $this->db->query("SELECT * FROM n_prasarana WHERE id_sanggar = '$id_user'")->num_rows(),
				'total_pen'		=> $this->db->query("SELECT * FROM n_pendidikan WHERE id_sanggar = '$id_user'")->num_rows(),
				'total_s'		=> $this->db->query("SELECT * FROM n_sarana WHERE id_sanggar = '$id_user'")->num_rows(),
				'total_u'		=> $this->db->query("SELECT * FROM n_umur WHERE id_sanggar = '$id_user'")->num_rows()
			];
		$this->load->view('templates/sanggar_header', $data);
		$this->load->view('templates/sanggar_sidebar');
		$this->load->view('templates/sanggar_topbar');
		$this->load->view('sanggar/kriteria/nilai2', $data);
		$this->load->view('templates/sanggar_footer');
	}

	public function tambah()
	{
		$id_sanggar 		= $this->input->post('id_sanggar');
		$id_subkriteria 			= $this->input->post('id_subkriteria');

		for($i=0; $i<count($id_sanggar); $i++){

			$data[] = [
				'id_sanggar' 		=> $id_sanggar[$i],
				'id_subkriteria' 			=> $id_subkriteria[$i]
			];

		}

		$this->db->insert_batch('n_penilaian', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan data alternatif</div>');
		redirect('sanggar/kriteria2/nilai2');
	}
}