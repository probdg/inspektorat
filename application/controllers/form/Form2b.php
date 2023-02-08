<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Form2b extends CI_Controller
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
        $tabel = 'f2b_iku_opd';
        $column_order = array(null, 'iku', 'satuan', 'target');
        $coloumn_search = array('iku', 'satuan', 'target');
        $order_by = array('id' => 'asc');
        $join = [];

        $where = [];
        $select = 'f2b_iku_opd.*';
        $group_by = [];
        $id = $this->input->post('rpjmd');
        $id_opd = $this->input->post('id_opd');
        $tahun =    $this->input->post('tahun');
        $where['f2b_iku_opd.id_rpjmd'] = $id;
        $where['f2b_iku_opd.opd_id'] = $id_opd;
        $where['f2b_iku_opd.tahun'] = $tahun;

        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        $no = $this->input->post('start');

        foreach ($list as $list) {
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="edit_iku_opd(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $delete = ' <a class="btn btn-danger btn-icon btn-sm" href="javascript:void(0)"  title="Hapus" onclick="_delete_iku_opd(' . "'" . $list->id . "'" . ',' . "'" . $list->id . "'"  . ')"><i class="fa fa-trash"></i></a>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->iku;
            $row[] = $list->target;
            $row[] = $list->satuan;
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
    public function edit_risk_strategis()
    {
        $tahun = $this->input->post('tahun', TRUE);
        $id_rpjmd = $this->input->post('id_rpjmd', TRUE);
        $opd_id = $this->input->post('opd_id', TRUE);
        $row = $this->db->get_where('f2b_risk_strategis', [
            'tahun' => $tahun,
            'id_opd' => $opd_id,
            'id_rpjmd' => $id_rpjmd,
        ])->row();
        $anggota = $this->db->get_where('f2b_risk_strategis_anggota', [
            'tahun' => $tahun,
            'opd_id' => $opd_id,
            'id_rpjmd' => $id_rpjmd,
        ])->result_array();
        if ($row) {
            echo json_encode(['status' => true, 'data' => $row, 'anggota' => $anggota, 'messages' => 'DATA DITEMUKAN']);
        } else {
            echo json_encode(['status' => false, 'data' => [], 'anggota' => [], 'messages' => 'NOT FOUND DATA']);
        }
    }
    public function save()
    {
        $rpjmd = $this->input->post('rpjmd', TRUE);
        $sumber_data = $this->input->post('sumber_data', TRUE);
        $tahun = $this->input->post('tahun', TRUE);
        $urusan = $this->input->post('urusan', TRUE);
        $id_opd = $this->input->post('id_opd', TRUE);
        $config = [
            [
                'field' => 'sumber_data',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Sumber Data',
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
        $this->form_validation->set_error_delimiters('', '');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'id_rpjmd'     => $rpjmd,
                'id_opd'        => $id_opd,
                'sumber_data'  => $sumber_data,
                'tahun'        => $tahun,
                'urusan'       => $urusan,
            ];
            $where = [
                'id_rpjmd'     => $rpjmd,
                'id_opd'        => $id_opd,
                'tahun'         => $tahun,
                'urusan'        => $urusan,
            ];
            $row =  $this->db->get_where('f2b_opd', $where)->row();
            if (!empty($row)) {
                $this->db->update('f2b_opd', $data, $where);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('f2b_opd', $data);
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
    public function save_risk_opd()
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
            $this->db->delete('f2b_risk_strategis_anggota', [
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
                $this->db->insert('f2b_risk_strategis_anggota', $data_anggota);
            }
            try {
                $check = $this->db->get_where('f2b_risk_strategis', $where)->row_array();
                if (empty($check)) {
                    $query = $this->db->insert('f2b_risk_strategis', $data);
                } else {
                    $query = $this->db->update('f2b_risk_strategis', $data, $where);
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
    public function save_iku_opd()
    {
        $iku = $this->input->post('iku_opd', TRUE);
        $rpjmd = $this->input->post('rpjmd', TRUE);
        $opd_id = $this->input->post('opd_id', TRUE);
        $target = $this->input->post('target', TRUE);
        $satuan = $this->input->post('satuan', TRUE);
        $atribut = $this->input->post('atribut', TRUE);
        $tahun = $this->input->post('tahun', TRUE);
        $id     = $this->input->post('id_iku_opd', TRUE);
        $urusan = $this->input->post('urusan_opd', TRUE);
        $prioritas = $this->input->post('prioritas', TRUE);

        $config = [
            [
                'field' => 'iku_opd',
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
                'field' => 'attribut',
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

            if ($id) {
                $this->db->update('f2b_iku_opd', $data, ['id' => $id]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('f2b_iku_opd', $data);
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
        $row = $this->db->get_where('f2b_iku_opd', ['id' => $id])->row();
        echo json_encode($row);
    }
    public function import()
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
            if (isset($_FILES["file2b"]["name"])) {

                $file = $_FILES['file2b']['tmp_name'];
                $load = PHPExcel_IOFactory::load($file);
                $sheets = $load->getActiveSheet()->toArray(null, true, true, true);

                $i = 1;
                foreach ($sheets as $sheet) {
                    // karena data yang di excel di mulai dari baris ke 2
                    // maka jika $i lebih dari 1 data akan di masukan ke database
                    if ($i > 1) {
                        // nama ada di kolom A
                        // sedangkan alamat ada di kolom B
                        $iku       = isset($sheet['A']) ? $sheet['A'] : '';
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
        $iku = $this->db->get_where('f2b_iku_opd', ['id_rpjmd' => $id_rpjmd, 'opd_id' => $opd_id, 'tahun' => $tahun, 'urusan' => $urusan])->result_array();
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
            $dinas =  $this->db->select('ref_opd.nama_opd')
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
            'nama_opd'  => $nama_opd,
            'sasaran' => $sasaran,
            'tujuan' => isset($konteks['tujuan']) ? $konteks['tujuan'] : '',
            'misi' => $misi,
            'iku' => $iku,
            'program' => '',
            'iku_prioritas' => $iku_prioritas,
            'pemda' => $this->db->get_where('ref_pemda', ['id' => 1])->row()->nama_pemda,
            'prioritas' => $prioritas,
            'tahun' => $tahun,
            'kontekSasaran' => $kontekSasaran,
            'konteks' => $konteks,
            'periode' => $this->db->get_where('ref_rpjmd', ['id' => $id_rpjmd])->row_array()['nama_periode'],
            'pejabat'    => $this->db->get_where('f2b_risk_strategis', ['id_opd' => $opd_id, 'tahun' => $tahun, 'id_rpjmd' => $id_rpjmd])->row_array(),
        ];
        $this->load->view('form/export2b', $data);
    }
    public function delete($id)
    {
        $delete = $this->db->delete('f2b_iku_opd', ['id' => $id]);
        if ($delete) {
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
}
