<?php 

class MS_penyewaan extends CI_Model {

	// MODEL USER / MEMBER

	public function getAllPenyewa($user)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		$this->db->join('user_sanggar us', 'p.id_sanggar = us.id_sanggar');
		$this->db->join('s_atribut a', 'p.id_atribut = a.id');
		return $this->db->get_where('tb_penyewaan p', ['p.id_sanggar' => $user]);
	}

	public function getPenyewaById($kode_sewa)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		$this->db->join('user_sanggar us', 'p.id_sanggar = us.id_sanggar');
		$this->db->join('s_atribut a', 'p.id_atribut = a.id');
		return $this->db->get_where('tb_penyewaan p', ['kode_sewa' => $kode_sewa])->row_array();
	}

	public function getDataPenyewaById($kode_sewa)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		return $this->db->get_where('tb_penyewaan p', ['kode_sewa' => $kode_sewa])->row_array();
	}

	public function cekkodesewa()
    {
        $query = $this->db->query("SELECT MAX(kode_sewa) as kode_penyewa from tb_penyewaan");
        $hasil = $query->row();
        return $hasil->kode_penyewa;
    }

    public function hapusPenyewa($kode_sewa)
	{
		$this->db->where('kode_sewa', $kode_sewa);
		$this->db->delete('tb_penyewaan');
	}

	public function filterbytanggal($tanggalawal,$tanggalakhir,$id_sanggar){

		$query = $this->db->query("SELECT * FROM tb_penyewaan tp JOIN user_sanggar us ON tp.id_sanggar = us.id_sanggar JOIN user u ON tp.id_user = u.id JOIN s_atribut k ON tp.id_atribut = k.id WHERE tanggal_sewa BETWEEN '$tanggalawal' AND '$tanggalakhir' AND tp.id_sanggar ='$id_sanggar' ORDER BY tanggal_sewa ASC ");
		return $query->result_array();
	}
}