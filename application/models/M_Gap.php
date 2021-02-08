<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Gap extends CI_Model {

	public function hitung($data)
	{
		$profile_matching =  $data;
		
		$raw_kriteria = [];
		foreach ($profile_matching as $key => $pm) {
			$data = array($pm['pendidikan'], $pm['umur'], $pm['jadwal_sanggar'], $pm['sarana'], $pm['prasarana'], $pm['biaya']);
	  		array_push($raw_kriteria, $data);
		}
		$hasil = $this->gap($raw_kriteria);
		return $hasil;
	}

	function gap($arr_kriteria)
	{
		$data_kriteria = (Object)[
			'bobot' => 0.6,
			'cf' 	=> 0.6,
			'sf' 	=> 0.4,
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
		$kriteria_nilai	= [5,3,3,3,3,5];
		$kriteria_tipe	= [
			'core',
			'core',
			'core',
			'second',
			'second',
			'second'
		];
	
		$raw_kriteria = $data_kriteria;

		foreach ($raw_kriteria as $key => $value) {
			foreach ($value as $key2 => $value2) {
				if($key2 == 0)
				{
					if(5 <= $value2 && $value2 <= 6)
						$alt_pm[$key][$key2] = 5;
					else if(4 <= $value2 && $value2 <= 5)
						$alt_pm[$key][$key2] = 4;
					else if(3 <= $value2 && $value2 <= 4)
						$alt_pm[$key][$key2] = 3;
					else if(2 <= $value2 && $value2 <= 3)
						$alt_pm[$key][$key2] = 2;
					else if(1 <= $value2 && $value2 <= 2)
						$alt_pm[$key][$key2] = 1;
				}
				else if($key2 == 1)
				{
					if(3 <= $value2 && $value2 <= 4)
						$alt_pm[$key][$key2] = 3;
					else if(2 <= $value2 && $value2 <= 3)
						$alt_pm[$key][$key2] = 2;
					else if(1 <= $value2 && $value2 <= 2)
						$alt_pm[$key][$key2] = 1;
				}
				else if($key2 == 2)
				{
					if(3 <= $value2 && $value2 <= 4)
						$alt_pm[$key][$key2] = 3;
					else if(2 <= $value2 && $value2 <= 3)
						$alt_pm[$key][$key2] = 2;
					else if(1 <= $value2 && $value2 <= 2)
						$alt_pm[$key][$key2] = 1;
				}

				else if($key2 == 3)
				{
					if(3 <= $value2 && $value2 <= 4)
						$alt_pm[$key][$key2] = 3;
					else if(2 <= $value2 && $value2 <= 3)
						$alt_pm[$key][$key2] = 2;
					else if(1 <= $value2 && $value2 <= 2)
						$alt_pm[$key][$key2] = 1;
				}
				else if($key2 == 4)
				{
					if(3 <= $value2 && $value2 <= 4)
						$alt_pm[$key][$key2] = 3;
					else if(2 <= $value2 && $value2 <= 3)
						$alt_pm[$key][$key2] = 2;
					else if(1 <= $value2 && $value2 <= 2)
						$alt_pm[$key][$key2] = 1;
				}
				else if($key2 == 5)
				{
					if(5 <= $value2 && $value2 <= 6)
						$alt_pm[$key][$key2] = 5;
					else if(4 <= $value2 && $value2 <= 5)
						$alt_pm[$key][$key2] = 4;
					else if(3 <= $value2 && $value2 <= 4)
						$alt_pm[$key][$key2] = 3;
					else if(2 <= $value2 && $value2 <= 3)
						$alt_pm[$key][$key2] = 2;
					else if(1 <= $value2 && $value2 <= 2)
						$alt_pm[$key][$key2] = 1;
				}
			}
		}

		function hitung_bobot($val)
		{
			$selisih = [0,1,-1,2,-2,3,-3,4,-4];
			$bobot_nilai = [5,4.5,4,3.5,3,2.5,2,1.5,1];
			foreach ($selisih as $key => $value) {
				if($val == $value)
					return $bobot_nilai[$key];
			}
		}

		$gap_pm = [];
		
		$bobot_pm = [];
		
		$cf_pm = [];
		
		$sf_pm = [];

		foreach ($alt_pm as $key => $value) {
			$cf_pm[$key] = [];
			$sf_pm[$key] = [];
			foreach ($value as $key2 => $value2) {
				$gap_pm[$key][$key2] = $alt_pm[$key][$key2] - $pm_nilai[$key2];
				$bobot_pm[$key][$key2] = hitung_bobot($gap_pm[$key][$key2]);
				
				if($pm_tipe[$key2] == 'core')
					array_push($cf_pm[$key], $bobot_pm[$key][$key2]);
				else
					array_push($sf_pm[$key], $bobot_pm[$key][$key2]);
				
			}
		}
		
		
		foreach ($alt_pm as $key => $value) {
			$ncf_pm[$key] = array_sum($cf_pm[$key]) / count($cf_pm[$key]);
			$nsf_pm[$key] = array_sum($sf_pm[$key]) / count($sf_pm[$key]);
			$total_pm[$key] = $pm->cf * $ncf_pm[$key] + $pm->sf * $nsf_pm[$key];
		}
		foreach ($alt_pm as $key => $value) {
			$rank[$key] = $pm->bobot * $total_pm[$key];
		}
		
		$hasil = (Object)[
			'gap_pm' 			=> $gap_pm,
			'bobot_pm' 			=> $bobot_pm,
			'ncf_pm' 			=> $ncf_pm,
			'nsf_pm' 			=> $nsf_pm,
			'total_pm' 			=> $total_pm,
			'rank' 				=> $rank
		];
		return $hasil;
	}
}