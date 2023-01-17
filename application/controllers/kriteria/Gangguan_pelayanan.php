<?php
defined('BASEPATH') or exit('No direct script access allowed');

class gangguan_pelayanan extends CI_Controller
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
            'subtitle' => 'Kriteria Gangguan Terhadap Pelayanan',
            'sess_opd'  => $this->session->userdata('opd'),
            'namaPemda' => $namaPemda,
            'idPemda'   => $idPemda,
            'content'   => 'panel/kriteria/gangguan_pelayanan/index',
            'js'        => 'panel/kriteria/gangguan_pelayanan/js',
            'rpjmd'     => $this->ref->rpjmd()
        ];
        $this->load->view('layout/content', $data);
    }
    public function dat_list()
    {
        $tabel = 'ref_gangguan_pelayanan';
        $column_order = array(null, 'gangguan_pelayanan');
        $coloumn_search = array('gangguan_pelayanan');
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

            $row[] = $list->gangguan_pelayanan;
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
        $gangguan_pelayanan = $this->input->post('gangguan_pelayanan', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $level_dampaK = $this->input->post('level_dampaK', TRUE);

        $reg = $this->input->post('reg', TRUE);

        $id     = $this->input->post('id', TRUE);
        $config = [
            [
                'field' => 'gangguan_pelayanan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Kriteria Gangguan Pelayanan',
                ],
            ],
            [
                'field' => 'level_dampak',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Kriteria Level',
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
                'gangguan_pelayanan'      => $gangguan_pelayanan,
                'keterangan'      => $keterangan,
                'level_dampak'      => $level_dampak,
                'reg'     => $reg,
            ];

            if ($id) {
                $this->db->update('ref_gangguan_pelayanan', $data, ['id' => $id]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('ref_gangguan_pelayanan', $data);
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
        $row = $this->db->get_where('ref_gangguan_pelayanan', ['id' => $id])->row();
        echo json_encode($row);
    }

    public function delete($id)
    {
        $delete = $this->db->delete('ref_gangguan_pelayanan', ['id' => $id]);
        if ($delete) {
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
}
