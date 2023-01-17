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
        if ($this->session->userdata('level') != 3 || $this->session->userdata('token') == '') {
            redirect('login');
        }
    }

    public function index()
    {
        $pemda = $this->session->userdata('opd');
        $dataPemda = $this->db->get_where('ref_opd', ['id' => 56])->row_array();
        $dataOpd = $this->db->get_where('ref_opd', ['id' => $pemda])->row_array();
        $idOpd = $dataOpd['id'];
        $namaOpd = $dataOpd['nama_opd'];
        $idPemda = $dataPemda['id'];
        $namaPemda = $dataPemda['nama_opd'];

        $data = [
            'title'  => 'Form Inspektorat',

            'sess_opd'  => $this->session->userdata('opd'),
            'namaPemda' => $namaPemda,
            'idPemda'   => $idPemda,
            'namaOpd'   => $namaOpd,
            'idOpd'     => $idOpd,
            'm1'        => $this->ref->m1(),
            'f1a'        => $this->ref->f1a(),
            'rpjmd'        => $this->ref->rpjmd(),
            'opd'       => $this->ref->opd()


        ];
        $this->load->view('form/index', $data);
    }
    public function rpjmd_opd()
    {
        $pemda = $this->input->post('opd');
        $rpjmd = $this->input->post('rpjmd');
        $sasaran = $this->db->select('dat_sasaran_strategis_pemda.*, ref_sasaran_strategis.no_urut,ref_sasaran_strategis.sasaran')
            ->from('ref_sasaran_strategis')
            ->join('dat_sasaran_strategis_pemda', 'dat_sasaran_strategis_pemda.id_sasaran = ref_sasaran_strategis.id')
            ->where('id_pemda', $pemda)
            ->where('dat_sasaran_strategis_pemda.id_rpjmd', $rpjmd)->get()->result_array();
        $tujuan = $this->db->select('ref_tujuan_strategis.*')
            ->from('ref_tujuan_strategis')
            ->where('id_rpjmd', $rpjmd)->get()->result_array();
        echo json_encode(['sasaran' => $sasaran, 'tujuan' => $tujuan]);
    }
    public function getRpjmd()
    {
        $data = $this->ref->rpjmd_opd();
        echo json_encode($data);
    }
    public function referensi()
    {
        $rpjmd = $this->input->post('rpjmd');
        $sasaran = $this->db->select('ref_sasaran_strategis.*')
            ->from('ref_sasaran_strategis')
            ->where('id_rpjmd', $rpjmd)->get()->result_array();
        $tujuan = $this->db->select('ref_tujuan_strategis.*')
            ->from('ref_tujuan_strategis')
            ->where('id_rpjmd', $rpjmd)->get()->result_array();
        $misi = $this->db->select('ref_misi_strategis.*')
            ->from('ref_misi_strategis')
            ->where('id_rpjmd', $rpjmd)->get()->result_array();
        echo json_encode(['sasaran' => $sasaran, 'tujuan' => $tujuan, 'misi' => $misi]);
    }
}
