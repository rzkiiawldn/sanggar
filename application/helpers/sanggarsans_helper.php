<?php 

function is_logged_in()
{
	$ci = get_instance();
	if(!$ci->session->userdata('email')) 
	{
		redirect('auth');
	} else {
		$role_id 	= $ci->session->userdata('role_id');
		$menu		= $ci->uri->segment(1);

		$queryMenu 	= $ci->db->get_where('user_menu', ['menu' =>$menu])->row_array();
		$menu_id	= $queryMenu['id'];
		$userAccess	= $ci->db->get_where('user_access_menu', [
			'role_id' => $role_id, 
			'menu_id' => $menu_id
			]);
		if($userAccess->num_rows() < 1) {
			redirect('auth/blocked');
		}
	}
}

function check_access_tutup_pendaftaran($pendaftaran, $id_sanggar)
{
	$ci = get_instance();

	$ci->db->where('pendaftaran', $pendaftaran);
	$ci->db->where('id_sanggar', $id_sanggar);
	$result = $ci->db->get('user_sanggar');

	
	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}

}

function check_access_buka_pendaftaran($pendaftaran, $id_sanggar)
{
	$ci = get_instance();

	$ci->db->where('pendaftaran', $pendaftaran);
	$ci->db->where('id_sanggar', $id_sanggar);
	$result = $ci->db->get('user_sanggar');

}

// PENYEWAAN

function check_access_tutup_penyewaan($penyewaan, $id_sanggar)
{
	$ci = get_instance();

	$ci->db->where('penyewaan', $penyewaan);
	$ci->db->where('id_sanggar', $id_sanggar);
	$result = $ci->db->get('user_sanggar');

	
	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}

}

function check_access_buka_penyewaan($penyewaan, $id_sanggar)
{
	$ci = get_instance();

	$ci->db->where('penyewaan', $penyewaan);
	$ci->db->where('id_sanggar', $id_sanggar);
	$result = $ci->db->get('user_sanggar');

}

function check_access_tutup_undang_acara($undang_acara, $id_sanggar)
{
	$ci = get_instance();

	$ci->db->where('undang_acara', $undang_acara);
	$ci->db->where('id_sanggar', $id_sanggar);
	$result = $ci->db->get('user_sanggar');

	
	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}

}

function check_access_buka_undang_acara($undang_acara, $id_sanggar)
{
	$ci = get_instance();

	$ci->db->where('undang_acara', $undang_acara);
	$ci->db->where('id_sanggar', $id_sanggar);
	$result = $ci->db->get('user_sanggar');

}

// END PEMBUKAAN

function check_access_pen($id_pendidikan, $id_sanggar)
{
	$ci = get_instance();

	$ci->db->where('id_pendidikan', $id_pendidikan);
	$ci->db->where('id_sanggar', $id_sanggar);
	$result = $ci->db->get('n_pendidikan');

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}

function check_access_j($id_jadwal, $id_sanggar)
{
	$ci = get_instance();

	$ci->db->where('id_jadwal', $id_jadwal);
	$ci->db->where('id_sanggar', $id_sanggar);
	$result = $ci->db->get('n_jadwal');

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}

function check_access_u($id_umur, $id_sanggar)
{
	$ci = get_instance();

	$ci->db->where('id_umur', $id_umur);
	$ci->db->where('id_sanggar', $id_sanggar);
	$result = $ci->db->get('n_umur');

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}

function check_access_s($id_sarana, $id_sanggar)
{
	$ci = get_instance();

	$ci->db->where('id_sarana', $id_sarana);
	$ci->db->where('id_sanggar', $id_sanggar);
	$result = $ci->db->get('n_sarana');

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}

function check_access_pras($id_prasarana, $id_sanggar)
{
	$ci = get_instance();

	$ci->db->where('id_prasarana', $id_prasarana);
	$ci->db->where('id_sanggar', $id_sanggar);
	$result = $ci->db->get('n_prasarana');

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}

function check_access_b($id_biaya, $id_sanggar)
{
	$ci = get_instance();

	$ci->db->where('id_biaya', $id_biaya);
	$ci->db->where('id_sanggar', $id_sanggar);
	$result = $ci->db->get('n_biaya');

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}

function hitungBobot($gap){
    switch ($gap) {
      case 0: 
      	return 5;
        break;
      case -1:
        return 4.5;
        break;
      case 1:
        return 4;
        break;
      case -2:
        return 3.5;
        break;
      case 2:
        return 3;
        break;
      case -3:
        return 2.5;
        break;
      case 3:
        return 2;
        break;
      case -4:
        return 1.5;
        break;
      case 4:
        return 1;
        break;
    }
}