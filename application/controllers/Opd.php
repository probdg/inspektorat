<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opd extends CI_Controller
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
            'subtitle' => 'OPD',
            'sess_opd'  => $this->session->userdata('opd'),
            'namaPemda' => $namaPemda,
            'idPemda'   => $idPemda,
            'content'   => 'panel/opd/index',
            'js'        => 'panel/opd/js'
        ];
        $this->load->view('layout/content', $data);
    }
    public function detail($id = '')
    {
        if ($id) {
            $check = $this->db->get_where('ref_opd', ['id' => $id])->row_array();
            if ($check) {
                $idPemda = 0;
                $namaPemda = 'Superadmin';
                $data = [
                    'title'  => 'Admin Panel Inspektorat',
                    'subtitle' => 'OPD - Sasaran Strategis ' . $check['nama_opd'],
                    'id'        => $id,
                    'rpjmd'     => $this->ref->rpjmd(),
                    'sess_opd'  => $this->session->userdata('opd'),
                    'namaPemda' => $namaPemda,
                    'idPemda'   => $idPemda,
                    'content'   => 'panel/opd/detail/index',
                    'js'        => 'panel/opd/detail/js'
                ];
                $this->load->view('layout/content', $data);
            } else {
                redirect('opd');
            }
        } else {
            redirect('opd');
        }
    }
    public function dat_list()
    {
        $tabel = 'ref_opd';
        $column_order = array(null, 'nama_opd');
        $coloumn_search = array('nama_opd');
        $order_by = array('id' => 'asc');
        $join = [];
        $where = [];
        $select = '*';
        $group_by = [];

        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        $no = $this->input->post('start');

        foreach ($list as $list) {
            $sasaran   = '<a class="btn btn-warning btn-icon btn-sm" href="' . base_url('opd/detail/' . $list->id) . '"  title="Sasaran Strategis"><i class="fa fa-building"></i></a>';

            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="edit(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';

            $check = $this->db->get_where('dat_sasaran_strategis_pemda', ['id_pemda' => $list->id])->num_rows();
            if ($check > 0) {
                $delete = '';
            } else {
                $delete = ' <a class="btn btn-danger btn-icon btn-sm" href="javascript:void(0)"  title="Hapus" onclick="_delete(' . "'" . $list->id . "'" . ',' . "'" . $list->nama_opd . "'"  . ')"><i class="fa fa-trash"></i></a>';
            }


            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama_opd;
            //add html for action
            $row[] = '<center>' . $sasaran . '&nbsp;' . $edit . $delete . '</center>';
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
    public function dat_detail_list()
    {
        $tabel = 'dat_sasaran_strategis_pemda';
        $column_order = array(null, 'sasaran');
        $coloumn_search = array('sasaran');
        $order_by = array('id' => 'asc');
        $join = [];
        $join[] = [
            'field' => 'ref_sasaran_strategis',
            'condition' => 'dat_sasaran_strategis_pemda.id_sasaran = ref_sasaran_strategis.id',
            'direction' => 'left'
        ];

        $where = [];
        $where['dat_sasaran_strategis_pemda.id_pemda'] = $this->input->post('id');
        $where['ref_sasaran_strategis.id_rpjmd'] = $this->input->post('rpjmd');
        $group_by = [];

        $select = 'ref_sasaran_strategis.*';

        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        $no = $this->input->post('start');

        foreach ($list as $list) {
            $delete = ' <a class="btn btn-danger btn-icon btn-sm" href="javascript:void(0)"  title="Hapus" onclick="_delete(' . "'" . $list->id . "'" . ',' . "'" . $list->sasaran . "'"  . ')"><i class="fa fa-trash"></i></a>';


            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->sasaran;
            //add html for action
            $row[] = '<center>' . $delete . '</center>';
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
    public function getSasaran()
    {
        $data =  $this->ref->sasaran();
        echo json_encode($data);
    }
    public function save()
    {
        $nama_opd = $this->input->post('nama_opd', TRUE);
        $id     = $this->input->post('id', TRUE);
        $config = [
            [
                'field' => 'nama_opd',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Nama OPD',
                ]
            ],

        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'nama_opd'      => $nama_opd,
            ];

            if ($id) {
                $this->db->update('ref_opd', $data, ['id' => $id]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('ref_opd', $data);
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
    public function save_detail()
    {
        $rpjmd = $this->input->post('rpjmd', TRUE);
        $sasaran = $this->input->post('sasaran', TRUE);
        $id_pemda = $this->input->post('id_pemda', TRUE);

        $id     = $this->input->post('id', TRUE);
        $config = [
            [
                'field' => 'rpjmd',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih RPJMD',
                ]
            ],
            [
                'field' => 'sasaran',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Sasaran',
                ],
            ]

        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'id_sasaran'      => $id_sasaran,
                'id_rpjmd'      => $id_rpjmd,
                'id_pemda'      => $id_pemda,

            ];

            if ($id) {
                $this->db->update('ref_opd', $data, ['id' => $id]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('ref_opd', $data);
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
        $row = $this->db->get_where('ref_opd', ['id' => $id])->row();
        echo json_encode($row);
    }

    public function delete($id)
    {
        $delete = $this->db->delete('ref_opd', ['id' => $id]);
        if ($delete) {
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
    public function delete_detail($id)
    {
        $delete = $this->db->delete('ref_opd', ['id' => $id]);
        if ($delete) {
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
}
