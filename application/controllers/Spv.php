<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spv extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->model('Spv_model');

        if (!$this->session->userdata('code')) {
            redirect('user');
        }

        if ($this->session->userdata('level') != 'SPV') {
            $this->session->set_flashdata('error', 'You must be an spv to view this page');
            redirect('user');
        }
    }

    public function dashboard()
    {
        $this->load->view('spv/dashboard');
    }

    public function hierarchy()
    {
        $spv_code = $this->session->userdata('code');
        $data['subordinates'] = $this->User_model->get_hierarchy_by_spv($spv_code);

        // Load Dsr_model
        $this->load->model('Dsr_model');

        foreach ($data['subordinates'] as &$spv) {
            foreach ($spv['dsrs'] as &$dsr) {
                // Mendapatkan total data yang telah diinput oleh DSR dari setiap tabel
                $dsr['total_data_cimb'] = $this->Dsr_model->count_data_by_code($dsr['code'], 'cimb_forms');
                $dsr['total_data_uob'] = $this->Dsr_model->count_data_by_code($dsr['code'], 'uob_forms');
                $dsr['total_data_line'] = $this->Dsr_model->count_data_by_code($dsr['code'], 'line_forms');
                $dsr['total_data_bsi'] = $this->Dsr_model->count_data_by_code($dsr['code'], 'bsi_forms');
                $dsr['total_data_bpd'] = $this->Dsr_model->count_data_by_code($dsr['code'], 'bpd_forms');
            }
        }

        $this->load->view('spv/hierarchy', $data);
    }

    public function fetchDetails()
    {
        $dsrCode = $this->input->post('dsrCode');
        $type = $this->input->post('type');

        // Load model yang sesuai berdasarkan tipe bank
        $data = [];
        switch ($type) {
            case 'cimb':
                $data = $this->Spv_model->get_data_by_dsr_code('cimb_forms', $dsrCode);
                break;
            case 'bsi':
                $data = $this->Spv_model->get_data_by_dsr_code('bsi_forms', $dsrCode);
                break;
            case 'bpd':
                $data = $this->Spv_model->get_data_by_dsr_code('bpd_forms', $dsrCode);
                break;
            case 'uob':
                $data = $this->Spv_model->get_data_by_dsr_code('uob_forms', $dsrCode);
                break;
            case 'line':
                $data = $this->Spv_model->get_data_by_dsr_code('line_forms', $dsrCode);
                break;
        }

        // Pastikan data sudah diurutkan berdasarkan tanggal
        usort($data, function ($a, $b) {
            return strtotime($b['tanggal']) - strtotime($a['tanggal']);
        });

        // Load view untuk menampilkan data dalam modal
        $this->load->view('spv/details_modal_content', ['data' => $data]);
    }
}
