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
