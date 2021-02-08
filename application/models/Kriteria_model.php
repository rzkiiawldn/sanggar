<?php 

class Kriteria_model extends CI_Model {

	// MODEL USER / MEMBER

		public function getAllk_biaya()
	{
		return $this->db->get('k_biaya');
	}

		public function getAllk_jadwal()
	{
		return $this->db->get('k_jadwal');
	}

		public function getAllk_pendidikan()
	{
		return $this->db->get('k_pendidikan');
	}

		public function getAllk_pendidikan_id()
	{
		return $this->db->get('k_pendidikan_id');
	}

		public function getAllk_pendidikanBy_TipeSanggarId()
	{				
		$this->db->join('kategori_tipe_sanggar kts','kp.tipe_sanggar_id = kts.id');
		return $this->db->get_where('k_pendidikan_id kp',['kp.tipe_sanggar_id' => $tipe_sanggar_id]);
	}

		public function getAllk_prasarana()
	{
		return $this->db->get('k_prasarana');
	}

		public function getAllk_sarana()
	{
		return $this->db->get('k_sarana');
	}

		public function getAllk_umur()
	{
		return $this->db->get('k_umur');
	}

		public function getAlln_kriteria()
	{
		return $this->db->get('n_kriteria');
	}

		public function getAlln_subkriteria()
	{
		return $this->db->get('n_subkriteria');
	}

}