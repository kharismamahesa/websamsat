<?php
class Model_User extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getUserbyKode($kode_wartawan)
    {
        $query = $this->db->query("SELECT * FROM tblwartawan WHERE kode_wartawan = '$kode_wartawan'");
        return $query;
    }
}
