<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rpjmd extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ref');
        $this->load->model('umum_model', 'umum');
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
            'subtitle' => 'RPJMD',
            'sess_opd'  => $this->session->userdata('opd'),
            'namaPemda' => $namaPemda,
            'idPemda'   => $idPemda,
            'content'   => 'panel/rpjmd/index',
            'js'        => 'panel/rpjmd/js'
        ];
        $this->load->view('layout/content', $data);
    }
    public function dat_list()
    {
        $tabel = 'ref_rpjmd';
        $column_order = array(null, 'nama_periode', 'periode_awal', 'periode_akhir');
        $coloumn_search = array('nama_periode', 'periode_awal', 'periode_akhir');
        $order_by = array('id' => 'asc');
        $join = [];
        $where = [];
        $select = '*';
        $group_by = [];

        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        $no = $this->input->post('start');

        foreach ($list as $list) {
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="edit(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $delete = ' <a class="btn btn-danger btn-icon btn-sm" href="javascript:void(0)"  title="Hapus" onclick="_delete(' . "'" . $list->id . "'" . ',' . "'" . $list->nama_periode . "'"  . ')"><i class="fa fa-trash"></i></a>';


            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama_periode;
            $row[] = $list->periode_awal;
            $row[] = $list->periode_akhir;
            //add html for action
            $row[] = '<center>' . $edit . $delete . '</center>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->umum->count_all($tabel, $join, $where),
            "recordsFiltered" => $this->umum->count_filtered($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function save()
    {
        $nama_periode = $this->input->post('nama_periode', TRUE);
        $from    = $this->input->post('from', TRUE);
        $to    = $this->input->post('to', TRUE);
        $id     = $this->input->post('id', TRUE);
        $config = [
            [
                'field' => 'nama_periode',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Nama Periode',
                ]
            ],

            [
                'field' => 'from',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukan Tahun Awal',
                ]
            ],
            [
                'field' => 'to',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukan Tahun Akhir',
                ]
            ]
        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'nama_periode'      => $nama_periode,
                'periode_awal' => $from,
                'periode_akhir' => $to,
            ];

            if ($id) {
                $this->db->update('ref_rpjmd', $data, ['id' => $id]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('ref_rpjmd', $data);
                $msg = 'Data berhasil disimpan';
            }
            echo json_encode(['status' => TRUE, 'msg' => $msg]);
        } else {
            $validation = [];
            $validation['status'] = FALSE;
            foreach ($_POST as $key => $value) {
                $validation['messages'][$key] = form_error($key);
            }
            echo json_encode($validation);
        }
    }

    public function edit($id)
    {
        $row = $this->db->get_where('ref_rpjmd', ['id' => $id])->row();
        echo json_encode($row);
    }

    public function delete($id)
    {
        $delete = $this->db->delete('ref_rpjmd', ['id' => $id]);
        if ($delete) {
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
}
