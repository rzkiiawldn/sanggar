<?php 

class MU_sanggar extends CI_Model {

	// MODEL USER / MEMBER

	public function getAllSanggar()
	{
		$this->db->limit('4');
		$this->db->join('kategori_tipe_sanggar kj', 'us.tipe_sanggar_id = kj.id');
		$this->db->order_by('view', 'desc');
		return $this->db->get('user_sanggar us');
	}	

	public function getSanggar($keyword = null)
	{
		if($keyword) {
			$this->db->like('nama_sanggar', $keyword);
			$this->db->or_like('tipe_sanggar', $keyword);
			$this->db->or_like('alamat', $keyword);
		}

		$this->db->join('kategori_tipe_sanggar kj', 'us.tipe_sanggar_id = kj.id');
		return $this->db->get('user_sanggar us');
	}

	public function getAllTipeSanggar()
	{
		return $this->db->get('kategori_tipe_sanggar');
	}	

	public function getTipeSanggarById($id)
	{
		return $this->db->get_where('kategori_tipe_sanggar', ['id' => $id]);
	}

	public function getAllBerita()
	{
		return $this->db->get('tb_berita');
	}

	public function getBeritaById($id)
	{
		return $this->db->get_where('tb_berita', ['id' => $id])->row_array();
	}

	public function getAllEvent()
	{
		return $this->db->get('tb_event');
	}

	public function getEventById($id)
	{
		return $this->db->get_where('tb_event', ['id' => $id])->row_array();
	}

	public function getAllPendaftar($id_sanggar)
	{
		return $this->db->get_where('tb_pendaftaran', ['id_sanggar' => $id_sanggar]);
	}

	public function getAllPengunjung($id_sanggar)
	{
		return $this->db->get_where('jumlah_pengunjung', ['id_sanggar' => $id_sanggar]);
	}

	public function getSanggarById($id_sanggar)
	{
		$this->db->join('kategori_tipe_sanggar kj', 'us.tipe_sanggar_id = kj.id');
		return $this->db->get_where('user_sanggar us', ['id_sanggar' => $id_sanggar])->row_array();
	}	

	public function getSanggarByTipe($id)
	{
		$this->db->join('kategori_tipe_sanggar kj', 'us.tipe_sanggar_id = kj.id');
		return $this->db->get_where('user_sanggar us', ['tipe_sanggar_id' => $id]);
	}

	public function hapusUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
	}
}