<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Samsat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!isset($this->session->userdata['websamsat_id'])) {
			redirect(base_url("login"));
		}
		$this->load->model('Model_Samsat_User', 'model_samsat_user');
		$this->load->model('Model_Samsat_Berita', 'model_samsat_berita');
		$this->load->model('Model_Samsat_Video', 'model_samsat_video');
		$this->load->model('Model_Samsat_Realtime', 'model_samsat_realtime');
		$this->load->model('Model_Samsat_UnitKerja', 'model_samsat_unitkerja');
		$this->load->model('Model_Samsat_Galeri', 'model_samsat_galeri');

		// $this->load->model('Model_FAQ', 'model_faq');
		// $this->load->model('Model_UPTUP', 'model_uptup');
		// $this->load->model('Model_Survei', 'model_survei');

		$id_user = $this->session->userdata['websamsat_id'];
		$getuserbyid = $this->model_samsat_user->getUserbyKode($id_user);
		if ($getuserbyid->num_rows() > 0) {
			$this->id = $getuserbyid->row()->id;
			$this->level = $getuserbyid->row()->level;
			$this->is_active = $getuserbyid->row()->is_active;
			$this->kantor_id = $getuserbyid->row()->id_uptup;
		} else {
			redirect(base_url("login"));
		}
	}

	public function index()
	{
		$data = array(
			'judul' => 'Dashboard'
		);
		$this->load->view('websamsat/header', $data);
		$this->load->view('websamsat/dashboard', $data);
	}

	// GALERI
	public function galeri()
	{
		$data = array(
			'judul' => 'Galeri',
		);
		$this->load->view('websamsat/header', $data);
		$this->load->view('websamsat/galeri', $data);
	}

	public function galeri_data()
	{
		$list = $this->model_samsat_galeri->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datanya) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $datanya->keterangan;
			$row[] = '';
			$row[] = "
				<button class='btn btn-circle btn-success' onclick='tambah_foto(" . $datanya->id . ")'  type='button'><i class='fa fa-fw fa-images'></i></button>
				<button class='btn btn-circle btn-info' onclick='ubah_data(" . $datanya->id . ")'  type='button'><i class='fa fa-fw fa-edit'></i></button>
				<button class='btn btn-circle btn-danger' onclick='hapus_data(" . $datanya->id . ")'  type='button'><i class='fa fa-fw fa-trash'></i></button>
			";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->model_samsat_galeri->count_all(),
			"recordsFiltered" => $this->model_samsat_galeri->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function savegaleri()
	{
		$keterangan = $this->input->post('keterangan');
		$created_by = $this->id;
		$kantor_id = $this->kantor_id;
		$created_datetime = date('Y-m-d H:i:s');

		if ($keterangan == '') {
			$sts = false;
			$msg = 'Isi keterangan terlebih dahulu!';
		} else {
			$data = array(
				'keterangan' => $keterangan,
				'kantor_id' => $kantor_id,
				'created_datetime' => $created_datetime,
				'created_by' => $created_by,
			);
			$simpan = $this->model_samsat_galeri->save($data);
			if ($simpan) {
				$sts = true;
				$msg = 'Data berhasil disimpan';
			} else {
				$sts = false;
				$msg = 'Data gagal disimpan';
			}
		}

		$data = array(
			'success' => $sts,
			'messages' => $msg,
		);

		echo json_encode($data);
	}

	// UNIT KERJA
	public function unitkerja()
	{
		$data = array(
			'judul' => 'List Unit Kerja',
		);
		$this->load->view('websamsat/header', $data);
		$this->load->view('websamsat/unitkerja', $data);
	}

	public function unitkerja_data()
	{
		$list = $this->model_samsat_unitkerja->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datanya) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $datanya->unit;
			$row[] = $datanya->link_unit;
			$row[] = $datanya->deskripsi;
			$row[] = "<iframe src='" . $datanya->maps . "' width='300' height='200' frameborder='0' style='border:0;' allowfullscreen='' aria-hidden='false' tabindex='0'></iframe>";
			$row[] = "
				<button class='btn btn-circle btn-info' onclick='ubah_data(" . $datanya->id . ")'  type='button'><i class='fa fa-fw fa-edit'></i></button>
				<button class='btn btn-circle btn-danger' onclick='hapus_data(" . $datanya->id . ")'  type='button'><i class='fa fa-fw fa-trash'></i></button>
			";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->model_samsat_unitkerja->count_all(),
			"recordsFiltered" => $this->model_samsat_unitkerja->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function saveunitkerja()
	{
		$unit = $this->input->post('unit');
		$deskripsi = $this->input->post('deskripsi');
		$maps = $this->input->post('maps');
		$created_by = $this->id;
		$kantor_id = $this->kantor_id;
		$created_datetime = date('Y-m-d H:i:s');

		if (($unit == '') || ($deskripsi == '') || ($maps == '')) {
			$sts = false;
			$msg = 'Lengkapi data terlebih dahulu!';
		} else {
			$cekdata = $this->model_samsat_unitkerja->getUnit($unit);
			if ($cekdata->num_rows() > 0) {
				$sts = false;
				$msg = 'Data dengan Nama Unit Kerja tersebut telah ada!';
			} else {
				$link_unit = strtolower(preg_replace("/[^a-zA-Z0-9]/", "_", $unit));
				$data = array(
					'unit' => $unit,
					'link_unit' => $link_unit,
					'deskripsi' => $deskripsi,
					'maps' => $maps,
					'kantor_id' => $kantor_id,
					'created_datetime' => $created_datetime,
					'created_by' => $created_by,
				);
				$simpan = $this->model_samsat_unitkerja->save($data);
				if ($simpan) {
					$sts = true;
					$msg = 'Data berhasil disimpan';
				} else {
					$sts = false;
					$msg = 'Data gagal disimpan';
				}
			}
		}

		$data = array(
			'success' => $sts,
			'messages' => $msg,
		);

		echo json_encode($data);
	}

	public function deleteunitkerja()
	{
		$id = $this->input->post('id');
		if ($id == '') {
			$data = array(
				'success' => false,
				'messages' => 'Gagal menghapus data [null]',
			);
		} else {
			$hapusdata = $this->model_samsat_unitkerja->delete($id);
			if ($hapusdata) {
				$data = array(
					'success' => true,
					'messages' => 'Data Berhasil di hapus',
				);
			} else {
				$data = array(
					'success' => false,
					'messages' => 'Gagal menghapus data',
				);
			}
		};
		echo json_encode($data);
	}

	public function getunitkerja()
	{
		$id = trim($this->input->post('id'));
		$data = $this->model_samsat_unitkerja->getID($id)->row();
		echo json_encode($data);
	}

	public function updateunitkerja()
	{
		$id = $this->input->post('id');
		$unit = $this->input->post('unit');
		$deskripsi = $this->input->post('deskripsi');
		$maps = $this->input->post('maps');

		if ($id == '') {
			$sts = false;
			$msg = 'Gagal mengubah data [null]';
		} else if (($unit == '') || ($deskripsi == '') || ($maps == '')) {
			$sts = false;
			$msg = 'Lengkapi data terlebih dahulu';
		} else {
			$cekdata = $this->model_samsat_unitkerja->getUnit($unit);
			if ($cekdata->num_rows() > 0) {
				$sts = false;
				$msg = 'Data dengan Nama Unit Kerja tersebut telah ada!';
			} else {
				$link_unit = strtolower(preg_replace("/[^a-zA-Z0-9]/", "_", $unit));
				$data = array(
					'unit' => $unit,
					'link_unit' => $link_unit,
					'deskripsi' => $deskripsi,
					'maps' => $maps,
				);
				$ubah = $this->model_samsat_unitkerja->update($id, $data);
				if ($ubah) {
					$sts = true;
					$msg = 'Data berhasil diubah';
				} else {
					$sts = false;
					$msg = 'Data gagal diubah';
				}
			}
		}
		$data = array(
			'success' => $sts,
			'messages' => $msg,
		);

		echo json_encode($data);
	}

	// REALTIME
	public function realtime()
	{
		$data = array(
			'judul' => 'List Data Realtime',
		);
		$this->load->view('websamsat/header', $data);
		$this->load->view('websamsat/realtime', $data);
	}

	public function realtime_data()
	{
		$list = $this->model_samsat_realtime->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datanya) {
			if ($datanya->kategori_unit == 1) {
				$kategori_unit = 'Samsat Keliling';
			} else if ($datanya->kategori_unit == 2) {
				$kategori_unit = 'Samsat Tanjak';
			} else if ($datanya->kategori_unit == 3) {
				$kategori_unit = 'Drive Thru';
			} else {
				$kategori_unit = 'Unknown';
			}

			if ($datanya->jenis_pajak == 1) {
				$jenis_pajak = 'PKB';
			} else if ($datanya->jenis_pajak == 2) {
				$jenis_pajak = 'BBNKB';
			} else {
				$jenis_pajak = 'Unknown';
			}

			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $datanya->tanggal;
			$row[] = number_format($datanya->unit, 0, ",", ".");
			$row[] = number_format($datanya->total, 0, ",", ".");
			$row[] = $kategori_unit;
			$row[] = "
				<button class='btn btn-circle btn-info' onclick='ubah_data(" . $datanya->id . ")'  type='button'><i class='fa fa-fw fa-edit'></i></button>
				<button class='btn btn-circle btn-danger' onclick='hapus_data(" . $datanya->id . ")'  type='button'><i class='fa fa-fw fa-trash'></i></button>
			";
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->model_samsat_realtime->count_all(),
			"recordsFiltered" => $this->model_samsat_realtime->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function deleterealtime()
	{
		$id = $this->input->post('id');
		if ($id == '') {
			$data = array(
				'success' => false,
				'messages' => 'Gagal menghapus data [null]',
			);
		} else {
			$hapusdata = $this->model_samsat_realtime->hapusRealtime($id);
			if ($hapusdata) {
				$data = array(
					'success' => true,
					'messages' => 'Data Berhasil di hapus',
				);
			} else {
				$data = array(
					'success' => false,
					'messages' => 'Gagal menghapus data',
				);
			}
		};
		echo json_encode($data);
	}

	public function saverealtime()
	{
		$tanggal = $this->input->post('tanggal');
		$unit = $this->input->post('unit');
		$total = $this->input->post('total');
		$kategori_unit = $this->input->post('kategori_unit');
		$created_by = $this->id;
		$kantor_id = $this->kantor_id;
		$created_datetime = date('Y-m-d H:i:s');

		if (($tanggal == '') || ($unit == '') || ($total == '') || ($kategori_unit == '')) {
			$sts = false;
			$msg = 'Lengkapi data terlebih dahulu!';
		} else {
			$cekdata = $this->model_samsat_realtime->ambilRealtime1($tanggal, $kategori_unit, $kantor_id);
			if ($cekdata->num_rows() > 0) {
				$sts = false;
				$msg = 'Data dengan tanggal, kategori unit dan jenis pajak tersebut telah ada!';
			} else {
				$data = array(
					'tanggal' => $tanggal,
					'unit' => $unit,
					'total' => $total,
					'kategori_unit' => $kategori_unit,
					'kantor_id' => $kantor_id,
					'created_datetime' => $created_datetime,
					'created_by' => $created_by,
				);
				$simpan = $this->model_samsat_realtime->simpanRealtime($data);
				if ($simpan) {
					$sts = true;
					$msg = 'Data berhasil disimpan';
				} else {
					$sts = false;
					$msg = 'Data gagal disimpan';
				}
			}
		}

		$data = array(
			'success' => $sts,
			'messages' => $msg,
		);

		echo json_encode($data);
	}

	public function getrealtime()
	{
		$id = trim($this->input->post('id'));
		$data = $this->model_samsat_realtime->ambilRealtime2($id)->row();
		echo json_encode($data);
	}

	public function updaterealtime()
	{
		$id = $this->input->post('id');
		$tanggal = $this->input->post('tanggal');
		$unit = $this->input->post('unit');
		$total = $this->input->post('total');
		$kategori_unit = $this->input->post('kategori_unit');

		if ($id == '') {
			$sts = false;
			$msg = 'Gagal mengubah data [null]';
		} else if (($tanggal == '') || ($total == '') || ($kategori_unit == '')) {
			$sts = false;
			$msg = 'Lengkapi data terlebih dahulu';
		} else {
			$data = array(
				'tanggal' => $tanggal,
				'unit' => $unit,
				'total' => $total,
				'kategori_unit' => $kategori_unit,
			);
			$ubah = $this->model_samsat_realtime->ubahRealtime($id, $data);
			if ($ubah) {
				$sts = true;
				$msg = 'Data berhasil diubah';
			} else {
				$sts = false;
				$msg = 'Data gagal diubah';
			}
		}
		$data = array(
			'success' => $sts,
			'messages' => $msg,
		);

		echo json_encode($data);
	}

	// BERITA
	public function listberita()
	{
		$data = array(
			'judul' => 'List Berita',
		);
		$this->load->view('websamsat/header', $data);
		$this->load->view('websamsat/listberita', $data);
	}

	public function listberita_data()
	{
		$list = $this->model_samsat_berita->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datanya) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $datanya->judul;
			$row[] = $datanya->link;
			$row[] = $datanya->author;
			$row[] = $datanya->created_date;
			$row[] = "
				<button class='btn btn-circle btn-danger' onclick='hapus_data(" . $datanya->id . ")'  type='button'><i class='fa fa-fw fa-trash'></i></button>
			";
			// <a class='btn btn-circle btn-primary' target='_blank' href='" . base_url('dashboard/lihatberita?id=') . $datanya->id_berita  . "'><i class='fa fa-fw fa-eye'></i></a>
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->model_samsat_berita->count_all(),
			"recordsFiltered" => $this->model_samsat_berita->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function tambahberita()
	{
		$data = array(
			'judul' => 'Tambah Berita',
		);
		$this->load->view('websamsat/header', $data);
		$this->load->view('websamsat/tambahberita', $data);
	}

	public function saveberita()
	{
		$judul = $this->input->post('judul');
		$author = $this->input->post('author');
		$x_berita = $this->input->post('berita');
		$berita = str_replace("'", "", $x_berita);
		$created_id = $this->id;
		$kantor_id = $this->kantor_id;
		$created_date = date('Y-m-d H:i:s');

		$judul_x = preg_replace("/[^a-zA-Z0-9]/", "", $judul);
		$link = strtolower(preg_replace("/[^a-zA-Z0-9]/", "_", $judul));
		$judul_xx = substr($judul_x, 0, 50);
		$file_name = str_replace(' ', '', $judul_xx . '-' . bin2hex(random_bytes(10)) . '-gambarsamsat');
		$config['upload_path'] = FCPATH . '../upload/images/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_name'] = $file_name;
		$config['max_size'] = 2048;

		if (($judul == '') || ($berita == '') || ($author == '')) {
			$sts = false;
			$msg = 'Lengkapi data terlebih dahulu!';
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
							$cover = $this->upload->data("file_name");
							$status = 1;
							$simpan = $this->model_samsat_berita->simpanBerita($judul, $link, $berita, $cover, $author, $created_date, $created_id, $kantor_id, $status);
							// $simpan = $this->model_samsat_berita->simpanBerita($judul, $link, $berita, $cover, $author, $status);
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
		$id = $this->input->post('id');
		if ($id == '') {
			$data = array(
				'success' => false,
				'messages' => 'Gagal menghapus berita [null]',
			);
		} else {
			$cekData = $this->model_samsat_berita->ambilBerita($id);
			if ($cekData->num_rows() > 0) {
				$dataNya = $cekData->row();
				$gambar = $dataNya->cover;
				$hapusgambarlama = unlink('../upload/images/' . $gambar);
				// if ($hapusgambarlama) {
				$hapusdata = $this->model_samsat_berita->hapusBerita($id);
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
			} else {
				$data = array(
					'success' => false,
					'messages' => 'Gagal menghapus berita [0]',
				);
			}
		};
		echo json_encode($data);
	}

	// VIDEO
	public function listvideo()
	{
		$data = array(
			'judul' => 'List Berita',
		);
		$this->load->view('websamsat/header', $data);
		$this->load->view('websamsat/listvideo', $data);
	}

	public function listvideo_data()
	{
		$list = $this->model_samsat_video->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datanya) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $datanya->judul;
			$row[] = $datanya->url;
			$row[] = "<img src='" . 'https://img.youtube.com/vi/' . $datanya->url_code . '/hqdefault.jpg' . "' class='img-fluid'>";
			$row[] = $datanya->created_date;
			$row[] = "
				<button class='btn btn-circle btn-danger' onclick='hapus_data(" . $datanya->id . ")'  type='button'><i class='fa fa-fw fa-trash'></i></button>
				<a class='btn btn-circle btn-danger' style='background-color: #FF0000' href='" . 'https://www.youtube.com/watch?v=' . $datanya->url . "' target='_blank'><i class='fab fa-fw fa-youtube'></i></a>
			";
			// <a class='btn btn-circle btn-primary' target='_blank' href='" . base_url('dashboard/lihatberita?id=') . $datanya->id_berita  . "'><i class='fa fa-fw fa-eye'></i></a>
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->model_samsat_video->count_all(),
			"recordsFiltered" => $this->model_samsat_video->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function tambahvideo()
	{
		$data = array(
			'judul' => 'Tambah Berita',
		);
		$this->load->view('websamsat/header', $data);
		$this->load->view('websamsat/tambahvideo', $data);
	}

	public function savevideo()
	{
		$judul = $this->input->post('judul');
		$url = $this->input->post('url');
		$created_id = $this->id;
		$kantor_id = $this->kantor_id;
		$created_date = date('Y-m-d H:i:s');
		$status = 1;

		if (($judul == '') || ($url == '')) {
			$sts = false;
			$msg = 'Lengkapi data terlebih dahulu';
		} else {
			if (strlen($judul) > 100) {
				$sts = false;
				$msg = 'Judul tidak boleh lebih dari 100 karakter';
			} else {
				$urlfull = 'https://www.youtube.com/embed/' . $url;
				$simpan = $this->model_samsat_video->simpanVideo($judul, $urlfull, $url, $created_date, $created_id, $kantor_id, $status);
				if ($simpan) {
					$sts = true;
					$msg = 'URL Video berhasil disimpan';
				} else {
					$sts = false;
					$msg = 'URL Video gagal disimpan';
				}
			}
		}

		$data = array(
			'success' => $sts,
			'messages' => $msg,
		);

		echo json_encode($data);
	}

	public function deletevideo()
	{
		$id = $this->input->post('id');
		if ($id == '') {
			$data = array(
				'success' => false,
				'messages' => 'Gagal menghapus berita [null]',
			);
		} else {
			$cekData = $this->model_samsat_video->ambilVideo($id);
			if ($cekData->num_rows() > 0) {
				$hapusdata = $this->model_samsat_video->hapusVideo($id);
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
			} else {
				$data = array(
					'success' => false,
					'messages' => 'Gagal menghapus berita [0]',
				);
			}
		};
		echo json_encode($data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url("login"));
	}
}
