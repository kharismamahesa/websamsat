<?php
class Model_Samsat_User extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getUserbyKode($id)
    {
        $query = $this->db->query("SELECT * FROM samsat_auth WHERE id = '$id'");
        return $query;
    }
}
