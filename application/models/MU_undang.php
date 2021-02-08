<?php 

class MU_undang extends CI_Model {

	// MODEL USER / MEMBER

	public function getAllUndang()
	{
		return $this->db->get('s_undang');
	}

	public function getUndangByIdSanggar($id_sanggar)
	{
		$this->db->join('user_sanggar us', 'k.id_sanggar = us.id_sanggar');
		return $this->db->get_where('s_paket_undang k', ['k.id_sanggar' => $id_sanggar, 'us.undang_acara' => 1]);
	}

	public function getUndangById($id)
	{
		$this->db->join('user_sanggar us', 'k.id_sanggar = us.id_sanggar');
		return $this->db->get_where('s_paket_undang k', ['k.id' => $id]);
	}

	public function hapusUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('user');
	}

	public function cekkodeundang()
    {
        $query = $this->db->query("SELECT MAX(kode_undang) as kode_pengundang from tb_pengundang");
        $hasil = $query->row();
        return $hasil->kode_pengundang;
    }
}