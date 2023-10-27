<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function get_total_data($table_name)
    {
        return $this->db->count_all($table_name);
    }

    // CIMB
    public function get_all_data_cimb()
    {
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get('cimb_forms');
        return $query->result_array();
    }
    public function get_filtered_data_cimb($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get('cimb_forms');
        return $query->result_array();
    }

    // BSI
    public function get_all_data_bsi()
    {
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get('bsi_forms');
        return $query->result_array();
    }
    public function get_filtered_data_bsi($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get('bsi_forms');
        return $query->result_array();
    }

    // TMRW by UOB
    public function get_all_data_uob()
    {
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get('uob_forms');
        return $query->result_array();
    }
    public function get_filtered_data_uob($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get('uob_forms');
        return $query->result_array();
    }

    // LINE BANK
    public function get_all_data_line()
    {
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get('line_forms');
        return $query->result_array();
    }
    public function get_filtered_data_line($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get('line_forms');
        return $query->result_array();
    }

    // BPD DIY
    public function get_all_data_bpd()
    {
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get('bpd_forms');
        return $query->result_array();
    }
    public function get_filtered_data_bpd($start_date, $end_date)
    {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get('bpd_forms');
        return $query->result_array();
    }
}
