<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form7 extends CI_Controller
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
        $select = 'f3a_risk_pemda.*';
        $group_by = [];
        $id = $this->input->post('rpjmd');
        $urusan = $this->input->post('urusan');
        $tahun = $this->input->post('tahun');

        $where['f3a_risk_pemda.id_rpjmd'] = $id;
        $where['f3a_risk_pemda.urusan'] = $urusan;
        $where['f3a_risk_pemda.tahun'] = $tahun;

        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        $no = $this->input->post('start');

        foreach ($list as $list) {
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="editPengendalianPemda(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $no++;
            $row = array();
            $getKendali = $this->db->get_where('f7_pemda', ['id_risk' => $list->id])->row();

            $row[] = $no;
            $row[] = $list->uraian_risiko;
            $row[] = $list->kode_risiko;
            $row[] = !empty($getKendali) ? $getKendali->uraian_pengendalian : '';
            $row[] = !empty($getKendali) ? celah($getKendali->celah_pengendalian) : '';
            $row[] = !empty($getKendali) ? $getKendali->rencana_tindak_pengendalian : '';
            $row[] = $list->pemilik;
            $row[] = !empty($getKendali) ? $getKendali->twp : '';

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
    public function dat_list_opd()
    {
        $tabel = 'f3b_risk_opd';
        $column_order = array(null, 'uraian_risiko', 'kode_risiko', null);
        $coloumn_search = array('uraian_risiko', 'kode_risiko');
        $order_by = array('id' => 'asc');
        $join = [];
        $where = [];
        $select = 'f3b_risk_opd.*';
        $group_by = [];
        $id = $this->input->post('rpjmd');
        $urusan = $this->input->post('urusan');
        $tahun = $this->input->post('tahun');
        $opd = $this->input->post('opd');

        $where['f3b_risk_opd.id_rpjmd'] = $id;
        $where['f3b_risk_opd.urusan'] = $urusan;
        $where['f3b_risk_opd.opd_id'] = $opd;

        $where['f3b_risk_opd.tahun'] = $tahun;

        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        $no = $this->input->post('start');

        foreach ($list as $list) {
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="editPengendalianOpd(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $no++;
            $row = array();
            $getKendali = $this->db->get_where('f7_opd', ['id_risk' => $list->id])->row();

            $row[] = $no;
            $row[] = $list->uraian_risiko;
            $row[] = $list->kode_risiko;
            $row[] = !empty($getKendali) ? $getKendali->uraian_pengendalian : '';
            $row[] = !empty($getKendali) ? celah($getKendali->celah_pengendalian) : '';
            $row[] = !empty($getKendali) ? $getKendali->rencana_tindak_pengendalian : '';
            $row[] = $list->pemilik;
            $row[] = !empty($getKendali) ? $getKendali->twp : '';


            //add html for action
            $row[] = '<center>' . $edit . '</center>';
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
            'field' => 'f2c_output',
            'condition' => 'f2c_output.id = f3c_risk_operasional.kegiatan',
            'direction' => 'left'
        ];
        $where = [];
        $select = 'f3c_risk_operasional.*';
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
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="editPengendalianOperasional(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $no++;
            $row = array();
            $getKendali = $this->db->get_where('f7_operasional', ['id_risk' => $list->id])->row();

            $row[] = $no;
            $row[] = $list->uraian_risiko;
            $row[] = $list->kode_risiko;
            $row[] = !empty($getKendali) ? $getKendali->uraian_pengendalian : '';
            $row[] = !empty($getKendali) ? celah($getKendali->celah_pengendalian) : '';
            $row[] = !empty($getKendali) ? $getKendali->rencana_tindak_pengendalian : '';
            $row[] = $list->pemilik;
            $row[] = !empty($getKendali) ? $getKendali->twp : '';


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


    public function edit_pemda()
    {
        $id = $this->input->post('id');
        $row = $this->db->get_where('f7_pemda', ['id_risk' => $id])->row();
        $getRisk = $this->db->get_where('f3a_risk_pemda', ['id' => $id])->row();
        echo json_encode(['status' => true, 'data' => $row, 'uraian_risiko' => $getRisk->uraian_risiko]);
    }

    public function edit_opd()
    {
        $id = $this->input->post('id');
        $row = $this->db->get_where('f7_opd', ['id_risk' => $id])->row();
        $getRisk = $this->db->get_where('f3b_risk_opd', ['id' => $id])->row();
        echo json_encode(['status' => true, 'data' => $row, 'uraian_risiko' => $getRisk->uraian_risiko]);
    }
    public function edit_operasional()
    {
        $id = $this->input->post('id');
        $row = new stdClass();

        $row = $this->db->get_where('f7_operasional', ['id_risk' => $id])->row();
        $getRisk = $this->db->get_where('f3c_risk_operasional', ['id' => $id])->row();
        $row->uraian_risiko = $getRisk->uraian_risiko;
        echo json_encode(['status' => true, 'data' => $row, 'uraian_risiko' => $getRisk->uraian_risiko]);
    }
    public function save_pemda()
    {
        $uraian_pengendalian = $this->input->post('uraian_pengendalian', TRUE);
        $twp = $this->input->post('twp', TRUE);
        $rencana_tindak_pengendalian = $this->input->post('rencana_tindak_pengendalian', TRUE);
        $celah_pengendalian = $this->input->post('celah_pengendalian', TRUE);
        $id  = $this->input->post("id", TRUE);
        $config = [
            [
                'field' => 'uraian_pengendalian',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Uraian Pengendalian',
                ],
            ],
            [
                'field' => 'rencana_tindak_pengendalian',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Rencana Tindak Pengendalian',
                ],
            ],
            [
                'field' => 'celah_pengendalian',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Celah Pengendalian',
                ],
            ],
            [
                'field' => 'twp',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Target Waktu Penyelesaian',
                ],
            ],
        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'id_risk'               => $id,
                'uraian_pengendalian'     => $uraian_pengendalian,
                'celah_pengendalian'    => $celah_pengendalian,
                'twp'    => $twp,
                'rencana_tindak_pengendalian' => $rencana_tindak_pengendalian,
            ];

            $check =  $this->db->get_where('f7_pemda', ['id_risk' => $id])->row();
            if ($check) {
                $this->db->update('f7_pemda', $data, ['id_risk' => $id]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('f7_pemda', $data);
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
        $uraian_pengendalian = $this->input->post('uraian_pengendalian', TRUE);
        $twp = $this->input->post('twp', TRUE);
        $rencana_tindak_pengendalian = $this->input->post('rencana_tindak_pengendalian', TRUE);
        $celah_pengendalian = $this->input->post('celah_pengendalian', TRUE);
        $id  = $this->input->post("id", TRUE);
        $config = [
            [
                'field' => 'uraian_pengendalian',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Uraian Pengendalian',
                ],
            ],
            [
                'field' => 'rencana_tindak_pengendalian',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Rencana Tindak Pengendalian',
                ],
            ],
            [
                'field' => 'celah_pengendalian',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Celah Pengendalian',
                ],
            ],
            [
                'field' => 'twp',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Target Waktu Penyelesaian',
                ],
            ],
        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'id_risk'               => $id,
                'uraian_pengendalian'     => $uraian_pengendalian,
                'celah_pengendalian'    => $celah_pengendalian,
                'twp'    => $twp,
                'rencana_tindak_pengendalian' => $rencana_tindak_pengendalian,
            ];

            $check =  $this->db->get_where('f7_opd', ['id_risk' => $id])->row();
            if ($check) {
                $this->db->update('f7_opd', $data, ['id_risk' => $id]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('f7_opd', $data);
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
        $uraian_pengendalian = $this->input->post('uraian_pengendalian', TRUE);
        $twp = $this->input->post('twp', TRUE);
        $rencana_tindak_pengendalian = $this->input->post('rencana_tindak_pengendalian', TRUE);
        $celah_pengendalian = $this->input->post('celah_pengendalian', TRUE);
        $id  = $this->input->post("id", TRUE);
        $config = [
            [
                'field' => 'uraian_pengendalian',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Uraian Pengendalian',
                ],
            ],
            [
                'field' => 'rencana_tindak_pengendalian',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Rencana Tindak Pengendalian',
                ],
            ],
            [
                'field' => 'celah_pengendalian',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Celah Pengendalian',
                ],
            ],
            [
                'field' => 'twp',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Target Waktu Penyelesaian',
                ],
            ],
        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'id_risk'               => $id,
                'uraian_pengendalian'     => $uraian_pengendalian,
                'celah_pengendalian'    => $celah_pengendalian,
                'twp'    => $twp,
                'rencana_tindak_pengendalian' => $rencana_tindak_pengendalian,
            ];

            $check =  $this->db->get_where('f7_operasional', ['id_risk' => $id])->row();
            if ($check) {
                $this->db->update('f7_operasional', $data, ['id_risk' => $id]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('f7_operasional', $data);
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
        $output = $this->db->get_where('f2c_output', ['id_rpjmd' => $id_rpjmd, 'opd_id' => $opd_id, 'tahun' => $tahun, 'urusan' => $urusan])->result_array();

        $data = [
            'dinas' => $dinas,
            'komite' => $komite,
            'sasaran' => $sasaran,
            'tujuan' => $tujuan,
            'misi' => $misi,
            'output'  => $output,
            'nama_opd'  => $nama_opd,
            'iku' => $iku,
            'pemda' => $this->db->get_where('ref_pemda', ['id' => 1])->row()->nama_pemda,
            'prioritas' => $prioritas,
            'tahun' => $tahun,
            'kontekSasaran' => $kontekSasaran,
            'konteks' => $konteks,

            'periode' => $this->db->get_where('ref_rpjmd', ['id' => $id_rpjmd])->row_array()['nama_periode'],
        ];
        $data['risk_pemda'] = [];
        $riskPemda = $this->db->get_where('f3a_risk_pemda', ['id_rpjmd' => $id_rpjmd, 'urusan' => $urusan, 'tahun' => $tahun,])->result_array();
        $detailPemda = [];
        foreach ($riskPemda as $rp) {
            $kontrolPemda = $this->db->get_where('f7_pemda', ['id_risk' => $rp['id']])->row_array();
            $detailPemda[] = [
                'uraian_risiko' => $rp['uraian_risiko'],
                'kode_risiko' => $rp['kode_risiko'],
                'pemilik'     => $rp['pemilik'],
                'uraian_pengendalian'               => !empty($kontrolPemda) ? $kontrolPemda['uraian_pengendalian'] : '',
                'twp'                               => !empty($kontrolPemda) ? $kontrolPemda['twp'] : '',
                'rencana_tindak_pengendalian'       => !empty($kontrolPemda) ? $kontrolPemda['rencana_tindak_pengendalian'] : '',
                'celah_pengendalian'                => !empty($kontrolPemda) ? celah($kontrolPemda['celah_pengendalian']) : '',
            ];
        }
        $data['risk_pemda'] = $detailPemda;
        $data['risk_opd'] = [];
        $data['risk_operasional'] = [];
        if ($this->session->userdata('opd') == 56) {
            foreach ($dinas as $d) {
                $rowOpd = $this->db->get_where('f3b_risk_opd', ['id_rpjmd' => $id_rpjmd, 'opd_id' => $d['id'], 'urusan' => $urusan, 'tahun' => $tahun])->result_array();
                $rowOperasional = $this->db->get_where('f3c_risk_operasional', ['id_rpjmd' => $id_rpjmd, 'opd_id' => $d['id'], 'urusan' => $urusan, 'tahun' => $tahun])->result_array();
                $detailOpd = [];
                $detailOperasional = [];

                foreach ($rowOpd as $ro) {
                    $kontrolOpd = $this->db->get_where('f7_opd', ['id_risk' => $ro['id']])->row_array();
                    $detailOpd[] = [
                        'uraian_risiko' => $ro['uraian_risiko'],
                        'kode_risiko' => $ro['kode_risiko'],
                        'pemilik'     => $ro['pemilik'],
                        'uraian_pengendalian'               => !empty($kontrolOpd) ? $kontrolOpd['uraian_pengendalian'] : '',
                        'twp'                               => !empty($kontrolOpd) ? $kontrolOpd['twp'] : '',
                        'rencana_tindak_pengendalian'       => !empty($kontrolOpd) ? $kontrolOpd['rencana_tindak_pengendalian'] : '',
                        'celah_pengendalian'                => !empty($kontrolOpd) ? celah($kontrolOpd['celah_pengendalian']) : '',
                    ];
                }
                // $namaOpd['detail'][] = $detailOpd;
                $data['risk_opd'][] = ['nama_opd' => $d['nama_opd'], 'detail' => $detailOpd];
                foreach ($rowOperasional as $roper) {
                    $kontrolOperasional = $this->db->get_where('f7_opd', ['id_risk' => $roper['id']])->row_array();

                    $detailOperasional[] = [
                        'uraian_risiko' => $roper['uraian_risiko'],
                        'kode_risiko' => $roper['kode_risiko'],
                        'pemilik'     => $roper['pemilik'],
                        'uraian_pengendalian'               => !empty($kontrolOperasional) ? $kontrolOperasional['uraian_pengendalian'] : '',
                        'twp'                               => !empty($kontrolOperasional) ? $kontrolOperasional['twp'] : '',
                        'rencana_tindak_pengendalian'       => !empty($kontrolOperasional) ? $kontrolOperasional['rencana_tindak_pengendalian'] : '',
                        'celah_pengendalian'                => !empty($kontrolOperasional) ? celah($kontrolOperasional['celah_pengendalian']) : '',
                    ];
                }
                $data['risk_operasional'][] = ['nama_opd' => $d['nama_opd'], 'detail' => $detailOperasional];
            }
        } else {
            $rowOpd = $this->db->get_where('f3b_risk_opd', ['id_rpjmd' => $id_rpjmd, 'urusan' => $urusan, 'tahun' => $tahun, 'opd_id' => $opd_id])->result_array();
            $rowOperasional = $this->db->get_where('f3c_risk_operasional', ['id_rpjmd' => $id_rpjmd, 'urusan' => $urusan, 'tahun' => $tahun, 'opd_id' => $opd_id])->result_array();
            $detailOpd = [];
            $detailOperasional = [];
            foreach ($rowOpd as $ro) {
                $kontrolOpd = $this->db->get_where('f7_opd', ['id_risk' => $ro['id']])->row_array();
                $detailOpd[] = [
                    'uraian_risiko' => $ro['uraian_risiko'],
                    'kode_risiko' => $ro['kode_risiko'],
                    'pemilik'     => $ro['pemilik'],
                    'uraian_pengendalian'               => !empty($kontrolOpd) ? $kontrolOpd['uraian_pengendalian'] : '',
                    'twp'                               => !empty($kontrolOpd) ? $kontrolOpd['twp'] : '',
                    'rencana_tindak_pengendalian'       => !empty($kontrolOpd) ? $kontrolOpd['rencana_tindak_pengendalian'] : '',
                    'celah_pengendalian'                => !empty($kontrolOpd) ? celah($kontrolOpd['celah_pengendalian']) : '',
                ];
            }
            foreach ($rowOperasional as $roper) {
                $kontrolOperasional = $this->db->get_where('f7_opd', ['id_risk' => $roper['id']])->row_array();

                $detailOperasional[] = [
                    'uraian_risiko' => $roper['uraian_risiko'],
                    'kode_risiko' => $roper['kode_risiko'],
                    'pemilik'     => $roper['pemilik'],
                    'uraian_pengendalian'               => !empty($kontrolOperasional) ? $kontrolOperasional['uraian_pengendalian'] : '',
                    'twp'                               => !empty($kontrolOperasional) ? $kontrolOperasional['twp'] : '',
                    'rencana_tindak_pengendalian'       => !empty($kontrolOperasional) ? $kontrolOperasional['rencana_tindak_pengendalian'] : '',
                    'celah_pengendalian'                => !empty($kontrolOperasional) ? celah($kontrolOperasional['celah_pengendalian']) : '',
                ];
            }
            $data['risk_opd'][] = [
                'nama_opd' => $nama_opd,
                'detail' => $detailOpd,
            ];
            $data['risk_operasional'][] = [
                'nama_opd' => $nama_opd,
                'detail'            => $detailOperasional,
            ];
        }
        // echo json_encode($data);
        $this->load->view('form/export7', $data);
    }
}
