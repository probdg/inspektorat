<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ref extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function opd()
    {
        $opd = $this->db->get('ref_opd')->result();
        return $opd;
    }
    public function m1()
    {
        $master = $this->db->from('m_f1a')->order_by('urutan', 'asc')->get()->result_array();
        return $master;
    }
    public function rpjmd()
    {
        $master = $this->db->from('ref_rpjmd')->get()->result_array();
        return $master;
    }
    public function rpjmd_opd()
    {
        $tahun = $this->input->post('tahun');
        $sql = 'SELECT * FROM ref_rpjmd WHERE ? between periode_awal and periode_akhir';
        $query = $this->db->query($sql, [$tahun])->row_array();
        return $query;
    }

    public function sasaran()
    {
        $rpjmd = $this->input->post('rpjmd');
        $pemda = $this->input->post('pemda');
        $master = $this->db->select('dat_sasaran_strategis_pemda.*, ref_sasaran_strategis.sasaran')
            ->from('ref_sasaran_strategis')
            ->join('dat_sasaran_strategis_pemda', 'dat_sasaran_strategis_pemda.id_sasaran = ref_sasaran_strategis.id', 'right')
            ->where('id_pemda', $pemda)
            ->where('dat_sasaran_strategis_pemda.id_rpjmd', $rpjmd)->get()->result_array();
        $sasaran = [];
        foreach ($master as $m) {
            $sasaran[] = $m['id_sasaran'];
        }
        if ($sasaran) {
            $dataSasaran =  $this->db->from('ref_sasaran_strategis')->where('id_rpjmd', $rpjmd)->where_not_in('id', $sasaran)->get()->result_array();
        } else {
            $dataSasaran =  $this->db->from('ref_sasaran_strategis')->where('id_rpjmd', $rpjmd)->get()->result_array();
        }
        return $dataSasaran;
    }
    public function f1a()
    {
        $dataMaster = [];
        $master = $this->db->from('m_f1a')->order_by('urutan', 'asc')->get()->result();
        foreach ($master as $m) {
            $dataDetail = [];
            $detail =  $this->db->get_where('c_f1a', ['id_master' => $m->id])->result();
            foreach ($detail as $de) {
                $dataDetail[] = [
                    'id_master' => $de->id_master,
                    'id'        => $de->id,
                    'question'  => $de->question,
                ];
            }
            $dataMaster[] = [
                'id' => $m->id,
                'question' => $m->question,
                'urutan'    => $m->urutan,
                'detail'    => $dataDetail,
            ];
        }
        return $dataMaster;
    }

    public function f1a1()
    {
        $dataMaster = [];
        $master = $this->db->from('m_f1a')->order_by('urutan', 'asc')->get()->result();
        foreach ($master as $m) {
            $dataDetail = [];
            $detail =  $this->db->get_where('c_f1a_spip', ['id_master' => $m->id])->result();
            foreach ($detail as $de) {
                $dataDetail[] = [
                    'id_master' => $de->id_master,
                    'id'        => $de->id,
                    'question'  => $de->question,
                ];
            }
            $dataMaster[] = [
                'id' => $m->id,
                'question' => $m->question,
                'urutan'    => $m->urutan,
                'detail'    => $dataDetail,
            ];
        }
        return $dataMaster;
    }
}
