<?php 

class MS_kelas extends CI_Model {

	// MODEL USER / MEMBER

	public function getAllKelas($user)
	{
		$this->db->join('k_umur ku', 'k.id_umur = ku.id_umur');
		$this->db->join('user_sanggar us', 'k.id_sanggar = us.id_sanggar');
		return $this->db->get_where('s_kelas k', ['k.id_sanggar' => $user]);
	}

	public function getAlls_kelas()
	{
		$this->db->join('k_umur ku', 'k.id_umur = ku.id_umur');
		$this->db->join('user_sanggar us', 'k.id_sanggar = us.id_sanggar');
		return $this->db->get('s_kelas k');
	}

	public function hapusKelas($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('s_kelas');
	}
}