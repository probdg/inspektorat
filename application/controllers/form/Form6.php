<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form6 extends CI_Controller
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


    public function dat_list()
    {
        $tabel = 'm_f1a';
        $column_order = array(null,  'question', null, null);
        $coloumn_search = array('question', 'sumberdata');
        $order_by = array('id' => 'asc');
        $no = $this->input->post('start');
        $tahun = $this->input->post('tahun');
        $id_opd = $this->input->post('opd');
        $join = [];
        $join[] = [
            'field' => 'dat_sumber_data',
            'condition' => 'dat_sumber_data.klasifikasi = m_f1a.id',
            'direction' => '',
            // 'direction' => 'left'
        ];


        $where['opd_id'] = $id_opd;
        // $where['tahun'] = $tahun;
        $select = 'm_f1a.* ,dat_sumber_data.id id_sumber, dat_sumber_data.kelemahan';

        $group_by = [];
        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        foreach ($list as $list) {
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="edit_rtp(' . "'" . $list->id_sumber . "'," . "'" . $tahun . "'," . ')"><i class="fa fa-edit"></i></a>';
            $row = array();
            $no++;

            $rtp =  $this->db->get_where('f6', ['id_sumber' => $list->id_sumber])->row();

            $row[] =  getRomawi($no) . '.' . $list->question;
            $row[] =  $list->kelemahan;
            $row[] =  !empty($rtp) ? $rtp->rencana_perbaikan : '';
            $row[] =  !empty($rtp) ? $rtp->pj : '';
            $row[] =  !empty($rtp) ? $rtp->twp : '';
            $row[] =  !empty($rtp) ? $rtp->realisasi_penyelesaian : '';

            //add html for action
            $row[] = '<center>' . $edit  . '</center>';
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
    public function edit()
    {
        $id = $this->input->post('id');
        $dataAnwers = $this->db->get_where('f6', ['id_sumber' => $id])->row();
        $sumber = $this->db->get_where('dat_sumber_data', ['id' => $id])->row();
        echo json_encode(['status' => true, 'kelemahan' => $sumber->kelemahan, 'data' =>  $dataAnwers, 'id_master_old' => $id]);
    }
    public function save()
    {
        $rencana_perbaikan = $this->input->post('rencana_perbaikan', TRUE);
        $twp = $this->input->post('twp', TRUE);
        $pj = $this->input->post('pj', TRUE);
        $realisasi_penyelesaian = $this->input->post('realisasi_penyelesaian', TRUE);

        $id  = $this->input->post("id", TRUE);
        $config = [
            [
                'field' => 'rencana_perbaikan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Rencana Perbaikan',
                ],
            ],
            [
                'field' => 'realisasi_penyelesaian',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Realisasi Penyelesaian',
                ],
            ],
        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'id_sumber' => $id,
                'rencana_perbaikan'     => $rencana_perbaikan,
                'realisasi_penyelesaian'    => $realisasi_penyelesaian,
                'twp'    => $twp,
                'pj'    => $pj,
            ];

            $check =  $this->db->get_where('f6', ['id_sumber' => $id])->row();
            if ($check) {
                $this->db->update('f6', $data, ['id_sumber' => $id]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('f6', $data);
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
    public function export()
    {

        $tahun = $this->input->post('tahun');
        $id_opd = $this->input->post('id_opd');
        $id_rpjmd   = $this->input->post('id_rpjmd');
        // if ($this->input->get('excel')) {
        //     header("Content-type: application/vnd-ms-excel;charset=utf-8;");
        //     header("Content-Disposition: attachment; filename=Form 1.c Simpulan CEE" . ".xls");
        // }
        $tabel = 'm_f1a';
        $select = 'm_f1a.*';
        $this->db->select($select);
        $this->db->from($tabel);
        $this->db->join('f1c_answers', 'f1c_answers.id_master = m_f1a.id', 'left');
        $list = $this->db->get()->result();
        $row = [];
        $no = 1;
        foreach ($list as $list) {
            $dataReviu = $this->db->select('dat_sumber_data.*,c_f1a.question')
                ->from('dat_sumber_data')
                ->join('c_f1a', 'c_f1a.id = dat_sumber_data.sub_klasifikasi', 'left')
                ->where(['klasifikasi' => $list->id, 'opd_id' => $id_opd, 'tahun' => $tahun])
                ->get()->result();
            $reviu = [];
            foreach ($dataReviu as $answer) {
                $rtp =  $this->db->get_where('f6', ['id_sumber' => $answer->id])->row();
                $reviu[] = [
                    'kelemahan' => $answer->kelemahan,
                    'rencana_perbaikan' => !empty($rtp) ? $rtp->rencana_perbaikan : '',
                    'pj' => !empty($rtp) ? $rtp->pj : '',
                    'twp' => !empty($rtp) ? $rtp->twp : '',
                    'realisasi_penyelesaian' => !empty($rtp) ? $rtp->realisasi_penyelesaian : '',
                ];
            }
            $row[] = [
                'id'         => $list->id,
                'no'         => $no++,
                'question'   => $list->question,
                'reviu'      => $reviu,
            ];
            //add html for action
        }
        $pemda =  $this->db->get_where('ref_pemda', ['id' => 1])->row();

        $opd = $this->db->get_where('ref_opd', ['id' => $id_opd])->row_array();
        if ($opd) {
            $nama_opd = $opd['nama_opd'];
        } else {
            $nama_opd = '';
        }
        $data = [
            'pemda' => isset($pemda) ? $pemda->nama_pemda : '',
            'data' => $row,
            'tahun' => $tahun,
            'nama_opd' => $nama_opd,
            'opd'   => $id_opd,
            'periode' => $this->db->get_where('ref_rpjmd', ['id' => $id_rpjmd])->row_array()['nama_periode'],
        ];
        // echo json_encode($row);
        $this->load->view('form/export6', $data);
    }
}
