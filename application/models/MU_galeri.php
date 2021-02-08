<?php 

class MU_galeri extends CI_Model {

	// MODEL USER / MEMBER

	public function getAllGaleri()
	{
		return $this->db->get('s_galeri');
	}

	public function getGaleriByIdSanggar($id_sanggar)
	{
		$this->db->join('user_sanggar us', 'k.id_sanggar = us.id_sanggar');
		return $this->db->get_where('s_galeri k', ['k.id_sanggar' => $id_sanggar]);
	}

	public function hapusUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
	}
}