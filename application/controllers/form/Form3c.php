
<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Form3c extends CI_Controller
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
        $tabel = 'f3c_risk_operasional';
        $column_order = array(null, 'uraian_risiko', 'kode_risiko', 'pemilik', 'uraian_sebab', 'sumber', 'kendali', 'uraian_dampak', 'pihak_terkena', null);
        $coloumn_search = array('uraian_risiko', 'kode_risiko', 'pemilik', 'uraian_sebab', 'sumber', 'kendali', 'uraian_dampak', 'pihak_terkena');
        $order_by = array('id' => 'asc');
        $join = [];
        $join[] = [
            'field' => 'f2c_output',
            'condition' => 'f2c_output.id = f3c_risk_operasional.kegiatan',
            'direction' => 'left'
        ];
        $where = [];
        $select = 'f3c_risk_operasional.*,f2c_output.output,f2c_output.kegiatan as nama_kegiatan';
        $group_by = [];
        $id = $this->input->post('rpjmd');
        $urusan = $this->input->post('urusan');
        $tahun = $this->input->post('tahun');
        $opd = $this->input->post('opd');

        $where['f3c_risk_operasional.id_rpjmd'] = $id;
        $where['f3c_risk_operasional.urusan'] = $urusan;
        $where['f3c_risk_operasional.tahun'] = $tahun;
        $where['f3c_risk_operasional.opd_id'] = $opd;

        $list = $this->umum->get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
        $data = array();

        $no = $this->input->post('start');

        foreach ($list as $list) {
            $edit   = '<a class="btn btn-primary btn-icon btn-sm" href="javascript:void(0)"  title="Edit" onclick="edit_risk_operasional(' . "'" . $list->id . "'" . ')"><i class="fa fa-edit"></i></a>';
            $delete = ' <a class="btn btn-danger btn-icon btn-sm" href="javascript:void(0)"  title="Hapus" onclick="_delete_risk_operasional(' . "'" . $list->id . "'" . ',' . "'" . $list->kode_risiko . "'"  . ')"><i class="fa fa-trash"></i></a>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama_kegiatan;
            $row[] = $list->output;
            $row[] = $list->tahapan;
            $row[] = $list->uraian_risiko;
            $row[] = $list->kode_risiko;
            $row[] = $list->pemilik;
            $row[] = $list->uraian_sebab;
            $row[] = $list->sumber == 2 ? 'Internal' : 'Eksternal';
            $row[] = $list->kendali;
            $row[] = $list->uraian_dampak;
            $row[] = $list->pihak_terkena;

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

    public function edit()
    {
        $id = $this->input->post('id');
        $row = $this->db->get_where('f3c_risk_operasional', ['id' => $id])->row();
        echo json_encode($row);
    }
    public function delete($id)
    {
        $delete = $this->db->delete('f3c_risk_operasional', ['id' => $id]);
        if ($delete) {
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }
    public function save()
    {
        $rpjmd = $this->input->post('rpjmd', TRUE);
        $uraian_risiko = $this->input->post('uraian_risiko', TRUE);
        $pemilik = $this->input->post('pemilik', TRUE);
        $uraian_sebab = $this->input->post('uraian_sebab', TRUE);
        $sumber = $this->input->post('sumber', TRUE);
        $kendali = $this->input->post('kendali', TRUE);
        $uraian_dampak = $this->input->post('uraian_dampak', TRUE);
        $pihak_terkena = $this->input->post('pihak_terkena', TRUE);
        $tahun = $this->input->post('tahun', TRUE);
        $urusan = $this->input->post('urusan_pemda', TRUE);
        $id_opd = $this->input->post('id_opd', TRUE);
        $opd_penilai = $this->input->post('opd_penilai', TRUE);
        $jenis_risiko = $this->input->post('jenis_risiko', TRUE);
        $id = $this->input->post('id', TRUE);
        $tahapan = $this->input->post('tahapan', TRUE);
        $kegiatan = $this->input->post('kegiatan', TRUE);
        $kategori_dampak = $this->input->post('kategori_dampak', TRUE);


        $config = [
            [
                'field' => 'kendali',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Kendali Risiko',
                ],
            ],
            [
                'field' => 'kategori_dampak',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Kategori Dampak',
                ],
            ],
            [
                'field' => 'urusan_pemda',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Urusan Risiko',
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
                'id_rpjmd'     => $rpjmd,
                'tahapan'       => $tahapan,
                'kegiatan'      => $kegiatan,
                'opd_id'        => $id_opd,
                'uraian_risiko' => $uraian_risiko,
                'opd_penilai'   => $opd_penilai,
                'jenis_risiko'  => $jenis_risiko,
                'pemilik'       => $pemilik,
                'uraian_sebab'  => $uraian_sebab,
                'sumber'        => $sumber,
                'kendali'       => $kendali,
                'uraian_dampak' => $uraian_dampak,
                'pihak_terkena' => $pihak_terkena,
                'kategori_dampak' => $kategori_dampak,
                'urusan'        => $urusan,
                'tahun'         => $tahun,
            ];
            $getMax  =    $this->db
                ->select('max(no_urut) no_urut')
                ->from('f3c_risk_operasional')
                ->where('id_rpjmd', $rpjmd)
                ->where('opd_penilai', $opd_penilai)
                ->where('tahun', $tahun)
                ->where('jenis_risiko', $jenis_risiko)
                ->get()->row();
            if (!empty($getMax)) {
                $no_urut = $getMax->no_urut + 1;
            } else {
                $no_urut = 1;
            }
            $kode_jenis = str_pad($jenis_risiko, 2, '0', STR_PAD_LEFT);
            $kode_opd = str_pad($opd_penilai, 2, '0', STR_PAD_LEFT);
            $kode = 'ROO.' . substr($tahun, 2, 4) . '.' . $kode_jenis . '.' . $kode_opd . '.' . str_pad($no_urut, 2, '0', STR_PAD_LEFT);
            $data['no_urut']     = $no_urut;
            $data['kode_risiko'] = $kode;
            if (!empty($id)) {
                $this->db->update('f3c_risk_operasional', $data, ['id' => $id]);
                $msg = 'Data berhasil diperbaharui';
            } else {

                $this->db->insert('f3c_risk_operasional', $data);
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
    public function getKegiatan()
    {
        $id_rpjmd = $this->input->post('id_rpjmd', TRUE);
        $tahun = $this->input->post('tahun', TRUE);
        $opd_id = $this->input->post('id_opd', TRUE);
        $urusan = $this->input->post('urusan', TRUE);
        $output = $this->db->get_where('f2c_output', ['id_rpjmd' => $id_rpjmd, 'opd_id' => $opd_id, 'tahun' => $tahun, 'urusan' => $urusan])->result_array();
        echo json_encode($output);
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
        $this->load->view('form/export3c', $data);
    }
}
