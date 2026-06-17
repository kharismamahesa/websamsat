<?php
class Model_Samsat_Unit extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllUnit()
	{
		$query = $this->db->query("SELECT * FROM samsat_unit ORDER BY unit");
		return $query;
	}

	public function getAllUnitLinkNotNull()
	{
		$query = $this->db->query("SELECT * FROM samsat_unit WHERE link_unit != '' 
            ORDER BY unit");
		return $query;
	}

	public function getUnit($link_unit)
	{
		$query = $this->db->query("SELECT * FROM samsat_unit WHERE link_unit = '$link_unit'");
		return $query;
	}
}
