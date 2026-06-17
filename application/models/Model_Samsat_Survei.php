<?php
class Model_Samsat_Survei extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	function getDataSurvei($kantor_pelayanan)
	{
		$result = $this->db->query("SELECT 
        count(id_survei) as jumlah_respon,
        sum(tanya1) as U1_sum, (sum(tanya1) / count(id_survei)) as U1_rata, ((sum(tanya1) / count(id_survei)) * 0.111) as U1_tertimbang, 
        sum(tanya2) as U2_sum, (sum(tanya2) / count(id_survei)) as U2_rata, ((sum(tanya2) / count(id_survei)) * 0.111) as U2_tertimbang,
        sum(tanya3) as U3_sum, (sum(tanya3) / count(id_survei)) as U3_rata, ((sum(tanya3) / count(id_survei)) * 0.111) as U3_tertimbang,
        sum(tanya4) as U4_sum, (sum(tanya4) / count(id_survei)) as U4_rata, ((sum(tanya4) / count(id_survei)) * 0.111) as U4_tertimbang,
        sum(tanya5) as U5_sum, (sum(tanya5) / count(id_survei)) as U5_rata, ((sum(tanya5) / count(id_survei)) * 0.111) as U5_tertimbang,
        sum(tanya6) as U6_sum, (sum(tanya6) / count(id_survei)) as U6_rata, ((sum(tanya6) / count(id_survei)) * 0.111) as U6_tertimbang,
        sum(tanya7) as U7_sum, (sum(tanya7) / count(id_survei)) as U7_rata, ((sum(tanya7) / count(id_survei)) * 0.111) as U7_tertimbang,
        sum(tanya8) as U8_sum, (sum(tanya8) / count(id_survei)) as U8_rata, ((sum(tanya8) / count(id_survei)) * 0.111) as U8_tertimbang,
        sum(tanya9) as U9_sum, (sum(tanya9) / count(id_survei)) as U9_rata, ((sum(tanya9) / count(id_survei)) * 0.111) as U9_tertimbang,
		((SUM(tanya21) / COUNT(id_survei)) * 0.2) AS U21_tertimbang, 
		((SUM(tanya22) / COUNT(id_survei)) * 0.2) AS U22_tertimbang,
		((SUM(tanya23) / COUNT(id_survei)) * 0.2) AS U23_tertimbang,
		((SUM(tanya24) / COUNT(id_survei)) * 0.2) AS U24_tertimbang,
		((SUM(tanya25) / COUNT(id_survei)) * 0.2) AS U25_tertimbang	
        FROM t_survei
		WHERE tanya1 <> '' AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
        AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> ''
        AND kantor_pelayanan = '$kantor_pelayanan'")->row();
		return $result;
	}

	function hitungISAK($kantor_pelayanan)
	{
		$getdatasurvei = $this->model_samsat_survei->getDataSurvei($kantor_pelayanan);
		$total = $getdatasurvei->U21_tertimbang + $getdatasurvei->U22_tertimbang + $getdatasurvei->U23_tertimbang + $getdatasurvei->U24_tertimbang + $getdatasurvei->U25_tertimbang;
		$hasil = $total * 25;
		return $hasil;
	}

	function hitungIKM($kantor_pelayanan)
	{
		$getdatasurvei = $this->model_samsat_survei->getDataSurvei($kantor_pelayanan);
		// $jumlah_respon = $this->model_survei->getDataSurvei()->jumlah_respon;
		$total =
			$getdatasurvei->U1_tertimbang + $getdatasurvei->U2_tertimbang + $getdatasurvei->U3_tertimbang +
			$getdatasurvei->U4_tertimbang + $getdatasurvei->U5_tertimbang + $getdatasurvei->U6_tertimbang +
			$getdatasurvei->U7_tertimbang + $getdatasurvei->U8_tertimbang + $getdatasurvei->U9_tertimbang;
		// $hasil = $jumlah_respon * $total;
		$hasil = ($total / 4) * 100;
		return $hasil;
	}

	function getDSPendidikan($kantor_pelayanan)
	{
		$result = $this->db->query("SELECT COUNT(id_survei) AS jumlah, pendidikan 
            FROM t_survei 
            -- WHERE (pendidikan != '' || pendidikan != NULL) 
			WHERE tanya1 <> '' AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
            AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> ''
            AND kantor_pelayanan = '$kantor_pelayanan'
            GROUP BY pendidikan
            ORDER BY pendidikan = 'SD' ASC,
                pendidikan = 'SLTP/SMP' ASC,
                pendidikan = 'SLTA/SMA' ASC,
                pendidikan = 'D1/D2/D3' ASC,
                pendidikan = 'S1' ASC,
                pendidikan = 'S2/S3' ASC");
		return $result;
	}

	function getDSKelamin($kantor_pelayanan)
	{
		$result = $this->db->query("SELECT COUNT(id_survei) AS jumlah, jenis_kelamin 
            FROM t_survei
			WHERE tanya1 <> '' AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
            AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> ''
            AND kantor_pelayanan = '$kantor_pelayanan'
            GROUP BY jenis_kelamin
            ORDER BY jenis_kelamin = 'L' ASC,
                jenis_kelamin = 'P' ASC");
		return $result;
	}

	public function umur1($kantor_pelayanan)
	{
		$query = $this->db->query("SELECT count(pendidikan) as jumlah,'1-25' as umur 
			FROM t_survei 
			WHERE usia<=25
			AND tanya1 <> '' AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
			AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> '' 
            AND kantor_pelayanan = '$kantor_pelayanan'");
		return $query;
	}

	public function umur2($kantor_pelayanan)
	{
		$query = $this->db->query("SELECT count(pendidikan) as jumlah,'26-35' as umur 
			FROM t_survei 
			WHERE usia>=26 AND usia<=35
			AND tanya1 <> ''  AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
			AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> '' 
            AND kantor_pelayanan = '$kantor_pelayanan'");
		return $query;
	}

	public function umur3($kantor_pelayanan)
	{
		$query = $this->db->query("SELECT count(pendidikan) as jumlah,'36-45' as umur 
			FROM t_survei 
			WHERE usia>=36 and usia<=45
			AND tanya1 <> ''  AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
			AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> '' 
            AND kantor_pelayanan = '$kantor_pelayanan'");
		return $query;
	}

	public function umur4($kantor_pelayanan)
	{
		$query = $this->db->query("SELECT count(pendidikan) as jumlah,'46-55' as umur 
			FROM t_survei 
			WHERE usia>=46 and usia<=55
			AND tanya1 <> ''  AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
			AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> '' 
            AND kantor_pelayanan = '$kantor_pelayanan'");
		return $query;
	}

	public function umur5($kantor_pelayanan)
	{
		$query = $this->db->query("SELECT count(pendidikan) as jumlah,'DIATAS 56' as umur 
			FROM t_survei 
			WHERE usia>=56
			AND tanya1 <> ''  AND tanya2 <> '' AND tanya3 <> '' AND tanya4 <> '' AND tanya5 <> '' AND tanya6 <> '' AND tanya7 <> '' AND tanya8 <> '' AND tanya9 <> '' 
			AND tanya21 <> '' AND tanya22 <> '' AND tanya23 <> '' AND tanya24 <> '' AND tanya25 <> '' 
            AND kantor_pelayanan = '$kantor_pelayanan'");
		return $query;
	}

	public function simpan_survei($data)
	{
		if ($this->db->insert("t_survei", $data) == TRUE) {
			$hasil = 1;
		} else {
			$hasil = 0;
		}
		return $hasil;
	}
}
