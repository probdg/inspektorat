<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ref');
        $this->load->helper('bulan_helper');
        $this->load->helper('convert_helper');
        $this->load->library(array('excel'));
        // if ($this->session->userdata('level') != 3 || $this->session->userdata('token') == '') {
        //     redirect('login');
        // }
    }

    public function index()
    {
        $pemda = $this->session->userdata('opd');
        $dataPemda = $this->db->get_where('ref_opd', ['id' => 56])->row_array();
        $dataOpd = $this->db->get_where('ref_opd', ['id' => $pemda])->row_array();
        $idOpd = $dataOpd['id'];
        $namaOpd = $dataOpd['nama_opd'];
        $idPemda = $dataPemda['id'];
        $namaPemda = $dataPemda['nama_opd'];

        $data = [
            'title'  => 'Form Inspektorat',

            'sess_opd'  => $this->session->userdata('opd'),
            'namaPemda' => $namaPemda,
            'idPemda'   => $idPemda,
            'namaOpd'   => $namaOpd,
            'idOpd'     => $idOpd,
            'm1'        => $this->ref->m1(),
            'f1a'        => $this->ref->f1a(),
            'rpjmd'        => $this->ref->rpjmd(),
            'opd'       => $this->ref->opd()


        ];
        $this->load->view('form/index', $data);
    }
    public function rpjmd_opd()
    {
        $pemda = $this->input->post('opd');
        $rpjmd = $this->input->post('rpjmd');
        $sasaran = $this->db->select('dat_sasaran_strategis_pemda.*, ref_sasaran_strategis.no_urut,ref_sasaran_strategis.sasaran')
            ->from('ref_sasaran_strategis')
            ->join('dat_sasaran_strategis_pemda', 'dat_sasaran_strategis_pemda.id_sasaran = ref_sasaran_strategis.id')
            ->where('id_pemda', $pemda)
            ->where('dat_sasaran_strategis_pemda.id_rpjmd', $rpjmd)->get()->result_array();
        $tujuan = $this->db->select('ref_tujuan_strategis.*')
            ->from('ref_tujuan_strategis')
            ->where('id_rpjmd', $rpjmd)->get()->result_array();
        echo json_encode(['sasaran' => $sasaran, 'tujuan' => $tujuan]);
    }
    public function getRpjmd()
    {
        $data = $this->ref->rpjmd_opd();
        echo json_encode($data);
    }
    public function referensi()
    {
        $rpjmd = $this->input->post('rpjmd');
        $sasaran = $this->db->select('ref_sasaran_strategis.*')
            ->from('ref_sasaran_strategis')
            ->where('id_rpjmd', $rpjmd)->get()->result_array();
        $tujuan = $this->db->select('ref_tujuan_strategis.*')
            ->from('ref_tujuan_strategis')
            ->where('id_rpjmd', $rpjmd)->get()->result_array();
        $misi = $this->db->select('ref_misi_strategis.*')
            ->from('ref_misi_strategis')
            ->where('id_rpjmd', $rpjmd)->get()->result_array();
        echo json_encode(['sasaran' => $sasaran, 'tujuan' => $tujuan, 'misi' => $misi]);
    }
    public function modus($array)
    {
        $v = array_count_values($array);
        arsort($v);
        foreach ($v as $k => $v) {
            $total = $k;
            break;
        }
        return $total;
    }
    public function import()
    {
        $this->input->post('tahun');
        $this->input->post('pemda');
        $config = [
            [
                'field' => 'misi',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukan Misi Strategis',
                ],
            ],
            [
                'field' => 'rpjmd',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih RPJMD',
                ],
            ],
            [
                'field' => 'no_urut',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukan No Urut',
                    'numeric' => 'No Urut Harus Angka',
                ],
            ],

        ];


        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == TRUE) {
        } else {
            if (isset($_FILES["fileExcel"]["name"])) {
                $path = $_FILES["fileExcel"]["tmp_name"];
                $object = PHPExcel_IOFactory::load($path);
                $sheets = $object->getActiveSheet()->toArray(null, true, true, true);

                $a1 = [];
                $a2 = [];
                $a3 = [];
                $a4 = [];
                $b1 = [];
                $b2 = [];
                $b3 = [];
                $b4 = [];
                $c1 = [];
                $c2 = [];
                $c3 = [];
                $c4 = [];
                $c5 = [];
                $c6 = [];
                $c7 = [];
                $c8 = [];
                $d1 = [];
                $d2 = [];
                $d3 = [];
                $d4 = [];
                $e1 = [];
                $e2 = [];
                $e3 = [];
                $f1 = [];
                $f2 = [];
                $f3 = [];
                $f4 = [];
                $f5 = [];
                $f6 = [];
                $f7 = [];
                $g1 = [];
                $g2 = [];
                $g3 = [];
                $g4 = [];
                $g5 = [];
                $h1 = [];
                $h1 = [];
                $totalRows = count($sheets);
                for ($row = 2; $row <= $totalRows; $row++) {
                    // KEBUTUHAN RPJMD 2019 - 2023
                    // A
                    $a1[] = intval($sheets[$row]['E']);
                    $a2[] = intval($sheets[$row]['F']);
                    $a3[] = intval($sheets[$row]['G']);
                    $a4[] = intval($sheets[$row]['H']);
                    // B
                    $b1[] = intval($sheets[$row]['I']);
                    $b2[] = intval($sheets[$row]['J']);
                    $b3[] = intval($sheets[$row]['K']);
                    $b4[] = intval($sheets[$row]['L']);
                    // C
                    $c1[] = intval($sheets[$row]['M']);
                    $c2[] = intval($sheets[$row]['N']);
                    $c3[] = intval($sheets[$row]['O']);
                    $c4[] = intval($sheets[$row]['P']);
                    $c5[] = intval($sheets[$row]['Q']);
                    $c6[] = intval($sheets[$row]['R']);
                    $c7[] = intval($sheets[$row]['S']);
                    $c8[] = intval($sheets[$row]['T']);
                    // D
                    $d1[] = intval($sheets[$row]['U']);
                    $d2[] = intval($sheets[$row]['V']);
                    $d3[] = intval($sheets[$row]['W']);
                    $d4[] = intval($sheets[$row]['X']);
                    // E
                    $e1[] = intval($sheets[$row]['Y']);
                    $e2[] = intval($sheets[$row]['Z']);
                    $e3[] = intval($sheets[$row]['AA']);
                    // F
                    $f1[] = intval($sheets[$row]['AB']);
                    $f2[] = intval($sheets[$row]['AC']);
                    $f3[] = intval($sheets[$row]['AD']);
                    $f4[] = intval($sheets[$row]['AE']);
                    $f5[] = intval($sheets[$row]['AF']);
                    $f6[] = intval($sheets[$row]['AG']);
                    $f7[] = intval($sheets[$row]['AH']);
                    //G
                    $g1[] = intval($sheets[$row]['AI']);
                    $g2[] = intval($sheets[$row]['AJ']);
                    $g3[] = intval($sheets[$row]['AK']);
                    $g4[] = intval($sheets[$row]['AL']);
                    $g5[] = intval($sheets[$row]['AM']);
                    //H
                    $h1[] = intval($sheets[$row]['AN']);
                    $h1[] = intval($sheets[$row]['AO']);
                }
                // echo json_encode($a1);
                $dataModus = [
                    $this->modus($a1), $this->modus($a2), $this->modus($a3), $this->modus($a4),

                    $this->modus($b1), $this->modus($b2), $this->modus($b3), $this->modus($b4),

                    $this->modus($c1), $this->modus($c2), $this->modus($c3), $this->modus($c4),
                    $this->modus($c5), $this->modus($c6), $this->modus($c7), $this->modus($c8),

                    $this->modus($d1), $this->modus($d2), $this->modus($d3), $this->modus($d4),
                    $this->modus($e1), $this->modus($e2), $this->modus($e3),

                    $this->modus($f1), $this->modus($f2), $this->modus($f3), $this->modus($f4),
                    $this->modus($f5), $this->modus($f6), $this->modus($f7),

                    $this->modus($g1), $this->modus($g2), $this->modus($g3), $this->modus($g4), $this->modus($g5),

                    $this->modus($h1), $this->modus($h1)

                ];
                $question = $this->db->get_where('c_f1a')->result_array();
                $i = 0;
                foreach ($question as $q) {
                    $modus = $dataModus[$i];
                    $data = [
                        'tahun_penilaian'   => $this->input->post('tahun'),
                        'opd_id'            => $this->input->post('id_opd'),
                        'nama_pemda'        => $this->input->post('pemda'),
                        'nama_opd'          => $this->input->post('pemda'),
                        'question_id'       => $q['id'],
                        'questions'         => $q['question'],
                        'id_master'         => $q['id_master'],
                        'modus'             => $modus,
                        'created_at'        => date('Y-m-d H:i:s'),
                        'keterangan'        => $this->keterangan($modus),
                        'simpulan'          => $this->simpulan($modus)
                    ];
                    $this->db->insert('f1a_answers', $data);
                    $i++;
                }
                echo json_encode(
                    array(
                        'status' => true,
                        'message' => 'Data berhasil diupload'
                    )
                );
            } else {
                echo json_encode(
                    array(
                        'status' => false,
                        'message' => 'File tidak ditemukan'
                    )
                );
            }
        }
    }
    function keterangan($nilai)
    {
        if ($nilai == '1') {
            $hasil =  'Tidak Setuju/Belum ada/ belum dibangun';
        } else if ($nilai == '2') {
            $hasil = 'Kurang Setuju/Telah dibangun/diterapkan, akan tetapi belum konsisten';
        } else if ($nilai == '3') {
            $hasil = 'Setuju/Sudah dibangun atau diterapkan dengan baik, tapi masih bisa ditingkatkan';
        } else if ($nilai == '4') {
            $hasil = 'Sangat Setuju/Sudah dibangun atau diterapkan dengan baik dan dapat ditularkan ke organisasi lain';
        } else {
            $hasil = 'Belum di isi';
        }
        return $hasil;
    }
    function simpulan($nilai)
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
    function loadResponden()
    {
        $tahun = $this->input->post('tahun');
        $id_opd = $this->input->post('id_opd');
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
        $data = [
            'tahun'     => $tahun,
            'id_opd'    => $id_opd,
            'master'    => $master
        ];

        $this->load->view('form/export1a', $data);
    }
}
