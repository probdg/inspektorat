<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tujuan extends CI_Controller
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
            'subtitle' => 'Tujuan Strategis Pemda',
            'sess_opd'  => $this->session->userdata('opd'),
            'namaPemda' => $namaPemda,
            'idPemda'   => $idPemda,
            'content'   => 'panel/tujuan/index',
            'js'        => 'panel/tujuan/js',
            'rpjmd'     => $this->ref->rpjmd()
        ];
        $this->load->view('layout/content', $data);
    }
    public function dat_list()
    {
        $tabel = 'ref_tujuan_strategis';
        $column_order = array(null, 'tujuan');
        $coloumn_search = array('tujuan');
        $order_by = array('id' => 'asc');
        $join = [];
        $where = [];
        $select = '*';
        $group_by = [];
        $rpjmd = $this->input->post('rpjmd');
        $where['id_rpjmd'] = $rpjmd;
        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        $no = $this->input->post('start');

        foreach ($list as $list) {
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="edit(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $delete = ' <a class="btn btn-danger btn-icon btn-sm" href="javascript:void(0)"  title="Hapus" onclick="_delete(' . "'" . $list->id . "'" . ',' . "'" . substr($list->tujuan, 0, 10) . "'"  . ')"><i class="fa fa-trash"></i></a>';


            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->tujuan;
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
        $tujuan = $this->input->post('tujuan', TRUE);
        $rpjmd = $this->input->post('rpjmd', TRUE);
        $no_urut = $this->input->post('no_urut', TRUE);

        $id     = $this->input->post('id', TRUE);
        $config = [
            [
                'field' => 'tujuan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Tujuan Strategis',
                ],
            ],
            [
                'field' => 'rpjmd',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih RPJMD',
                ],
            ],
            [
                'field' => 'no_urut',
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
                'tujuan'      => $tujuan,
                'id_rpjmd'    => $rpjmd,
                'no_urut'     => $no_urut,
            ];

            if ($id) {
                $this->db->update('ref_tujuan_strategis', $data, ['id' => $id]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('ref_tujuan_strategis', $data);
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
        $row = $this->db->get_where('ref_tujuan_strategis', ['id' => $id])->row();
        echo json_encode($row);
    }

    public function delete($id)
    {
        $delete = $this->db->delete('ref_tujuan_strategis', ['id' => $id]);
        if ($delete) {
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
}
