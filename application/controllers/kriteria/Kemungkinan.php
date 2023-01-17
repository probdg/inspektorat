<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kemungkinan extends CI_Controller
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
            'subtitle' => 'Kriteria Kemungkinan',
            'sess_opd'  => $this->session->userdata('opd'),
            'namaPemda' => $namaPemda,
            'idPemda'   => $idPemda,
            'content'   => 'panel/kriteria/kemungkinan/index',
            'js'        => 'panel/kriteria/kemungkinan/js',
            'rpjmd'     => $this->ref->rpjmd()
        ];
        $this->load->view('layout/content', $data);
    }
    public function dat_list()
    {
        $tabel = 'ref_kriteria_kemungkinan';
        $column_order = array(null, 'probabilitas');
        $coloumn_search = array('probabilitas');
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
            $delete = ' <a class="btn btn-danger btn-icon btn-sm" href="javascript:void(0)"  title="Hapus" onclick="_delete(' . "'" . $list->id . "'" . ',' . "'" . substr($list->level, 0, 10) . "'"  . ')"><i class="fa fa-trash"></i></a>';


            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->reg;
            $row[] = $list->level;
            $row[] = $list->probabilitas;
            $row[] = $list->frekuensi;

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
        $probabilitas = $this->input->post('probabilitas', TRUE);
        $frekuensi = $this->input->post('frekuensi', TRUE);
        $level = $this->input->post('level', TRUE);

        $keterangan = $this->input->post('keterangan', TRUE);
        $reg = $this->input->post('reg', TRUE);

        $id     = $this->input->post('id', TRUE);
        $config = [
            [
                'field' => 'probabilitas',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Probabilitas',
                ],
            ],
            [
                'field' => 'frekuensi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Frekuensi',
                ],
            ],
            [
                'field' => 'level',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Level',
                ],
            ],
            [
                'field' => 'reg',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukan No Urut',
                    'numeric' => 'No Urut Harus Angka',
                ],
            ],

        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'probabilitas'      => $probabilitas,
                'frekuensi'      => $frekuensi,
                'keterangan'      => $keterangan,
                'level'      => $level,
                'reg'     => $reg,
            ];

            if ($id) {
                $this->db->update('ref_kriteria_kemungkinan', $data, ['id' => $id]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('ref_kriteria_kemungkinan', $data);
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
        $row = $this->db->get_where('ref_kriteria_kemungkinan', ['id' => $id])->row();
        echo json_encode($row);
    }

    public function delete($id)
    {
        $delete = $this->db->delete('ref_kriteria_kemungkinan', ['id' => $id]);
        if ($delete) {
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
}
