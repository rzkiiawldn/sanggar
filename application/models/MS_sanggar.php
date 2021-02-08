<?php 

class MS_sanggar extends CI_Model {

	// MODEL USER / MEMBER

	public function getAllPendaftar($user)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		$this->db->join('user_sanggar us', 'p.id_sanggar = us.id_sanggar');
		return $this->db->get_where('tb_pendaftaran p', ['p.id_sanggar' => $user]);
	}	

	public function getAllPendaftaran()
	{
		$this->db->join('user u', 'p.id_user = u.id');
		$this->db->join('user_sanggar us', 'p.id_sanggar = us.id_sanggar');
		return $this->db->get('tb_pendaftaran p');
	}

	public function getAllPenyewa($user)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		$this->db->join('user_sanggar us', 'p.id_sanggar = us.id_sanggar');
		return $this->db->get_where('tb_penyewaan p', ['p.id_sanggar' => $user]);
	}

	public function getAllPengundang($user)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		$this->db->join('user_sanggar us', 'p.id_sanggar = us.id_sanggar');
		return $this->db->get_where('tb_pengundang p', ['p.id_sanggar' => $user]);
	}
}	