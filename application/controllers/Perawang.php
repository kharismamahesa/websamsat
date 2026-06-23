<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perawang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Model_Samsat_Berita', 'model_samsat_berita');
		$this->load->model('Model_Samsat_Galeri', 'model_samsat_galeri');
		$this->load->library('Lib_func', 'lib_func');
		$this->load->library('pagination');
	}

	public function index()
	{
		$kantor_id = 3991;
		$data = array(
			'title' => 'Official Website - Samsat Perawang',
			'getallberita' => $this->model_samsat_berita->getAllbyKantor($kantor_id),
			'getallgaleri' => $this->model_samsat_galeri->getSemuaGaleri($kantor_id, 4, 0),
		);
		$this->load->view('perawang/header', $data);
		$this->load->view('perawang/halamanutama', $data);
	}

	public function semuaberita()
	{
		$kantor_id = 3991;

		//style bootstrap untuk pagination
		$config['first_link']       = 'Awal';
		$config['last_link']        = 'Akhir';
		$config['next_link']        = 'Selanjutnya';
		$config['prev_link']        = 'Sebelumnya';

		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';

		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link bg-primary border-primary text-white">';
		$config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';

		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';

		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span></li>';

		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';

		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$config['base_url'] = base_url('perawang/semuaberita');
		$config['total_rows'] = $this->db->query("SELECT * FROM samsat_berita WHERE kantor_id ='$kantor_id'")->num_rows();
		$config['per_page'] = 6;
		$config["uri_segment"] = 3;
		$config["num_links"] = 3;

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data = array(
			'title' => 'Berita - Samsat Perawang',
			'getallberita' => $this->model_samsat_berita->getAllbyKantor($kantor_id),
			'page' => $page,
			'data' => $this->model_samsat_berita->getSemuaBerita($kantor_id, $config["per_page"], $page),
			'pagination' => $this->pagination->create_links(),
		);
		$this->load->view('perawang/header', $data);
		$this->load->view('perawang/semuaberita', $data);
	}

	public function semuagaleri()
	{
		$kantor_id = 3991;

		$config['first_link']       = 'Awal';
		$config['last_link']        = 'Akhir';
		$config['next_link']        = 'Selanjutnya';
		$config['prev_link']        = 'Sebelumnya';

		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';

		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link bg-primary border-primary text-white">';
		$config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';

		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';

		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span></li>';

		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';

		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$config['base_url'] = base_url('perawang/semuagaleri');

		$this->db->select('samsat_galeri.id');
		$this->db->from('samsat_galeri');
		$this->db->where('samsat_galeri.kantor_id', $kantor_id);
		$config['total_rows'] = $this->db->get()->num_rows();

		$config['per_page'] = 8;
		$config["uri_segment"] = 3;
		$config["num_links"] = 3;

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data = array(
			'title' => 'Galeri - Samsat Perawang',
			'page' => $page,
			'data' => $this->model_samsat_galeri->getSemuaGaleri($kantor_id, $config["per_page"], $page),
			'pagination' => $this->pagination->create_links(),
		);
		$this->load->view('perawang/header', $data);
		$this->load->view('perawang/semuagaleri', $data);
	}

	public function visimisi()
	{
		$data = array(
			'title' => 'Visi & Misi - Samsat Perawang',
		);
		$this->load->view('perawang/header', $data);
		$this->load->view('perawang/visimisi', $data);
	}

	public function detailberita()
	{
		$kantor_id = 3991;
		$link = $this->uri->segment(3);
		$getberitabylink = $this->model_samsat_berita->getBeritabyLink($link);
		if ($getberitabylink->num_rows() > 0) {
			$data = array(
				'title' => $getberitabylink->row()->judul . ' - Samsat Perawang',
				'getberitabylink' => $getberitabylink->row(),
				'getallberita' => $this->model_samsat_berita->getAllbyKantor($kantor_id),
			);
			$this->load->view('perawang/header', $data);
			$this->load->view('perawang/detailberita', $data);
		} else {
			echo "<script>window.alert('Anda mengakses URL yang salah');
			window.location=('" . base_url('perawang') . "')</script>";
		}
	}
}