<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ref');
        $this->load->helper('bulan_helper');
        $this->load->helper('convert_helper');
        if ($this->session->userdata('level') != 1 && $this->session->userdata('token') == '') {
            redirect('login');
        }
    }

    public function index()
    {
        $idPemda = 0;
        $namaPemda = 'Superadmin';
        $data = [
            'title'  => 'Admin Panel Inspektorat',
            'sess_opd'  => $this->session->userdata('opd'),
            'namaPemda' => $namaPemda,
            'idPemda'   => $idPemda,
            'content'   => 'panel/index',
            'js'        => 'panel/js'
        ];
        $this->load->view('layout/content', $data);
    }
}
