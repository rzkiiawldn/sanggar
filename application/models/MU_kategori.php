<?php 

class MU_kategori extends CI_Model {

	public function getpendidikan($id_sanggar)
	{
		$this->db->join('k_pendidikan_id kj', 'nj.id_pendidikan = kj.id_pendidikan');
		$this->db->join('user_sanggar us', 'nj.id_sanggar = us.id_sanggar');
		return $this->db->get_where('n_pendidikan nj', ['nj.id_sanggar' => $id_sanggar]);
	}

	public function getumur($id_sanggar)
	{
		$this->db->join('k_umur kj', 'nj.id_umur = kj.id_umur');
		$this->db->join('user_sanggar us', 'nj.id_sanggar = us.id_sanggar');
		return $this->db->get_where('n_umur nj', ['nj.id_sanggar' => $id_sanggar]);
	}

	public function getprasarana($id_sanggar)
	{
		$this->db->join('k_prasarana kj', 'nj.id_prasarana = kj.id_prasarana');
		$this->db->join('user_sanggar us', 'nj.id_sanggar = us.id_sanggar');
		return $this->db->get_where('n_prasarana nj', ['nj.id_sanggar' => $id_sanggar]);
	}

	public function getbiaya($id_sanggar)
	{
		$this->db->join('k_biaya kj', 'nj.id_biaya = kj.id_biaya');
		$this->db->join('user_sanggar us', 'nj.id_sanggar = us.id_sanggar');
		return $this->db->get_where('n_biaya nj', ['nj.id_sanggar' => $id_sanggar]);
	}

	public function getsarana($id_sanggar)
	{
		$this->db->join('k_sarana kj', 'nj.id_sarana = kj.id_sarana');
		$this->db->join('user_sanggar us', 'nj.id_sanggar = us.id_sanggar');
		return $this->db->get_where('n_sarana nj', ['nj.id_sanggar' => $id_sanggar]);
	}

	public function getjadwal($id_sanggar)
	{
		$this->db->join('k_jadwal kj', 'nj.id_jadwal = kj.id_jadwal');
		$this->db->join('user_sanggar us', 'nj.id_sanggar = us.id_sanggar');
		return $this->db->get_where('n_jadwal nj', ['nj.id_sanggar' => $id_sanggar]);
	}
}