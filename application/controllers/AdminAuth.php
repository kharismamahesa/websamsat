<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminAuth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	public function index()
	{
		// Auto-seed a default user if samsat_auth is empty
		$this->check_and_seed_admin();

		if ($this->session->userdata('admin_logged_in')) {
			redirect('admin');
		}

		$this->load->view('admin/login');
	}

	public function login()
	{
		if ($this->session->userdata('admin_logged_in')) {
			echo json_encode(['status' => 'success', 'message' => 'Sudah login.']);
			return;
		}

		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);

		if (empty($username) || empty($password)) {
			echo json_encode(['status' => 'error', 'message' => 'Username dan Password wajib diisi.']);
			return;
		}

		$user = $this->db->get_where('samsat_auth', ['username' => $username, 'is_active' => 1])->row();

		if ($user) {
			if (md5($password) === $user->password) {
				$session_data = [
					'admin_id' => $user->id,
					'admin_nama' => $user->nama,
					'admin_email' => $user->email,
					'admin_username' => $user->username,
					'admin_level' => $user->level,
					'admin_id_uptup' => $user->id_uptup,
					'admin_logged_in' => true
				];
				$this->session->set_userdata($session_data);
				echo json_encode(['status' => 'success', 'message' => 'Login berhasil.']);
			} else {
				echo json_encode(['status' => 'error', 'message' => 'Password salah.']);
			}
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Username tidak ditemukan atau tidak aktif.']);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata([
			'admin_id',
			'admin_nama',
			'admin_email',
			'admin_username',
			'admin_level',
			'admin_id_uptup',
			'admin_logged_in'
		]);
		$this->session->sess_destroy();
		redirect('adminauth');
	}

	private function check_and_seed_admin()
	{
		// Verify if database connection is valid and table exists
		if ($this->db->table_exists('samsat_auth')) {
			$count = $this->db->count_all('samsat_auth');
			if ($count == 0) {
				$data = [
					'nama' => 'Administrator',
					'email' => 'admin@websamsat.go.id',
					'image' => 'default.png',
					'username' => 'admin',
					'password' => md5('admin123'),
					'level' => 1,
					'id_uptup' => 1,
					'created_date' => date('Y-m-d H:i:s'),
					'is_active' => 1
				];
				$this->db->insert('samsat_auth', $data);
			}
		}
	}
}
