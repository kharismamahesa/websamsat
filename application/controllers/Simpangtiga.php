<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpangtiga extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Model_Samsat_Berita', 'model_samsat_berita');
		$this->load->model('Model_Samsat_Survei', 'model_samsat_survei');
		$this->load->model('Model_Samsat_Video', 'model_samsat_video');
		$this->load->model('Model_Samsat_FAQ', 'model_samsat_faq');
		$this->load->model('Model_Samsat_Pelayanan', 'model_samsat_pelayanan');
		$this->load->model('Model_Samsat_Unit', 'model_samsat_unit');
		$this->load->model('Model_Samsat_Galeri', 'model_samsat_galeri');
		$this->load->model('Model_Samsat_Survei', 'model_samsat_survei');
		$this->load->model('Model_Samsat_Realtime', 'model_samsat_realtime');

		$this->load->library('Lib_func', 'lib_func');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data = array(
			'title' => 'Website Samsat Simpang Tiga - BAPENDA RIAU',
			'getlastberita' => $this->model_samsat_berita->getLastBeritabyKantor(1992),
			'getallberita' => $this->model_samsat_berita->getAllbyKantor(1992),
			'getalljenislayanan' => $this->model_samsat_pelayanan->getAllJenis(1992),
		);
		$this->load->view('simpangtiga/header', $data);
		$this->load->view('simpangtiga/halamanutama', $data);
	}

	public function detailberita()
	{
		$link = $this->uri->segment(3);
		$getberitabylink = $this->model_samsat_berita->getBeritabyLink($link);
		if ($getberitabylink->num_rows() > 0) {
			$data = array(
				'title' => $getberitabylink->row()->judul . ' - ' . 'Samsat Simpang Tiga',
				'getberitabylink' => $getberitabylink->row(),
				'getallberita' => $this->model_samsat_berita->getAllbyKantor(1992),
			);
			$this->load->view('simpangtiga/header', $data);
			$this->load->view('simpangtiga/detailberita', $data);
		} else {
			echo "<script>window.alert('Anda mengakses URL yang salah');
			window.location=('" . base_url('simpangtiga') . "')</script>";
		}
	}

	public function pengaduan()
	{
		$data = array(
			'title' => 'Pengaduan - ' . 'Samsat Simpang Tiga',
			'getallberita' => $this->model_samsat_berita->getAllbyKantor(1992),
		);
		$this->load->view('simpangtiga/header', $data);
		$this->load->view('simpangtiga/pengaduan', $data);
	}

	public function faq()
	{
		$data = array(
			'title' => 'FAQ - Samsat Simpang Tiga',
			'getallberita' => $this->model_samsat_berita->getAllbyKantor(1992),
			'getallfaq' => $this->model_samsat_faq->getAllFAQ(),
		);
		$this->load->view('simpangtiga/header', $data);
		$this->load->view('simpangtiga/faq', $data);
	}

	public function faqdetail()
	{
		$link = $this->uri->segment(3);
		$data = array(
			'title' => 'FAQ | ' . 'Samsat Simpang Tiga',
			'getallberita' => $this->model_samsat_berita->getAllbyKantor(1992),
			'getdetailfaq' => $this->model_samsat_faq->getDetailFAQ($link),
			'getfaq' => $this->model_samsat_faq->getFAQ($link),
		);
		$this->load->view('simpangtiga/header', $data);
		$this->load->view('simpangtiga/faqdetail', $data);
	}

	public function realtime()
	{
		$samsat = 'Samsat Simpang Tiga';
		$tahunsekarang = date('Y');
		$submenu = $this->uri->segment(3);
		if ($submenu == 'simpang-tiga') {
			$tahunsekarang = date('Y');
			$data = array(
				'title' => 'Realtime Penerimaan | ' . $samsat,
				'getallberita' => $this->model_samsat_berita->getAllbyKantor(1992),
				'getdatarealtime' => $this->model_samsat_realtime->getRealtime(1992, $tahunsekarang),
			);
			$this->load->view('simpangtiga/header', $data);
			$this->load->view('simpangtiga/realtime', $data);
		} elseif ($submenu == 'samsat-keliling') {
			$datanya = $this->model_samsat_realtime->getRealtimePenerimaan(1992, $tahunsekarang, 1, 1);
			$total_unit = $datanya->row()->total_unit;
			if ($total_unit == null) {
				$tot_unit = 0;
			} else {
				$tot_unit = $total_unit;
			}
			$total_penerimaan = $datanya->row()->total_penerimaan;
			if ($total_penerimaan == null) {
				$tot_penerimaan = 0;
			} else {
				$tot_penerimaan = $total_penerimaan;
			}
			$data = array(
				'title' => 'Realtime Samsat Keliling | ' . $samsat,
				'kategori_unit' => 'Samsat Keliling',
				'getallberita' => $this->model_samsat_berita->getAllbyKantor(1992),
				'total_unit' => $tot_unit,
				'total_penerimaan' => $tot_penerimaan,
			);
			$this->load->view('simpangtiga/header', $data);
			$this->load->view('simpangtiga/realtime_penerimaan', $data);
		} elseif ($submenu == 'samsat-tanjak') {
			$datanya = $this->model_samsat_realtime->getRealtimePenerimaan(1992, $tahunsekarang, 2, 1);
			$total_unit = $datanya->row()->total_unit;
			if ($total_unit == null) {
				$tot_unit = 0;
			} else {
				$tot_unit = $total_unit;
			}
			$total_penerimaan = $datanya->row()->total_penerimaan;
			if ($total_penerimaan == null) {
				$tot_penerimaan = 0;
			} else {
				$tot_penerimaan = $total_penerimaan;
			}
			$data = array(
				'title' => 'Realtime Samsat Tanjak | ' . $samsat,
				'kategori_unit' => 'Samsat Tanjak',
				'getallberita' => $this->model_samsat_berita->getAllbyKantor(1992),
				'total_unit' => $tot_unit,
				'total_penerimaan' => $tot_penerimaan,
			);
			$this->load->view('simpangtiga/header', $data);
			$this->load->view('simpangtiga/realtime_penerimaan', $data);
		} elseif ($submenu == 'drive-thru') {
			$datanya = $this->model_samsat_realtime->getRealtimePenerimaan(1992, $tahunsekarang, 3, 1);
			$total_unit = $datanya->row()->total_unit;
			if ($total_unit == null) {
				$tot_unit = 0;
			} else {
				$tot_unit = $total_unit;
			}
			$total_penerimaan = $datanya->row()->total_penerimaan;
			if ($total_penerimaan == null) {
				$tot_penerimaan = 0;
			} else {
				$tot_penerimaan = $total_penerimaan;
			}
			$data = array(
				'title' => 'Realtime Drive Thru | ' . $samsat,
				'kategori_unit' => 'Drive Thru',
				'getallberita' => $this->model_samsat_berita->getAllbyKantor(1992),
				'total_unit' => $tot_unit,
				'total_penerimaan' => $tot_penerimaan,
			);
			$this->load->view('simpangtiga/header', $data);
			$this->load->view('simpangtiga/realtime_penerimaan', $data);
		}
	}

	public function pelayanandetail()
	{
		$link = $this->uri->segment(3);
		$getjenis = $this->model_samsat_pelayanan->getJenis($link);
		$data = array(
			'title' => 'Layanan - ' . $getjenis->row()->jenis_layanan . ' | ' . 'Samsat Simpang Tiga',
			'getallberita' => $this->model_samsat_berita->getAllbyKantor(1992),
			'getjenis' => $getjenis,
			'getjeniskomponen' => $this->model_samsat_pelayanan->getJenisKomponen($link),
		);
		$this->load->view('simpangtiga/header', $data);
		$this->load->view('simpangtiga/pelayanandetail', $data);
	}

	public function u()
	{
		$link = $this->uri->segment(3);
		$dataunit = $this->model_samsat_unit->getUnit($link);
		if ($dataunit->num_rows() > 0) {
			$data = array(
				'title' =>  $dataunit->row()->unit . ' | ' . 'Samsat Simpang Tiga',
				'dataunit' => $dataunit,
				'getallberita' => $this->model_samsat_berita->getAllbyKantor(1992),
			);
			$this->load->view('simpangtiga/header', $data);
			$this->load->view('simpangtiga/unitkerja', $data);
		} else {
			echo "<script>window.alert('Maaf, Halaman tidak ditemukan');
						window.location=('" . base_url('simpangtiga') . "')</script>";
		}
	}

	public function tarif()
	{
		$data = array(
			'title' => 'Tarif PNBP - ' . 'Samsat Simpang Tiga',
			'getallberita' => $this->model_samsat_berita->getAllbyKantor(1992),
		);
		$this->load->view('simpangtiga/header', $data);
		$this->load->view('simpangtiga/tarif', $data);
	}
}
