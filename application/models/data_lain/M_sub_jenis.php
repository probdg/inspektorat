<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sub_jenis extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private function _get_datatables_query($tabel, $column_order, $coloumn_search, $order_by)
    {
        $this->db->select('ref_sub_jenis.id id_sub_jenis,ref_sub_jenis.ket, ref_sub_jenis.sub_jenis,ref_jenis.jenis');
        $this->db->from($tabel);
        $this->db->join('ref_jenis', 'ref_jenis.id=ref_sub_jenis.id_jenis');
        $i = 0;

        foreach ($coloumn_search as $item) // loop column 
        {
            if (@strtolower($_POST['search']['value'])) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, strtolower($_POST['search']['value']));
                } else {
                    $this->db->or_like($item, strtolower($_POST['search']['value']));
                }

                if (count($coloumn_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($order_by)) {
            $order = $order_by;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($tabel, $column_order, $coloumn_search, $order_by)
    {
        $this->_get_datatables_query($tabel, $column_order, $coloumn_search, $order_by);
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }


    function count_filtered($tabel, $column_order, $coloumn_search, $order_by)
    {
        $this->_get_datatables_query($tabel, $column_order, $coloumn_search, $order_by);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($tabel, $column_order, $coloumn_search, $order_by)
    {
        $this->_get_datatables_query($tabel, $column_order, $coloumn_search, $order_by);
        return $this->db->count_all_results();
    }
}
