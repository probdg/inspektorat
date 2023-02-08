<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form1c extends CI_Controller
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
        $coloumn_search = array('question');
        $order_by = array('id' => 'asc');
        $no = $this->input->post('start');
        $tahun = $this->input->post('tahun');
        $id_opd = $this->input->post('opd');
        $join = [];

        $where = [];
        $select = 'm_f1a.*';

        $group_by = [];
        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        foreach ($list as $list) {
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="edit_reviu(' . "'" . $list->id . "'," . "'" . $tahun . "'," . ')"><i class="fa fa-edit"></i></a>';
            $no++;
            $row = array();
            $row[] = $no;
            $getRow = $this->db->select('f1c_answers.simpulan,f1c_answers.penjelasan,f1c_answers.tahun,f1c_answers.uraian')
                ->from('f1c_answers')
                ->where('id_master', $list->id)
                ->where('tahun', $tahun)
                ->where('id_opd', $id_opd)
                ->get()->row();
            $row[] = $list->question;
            $dataReviu = $this->db->select('dat_sumber_data.*,c_f1a.question')->from('dat_sumber_data')
                ->join('c_f1a', 'c_f1a.id = dat_sumber_data.sub_klasifikasi', 'left')
                ->where(['klasifikasi' => $list->id, 'opd_id' => $id_opd, 'tahun' => $tahun])->get()->result();
            $htmlReviu = '<ol>';
            $htmlNilaiReviu = '<ol>';
            foreach ($dataReviu as $answer) {
                $htmlReviu      .= '<li>' . $answer->kelemahan . '</li>';
                $htmlNilaiReviu .= '<li>' . $answer->nilai . '</li>';
            }
            $htmlReviu .= '</ol>';
            $htmlNilaiReviu .= '</ol>';
            $row[] = $htmlNilaiReviu;
            $row[] = $htmlReviu;
            $dataSurvey = $this->db->get_where('f1a_answers', ['tahun_penilaian' => $tahun, 'opd_id' => $id_opd, 'id_master' => $list->id])->result_array();
            if ($dataSurvey) {
                $detail = [];
                foreach ($dataSurvey as $a) {
                    $detail[] =  intval($a['modus']);
                }
                $modus = $this->modus($detail);
                $nilai = $modus;
            } else {
                $nilai = '';
            }
            $row[] = $nilai;
            $row[] = isset($getRow) ? $getRow->uraian : '';
            $row[] = isset($getRow) ? $getRow->simpulan : '';
            $row[] = isset($getRow) ? $getRow->penjelasan : '';

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
    function keterangan($nilai)
    {
        if ($nilai < 3) {
            if ($nilai == 0) {
                $hasil =  'Belum di isi';
            } else {
                $hasil =  'Kurang Memadai';
            }
        } else {
            $hasil = 'Memadai';
        }
        return $hasil;
    }
    function simpulan($nilai)
    {
        if ($nilai < 3) {
            if ($nilai == 0) {
                $hasil =  'Belum di isi';
            } else {
                $hasil =  'Kurang Selaras ; Kurang Memadai ';
            }
        } else {
            $hasil = 'Selarasa; Memadai';
        }
        return $hasil;
    }
    function modus($array)
    {
        $v = array_count_values($array);
        arsort($v);
        foreach ($v as $k => $v) {
            $total = $k;
            break;
        }
        return $total;
    }
    public function save()
    {
        $hasil_reviu = $this->input->post('hasil_reviu', TRUE);
        $tahun       = $this->input->post('tahun', TRUE);
        $question       = $this->input->post('question', TRUE);
        $uraian       = $this->input->post('uraian', TRUE);
        $id_opd       = $this->input->post('opd_id', TRUE);

        $penjelasan  = $this->input->post("penjelasan_reviu", TRUE);
        $config = [
            [
                'field' => 'hasil_reviu',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Simpulan',
                ],
            ],
            [
                'field' => 'tahun',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan satuan',
                ],
            ],

            [
                'field' => 'penjelasan_reviu',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Penjelasan',
                ],
            ],
        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'simpulan'     => $hasil_reviu,
                'penjelasan'    => $penjelasan,
                'uraian'    => $uraian,
                'id_opd'    => $id_opd,
                'tahun'         => $tahun,
                'id_master'     => $question,
            ];

            $check =  $this->db->get_where('f1c_answers', ['tahun' => $tahun, 'id_master' => $question])->row();
            if ($check) {
                $this->db->update('f1c_answers', $data, ['tahun' => $tahun, 'id_master' => $question]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('f1c_answers', $data);
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

    public function edit()
    {
        $id = $this->input->post('id');
        $tahun = $this->input->post('tahun');
        $id_opd = $this->input->post('opd_id');
        $dataAnwers = $this->db->get_where('f1c_answers', ['tahun' => $tahun, 'id_master' => $id, 'id_opd' => $id_opd])->row();

        echo json_encode(['status' => true, 'data' =>  $dataAnwers, 'id_master_old' => $id]);
    }

    public function delete($id)
    {
        $delete = $this->db->delete('f1c_answers', ['id' => $id]);
        if ($delete) {
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
    public function export()
    {

        $tahun = $this->input->get('tahun');
        $id_opd = $this->input->get('id_opd');
        $id_rpjmd   = $this->input->get('id_rpjmd');
        if ($this->input->get('excel')) {
            header("Content-type: application/vnd-ms-excel;charset=utf-8;");
            header("Content-Disposition: attachment; filename=Form 1.c Simpulan CEE" . ".xls");
        }
        $tabel = 'm_f1a';
        $select = 'm_f1a.*';
        $this->db->select($select);
        $this->db->from($tabel);
        $this->db->join('f1c_answers', 'f1c_answers.id_master = m_f1a.id', 'left');
        $list = $this->db->get()->result();
        $row = [];

        $no = 1;
        foreach ($list as $list) {
            $getRow = $this->db->select('f1c_answers.simpulan,f1c_answers.penjelasan,f1c_answers.tahun,f1c_answers.uraian')
                ->from('f1c_answers')
                ->where('id_master', $list->id)
                ->where('tahun', $tahun)
                ->where('id_opd', $id_opd)
                ->get()->row();
            $dataReviu = $this->db->select('dat_sumber_data.*,c_f1a.question')->from('dat_sumber_data')
                ->join('c_f1a', 'c_f1a.id = dat_sumber_data.sub_klasifikasi', 'left')
                ->where(['klasifikasi' => $list->id, 'opd_id' => $id_opd, 'tahun' => $tahun])->get()->result();
            $reviu = [];
            foreach ($dataReviu as $answer) {
                $reviu[] = [
                    'kelemahan' => $answer->kelemahan,
                    'nilai'     => $answer->nilai,
                ];
            }
            $dataSurvey = $this->db->get_where('f1a_answers', ['tahun_penilaian' => $tahun, 'opd_id' => $id_opd, 'id_master' => $list->id])->result_array();
            if ($dataSurvey) {
                $detail = [];
                foreach ($dataSurvey as $a) {
                    $detail[] =  intval($a['modus']);
                }
                $modus = $this->modus($detail);
                $nilai = $modus;
            } else {
                $nilai = '';
            }

            $row[] = [
                'no'         => $no++,
                'question'   => $list->question,
                'nilai'      => $nilai,
                'keterangan' => isset($getRow) ? $getRow->uraian : '',
                'simpulan'   => isset($getRow) ? $getRow->simpulan : '',
                'penjelasan' => isset($getRow) ? $getRow->penjelasan : '',
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
        $this->load->view('form/export1c', $data);
    }
}
