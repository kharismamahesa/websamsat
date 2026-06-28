<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// MODEL
		$this->load->model('Model_UPTUP', 'model_uptup');
		$this->load->model('Model_Survei', 'model_survei');
		// $this->load->model('Model_FAQ', 'model_faq');
	}

	public function index()
	{
		$data = array(
			'judul' => 'Portal Pelayanan - Badan Pendapatan Daerah Provinsi Riau',
		);
		$this->load->view('pelayanan/baru/header', $data);
		$this->load->view('pelayanan/baru/home', $data);
	}



	// public function survei()
	// {
	// 	$data = array(
	// 		'judul' => 'Survei - Portal Pelayanan Badan Pendapatan Daerah Provinsi Riau',
	// 		'getuptup' => $this->model_uptup->getAll(),
	// 	);
	// 	$this->load->view('pelayanan/header', $data);
	// 	$this->load->view('pelayanan/survei', $data);
	// }

	// public function nilaiindeks()
	// {
	// 	$data = array(
	// 		'judul' => 'Nilai Indeks - Portal Pelayanan Badan Pendapatan Daerah Provinsi Riau',
	// 		'getuptup' => $this->model_uptup->getAll(),
	// 	);
	// 	$this->load->view('pelayanan/header', $data);
	// 	$this->load->view('pelayanan/nilaiindeks', $data);
	// }

	// public function surveikirim()
	// {
	// 	$uptup = isset($_GET['uptup']) ? trim($_GET['uptup']) : null;
	// 	if (!empty($uptup) && preg_match('/^[0-9]+$/', $uptup)) {
	// 		$cekdatauptup = $this->model_uptup->getUPTUP($uptup);
	// 		if ($cekdatauptup->num_rows() > 0) {
	// 			$data = array(
	// 				'judul' => 'Survei - Portal Pelayanan Badan Pendapatan Daerah Provinsi Riau',
	// 				'datauptup' => $cekdatauptup,
	// 			);
	// 			$this->load->view('pelayanan/header', $data);
	// 			$this->load->view('pelayanan/surveikirim', $data);
	// 		} else {
	// 			redirect(base_url('pelayanan'));
	// 		}
	// 	} else {
	// 		redirect(base_url('pelayanan'));
	// 	}
	// }

	public function pengaduan()
	{
		$data = array(
			'judul' => 'Pengaduan - Portal Pelayanan Badan Pendapatan Daerah Provinsi Riau',
			'getuptup' => $this->model_uptup->getAll(),
		);
		$this->load->view('pelayanan/baru/header', $data);
		$this->load->view('pelayanan/baru/pengaduan', $data);
	}

	public function pengaduankirim()
	{
		$uptup = isset($_GET['uptup']) ? trim($_GET['uptup']) : null;
		if (!empty($uptup) && preg_match('/^[0-9]+$/', $uptup)) {
			$cekdatauptup = $this->model_uptup->getUPTUP($uptup);
			if ($cekdatauptup->num_rows() > 0) {
				$data = array(
					'judul' => 'Pengaduan - Portal Pelayanan Badan Pendapatan Daerah Provinsi Riau',
					'datauptup' => $cekdatauptup,
				);
				$this->load->view('pelayanan/baru/header', $data);
				$this->load->view('pelayanan/baru/pengaduankirim', $data);
			} else {
				redirect(base_url('pelayanan/pengaduan'));
			}
		} else {
			// Redirect jika validasi gagal
			redirect(base_url('pelayanan/pengaduan'));
		}
	}

	public function wbs()
	{
		$data = array(
			'judul' => 'Whistle Blowing System - Portal Pelayanan Badan Pendapatan Daerah Provinsi Riau',
			'getuptup' => $this->model_uptup->getAll(),
		);
		$this->load->view('pelayanan/baru/header', $data);
		$this->load->view('pelayanan/baru/wbs', $data);
	}

	// // public function faq()
	// // {
	// // 	$data = array(
	// // 		'judul' => 'FAQ - Portal Pelayanan Badan Pendapatan Daerah Provinsi Riau',
	// // 		'getkategorifaq' => $this->model_faq->getKategoriFAQ(),
	// // 	);
	// // 	$this->load->view('header', $data);
	// // 	$this->load->view('faq', $data);
	// // }

	// public function infopajak2()
	// {
	// 	$data = array(
	// 		'judul' => 'Informasi Pajak Kendaraan Bermotor - Portal Pelayanan Badan Pendapatan Daerah Provinsi Riau',
	// 		'getuptup' => $this->model_uptup->getAll(),
	// 	);
	// 	$this->load->view('pelayanan/header', $data);
	// 	$this->load->view('pelayanan/infopajak', $data);
	// }

	// ========================================
	// public function kirimemail($email, $pesan)
	// {
	// 	$config = [
	// 		'mailtype'  => 'html',
	// 		'charset'   => 'utf-8',
	// 		'protocol'  => 'smtp',
	// 		'smtp_host' => 'smtp.office365.com',
	// 		'smtp_user' => 'bapenda.riau@hotmail.com',
	// 		'smtp_pass'   => 'angga240892',
	// 		'smtp_crypto' => 'tls',
	// 		'auth'      => true,
	// 		'smtp_port'   => 587,
	// 		'crlf'    => "\r\n",
	// 		'newline' => "\r\n"
	// 	];

	// 	$this->load->library('email', $config);
	// 	$this->email->from('bapenda.riau@hotmail.com', 'Pengaduan BAPENDA Provinsi Riau');
	// 	$this->email->to($email);
	// 	$this->email->subject('Pengaduan Badan Pendapatan Daerah Provinsi Riau');
	// 	$this->email->message($pesan);
	// 	return $this->email->send();
	// }
	// ========================================
}
