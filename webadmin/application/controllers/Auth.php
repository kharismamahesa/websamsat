<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('wab_kode_wartawan')) {
            redirect(base_url('dashboard'));
        }
        $this->load->model('Model_Auth', 'model_auth');
    }

    public function index()
    {
        $data = array(
            'judul' => 'Log In',
        );
        $this->load->view('auth', $data);
    }

    public function auth()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'judul' => 'Log In',
            );
            $usr = $this->input->post('username');
            $psw = $this->input->post('password');

            if (($usr == '') || ($psw == '')) {
                $this->session->set_flashdata('result_login', 'Masukkan Username atau Password terlebih dahulu');
                $this->load->view('auth', $data);
            }
        } else {
            $usr = $this->input->post('username');
            $psw = $this->input->post('password');
            if (($usr == '') || ($psw == '')) {
                $this->session->set_flashdata('result_login', 'Masukkan Username atau Password terlebih dahulu');
                redirect(base_url('auth'));
            } else {
                $u = $usr;
                $p = md5($psw);

                $cek = $this->model_auth->cek($u, $p);
                if ($cek->num_rows() > 0) {
                    //wab = web admin bapenda
                    $datalogin = $cek->row();
                    $sess_data['wab_kode_wartawan'] = $datalogin->kode_wartawan;
                    $sess_data['wab_nama'] = $datalogin->nama;
                    $sess_data['wab_app'] = 'webadmin_bapenda';

                    $this->session->set_userdata($sess_data);
                    $this->session->set_flashdata('success', 'Login Berhasil!');
                    redirect(base_url('dashboard'));
                } else {
                    $this->session->set_flashdata('result_login', 'Username atau Password yang anda masukkan salah');
                    redirect(base_url('auth'));
                }
            }
        }
    }
}
