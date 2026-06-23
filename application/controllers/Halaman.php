<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halaman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index($wilayah = NULL)
    {
		$this->load->view('portal');
    }
}
