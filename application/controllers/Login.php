<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Umum_model', 'umum');
        $this->load->helper('string');
    }

    public function index()
    {
        $this->load->view('login');
    }
    public function verify()
    {
        $username = $this->input->post('username', TRUE);
        $password = md5($this->input->post('password', TRUE));
        $token    = random_string('md5');
        $where = ['username' => $username, 'password' => $password];
        $fetch = $this->db->get_where('dat_login', $where)->row_array();
        if (!empty($fetch)) {
            $sess_data['id']       = $fetch['id'];
            $sess_data['nama']     = $fetch['nama_operator'];
            $sess_data['username'] = $fetch['username'];
            $sess_data['level']    = $fetch['level'];
            $sess_data['opd']    = $fetch['opd'];
            $sess_data['token']    = $token;
            $this->session->set_userdata($sess_data);
            if ($fetch['opd']  == 0) {
                redirect('panel');
            } else {
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Maaf, Username / Password Yang Anda Masukan Salah');
            redirect('login');
        }
    }
    function out()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
