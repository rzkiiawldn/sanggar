<?php 

class MU_atribut extends CI_Model {

	// MODEL USER / MEMBER

	public function getAllAtribut()
	{
		return $this->db->get('s_atribut');
	}

	public function getAtributByIdSanggar($id_sanggar)
	{
		$this->db->join('user_sanggar us', 'k.id_sanggar = us.id_sanggar');
		return $this->db->get_where('s_atribut k', ['k.id_sanggar' => $id_sanggar, 'us.penyewaan' => 1]);
	}

	public function getAtributById($id)
	{
		$this->db->join('user_sanggar us', 'k.id_sanggar = us.id_sanggar');
		return $this->db->get_where('s_atribut k', ['k.id' => $id]);
	}

	public function hapusUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
	}
}