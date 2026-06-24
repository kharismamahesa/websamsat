<?php
class Model_UPTUP extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getAll()
	{
		$query = $this->db->query("SELECT * FROM t_wilayah_samsat 
			WHERE KodeWilayah != '23'
			AND KodeWilayah != '11991'");
		return $query;
	}

	function getUPTUP($KodeWilayah)
	{
		$query = $this->db->query("SELECT * FROM t_wilayah_samsat WHERE KodeWilayah = '$KodeWilayah'");
		return $query;
	}
}
