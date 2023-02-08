

<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Form4 extends CI_Controller
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
        $select = 'f3a_risk_pemda.*,(skala_dampak * skala_kemungkinan) as skala_risiko';
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
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="editSkalaPemda(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->uraian_risiko;
            $row[] = $list->kode_risiko;
            $row[] = $list->skala_dampak;
            $row[] = $list->skala_kemungkinan;
            $row[] = $list->skala_risiko;

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
        $select = 'f3b_risk_opd.*,(skala_dampak * skala_kemungkinan) as skala_risiko';
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
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="editSkalaOpd(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->uraian_risiko;
            $row[] = $list->kode_risiko;
            $row[] = $list->skala_dampak;
            $row[] = $list->skala_kemungkinan;
            $row[] = $list->skala_risiko;

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
        $select = 'f3c_risk_operasional.*,(skala_dampak * skala_kemungkinan) as skala_risiko';
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
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="editSkalaOperasional(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->uraian_risiko;
            $row[] = $list->kode_risiko;
            $row[] = $list->skala_dampak;
            $row[] = $list->skala_kemungkinan;
            $row[] = $list->skala_risiko;

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
        $row = $this->db->get_where('f3a_risk_pemda', ['id' => $id])->row();
        $dampak = $this->getDampak($row->kategori_dampak);
        $row->dampak = $dampak;
        echo json_encode($row);
    }

    public function edit_opd()
    {
        $id = $this->input->post('id');
        $row = $this->db->get_where('f3b_risk_opd', ['id' => $id])->row();
        $dampak = $this->getDampak($row->kategori_dampak);
        $row->dampak = $dampak;
        echo json_encode($row);
    }
    public function edit_operasional()
    {
        $id = $this->input->post('id');
        $row = $this->db->get_where('f3c_risk_operasional', ['id' => $id])->row();
        $dampak = $this->getDampak($row->kategori_dampak);
        $row->dampak = $dampak;
        echo json_encode($row);
    }
    public function getDampak($table)
    {
        $data = [];
        if ($table) {
            $row = $this->db->get($table)->result();
            if ($table == 'ref_gangguan_pelayanan')
                foreach ($row as $r) {
                    $data[] = [
                        'id'    => $r->id,
                        'reg'   => $r->reg,
                        'nama'  => $r->level_dampak . ' (' . $r->gangguan_pelayanan . ')'
                    ];
                }
            else if ($table == 'ref_kerugian_negara') {
                foreach ($row as $r) {
                    $data[] = [
                        'id'    => $r->id,
                        'reg'   => $r->reg,
                        'nama'  => $r->level_dampak . ' (' . $r->kerugian_negara . ')'
                    ];
                }
            } else if ($table == 'ref_tuntutan_hukum') {
                foreach ($row as $r) {
                    $data[] = [
                        'id'    => $r->id,
                        'reg'   => $r->reg,
                        'nama'  => $r->level_dampak . ' (' . $r->tuntutan_hukum . ')'
                    ];
                }
            } else if ($table == 'ref_penurunan_kinerja') {
                foreach ($row as $r) {
                    $data[] = [
                        'id'    => $r->id,
                        'reg'   => $r->reg,
                        'nama'  => $r->level_dampak . ' (' . $r->penurunan_kinerja . ')'
                    ];
                }
            } else {
                foreach ($row as $r) {
                    $data[] = [
                        'id'    => $r->id,
                        'reg'   => $r->reg,
                        'nama'  => $r->level_dampak . ' (' . $r->penurunan_reputasi . ')'
                    ];
                }
            }
        }
        return $data;
    }
    public function save_pemda()
    {

        $id = $this->input->post('id', TRUE);
        $data = [
            'skala_dampak'  => $this->input->post('skala_dampak', TRUE),
            'skala_kemungkinan' => $this->input->post('skala_kemungkinan', TRUE),
        ];
        $this->db->update('f3a_risk_pemda', $data, ['id' => $id]);
        $msg = 'Data berhasil diperbaharui';
        echo json_encode(['status' => TRUE, 'message' => $msg]);
    }
    public function save_opd()
    {

        $id = $this->input->post('id', TRUE);
        $data = [
            'skala_dampak'  => $this->input->post('skala_dampak', TRUE),
            'skala_kemungkinan' => $this->input->post('skala_kemungkinan', TRUE),
        ];
        $this->db->update('f3b_risk_opd', $data, ['id' => $id]);
        $msg = 'Data berhasil diperbaharui';
        echo json_encode(['status' => TRUE, 'message' => $msg]);
    }
    public function save_operasional()
    {

        $id = $this->input->post('id', TRUE);
        $data = [
            'skala_dampak'  => $this->input->post('skala_dampak', TRUE),
            'skala_kemungkinan' => $this->input->post('skala_kemungkinan', TRUE),
        ];
        $this->db->update('f3c_risk_operasional', $data, ['id' => $id]);
        $msg = 'Data berhasil diperbaharui';
        echo json_encode(['status' => TRUE, 'message' => $msg]);
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
            'risk_pemda' => $this->db->get_where('f3a_risk_pemda', ['id_rpjmd' => $id_rpjmd, 'urusan' => $urusan, 'tahun' => $tahun,])->result_array(),
            'periode' => $this->db->get_where('ref_rpjmd', ['id' => $id_rpjmd])->row_array()['nama_periode'],
        ];
        $data['risk_opd'] = [];
        $data['risk_operasional'] = [];
        if ($this->session->userdata('opd') == 56) {
            foreach ($dinas as $d) {
                $rowOpd = $this->db->get_where('f3b_risk_opd', ['id_rpjmd' => $id_rpjmd, 'opd_id' => $d['id'], 'urusan' => $urusan, 'tahun' => $tahun])->result_array();
                $rowOperasional = $this->db->get_where('f3c_risk_operasional', ['id_rpjmd' => $id_rpjmd, 'opd_id' => $d['id'], 'urusan' => $urusan, 'tahun' => $tahun])->result_array();
                $detailOpd = [];
                $detailOperasional = [];

                foreach ($rowOpd as $ro) {
                    if (intval($ro['skala_dampak']) * intval($ro['skala_kemungkinan']) > 0)
                        $detailOpd[] = [
                            'uraian_risiko' => $ro['uraian_risiko'],
                            'skala_dampak' => $ro['skala_dampak'],
                            'skala_kemungkinan' => $ro['skala_kemungkinan'],
                            'kode_risiko' => $ro['kode_risiko'],
                            'skala_risiko' => $ro['skala_dampak'] * $ro['skala_kemungkinan'],
                        ];
                }
                $data['risk_opd'][] = ['nama_opd' => $d['nama_opd'], 'detail' => $detailOpd];
                foreach ($rowOperasional as $ro) {
                    if (intval($ro['skala_dampak']) * intval($ro['skala_kemungkinan']) > 0)
                        $detailOperasional[] = [
                            'uraian_risiko' => $ro['uraian_risiko'],
                            'skala_dampak' => $ro['skala_dampak'],
                            'skala_kemungkinan' => $ro['skala_kemungkinan'],
                            'kode_risiko' => $ro['kode_risiko'],
                            'skala_risiko' => $ro['skala_dampak'] * $ro['skala_kemungkinan'],
                        ];
                }
                $data['risk_operasional'][] = ['nama_opd' => $d['nama_opd'], 'detail' => $detailOperasional];
            }
        } else {


            $rowOpd =  $this->db->get_where('f3b_risk_opd', ['id_rpjmd' => $id_rpjmd, 'urusan' => $urusan, 'tahun' => $tahun, 'opd_id' => $opd_id])->result_array();
            foreach ($rowOpd as $ro) {
                if (intval($ro['skala_dampak']) * intval($ro['skala_kemungkinan']) > 0)
                    $detailOpd[] = [
                        'uraian_risiko' => $ro['uraian_risiko'],
                        'skala_dampak' => $ro['skala_dampak'],
                        'skala_kemungkinan' => $ro['skala_kemungkinan'],
                        'kode_risiko' => $ro['kode_risiko'],
                        'skala_risiko' => $ro['skala_dampak'] * $ro['skala_kemungkinan'],
                    ];
            }
            $detailOpd = [];
            $detailOperasional = [];
            $data['risk_opd'][] = [
                'nama_opd' => $nama_opd,
                'detail' => $detailOpd,
            ];
            $rowOperasional =   $this->db->get_where('f3c_risk_operasional', ['id_rpjmd' => $id_rpjmd, 'urusan' => $urusan, 'tahun' => $tahun, 'opd_id' => $opd_id])->result_array();
            foreach ($rowOperasional as $ro) {
                if (intval($ro['skala_dampak']) * intval($ro['skala_kemungkinan']) > 0)

                    $detailOperasional[] = [
                        'uraian_risiko' => $ro['uraian_risiko'],
                        'skala_dampak' => $ro['skala_dampak'],
                        'skala_kemungkinan' => $ro['skala_kemungkinan'],
                        'kode_risiko' => $ro['kode_risiko'],
                        'skala_risiko' => $ro['skala_dampak'] * $ro['skala_kemungkinan'],
                    ];
            }
            $data['risk_operasional'][] = [
                'nama_opd' => $nama_opd,
                'detail'   => $detailOperasional
            ];
        }
        // echo json_encode($data);
        $this->load->view('form/export4', $data);
    }
    public function json()
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
            'risk_pemda' => $this->db->get_where('f3a_risk_pemda', ['id_rpjmd' => $id_rpjmd, 'urusan' => $urusan, 'tahun' => $tahun,])->result_array(),
            'periode' => $this->db->get_where('ref_rpjmd', ['id' => $id_rpjmd])->row_array()['nama_periode'],
        ];
        $data['risk_opd'] = [];
        $data['risk_operasional'] = [];
        if ($this->session->userdata('opd') == 56) {
            foreach ($dinas as $d) {
                $rowOpd = $this->db->get_where('f3b_risk_opd', ['id_rpjmd' => $id_rpjmd, 'opd_id' => $d['id'], 'urusan' => $urusan, 'tahun' => $tahun])->result_array();
                $rowOperasional = $this->db->get_where('f3c_risk_operasional', ['id_rpjmd' => $id_rpjmd, 'opd_id' => $d['id'], 'urusan' => $urusan, 'tahun' => $tahun])->result_array();
                $detailOpd = [];
                $detailOperasional = [];

                foreach ($rowOpd as $ro) {
                    if (intval($ro['skala_dampak']) * intval($ro['skala_kemungkinan']) > 0)
                        $detailOpd[] = [
                            'uraian_risiko' => $ro['uraian_risiko'],
                            'skala_dampak' => $ro['skala_dampak'],
                            'skala_kemungkinan' => $ro['skala_kemungkinan'],
                            'kode_risiko' => $ro['kode_risiko'],
                            'skala_risiko' => $ro['skala_dampak'] * $ro['skala_kemungkinan'],
                        ];
                }
                $data['risk_opd'][] = ['nama_opd' => $d['nama_opd'], 'detail' => $detailOpd];
                foreach ($rowOperasional as $ro) {
                    if (intval($ro['skala_dampak']) * intval($ro['skala_kemungkinan']) > 0)
                        $detailOperasional[] = [
                            'uraian_risiko' => $ro['uraian_risiko'],
                            'skala_dampak' => $ro['skala_dampak'],
                            'skala_kemungkinan' => $ro['skala_kemungkinan'],
                            'kode_risiko' => $ro['kode_risiko'],
                            'skala_risiko' => $ro['skala_dampak'] * $ro['skala_kemungkinan'],
                        ];
                }
                $data['risk_operasional'][] = ['nama_opd' => $d['nama_opd'], 'detail' => $detailOperasional];
            }
        } else {


            $rowOpd =  $this->db->get_where('f3b_risk_opd', ['id_rpjmd' => $id_rpjmd, 'urusan' => $urusan, 'tahun' => $tahun, 'opd_id' => $opd_id])->result_array();
            foreach ($rowOpd as $ro) {
                if (intval($ro['skala_dampak']) * intval($ro['skala_kemungkinan']) > 0)
                    $detailOpd[] = [
                        'uraian_risiko' => $ro['uraian_risiko'],
                        'skala_dampak' => $ro['skala_dampak'],
                        'skala_kemungkinan' => $ro['skala_kemungkinan'],
                        'kode_risiko' => $ro['kode_risiko'],
                        'skala_risiko' => $ro['skala_dampak'] * $ro['skala_kemungkinan'],
                    ];
            }
            $detailOpd = [];
            $detailOperasional = [];
            $data['risk_opd'][] = [
                'nama_opd' => $nama_opd,
                'detail' => $detailOpd,
            ];
            $rowOperasional =   $this->db->get_where('f3c_risk_operasional', ['id_rpjmd' => $id_rpjmd, 'urusan' => $urusan, 'tahun' => $tahun, 'opd_id' => $opd_id])->result_array();
            foreach ($rowOperasional as $ro) {
                if (intval($ro['skala_dampak']) * intval($ro['skala_kemungkinan']) > 0)

                    $detailOperasional[] = [
                        'uraian_risiko' => $ro['uraian_risiko'],
                        'skala_dampak' => $ro['skala_dampak'],
                        'skala_kemungkinan' => $ro['skala_kemungkinan'],
                        'kode_risiko' => $ro['kode_risiko'],
                        'skala_risiko' => $ro['skala_dampak'] * $ro['skala_kemungkinan'],
                    ];
            }
            $data['risk_operasional'][] = [
                'nama_opd' => $nama_opd,
                'detail'   => $detailOperasional
            ];
        }
        echo json_encode($data);
    }
}
