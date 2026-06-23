<?php
class Model_Samsat_Galeri extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getSemuaGaleri($kantor_id, $limit, $start)
    {
        $this->db->select('samsat_galeri.id, samsat_galeri.keterangan, samsat_galeri.foto, samsat_galeri.kantor_id, samsat_galeri.created_datetime');
        $this->db->from('samsat_galeri');
        $this->db->where("samsat_galeri.kantor_id", $kantor_id);
        $this->db->order_by("samsat_galeri.created_datetime", "DESC");
        $this->db->limit($limit, $start);
        return $this->db->get();
    }

    // public function getAllbyKantor($kantor_id)
    // {
    //     $query = $this->db->query("SELECT * FROM samsat_berita WHERE kantor_id = '$kantor_id' AND `status` = 1 ORDER BY created_date DESC LIMIT 6");
    //     return $query;
    // }

    public function getGaleribyID($id)
    {
        $query = $this->db->query("SELECT * FROM samsat_galeri WHERE id = '$id'");
        return $query;
    }

    public function getGaleriFotobyIDGaleri($id_galeri)
    {
        $query = $this->db->query("SELECT * FROM samsat_galeri_foto WHERE id_galeri = '$id_galeri'");
        return $query;
    }

    // public function getLastBeritabyKantor($kantor_id)
    // {
    //     $query = $this->db->query("SELECT * FROM samsat_berita WHERE kantor_id = '$kantor_id' AND `status` = 1 ORDER BY created_date DESC LIMIT 1");
    //     return $query;
    // }
}
