<?php 

class MA_admin extends CI_Model {

	// MODEL USER / MEMBER

	public function getAllUser()
	{
		return $this->db->get('user');
	}

	public function getAllStatus()
	{
		return $this->db->get('status');
	}

	public function getAllAtribut()
	{
		return $this->db->get('s_atribut');
	}

	public function getAllPaket_undang()
	{
		return $this->db->get('s_paket_undang');
	}
}