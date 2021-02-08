<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{

		if($this->session->userdata('email')) {
			redirect('auth/blocked');
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',[
				'required' 		=> 'Email tidak boleh kosong!',
				'valid_email' 	=> 'Email tidak valid!'
			]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required',[
				'required' 		=> 'Password tidak boleh kosong!'
			]);

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman masuk';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			// validasi success
			$this->_login();
		}
	}

	public function role()
	{
		$data['judul'] = 'Role registrasi';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/role');
		$this->load->view('templates/auth_footer');
	}

	private function _login()
	{
		$email 			= $this->input->post('email');
		$password 		= $this->input->post('password');

		$user 			= $this->db->get_where('user', ['email' => $email])->row_array();
		$user_sanggar 	= $this->db->get_where('user_sanggar', ['email' => $email])->row_array();


		// jika usernya ada
		if ($user) {
			// jika usernya aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'nama'			=> $user['nama'],
						'email' 		=> $user['email'],
						'nomor_telepon' => $user['nomor_telepon'],
						'tempat_lahir'	=> $user['tempat_lahir'],
						'tanggal_lahir'	=> $user['tanggal_lahir'],
						'jenis_kelamin'	=> $user['jenis_kelamin'],
						'alamat'		=> $user['alamat'],
						'gambar'		=> $user['gambar'],
						'password'		=> $user['password'],
						'role_id' 		=> $user['role_id'],
						'id'			=> $user['id'],
						'date_created'	=> $user['date_created']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						$this->session->set_flashdata('message', '<div id="alert" class="alert alert-success" role="alert">Selamat datang ' .$user['nama'].', semoga harimu menyenangkan</div>');
						redirect('administrator/dashboard');
					}	else {
						$this->session->set_userdata($data);
						$this->session->set_flashdata('message', '<div id="alert" class="alert alert-success" role="alert">Selamat datang ' .$user['nama'].'</div>');
						redirect('user/beranda');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang anda masukan salah!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email yang anda masukan belum di aktivasi!</div>');
				redirect('auth');
			}
		}	elseif ($user_sanggar) {

			if ($user_sanggar['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user_sanggar['password'])) {
					$data = [
						'id_sanggar' 		=> $user_sanggar['id_sanggar'],	
						'tipe_sanggar_id' 	=> $user_sanggar['tipe_sanggar_id'],
						'nama_sanggar' 		=> $user_sanggar['nama_sanggar'],
						'email' 			=> $user_sanggar['email'],
						'gambar' 			=> $user_sanggar['gambar']	,
						'role_id' 			=> $user_sanggar['role_id']	
					];
					$this->session->set_userdata($data);
					$this->session->set_flashdata('message', '<div id="alert" class="alert alert-success" role="alert">Selamat datang ' .$user_sanggar['nama_sanggar'].'</div>');
					redirect('sanggar/dashboard');
				} else {
					$this->session->set_flashdata('message', '<div id="alert" class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email yang anda masukan belum di aktivasi!</div>');
				redirect('auth');
			}

		}	else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email ini belum terdaftar!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		
		if($this->session->userdata('email')) {
			redirect('auth/blocked');
		}
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nomor_telepon', 'Nomor Telpon', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email ini sudah digunakan!'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
				'matches' 		=> 'Password tidak sama!',
				'min_length' 	=> 'Password terlalu pendek!'
			]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if( $this->form_validation->run() == false )
		{
			$data['judul'] = 'Registrasi Pengguna';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$email 	= $this->input->post('email', true);
			$data 	= [
				'nama' 			=> htmlspecialchars($this->input->post('nama', true)),
				'email' 		=> htmlspecialchars($email),
				'nomor_telepon' => htmlspecialchars($this->input->post('nomor_telepon', true)),
				'tempat_lahir' 	=> htmlspecialchars($this->input->post('tempat_lahir', true)),
				'tanggal_lahir' => $this->input->post('tanggal_lahir', date('m-d-Y')),
				'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
				'alamat' 		=> htmlspecialchars($this->input->post('alamat', true)),
				'gambar' 		=> 'avatar.jpg',
				'password' 		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' 		=> 3,
				'is_active' 	=> 0,
				'date_created' 	=> time()
			];


			// SIAPKAN TOKEN
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_created' => time() 
			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

 
			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Anda telah berhasil melakukan registrasi. Silahkan cek email anda untuk melakukan aktivasi</div>');
			redirect('auth');
		}
	}

