<?php
class Model_Samsat_FAQ extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getAllFAQ()
	{
		$query = $this->db->query("SELECT * FROM t_faq_kategori ORDER BY kategori");
		return $query;
	}

	public function getFAQ($id_kategori)
	{
		$query = $this->db->query("SELECT * FROM t_faq_kategori WHERE id = '$id_kategori'");
		return $query;
	}

	public function getDetailFAQ($id_kategori_faq)
	{
		$query = $this->db->query("SELECT * FROM t_faq WHERE id_kategori_faq = '$id_kategori_faq' ORDER BY judul");
		return $query;
	}
}
