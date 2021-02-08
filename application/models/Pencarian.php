<?php 

class Pencarian extends CI_Model {

	public function getPencarian($keyword = null)
	{
		if($keyword) {
			$this->db->like('nama', $keyword);
		}
		return $this->db->get('user_sanggar')->result_array();
	}
}