// SMTP = SIMPLE MAIL TRANSFER PROTOCOL
	private function _sendEmail($token, $type)
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
		$this->email->to($this->input->post('email'));

		if ($type == 'verify') {
			$this->email->subject('Account Verification');
			$this->email->message('Klik disini untuk verifikasi akun kamu : <a href="'. base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifkan</a>');

		} else if ($type == 'verify_sanggar') {
			$this->email->subject('Account Verification');
			$this->email->message('Klik disini untuk verifikasi akun sanggar kamu : <a href="'. base_url() . 'auth/verify_sanggar?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifkan</a>');

		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Klik disini untuk reset password anda : <a href="'. base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		
		} else if ($type == 'forgot_sanggar') {
			$this->email->subject('Reset Password Sanggar');
			$this->email->message('Klik disini untuk reset password anda : <a href="'. base_url() . 'auth/resetpassword_sanggar?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}

		if ($this->email->send()) {
			return true;
		}else {
			echo $this->email->print_debugger();
			die;
		}

	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if($user_token) {
				if(time() - $user_token['date_created'] < (60*60*24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'. $email.' Telah aktif, silahkan login!</div>');
					redirect('auth');
				} else {

					$this->db->delete('user', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token kadaluarsa.</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal, token yang anda masukan salah.</div>');
				redirect('auth');
			}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal, terjadi kesalahan pada email anda.</div>');
			redirect('auth');
		}
	}

	public function verify_sanggar()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user_sanggar', ['email' => $email])->row_array();

		if($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if($user_token) {
				if(time() - $user_token['date_created'] < (60*60*24)) {
					$this->db->set('is_active', 1);
					$this->db->where('email', $email);
					$this->db->update('user_sanggar');

					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">'. $email.' Telah aktif, silahkan login!</div>');
					redirect('auth');
				} else {

					$this->db->delete('user_sanggar', ['email' => $email]);
					$this->db->delete('user_token', ['email' => $email]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token kadaluarsa.</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal, token yang anda masukan salah.</div>');
				redirect('auth');
			}

		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal, terjadi kesalahan pada email anda.</div>');
			redirect('auth');
		}
	}


	public function registration_sanggar()
	{
		
		if($this->session->userdata('email')) {
			redirect('auth/blocked');
		}
		$this->form_validation->set_rules('nama_sanggar', 'Nama Sanggar', 'required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user_sanggar.email]', [
			'is_unique' => 'Email ini sudah digunakan!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
				'matches' => 'password dont match!',
				'min_length' => 'password to short!'
			]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if( $this->form_validation->run() == false )
		{
			$data['judul'] = 'Sanggarsans Registration';
			$data['tipe_sanggar'] = $this->db->query("SELECT * FROM kategori_tipe_sanggar")->result_array();
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration_sanggar');
			$this->load->view('templates/auth_footer');
		} else {

			$nama_sanggar		= htmlspecialchars($this->input->post('nama_sanggar', true));
			$nama_ketua			= '';
			$tipe_sanggar_id	= htmlspecialchars($this->input->post('tipe_sanggar_id', true));
			$deskripsi_seni		= '';
			$nomor_telepon		= htmlspecialchars($this->input->post('nomor_telepon', true));
			$email				= htmlspecialchars($this->input->post('email', true));
			$alamat				= htmlspecialchars($this->input->post('alamat', true));
			$latitude			= htmlspecialchars($this->input->post('latitude', true));
			$longitude			= htmlspecialchars($this->input->post('longitude', true));
			$foto_sanggar		= 'avatar.jpg';
			$password			= password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$role_id			= 2;
			$is_active			= 0;
			$date_created		= time();

			$data = [
				'nama_sanggar'			=> $nama_sanggar,
				'nama_ketua'			=> $nama_ketua,
				'tipe_sanggar_id'		=> $tipe_sanggar_id,
				'deskripsi_seni'		=> $deskripsi_seni,
				'nomor_telepon'			=> $nomor_telepon,
				'email'					=> $email,
				'alamat'				=> $alamat,
				'latitude'				=> $latitude,
				'longitude'				=> $longitude,
				'foto_sanggar'			=> $foto_sanggar,
				'password'				=> $password,
				'role_id'				=> $role_id,
				'is_active'				=> $is_active,
				'date_created'			=> $date_created
			];

			$simpan = $this->db->insert('user_sanggar', $data);

			if(!$simpan) 
		 		{
		 			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kamu gagal menambahkan sanggar baru</div>');
		 		}
		 		else 
		 		{
		 			$ids			= $this->db->query("SELECT id_sanggar FROM user_sanggar ORDER BY id_sanggar DESC LIMIT 1")->row_array();
					$id_sanggar 	= $ids['id_sanggar'];

				$data_registrasi = [
					'judul' 			=> 'Kriteria Sanggar',
					'pendidikan'		=> $this->db->query("SELECT * FROM k_pendidikan")->result_array(),
					'pendidikan_id'		=> $this->db->query("SELECT * FROM k_pendidikan_id WHERE tipe_sanggar_id = $tipe_sanggar_id  ")->result_array(),
					'umur'				=> $this->db->query("SELECT * FROM k_umur")->result_array(),
					'jadwal'			=> $this->db->query("SELECT * FROM k_jadwal")->result_array(),
					'sarana'			=> $this->db->query("SELECT * FROM k_sarana")->result_array(),
					'prasarana'			=> $this->db->query("SELECT * FROM k_prasarana")->result_array(),
					'biaya'				=> $this->db->query("SELECT * FROM k_biaya")->result_array(),
					'id_sanggar'		=> $id_sanggar,
					'nama_sanggar'		=> $nama_sanggar,
					'nama_ketua'		=> $nama_ketua,
					'tipe_sanggar_id'	=> $tipe_sanggar_id,
					'deskripsi_seni'	=> $deskripsi_seni,
					'nomor_telepon'		=> $nomor_telepon,
					'email'				=> $email,
					'alamat'			=> $alamat,
					'latitude'			=> $latitude,
					'longitude'			=> $longitude,
					'foto_sanggar'		=> $foto_sanggar,
					'password'			=> $password,
					'role_id'			=> $role_id,
					'is_active'			=> $is_active,
					'date_created'		=> $date_created

				];

				$this->load->view('templates/auth_header', $data_registrasi);
				$this->load->view('auth/kriteria', $data_registrasi);
				$this->load->view('templates/auth_footer');
			}



// KODE DIBAWAH JIKA SANGGAR REGISTRASI KEMUDIAN DATA TERSIMPAN TANPA ISI KRITERIA DAN ISI TABEL KRITERIA SUDAH OTOMATIS ADA ID SANGGAR

			// $simpan = $this->db->insert('user_sanggar', $data);

			// if(!$simpan) 
		 // 		{
		 // 			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kamu gagal menambahkan sanggar baru</div>');
		 // 		}
		 // 		else 
		 // 		{
		 // 			$ids			= $this->db->query("SELECT id_sanggar FROM user_sanggar ORDER BY id_sanggar DESC LIMIT 1")->row_array();
			// 		$id_sanggar 	= $ids['id_sanggar'];



			// 		$data = [$id_sanggar = $id_sanggar];

			// 		$this->db->set('nama', $id_sanggar);
			// 		$this->db->insert('profile_matching');


			// $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please actovate your account</div>');
			// redirect('auth/kriteria');			}
		}
	}

	public function lewati_kriteria()
	{
		$email 		= $this->input->post('email');
		$nama 		= $this->input->post('nama');

		$data = [
			'nama'			=> $nama,
			'pendidikan'	=> 0,
			'umur'			=> 0,
			'biaya'			=> 0,
			'sarana'		=> 0,
			'prasarana'		=> 0,
			'jadwal'		=> 0
		];

		// SIAPKAN TOKEN
		$token = base64_encode(random_bytes(32));
		$user_token = [
			'email' => $email,
			'token' => $token,
			'date_created' => time() 
		];

		$this->db->insert('profile_matching', $data);
		$this->db->insert('user_token', $user_token);

		$this->_sendEmail($token, 'verify_sanggar');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Anda telah berhasil melakukan registrasi. Silahkan cek email anda untuk melakukan aktivasi</div>');

		redirect('auth');
	}

	public function kriteria()
	{
		$email 					= $this->input->post('email');
		$id_sanggar_pendidikan 	= $this->input->post('id_sanggar_pendidikan');
		$id_sanggar_umur		= $this->input->post('id_sanggar_umur');
		$id_sanggar_jadwal		= $this->input->post('id_sanggar_jadwal');
		$id_sanggar_sarana		= $this->input->post('id_sanggar_sarana');
		$id_sanggar_prasarana	= $this->input->post('id_sanggar_prasarana');
		$id_sanggar_biaya		= $this->input->post('id_sanggar_biaya');
		$nilai_pendidikan 		= $this->input->post('pendidikan');
		$nilai_umur 			= $this->input->post('umur');
		$nilai_jadwal 			= $this->input->post('jadwal');
		$nilai_sarana 			= $this->input->post('sarana');
		$nilai_prasarana 		= $this->input->post('prasarana');
		$nilai_biaya 			= $this->input->post('biaya');
		$ids					= $this->db->query("SELECT id_sanggar FROM user_sanggar ORDER BY id_sanggar DESC LIMIT 1")->row_array();
		$id_sanggar_pm 	= $ids['id_sanggar'];

// MEMASUKAN DATA PROFILE MATCHING UNTUK PENILAIAN
		if ($nilai_pendidikan == NULL) {
			
		} else {
			for($i=0; $i<count($nilai_pendidikan); $i++){

				$data_pendidikan[] = [
					'id_pendidikan' 	=> $nilai_pendidikan[$i],
					'id_sanggar' 		=> $id_sanggar_pendidikan[$i]
				];
			}
			$this->db->insert_batch('n_pendidikan', $data_pendidikan);
		}

// UMUR
		if ($nilai_umur == NULL) {
			
		} else {
			for($i=0; $i<count($nilai_umur); $i++){

				$data_umur[] = [
					'id_umur' 			=> $nilai_umur[$i],
					'id_sanggar' 		=> $id_sanggar_umur[$i]
				];
			}
			$this->db->insert_batch('n_umur', $data_umur);
		}
// JADWAL
		if ($nilai_jadwal == NULL) {
			
		} else {
			for($i=0; $i<count($nilai_jadwal); $i++){

				$data_jadwal[] = [
					'id_jadwal' 		=> $nilai_jadwal[$i],
					'id_sanggar' 		=> $id_sanggar_jadwal[$i]
				];
			}
			$this->db->insert_batch('n_jadwal', $data_jadwal);
		}
// SARANA

		if ($nilai_sarana == NULL) {
			
		} else {
			for($i=0; $i<count($nilai_sarana); $i++){

				$data_sarana[] = [
					'id_sarana' 		=> $nilai_sarana[$i],
					'id_sanggar' 		=> $id_sanggar_sarana[$i]
				];
			}
			$this->db->insert_batch('n_sarana', $data_sarana);
		}
// PRASARANA

		if ($nilai_prasarana == NULL) {
			
		} else {
			for($i=0; $i<count($nilai_prasarana); $i++){

				$data_prasarana[] = [
					'id_prasarana' 		=> $nilai_prasarana[$i],
					'id_sanggar' 		=> $id_sanggar_prasarana[$i]
				];
			}
			$this->db->insert_batch('n_prasarana', $data_prasarana);
		}
// BIAYA

		if ($nilai_biaya == NULL) {
			
		} else {
			$data_biaya = [
				'id_biaya' 		=> $nilai_biaya,
				'id_sanggar' 	=> $id_sanggar_biaya
			];
			$this->db->insert('n_biaya', $data_biaya);
		}

// INSERT DATA UNTUK PENILAIAN PROFILE MATCHING

		$ids			= $this->db->query("SELECT id_sanggar FROM user_sanggar ORDER BY id_sanggar DESC LIMIT 1")->row_array();
		$id_sanggar_pm 	= $ids['id_sanggar'];
		$hitungpen		= count($nilai_pendidikan);
		$hitungu		= count($nilai_umur);
		$hitungj		= count($nilai_jadwal);
		$hitungs		= count($nilai_sarana);
		$hitungpras		= count($nilai_prasarana);
		$hitungb		= $nilai_biaya;

		if ($hitungpen == "6") {
			echo $hitungPendidikanHasil = 5;
		} elseif ($hitungpen == "5") {
			echo $hitungPendidikanHasil = 4;
		} elseif ($hitungpen == "4") {
			echo $hitungPendidikanHasil = 3;
		} elseif ($hitungpen == "3") {
			echo $hitungPendidikanHasil = 2;
		} else {
			echo $hitungPendidikanHasil = 1;
		}


		if ($hitungu == "4") {
			echo $hitungUmurHasil = 3;
		} elseif ($hitungu == "3") {
			echo $hitungUmurHasil = 2;
		} else {
			echo $hitungUmurHasil = 1;
		}

		if ($hitungj >= "10") {
			echo $hitungJadwalHasil = 3;
		} elseif ($hitungj >= "4") {
			echo $hitungJadwalHasil = 2;
		} else {
			echo $hitungJadwalHasil = 1;
		}

		if ($hitungs >= "8") {
			echo $hitungSaranaHasil = 3;
		} elseif ($hitungs >= "4") {
			echo $hitungSaranaHasil = 2;
		} else {
			echo $hitungSaranaHasil = 1;
		}

		if ($hitungpras >= "10") {
			echo $hitungPrasaranaHasil = 3;
		} elseif ($hitungpras >= "5") {
			echo $hitungPrasaranaHasil = 2;
		} else {
			echo $hitungPrasaranaHasil = 1;
		}

		if ($hitungb == "1") {
			echo $hitungBiayaHasil = 5;
		} elseif ($hitungb == "2") {
			echo $hitungBiayaHasil = 4;
		} elseif ($hitungb == "3") {
			echo $hitungBiayaHasil = 3;
		} elseif ($hitungb == "4") {
			echo $hitungBiayaHasil = 2;
		} else {
			echo $hitungBiayaHasil = 1;
		}

		$data_profile_matching = [
			'nama'				=> $id_sanggar_pm,
			'pendidikan' 		=> $hitungPendidikanHasil,
			'umur'		 		=> $hitungUmurHasil,
			'biaya'		 		=> $hitungBiayaHasil,
			'sarana'		 	=> $hitungSaranaHasil,
			'prasarana'		 	=> $hitungPrasaranaHasil,
			'jadwal'		 	=> $hitungJadwalHasil
		];

		// SIAPKAN TOKEN
		$token = base64_encode(random_bytes(32));
		$user_token = [
			'email' => $email,
			'token' => $token,
			'date_created' => time() 
		];

		$this->db->insert('profile_matching', $data_profile_matching);
		$this->db->insert('user_token', $user_token);

		$this->_sendEmail($token, 'verify_sanggar');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Anda telah berhasil melakukan registrasi. Silahkan cek email anda untuk melakukan aktivasi</div>');

		redirect('auth');


	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->db->empty_table('profile_matching_nilai');
		$this->db->empty_table('profile_matching_rangking');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu berhasil keluar dari website</div>');
			redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}

	public function lupa_password()
	{
		if($this->session->userdata('email')) {
			redirect('auth/blocked');
		}

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
			'required' => 'Email tidak boleh kosong'
		]);

		if($this->form_validation->run() == false)
		{
			$data['judul'] = 'Halaman lupa password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/lupa_password', $data);
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email');
			$user  = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

			if($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);

				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan cek email anda untuk reset password</div>');
				redirect('auth/lupa_password');


			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar atau belum aktif</div>');
				redirect('auth/lupa_password');
			}
		}
	}

	public function resetpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user  = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['email' => $email,'token' => $token])->row_array();

			if($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->ubah_password();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token salah</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! email salah</div>');
			redirect('auth');
		}
	}

	public function ubah_password()
	{
		if(!$this->session->userdata('reset_email')) {
			redirect('auth');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[4]|matches[password2]',[
			'required' 		=> 'Password tidak boleh kosong',
			'min_length' 	=> 'Password terlalu pendek',
			'matches' 		=> 'Password tidak sama',
		]);
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[4]|matches[password1]',[
			'required' 		=> 'Password tidak boleh kosong',
			'min_length' 	=> 'Password terlalu pendek',
			'matches' 		=> 'Password tidak sama',
		]);


		if($this->form_validation->run() == false) {
			$data['judul'] = 'Ubah Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/ubah_password', $data);
			$this->load->view('templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->db->delete('user_token', ['email' => $email]);

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diganti! Silahkan login!</div>');
			redirect('auth');
		}
		
	}

	public function lupa_password_sanggar()
	{
		if($this->session->userdata('email')) {
			redirect('auth/blocked');
		}

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
			'required' => 'Email tidak boleh kosong'
		]);

		if($this->form_validation->run() == false)
		{
			$data['judul'] = 'Halaman lupa password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/lupa_password_sanggar', $data);
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email');
			$user  = $this->db->get_where('user_sanggar', ['email' => $email, 'is_active' => 1])->row_array();

			if($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];

				$this->db->insert('user_token', $user_token);

				$this->_sendEmail($token, 'forgot_sanggar');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan cek email anda untuk reset password</div>');
				redirect('auth/lupa_password_sanggar');


			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar atau belum aktif</div>');
				redirect('auth/lupa_password_sanggar');
			}
		}
	}

	public function resetpassword_sanggar()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');
		$user  = $this->db->get_where('user_sanggar', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['email' => $email,'token' => $token])->row_array();

			if($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->ubah_password_sanggar();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token salah</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal! email salah</div>');
			redirect('auth');
		}
	}

	public function ubah_password_sanggar()
	{
		if(!$this->session->userdata('reset_email')) {
			redirect('auth');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[4]|matches[password2]',[
			'required' 		=> 'Password tidak boleh kosong',
			'min_length' 	=> 'Password terlalu pendek',
			'matches' 		=> 'Password tidak sama',
		]);
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[4]|matches[password1]',[
			'required' 		=> 'Password tidak boleh kosong',
			'min_length' 	=> 'Password terlalu pendek',
			'matches' 		=> 'Password tidak sama',
		]);


		if($this->form_validation->run() == false) {
			$data['judul'] = 'Ubah Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/ubah_password_sanggar', $data);
			$this->load->view('templates/auth_footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user_sanggar');

			$this->db->delete('user_token', ['email' => $email]);

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diganti! Silahkan login!</div>');
			redirect('auth');
		}
		
	}
}