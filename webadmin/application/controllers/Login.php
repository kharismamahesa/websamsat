<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('samsat_iduser')) {
            redirect(base_url('samsat'));
        }
        $this->load->model('Model_Login', 'model_login');
    }

    public function index()
    {
        $data = array(
            'judul' => 'Log In',
        );
        $this->load->view('websamsat/login', $data);
    }

    public function login()
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
                $this->load->view('websamsat/login', $data);
            }
        } else {
            $usr = $this->input->post('username');
            $psw = $this->input->post('password');
            if (($usr == '') || ($psw == '')) {
                $this->session->set_flashdata('result_login', 'Masukkan Username atau Password terlebih dahulu');
                redirect(base_url('login'));
            } else {
                $u = $usr;
                $p = md5($psw);

                $cek = $this->model_login->cek($u, $p);
                if ($cek->num_rows() > 0) {
                    //was = web admin samsat
                    $datalogin = $cek->row();
                    $sess_data['websamsat_id'] = $datalogin->id;
                    $sess_data['websamsat_nama'] = $datalogin->nama;
                    $sess_data['websamsat_app'] = 'webadmin_samsat';
                    $this->session->set_userdata($sess_data);
                    $this->session->set_flashdata('success', 'Login Berhasil!');
                    redirect(base_url('samsat'));
                } else {
                    $this->session->set_flashdata('result_login', 'Username atau Password yang anda masukkan salah');
                    redirect(base_url('login'));
                }
            }
        }
    }
}
