<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->model('Asm_model');

        if (!$this->session->userdata('code')) {
            redirect('user');
        }

        if ($this->session->userdata('level') != 'ASM') {
            $this->session->set_flashdata('error', 'You must be an admin to view this page');
            redirect('user');
        }
    }

    public function dashboard()
    {
        $data['bankSummaries'] = $this->get_bank_summaries();
        $this->load->view('asm/dashboard', $data);
    }

    public function hierarchy()
    {
        $asm_code = $this->session->userdata('code');
        $data['subordinates'] = $this->User_model->get_subordinates_by_asm($asm_code);

        // Load Dsr_model
        $this->load->model('Dsr_model');

        foreach ($data['subordinates'] as &$bsh) {
            foreach ($bsh['asm']['koors'] as &$koor) {
                foreach ($koor['spvs'] as &$spv) {
                    // Gabungkan DSR dan SDM dalam satu array
                    $spv['sales'] = array_merge(
                        isset($spv['dsrs']) ? $spv['dsrs'] : [],
                        isset($spv['sdms']) ? $spv['sdms'] : [] // Pastikan Anda telah mengambil data SDM dan menambahkannya ke array dengan key 'sdms'
                    );
                    foreach ($spv['sales'] as &$salesperson) {
                        // Mendapatkan total data yang telah diinput oleh DSR/SDM dari setiap tabel
                        $salesperson['total_data_cimb'] = $this->Dsr_model->count_data_by_code($salesperson['code'], 'cimb_forms');
                        $salesperson['total_data_uob'] = $this->Dsr_model->count_data_by_code($salesperson['code'], 'uob_forms');
                        $salesperson['total_data_line'] = $this->Dsr_model->count_data_by_code($salesperson['code'], 'line_forms');
                        $salesperson['total_data_bsi'] = $this->Dsr_model->count_data_by_code($salesperson['code'], 'bsi_forms');
                        $salesperson['total_data_bpd'] = $this->Dsr_model->count_data_by_code($salesperson['code'], 'bpd_forms');
                        $salesperson['total_data_mandiri'] = $this->Dsr_model->count_data_by_code($salesperson['code'], 'mandiri_forms');
                        $salesperson['total_data_bjj'] = $this->Dsr_model->count_data_by_code($salesperson['code'], 'bjj_forms');
                    }
                }
            }
        }

        $this->load->view('asm/hierarchy', $data);
    }

    public function fetchDetails()
    {
        $dsrCode = $this->input->post('dsrCode');
        $type = $this->input->post('type');

        // Load model yang sesuai berdasarkan tipe bank
        $data = [];
        switch ($type) {
            case 'cimb':
                $data = $this->Asm_model->get_data_by_dsr_code('cimb_forms', $dsrCode);
                break;
            case 'bsi':
                $data = $this->Asm_model->get_data_by_dsr_code('bsi_forms', $dsrCode);
                break;
            case 'bpd':
                $data = $this->Asm_model->get_data_by_dsr_code('bpd_forms', $dsrCode);
                break;
            case 'uob':
                $data = $this->Asm_model->get_data_by_dsr_code('uob_forms', $dsrCode);
                break;
            case 'line':
                $data = $this->Asm_model->get_data_by_dsr_code('line_forms', $dsrCode);
                break;
            case 'mandiri':
                $data = $this->Asm_model->get_data_by_dsr_code('mandiri_forms', $dsrCode);
                break;
            case 'bjj':
                $data = $this->Asm_model->get_data_by_dsr_code('bjj_forms', $dsrCode);
                break;
        }

        // Pastikan data sudah diurutkan berdasarkan tanggal
        usort($data, function ($a, $b) {
            return strtotime($b['tanggal']) - strtotime($a['tanggal']);
        });

        // Load view untuk menampilkan data dalam modal
        $this->load->view('asm/details_modal_content', ['data' => $data]);
    }

    public function get_bank_summaries()
    {
        $summaries = [];
        $banks = ['cimb', 'bsi', 'uob', 'line', 'bpd', 'mandiri', 'bjj']; // Daftar bank

        foreach ($banks as $bank) {
            $table_name = $bank . '_forms';
            $summaries[$bank] = [
                'total' => $this->Asm_model->get_total_data($table_name),
                // Anda dapat menambahkan informasi lain yang relevan
            ];
        }

        return $summaries;
    }

    public function report()
    {
        $data['bankSummaries'] = $this->get_bank_summaries();
        // Muat semua data
        $data['all_data'] = $this->getAsmModelAllData();
        $this->load->view('asm/report', $data);
    }

    private function getAsmModelAllData()
    {
        // Implementasikan logika untuk mengambil semua data dari setiap bank
        $banks = ['cimb', 'bsi', 'uob', 'line', 'bpd', 'mandiri', 'bjj'];
        $all_data = [];
        foreach ($banks as $bank) {
            $all_data[$bank] = $this->Asm_model->get_all_data_cimb(); // Misalnya, untuk 'cimb' panggil get_all_data_cimb
            $all_data[$bank] = $this->Asm_model->get_all_data_bsi();
            $all_data[$bank] = $this->Asm_model->get_all_data_uob();
            $all_data[$bank] = $this->Asm_model->get_all_data_line();
            $all_data[$bank] = $this->Asm_model->get_all_data_bpd();
            $all_data[$bank] = $this->Asm_model->get_all_data_mandiri();
            $all_data[$bank] = $this->Asm_model->get_all_data_bjj();
        }
        return $all_data;
    }


    public function filter_report()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['filtered_data'] = $this->Asm_model->get_filtered_data($start_date, $end_date);

        $this->load->view('asm/report', $data);
    }
}
