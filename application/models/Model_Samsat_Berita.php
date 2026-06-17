<?php
class Model_Samsat_Berita extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getSemuaBerita($kantor_id, $limit, $start)
	{
		$this->db->select('*');
		$this->db->from('samsat_berita');
		$this->db->where("kantor_id", $kantor_id);
		$this->db->order_by('created_date', 'DESC');
		$this->db->limit($limit, $start);
		return $this->db->get();
	}

	public function getAllbyKantor($kantor_id)
	{
		$query = $this->db->query("SELECT * FROM samsat_berita WHERE kantor_id = '$kantor_id' AND `status` = 1 ORDER BY created_date DESC LIMIT 6");
		return $query;
	}

	public function getBeritabyLink($link)
	{
		$query = $this->db->query("SELECT * FROM samsat_berita WHERE link = '$link' AND `status` = 1");
		return $query;
	}

	public function getLastBeritabyKantor($kantor_id)
	{
		$query = $this->db->query("SELECT * FROM samsat_berita WHERE kantor_id = '$kantor_id' AND `status` = 1 ORDER BY created_date DESC LIMIT 1");
		return $query;
	}
}
