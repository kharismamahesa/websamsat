<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ((!isset($this->session->userdata['wab_kode_wartawan'])) and ($this->session->userdata['wab_app']) != 'webadmin_bapenda') {
			redirect(base_url("auth"));
		}
		$this->load->model('Model_Berita', 'model_berita');
		$this->load->model('Model_User', 'model_user');
		$this->load->model('Model_KategoriFAQ', 'model_kategorifaq');
		$this->load->model('Model_FAQ', 'model_faq');
		$this->load->model('Model_UPTUP', 'model_uptup');
		$this->load->model('Model_Survei', 'model_survei');

		$kode_wartawan = $this->session->userdata['wab_kode_wartawan'];
		$getuserbyid = $this->model_user->getUserbyKode($kode_wartawan);
		if ($getuserbyid->num_rows() > 0) {
			$this->kode_wartawan = $getuserbyid->row()->kode_wartawan;
			$this->status = $getuserbyid->row()->status;
		} else {
			redirect(base_url("auth"));
		}
	}

	public function index()
	{
		$data = array(
			'judul' => 'Dashboard'
		);
		$this->load->view('template/header', $data);
		$this->load->view('dashboard', $data);
	}

	// BERITA

	public function listberita()
	{
		$data = array(
			'judul' => 'List Berita',
		);
		$this->load->view('template/header', $data);
		$this->load->view('listberita', $data);
	}

	public function listberita_data()
	{
		$list = $this->model_berita->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datanya) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $datanya->judul_berita;
			$row[] = $datanya->counter;
			$row[] = $datanya->nama;
			$row[] = $datanya->tanggal;
			$row[] = "
				<button class='btn btn-circle btn-danger' onclick='hapus_data(" . $datanya->id_berita . ")'  type='button'><i class='fa fa-fw fa-trash'></i></button>
			";
			// <a class='btn btn-circle btn-primary' target='_blank' href='" . base_url('dashboard/lihatberita?id=') . $datanya->id_berita  . "'><i class='fa fa-fw fa-eye'></i></a>
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->model_berita->count_all(),
			"recordsFiltered" => $this->model_berita->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function tambahberita()
	{
		$data = array(
			'judul' => 'Tambah Berita',
		);
		$this->load->view('template/header', $data);
		$this->load->view('tambahberita', $data);
	}

	public function saveberita()
	{
		$judul = $this->input->post('judul');
		// $kategori = $this->input->post('kategori');
		$isi = $this->input->post('isi');
		$updated_by = $this->session->userdata['wab_kode_wartawan'];
		$updated_date = date('Y-m-d');
		$updated_time = date('H:i:s');

		$judul_x = preg_replace("/[^a-zA-Z0-9]/", "", $judul);
		$judul_xx = substr($judul_x, 0, 50);
		$file_name = str_replace(' ', '', $judul_xx . '-' . bin2hex(random_bytes(10)) . '-gambarweb');
		$config['upload_path'] = FCPATH . 'upload/gambarweb/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name'] = $file_name;
		$config['max_size'] = 2048;

		if (($judul == '') || ($isi == '')) {
			$sts = false;
			$msg = 'Lengkapi data terlebih dahulu';
		} else {
			if (strlen($judul) > 80) {
				$sts = false;
				$msg = 'Judul tidak boleh lebih dari 80 karakter';
			} else {
				if (isset($_FILES['cover']['name'])) {
					if (0 < $_FILES['cover']['error']) {
						$sts = false;
						$msg = $_FILES['cover']['error'];
					} else {
						$this->load->library('upload', $config);
						if (!$this->upload->do_upload('cover')) {
							$sts = false;
							$pesannya = strip_tags($this->upload->display_errors());
							if (strpos($pesannya, 'size') !== false) {
								$msg = 'Ukuran gambar melebihi 2 mb';
							} else if (strpos($pesannya, 'filetype') !== false) {
								$msg = 'Tipe gambar hanya boleh .png / .jpg / .jpeg';
							} else {
								$msg = strip_tags($this->upload->display_errors());
							}
						} else {
							$gambar = $this->upload->data("file_name");
							$judul_berita = $judul;
							$id_kategori = 4;
							$status = 'HEADLINE';
							$simpan = $this->model_berita->simpanBerita($id_kategori, $judul_berita, $isi, $gambar, $updated_date, $updated_time, $updated_by, $status);
							if ($simpan) {
								$sts = true;
								$msg = 'Berita berhasil disimpan';
							} else {
								$sts = false;
								$msg = 'Berita gagal disimpan';
							}
						}
					}
				} else {
					$sts = false;
					$msg = 'Pilih gambar terlebih dahulu';
				}
			}
		}

		$data = array(
			'success' => $sts,
			'messages' => $msg,
		);

		echo json_encode($data);
	}

	public function deleteberita()
	{
		$id_berita = $this->input->post('id');
		if ($id_berita == '') {
			$data = array(
				'success' => false,
				'messages' => 'Gagal menghapus berita [null]',
			);
		} else {
			$cekData = $this->model_berita->ambilBerita($id_berita);
			if ($cekData->num_rows() > 0) {
				$dataNya = $cekData->row();
				$gambar = $dataNya->gambar;
				$hapusgambarlama = unlink('upload/gambarweb/' . $gambar);
				// if ($hapusgambarlama) {
				$hapusdata = $this->model_berita->hapusBerita($id_berita);
				if ($hapusdata) {
					$data = array(
						'success' => true,
						'messages' => 'Berita Berhasil di hapus',
					);
				} else {
					$data = array(
						'success' => false,
						'messages' => 'Gagal menghapus berita [2]',
					);
				}
				// } else {
				// 	$data = array(
				// 		'success' => false,
				// 		'messages' => 'Gagal menghapus data [1]',
				// 	);
				// }
			} else {
				$data = array(
					'success' => false,
					'messages' => 'Gagal menghapus berita [0]',
				);
			}
		};
		echo json_encode($data);
	}

	// FAQ

	public function faq()
	{
		if ($this->status == 1) {
			$data = array(
				'judul' => 'FAQ',
				'getallkategorifaq' => $this->model_kategorifaq->getAll(),
			);
			$this->load->view('template/header', $data);
			$this->load->view('faq', $data);
		} else {
			echo "<script> 
				alert('Anda dilarang mengakses halaman ini'); 
				window.location.href='" . base_url() . "'; 
			</script>";
		}
	}

	public function faq_data()
	{
		if ($this->status == 1) {
			$list = $this->model_faq->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $datanya) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $datanya->judul;
				$row[] = $datanya->informasi;
				$row[] = $datanya->nama_kategori;
				$row[] = "
					<button class='btn btn-circle btn-info' onclick='ubah_data(" . $datanya->kode_helpdesk . ")'  type='button'><i class='fa fa-fw fa-edit'></i></button>
					<button class='btn btn-circle btn-danger' onclick='hapus_data(" . $datanya->kode_helpdesk . ")'  type='button'><i class='fa fa-fw fa-trash'></i></button>
				";
				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->model_faq->count_all(),
				"recordsFiltered" => $this->model_faq->count_filtered(),
				"data" => $data,
			);
			echo json_encode($output);
		} else {
			echo "<script> 
				alert('Anda dilarang mengakses halaman ini'); 
				window.location.href='" . base_url() . "'; 
			</script>";
		}
	}

	public function savefaq()
	{
		$id_kategori = $this->input->post('id_kategori');
		$judul = $this->input->post('judul');
		$informasi = $this->input->post('informasi');
		$tanggal = date('Y-m-d H:i:s');

		if ($this->status == 1) {
			if (($id_kategori == '') || ($judul == '') || ($informasi == '') || ($tanggal == '')) {
				$sts = false;
				$msg = 'Lengkapi data terlebih dahulu';
			} else {
				$simpan = $this->model_faq->simpanFAQ($judul, $informasi, $id_kategori, $tanggal);
				if ($simpan) {
					$sts = true;
					$msg = 'Berita berhasil disimpan';
				} else {
					$sts = false;
					$msg = 'Berita gagal disimpan';
				}
			}
		} else {
			$sts = false;
			$msg = 'Access denied!';
		}

		$data = array(
			'success' => $sts,
			'messages' => $msg,
		);

		echo json_encode($data);
	}

	public function deletefaq()
	{
		$kode_helpdesk = $this->input->post('id');
		if ($this->status == 1) {
			if ($kode_helpdesk == '') {
				$data = array(
					'success' => false,
					'messages' => 'Gagal menghapus data [null]',
				);
			} else {
				$hapusdata = $this->model_faq->hapusFAQ($kode_helpdesk);
				if ($hapusdata) {
					$data = array(
						'success' => true,
						'messages' => 'Data berhasil di hapus',
					);
				} else {
					$data = array(
						'success' => false,
						'messages' => 'Gagal menghapus data [2]',
					);
				}
			};
		} else {
			$data = array(
				'success' => false,
				'messages' => 'Access denied!',
			);
		}
		echo json_encode($data);
	}

	public function getfaq()
	{
		$kode_helpdesk = trim($this->input->post('id'));
		if ($this->status == 1) {
			$data = $this->model_faq->ambilFAQ($kode_helpdesk)->row();
		} else {
			$data = "Access denied!";
		}
		echo json_encode($data);
	}

	public function updatefaq()
	{
		$kode_helpdesk = $this->input->post('kode_helpdesk');
		$id_kategori = $this->input->post('id_kategori');
		$judul = $this->input->post('judul');
		$informasi = $this->input->post('informasi');

		if ($this->status == 1) {
			if ($kode_helpdesk == '') {
				$sts = false;
				$msg = 'Gagal mengubah data [null]';
			} else if (($id_kategori == '') || ($judul == '') || ($informasi == '')) {
				$sts = false;
				$msg = 'Lengkapi data terlebih dahulu';
			} else {
				$ubah = $this->model_faq->ubahFAQ($kode_helpdesk, $id_kategori, $judul, $informasi);
				if ($ubah) {
					$sts = true;
					$msg = 'Data berhasil diubah';
				} else {
					$sts = false;
					$msg = 'Data gagal diubah';
				}
			}
		} else {
			$sts = false;
			$msg = 'Access denied!';
		}

		$data = array(
			'success' => $sts,
			'messages' => $msg,
		);

		echo json_encode($data);
	}

	// KATEGORI FAQ

	public function kategorifaq()
	{
		if ($this->status == 1) {
			$data = array(
				'judul' => 'Kategori FAQ',
			);
			$this->load->view('template/header', $data);
			$this->load->view('kategorifaq', $data);
		} else {
			echo "<script> 
				alert('Anda dilarang mengakses halaman ini'); 
				window.location.href='" . base_url() . "'; 
			</script>";
		}
	}

	public function kategorifaq_data()
	{
		if ($this->status == 1) {
			$list = $this->model_kategorifaq->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $datanya) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $datanya->nama_kategori;
				$row[] = $datanya->keterangan;
				$row[] = "
				<button class='btn btn-circle btn-info' onclick='ubah_data(" . $datanya->id_kategori . ")'  type='button'><i class='fa fa-fw fa-edit'></i></button>
				<button class='btn btn-circle btn-danger' onclick='hapus_data(" . $datanya->id_kategori . ")'  type='button'><i class='fa fa-fw fa-trash'></i></button>
			";
				$data[] = $row;
			}

			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->model_kategorifaq->count_all(),
				"recordsFiltered" => $this->model_kategorifaq->count_filtered(),
				"data" => $data,
			);
			echo json_encode($output);
		} else {
			echo "<script> 
				alert('Anda dilarang mengakses halaman ini'); 
				window.location.href='" . base_url() . "'; 
			</script>";
		}
	}

	public function savekategorifaq()
	{
		$nama_kategori = $this->input->post('nama_kategori');
		$keterangan = $this->input->post('keterangan');
		if ($this->status == 1) {
			if (($nama_kategori == '') || ($keterangan == '')) {
				$sts = false;
				$msg = 'Lengkapi data terlebih dahulu';
			} else {
				$simpan = $this->model_kategorifaq->simpanKategoriFAQ($nama_kategori, $keterangan);
				if ($simpan) {
					$sts = true;
					$msg = 'Berita berhasil disimpan';
				} else {
					$sts = false;
					$msg = 'Berita gagal disimpan';
				}
			}
		} else {
			$sts = false;
			$msg = 'Access denied!';
		}

		$data = array(
			'success' => $sts,
			'messages' => $msg,
		);

		echo json_encode($data);
	}

	public function deletekategorifaq()
	{
		$id_kategori = $this->input->post('id');
		if ($this->status == 1) {
			if ($id_kategori == '') {
				$data = array(
					'success' => false,
					'messages' => 'Gagal menghapus data [null]',
				);
			} else {
				$hapusdata = $this->model_kategorifaq->hapusKategoriFAQ($id_kategori);
				if ($hapusdata) {
					$data = array(
						'success' => true,
						'messages' => 'Berita Berhasil di hapus',
					);
				} else {
					$data = array(
						'success' => false,
						'messages' => 'Gagal menghapus berita [2]',
					);
				}
			};
		} else {
			$data = array(
				'success' => false,
				'messages' => 'Access denied!',
			);
		}
		echo json_encode($data);
	}

	public function getkategorifaq()
	{
		$id_kategori = trim($this->input->post('id'));
		if ($this->status == 1) {
			$data = $this->model_kategorifaq->ambilKategoriFAQ($id_kategori)->row();
		} else {
			$data = "Access denied!";
		}
		echo json_encode($data);
	}

	public function updatekategorifaq()
	{
		$id_kategori = $this->input->post('id_kategori');
		$nama_kategori = $this->input->post('nama_kategori');
		$keterangan = $this->input->post('keterangan');

		if ($this->status == 1) {
			if ($id_kategori == '') {
				$sts = false;
				$msg = 'Gagal mengubah data [null]';
			} else if (($nama_kategori == '') || ($keterangan == '')) {
				$sts = false;
				$msg = 'Lengkapi data terlebih dahulu';
			} else {
				$ubah = $this->model_kategorifaq->ubahKategoriFAQ($id_kategori, $nama_kategori, $keterangan);
				if ($ubah) {
					$sts = true;
					$msg = 'Data berhasil diubah';
				} else {
					$sts = false;
					$msg = 'Data gagal diubah';
				}
			}
		} else {
			$data = array(
				'success' => false,
				'messages' => 'Access denied!',
			);
		}

		$data = array(
			'success' => $sts,
			'messages' => $msg,
		);

		echo json_encode($data);
	}

	// SURVEI
	public function indekssurvei()
	{
		if (($this->status == 1) || ($this->status == 2)) {
			$data = array(
				'judul' => 'Indeks Survei',
				'getalluptup' => $this->model_uptup->getAllData()
			);
			$this->load->view('template/header', $data);
			$this->load->view('indekssurvei', $data);
		} else {
			echo "<script> 
			alert('Anda dilarang mengakses halaman ini'); 
			window.location.href='" . base_url() . "'; 
			</script>";
		}
	}
	public function rekapsurvei()
	{
		if (($this->status == 1) || ($this->status == 2)) {
			$data = array(
				'judul' => 'Rekapitulasi Survei',
				'getalluptup' => $this->model_uptup->getAllData()
			);
			$this->load->view('template/header', $data);
			$this->load->view('rekapsurvei', $data);
		} else {
			echo "<script> 
				alert('Anda dilarang mengakses halaman ini'); 
				window.location.href='" . base_url() . "'; 
			</script>";
		}
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url("auth"));
	}
}
