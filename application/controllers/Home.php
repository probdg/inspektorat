<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ref');
        $this->load->helper('bulan_helper');
        $this->load->helper('convert_helper');
    }

    public function index()
    {
        $pemda = $this->session->userdata('opd');
        $dataPemda = $this->db->get_where('ref_opd', ['id' => $pemda])->row_array();
        if ($dataPemda) {
            $idPemda = $dataPemda['id'];
            $namaPemda = $dataPemda['nama_opd'];
        } else {
            $idPemda = 0;
            $namaPemda = 'Superadmin';
        }
        $data = [
            'title'  => 'Form Inspektorat',
            'sess_opd'  => $this->session->userdata('opd'),
            'namaPemda' => $namaPemda,
            'idPemda'   => $idPemda,
            'm1'        => $this->ref->m1(),
            'f1a'        => $this->ref->f1a(),


        ];
        $this->load->view('form/index', $data);
    }
}
