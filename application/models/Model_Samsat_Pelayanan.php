<?php
class Model_Samsat_Pelayanan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllJenis($kantor_id)
    {
        $query = $this->db->query("SELECT * FROM samsat_layanan WHERE kantor_id = '$kantor_id'");
        return $query;
    }

    public function getJenis($id_layanan)
    {
        $query = $this->db->query("SELECT * FROM samsat_layanan WHERE id = '$id_layanan'");
        return $query;
    }

    public function getJenisKomponen($id_layanan)
    {
        $query = $this->db->query("SELECT * FROM samsat_layanan_komponen WHERE id_layanan = '$id_layanan'");
        return $query;
    }
}
