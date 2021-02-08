<?php 

class MU_kelas extends CI_Model {

	// MODEL USER / MEMBER

	public function getAllKelas()
	{
		return $this->db->get('s_kelas');
	}

	public function getKelasByIdSanggar($id_sanggar)
	{
		$this->db->join('user_sanggar us', 'k.id_sanggar = us.id_sanggar');
		return $this->db->get_where('s_kelas k', ['k.id_sanggar' => $id_sanggar]);
	}

	public function hapusUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
	}
}