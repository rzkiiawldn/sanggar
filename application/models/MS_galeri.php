<?php 

class MS_galeri extends CI_Model {

	// MODEL USER / MEMBER

	public function getAllGaleri($user)
	{
		$this->db->join('user_sanggar us', 'k.id_sanggar = us.id_sanggar');
		return $this->db->get_where('s_galeri k', ['k.id_sanggar' => $user]);
	}

	public function getAlls_galeri()
	{
		$this->db->join('user_sanggar us', 'k.id_sanggar = us.id_sanggar');
		return $this->db->get('s_galeri k');
	}

	public function hapusGaleri($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('s_galeri');
	}
}