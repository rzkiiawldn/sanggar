	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_spk extends CI_Model {

	public function nilai_akhir()
	{
		$this->db->select_max('nilai');
	    $this->db->from('profile_matching_rangking');
	    $query 	= 	$this->db->get();
	    $data	=	$query->result();
	}

	public function hitung($data)
	{
		$profile_matching =  $data;
		
		$raw_asam = [];
		// $raw_non_asam = [];
		foreach ($profile_matching as $key => $pm) {
			$data = array($pm['pendidikan'], $pm['umur'], $pm['jadwal'], $pm['sarana'], $pm['prasarana'], $pm['biaya']);
	  		array_push($raw_asam, $data);

			// $data = array($pm['sarana'], $pm['prasarana'], $pm['biaya']);
			// array_push($raw_non_asam, $data);
		}
		$hasil = $this->gap($raw_asam);
		return $hasil;
	}

	// function gap($arr_asam, $arr_non_asam)
	function gap($arr_asam)
	{
		$asam = (Object)[
			'bobot' => 0.7,
			'cf' => 0.7,
			'sf' => 0.3,
			'sub_kriteria' => 
			[
				'Pendidikan',
				'Umur',
				'Jadwal Sanggar',
				'Sarana',
				'Prasarana',
				'Biaya'
			]
		];
		$asam_nilai = [5,3,3,3,3,5];
		$asam_tipe = [
			'core',
			'core',
			'second',
			'second',
			'second',
			'core'
		];

		// $non_asam = (Object)[
		// 	'bobot' => 0.3,
		// 	'cf' => 0.7,
		// 	'sf' => 0.3,
		// 	'sub_kriteria' => 
		// 	[
		// 		'Sarana',
		// 		'Prasarana',
		// 		'Biaya'
		// 	]
		// ];
		// $non_asam_nilai = [3,3,5];
		// $non_asam_tipe = [
		// 	'second',
		// 	'second',
		// 	'second'
		// ];

		$raw_asam = $arr_asam;
		// $raw_non_asam = $arr_non_asam;

		foreach ($raw_asam as $key => $value) {
			foreach ($value as $key2 => $value2) {
				//fixed acid
				if($key2 == 0)
				{
					if(5 <= $value2 && $value2 <= 6)
						$alt_asam[$key][$key2] = 5;
					else if(4 <= $value2 && $value2 <= 5)
						$alt_asam[$key][$key2] = 4;
					else if(3 <= $value2 && $value2 <= 4)
						$alt_asam[$key][$key2] = 3;
					else if(2 <= $value2 && $value2 <= 3)
						$alt_asam[$key][$key2] = 2;
					else if(1 <= $value2 && $value2 <= 2)
						$alt_asam[$key][$key2] = 1;
				}
				//volatile acidity
				else if($key2 == 1)
				{
					if(3 <= $value2 && $value2 <= 4)
						$alt_asam[$key][$key2] = 3;
					else if(2 <= $value2 && $value2 <= 3)
						$alt_asam[$key][$key2] = 2;
					else if(1 <= $value2 && $value2 <= 2)
						$alt_asam[$key][$key2] = 1;
				}
				//citric acidity
				else if($key2 == 2)
				{
					if(3 <= $value2 && $value2 <= 4)
						$alt_asam[$key][$key2] = 3;
					else if(2 <= $value2 && $value2 <= 3)
						$alt_asam[$key][$key2] = 2;
					else if(1 <= $value2 && $value2 <= 2)
						$alt_asam[$key][$key2] = 1;
				}

				else if($key2 == 3)
				{
					if(3 <= $value2 && $value2 <= 4)
						$alt_asam[$key][$key2] = 3;
					else if(2 <= $value2 && $value2 <= 3)
						$alt_asam[$key][$key2] = 2;
					else if(1 <= $value2 && $value2 <= 2)
						$alt_asam[$key][$key2] = 1;
				}
				// Chlorides
				else if($key2 == 4)
				{
					if(3 <= $value2 && $value2 <= 4)
						$alt_asam[$key][$key2] = 3;
					else if(2 <= $value2 && $value2 <= 3)
						$alt_asam[$key][$key2] = 2;
					else if(1 <= $value2 && $value2 <= 2)
						$alt_asam[$key][$key2] = 1;
				}
				//free sulfur dioxide
				else if($key2 == 5)
				{
					if(5 <= $value2 && $value2 <= 6)
						$alt_asam[$key][$key2] = 5;
					else if(4 <= $value2 && $value2 <= 5)
						$alt_asam[$key][$key2] = 4;
					else if(3 <= $value2 && $value2 <= 4)
						$alt_asam[$key][$key2] = 3;
					else if(2 <= $value2 && $value2 <= 3)
						$alt_asam[$key][$key2] = 2;
					else if(1 <= $value2 && $value2 <= 2)
						$alt_asam[$key][$key2] = 1;
				}
			}
		}

		// foreach ($raw_non_asam as $key => $value) {
		// 	foreach ($value as $key2 => $value2) {
		// 		//residual_sugar
		// 		if($key2 == 0)
		// 		{
		// 			if(3 <= $value2 && $value2 <= 4)
		// 				$alt_asam[$key][$key2] = 3;
		// 			else if(2 <= $value2 && $value2 <= 3)
		// 				$alt_asam[$key][$key2] = 2;
		// 			else if(1 <= $value2 && $value2 <= 2)
		// 				$alt_asam[$key][$key2] = 1;
		// 		}
		// 		// Chlorides
		// 		else if($key2 == 1)
		// 		{
		// 			if(3 <= $value2 && $value2 <= 4)
		// 				$alt_asam[$key][$key2] = 3;
		// 			else if(2 <= $value2 && $value2 <= 3)
		// 				$alt_asam[$key][$key2] = 2;
		// 			else if(1 <= $value2 && $value2 <= 2)
		// 				$alt_asam[$key][$key2] = 1;
		// 		}
		// 		//free sulfur dioxide
		// 		else if($key2 == 2)
		// 		{
		// 			if(5 <= $value2 && $value2 <= 6)
		// 				$alt_asam[$key][$key2] = 5;
		// 			else if(4 <= $value2 && $value2 <= 5)
		// 				$alt_asam[$key][$key2] = 4;
		// 			else if(3 <= $value2 && $value2 <= 4)
		// 				$alt_asam[$key][$key2] = 3;
		// 			else if(2 <= $value2 && $value2 <= 3)
		// 				$alt_asam[$key][$key2] = 2;
		// 			else if(1 <= $value2 && $value2 <= 2)
		// 				$alt_asam[$key][$key2] = 1;
		// 		}
		// 	}
		// }
		function hitung_bobot($val)
		{
			$selisih = [0,1,-1,2,-2,3,-3,4,-4];
			$bobot_nilai = [5,4.5,4,3.5,3,2.5,2,1.5,1];
			foreach ($selisih as $key => $value) {
				if($val == $value)
					return $bobot_nilai[$key];
			}
		}

		$gap_asam = [];
		// $gap_non_asam = [];
		
		$bobot_asam = [];
		// $bobot_non_asam = [];
		
		$cf_asam = [];
		// $cf_non_asam = [];
		
		$sf_asam = [];
		// $sf_non_asam = [];

		foreach ($alt_asam as $key => $value) {
			$cf_asam[$key] = [];
			$sf_asam[$key] = [];
			foreach ($value as $key2 => $value2) {
				$gap_asam[$key][$key2] = $alt_asam[$key][$key2] - $asam_nilai[$key2];
				$bobot_asam[$key][$key2] = hitung_bobot($gap_asam[$key][$key2]);
				
				if($asam_tipe[$key2] == 'core')
					array_push($cf_asam[$key], $bobot_asam[$key][$key2]);
				else
					array_push($sf_asam[$key], $bobot_asam[$key][$key2]);
				
			}
		}
		// foreach ($alt_asam as $key => $value) {
		// 	$cf_non_asam[$key] = [];
		// 	$sf_non_asam[$key] = [];
		// 	foreach ($value as $key2 => $value2) {
		// 		$gap_non_asam[$key][$key2] = $alt_asam[$key][$key2] - $non_asam_nilai[$key2];
		// 		$bobot_non_asam[$key][$key2] = hitung_bobot($gap_non_asam[$key][$key2]);

		// 		if($non_asam_tipe[$key2] == 'core')
		// 			array_push($cf_non_asam[$key], $bobot_non_asam[$key][$key2]);
		// 		else
		// 			array_push($sf_non_asam[$key], $bobot_non_asam[$key][$key2]);
		// 	}
		// }
		
		
		foreach ($alt_asam as $key => $value) {
			$ncf_asam[$key] = array_sum($cf_asam[$key]) / count($cf_asam[$key]);
			$nsf_asam[$key] = array_sum($sf_asam[$key]) / count($sf_asam[$key]);
			$total_asam[$key] = $asam->cf * $ncf_asam[$key] + $asam->sf * $nsf_asam[$key];
		}
		// foreach ($alt_asam as $key => $value) {
		// 	$ncf_non_asam[$key] = array_sum($cf_non_asam[$key]) / count($cf_non_asam[$key]);
		// 	$nsf_non_asam[$key] = array_sum($sf_non_asam[$key]) / count($sf_non_asam[$key]);
		// 	$total_non_asam[$key] = $non_asam->cf * $ncf_non_asam[$key] + $non_asam->sf * $nsf_non_asam[$key];
		// }
		
		foreach ($alt_asam as $key => $value) {
			$rank[$key] = $asam->bobot * $total_asam[$key];
		}
		
		$hasil = (Object)[
			'gap_asam' 			=> $gap_asam,
			// 'gap_non_asam' 		=> $gap_non_asam,
			'bobot_asam' 		=> $bobot_asam,
			// 'bobot_non_asam' 	=> $bobot_non_asam,
			'ncf_asam' 			=> $ncf_asam,
			// 'ncf_non_asam' 		=> $ncf_non_asam,
			'nsf_asam' 			=> $nsf_asam,
			// 'nsf_non_asam' 		=> $nsf_non_asam,
			'total_asam' 		=> $total_asam,
			// 'total_non_asam' 	=> $total_non_asam,
			'rank' 				=> $rank
		];
		return $hasil;
	}
}

/* End of file M_spk.php */
/* Location: ./application/models/M_spk.php */