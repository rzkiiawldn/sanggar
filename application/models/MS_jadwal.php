<?php 

class MS_jadwal extends CI_Model {

	// MODEL USER / MEMBER

	public function getAllJadwal_latihan($user)
	{
		$this->db->join('k_jadwal kj', 'k.id_jadwal = kj.id_jadwal');
		$this->db->join('s_kelas sk', 'k.id_kelas = sk.id');
		$this->db->join('user_sanggar us', 'k.id_sanggar = us.id_sanggar');
		return $this->db->get_where('s_jadwal_latihan k', ['k.id_sanggar' => $user]);
	}

	public function hapusJadwalLatihan($id_jadwal_latihan)
	{
		$this->db->where('id_jadwal_latihan', $id_jadwal_latihan);
		$this->db->delete('s_jadwal_latihan');
	}
}