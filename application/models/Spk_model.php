<?php 

class Spk_model extends CI_Model
{
	public function getAllKriteria()
	{
		return $this->db->get('tb_kriteria');
	}

	public function getKriteriaById($id_kriteria)
	{
		return $this->db->get_where('tb_kriteria', ['id_kriteria' => $id_kriteria])->row_array();
	}

	public function hapuskriteria($id_kriteria)
	{
		$this->db->where('id_kriteria', $id_kriteria);
		$this->db->delete('tb_kriteria');
	}

	public function getAllSubKriteria()
	{
		return $this->db->get('tb_subkriteria');
	}

	public function getSubKriteriaById($id_subkriteria)
	{
		return $this->db->get_where('tb_subkriteria', ['id_subkriteria' => $id_subkriteria])->row_array();
	}

	public function hapussubkriteria($id_subkriteria)
	{
		$this->db->where('id_subkriteria', $id_subkriteria);
		$this->db->delete('tb_subkriteria');
	}

	public function getAllNilaiKetetapan()
	{
		return $this->db->get('pm_nilaiketetapan_spk');
	}

	public function getAllAlternatif()
	{
		return $this->db->get('pm_alternatif');
	}

}

 ?>