

<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Form5 extends CI_Controller
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
    public function export()
    {
        $id_rpjmd = $this->input->post('id_rpjmd', TRUE);
        $tahun = $this->input->post('tahun', TRUE);
        $opd_id = $this->input->post('id_opd', TRUE);
        $urusan = $this->input->post('urusan', TRUE);
        $batas = $this->input->post('batas', TRUE);

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
        $data['risk_pemda'] = $this->db
            ->where('(skala_dampak * skala_kemungkinan) >=', $batas)
            ->where(['id_rpjmd' => $id_rpjmd, 'urusan' => $urusan, 'tahun' => $tahun,])
            ->get('f3a_risk_pemda')->result_array();

        $data['risk_opd'] = [];
        $data['risk_operasional'] = [];
        if ($this->session->userdata('opd') == 56) {
            foreach ($dinas as $d) {
                $rowOpd = $this->db
                    ->from('f3b_risk_opd')
                    ->where(['id_rpjmd' => $id_rpjmd, 'opd_id' => $d['id'], 'urusan' => $urusan, 'tahun' => $tahun])
                    ->where('(skala_dampak * skala_kemungkinan) >=', $batas)
                    ->get()
                    ->result_array();
                $rowOperasional = $this->db->select('*')
                    ->from('f3c_risk_operasional')
                    ->where('(skala_dampak * skala_kemungkinan) >=', $batas)
                    ->where(['id_rpjmd' => $id_rpjmd, 'opd_id' => $d['id'], 'urusan' => $urusan, 'tahun' => $tahun])
                    ->get()
                    ->result_array();
                $detailOpd = [];
                $detailOperasional = [];

                foreach ($rowOpd as $ro) {
                    $detailOpd[] = [
                        'uraian_risiko' => $ro['uraian_risiko'],
                        'skala_dampak' => $ro['skala_dampak'],
                        'skala_kemungkinan' => $ro['skala_kemungkinan'],
                        'pemilik'     => $ro['pemilik'],
                        'uraian_sebab'  => $ro['uraian_sebab'],
                        'uraian_dampak' => $ro['uraian_dampak'],
                        'kode_risiko' => $ro['kode_risiko'],
                        'skala_risiko' => $ro['skala_dampak'] * $ro['skala_kemungkinan'],
                    ];
                }
                // $namaOpd['detail'][] = $detailOpd;
                $data['risk_opd'][] = ['nama_opd' => $d['nama_opd'], 'detail' => $detailOpd];
                foreach ($rowOperasional as $roper) {
                    $detailOperasional[] = [
                        'uraian_risiko' => $roper['uraian_risiko'],
                        'skala_dampak' => $roper['skala_dampak'],
                        'pemilik'     => $roper['pemilik'],
                        'uraian_sebab'  => $roper['uraian_sebab'],
                        'skala_kemungkinan' => $roper['skala_kemungkinan'],
                        'uraian_dampak' => $roper['uraian_dampak'],
                        'kode_risiko' => $roper['kode_risiko'],
                        'skala_risiko' => $roper['skala_dampak'] * $roper['skala_kemungkinan'],
                    ];
                }
                $data['risk_operasional'][] = ['nama_opd' => $d['nama_opd'], 'detail' => $detailOperasional];
            }
        } else {
            $data['risk_opd'][] = [
                'nama_opd' => $nama_opd,
                'detail' => $this->db->select('*')
                    ->from('f3b_risk_opd')
                    ->where('(skala_dampak * skala_kemungkinan) >=', $batas)
                    ->where(['id_rpjmd' => $id_rpjmd, 'opd_id' => $opd_id, 'urusan' => $urusan, 'tahun' => $tahun])
                    ->get()
                    ->result_array(),
            ];
            $data['risk_operasional'][] = [
                'nama_opd' => $nama_opd,
                'detail'            => $this->db->select('*')
                    ->from('f3c_risk_operasional')
                    ->where('(skala_dampak * skala_kemungkinan) >=', $batas)
                    ->where(['id_rpjmd' => $id_rpjmd, 'opd_id' => $opd_id, 'urusan' => $urusan, 'tahun' => $tahun])
                    ->get()
                    ->result_array(),
            ];
        }
        // echo json_encode($data);
        $this->load->view('form/export5', $data);
    }
}
