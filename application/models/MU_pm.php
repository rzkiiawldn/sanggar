<?php 

class MU_pm extends CI_Model {

	public function getSanggarByTipe($tipe_sanggar_id)
	{
		$this->db->join('kategori_tipe_sanggar kj', 'us.tipe_sanggar_id = kj.id');
		return $this->db->get_where('user_sanggar us', ['tipe_sanggar_id' => $tipe_sanggar_id]);
	}

	public function getAllTipe($tipe_sanggar_id)
	{
		return $this->db->get_where('kategori_tipe_sanggar us', ['id' => $tipe_sanggar_id]);
	}

	public function getAllKriteria()
	{
		return $this->db->get('tb_kriteria');
	}

	public function getAllSubkriteria()
	{
		return $this->db->get('tb_subkriteria');
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

	public function getJadwalByIdSanggar($id_sanggar)
	{
		$this->db->join('user_sanggar us', 'k.sanggar_id = us.id_sanggar');
		$this->db->join('s_kelas sk', 'k.kelas_id = sk.id');
		return $this->db->get_where('s_jadwal_latihan k', ['k.sanggar_id' => $id_sanggar]);
	}

	public function hapusUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
	}
}