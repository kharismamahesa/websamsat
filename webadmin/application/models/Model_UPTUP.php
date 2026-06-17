<?php
class Model_UPTUP extends CI_Model
{

    function getAllData()
    {
        $result = $this->db->query("SELECT * FROM tbl_up ORDER BY `kode_kab_kota`");
        return $result;
    }
    function getKantorbyKode($kode_wilayah)
    {
        $result = $this->db->query("SELECT * FROM tbl_up WHERE kode_wilayah = '$kode_wilayah'");
        return $result;
    }
}
