<?php 

class MS_pengundang extends CI_Model {

	// MODEL USER / MEMBER

	public function getAllPengundang($user)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		$this->db->join('user_sanggar us', 'p.id_sanggar = us.id_sanggar');
		$this->db->join('s_paket_undang a', 'p.id_paket_undang = a.id');
		return $this->db->get_where('tb_pengundang p', ['p.id_sanggar' => $user]);
	}

	public function getPengundangByKode($kode_undang)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		$this->db->join('user_sanggar us', 'p.id_sanggar = us.id_sanggar');
		$this->db->join('s_paket_undang a', 'p.id_paket_undang = a.id');
		return $this->db->get_where('tb_pengundang p', ['kode_undang' => $kode_undang])->row_array();
	}

	public function getDataPengundangByKode($kode_undang)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		return $this->db->get_where('tb_pengundang p', ['kode_undang' => $kode_undang])->row_array();
	}

	public function cekkodeundang()
    {
        $query = $this->db->query("SELECT MAX(kode_undang) as kode_pengundang from tb_pengundang");
        $hasil = $query->row();
        return $hasil->kode_pengundang;
    }

    public function hapusPengundang($kode_undang)
	{
		$this->db->where('kode_undang', $kode_undang);
		$this->db->delete('tb_pengundang');
	}

	public function filterbytanggal($tanggalawal,$tanggalakhir,$id_sanggar){

		$query = $this->db->query("SELECT * FROM tb_pengundang tp JOIN user_sanggar us ON tp.id_sanggar = us.id_sanggar JOIN user u ON tp.id_user = u.id JOIN s_paket_undang k ON tp.id_paket_undang = k.id WHERE tanggal_undang BETWEEN '$tanggalawal' AND '$tanggalakhir' AND tp.id_sanggar ='$id_sanggar' ORDER BY tanggal_undang ASC ");
		return $query->result_array();
	}
}