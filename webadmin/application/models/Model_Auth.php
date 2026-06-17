<?php
class Model_Auth extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function cek($username, $password)
    {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get("tblwartawan");
    }
}
