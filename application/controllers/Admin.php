<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('text');

		// Check session authentication
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('adminauth');
		}
	}

	public function index()
	{
		$data['title'] = 'Dasbor Admin';
		$data['content'] = 'admin/dashboard';
		$this->load->view('admin/layout', $data);
	}

	// berita
	public function berita()
	{
		$data['title'] = 'Kelola Berita';
		$data['content'] = 'admin/berita';
		$this->load->view('admin/layout', $data);
	}

	public function berita_datatable()
	{
		// Simple datatable query
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$search = $this->input->get("search");

		$id_uptup = $this->session->userdata('admin_id_uptup');

		$this->db->select('*');
		$this->db->from('samsat_berita');
		if ($id_uptup) {
			$this->db->where('kantor_id', $id_uptup);
		}

		if (!empty($search['value'])) {
			$search_val = $search['value'];
			$this->db->group_start();
			$this->db->like('judul', $search_val);
			$this->db->or_like('author', $search_val);
			$this->db->group_end();
		}

		// Get total count
		$temp_db = clone $this->db;
		$total_records = $temp_db->count_all_results();

		$this->db->order_by('created_date', 'DESC');
		$this->db->limit($length, $start);
		$query = $this->db->get();
		$data = [];

		foreach ($query->result() as $row) {
			$status_badge = $row->status == 1 ? '<span class="badge bg-success text-white">Aktif</span>' : '<span class="badge bg-secondary text-white">Draft</span>';
			$cover_img = !empty($row->cover) ? '<img src="' . base_url('upload/berita/' . $row->cover) . '" width="200px" class="img-thumbnail" />' : '-';

			$action_buttons = '
				<button class="btn btn-sm btn-info text-white btn-edit" data-id="' . $row->id . '"><i class="fas fa-edit"></i></button>
				<button class="btn btn-sm btn-danger btn-delete" data-id="' . $row->id . '"><i class="fas fa-trash"></i></button>
			';

			$data[] = [
				'id' => $row->id,
				'cover' => $cover_img,
				'judul' => character_limiter($row->judul, 40),
				'author' => $row->author,
				'created_date' => $row->created_date,
				'status' => $status_badge,
				'action' => $action_buttons
			];
		}

		$output = [
			"draw" => $draw,
			"recordsTotal" => $total_records,
			"recordsFiltered" => $total_records,
			"data" => $data
		];

		echo json_encode($output);
	}

	public function berita_get($id = null)
	{
		if ($id === null) {
			$id = $this->input->get('id');
		}

		$id_uptup = $this->session->userdata('admin_id_uptup');
		$where = ['id' => $id];
		if ($id_uptup) {
			$where['kantor_id'] = $id_uptup;
		}

		$berita = $this->db->get_where('samsat_berita', $where)->row();
		if ($berita) {
			echo json_encode(['status' => 'success', 'data' => $berita]);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
		}
	}

	public function berita_save()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('berita', 'Isi Berita', 'required');
		$this->form_validation->set_rules('author', 'Penulis', 'required');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode(['status' => 'validation_error', 'errors' => validation_errors()]);
			return;
		}

		$judul = $this->input->post('judul', true);
		$link = url_title($judul, 'dash', true);
		$author = $this->input->post('author', true);
		$created_date = $this->input->post('created_date', true);
		if (empty($created_date)) {
			$created_date = date('Y-m-d H:i:s');
		} else if (strlen($created_date) == 10) {
			$created_date .= ' ' . date('H:i:s');
		}

		// Handle image upload
		$cover_filename = '';
		if (!empty($_FILES['cover']['name'])) {
			$config['upload_path']   = './upload/berita/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
			$config['max_size']      = 2048; // 2MB
			
			$judul_x = preg_replace("/[^a-zA-Z0-9]/", "", $judul);
			$judul_xx = substr($judul_x, 0, 50);
			$file_name = str_replace(' ', '', $judul_xx . '-' . bin2hex(random_bytes(10)) . '-gambarweb');
			$config['file_name']     = $file_name;

			// Make sure directory exists
			if (!is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0777, true);
			}

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('cover')) {
				$upload_data = $this->upload->data();
				$cover_filename = $upload_data['file_name'];
			} else {
				echo json_encode(['status' => 'error', 'message' => 'Gagal mengupload cover: ' . $this->upload->display_errors('', '')]);
				return;
			}
		}

		$data = [
			'judul' => $judul,
			'link' => $link,
			'berita' => $this->input->post('berita'),
			'cover' => $cover_filename,
			'author' => $author,
			'created_date' => $created_date,
			'created_id' => $this->session->userdata('admin_id'),
			'kantor_id' => $this->session->userdata('admin_id_uptup') ? $this->session->userdata('admin_id_uptup') : 0,
			'status' => $this->input->post('status') !== null ? intval($this->input->post('status')) : 1
		];

		$insert = $this->db->insert('samsat_berita', $data);

		if ($insert) {
			echo json_encode(['status' => 'success', 'message' => 'Berita berhasil disimpan.']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data ke database.']);
		}
	}

	public function berita_update()
	{
		$id = $this->input->post('id');
		if (empty($id)) {
			echo json_encode(['status' => 'error', 'message' => 'ID Berita tidak valid.']);
			return;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('berita', 'Isi Berita', 'required');
		$this->form_validation->set_rules('author', 'Penulis', 'required');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode(['status' => 'validation_error', 'errors' => validation_errors()]);
			return;
		}

		$id_uptup = $this->session->userdata('admin_id_uptup');
		$where = ['id' => $id];
		if ($id_uptup) {
			$where['kantor_id'] = $id_uptup;
		}

		$berita_lama = $this->db->get_where('samsat_berita', $where)->row();
		if (!$berita_lama) {
			echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan.']);
			return;
		}

		$judul = $this->input->post('judul', true);
		$link = url_title($judul, 'dash', true);
		$author = $this->input->post('author', true);
		$created_date = $this->input->post('created_date', true);
		if (empty($created_date)) {
			$created_date = date('Y-m-d H:i:s');
		} else if (strlen($created_date) == 10) {
			$created_date .= ' ' . date('H:i:s');
		}

		// Handle image upload
		$cover_filename = $berita_lama->cover;
		if (!empty($_FILES['cover']['name'])) {
			$config['upload_path']   = './upload/berita/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
			$config['max_size']      = 2048; // 2MB
			
			$judul_x = preg_replace("/[^a-zA-Z0-9]/", "", $judul);
			$judul_xx = substr($judul_x, 0, 50);
			$file_name = str_replace(' ', '', $judul_xx . '-' . bin2hex(random_bytes(10)) . '-gambarweb');
			$config['file_name']     = $file_name;

			// Make sure directory exists
			if (!is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0777, true);
			}

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('cover')) {
				// Delete old cover file if exists
				if (!empty($berita_lama->cover) && file_exists('./upload/berita/' . $berita_lama->cover)) {
					@unlink('./upload/berita/' . $berita_lama->cover);
				}

				$upload_data = $this->upload->data();
				$cover_filename = $upload_data['file_name'];
			} else {
				echo json_encode(['status' => 'error', 'message' => 'Gagal mengupload cover baru: ' . $this->upload->display_errors('', '')]);
				return;
			}
		}

		$data = [
			'judul' => $judul,
			'link' => $link,
			'berita' => $this->input->post('berita'),
			'cover' => $cover_filename,
			'author' => $author,
			'created_date' => $created_date,
			'status' => intval($this->input->post('status'))
		];

		$this->db->where('id', $id);
		$update = $this->db->update('samsat_berita', $data);

		if ($update) {
			echo json_encode(['status' => 'success', 'message' => 'Berita berhasil diperbarui.']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data ke database.']);
		}
	}

	public function berita_delete()
	{
		$id = $this->input->post('id');
		if (empty($id)) {
			echo json_encode(['status' => 'error', 'message' => 'ID Berita tidak valid.']);
			return;
		}

		$id_uptup = $this->session->userdata('admin_id_uptup');
		$where = ['id' => $id];
		if ($id_uptup) {
			$where['kantor_id'] = $id_uptup;
		}

		$berita = $this->db->get_where('samsat_berita', $where)->row();
		if ($berita) {
			// Delete cover file
			if (!empty($berita->cover) && file_exists('./upload/berita/' . $berita->cover)) {
				@unlink('./upload/berita/' . $berita->cover);
			}

			$this->db->where('id', $id);
			$delete = $this->db->delete('samsat_berita');

			if ($delete) {
				echo json_encode(['status' => 'success', 'message' => 'Berita berhasil dihapus.']);
			} else {
				echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus data dari database.']);
			}
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan.']);
		}
	}

	// galeri
	public function galeri()
	{
		$data['title'] = 'Kelola Galeri';
		$data['content'] = 'admin/galeri';
		$this->load->view('admin/layout', $data);
	}

	public function galeri_datatable()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$search = $this->input->get("search");

		$id_uptup = $this->session->userdata('admin_id_uptup');

		$this->db->select('g.*, (SELECT COUNT(*) FROM samsat_galeri_foto WHERE id_galeri = g.id) as total_foto');
		$this->db->from('samsat_galeri g');
		if ($id_uptup) {
			$this->db->where('g.kantor_id', $id_uptup);
		}

		if (!empty($search['value'])) {
			$search_val = $search['value'];
			$this->db->group_start();
			$this->db->like('g.keterangan', $search_val);
			$this->db->group_end();
		}

		$temp_db = clone $this->db;
		$total_records = $temp_db->count_all_results();

		$this->db->order_by('g.created_datetime', 'DESC');
		$this->db->limit($length, $start);
		$query = $this->db->get();
		$data = [];

		foreach ($query->result() as $row) {
			$cover_img = !empty($row->foto) ? '<img src="' . base_url('upload/galeri/' . $row->foto) . '" width="200" class="img-thumbnail" />' : '-';
			$action_buttons = '
				<button class="btn btn-sm btn-info text-white btn-edit" data-id="' . $row->id . '"><i class="fas fa-edit"></i></button>
				<button class="btn btn-sm btn-danger btn-delete" data-id="' . $row->id . '"><i class="fas fa-trash"></i></button>
			';

			$total = intval($row->total_foto);
			$foto_btn = $total > 0
				? '<button class="btn btn-sm btn-success font-weight-bold btn-view-photos" data-id="' . $row->id . '" data-keterangan="' . htmlspecialchars($row->keterangan, ENT_QUOTES) . '"><i class="fas fa-images mr-1"></i> ' . $total . ' Foto</button>'
				: '<span class="badge badge-secondary">Belum ada foto</span>';

			$data[] = [
				'id' => $row->id,
				'foto' => $cover_img,
				'keterangan' => character_limiter($row->keterangan, 60),
				'total_foto' => $foto_btn,
				'created_datetime' => $row->created_datetime,
				'action' => $action_buttons
			];
		}

		$output = [
			"draw" => $draw,
			"recordsTotal" => $total_records,
			"recordsFiltered" => $total_records,
			"data" => $data
		];

		echo json_encode($output);
	}

	public function galeri_photos()
	{
		$id = $this->input->get('id');
		$id_uptup = $this->session->userdata('admin_id_uptup');

		$where = ['id' => $id];
		if ($id_uptup) {
			$where['kantor_id'] = $id_uptup;
		}

		$galeri = $this->db->get_where('samsat_galeri', $where)->row();
		if (!$galeri) {
			echo json_encode(['status' => 'error', 'message' => 'Galeri tidak ditemukan']);
			return;
		}

		$fotos = $this->db->get_where('samsat_galeri_foto', ['id_galeri' => $id])->result();

		// Build photo URLs
		$photo_list = [];
		foreach ($fotos as $f) {
			$photo_list[] = [
				'id'  => $f->id,
				'url' => base_url('upload/galeri/' . $f->foto)
			];
		}

		// Also include the cover
		$cover = null;
		if (!empty($galeri->foto)) {
			$cover = base_url('upload/galeri/' . $galeri->foto);
		}

		echo json_encode([
			'status'     => 'success',
			'keterangan' => $galeri->keterangan,
			'cover'      => $cover,
			'photos'     => $photo_list
		]);
	}

	public function galeri_get($id = null)
	{
		if ($id === null) {
			$id = $this->input->get('id');
		}

		$id_uptup = $this->session->userdata('admin_id_uptup');
		$where = ['id' => $id];
		if ($id_uptup) {
			$where['kantor_id'] = $id_uptup;
		}

		$galeri = $this->db->get_where('samsat_galeri', $where)->row();
		if ($galeri) {
			$fotos = $this->db->get_where('samsat_galeri_foto', ['id_galeri' => $id])->result();
			echo json_encode(['status' => 'success', 'data' => $galeri, 'fotos' => $fotos]);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan']);
		}
	}

	public function galeri_save()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode(['status' => 'validation_error', 'errors' => validation_errors()]);
			return;
		}

		$keterangan = $this->input->post('keterangan', true);

		// Configure upload path
		$upload_path = './upload/galeri/';
		if (!is_dir($upload_path)) {
			mkdir($upload_path, 0777, true);
		}

		// Handle additional photos first to validate count and size
		$additional_filenames = [];
		if (!empty($_FILES['additional_photos']['name'][0])) {
			$filesCount = count($_FILES['additional_photos']['name']);
			if ($filesCount > 5) {
				echo json_encode(['status' => 'error', 'message' => 'Maksimal upload 5 foto tambahan.']);
				return;
			}

			$this->load->library('upload');

			for ($i = 0; $i < $filesCount; $i++) {
				$_FILES['file']['name']     = $_FILES['additional_photos']['name'][$i];
				$_FILES['file']['type']     = $_FILES['additional_photos']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['additional_photos']['tmp_name'][$i];
				$_FILES['file']['error']    = $_FILES['additional_photos']['error'][$i];
				$_FILES['file']['size']     = $_FILES['additional_photos']['size'][$i];

				$keterangan_x = preg_replace("/[^a-zA-Z0-9]/", "", $keterangan);
				$keterangan_xx = substr($keterangan_x, 0, 50);
				$file_name = str_replace(' ', '', $keterangan_xx . '-' . bin2hex(random_bytes(10)) . '-galeriweb');

				$config['upload_path']   = $upload_path;
				$config['allowed_types'] = 'jpg|jpeg|png|webp';
				$config['max_size']      = 2048; // 2MB
				$config['file_name']     = $file_name;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('file')) {
					$fileData = $this->upload->data();
					$additional_filenames[] = $fileData['file_name'];
				} else {
					// Clean up already uploaded files
					foreach ($additional_filenames as $fname) {
						@unlink($upload_path . $fname);
					}
					echo json_encode(['status' => 'error', 'message' => 'Gagal mengupload foto tambahan ke-' . ($i + 1) . ': ' . $this->upload->display_errors('', '')]);
					return;
				}
			}
		}

		// Handle main photo
		$cover_filename = '';
		if (!empty($_FILES['foto']['name'])) {
			$keterangan_x = preg_replace("/[^a-zA-Z0-9]/", "", $keterangan);
			$keterangan_xx = substr($keterangan_x, 0, 50);
			$file_name = str_replace(' ', '', $keterangan_xx . '-' . bin2hex(random_bytes(10)) . '-galeriweb');

			$config['upload_path']   = $upload_path;
			$config['allowed_types'] = 'jpg|jpeg|png|webp';
			$config['max_size']      = 2048; // 2MB
			$config['file_name']     = $file_name;

			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('foto')) {
				$upload_data = $this->upload->data();
				$cover_filename = $upload_data['file_name'];
			} else {
				// Clean up uploaded additional photos
				foreach ($additional_filenames as $fname) {
					@unlink($upload_path . $fname);
				}
				echo json_encode(['status' => 'error', 'message' => 'Gagal mengupload cover: ' . $this->upload->display_errors('', '')]);
				return;
			}
		}

		$data = [
			'keterangan' => $keterangan,
			'foto' => $cover_filename,
			'kantor_id' => $this->session->userdata('admin_id_uptup') ? $this->session->userdata('admin_id_uptup') : 0,
			'created_datetime' => date('Y-m-d H:i:s'),
			'created_by' => $this->session->userdata('admin_id')
		];

		$insert = $this->db->insert('samsat_galeri', $data);
		if ($insert) {
			$galeri_id = $this->db->insert_id();
			foreach ($additional_filenames as $fname) {
				$this->db->insert('samsat_galeri_foto', [
					'id_galeri' => $galeri_id,
					'foto' => $fname
				]);
			}
			echo json_encode(['status' => 'success', 'message' => 'Galeri berhasil disimpan.']);
		} else {
			// Clean up all files
			if ($cover_filename) @unlink($upload_path . $cover_filename);
			foreach ($additional_filenames as $fname) {
				@unlink($upload_path . $fname);
			}
			echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data ke database.']);
		}
	}

	public function galeri_update()
	{
		$id = $this->input->post('id');
		if (empty($id)) {
			echo json_encode(['status' => 'error', 'message' => 'ID Galeri tidak valid.']);
			return;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

		if ($this->form_validation->run() == FALSE) {
			echo json_encode(['status' => 'validation_error', 'errors' => validation_errors()]);
			return;
		}

		$id_uptup = $this->session->userdata('admin_id_uptup');
		$where = ['id' => $id];
		if ($id_uptup) {
			$where['kantor_id'] = $id_uptup;
		}

		$galeri_lama = $this->db->get_where('samsat_galeri', $where)->row();
		if (!$galeri_lama) {
			echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan.']);
			return;
		}

		$keterangan = $this->input->post('keterangan', true);
		$upload_path = './upload/galeri/';

		// Validate count first
		$current_count = $this->db->get_where('samsat_galeri_foto', ['id_galeri' => $id])->num_rows();
		$new_files_count = 0;
		if (!empty($_FILES['additional_photos']['name'][0])) {
			$new_files_count = count($_FILES['additional_photos']['name']);
		}

		if ($current_count + $new_files_count > 5) {
			echo json_encode(['status' => 'error', 'message' => 'Total foto tambahan melebihi batas 5 foto. Saat ini sudah ada ' . $current_count . ' foto.']);
			return;
		}

		// Handle additional photos upload
		$additional_filenames = [];
		if ($new_files_count > 0) {
			$this->load->library('upload');

			for ($i = 0; $i < $new_files_count; $i++) {
				$_FILES['file']['name']     = $_FILES['additional_photos']['name'][$i];
				$_FILES['file']['type']     = $_FILES['additional_photos']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['additional_photos']['tmp_name'][$i];
				$_FILES['file']['error']    = $_FILES['additional_photos']['error'][$i];
				$_FILES['file']['size']     = $_FILES['additional_photos']['size'][$i];

				$keterangan_x = preg_replace("/[^a-zA-Z0-9]/", "", $keterangan);
				$keterangan_xx = substr($keterangan_x, 0, 50);
				$file_name = str_replace(' ', '', $keterangan_xx . '-' . bin2hex(random_bytes(10)) . '-gambarweb');

				$config['upload_path']   = $upload_path;
				$config['allowed_types'] = 'jpg|jpeg|png|webp';
				$config['max_size']      = 2048; // 2MB
				$config['file_name']     = $file_name;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('file')) {
					$fileData = $this->upload->data();
					$additional_filenames[] = $fileData['file_name'];
				} else {
					// Clean up newly uploaded files
					foreach ($additional_filenames as $fname) {
						@unlink($upload_path . $fname);
					}
					echo json_encode(['status' => 'error', 'message' => 'Gagal mengupload foto tambahan ke-' . ($i + 1) . ': ' . $this->upload->display_errors('', '')]);
					return;
				}
			}
		}

		// Handle main cover update
		$cover_filename = $galeri_lama->foto;
		if (!empty($_FILES['foto']['name'])) {
			$keterangan_x = preg_replace("/[^a-zA-Z0-9]/", "", $keterangan);
			$keterangan_xx = substr($keterangan_x, 0, 50);
			$file_name = str_replace(' ', '', $keterangan_xx . '-' . bin2hex(random_bytes(10)) . '-gambarweb');

			$config['upload_path']   = $upload_path;
			$config['allowed_types'] = 'jpg|jpeg|png|webp';
			$config['max_size']      = 2048; // 2MB
			$config['file_name']     = $file_name;

			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('foto')) {
				// delete old main photo
				if (!empty($galeri_lama->foto) && file_exists($upload_path . $galeri_lama->foto)) {
					@unlink($upload_path . $galeri_lama->foto);
				}
				$upload_data = $this->upload->data();
				$cover_filename = $upload_data['file_name'];
			} else {
				// Clean up newly uploaded additional photos
				foreach ($additional_filenames as $fname) {
					@unlink($upload_path . $fname);
				}
				echo json_encode(['status' => 'error', 'message' => 'Gagal mengupload cover: ' . $this->upload->display_errors('', '')]);
				return;
			}
		}

		$data = [
			'keterangan' => $keterangan,
			'foto' => $cover_filename
		];

		$this->db->where('id', $id);
		$update = $this->db->update('samsat_galeri', $data);

		if ($update) {
			foreach ($additional_filenames as $fname) {
				$this->db->insert('samsat_galeri_foto', [
					'id_galeri' => $id,
					'foto' => $fname
				]);
			}
			echo json_encode(['status' => 'success', 'message' => 'Galeri berhasil diperbarui.']);
		} else {
			// clean up files
			if ($cover_filename != $galeri_lama->foto) @unlink($upload_path . $cover_filename);
			foreach ($additional_filenames as $fname) {
				@unlink($upload_path . $fname);
			}
			echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data ke database.']);
		}
	}

	public function galeri_delete()
	{
		$id = $this->input->post('id');
		if (empty($id)) {
			echo json_encode(['status' => 'error', 'message' => 'ID Galeri tidak valid.']);
			return;
		}

		$id_uptup = $this->session->userdata('admin_id_uptup');
		$where = ['id' => $id];
		if ($id_uptup) {
			$where['kantor_id'] = $id_uptup;
		}

		$galeri = $this->db->get_where('samsat_galeri', $where)->row();
		if ($galeri) {
			$upload_path = './upload/galeri/';
			
			// Delete main cover
			if (!empty($galeri->foto) && file_exists($upload_path . $galeri->foto)) {
				@unlink($upload_path . $galeri->foto);
			}

			// Delete additional photos
			$fotos = $this->db->get_where('samsat_galeri_foto', ['id_galeri' => $id])->result();
			foreach ($fotos as $f) {
				if (!empty($f->foto) && file_exists($upload_path . $f->foto)) {
					@unlink($upload_path . $f->foto);
				}
			}

			$this->db->delete('samsat_galeri_foto', ['id_galeri' => $id]);
			$this->db->delete('samsat_galeri', ['id' => $id]);

			echo json_encode(['status' => 'success', 'message' => 'Galeri berhasil dihapus.']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan.']);
		}
	}

	public function galeri_delete_photo()
	{
		$photo_id = $this->input->post('photo_id');
		$id_uptup = $this->session->userdata('admin_id_uptup');

		// Verify photo belongs to a gallery of this UPTUP
		$this->db->select('f.*, g.kantor_id');
		$this->db->from('samsat_galeri_foto f');
		$this->db->join('samsat_galeri g', 'f.id_galeri = g.id');
		$this->db->where('f.id', $photo_id);
		if ($id_uptup) {
			$this->db->where('g.kantor_id', $id_uptup);
		}
		$photo = $this->db->get()->row();

		if ($photo) {
			if (file_exists('./upload/galeri/' . $photo->foto)) {
				@unlink('./upload/galeri/' . $photo->foto);
			}
			$this->db->delete('samsat_galeri_foto', ['id' => $photo_id]);
			echo json_encode(['status' => 'success', 'message' => 'Foto berhasil dihapus.']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Foto tidak ditemukan atau akses ditolak.']);
		}
	}
}
