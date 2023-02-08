<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Form2a extends CI_Controller
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
        $tabel = 'f2a_iku_pemda';
        $column_order = array(null, 'iku', 'satuan', 'target', 'tujuan');
        $coloumn_search = array('iku', 'satuan', 'target', 'tujuan');
        $order_by = array('id' => 'asc');
        $join = [];
        $join[] = [
            'field' => 'ref_tujuan_strategis',
            'condition' => 'ref_tujuan_strategis.id = f2a_iku_pemda.id_tujuan',
            'direction' => 'left'
        ];
        $join[] = [
            'field' => 'ref_sasaran_strategis',
            'condition' => 'ref_sasaran_strategis.id = f2a_iku_pemda.id_sasaran',
            'direction' => 'left'
        ];
        $where = [];
        $select = 'f2a_iku_pemda.*, ref_tujuan_strategis.tujuan,ref_sasaran_strategis.sasaran';
        $group_by = [];
        $id = $this->input->post('rpjmd');
        $where['f2a_iku_pemda.id_rpjmd'] = $id;
        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        $no = $this->input->post('start');

        foreach ($list as $list) {
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="edit_iku(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $delete = ' <a class="btn btn-danger btn-icon btn-sm" href="javascript:void(0)"  title="Hapus" onclick="_delete_iku(' . "'" . $list->id . "'" . ',' . "'" . $list->id . "'"  . ')"><i class="fa fa-trash"></i></a>';
            $no++;
            $row = array();
            $row[] = $list->tujuan;
            $row[] = $list->sasaran;
            $row[] = $list->iku;
            $row[] = $list->satuan;
            $row[] = $list->target;
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
        $iku = $this->input->post('iku', TRUE);
        $rpjmd = $this->input->post('rpjmd', TRUE);
        $tujuan = $this->input->post('select_tujuan_pemda', TRUE);
        $sasaran = $this->input->post('select_sasaran_pemda', TRUE);
        $target = $this->input->post('target', TRUE);
        $satuan = $this->input->post('satuan', TRUE);
        $atribut = $this->input->post('atribut', TRUE);

        $id     = $this->input->post('id_iku', TRUE);

        $config = [
            [
                'field' => 'iku',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Indikator Kinerja Utama',
                ],
            ],
            [
                'field' => 'satuan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan satuan',
                ],
            ],
            [
                'field' => 'atribut',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan atribut',
                ],
            ],
            [
                'field' => 'select_tujuan_pemda',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih tujuan',
                ],
            ],
            [
                'field' => 'select_sasaran_pemda',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih sasaran',
                ],
            ],
            [
                'field' => 'rpjmd',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan RPJMD',
                ],
            ],
            [
                'field' => 'target',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Target',
                ],
            ],

        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'iku'           => $iku,
                'id_tujuan'     => $tujuan,
                'id_sasaran'    => $sasaran,
                'id_rpjmd'      => $rpjmd,
                'target'        => $target,
                'satuan'        => $satuan,
                'atribut'       => $atribut,
            ];

            if ($id) {
                $this->db->update('f2a_iku_pemda', $data, ['id' => $id]);
                $msg = 'Data berhasil diperbaharui';
            } else {
                $this->db->insert('f2a_iku_pemda', $data);
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
        $row = $this->db->get_where('f2a_iku_pemda', ['id' => $id])->row();
        echo json_encode($row);
    }
    public function editKomite()
    {
        $tahun = $this->input->post('tahun', TRUE);
        $id_rpjmd = $this->input->post('id_rpjmd', TRUE);
        $opd_id = $this->input->post('opd_id', TRUE);
        $row = $this->db->get_where('f2a_komite_pemda', [
            'tahun' => $tahun,
            'opd_id' => $opd_id,
            'id_rpjmd' => $id_rpjmd,
        ])->row();

        echo json_encode($row);
    }
    public function getKonteksRisiko()
    {
        $tahun = $this->input->post('tahun', TRUE);
        $urusan = $this->input->post('urusan', TRUE);
        $data = $this->db->get_where('f2a_konteks_risiko', [
            'tahun' => $tahun,
            'urusan' => $urusan,
        ])->row();
        if ($data) {
            echo json_encode(['status' => true, 'data' => $data]);
        } else {
            echo json_encode(['status' => false, 'data' => [
                'id' => '',
                'iku' => '',
                'misi' => '',
                'prioritas' => '',
                'tujuan' => ''
            ]]);
        }
    }
    public function saveKomite()
    {
        $tahun = $this->input->post('tahun', TRUE);
        $id_rpjmd = $this->input->post('id_rpjmd', TRUE);
        $opd_id = $this->input->post('opd_id', TRUE);
        $sumber_data_2a = $this->input->post('sumber_data_2a', TRUE);
        $jabatan_pj = $this->input->post('jabatan_pj', TRUE);
        $nip_pj = $this->input->post('nip_pj', TRUE);
        $jabatan_wpj = $this->input->post('jabatan_wpj', TRUE);
        $nip_wpj = $this->input->post('nip_wpj', TRUE);
        $jabatan_pengelola = $this->input->post('jabatan_pengelola', TRUE);
        $nama_pengelola = $this->input->post('nama_pengelola', TRUE);
        $nip_pengelola = $this->input->post('nip_pengelola', TRUE);
        $jabatan_sekretaris1 = $this->input->post('jabatan_sekretaris1', TRUE);
        $nama_sekretaris1 = $this->input->post('nama_sekretaris1', TRUE);
        $nip_sekretaris1 = $this->input->post('nip_sekretaris1', TRUE);
        $jabatan_sekretaris2 = $this->input->post('jabatan_sekretaris2', TRUE);
        $nama_sekretaris2 = $this->input->post('nama_sekretaris2', TRUE);
        $nip_sekretaris2 = $this->input->post('nip_sekretaris2', TRUE);
        $jabatan_sekretaris3 = $this->input->post('jabatan_sekretaris3', TRUE);
        $nama_sekretaris3 = $this->input->post('nama_sekretaris3', TRUE);
        $nip_sekretaris3 = $this->input->post('nip_sekretaris3', TRUE);
        $bidang_staff1 = $this->input->post('bidang_staff1', TRUE);
        $jabatan_staff1 = $this->input->post('jabatan_staff1', TRUE);
        $nama_staff1 = $this->input->post('nama_staff1', TRUE);
        $nip_staff1 = $this->input->post('nip_staff1', TRUE);
        $bidang_staff2 = $this->input->post('bidang_staff2', TRUE);
        $jabatan_staff2 = $this->input->post('jabatan_staff2', TRUE);
        $nama_staff2 = $this->input->post('nama_staff2', TRUE);
        $nip_staff2 = $this->input->post('nip_staff2', TRUE);
        $bidang_staff3 = $this->input->post('bidang_staff3', TRUE);
        $jabatan_staff3 = $this->input->post('jabatan_staff3', TRUE);
        $nama_staff3 = $this->input->post('nama_staff3', TRUE);
        $nip_staff3 = $this->input->post('nip_staff3', TRUE);
        $jabatan_assist_pemerintah = $this->input->post('jabatan_assist_pemerintah', TRUE);
        $nama_assist_pemerintah = $this->input->post('nama_assist_pemerintah', TRUE);
        $nip_assist_pemerintah = $this->input->post('nip_assist_pemerintah', TRUE);
        $jabatan_assist_pembangunan = $this->input->post('jabatan_assist_pembangunan', TRUE);
        $nama_assist_pembangunan = $this->input->post('nama_assist_pembangunan', TRUE);
        $nip_assist_pembangunan = $this->input->post('nip_assist_pembangunan', TRUE);
        $jabatan_assist_admin = $this->input->post('jabatan_assist_admin', TRUE);
        $nama_assist_admin = $this->input->post('nama_assist_admin', TRUE);
        $nip_assist_admin = $this->input->post('nip_assist_admin', TRUE);
        $jabatan_kepala_opd = $this->input->post('jabatan_kepala_opd', TRUE);
        $nama_kepala_opd = $this->input->post('nama_kepala_opd', TRUE);
        $nip_kepala_opd = $this->input->post('nip_kepala_opd', TRUE);
        $jabatan_kepala_bkad = $this->input->post('jabatan_kepala_bkad', TRUE);
        $nama_kepala_bkad = $this->input->post('nama_kepala_bkad', TRUE);
        $nip_kepala_bkad = $this->input->post('nip_kepala_bkad', TRUE);
        $jabatan_inspektur_daerah = $this->input->post('jabatan_inspektur_daerah', TRUE);
        $nama_inspektur_daerah = $this->input->post('nama_inspektur_daerah', TRUE);
        $nip_inspektur_daerah = $this->input->post('nip_inspektur_daerah', TRUE);
        $jabatan_camat = $this->input->post('jabatan_camat', TRUE);
        $nama_camat = $this->input->post('nama_camat', TRUE);
        $nip_camat = $this->input->post('nip_camat', TRUE);
        $visi = $this->input->post('visi', TRUE);
        $misi = $this->input->post('misi', TRUE);
        $tujuan = $this->input->post('tujuan', TRUE);
        $sasaran = $this->input->post('sasaran', TRUE);
        $iku = $this->input->post('iku', TRUE);
        $prioritas = $this->input->post('prioritas', TRUE);
        $urusan = $this->input->post('urusan', TRUE);
        $config = [
            [
                'field' => 'urusan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Urusan Pemerintahan',
                ],
            ],
        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {

            $data = [
                'id_rpjmd' => $id_rpjmd,
                'tahun' => $tahun,
                'opd_id' => $opd_id,
                'sumber_data' => $sumber_data_2a,
                'jabatan_pj' => $jabatan_pj,
                'nip_pj' => $nip_pj,
                'jabatan_wpj' => $jabatan_wpj,
                'nip_wpj' => $nip_wpj,
                'jabatan_pengelola' => $jabatan_pengelola,
                'nama_pengelola' => $nama_pengelola,
                'nip_pengelola' => $nip_pengelola,
                'jabatan_sekretaris1' => $jabatan_sekretaris1,
                'nama_sekretaris1' => $nama_sekretaris1,
                'nip_sekretaris1' => $nip_sekretaris1,
                'jabatan_sekretaris2' => $jabatan_sekretaris2,
                'nama_sekretaris2' => $nama_sekretaris2,
                'nip_sekretaris2' => $nip_sekretaris2,
                'jabatan_sekretaris3' => $jabatan_sekretaris3,
                'nama_sekretaris3' => $nama_sekretaris3,
                'nip_sekretaris3' => $nip_sekretaris3,
                'bidang_staff1' => $bidang_staff1,
                'jabatan_staff1' => $jabatan_staff1,
                'nama_staff1' => $nama_staff1,
                'nip_staff1' => $nip_staff1,
                'bidang_staff2' => $bidang_staff2,
                'jabatan_staff2' => $jabatan_staff2,
                'nama_staff2' => $nama_staff2,
                'nip_staff2' => $nip_staff2,
                'bidang_staff3' => $bidang_staff3,
                'jabatan_staff3' => $jabatan_staff3,
                'nama_staff3' => $nama_staff3,
                'nip_staff3' => $nip_staff3,
                'jabatan_assist_pemerintah' => $jabatan_assist_pemerintah,
                'nama_assist_pemerintah' => $nama_assist_pemerintah,
                'nip_assist_pemerintah' => $nip_assist_pemerintah,
                'jabatan_assist_pembangunan' => $jabatan_assist_pembangunan,
                'nama_assist_pembangunan' => $nama_assist_pembangunan,
                'nip_assist_pembangunan' => $nip_assist_pembangunan,
                'jabatan_assist_admin' => $jabatan_assist_admin,
                'nama_assist_admin' => $nama_assist_admin,
                'nip_assist_admin' => $nip_assist_admin,
                'jabatan_kepala_opd' => $jabatan_kepala_opd,
                'nama_kepala_opd' => $nama_kepala_opd,
                'nip_kepala_opd' => $nip_kepala_opd,
                'jabatan_kepala_bkad' => $jabatan_kepala_bkad,
                'nama_kepala_bkad' => $nama_kepala_bkad,
                'nip_kepala_bkad' => $nip_kepala_bkad,
                'jabatan_inspektur_daerah' => $jabatan_inspektur_daerah,
                'nama_inspektur_daerah' => $nama_inspektur_daerah,
                'nip_inspektur_daerah' => $nip_inspektur_daerah,
                'jabatan_camat' => $jabatan_camat,
                'nama_camat' => $nama_camat,
                'nip_camat' => $nip_camat,
                'visi' => $visi,

            ];
            $where = [
                'tahun'     => $tahun,
                'opd_id'    => $opd_id,
                'id_rpjmd'  => $id_rpjmd,
            ];
            $dataKonteks =
                [
                    'misi'      => $misi,
                    'tujuan'    => $tujuan,
                    'iku'       => $iku,
                    'prioritas' => $prioritas,
                    'urusan'    => $urusan,
                    'tahun'     => $tahun,
                ];
            $whereKonteks = [
                'tahun'     => $tahun,
                'urusan'    => $urusan,
            ];

            try {
                $checkKonteks = $this->db->get_where('f2a_konteks_risiko', $whereKonteks)->row_array();
                if (empty($checkKonteks)) {
                    $this->db->insert('f2a_konteks_risiko', $dataKonteks);
                } else {
                    $this->db->update('f2a_konteks_risiko', $dataKonteks, $whereKonteks);
                }
                $check = $this->db->get_where('f2a_komite_pemda', $where)->row_array();
                if (empty($check)) {
                    $query =  $this->db->insert('f2a_komite_pemda', $data);
                } else {
                    $query =   $this->db->update('f2a_komite_pemda', $data, $where);
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
    public function get_data()
    {

        $id_rpjmd = $this->input->post('id_rpjmd', TRUE);
        $tahun = $this->input->post('tahun', TRUE);

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
        $prioritas = $this->db->get_where('ref_prioritas', ['id_rpjmd' => $id_rpjmd])->result_array();
        $urusan = $this->db->get('ref_urusan')->result_array();


        $data = [
            'urusan' => $urusan,
            'sasaran' => $sasaran,
            'tujuan' => $tujuan,
            'misi' => $misi,
            'iku' => $iku,
            'prioritas' => $prioritas,
            'tahun' => $tahun,
        ];
        echo json_encode($data);
    }
    function get_urusan()
    {

        $urusan = $this->db->get('ref_urusan')->result_array();
        $html = '<option value="">Pilih Urusan</option>';
        foreach ($urusan as $urusan) {
            $html .= '<option value="' . $urusan['id'] . '">' . $urusan['urusan'] . '</option>';
        }
        echo $html;
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
            $dinas =  $this->db->select('ref_opd.nama_opd')
                ->from('dat_sasaran_strategis_pemda')
                ->join('ref_opd', 'ref_opd.id = dat_sasaran_strategis_pemda.id_pemda')
                ->where_in('id_sasaran', $id_sasaran)
                ->get()->result_array();
        } else {
            $kontekSasaran = [];
            $dinas = [];
        }

        $data = [
            'dinas' => $dinas,
            'komite' => $komite,
            'sasaran' => $sasaran,
            'tujuan' => $tujuan,
            'misi' => $misi,
            'iku' => $iku,
            'pemda' => $this->db->get_where('ref_pemda', ['id' => 1])->row()->nama_pemda,
            'prioritas' => $prioritas,
            'tahun' => $tahun,
            'kontekSasaran' => $kontekSasaran,
            'konteks' => $konteks,
            'periode' => $this->db->get_where('ref_rpjmd', ['id' => $id_rpjmd])->row_array()['nama_periode'],
            'pejabat'    => $this->db->get_where('f2a_komite_pemda', ['opd_id' => $opd_id, 'tahun' => $tahun, 'id_rpjmd' => $id_rpjmd])->row_array(),

        ];
        $this->load->view('form/export2a', $data);
    }
    public function delete($id)
    {
        $delete = $this->db->delete('f2a_iku_pemda', ['id' => $id]);
        if ($delete) {
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
    function addUrusan()
    {
        $urusan = $this->input->post('urusan', true);
        if ($urusan) {
            $data = ['urusan' => $urusan];
            $this->db->insert('ref_urusan', $data);
            $id = $this->db->insert_id();
            echo json_encode(['status' => true, 'id' => $id, 'urusan' => $urusan, 'message' => 'Urusan berhasil ditambahkan']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Urusan tidak boleh kosong']);
        }
    }
}
