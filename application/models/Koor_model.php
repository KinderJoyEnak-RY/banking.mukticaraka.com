<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koor_model extends CI_Model
{

    public function get_total_data_by_koor($koorCode, $tableName)
    {
        $this->db->select('COUNT(*) as total');
        $this->db->from($tableName);
        $this->db->join('users as dsr', $tableName . '.dsr_code = dsr.code');
        $this->db->join('users as spv', 'dsr.parent_code = spv.code');
        $this->db->where('spv.parent_code', $koorCode);
        $query = $this->db->get();
        return $query->row()->total;
    }

    public function get_total_data($table_name)
    {
        return $this->db->count_all($table_name);
    }

    public function get_data_by_dsr_code($table_name, $dsrCode)
    {
        $this->db->where('dsr_code', $dsrCode);
        $query = $this->db->get($table_name);
        return $query->result_array();
    }

    // CIMB
    public function get_all_data_cimb()
    {
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

    // TMRW by UOB
    public function get_all_data_uob()
    {
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

    // BPD DIY
    public function get_all_data_bpd()
    {
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get('bpd_forms');
        return $query->result_array();
    }

    // MANDIRI
    public function get_all_data_mandiri()
    {
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get('mandiri_forms');
        return $query->result_array();
    }

    // BJJ DIGITAL
    public function get_all_data_bjj()
    {
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get('bjj_forms');
        return $query->result_array();
    }
}
