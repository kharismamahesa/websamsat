<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dumai extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Model_Samsat_Berita', 'model_samsat_berita');
		$this->load->model('Model_Samsat_Survei', 'model_samsat_survei');
		$this->load->model('Model_Samsat_Video', 'model_samsat_video');
		$this->load->model('Model_Samsat_FAQ', 'model_samsat_faq');
		$this->load->model('Model_Samsat_Realtime', 'model_samsat_realtime');
		$this->load->library('Lib_func', 'lib_func');
		$this->load->library('pagination');
	}

	public function index()
	{
		$ambilvideo = $this->model_samsat_video->getLastVideo(10);
		if ($ambilvideo->num_rows() > 0) {
			$lastvideo = $ambilvideo->row()->url;
			$judulvideo = $ambilvideo->row()->judul;
		} else {
			$lastvideo = '';
			$judulvideo = '';
		}
		$data = array(
			'title' => 'Official Website - Samsat Dumai Kota',
			'getallberita' => $this->model_samsat_berita->getAllbyKantor(10),
			'lastvideo' => $lastvideo,
			'judulvideo' => $judulvideo,
		);
		$this->load->view('dumai/header', $data);
		$this->load->view('dumai/halamanutama', $data);
	}

	public function semuaberita()
	{
		//style bootstrap untuk pagination
		$config['first_link']       = 'Awal';
		$config['last_link']        = 'Akhir';
		$config['next_link']        = 'Selanjutnya';
		$config['prev_link']        = 'Sebelumnya';

		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item" style="color:#34AD54;"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';

		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link" style="background:#34AD54; border: 1px solid #34AD54">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';

		$config['next_tag_open']    = '<li class="page-item" style="color:#34AD54;"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';

		$config['prev_tag_open']    = '<li class="page-item" style="color:#34AD54;"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';

		$config['first_tag_open']   = '<li class="page-item" style="color:#34AD54;"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';

		$config['last_tag_open']    = '<li class="page-item" style="color:#34AD54;"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$kantor_id = 10;
		$config['base_url'] = base_url('dumai/semuaberita');
		$config['total_rows'] = $this->db->query("SELECT * FROM samsat_berita WHERE kantor_id ='$kantor_id'")->num_rows();
		$config['per_page'] = 5;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = 3;

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data = array(
			'title' => 'Berita - Samsat Dumai Kota',
			'getallberita' => $this->model_samsat_berita->getAllbyKantor($kantor_id),
			'page' => $page,
			'data' => $this->model_samsat_berita->getSemuaBerita($kantor_id, $config["per_page"], $page),
			'pagination' => $this->pagination->create_links(),
		);
		$this->load->view('dumai/header', $data);
		$this->load->view('dumai/semuaberita', $data);
	}

	public function detailberita()
	{
		$link = $this->uri->segment(3);
		$getberitabylink = $this->model_samsat_berita->getBeritabyLink($link);
		if ($getberitabylink->num_rows() > 0) {
			$data = array(
				'title' => $getberitabylink->row()->judul . ' - Samsat Dumai Kota',
				'getberitabylink' => $getberitabylink->row(),
				'getallberita' => $this->model_samsat_berita->getAllbyKantor(10),
			);
			$this->load->view('dumai/header', $data);
			$this->load->view('dumai/detailberita', $data);
		} else {
			echo "<script>window.alert('Anda mengakses URL yang salah');
						window.location=('" . base_url('/dumai') . "')</script>";
		}
	}

	public function semuavideo()
	{
		//style bootstrap untuk pagination
		$config['first_link']       = 'Awal';
		$config['last_link']        = 'Akhir';
		$config['next_link']        = 'Selanjutnya';
		$config['prev_link']        = 'Sebelumnya';

		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item" style="color:#34AD54;"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';

		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link" style="background:#34AD54; border: 1px solid #34AD54">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';

		$config['next_tag_open']    = '<li class="page-item" style="color:#34AD54;"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';

		$config['prev_tag_open']    = '<li class="page-item" style="color:#34AD54;"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';

		$config['first_tag_open']   = '<li class="page-item" style="color:#34AD54;"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';

		$config['last_tag_open']    = '<li class="page-item" style="color:#34AD54;"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';


		$kantor_id = 10;
		$config['base_url'] = base_url('dumai/semuavideo');
		// $config['total_rows'] = $this->db->count_all('samsat_berita');
		$config['total_rows'] = $this->db->query("SELECT * FROM samsat_video WHERE kantor_id ='$kantor_id'")->num_rows();

		$config['per_page'] = 8;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = 3;

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data = array(
			'title' => 'Video - Samsat Pekanbaru Kota',
			'getallberita' => $this->model_samsat_berita->getAllbyKantor($kantor_id),
			'page' => $page,
			'data' => $this->model_samsat_video->getSemuaVideo($kantor_id, $config["per_page"], $page),
			'pagination' => $this->pagination->create_links(),
		);
		$this->load->view('dumai/header', $data);
		$this->load->view('dumai/semuavideo', $data);
	}

	public function strukturorganisasi()
	{
		$data = array(
			'title' => 'Struktur Organisasi - Samsat Dumai Kota',
			'getallberita' => $this->model_samsat_berita->getAllbyKantor(10),
		);
		$this->load->view('dumai/header', $data);
		$this->load->view('dumai/strukturorganisasi', $data);
	}

	public function visimisi()
	{
		$data = array(
			'title' => 'Visi dan Misi - Samsat Pekanbaru Kota',
			'getallberita' => $this->model_samsat_berita->getAllbyKantor(10),
		);
		$this->load->view('dumai/header', $data);
		$this->load->view('dumai/visimisi', $data);
	}

	public function datasurvei()
	{
		$arr_datapendidikan = [];
		$datapendidikan =  $this->model_samsat_survei->getDSPendidikan(10)->result();
		foreach ($datapendidikan as $data) {
			$arr_datapendidikan['pendidikan'][] = $data->pendidikan;
			$arr_datapendidikan['jumlah'][] = (int) $data->jumlah;
		}
		$arr_datajeniskelamin = [];
		$datajeniskelamin =  $this->model_samsat_survei->getDSKelamin(10)->result();
		foreach ($datajeniskelamin as $data) {
			if ($data->jenis_kelamin == 'L') {
				$arr_datajeniskelamin['jenis_kelamin'][] = 'Laki - Laki';
				$arr_datajeniskelamin['jumlah'][] = (int) $data->jumlah;
			} else if ($data->jenis_kelamin == 'P') {
				$arr_datajeniskelamin['jenis_kelamin'][] = 'Perempuan';
				$arr_datajeniskelamin['jumlah'][] = (int) $data->jumlah;
			} else {
				$arr_datajeniskelamin['jenis_kelamin'][] = 'Tidak Diketahui';
				$arr_datajeniskelamin['jumlah'][] = (int) $data->jumlah;
			}
		}
		$tahunsekarang = date('Y');
		$data = array(
			'title' => 'Data Survei - Samsat Dumai Kota',
			'getallberita' => $this->model_samsat_berita->getAllbyKantor(10),
			'datapendidikan' => json_encode($arr_datapendidikan),
			'datajeniskelamin' => json_encode($arr_datajeniskelamin),
		);
		$this->load->view('dumai/header', $data);
		$this->load->view('dumai/nilaisurvei', $data);
	}

	// public function unit()
	// {
	// 	$link5 = $this->uri->segment(3);
	// 	if ($link5 == '') {
	// 		echo "<script>window.location=('" . base_url('dumai') . "')</script>";
	// 	} else {
	// 		if ($link5 == 'samsattanjak') {
	// 			$unit = 'Samsat Tanjak (Khusus Pengesahan Tahunan) ';
	// 		} else if ($link5 == 'mpp') {
	// 			$unit = 'Mall Pelayanan Publik';
	// 		} else {
	// 			echo "<script>window.location=('" . base_url('dumai') . "')</script>";
	// 		}
	// 		$data = array(
	// 			'title' => 'Unit Pelayanan ' . $unit . ' - Samsat Pekanbaru Kota',
	// 			'getallberita' => $this->model_samsat_berita->getAllbyKantor(1),
	// 			'unit' => $unit,
	// 			'unit_link' => $link5,
	// 		);
	// 		$this->load->view('dumai/header', $data);
	// 		$this->load->view('dumai/unit', $data);
	// 	}
	// }

	public function faq()
	{
		$link = $this->uri->segment(3);
		if ($link == '') {
			$data = array(
				'title' => 'FAQ - Samsat Dumai Kota',
				'getallfaq' => $this->model_samsat_faq->getAllFAQ(),
				'getallberita' => $this->model_samsat_berita->getAllbyKantor(10),
			);
			$this->load->view('dumai/header', $data);
			$this->load->view('dumai/faq', $data);
		} else {
			$data = array(
				'title' => 'Detail FAQ - Samsat Pekanbaru Kota',
				'getfaq' => $this->model_samsat_faq->getFAQ($link),
				'getdetailfaq' => $this->model_samsat_faq->getDetailFAQ($link),
				'getallberita' => $this->model_samsat_berita->getAllbyKantor(10),
			);
			$this->load->view('dumai/header', $data);
			$this->load->view('dumai/faqdetail', $data);
		}
	}

	// public function unitkerja()
	// {
	// 	$nama_uptup = $this->uri->segment(3);
	// 	$submenu = $this->uri->segment(4);
	// 	if ($nama_uptup == 'pekanbarukota') {
	// 		if ($submenu == 'survei') {
	// 			$data = array(
	// 				'title' => 'Survei - Samsat Pekanbaru Kota',
	// 			);
	// 			$this->load->view('websamsat/header', $data);
	// 			$this->load->view('websamsat/survei', $data);
	// 		} elseif ($submenu == 'detailberita') {
	// 			$link5 = $this->uri->segment(5);
	// 			$getberitabylink = $this->model_samsat_berita->getBeritabyLink($link5);
	// 			if ($getberitabylink->num_rows() > 0) {
	// 				$data = array(
	// 					'title' => $getberitabylink->row()->judul . ' - Samsat Pekanbaru Kota',
	// 					'getberitabylink' => $getberitabylink->row(),
	// 				);
	// 				$this->load->view('websamsat/header', $data);
	// 				$this->load->view('websamsat/detailberita', $data);
	// 			} else {
	// 				echo "<script>window.alert('Anda mengakses URL yang salah');
	// 					window.location=('" . base_url('page/unitkerja/pekanbarukota') . "')</script>";
	// 			}
	// 		} elseif ($submenu == 'pengaduan') {
	// 			$data = array(
	// 				'title' => 'Pengaduan - Samsat Pekanbaru Kota',
	// 			);
	// 			$this->load->view('websamsat/header', $data);
	// 			$this->load->view('websamsat/pengaduan', $data);
	// 		} elseif ($submenu == 'faq') {
	// 			$link5 = $this->uri->segment(5);
	// 			if ($link5 == '') {
	// 				$data = array(
	// 					'title' => 'FAQ - Samsat Pekanbaru Kota',
	// 					'getallfaq' => $this->model_samsat_faq->getAllFAQ(),
	// 				);
	// 				$this->load->view('websamsat/header', $data);
	// 				$this->load->view('websamsat/faq', $data);
	// 			} else {
	// 				$data = array(
	// 					'title' => 'Detail FAQ - Samsat Pekanbaru Kota',
	// 					'getfaq' => $this->model_samsat_faq->getFAQ($link5),
	// 					'getdetailfaq' => $this->model_samsat_faq->getDetailFAQ($link5),
	// 				);
	// 				$this->load->view('websamsat/header', $data);
	// 				$this->load->view('websamsat/faqdetail', $data);
	// 			}
	// 		} elseif ($submenu == 'realtimependapatan') {
	// 			$data = array(
	// 				'title' => 'Realtime Pendapatan - Samsat Pekanbaru Kota',
	// 			);
	// 			$this->load->view('websamsat/header', $data);
	// 			$this->load->view('websamsat/realtimependapatan', $data);
	// 		} else {
	// 			$ambilvideo = $this->model_samsat_video->getLastVideo(1);
	// 			if ($ambilvideo->num_rows() > 0) {
	// 				$lastvideo = $ambilvideo->row()->url;
	// 			} else {
	// 				$lastvideo = 'https://www.youtube.com/embed/6sUVviNpC7E';
	// 			}
	// 			$data = array(
	// 				'title' => 'Official Website - Samsat Pekanbaru Kota',
	// 				'getallberita' => $this->model_samsat_berita->getAllbyKantor(1),
	// 				'lastvideo' => $lastvideo,
	// 			);
	// 			$this->load->view('websamsat/header', $data);
	// 			$this->load->view('websamsat/halamanutama', $data);
	// 		}
	// 	} else {
	// 		redirect(base_url('page/unitkerja/pekanbarukota'));
	// 	}
	// }

	// public function simpan_survei()
	// {
	// 	$tanggal = date("Y-m-d h:i:s");
	// 	$data = array(
	// 		'no_hp' => $this->input->post('hp'),
	// 		'email' => $this->input->post('email'),
	// 		'alamat' => $this->input->post('alamat'),
	// 		'usia' => $this->input->post('usia'),
	// 		'jenis_kelamin' => $this->input->post('jk'),
	// 		'pendidikan' => $this->input->post('pendidikan'),
	// 		'pekerjaan' => $this->input->post('pekerjaan'),
	// 		'sumber_info' => $this->input->post('sumber'),
	// 		'kantor_pelayanan' => 1,
	// 		'tanya1' => $this->input->post('t1'),
	// 		'tanya2' => $this->input->post('t2'),
	// 		'tanya3' => $this->input->post('t3'),
	// 		'tanya4' => $this->input->post('t4'),
	// 		'tanya5' => $this->input->post('t5'),
	// 		'tanya6' => $this->input->post('t6'),
	// 		'tanya7' => $this->input->post('t7'),
	// 		'tanya8' => $this->input->post('t8'),
	// 		'tanya9' => $this->input->post('t9'),
	// 		'tanya21' => $this->input->post('t21'),
	// 		'tanya22' => $this->input->post('t22'),
	// 		'tanya23' => $this->input->post('t23'),
	// 		'tanya24' => $this->input->post('t24'),
	// 		'tanya25' => $this->input->post('t25'),
	// 		'layanan_diterima' => "Pajak Tahunan",
	// 		'created_date' => $tanggal,
	// 		'app' => 'websitesamsatpekanbarukota',
	// 	);

	// 	$insert = $this->model_samsat_survei->simpan_survei($data);
	// 	if ($insert == 1) {
	// 		echo "<script>window.alert('Data berhasil tersimpan. Terima kasih telah mengisi data survei');
	// 			window.location=('" . base_url('page/unitkerja/pekanbarukota#footer') . "')</script>";
	// 	} else {
	// 		echo "<script>window.alert('Maaf, Proses Penyimpanan Gagal, Silahkan Periksa Kembali!');
	// 			window.location=('" . base_url('page/unitkerja/pekanbarukota#footer') . "')</script>";
	// 	}
	// }

	// public function realtime_penerimaan()
	// {
	// 	// $uptup = $this->input->post('uptup');
	// 	$uptup = 1;
	// 	$tanggal_awal = date('Y') . '-01-01';
	// 	$tanggal_akhir = date('Y-m-d');
	// 	if ($uptup == '') {
	// 		$data = array(
	// 			'success' => false,
	// 			'message' => 'Terjadi kesalahan',
	// 			'data' => '',
	// 		);
	// 	} else {
	// 		$data_realtime = $this->model_samsat_realtime->data_realtime($uptup, $tanggal_awal, $tanggal_akhir);
	// 		if ($data_realtime->num_rows() > 0) {
	// 			$data = array(
	// 				'success' => true,
	// 				'message' => 'Data ditemukan',
	// 				'data' => $data_realtime->row(),
	// 			);
	// 		} else {
	// 			$data = array(
	// 				'success' => false,
	// 				'message' => 'Data tidak ditemukan',
	// 				'data' => '',
	// 			);
	// 		}
	// 	}

	// 	echo json_encode($data);
	// }
}
