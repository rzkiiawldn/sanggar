<?php 

class MS_pendaftaran extends CI_Model {

	// MODEL USER / MEMBER

	public function getAllPendaftar($user)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		$this->db->join('user_sanggar us', 'p.id_sanggar = us.id_sanggar');
		$this->db->join('s_kelas k', 'p.id_kelas = k.id');
		return $this->db->get_where('tb_pendaftaran p', ['p.id_sanggar' => $user]);
	}

	public function getPendaftarByKode($kode_pendaftaran)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		$this->db->join('user_sanggar us', 'p.id_sanggar = us.id_sanggar');
		$this->db->join('s_kelas k', 'p.id_kelas = k.id');
		return $this->db->get_where('tb_pendaftaran p', ['kode_pendaftaran' => $kode_pendaftaran])->row_array();
	}

	public function getDataPendaftarByKode($kode_pendaftaran)
	{
		$this->db->join('user u', 'p.id_user = u.id');
		return $this->db->get_where('tb_pendaftaran p', ['kode_pendaftaran' => $kode_pendaftaran])->row_array();
	}

	public function getAllKelas($user)
	{
		$this->db->join('user_sanggar us', 'k.id_sanggar = us.id_sanggar');
		return $this->db->get_where('s_kelas k', ['k.id_sanggar' => $user]);
	}

	public function cekkodependaftar()
    {
        $query = $this->db->query("SELECT MAX(kode_pendaftaran) as kodependaftar from tb_pendaftaran");
        $hasil = $query->row();
        return $hasil->kodependaftar;
    }

    public function hapusPendaftar($kode_pendaftaran)
	{
		$this->db->where('kode_pendaftaran', $kode_pendaftaran);
		$this->db->delete('tb_pendaftaran');
	}


// CETAK DATA PERTANGGAL

/*	public function gettahun(){
		$query = $this->db->query("SELECT YEAR(tanggal_pendaftaran) AS tahun FROM tb_pendaftaran GROUP BY YEAR(tanggal_pendaftaran) ASC");
		return $query->result_array();
	}*/

	public function filterbytanggal($tanggalawal,$tanggalakhir,$id_sanggar){

		$query = $this->db->query("SELECT * FROM tb_pendaftaran tp JOIN user_sanggar us ON tp.id_sanggar = us.id_sanggar JOIN user u ON tp.id_user = u.id JOIN s_kelas k ON tp.id_kelas = k.id WHERE tanggal_pendaftaran BETWEEN '$tanggalawal' AND '$tanggalakhir' AND tp.id_sanggar ='$id_sanggar' ORDER BY tanggal_pendaftaran ASC ");
		return $query->result_array();
	}

/*	public function filterbybulan($tahun1,$bulanawal,$bulanakhir){

		$query = $this->db->query("SELECT * FROM tb_pendaftaran WHERE YEAR(tanggal_pendaftaran) = '$tahun1' AND MOUNTH(tanggal_pendaftaran) BETWEEN '$bulanawal' AND '$bulanakhir' ORDER BY tanggal_pendaftaran ASC ");
		return $query->result_array();
	}

	public function filterbytahun($tahun2){

		$query = $this->db->query("SELECT * FROM tb_pendaftaran WHERE YEAR(tanggal_pendaftaran) = '$tahun2' ORDER BY tanggal_pendaftaran ASC ");
		return $query->result_array();
	}*/
}