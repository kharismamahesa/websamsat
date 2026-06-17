<?php
class Model_Samsat_Realtime extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->sts_dipenda = $this->load->database('sts_dipenda', TRUE);
	}

	function getRealtime($uptup, $tahun)
	{
		$result = $this->sts_dipenda->query("SELECT 
        SUM(a.dtl_pkb) AS total_pkb,
        SUM(a.dtl_bbn) AS total_bbn,
        SUM(a.dtl_unit_pkb) AS unit_pkb,
        SUM(a.dtl_unit_bbn) AS unit_bbn,
        b.`KodeWilayah` 
        FROM one_real_dtl a 
        INNER JOIN dm_wilayahsamsat b
        ON a.`kode_wilayah`=b.`KodeWilayah`
        WHERE YEAR(a.`tglbyr`)='$tahun' AND a.ket_pen<>23 
        AND b.`KodeWilayah` = '$uptup'");
		return $result;
	}
	function getRealtimePenerimaan($uptup, $tahun, $kategori_unit, $jenis_pajak)
	{
		$result = $this->db->query("SELECT SUM(unit) AS total_unit, SUM(total) AS total_penerimaan FROM samsat_realtime 
            WHERE YEAR(tanggal) = '$tahun'
            AND kantor_id = '$uptup'
            AND kategori_unit = '$kategori_unit'
            AND jenis_pajak = '$jenis_pajak'");
		return $result;
	}
}
