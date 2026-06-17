<?php
class Model_Samsat_Video extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getSemuaVideo($kantor_id, $limit, $start)
	{
		$this->db->select('*');
		$this->db->from('samsat_video');
		$this->db->where("kantor_id", $kantor_id);
		$this->db->order_by('created_date', 'DESC');
		$this->db->limit($limit, $start);
		return $this->db->get();
	}

	public function getLastVideo($kantor_id)
	{
		$query = $this->db->query("SELECT * FROM samsat_video WHERE kantor_id = '$kantor_id' AND `status` = 1 ORDER BY created_date DESC");
		return $query;
	}
}
