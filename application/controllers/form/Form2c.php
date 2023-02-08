<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Form2c extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ref');
        $this->load->model('umum_model', 'umum');
        $this->load->helper('bulan_helper');
        $this->load->helper('convert_helper');
        $this->load->library(array('excel'));

        if ($this->session->userdata('level') != 1 && $this->session->userdata('token') == '') {
            redirect('login');
        }
    }


    public function dat_list()
    {
        $tabel = 'f2c_output';
        $column_order = array(null, 'kegiatan', 'satuan', 'target');
        $coloumn_search = array('kegiatan', 'satuan', 'target');
        $order_by = array('id' => 'asc');
        $join = [];

        $where = [];
        $select = 'f2c_output.*';
        $group_by = [];
        $id = $this->input->post('rpjmd');
        $id_opd = $this->input->post('id_opd');
        $tahun =    $this->input->post('tahun');
        $where['f2c_output.id_rpjmd'] = $id;
        $where['f2c_output.opd_id'] = $id_opd;
        $where['f2c_output.tahun'] = $tahun;

        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        $no = $this->input->post('start');

        foreach ($list as $list) {
            // $indikator   = '<a class="btn btn-warning btn-icon btn-sm mr-1" href="javascript:void(0)"  title="Tambah Indikator Keluaran" onclick="indikator(' . "'" . $list->id . "'" . ')"><i class="fa fa-plus"></i></a>';
            $edit   = '<a class="btn btn-primary btn-icon btn-sm mr-1" href="javascript:void(0)"  title="Edit" onclick="edit_output_opd(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $delete = '<a class="btn btn-danger btn-icon btn-sm mr-1" href="javascript:void(0)"  title="Hapus" onclick="_delete_output_opd(' . "'" . $list->id . "'" . ',' . "'" . $list->id . "'"  . ')"><i class="fa fa-trash"></i></a>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->kegiatan;
            $row[] = $list->target;
            $row[] = $list->satuan;
            //add html for action
            $row[] = '<center>'  . $edit . $delete . '</center>';
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
    public function dat_list_subkegiatan()
    {
        $tabel = 'f2c_output_subkegiatan';
        $column_order = array(null, 'kegiatan', 'satuan', 'target');
        $coloumn_search = array('kegiatan', 'satuan', 'target');
        $order_by = array('id' => 'asc');
        $join = [];

        $where = [];
        $select = 'f2c_output_subkegiatan.*';
        $group_by = [];
        $id = $this->input->post('rpjmd');
        $id_opd = $this->input->post('id_opd');
        $tahun =    $this->input->post('tahun');
        $where['id_rpjmd'] = $id;
        $where['opd_id'] = $id_opd;
        $where['tahun'] = $tahun;

        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        $no = $this->input->post('start');

        foreach ($list as $list) {
            // $indikator   = '<a class="btn btn-warning btn-icon btn-sm mr-1" href="javascript:void(0)"  title="Tambah Indikator Keluaran" onclick="indikator(' . "'" . $list->id . "'" . ')"><i class="fa fa-plus"></i></a>';
            $edit   = '<a class="btn btn-primary btn-icon btn-sm mr-1" href="javascript:void(0)"  title="Edit" onclick="edit_subkegiatan_opd(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $delete = '<a class="btn btn-danger btn-icon btn-sm mr-1" href="javascript:void(0)"  title="Hapus" onclick="_delete_subkegiatan_opd(' . "'" . $list->id . "'" . ',' . "'" . $list->id . "'"  . ')"><i class="fa fa-trash"></i></a>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->sub_kegiatan;
            $row[] = $list->target;
            $row[] = $list->satuan;
            //add html for action
            $row[] = '<center>'  . $edit . $delete . '</center>';
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
    public function dat_list_aktifitas()
    {
        $tabel = 'f2c_output_aktifitas';
        $column_order = array(null, 'kegiatan', 'satuan', 'target');
        $coloumn_search = array('kegiatan', 'satuan', 'target');
        $order_by = array('id' => 'asc');
        $join = [];

        $where = [];
        $select = 'f2c_output_aktifitas.*';
        $group_by = [];
        $id = $this->input->post('rpjmd');
        $id_opd = $this->input->post('id_opd');
        $tahun =    $this->input->post('tahun');
        $where['id_rpjmd'] = $id;
        $where['opd_id'] = $id_opd;
        $where['tahun'] = $tahun;

        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        $no = $this->input->post('start');

        foreach ($list as $list) {
            // $indikator   = '<a class="btn btn-warning btn-icon btn-sm mr-1" href="javascript:void(0)"  title="Tambah Indikator Keluaran" onclick="indikator(' . "'" . $list->id . "'" . ')"><i class="fa fa-plus"></i></a>';
            $edit   = '<a class="btn btn-primary btn-icon btn-sm mr-1" href="javascript:void(0)"  title="Edit" onclick="edit_aktifitas_opd(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $delete = '<a class="btn btn-danger btn-icon btn-sm mr-1" href="javascript:void(0)"  title="Hapus" onclick="_delete_aktifitas_opd(' . "'" . $list->id . "'" . ',' . "'" . $list->id . "'"  . ')"><i class="fa fa-trash"></i></a>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->aktifitas;
            $row[] = $list->target;
            $row[] = $list->satuan;
            //add html for action
            $row[] = '<center>'  . $edit . $delete . '</center>';
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
    // FORM KEGIATAN
    public function delete($id)
    {
        $delete = $this->db->delete('f2c_output', ['id' => $id]);
        if ($delete) {
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
    public function save_output_opd()
    {
        $output_opd = $this->input->post('output_opd', TRUE);
        $rpjmd = $this->input->post('rpjmd', TRUE);
        $opd_id = $this->input->post('opd_id', TRUE);
        $target = $this->input->post('target', TRUE);
        $satuan = $this->input->post('satuan', TRUE);
        $atribut = $this->input->post('atribut', TRUE);
        $tahun = $this->input->post('tahun', TRUE);
        $id     = $this->input->post('id_output_opd', TRUE);
        $urusan = $this->input->post('urusan_opd', TRUE);
        $kegiatan = $this->input->post('kegiatan', TRUE);

        // $prioritas = $this->input->post('prioritas', TRzUE);

        $config = [
            [
                'field' => 'output_opd',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Indikator Kinerja Utama',
                ],
            ],
            [
                'field' => 'satuan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Satuan',
                ],
            ],
            [
                'field' => 'atribut',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Attribut',
                ],
            ],
            [
                'field' => 'target',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Target',
                ],
            ],
            [
                'field' => 'rpjmd',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan RPJMD',
                ],
            ],

        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'output'           => $output_opd,
                'kegiatan'      => $kegiatan,
                'opd_id'        => $opd_id,
                'id_rpjmd'      => $rpjmd,
                'tahun'         => $tahun,
                'target'        => $target,
                'satuan'        => $satuan,
                'atribut'       => $atribut,
                'urusan'        => $urusan,
                'prioritas'     => 0,
            ];

            if ($id) {
                $this->db->update('f2c_output', $data, ['id' => $id]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('f2c_output', $data);
                $msg = 'Data berhasil disimpan';
            }
            echo json_encode(['status' => TRUE, 'message' => $msg]);
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
        $row = $this->db->get_where('f2c_output', ['id' => $id])->row();
        echo json_encode($row);
    }
    // END FORM KEGIATAN

    public function export()
    {
        $id_rpjmd = $this->input->post('id_rpjmd', TRUE);
        $tahun = $this->input->post('tahun', TRUE);
        $opd_id = $this->input->post('id_opd', TRUE);
        $urusan = $this->input->post('urusan', TRUE);
        $sasaran = $this->db->select('ref_sasaran_strategis.*')
            ->from('ref_sasaran_strategis')
            ->where('id_rpjmd', $id_rpjmd)->get()->result_array();
        $misi = $this->db->select('ref_misi_strategis.*')
            ->from('ref_misi_strategis')
            ->where('id_rpjmd', $id_rpjmd)->get()->result_array();
        $output = $this->db->get_where('f2c_output', ['id_rpjmd' => $id_rpjmd, 'opd_id' => $opd_id, 'tahun' => $tahun, 'urusan' => $urusan])->result_array();
        $iku_prioritas = $this->db->get_where('f2b_iku_opd', ['id_rpjmd' => $id_rpjmd, 'opd_id' => $opd_id, 'tahun' => $tahun, 'urusan' => $urusan, 'prioritas' => 1])->result_array();

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
        } else {
            $kontekSasaran = [];
        }
        $opd = $this->db->get_where('ref_opd', ['id' => $opd_id])->row_array();
        if ($opd) {
            $nama_opd = $opd['nama_opd'];
        } else {
            $nama_opd = '';
        }
        $data = [
            'nama_opd' => $nama_opd,
            'sasaran' => $sasaran,
            'tujuan' => isset($konteks['tujuan']) ? $konteks['tujuan'] : '',
            'misi' => $misi,
            'output' => $output,
            'program' => '',
            'iku_prioritas' => $iku_prioritas,
            'pemda' => $this->db->get_where('ref_pemda', ['id' => 1])->row()->nama_pemda,
            'prioritas' => $prioritas,
            'tahun' => $tahun,
            'kontekSasaran' => $kontekSasaran,
            'konteks' => $konteks,
            'periode' => $this->db->get_where('ref_rpjmd', ['id' => $id_rpjmd])->row_array()['nama_periode'],
            'pejabat'    => $this->db->get_where('f2b_risk_op_1', ['id_opd' => $opd_id, 'tahun' => $tahun, 'id_rpjmd' => $id_rpjmd])->row_array(),
        ];
        $this->load->view('form/export2c', $data);
    }
    public function edit_risk_operasional_1()
    {
        $tahun = $this->input->post('tahun', TRUE);
        $id_rpjmd = $this->input->post('id_rpjmd', TRUE);
        $opd_id = $this->input->post('opd_id', TRUE);
        $row = $this->db->get_where('f2b_risk_op_1', [
            'tahun'     => $tahun,
            'id_opd'    => $opd_id,
            'id_rpjmd'  => $id_rpjmd,
        ])->row();
        $anggota = $this->db->get_where('f2b_sop_1_anggota', [
            'tahun' => $tahun,
            'opd_id' => $opd_id,
            'id_rpjmd' => $id_rpjmd,
        ])->result_array();
        if ($row) {
            echo json_encode(['status' => true, 'data' => $row, 'anggota' => $anggota, 'message' => 'Data ditemukan']);
        } else {
            echo json_encode(['status' => false, 'data' => [], 'anggota' => [], 'message' => 'Data tidak ditemukan']);
        }
    }
    public function edit_risk_operasional_2()
    {
        $tahun = $this->input->post('tahun', TRUE);
        $id_rpjmd = $this->input->post('id_rpjmd', TRUE);
        $opd_id = $this->input->post('opd_id', TRUE);
        $row = $this->db->get_where('f2b_risk_op_2', [
            'tahun'     => $tahun,
            'id_opd'    => $opd_id,
            'id_rpjmd'  => $id_rpjmd,
        ])->row();
        $anggota = $this->db->get_where('f2b_sop_2_anggota', [
            'tahun' => $tahun,
            'opd_id' => $opd_id,
            'id_rpjmd' => $id_rpjmd,
        ])->result_array();
        if ($row) {
            echo json_encode(['status' => true, 'data' => $row, 'anggota' => $anggota, 'message' => 'Data ditemukan']);
        } else {
            echo json_encode(['status' => false, 'data' => [], 'anggota' => [], 'message' => 'Data tidak ditemukan']);
        }
    }
    public function edit_risk_operasional_3()
    {
        $tahun = $this->input->post('tahun', TRUE);
        $id_rpjmd = $this->input->post('id_rpjmd', TRUE);
        $opd_id = $this->input->post('opd_id', TRUE);
        $row = $this->db->get_where('f2b_risk_op_3', [
            'tahun'     => $tahun,
            'id_opd'    => $opd_id,
            'id_rpjmd'  => $id_rpjmd,
        ])->row();
        $anggota = $this->db->get_where('f2b_sop_3_anggota', [
            'tahun' => $tahun,
            'opd_id' => $opd_id,
            'id_rpjmd' => $id_rpjmd,
        ])->result_array();
        if ($row) {
            echo json_encode(['status' => true, 'data' => $row, 'anggota' => $anggota, 'message' => 'Data ditemukan']);
        } else {
            echo json_encode(['status' => false, 'data' => [], 'anggota' => [], 'message' => 'Data tidak ditemukan']);
        }
    }
    public function edit_risk_stakeholder()
    {
        $tahun = $this->input->post('tahun', TRUE);
        $id_rpjmd = $this->input->post('id_rpjmd', TRUE);
        $opd_id = $this->input->post('opd_id', TRUE);
        $row = $this->db->get_where('f2b_risk_stakeholder', [
            'tahun'     => $tahun,
            'id_opd'    => $opd_id,
            'id_rpjmd'  => $id_rpjmd,
        ])->row();

        if ($row) {
            echo json_encode(['status' => true, 'data' => $row, 'message' => 'Data ditemukan']);
        } else {
            echo json_encode(['status' => false, 'data' => [], 'message' => 'Data tidak ditemukan']);
        }
    }
    public function save_risk_sop_1()
    {
        $tahun = $this->input->post('tahun', TRUE);
        $id_rpjmd = $this->input->post('rpjmd', TRUE);
        $opd_id = $this->input->post('id_opd', TRUE);
        $jabatan_pj = $this->input->post('jabatan_pj', TRUE);
        $nama_pj = $this->input->post('nama_pj', TRUE);
        $nip_pj = $this->input->post('nip_pj', TRUE);
        $jabatan_ketua = $this->input->post('jabatan_ketua', TRUE);
        $nama_ketua = $this->input->post('nama_ketua', TRUE);
        $nip_ketua = $this->input->post('nip_ketua', TRUE);
        $bidang_staff = $this->input->post('bidang_staff', TRUE);
        $jabatan_staff = $this->input->post('jabatan_staff', TRUE);
        $nama_staff = $this->input->post('nama_staff', TRUE);
        $nip_staff = $this->input->post('nip_staff', TRUE);

        $config = [
            [
                'field' => 'rpjmd',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Periode Penilaian',
                ],
            ],
        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {

            $data = [
                'id_rpjmd' => $id_rpjmd,
                'tahun' => $tahun,
                'id_opd' => $opd_id,
                'jabatan_pj' => $jabatan_pj,
                'nip_pj' => $nip_pj,
                'nama_pj' => $nama_pj,
                'jabatan_ketua' => $jabatan_ketua,
                'nip_ketua' => $nip_ketua,
                'nama_ketua' => $nama_ketua,
            ];
            $where = [
                'tahun'     => $tahun,
                'id_opd'    => $opd_id,
                'id_rpjmd'  => $id_rpjmd,
            ];
            $anggota =  $this->input->post('jabatan_lainnya');
            $this->db->delete('f2b_sop_1_anggota', [
                'tahun'     => $tahun,
                'opd_id'    => $opd_id,
                'id_rpjmd'  => $id_rpjmd,
            ]);
            foreach ($anggota as $key => $value) {
                $data_anggota = [
                    'id_rpjmd' => $id_rpjmd,
                    'tahun' => $tahun,
                    'opd_id' => $opd_id,
                    'jabatan_anggota' => $value,
                    'nama_anggota' => $this->input->post('nama_lainnya')[$key],
                    'nip_anggota' => $this->input->post('nip_lainnya')[$key],
                    'bidang_anggota' => $this->input->post('bidang_lainnya')[$key],
                ];
                $this->db->insert('f2b_sop_1_anggota', $data_anggota);
            }
            try {
                $check = $this->db->get_where('f2b_risk_op_1', $where)->row_array();
                if (empty($check)) {
                    $query = $this->db->insert('f2b_risk_op_1', $data);
                } else {
                    $query = $this->db->update('f2b_risk_op_1', $data, $where);
                }
                if ($query) {
                    echo json_encode(['status' => TRUE]);
                } else {
                    echo json_encode(['status' => FALSE]);
                }
            } catch (\Throwable $th) {
                echo json_encode(['status' => FALSE, 'error' => $th->getMessage()]);
            }
        } else {
            $validation = [];
            $validation['status'] = FALSE;
            foreach ($_POST as $key => $value) {
                $validation['messages'][$key] = form_error($key);
            }
            echo json_encode($validation);
        }
    }
    public function save_risk_sop_2()
    {
        $tahun = $this->input->post('tahun', TRUE);
        $id_rpjmd = $this->input->post('rpjmd', TRUE);
        $opd_id = $this->input->post('id_opd', TRUE);
        $jabatan_pj = $this->input->post('jabatan_pj', TRUE);
        $nama_pj = $this->input->post('nama_pj', TRUE);
        $nip_pj = $this->input->post('nip_pj', TRUE);
        $jabatan_ketua = $this->input->post('jabatan_ketua', TRUE);
        $nama_ketua = $this->input->post('nama_ketua', TRUE);
        $nip_ketua = $this->input->post('nip_ketua', TRUE);
        $bidang_staff = $this->input->post('bidang_staff', TRUE);
        $jabatan_staff = $this->input->post('jabatan_staff', TRUE);
        $nama_staff = $this->input->post('nama_staff', TRUE);
        $nip_staff = $this->input->post('nip_staff', TRUE);

        $config = [
            [
                'field' => 'rpjmd',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Periode Penilaian',
                ],
            ],
        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {

            $data = [
                'id_rpjmd' => $id_rpjmd,
                'tahun' => $tahun,
                'id_opd' => $opd_id,
                'jabatan_pj' => $jabatan_pj,
                'nip_pj' => $nip_pj,
                'nama_pj' => $nama_pj,
                'jabatan_ketua' => $jabatan_ketua,
                'nip_ketua' => $nip_ketua,
                'nama_ketua' => $nama_ketua,
            ];
            $where = [
                'tahun'     => $tahun,
                'id_opd'    => $opd_id,
                'id_rpjmd'  => $id_rpjmd,
            ];
            $anggota =  $this->input->post('jabatan_lainnya');
            $this->db->delete('f2b_sop_2_anggota', [
                'tahun'     => $tahun,
                'opd_id'    => $opd_id,
                'id_rpjmd'  => $id_rpjmd,
            ]);
            foreach ($anggota as $key => $value) {
                $data_anggota = [
                    'id_rpjmd' => $id_rpjmd,
                    'tahun' => $tahun,
                    'opd_id' => $opd_id,
                    'jabatan_anggota' => $value,
                    'nama_anggota' => $this->input->post('nama_lainnya')[$key],
                    'nip_anggota' => $this->input->post('nip_lainnya')[$key],
                    'bidang_anggota' => $this->input->post('bidang_lainnya')[$key],
                ];
                $this->db->insert('f2b_sop_2_anggota', $data_anggota);
            }
            try {
                $check = $this->db->get_where('f2b_risk_op_2', $where)->row_array();
                if (empty($check)) {
                    $query = $this->db->insert('f2b_risk_op_2', $data);
                } else {
                    $query = $this->db->update('f2b_risk_op_2', $data, $where);
                }
                if ($query) {
                    echo json_encode(['status' => TRUE]);
                } else {
                    echo json_encode(['status' => FALSE]);
                }
            } catch (\Throwable $th) {
                echo json_encode(['status' => FALSE, 'error' => $th->getMessage()]);
            }
        } else {
            $validation = [];
            $validation['status'] = FALSE;
            foreach ($_POST as $key => $value) {
                $validation['messages'][$key] = form_error($key);
            }
            echo json_encode($validation);
        }
    }
    public function save_risk_sop_3()
    {
        $tahun = $this->input->post('tahun', TRUE);
        $id_rpjmd = $this->input->post('rpjmd', TRUE);
        $opd_id = $this->input->post('id_opd', TRUE);
        $jabatan_pj = $this->input->post('jabatan_pj', TRUE);
        $nama_pj = $this->input->post('nama_pj', TRUE);
        $nip_pj = $this->input->post('nip_pj', TRUE);
        $jabatan_ketua = $this->input->post('jabatan_ketua', TRUE);
        $nama_ketua = $this->input->post('nama_ketua', TRUE);
        $nip_ketua = $this->input->post('nip_ketua', TRUE);
        $bidang_staff = $this->input->post('bidang_staff', TRUE);
        $jabatan_staff = $this->input->post('jabatan_staff', TRUE);
        $nama_staff = $this->input->post('nama_staff', TRUE);
        $nip_staff = $this->input->post('nip_staff', TRUE);

        $config = [
            [
                'field' => 'rpjmd',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Periode Penilaian',
                ],
            ],
        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {

            $data = [
                'id_rpjmd' => $id_rpjmd,
                'tahun' => $tahun,
                'id_opd' => $opd_id,
                'jabatan_pj' => $jabatan_pj,
                'nip_pj' => $nip_pj,
                'nama_pj' => $nama_pj,
                'jabatan_ketua' => $jabatan_ketua,
                'nip_ketua' => $nip_ketua,
                'nama_ketua' => $nama_ketua,
                'bidang_staff' => $bidang_staff,
                'jabatan_staff' => $jabatan_staff,
                'nip_staff' => $nip_staff,
                'nama_staff' => $nama_staff,
            ];
            $where = [
                'tahun'     => $tahun,
                'id_opd'    => $opd_id,
                'id_rpjmd'  => $id_rpjmd,
            ];
            $anggota =  $this->input->post('jabatan_lainnya');
            $this->db->delete('f2b_sop_3_anggota', [
                'tahun'     => $tahun,
                'opd_id'    => $opd_id,
                'id_rpjmd'  => $id_rpjmd,
            ]);
            foreach ($anggota as $key => $value) {
                $data_anggota = [
                    'id_rpjmd' => $id_rpjmd,
                    'tahun' => $tahun,
                    'opd_id' => $opd_id,
                    'jabatan_anggota' => $value,
                    'nama_anggota' => $this->input->post('nama_lainnya')[$key],
                    'nip_anggota' => $this->input->post('nip_lainnya')[$key],
                    'bidang_anggota' => $this->input->post('bidang_lainnya')[$key],
                ];
                $this->db->insert('f2b_sop_3_anggota', $data_anggota);
            }
            try {
                $check = $this->db->get_where('f2b_risk_op_3', $where)->row_array();
                if (empty($check)) {
                    $query = $this->db->insert('f2b_risk_op_3', $data);
                } else {
                    $query = $this->db->update('f2b_risk_op_3', $data, $where);
                }
                if ($query) {
                    echo json_encode(['status' => TRUE]);
                } else {
                    echo json_encode(['status' => FALSE]);
                }
            } catch (\Throwable $th) {
                echo json_encode(['status' => FALSE, 'error' => $th->getMessage()]);
            }
        } else {
            $validation = [];
            $validation['status'] = FALSE;
            foreach ($_POST as $key => $value) {
                $validation['messages'][$key] = form_error($key);
            }
            echo json_encode($validation);
        }
    }

    public function save_risk_stakeholder()
    {
        $tahun = $this->input->post('tahun', TRUE);
        $id_rpjmd = $this->input->post('rpjmd', TRUE);
        $opd_id = $this->input->post('id_opd', TRUE);
        $jabatan_pj = $this->input->post('jabatan_pj', TRUE);
        $nama_pj = $this->input->post('nama_pj', TRUE);
        $nip_pj = $this->input->post('nip_pj', TRUE);

        $config = [
            [
                'field' => 'rpjmd',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Periode Penilaian',
                ],
            ],
        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {

            $data = [
                'id_rpjmd' => $id_rpjmd,
                'tahun' => $tahun,
                'id_opd' => $opd_id,
                'jabatan_pj' => $jabatan_pj,
                'nip_pj' => $nip_pj,
                'nama_pj' => $nama_pj,
            ];
            $where = [
                'tahun'     => $tahun,
                'id_opd'    => $opd_id,
                'id_rpjmd'  => $id_rpjmd,
            ];

            try {
                $check = $this->db->get_where('f2b_risk_stakeholder', $where)->row_array();
                if (empty($check)) {
                    $query = $this->db->insert('f2b_risk_stakeholder', $data);
                } else {
                    $query = $this->db->update('f2b_risk_stakeholder', $data, $where);
                }
                if ($query) {
                    echo json_encode(['status' => TRUE]);
                } else {
                    echo json_encode(['status' => FALSE]);
                }
            } catch (\Throwable $th) {
                echo json_encode(['status' => FALSE, 'error' => $th->getMessage()]);
            }
        } else {
            $validation = [];
            $validation['status'] = FALSE;
            foreach ($_POST as $key => $value) {
                $validation['messages'][$key] = form_error($key);
            }
            echo json_encode($validation);
        }
    }

    public function export_kegiatan()
    {

        $tahun = $this->input->get('tahun');
        $id_opd = $this->input->get('opd');
        $id_rpjmd   = $this->input->get('rpjmd');
        $urusan = $this->input->get('urusan');
        $where = [
            'id_rpjmd' => $id_rpjmd,
            'opd_id' => $id_opd,
            'tahun' => $tahun,
            'urusan' => $urusan,
        ];
        header("Content-type: application/vnd-ms-excel;charset=utf-8;");
        header("Content-Disposition: attachment; filename=Template 2c.Subkegiatan" . ".xls");
        $data = [
            'output' =>  $this->db->get_where('f2c_output', $where)->result_array()
        ];
        $this->load->view('form/export2c_kegiatan', $data);
    }
    public function import_kegiatan()
    {
        $rpjmd = $this->input->post('rpjmd', TRUE);
        $opd_id = $this->input->post('opd_id', TRUE);
        $tahun = $this->input->post('tahun', TRUE);
        $urusan = $this->input->post('urusan', TRUE);
        $config = [

            [
                'field' => 'rpjmd',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih RPJMD',
                ],
            ],
            [
                'field' => 'urusan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Urusan',
                ],
            ],
        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(
                array(
                    'status' => false,
                    'message' => 'Tahun penilaian tidak boleh kosong atau Urusan Pemerintahan tidak boleh kosong'
                )
            );
        } else {
            // load excel
            if (isset($_FILES["file2c_kegiatan"]["name"])) {

                $file = $_FILES['file2c_kegiatan']['tmp_name'];
                $load = PHPExcel_IOFactory::load($file);
                $sheets = $load->getActiveSheet()->toArray(null, true, true, true);

                $i = 1;
                foreach ($sheets as $sheet) {
                    // karena data yang di excel di mulai dari baris ke 2
                    // maka jika $i lebih dari 1 data akan di masukan ke database
                    if ($i > 1) {
                        // nama ada di kolom A
                        // sedangkan alamat ada di kolom B
                        $kegiatan       = isset($sheet['A']) ? $sheet['A'] : '';
                        $satuan    = isset($sheet['B']) ? $sheet['B'] : '';
                        $target    = isset($sheet['C']) ? $sheet['C'] : '';
                        $atribut = isset($sheet['D']) ? $sheet['D'] : '';
                        $output   = isset($sheet['E']) ? $sheet['E'] : '';

                        $data = [
                            'kegiatan'           => $kegiatan,
                            'opd_id'        => $opd_id,
                            'id_rpjmd'      => $rpjmd,
                            'tahun'         => $tahun,
                            'target'        => $target,
                            'satuan'        => $satuan,
                            'atribut'       => $atribut,
                            'urusan'        => $urusan,
                            'output'     => $output,
                            'prioritas' => 0,

                        ];

                        $this->db->insert('f2c_output', $data);
                    }
                    $i++;
                }
                echo json_encode(['status' => TRUE, 'message' => 'Berhasil Import Data']);
            } else {
                echo json_encode(['status' => FALSE, 'message' => 'Gagal Import Data']);
            }
        }
    }
    public function import_subkegiatan()
    {
        $rpjmd = $this->input->post('rpjmd', TRUE);
        $opd_id = $this->input->post('opd_id', TRUE);
        $tahun = $this->input->post('tahun', TRUE);
        $urusan = $this->input->post('urusan', TRUE);
        $config = [

            [
                'field' => 'rpjmd',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih RPJMD',
                ],
            ],
            [
                'field' => 'urusan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Urusan',
                ],
            ],
        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(
                array(
                    'status' => false,
                    'message' => 'Tahun penilaian tidak boleh kosong atau Urusan Pemerintahan tidak boleh kosong'
                )
            );
        } else {
            // load excel
            if (isset($_FILES["file2c_subkegiatan"]["name"])) {

                $file = $_FILES['file2c_subkegiatan']['tmp_name'];
                $load = PHPExcel_IOFactory::load($file);
                $sheets = $load->getActiveSheet()->toArray(null, true, true, true);

                $i = 1;
                foreach ($sheets as $sheet) {
                    // karena data yang di excel di mulai dari baris ke 2
                    // maka jika $i lebih dari 1 data akan di masukan ke database
                    if ($i > 1) {
                        // nama ada di kolom A
                        // sedangkan alamat ada di kolom B
                        $kegiatan  = isset($sheet['A']) ? $sheet['A'] : '';
                        $satuan    = isset($sheet['B']) ? $sheet['B'] : '';
                        $target    = isset($sheet['C']) ? $sheet['C'] : '';
                        $prioritas = isset($sheet['D']) ? $sheet['D'] : '';
                        $atribut   = isset($sheet['E']) ? $sheet['E'] : '';

                        $data = [
                            'iku'           => $iku,
                            'opd_id'        => $opd_id,
                            'id_rpjmd'      => $rpjmd,
                            'tahun'         => $tahun,
                            'target'        => $target,
                            'satuan'        => $satuan,
                            'atribut'       => $atribut,
                            'urusan'        => $urusan,
                            'prioritas'     => $prioritas,
                        ];

                        $this->db->insert('f2b_iku_opd', $data);
                    }
                    $i++;
                }
                echo json_encode(['status' => TRUE, 'message' => 'Berhasil Import Data']);
            } else {
                echo json_encode(['status' => FALSE, 'message' => 'Gagal Import Data']);
            }
        }
    }
}
