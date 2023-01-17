<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penurunan_kinerja extends CI_Controller
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
            'subtitle' => 'Kriteria Penurunan Kinerja',
            'sess_opd'  => $this->session->userdata('opd'),
            'namaPemda' => $namaPemda,
            'idPemda'   => $idPemda,
            'content'   => 'panel/kriteria/penurunan_kinerja/index',
            'js'        => 'panel/kriteria/penurunan_kinerja/js',
            'rpjmd'     => $this->ref->rpjmd()
        ];
        $this->load->view('layout/content', $data);
    }
    public function dat_list()
    {
        $tabel = 'ref_penurunan_kinerja';
        $column_order = array(null, 'penurunan_kinerja');
        $coloumn_search = array('penurunan_kinerja');
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
            $delete = ' <a class="btn btn-danger btn-icon btn-sm" href="javascript:void(0)"  title="Hapus" onclick="_delete(' . "'" . $list->id . "'" . ',' . "'" . substr($list->level_dampak, 0, 10) . "'"  . ')"><i class="fa fa-trash"></i></a>';


            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->reg;
            $row[] = $list->level_dampak;
            $row[] = $list->penurunan_kinerja;
            $row[] = $list->keterangan;

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
        $penurunan_kinerja = $this->input->post('penurunan_kinerja', TRUE);
        $level_dampak = $this->input->post('level_dampak', TRUE);

        $keterangan = $this->input->post('keterangan', TRUE);
        $reg = $this->input->post('reg', TRUE);

        $id     = $this->input->post('id', TRUE);
        $config = [
            [
                'field' => 'penurunan_kinerja',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Kriteria Penurunan kinerja',
                ],
            ],
            [
                'field' => 'level_dampak',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Kriteria Level Dampak',
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
                'penurunan_kinerja'      => $penurunan_kinerja,
                'keterangan'      => $keterangan,
                'level_dampak'      => $level_dampak,
                'reg'     => $reg,
            ];

            if ($id) {
                $this->db->update('ref_penurunan_kinerja', $data, ['id' => $id]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('ref_penurunan_kinerja', $data);
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
        $row = $this->db->get_where('ref_penurunan_kinerja', ['id' => $id])->row();
        echo json_encode($row);
    }

    public function delete($id)
    {
        $delete = $this->db->delete('ref_penurunan_kinerja', ['id' => $id]);
        if ($delete) {
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
}
