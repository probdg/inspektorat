<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form9 extends CI_Controller
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


    public function dat_list_pemda()
    {
        $tabel = 'f3a_risk_pemda';
        $column_order = array(null, 'uraian_risiko', 'kode_risiko', null);
        $coloumn_search = array('uraian_risiko', 'kode_risiko');
        $order_by = array('id' => 'asc');
        $join = [];
        $where = [];
        $select = 'f8_pemda.*, f3a_risk_pemda.uraian_risiko, f3a_risk_pemda.kode_risiko';
        $group_by = [];
        $id = $this->input->post('rpjmd');
        $urusan = $this->input->post('urusan');
        $tahun = $this->input->post('tahun');
        $join[] = [
            'field' => 'f8_pemda',
            'condition' => 'f8_pemda.id_risk = f3a_risk_pemda.id',
            'direction' => ''
        ];
        $where['f3a_risk_pemda.id_rpjmd'] = $id;
        $where['f3a_risk_pemda.urusan'] = $urusan;
        $where['f3a_risk_pemda.tahun'] = $tahun;

        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        $no = $this->input->post('start');

        foreach ($list as $list) {
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="editPemantauanPemda(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $del   = '<a class="btn btn-danger btn-icon btn-sm" href="javascript:void(0)"  title="Hapus" onclick="delPemantauanPemda(' . "'" . $list->id . "'" . ')"><i class="fa fa-trash"></i></a>';

            $no++;
            $row = array();
            $getRow =  $this->db->get_where('f9_pemda', ['id_f8' => $list->id])->row();
            $row[] = $no;
            $row[] = $list->uraian_risiko;
            $row[] = $list->kode_risiko;
            $row[] = $list->kegiatan_pengendalian;
            $row[] = isset($getRow) ? $getRow->metode_pemantauan : '';
            $row[] = isset($getRow) ? $getRow->pj : '';
            $row[] = isset($getRow) ? $getRow->rencana_waktu_pemantauan : '';
            $row[] = isset($getRow) ? $getRow->realisasi_waktu_pemantauan : '';
            $row[] = isset($getRow) ? $getRow->keterangan : '';


            //add html for action
            $row[] = '<center>' . $edit . $del  . '</center>';
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
    public function dat_list_opd()
    {
        $tabel = 'f3b_risk_opd';
        $column_order = array(null, 'uraian_risiko', 'kode_risiko', null);
        $coloumn_search = array('uraian_risiko', 'kode_risiko');
        $order_by = array('id' => 'asc');
        $join = [];
        $where = [];
        $select = 'f8_opd.*, f3b_risk_opd.uraian_risiko, f3b_risk_opd.kode_risiko';
        $group_by = [];
        $id = $this->input->post('rpjmd');
        $urusan = $this->input->post('urusan');
        $tahun = $this->input->post('tahun');
        $opd = $this->input->post('opd');
        $join[] = [
            'field' => 'f8_opd',
            'condition' => 'f8_opd.id_risk = f3b_risk_opd.id',
            'direction' => ''
        ];
        $where['f3b_risk_opd.id_rpjmd'] = $id;
        $where['f3b_risk_opd.urusan'] = $urusan;
        $where['f3b_risk_opd.opd_id'] = $opd;

        $where['f3b_risk_opd.tahun'] = $tahun;

        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        $no = $this->input->post('start');

        foreach ($list as $list) {
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="editPemantauanOpd(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $del   = '<a class="btn btn-danger btn-icon btn-sm" href="javascript:void(0)"  title="Hapus" onclick="delPemantauanOpd(' . "'" . $list->id . "'" . ')"><i class="fa fa-trash"></i></a>';

            $no++;
            $row = array();
            $getRow =  $this->db->get_where('f9_opd', ['id_f8' => $list->id])->row();

            $row[] = $no;
            $row[] = $list->uraian_risiko;
            $row[] = $list->kode_risiko;
            $row[] = $list->kegiatan_pengendalian;
            $row[] = isset($getRow) ? $getRow->metode_pemantauan : '';
            $row[] = isset($getRow) ? $getRow->pj : '';
            $row[] = isset($getRow) ? $getRow->rencana_waktu_pemantauan : '';
            $row[] = isset($getRow) ? $getRow->realisasi_waktu_pemantauan : '';
            $row[] = isset($getRow) ? $getRow->keterangan : '';

            //add html for action
            $row[] = '<center>' . $edit . $del  . '</center>';
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
    public function dat_list_operasional()
    {
        $tabel = 'f3c_risk_operasional';
        $column_order = array(null, 'uraian_risiko', 'kode_risiko',  null);
        $coloumn_search = array('uraian_risiko', 'kode_risiko');
        $order_by = array('id' => 'asc');
        $join = [];
        $join[] = [
            'field' => 'f8_operasional',
            'condition' => 'f8_operasional.id_risk = f3c_risk_operasional.id',
            'direction' => ''
        ];
        $where = [];
        $select = 'f8_operasional.* , f3c_risk_operasional.uraian_risiko, f3c_risk_operasional.kode_risiko';
        $group_by = [];
        $id = $this->input->post('rpjmd');
        $urusan = $this->input->post('urusan');
        $tahun = $this->input->post('tahun');
        $opd = $this->input->post('opd');
        $where['f3c_risk_operasional.id_rpjmd'] = $id;
        $where['f3c_risk_operasional.urusan'] = $urusan;
        $where['f3c_risk_operasional.opd_id'] = $opd;

        $where['f3c_risk_operasional.tahun'] = $tahun;

        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        $no = $this->input->post('start');

        foreach ($list as $list) {
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="editPemantauanOperasional(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $del   = '<a class="btn btn-danger btn-icon btn-sm" href="javascript:void(0)"  title="Hapus" onclick="delPemantauanOperasional(' . "'" . $list->id . "'" . ')"><i class="fa fa-trash"></i></a>';

            $no++;
            $row = array();
            $getRow =  $this->db->get_where('f9_operasional', ['id_f8' => $list->id])->row();
            $row[] = $no;
            $row[] = $list->uraian_risiko;
            $row[] = $list->kode_risiko;
            $row[] = $list->kegiatan_pengendalian;
            $row[] = isset($getRow) ? $getRow->metode_pemantauan : '';
            $row[] = isset($getRow) ? $getRow->pj : '';
            $row[] = isset($getRow) ? $getRow->rencana_waktu_pemantauan : '';
            $row[] = isset($getRow) ? $getRow->realisasi_waktu_pemantauan : '';
            $row[] = isset($getRow) ? $getRow->keterangan : '';


            //add html for action
            $row[] = '<center>' . $edit . $del  . '</center>';
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


    public function edit_pemda()
    {
        $id = $this->input->post('id');
        $getRow = $this->db->get_where('f8_pemda', ['id' => $id])->row();
        $row = $this->db->get_where('f9_pemda', ['id_f8' => $id])->row();
        echo json_encode(['status' => true, 'data' => $row, 'kegiatan_pengendalian' => $getRow->kegiatan_pengendalian]);
    }

    public function edit_opd()
    {
        $id = $this->input->post('id');
        $getRow = $this->db->get_where('f8_opd', ['id' => $id])->row();
        $row = $this->db->get_where('f9_pemda', ['id_f8' => $id])->row();
        echo json_encode(['status' => true, 'data' => $row, 'kegiatan_pengendalian' => $getRow->kegiatan_pengendalian]);
    }
    public function edit_operasional()
    {
        $id = $this->input->post('id');
        $getRow = $this->db->get_where('f8_operasional', ['id' => $id])->row();
        $row = $this->db->get_where('f9_operasional', ['id_f8' => $id])->row();
        echo json_encode(['status' => true, 'data' => $row, 'kegiatan_pengendalian' => $getRow->kegiatan_pengendalian]);
    }

    public function save_pemda()
    {
        $metode_pemantauan = $this->input->post('metode_pemantauan', TRUE);
        $pj = $this->input->post('pj', TRUE);
        $rencana_waktu_pemantauan = $this->input->post('rencana_waktu_pemantauan', TRUE);
        $realisasi_waktu_pemantauan = $this->input->post('realisasi_waktu_pemantauan', TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $risk_pemda  = $this->input->post("risk_pemda", TRUE);
        $config = [
            [
                'field' => 'rencana_waktu_pemantauan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Rencana Waktu Pelaksanaan',
                ],
            ],
            [
                'field' => 'realisasi_waktu_pemantauan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Realisasi Waktu Pelaksanaan',
                ],
            ],
            [
                'field' => 'risk_pemda',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Risiko Pemda',
                ],
            ],
            [
                'field' => 'metode_pemantauan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Metode Pemantauan',
                ],
            ],
            [
                'field' => 'pj',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Penanggung Jawab',
                ],
            ],
        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'id_f8'                     => $risk_pemda,
                'metode_pemantauan'         => $metode_pemantauan,
                'rencana_waktu_pemantauan'  => $rencana_waktu_pemantauan,
                'realisasi_waktu_pemantauan' => $realisasi_waktu_pemantauan,
                'keterangan'                => $keterangan,
                'pj'                        => $pj,


            ];
            $check = $this->db->get_where('f9_pemda',  ['id_f8' => $risk_pemda])->row();

            if ($check) {
                $this->db->update('f9_pemda', $data, ['id_f8' => $risk_pemda]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('f9_pemda', $data);
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


    public function save_opd()
    {
        $metode_pemantauan = $this->input->post('metode_pemantauan', TRUE);
        $rencana_waktu_pemantauan = $this->input->post('rencana_waktu_pemantauan', TRUE);
        $realisasi_waktu_pemantauan = $this->input->post('realisasi_waktu_pemantauan', TRUE);
        $risk_opd  = $this->input->post("risk_opd", TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);
        $pj = $this->input->post('pj', TRUE);

        $config = [

            [
                'field' => 'rencana_waktu_pemantauan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Rencana Waktu Pelaksanaan',
                ],
            ],
            [
                'field' => 'realisasi_waktu_pemantauan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Realisasi Waktu Pelaksanaan',
                ],
            ],
            [
                'field' => 'risk_opd',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Risiko OPD',
                ],
            ], [
                'field' => 'metode_pemantauan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Metode Pemantauan',
                ],
            ],
            [
                'field' => 'pj',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Penanggung Jawab',
                ],
            ],
        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'id_f8'               => $risk_opd,
                'metode_pemantauan'                 => $metode_pemantauan,
                'rencana_waktu_pemantauan' => $rencana_waktu_pemantauan,
                'realisasi_waktu_pemantauan' => $realisasi_waktu_pemantauan,
                'keterangan'            => $keterangan,
                'pj'            => $pj,

            ];

            $check = $this->db->get_where('f9_opd', ['id_f8' => $risk_opd])->row();

            if ($check) {
                $this->db->update('f9_opd', $data, ['id_f8' => $risk_opd]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('f9_opd', $data);
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

    public function save_operasional()
    {
        $metode_pemantauan = $this->input->post('metode$metode_pemantauan', TRUE);
        $pj = $this->input->post('pj', TRUE);

        $rencana_waktu_pemantauan = $this->input->post('rencana_waktu_pemantauan', TRUE);
        $realisasi_waktu_pemantauan = $this->input->post('realisasi_waktu_pemantauan', TRUE);
        $risk_operasional  = $this->input->post("risk_operasional", TRUE);
        $keterangan = $this->input->post('keterangan', TRUE);

        $config = [


            [
                'field' => 'rencana_waktu_pemantauan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Rencana Waktu Pelaksanaan',
                ],
            ],
            [
                'field' => 'realisasi_waktu_pemantauan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Realisasi Waktu Pelaksanaan',
                ],
            ],
            [
                'field' => 'risk_operasional',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Risiko Operasional',
                ], [
                    'field' => 'metode_pemantauan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Masukan Metode Pemantauan',
                    ],
                ],
                [
                    'field' => 'pj',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Masukan Penanggung Jawab',
                    ],
                ],
            ],
        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'id_f8'               => $risk_operasional,
                'metode_pemantauan'                 => $metode_pemantauan,
                'rencana_waktu_pemantauan' => $rencana_waktu_pemantauan,
                'realisasi_waktu_pemantauan' => $realisasi_waktu_pemantauan,
                'keterangan'            => $keterangan,
                'pj'            => $pj,

            ];

            $check = $this->db->get_where('f9_operasional',  ['id_f8' => $risk_operasional])->row();

            if ($check) {
                $this->db->update('f9_operasional', $data, ['id_f8' => $risk_operasional]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('f9_operasional', $data);
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

        $id_rpjmd = $this->input->post('id_rpjmd', TRUE);
        $tahun = $this->input->post('tahun', TRUE);
        $opd_id = $this->input->post('id_opd', TRUE);
        $urusan = $this->input->post('urusan', TRUE);
        $sasaran = $this->db->select('ref_sasaran_strategis.*')
            ->from('ref_sasaran_strategis')
            ->where('id_rpjmd', $id_rpjmd)->get()->result_array();
        $tujuan = $this->db->select('ref_tujuan_strategis.*')
            ->from('ref_tujuan_strategis')
            ->where('id_rpjmd', $id_rpjmd)->get()->result_array();
        $misi = $this->db->select('ref_misi_strategis.*')
            ->from('ref_misi_strategis')
            ->where('id_rpjmd', $id_rpjmd)->get()->result_array();
        $iku = $this->db->get_where('ref_iku', ['id_rpjmd' => $id_rpjmd])->result_array();
        $komite = $this->db->get_where('f2a_komite_pemda', ['id_rpjmd' => $id_rpjmd, 'tahun' => $tahun, 'opd_id' => $opd_id])->row_array();
        $prioritas = $this->db->get_where('ref_prioritas', ['id_rpjmd' => $id_rpjmd])->result_array();

        $konteks = $this->db->select('f2a_konteks_risiko.tujuan id_tujuan,ref_misi_strategis.misi, ref_tujuan_strategis.tujuan, ref_iku.iku, ref_prioritas.id id_prioritas , ref_prioritas.prioritas,ref_urusan.urusan')
            ->from('f2a_konteks_risiko')
            ->join('ref_misi_strategis', 'ref_misi_strategis.id = f2a_konteks_risiko.misi')
            ->join('ref_tujuan_strategis', 'ref_tujuan_strategis.id = f2a_konteks_risiko.tujuan')
            ->join('ref_iku', 'ref_iku.id = f2a_konteks_risiko.iku')
            ->join('ref_prioritas', 'ref_prioritas.id = f2a_konteks_risiko.prioritas')
            ->join('ref_urusan', 'ref_urusan.id = f2a_konteks_risiko.urusan')
            ->where('tahun', $tahun)
            ->where('f2a_konteks_risiko.urusan', $urusan)->get()->row_array();
        if ($konteks) {
            $kontekSasaran = $this->db->select('ref_sasaran_strategis.id,ref_sasaran_strategis.sasaran, ref_sasaran_strategis.no_urut')
                ->from('ref_tujuan_sasaran')
                ->join('ref_sasaran_strategis', 'ref_sasaran_strategis.id = ref_tujuan_sasaran.id_sasaran')
                ->where('ref_tujuan_sasaran.id_rpjmd', $id_rpjmd)
                ->where('ref_tujuan_sasaran.id', $konteks['id_tujuan'])
                ->get()->result_array();
            $id_sasaran = [];
            foreach ($kontekSasaran as $ks) {
                $id_sasaran[] = $ks['id'];
            }
            $dinas =  $this->db->select('ref_opd.nama_opd, ref_opd.id')
                ->from('dat_sasaran_strategis_pemda')
                ->join('ref_opd', 'ref_opd.id = dat_sasaran_strategis_pemda.id_pemda')
                ->where_in('id_sasaran', $id_sasaran)
                ->get()->result_array();
        } else {
            $kontekSasaran = [];
            $dinas = [];
        }
        $opd = $this->db->get_where('ref_opd', ['id' => $opd_id])->row_array();
        if ($opd) {
            $nama_opd = $opd['nama_opd'];
        } else {
            $nama_opd = '';
        }
        $data = [
            'dinas' => $dinas,
            'komite' => $komite,
            'sasaran' => $sasaran,
            'tujuan' => $tujuan,
            'misi' => $misi,
            'nama_opd'  => $nama_opd,
            'iku' => $iku,
            'pemda' => $this->db->get_where('ref_pemda', ['id' => 1])->row()->nama_pemda,
            'prioritas' => $prioritas,
            'tahun' => $tahun,
            'kontekSasaran' => $kontekSasaran,
            'konteks' => $konteks,
            'periode' => $this->db->get_where('ref_rpjmd', ['id' => $id_rpjmd])->row_array()['nama_periode'],
        ];
        $risk_pemda = $this->db->select('f3a_risk_pemda.id, f3a_risk_pemda.kode_risiko, f3a_risk_pemda.uraian_risiko')
            ->from('f8_pemda')
            ->join('f3a_risk_pemda', 'f3a_risk_pemda.id = f8_pemda.id_risk')
            ->where('f3a_risk_pemda.id_rpjmd', $id_rpjmd)
            ->where('f3a_risk_pemda.tahun', $tahun)
            ->where('f3a_risk_pemda.urusan', $urusan)
            ->group_by('f3a_risk_pemda.id')
            ->get()->result_array();
        $data['risk_pemda'] = [];
        foreach ($risk_pemda as $risk_pemda) {
            $detail_pemda = $this->db->get_where('f8_pemda', ['id_risk' => $risk_pemda['id']])->result_array();
            $detailRiskPemda = [];
            foreach ($detail_pemda as $d_pemda) {
                $getRowPemda = $this->db->get_where('f9_pemda', ['id_f8' => $d_pemda['id']])->row_array();
                $detailRiskPemda[] = [
                    'kegiatan_pengendalian' => $d_pemda['kegiatan_pengendalian'],
                    'pj'                => !empty($getRowPemda) ? $getRowPemda['pj'] : '',
                    'metode_pemantauan' => !empty($getRowPemda) ? $getRowPemda['metode_pemantauan'] : '',
                    'rencana_waktu_pemantauan' => !empty($getRowPemda) ? $getRowPemda['rencana_waktu_pemantauan'] : '',
                    'realisasi_waktu_pemantauan' => !empty($getRowPemda) ? $getRowPemda['realisasi_waktu_pemantauan'] : '',
                    'keterangan' => !empty($getRowPemda) ? $getRowPemda['keterangan'] : '',
                ];
            }
            $data['risk_pemda'][] = [
                'kode_risiko' => $risk_pemda['kode_risiko'],
                'uraian_risiko' => $risk_pemda['uraian_risiko'],
                'detail' => $detailRiskPemda
            ];
        }
        $data['risk_opd'] = [];
        $data['risk_operasional'] = [];
        if ($opd_id == 56) {
            foreach ($dinas as $d) {
                $risk_opd = $this->db->select('f3b_risk_opd.id,f3b_risk_opd.uraian_risiko , f3b_risk_opd.kode_risiko')
                    ->from('f8_opd')
                    ->join('f3b_risk_opd', 'f3b_risk_opd.id = f8_opd.id_risk')
                    ->where('f3b_risk_opd.id_rpjmd', $id_rpjmd)
                    ->where('f3b_risk_opd.tahun', $tahun)
                    ->where('f3b_risk_opd.opd_id', $d['id'])
                    ->where('f3b_risk_opd.urusan', $urusan)
                    ->group_by('f3b_risk_opd.id')
                    ->get()->result_array();
                $detail_risiko_opd = [];

                foreach ($risk_opd as $risk_opd) {
                    $detail_opd = $this->db->get_where('f8_opd', ['id_risk' => $risk_opd['id']])->result_array();
                    $detailRiskOpd = [];
                    foreach ($detail_opd as $d_opd) {
                        $getRowOpd = $this->db->get_where('f9_pemda', ['id_f8' => $d_opd['id']])->row_array();
                        $detailRiskOpd[] = [
                            'kegiatan_pengendalian' => $d_opd['kegiatan_pengendalian'],
                            'pj'                => !empty($getRowOpd) ? $getRowOpd['pj'] : '',
                            'metode_pemantauan' => !empty($getRowOpd) ? $getRowOpd['metode_pemantauan'] : '',
                            'rencana_waktu_pemantauan' => !empty($getRowOpd) ? $getRowOpd['rencana_waktu_pemantauan'] : '',
                            'realisasi_waktu_pemantauan' => !empty($getRowOpd) ? $getRowOpd['realisasi_waktu_pemantauan'] : '',
                            'keterangan' => !empty($getRowOpd) ? $getRowOpd['keterangan'] : '',
                        ];
                    }
                    $detail_risiko_opd[] = [
                        'kode_risiko' => $risk_opd['kode_risiko'],
                        'uraian_risiko' => $risk_opd['uraian_risiko'],
                        'detail' => $detailRiskOpd
                    ];
                }
                $data['risk_opd'][] = [
                    'nama_opd' => $d['nama_opd'],
                    'detail_risiko' => $detail_risiko_opd
                ];
                $risk_operasional = $this->db->select('f3c_risk_operasional.id, f3c_risk_operasional.uraian_risiko , f3c_risk_operasional.kode_risiko')
                    ->from('f8_operasional')
                    ->join('f3c_risk_operasional', 'f3c_risk_operasional.id = f8_operasional.id_risk')
                    ->where('f3c_risk_operasional.id_rpjmd', $id_rpjmd)
                    ->where('f3c_risk_operasional.tahun', $tahun)
                    ->where('f3c_risk_operasional.opd_id', $d['id'])
                    ->where('f3c_risk_operasional.urusan', $urusan)
                    ->group_by('f3c_risk_operasional.id')

                    ->get()->result_array();
                $detail_risk_operasional = [];
                foreach ($risk_operasional as $risk_operasional) {
                    $detail_operasional = $this->db->get_where('f8_operasional', ['id_risk' => $risk_operasional['id']])->result_array();
                    $detailRiskOperasional = [];
                    foreach ($detail_operasional as $d_operasional) {
                        $getRowOperasional = $this->db->get_where('f9_operasional', ['id_f8' => $d_operasional['id']])->row_array();
                        $detailRiskOperasional[] = [
                            'kegiatan_pengendalian' => $d_operasional['kegiatan_pengendalian'],
                            'pj'                => !empty($getRowOperasional) ? $getRowOperasional['pj'] : '',
                            'metode_pemantauan' => !empty($getRowOperasional) ? $getRowOperasional['metode_pemantauan'] : '',
                            'rencana_waktu_pemantauan' => !empty($getRowOperasional) ? $getRowOperasional['rencana_waktu_pemantauan'] : '',
                            'realisasi_waktu_pemantauan' => !empty($getRowOperasional) ? $getRowOperasional['realisasi_waktu_pemantauan'] : '',
                            'keterangan' => !empty($getRowOperasional) ? $getRowOperasional['keterangan'] : '',
                        ];
                    }
                    $detail_risk_operasional[] = [
                        'kode_risiko' => $risk_operasional['kode_risiko'],
                        'uraian_risiko' => $risk_operasional['uraian_risiko'],
                        'detail' => $detailRiskOperasional
                    ];
                }
                $data['risk_operasional'][] = [
                    'nama_opd'    => $d['nama_opd'],
                    'detail_risiko' => $detail_risk_operasional

                ];
            }
        } else {
            $risk_opd = $this->db->select('f3b_risk_opd.id,f3b_risk_opd.uraian_risiko , f3b_risk_opd.kode_risiko')
                ->from('f8_opd')
                ->join('f3b_risk_opd', 'f3b_risk_opd.id = f8_opd.id_risk')
                ->where('f3b_risk_opd.id_rpjmd', $id_rpjmd)
                ->where('f3b_risk_opd.tahun', $tahun)
                ->where('f3b_risk_opd.opd_id', $opd_id)
                ->where('f3b_risk_opd.urusan', $urusan)
                ->group_by('f3b_risk_opd.id')
                ->get()->result_array();
            $detail_risiko_opd = [];
            foreach ($risk_opd as $risk_opd) {
                $detail_opd = $this->db->get_where('f8_opd', ['id_risk' => $risk_opd['id']])->result_array();
                $detailRiskOpd = [];
                foreach ($detail_opd as $d_opd) {
                    $getRowOpd = $this->db->get_where('f9_opd', ['id_f8' => $d_opd['id']])->row_array();
                    $detailRiskOpd[] = [
                        'kegiatan_pengendalian' => $d_opd['kegiatan_pengendalian'],
                        'pj'                => !empty($getRowOpd) ? $getRowOpd['pj'] : '',
                        'metode_pemantauan' => !empty($getRowOpd) ? $getRowOpd['metode_pemantauan'] : '',
                        'rencana_waktu_pemantauan' => !empty($getRowOpd) ? $getRowOpd['rencana_waktu_pemantauan'] : '',
                        'realisasi_waktu_pemantauan' => !empty($getRowOpd) ? $getRowOpd['realisasi_waktu_pemantauan'] : '',
                        'keterangan' => !empty($getRowOpd) ? $getRowOpd['keterangan'] : '',
                    ];
                }
                $detail_risiko_opd[] = [
                    'kode_risiko' => $risk_opd['kode_risiko'],
                    'uraian_risiko' => $risk_opd['uraian_risiko'],
                    'detail' => $detailRiskOpd
                ];
            }
            $data['risk_opd'][] = [
                'nama_opd'    => $nama_opd,
                'detail_risiko' => $detail_risiko_opd,

            ];
            $risk_operasional = $this->db->select('f3c_risk_operasional.id, f3c_risk_operasional.uraian_risiko , f3c_risk_operasional.kode_risiko')
                ->from('f8_operasional')
                ->join('f3c_risk_operasional', 'f3c_risk_operasional.id = f8_operasional.id_risk')
                ->where('f3c_risk_operasional.id_rpjmd', $id_rpjmd)
                ->where('f3c_risk_operasional.tahun', $tahun)
                ->where('f3c_risk_operasional.opd_id', $opd_id)
                ->where('f3c_risk_operasional.urusan', $urusan)
                ->group_by('f3c_risk_operasional.id')

                ->get()->result_array();
            $detail_risk_operasional = [];

            foreach ($risk_operasional as $risk_operasional) {
                $detail_operasional = $this->db->get_where('f8_operasional', ['id_risk' => $risk_operasional['id']])->result_array();
                $detailRiskOperasional = [];
                foreach ($detail_operasional as $d_operasional) {
                    $getRowOperasional = $this->db->get_where('f9_operasional', ['id_f8' => $d_operasional['id']])->row_array();
                    $detailRiskOperasional[] = [
                        'kegiatan_pengendalian' => $d_operasional['kegiatan_pengendalian'],
                        'pj'                => !empty($getRowOperasional) ? $getRowOperasional['pj'] : '',
                        'metode_pemantauan' => !empty($getRowOperasional) ? $getRowOperasional['metode_pemantauan'] : '',
                        'rencana_waktu_pemantauan' => !empty($getRowOperasional) ? $getRowOperasional['rencana_waktu_pemantauan'] : '',
                        'realisasi_waktu_pemantauan' => !empty($getRowOperasional) ? $getRowOperasional['realisasi_waktu_pemantauan'] : '',
                        'keterangan' => !empty($getRowOperasional) ? $getRowOperasional['keterangan'] : '',
                    ];
                }
                $detail_risk_operasional[] = [
                    'kode_risiko' => $risk_operasional['kode_risiko'],
                    'uraian_risiko' => $risk_operasional['uraian_risiko'],
                    'detail' => $detailRiskOperasional
                ];
            }
            $data['risk_operasional'][] = [
                'nama_opd'    => $nama_opd,
                'detail_risiko' => $detail_risk_operasional

            ];
        }
        // echo json_encode($data);
        $this->load->view('form/export9', $data);
    }
}
