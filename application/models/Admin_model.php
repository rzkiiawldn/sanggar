<?php 

class Admin_model extends CI_Model {

	// MODEL USER / MEMBER

	public function getAllUser()
	{
		return $this->db->get('user')->result_array();
	}

	public function getAllUserByRoleId($role_id = '4')
	{
		return $this->db->get_where('user', ['role_id' => $role_id ])->result_array();
	}

	public function total_user()
	{
		return $this->db->get('user');
	}

	public function getUserById($id)
	{
		return $this->db->get_where('user', ['id' => $id])->row_array();
	}

	public function hapusUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
	}

	// HALAMAN BERITA

	public function getAllBerita()
	{
		return $this->db->get('tb_berita')->result_array();
	}

	public function total_berita()
	{
		return $this->db->get('tb_berita');
	}

	public function getBeritaByEmail()
	{
		return $this->db->get_where('tb_berita', ['pengirim' => $this->session->userdata('email')])->row_array();
	}

	public function getBeritaById($id)
	{
		return $this->db->get_where('tb_berita', ['id' => $id])->row_array();
	}

	public function hapusBerita($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_berita');
	}

	// HALAMAN EVENT

	public function getAllEvent()
	{
		return $this->db->get('tb_event')->result_array();
	}

	public function total_event()
	{
		return $this->db->get('tb_event');
	}

	public function getEventById($id)
	{
		return $this->db->get_where('tb_event', ['id' => $id])->row_array();
	}

	public function hapusEvent($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_event');
	}

	// HALAMAN DINAS

	public function getAllSyarat()
	{
		return $this->db->get('d_syarat')->result_array();
	}

	public function total_syarat()
	{
		return $this->db->get('d_syarat');
	}

	public function hapusSyarat($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('d_syarat');
	}

	public function getSyaratById($id)
	{
		return $this->db->get_where('d_syarat', ['id' => $id])->row_array();
	}

	public function prosesEditSyarat($id)
	{
		$syarat = $this->input->post('syarat');
		$this->db->set('syarat', $syarat);
		$this->db->where('id', $id);
		$this->db->update('d_syarat');

		// $this->db->where('id', $this->input->post('id'));
		// $this->db->update('d_syarat', $data);
	}

	public function getAllSertifikasi()
	{
		return $this->db->get('tb_sertifikasi')->result_array();
	}

	// HALAMAN SANGGAR

	public function getAllSanggar()
	{
		return $this->db->get('user_sanggar');
	}

	public function getAllSanggarByRoleId($role_id = '2')
	{
		return $this->db->get_where('user_sanggar', ['role_id' => $role_id ])->result_array();
	}

	public function total_sanggar()
	{
		return $this->db->get('user_sanggar');
	}

	public function getSanggarById($id_sanggar)
	{
		return $this->db->get_where('user_sanggar', ['id_sanggar' => $id_sanggar])->row_array();
	}

	public function hapusSanggar($id_sanggar)
	{
		$this->db->where('id_sanggar', $id_sanggar);
		$this->db->delete('user_sanggar');
	}

	// HALAMAN PENDAFTARAN KE SANGGAR

	public function getAllPendaftar()
	{
		$this->db->join('user u', 'p.id_sanggar = u.id');
        $this->db->join('user_sanggar s', 'p.id_sanggar = s.id_sanggar');
        $this->db->join('s_kelas k', 'p.id_kelas = k.id');
        return $this->db->get('tb_pendaftaran p')->result_array();
	}

	public function total_pendaftar()
	{
		return $this->db->get('tb_pendaftaran');
	}

	public function hapusPendaftar($kode_pendaftaran)
	{
		$this->db->where('kode_pendaftaran', $kode_pendaftaran);
		$this->db->delete('tb_pendaftaran');
	}

	public function cekkodependaftar()
    {
        $query = $this->db->query("SELECT MAX(kode_pendaftaran) as kodependaftar from tb_pendaftaran");
        $hasil = $query->row();
        return $hasil->kodependaftar;
    }

	// HALAMAN PENDAFTARAN KE SANGGAR

	

    // HALAMAN PENYEWAAN

	public function getAllPenyewa()
	{
		$this->db->join('user u', 'p.id_sanggar = u.id');
        $this->db->join('user_sanggar s', 'p.id_sanggar = s.id_sanggar');
        $this->db->join('s_atribut a', 'p.id_atribut = a.id');
        return $this->db->get('tb_penyewaan p')->result_array();
	}

	public function total_penyewa()
	{
		return $this->db->get('tb_penyewaan');
	}

	public function hapusPenyewa($kode_sewa)
	{
		$this->db->where('kode_sewa', $kode_sewa);
		$this->db->delete('tb_penyewaan');
	}

	public function cekkodesewa()
    {
        $query = $this->db->query("SELECT MAX(kode_sewa) as kodepenyewa from tb_penyewaan");
        $hasil = $query->row();
        return $hasil->kodepenyewa;
    }

	// HALAMAN PENGUNDANG

	public function getAllPengundang()
	{
		$this->db->join('user u', 'p.id_user = u.id');
        $this->db->join('user_sanggar s', 'p.id_sanggar = s.id_sanggar');
        $this->db->join('s_paket_undang a', 'p.id_paket_undang = a.id');
        return $this->db->get('tb_pengundang p')->result_array();
	}

	public function total_pengundang()
	{
		return $this->db->get('tb_pengundang');
	}

	public function total_undang()
	{
		return $this->db->get('tb_pengundang');
	}

	public function hapusPengundang($kode_undang)
	{
		$this->db->where('kode_undang', $kode_undang);
		$this->db->delete('tb_pengundang');
	}

	public function cekkodeundang()
    {
        $query = $this->db->query("SELECT MAX(kode_undang) as kodeundang from tb_pengundang");
        $hasil = $query->row();
        return $hasil->kodeundang;
    }

	// HALAMAN PAKET UNDANG

	public function getAllPaket_undang()
	{
		return $this->db->get('s_paket_undang')->result_array();
	}

	 public function hapusPaketUndang($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('s_paket_undang');
	}

	//  HALAMAN DATA TABEL KELAS

	public function getAllKelas()
	{
		return $this->db->get('s_kelas')->result_array();
	}

	public function hapusKelas($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('s_kelas');
	}

	//  HALAMAN DATA TABEL JADWAL LATIHAN

	public function getAllJadwal()
	{
		return $this->db->get('s_jadwal_latihan')->result_array();
	}

	public function hapusJadwalLatihan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('s_jadwal_latihan');
	}

	// HALAMAN DATA TABEL ATRIBUT

	public function getAllPaket_sewa()
	{
		return $this->db->get('s_atribut')->result_array();
	}

	public function getAllPaket_sewaById($id_sanggar)
	{
		return $this->db->get_where('s_atribut', ['id_sanggar' => $id_sanggar])->row_array();
	}

	public function hapusPaketSewa($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('s_atribut');
	}


	// LAIN LAIN 

	public function getAllTipe()
	{
		return $this->db->get('kategori_tipe_sanggar')->result_array();
	}

	public function getAllStatus()
	{
		return $this->db->get('status')->result_array();
	}

	public function datapendaftar($bulan)
    {
        return count($this->db->get('tb_pendaftaran')->result_array());
    }	

	public function datapengunjung($bulan)
    {
        return count($this->db->get('jumlah_pengunjung')->result_array());
    }	

    public function nama_sanggar($bulan)
    {
        return count($this->db->get('user_sanggar')->result_array());
    }
}