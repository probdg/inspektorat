<?php
defined('BASEPATH') or exit('No direct script access allowed');

// FORM 1B
class SumberData extends CI_Controller
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
        $tabel = 'dat_sumber_data';
        $column_order = array(null, 'sumberdata', 'kelemahan', 'klasifikasi', 'nilai');
        $coloumn_search = array('sumberdata', 'kelemahan', 'klasifikasi', 'nilai');
        $order_by = array('id' => 'asc');
        $join = [];
        $join[] = [
            'field' => 'm_f1a',
            'condition' => 'm_f1a.id = dat_sumber_data.klasifikasi',
            'direction' => 'left'
        ];
        $join[] = [
            'field' => 'c_f1a',
            'condition' => 'c_f1a.id = dat_sumber_data.sub_klasifikasi',
            'direction' => 'left'
        ];
        $where = [];
        $select = 'dat_sumber_data.*,m_f1a.question,c_f1a.question subQuestion';
        $group_by = [];
        $id = $this->input->post('opd');
        $tahun = $this->input->post('tahun');

        $where['opd_id'] = $id;
        $where['tahun'] = $tahun;
        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        $no = $this->input->post('start');

        foreach ($list as $list) {
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="edit_sumberdata(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $delete = ' <a class="btn btn-danger btn-icon btn-sm" href="javascript:void(0)"  title="Hapus" onclick="_delete_sumberdata(' . "'" . $list->id . "'" . ',' . "'" . $list->id . "'"  . ')"><i class="fa fa-trash"></i></a>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->sumberdata;
            $row[] = $list->kelemahan;
            $row[] = $list->question;
            $row[] = $list->subQuestion;

            $row[] = $list->nilai;
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
        $sumberdata = $this->input->post('sumberdata', TRUE);
        $opd_id = $this->input->post('opd_id', TRUE);
        $klasifikasi = $this->input->post('klasifikasi', TRUE);
        $sub_klasifikasi = $this->input->post('sub_klasifikasi', TRUE);
        $kelemahan = $this->input->post('kelemahan', TRUE);
        $nilai = $this->input->post('nilai', TRUE);
        $tahun = $this->input->post('tahun', TRUE);

        $id     = $this->input->post('id_sumberdata', TRUE);
        $config = [
            [
                'field' => 'sumberdata',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Sumber Data',
                ],
            ],
            [
                'field' => 'klasifikasi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan klasifikasi',
                ],
            ],
            // [
            //     'field' => 'sub_klasifikasi',
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => 'Masukan sub klasifikasi',
            //     ],
            // ],

            [
                'field' => 'tahun',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan tahun',
                ],
            ],


            [
                'field' => 'kelemahan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan kelemahan',
                ],
            ],

            [
                'field' => 'nilai',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukan Nilai',
                    'numeric' => 'Nilai Harus Angka',
                ],
            ],

        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'sumberdata'      => $sumberdata,
                'klasifikasi'      => $klasifikasi,
                'sub_klasifikasi'      => $sub_klasifikasi,
                'kelemahan'      => $kelemahan,
                'opd_id'    => $opd_id,
                'nilai'     => $nilai,
                'tahun'     => $tahun,
            ];

            if ($id) {
                $this->db->update('dat_sumber_data', $data, ['id' => $id]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('dat_sumber_data', $data);
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
        $row = $this->db->get_where('dat_sumber_data', ['id' => $id])->row();
        echo json_encode($row);
    }

    public function delete($id)
    {
        $delete = $this->db->delete('dat_sumber_data', ['id' => $id]);
        if ($delete) {
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
    public function export1b()
    {
        $id = $this->input->get('id_opd');
        $tahun = $this->input->get('tahun');
        $id_rpjmd = $this->input->get('id_rpjmd');
        $tabel = 'dat_sumber_data';
        $join = [];
        $join[] = [
            'field' => 'm_f1a',
            'condition' => 'm_f1a.id = dat_sumber_data.klasifikasi',
            'direction' => 'left'
        ];
        $join[] = [
            'field' => 'c_f1a',
            'condition' => 'c_f1a.id = dat_sumber_data.sub_klasifikasi',
            'direction' => 'left'
        ];
        $where = [];
        $select = 'dat_sumber_data.*,m_f1a.question,c_f1a.question subQuestion';
        $where['opd_id'] = $id;
        $where['tahun'] = $tahun;

        if ($join != []) {
            foreach ($join as $j) {
                if ($j['direction'] == "") {
                    $this->db->join($j['field'], $j['condition']);
                } else {
                    $this->db->join($j['field'], $j['condition'], $j['direction']);
                }
            }
        }
        $master =  $this->db->select($select)->from($tabel)->where($where)->order_by('id', 'asc')->get()->result();

        $opd = $this->db->get_where('ref_opd', ['id' => $id])->row_array();
        if ($opd) {
            $nama_opd = $opd['nama_opd'];
        } else {
            $nama_opd = '';
        }
        $pemda =  $this->db->get_where('ref_pemda', ['id' => 1])->row();

        $data = [
            'tahun'     => $tahun,
            'opd'    => $id,
            'master'    => $master,
            'periode' => $this->db->get_where('ref_rpjmd', ['id' => $id_rpjmd])->row_array()['nama_periode'],
            'nama_opd'       => $nama_opd,
            'pemda' => isset($pemda) ? $pemda->nama_pemda : '',

        ];

        $this->load->view('form/export1b', $data);
    }
    public function export()
    {
        header("Content-type: application/vnd-ms-excel;charset=utf-8;");
        header("Content-Disposition: attachment; filename=Form 1.a.1 Responden" . ".xls");
        $tahun = $this->input->get('tahun');
        $id_opd = $this->input->get('id_opd');
        $id_rpjmd = $this->input->get('id_rpjmd');
        $m1 =  $this->ref->m1();
        $master = [];
        foreach ($m1 as $m) {
            $detail = [];

            $answer = $this->db->get_where('f1a_answers', ['tahun_penilaian' => $tahun, 'opd_id' => $id_opd, 'id_master' => $m['id']])->result_array();
            if ($answer) {
                foreach ($answer as $a) {
                    $detail[] = [
                        'questions'     => $a['questions'],
                        'modus'         => $a['modus'],
                        'keterangan'    => $a['keterangan'],
                        'simpulan'      => $a['simpulan'],
                    ];
                }
            } else {
                $dataPertanyaan =  $this->db->get_where('c_f1a', ['id_master' => $m['id']])->result_array();
                foreach ($dataPertanyaan as $q) {
                    $detail[] = [
                        'questions'     => $q['question'],
                        'modus'         => '',
                        'keterangan'    => 'Belum di isi',
                        'simpulan'      => 'Belum di isi',
                    ];
                }
            }
            $master[] = [
                'urutan'    => $m['urutan'],
                'question'  => $m['question'],
                'detail'    => $detail,
            ];
        }
        $pemda =  $this->db->get_where('ref_pemda', ['id' => 1])->row();
        $opd = $this->db->get_where('ref_opd', ['id' => $id_opd])->row_array();
        if ($opd) {
            $nama_opd = $opd['nama_opd'];
        } else {
            $nama_opd = '';
        }
        $data = [
            'tahun'     => $tahun,
            'id_opd'    => $id_opd,
            'master'    => $master,
            'periode' => $this->db->get_where('ref_rpjmd', ['id' => $id_rpjmd])->row_array()['nama_periode'],
            'opd'       => $nama_opd,
            'pemda' => isset($pemda) ? $pemda->nama_pemda : '',

        ];

        $this->load->view('form/export1a', $data);
    }
    public function getSubKlasifikasi()
    {
        $id = $this->input->post('id_master');
        $data = $this->db->get_where('c_f1a', ['id_master' => $id])->result();
        echo json_encode($data);
    }
}
