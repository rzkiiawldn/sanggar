<?php 

class MU_riwayat extends CI_Model {

	// PENYEWAAN
	public function getAllPenyewaan($user)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		$this->db->join('user_sanggar us', 'p.id_sanggar = us.id_sanggar');
		$this->db->join('s_atribut a', 'p.id_atribut = a.id');
		$this->db->order_by('kode_sewa', 'DESC');
		return $this->db->get_where('tb_penyewaan p', ['p.id_user' => $user]);
	}

	public function getAllPenyewaanByKode($user, $kode_sewa)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		$this->db->join('user_sanggar us', 'p.id_sanggar = us.id_sanggar');
		$this->db->join('s_atribut a', 'p.id_atribut = a.id');
		return $this->db->get_where('tb_penyewaan p', ['p.id_user' => $user, 'p.kode_sewa' => $kode_sewa]);
	}

	// PENDAFTARAN
	public function getAllPendaftaran($user)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		$this->db->join('user_sanggar us', 'p.id_sanggar = us.id_sanggar');
		$this->db->join('s_kelas sk', 'p.id_kelas = sk.id');
		$this->db->order_by('kode_pendaftaran', 'DESC');
		return $this->db->get_where('tb_pendaftaran p', ['p.id_user' => $user]);
	}

	public function getAllPendaftaranByKode($user, $kode_pendaftaran)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		$this->db->join('user_sanggar us', 'p.id_sanggar = us.id_sanggar');
		$this->db->join('s_kelas sk', 'p.id_kelas = sk.id');
		$this->db->join('k_umur ku', 'sk.id_umur = ku.id_umur');
		return $this->db->get_where('tb_pendaftaran p', ['p.id_user' => $user, 'p.kode_pendaftaran' => $kode_pendaftaran]);
	}

	// UNDANG
	public function getAllUndang($user)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		$this->db->join('user_sanggar us', 'p.id_sanggar = us.id_sanggar');
		$this->db->join('s_paket_undang sp', 'p.id_paket_undang = sp.id');
		$this->db->order_by('kode_undang', 'DESC');
		return $this->db->get_where('tb_pengundang p', ['p.id_user' => $user]);
	}

	public function getAllUndangByKode($user, $kode_undang)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		$this->db->join('user_sanggar us', 'p.id_sanggar = us.id_sanggar');
		$this->db->join('s_paket_undang sp', 'p.id_paket_undang = sp.id');
		return $this->db->get_where('tb_pengundang p', ['p.id_user' => $user, 'p.kode_undang' => $kode_undang]);
	}
}