<?php 

class MS_kriteria extends CI_Model {

	public function getAllPendidikan()
	{
		return $this->db->get('k_pendidikan');
	}

	public function getAllUmur()
	{
		return $this->db->get('k_umur');
	}

	public function getAllJadwal()
	{
		return $this->db->get('k_jadwal');
	}

	public function getAllSarana()
	{
		return $this->db->get('k_sarana');
	}

	public function getAllPrasarana()
	{
		return $this->db->get('k_prasarana');
	}

	public function getAllBiaya()
	{
		return $this->db->get('k_biaya');
	}
}