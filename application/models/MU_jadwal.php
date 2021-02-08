<?php 

class MU_jadwal extends CI_Model {

	// MODEL USER / MEMBER

	public function getAllJadwal()
	{
		return $this->db->get('s_jadwal');
	}

	public function getJadwalByIdSanggar($id_sanggar)
	{
		$this->db->join('user_sanggar us', 'k.id_sanggar = us.id_sanggar');
		$this->db->join('s_kelas sk', 'k.id_kelas = sk.id');
		$this->db->join('k_jadwal kj', 'k.id_jadwal = kj.id_jadwal');
		return $this->db->get_where('s_jadwal_latihan k', ['k.id_sanggar' => $id_sanggar]);
	}

	public function hapusUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
	}
}