<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perawang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		// $this->load->model('Model_Samsat_Berita', 'model_samsat_berita');
		$this->load->library('Lib_func', 'lib_func');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data = array(
			'title' => 'Official Website - Samsat Perawang',
			// 'getallberita' => $this->model_samsat_berita->getAllbyKantor(3991),
		);
		$this->load->view('perawang/header', $data);
		// $this->load->view('perawang/halamanutama', $data);
	}
}