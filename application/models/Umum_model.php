<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Umum_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  private function _get_datatables_query($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by)
  {
    $this->db->select($select);
    $this->db->from($tabel);

    if ($where != []) {
      $this->db->where($where);
    }

    if ($group_by != []) {
      $this->db->group_by($group_by);
    }

    if ($join != []) {
      foreach ($join as $j) {
        if ($j['direction'] == "") {
          $this->db->join($j['field'], $j['condition']);
        } else {
          $this->db->join($j['field'], $j['condition'], $j['direction']);
        }
      }
    }

    $i = 0;

    foreach ($coloumn_search as $item) // loop column 
    {
      if (strtolower($this->input->post('search')['value'])) // if datatable send POST for search
      {

        if ($i === 0) // first loop
        {
          $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
          $this->db->like($item, strtolower($this->input->post('search')['value']));
        } else {
          $this->db->or_like($item, strtolower($this->input->post('search')['value']));
        }

        if (count($coloumn_search) - 1 == $i) //last loop
          $this->db->group_end(); //close bracket
      }
      $i++;
    }

    if ($this->input->post('order')) // here order processing
    {
      $this->db->order_by($column_order[$this->input->post('order')['0']['column']], $this->input->post('order')['0']['dir']);
    } else if (isset($order_by)) {
      $order = $order_by;
      $this->db->order_by(key($order), $order[key($order)]);
    }
  }

  function get_datatables($tabel, $column_order, $coloumn_search, $order_by, $where = [], $join = [], $select = "*", $group_by = [])
  {
    $this->_get_datatables_query($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
    if ($this->input->post('length') != -1)
      $this->db->limit(@$this->input->post('length'), $this->input->post('start'));
    $query = $this->db->get();
    return $query->result();
  }


  function count_filtered($tabel, $column_order, $coloumn_search, $order_by, $where = [], $join = [], $select = "*", $group_by = [])
  {
    $this->_get_datatables_query($tabel, $column_order, $coloumn_search, $order_by, $where, $join, $select, $group_by);
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function count_all($tabel, $join = [], $where)
  {

    $this->db->from($tabel);
    if ($join != []) {
      foreach ($join as $j) {
        if ($j['direction'] == "") {
          $this->db->join($j['field'], $j['condition']);
        } else {
          $this->db->join($j['field'], $j['condition'], $j['direction']);
        }
      }
    }
    if ($where != []) {
      $this->db->where($where);
    }
    return $this->db->count_all_results();
  }
  function generateKode($table, $field, $prefix, $suffix)
  {
    $kode = $this->db->query("SELECT MAX($field) as $field from $table where kode_sales like '$prefix%'")->row_array()[$field];

    $nourut = (int) substr($kode, strlen($prefix), $suffix);
    $nourut++;
    $kodeBaru = $prefix . sprintf('%0' . $suffix . 's', $nourut);
    return $kodeBaru;
  }
}
