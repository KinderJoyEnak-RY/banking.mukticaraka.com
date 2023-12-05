<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->model('Admin_model');

        if (!$this->session->userdata('code')) {
            redirect('user');
        }

        if ($this->session->userdata('level') != 'admin') {
            $this->session->set_flashdata('error', 'You must be an admin to view this page');
            redirect('user');
        }
    }

    public function dashboard()
    {
        // Create an associative array to hold data for each bank
        $data['bankData'] = [
            'CIMB' => ['total' => $this->Admin_model->get_total_data('cimb_forms')],
            'BPD' => ['total' => $this->Admin_model->get_total_data('bpd_forms')],
            'LINE' => ['total' => $this->Admin_model->get_total_data('line_forms')],
            'UOB' => ['total' => $this->Admin_model->get_total_data('uob_forms')],
            'BSI' => ['total' => $this->Admin_model->get_total_data('bsi_forms')],
            'MANDIRI' => ['total' => $this->Admin_model->get_total_data('mandiri_forms')],
            'BJJ' => ['total' => $this->Admin_model->get_total_data('bjj_forms')]
            // Add other banks similarly
        ];

        $this->load->view('admin/dashboard', $data);
    }

    public function users()
    {
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('admin/users', $data);
    }
    public function view_hierarchy()
    {
        $hierarchy = $this->User_model->get_hierarchy();
        $data['hierarchy_json'] = $this->display_hierarchy($hierarchy);
        $this->load->view('admin/hierarchy', $data);
    }
    function display_hierarchy($hierarchy)
    {
        $orgChartData = [];
        foreach ($hierarchy as $user) {
            $orgChartData[] = [
                'id' => $user['code'],
                'pid' => $user['parent_code'] ?: null,
                'name' => $user['name'],
                'code' => $user['code'],
                'dob' => $user['dob'],
                'level' => $user['level']
            ];
        }
        return json_encode($orgChartData);
    }
    public function get_users_by_level($level)
    {
        $users = $this->User_model->get_users_by_level($level);
        echo json_encode($users);
    }
    public function add_user()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('code', 'Code', 'required|is_unique[users.code]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() === FALSE) {
            if (form_error('code')) {
                $this->session->set_flashdata('error', 'User dengan kode tersebut sudah ada');
            }
            $this->load->view('admin/add_user');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'code' => $this->input->post('code'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'level' => $this->input->post('level'),
                'dob' => $this->input->post('dob'),
                'referral' => $this->input->post('referral'),
                'parent_code' => $this->input->post('parent_code')
            );

            $this->User_model->add_user($data);
            $this->session->set_flashdata('success', 'User berhasil dibuat');
            redirect('admin/users');
        }
    }
    public function edit_user($code)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['user'] = $this->User_model->get_user_by_code($code);

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('code', 'Code', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/edit_user', $data);
        } else {
            $update_data = array(
                'name' => $this->input->post('name'),
                'code' => $this->input->post('code'),
                'level' => $this->input->post('level'),
                'dob' => $this->input->post('dob'),
                'referral' => $this->input->post('referral'),
                'parent_code' => $this->input->post('parent_code')
            );

            // Hanya update password jika field password diisi
            if ($this->input->post('password')) {
                $update_data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            $this->User_model->update_user($code, $update_data);
            $this->session->set_flashdata('success', 'User berhasil diperbarui');
            redirect('admin/users');
        }
    }
    public function delete_user($code)
    {
        $this->User_model->delete_user($code);
        redirect('admin/users');
    }

    // CIMB
    public function cimb()
    {
        $data['cimb_forms'] = $this->Admin_model->get_all_data_cimb();
        $this->load->view('admin/cimb', $data);
    }
    public function cimb_filtered()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $data['cimb_forms'] = $this->Admin_model->get_filtered_data_cimb($start_date, $end_date);
        $this->load->view('admin/cimb', $data);
    }
    public function export_cimb()
    {
        $data = $this->Admin_model->get_all_data_cimb();
        // $this->load->library('spreadsheet');

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header tabel
        $headers = ["No", "Tanggal", "Mitra Code", "Nama DSR", "Souvenir", "Nama Nasabah", "No Rek Nasabah", "Nama Toko", "No Merchant ID", "Kabupaten/Kota", "Beranda OCTO",  "Foto Toko", "SPV", "KOOR", "ASM"];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Isi data ke tabel
        $row = 2;
        foreach ($data as $datum) {
            $sheet->setCellValue('A' . $row, $row - 1);
            $sheet->setCellValue('B' . $row, $datum['tanggal']);
            $sheet->setCellValue('C' . $row, $datum['dsr_code']);
            $sheet->setCellValue('D' . $row, $datum['dsr_name']);
            $sheet->setCellValue('E' . $row, $datum['jenis_skema']);
            $sheet->setCellValue('F' . $row, $datum['nama_nasabah']);
            $sheet->setCellValue('G' . $row, $datum['no_rek_nasabah']);
            $sheet->setCellValue('H' . $row, $datum['nama_toko_merchant']);
            $sheet->setCellValue('I' . $row, $datum['no_mid']);
            $alamat = $datum['kabupaten'];
            $sheet->setCellValue('J' . $row, $alamat);
            $imageUrl = base_url('uploads/' . $datum['dashboard_octo_merchant']);
            $sheet->setCellValue('K' . $row, $imageUrl);
            $sheet->getCell('K' . $row)->getHyperlink()->setUrl($imageUrl);
            $imageUrl = base_url('uploads/' . $datum['foto_toko']);
            $sheet->setCellValue('L' . $row, $imageUrl);
            $sheet->getCell('L' . $row)->getHyperlink()->setUrl($imageUrl);
            $sheet->setCellValue('M' . $row, $datum['spv']);
            $sheet->setCellValue('N' . $row, $datum['koor']);
            $sheet->setCellValue('O' . $row, $datum['asm']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'data_cimb_export_All' . '.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function export_cimb_filtered()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        if (empty($start_date) || empty($end_date)) {
            // Handle error, misalnya dengan mengatur flashdata dan redirect ke halaman sebelumnya
            $this->session->set_flashdata('error', 'Tanggal awal dan akhir harus diisi.');
            redirect('admin/cimb');
            return;
        }

        $data = $this->Admin_model->get_filtered_data_cimb($start_date, $end_date);

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header tabel
        $headers = ["No", "Tanggal", "Mitra Code", "Nama DSR", "Souvenir", "Nama Nasabah", "No Rek Nasabah", "Nama Toko", "No Merchant ID", "Alamat Toko", "Beranda OCTO",  "Foto Toko", "SPV", "KOOR", "ASM"];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Isi data ke tabel
        $row = 2;
        foreach ($data as $datum) {
            $sheet->setCellValue('A' . $row, $row - 1);
            $sheet->setCellValue('B' . $row, $datum['tanggal']);
            $sheet->setCellValue('C' . $row, $datum['dsr_code']);
            $sheet->setCellValue('D' . $row, $datum['dsr_name']);
            $sheet->setCellValue('E' . $row, $datum['jenis_skema']);
            $sheet->setCellValue('F' . $row, $datum['nama_nasabah']);
            $sheet->setCellValue('G' . $row, $datum['no_rek_nasabah']);
            $sheet->setCellValue('H' . $row, $datum['nama_toko_merchant']);
            $sheet->setCellValue('I' . $row, $datum['no_mid']);
            $alamat = $datum['kabupaten'];
            $sheet->setCellValue('J' . $row, $alamat);
            $imageUrl = base_url('uploads/' . $datum['dashboard_octo_merchant']);
            $sheet->setCellValue('K' . $row, $imageUrl);
            $sheet->getCell('K' . $row)->getHyperlink()->setUrl($imageUrl);
            $imageUrl = base_url('uploads/' . $datum['foto_toko']);
            $sheet->setCellValue('L' . $row, $imageUrl);
            $sheet->getCell('L' . $row)->getHyperlink()->setUrl($imageUrl);
            $sheet->setCellValue('M' . $row, $datum['spv']);
            $sheet->setCellValue('N' . $row, $datum['koor']);
            $sheet->setCellValue('O' . $row, $datum['asm']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'data_cimb_filtered_export' . '.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    // BSI Syariah
    public function bsi()
    {
        $data['bsi_forms'] = $this->Admin_model->get_all_data_bsi();
        $this->load->view('admin/bsi', $data);
    }
    public function bsi_filtered()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $data['bsi_forms'] = $this->Admin_model->get_filtered_data_bsi($start_date, $end_date);
        $this->load->view('admin/bsi', $data);
    }
    public function export_bsi()
    {
        $data = $this->Admin_model->get_all_data_bsi();
        // $this->load->library('spreadsheet');

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header tabel
        $headers = ["No", "Tanggal", "Mitra Code", "Nama DSR", "Nama Nasabah", "No Tlp Nasabah", "No Rek Nasabah", "Kota Akuisisi", "SS Info Rekening", "SS Dashboard", "Foto KTP Nasabah", "SPV", "KOOR", "ASM"];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Isi data ke tabel
        $row = 2;
        foreach ($data as $datum) {
            $sheet->setCellValue('A' . $row, $row - 1);
            $sheet->setCellValue('B' . $row, $datum['tanggal']);
            $sheet->setCellValue('C' . $row, $datum['dsr_code']);
            $sheet->setCellValue('D' . $row, $datum['dsr_name']);
            $sheet->setCellValue('E' . $row, $datum['nama_nasabah']);
            $sheet->setCellValue('F' . $row, $datum['no_hp_nasabah']);
            $sheet->setCellValue('G' . $row, $datum['no_rek_bsi_syariah_nasabah']);
            $kota = $datum['kabupaten'] . ", " .
                $datum['provinsi'];
            $sheet->setCellValue('H' . $row, $kota);
            $imageUrl = base_url('uploads/' . $datum['ss_info_rekening']);
            $sheet->setCellValue('I' . $row, $imageUrl);
            $sheet->getCell('I' . $row)->getHyperlink()->setUrl($imageUrl);
            $imageUrl = base_url('uploads/' . $datum['ss_dashboard']);
            $sheet->setCellValue('J' . $row, $imageUrl);
            $sheet->getCell('J' . $row)->getHyperlink()->setUrl($imageUrl);
            $imageUrl = base_url('uploads/' . $datum['foto_ktp_nasabah']);
            $sheet->setCellValue('K' . $row, $imageUrl);
            $sheet->getCell('K' . $row)->getHyperlink()->setUrl($imageUrl);
            $sheet->setCellValue('L' . $row, $datum['spv']);
            $sheet->setCellValue('M' . $row, $datum['koor']);
            $sheet->setCellValue('N' . $row, $datum['asm']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'data_bsi_export_All' . '.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function export_bsi_filtered()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        if (empty($start_date) || empty($end_date)) {
            // Handle error, misalnya dengan mengatur flashdata dan redirect ke halaman sebelumnya
            $this->session->set_flashdata('error', 'Tanggal awal dan akhir harus diisi.');
            redirect('admin/bsi');
            return;
        }

        $data = $this->Admin_model->get_filtered_data_bsi($start_date, $end_date);

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header tabel
        $headers = ["No", "Tanggal", "Mitra Code", "Nama DSR", "Nama Nasabah", "No Tlp Nasabah", "No Rek Nasabah", "Kota Akuisisi", "SS Info Rekening", "SS Dashboard", "Foto KTP Nasabah", "SPV", "KOOR", "ASM"];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Isi data ke tabel
        $row = 2;
        foreach ($data as $datum) {
            $sheet->setCellValue('A' . $row, $row - 1);
            $sheet->setCellValue('B' . $row, $datum['tanggal']);
            $sheet->setCellValue('C' . $row, $datum['dsr_code']);
            $sheet->setCellValue('D' . $row, $datum['dsr_name']);
            $sheet->setCellValue('E' . $row, $datum['nama_nasabah']);
            $sheet->setCellValue('F' . $row, $datum['no_hp_nasabah']);
            $sheet->setCellValue('G' . $row, $datum['no_rek_bsi_syariah_nasabah']);
            $kota = $datum['kabupaten'] . ", " .
                $datum['provinsi'];
            $sheet->setCellValue('H' . $row, $kota);
            $imageUrl = base_url('uploads/' . $datum['ss_info_rekening']);
            $sheet->setCellValue('I' . $row, $imageUrl);
            $sheet->getCell('I' . $row)->getHyperlink()->setUrl($imageUrl);
            $imageUrl = base_url('uploads/' . $datum['ss_dashboard']);
            $sheet->setCellValue('J' . $row, $imageUrl);
            $sheet->getCell('J' . $row)->getHyperlink()->setUrl($imageUrl);
            $imageUrl = base_url('uploads/' . $datum['foto_ktp_nasabah']);
            $sheet->setCellValue('K' . $row, $imageUrl);
            $sheet->getCell('K' . $row)->getHyperlink()->setUrl($imageUrl);
            $sheet->setCellValue('L' . $row, $datum['spv']);
            $sheet->setCellValue('M' . $row, $datum['koor']);
            $sheet->setCellValue('N' . $row, $datum['asm']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'data_bsi_filtered_export' . '.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    // TMRW By UOB
    public function uob()
    {
        $data['uob_forms'] = $this->Admin_model->get_all_data_uob();
        $this->load->view('admin/uob', $data);
    }
    public function uob_filtered()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $data['uob_forms'] = $this->Admin_model->get_filtered_data_uob($start_date, $end_date);
        $this->load->view('admin/uob', $data);
    }
    public function export_uob()
    {
        $data = $this->Admin_model->get_all_data_uob();
        // $this->load->library('spreadsheet');

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header tabel
        $headers = ["No", "Tanggal", "Mitra Code", "Nama DSR", "Souvenir", "Nama Nasabah", "No HP Nasabah", "No Rek Nasabah",   "Kota Akuisisi", "Foto KTP Nasabah", "SPV", "KOOR", "ASM"];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Isi data ke tabel
        $row = 2;
        foreach ($data as $datum) {
            $sheet->setCellValue('A' . $row, $row - 1);
            $sheet->setCellValue('B' . $row, $datum['tanggal']);
            $sheet->setCellValue('C' . $row, $datum['dsr_code']);
            $sheet->setCellValue('D' . $row, $datum['dsr_name']);
            $sheet->setCellValue('E' . $row, $datum['jenis_skema']);
            $sheet->setCellValue('F' . $row, $datum['nama_nasabah']);
            $sheet->setCellValue('G' . $row, $datum['no_hp_nasabah']);
            $sheet->setCellValue('H' . $row, $datum['no_rek_nasabah']);
            $kota = $datum['kabupaten'];
            $sheet->setCellValue('I' . $row, $kota);
            $imageUrl = base_url('uploads/' . $datum['foto_ktp_nasabah']);
            $sheet->setCellValue('J' . $row, $imageUrl);
            $sheet->getCell('J' . $row)->getHyperlink()->setUrl($imageUrl);
            $sheet->setCellValue('K' . $row, $datum['spv']);
            $sheet->setCellValue('L' . $row, $datum['koor']);
            $sheet->setCellValue('M' . $row, $datum['asm']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'data_uob_export_All' . '.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function export_uob_filtered()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        if (empty($start_date) || empty($end_date)) {
            // Handle error, misalnya dengan mengatur flashdata dan redirect ke halaman sebelumnya
            $this->session->set_flashdata('error', 'Tanggal awal dan akhir harus diisi.');
            redirect('admin/uob');
            return;
        }

        $data = $this->Admin_model->get_filtered_data_uob($start_date, $end_date);

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header tabel
        $headers = ["No", "Tanggal", "Mitra Code", "Nama DSR", "Souvenir", "Nama Nasabah", "No HP Nasabah", "No Rek Nasabah",   "Kota Akuisisi", "Foto KTP Nasabah", "SPV", "KOOR", "ASM"];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Isi data ke tabel
        $row = 2;
        foreach ($data as $datum) {
            $sheet->setCellValue('A' . $row, $row - 1);
            $sheet->setCellValue('B' . $row, $datum['tanggal']);
            $sheet->setCellValue('C' . $row, $datum['dsr_code']);
            $sheet->setCellValue('D' . $row, $datum['dsr_name']);
            $sheet->setCellValue('E' . $row, $datum['jenis_skema']);
            $sheet->setCellValue('F' . $row, $datum['nama_nasabah']);
            $sheet->setCellValue('G' . $row, $datum['no_hp_nasabah']);
            $sheet->setCellValue('H' . $row, $datum['no_rek_nasabah']);
            $kota = $datum['kabupaten'];
            $sheet->setCellValue('I' . $row, $kota);
            $imageUrl = base_url('uploads/' . $datum['foto_ktp_nasabah']);
            $sheet->setCellValue('J' . $row, $imageUrl);
            $sheet->getCell('J' . $row)->getHyperlink()->setUrl($imageUrl);
            $sheet->setCellValue('K' . $row, $datum['spv']);
            $sheet->setCellValue('L' . $row, $datum['koor']);
            $sheet->setCellValue('M' . $row, $datum['asm']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'data_uob_filtered_export' . '.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    // LINE BANK
    public function line()
    {
        $data['line_forms'] = $this->Admin_model->get_all_data_line();
        $this->load->view('admin/line', $data);
    }
    public function line_filtered()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $data['line_forms'] = $this->Admin_model->get_filtered_data_line($start_date, $end_date);
        $this->load->view('admin/line', $data);
    }
    public function export_line()
    {
        $data = $this->Admin_model->get_all_data_line();
        // $this->load->library('spreadsheet');

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header tabel
        $headers = ["No", "Tanggal", "Mitra Code", "Nama DSR", "Souvenir", "Nama Nasabah", "No HP Nasabah", "No Rek Nasabah", "Kota Akuisisi", "SS Dashboard", "Foto KTP Nasabah", "SPV", "KOOR", "ASM"];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Isi data ke tabel
        $row = 2;
        foreach ($data as $datum) {
            $sheet->setCellValue('A' . $row, $row - 1);
            $sheet->setCellValue('B' . $row, $datum['tanggal']);
            $sheet->setCellValue('C' . $row, $datum['dsr_code']);
            $sheet->setCellValue('D' . $row, $datum['dsr_name']);
            $sheet->setCellValue('E' . $row, $datum['jenis_skema']);
            $sheet->setCellValue('F' . $row, $datum['nama_nasabah']);
            $sheet->setCellValue('G' . $row, $datum['no_hp_nasabah']);
            $sheet->setCellValue('H' . $row, $datum['no_rek_line_nasabah']);
            $kabupaten = $datum['kabupaten'];
            $provinsi = $datum['provinsi'];

            // Menggabungkan kabupaten dan provinsi dengan pemisah koma
            $kabupatenDanProvinsi = $kabupaten . ', ' . $provinsi;

            // Menetapkan gabungan kabupaten dan provinsi ke kolom H
            $sheet->setCellValue('I' . $row, $kabupatenDanProvinsi);
            $imageUrl = base_url('uploads/' . $datum['ss_detail_dashboard']);
            $sheet->setCellValue('J' . $row, $imageUrl);
            $sheet->getCell('J' . $row)->getHyperlink()->setUrl($imageUrl);
            $imageUrl = base_url('uploads/' . $datum['foto_ktp_nasabah']);
            $sheet->setCellValue('K' . $row, $imageUrl);
            $sheet->getCell('K' . $row)->getHyperlink()->setUrl($imageUrl);
            $sheet->setCellValue('L' . $row, $datum['spv']);
            $sheet->setCellValue('M' . $row, $datum['koor']);
            $sheet->setCellValue('N' . $row, $datum['asm']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'data_line_export_All' . '.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function export_line_filtered()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        if (empty($start_date) || empty($end_date)) {
            // Handle error, misalnya dengan mengatur flashdata dan redirect ke halaman sebelumnya
            $this->session->set_flashdata('error', 'Tanggal awal dan akhir harus diisi.');
            redirect('admin/line');
            return;
        }

        $data = $this->Admin_model->get_filtered_data_line($start_date, $end_date);

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header tabel
        $headers = ["No", "Tanggal", "Mitra Code", "Nama DSR", "Souvenir", "Nama Nasabah", "No HP Nasabah", "No Rek Nasabah", "Kota Akuisisi", "SS Dashboard", "Foto KTP Nasabah", "SPV", "KOOR", "ASM"];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Isi data ke tabel
        $row = 2;
        foreach ($data as $datum) {
            $sheet->setCellValue('A' . $row, $row - 1);
            $sheet->setCellValue('B' . $row, $datum['tanggal']);
            $sheet->setCellValue('C' . $row, $datum['dsr_code']);
            $sheet->setCellValue('D' . $row, $datum['dsr_name']);
            $sheet->setCellValue('E' . $row, $datum['jenis_skema']);
            $sheet->setCellValue('F' . $row, $datum['nama_nasabah']);
            $sheet->setCellValue('G' . $row, $datum['no_hp_nasabah']);
            $sheet->setCellValue('H' . $row, $datum['no_rek_line_nasabah']);
            $kabupaten = $datum['kabupaten'];
            $provinsi = $datum['provinsi'];

            // Menggabungkan kabupaten dan provinsi dengan pemisah koma
            $kabupatenDanProvinsi = $kabupaten . ', ' . $provinsi;

            // Menetapkan gabungan kabupaten dan provinsi ke kolom H
            $sheet->setCellValue('I' . $row, $kabupatenDanProvinsi);
            $imageUrl = base_url('uploads/' . $datum['ss_detail_dashboard']);
            $sheet->setCellValue('J' . $row, $imageUrl);
            $sheet->getCell('J' . $row)->getHyperlink()->setUrl($imageUrl);
            $imageUrl = base_url('uploads/' . $datum['foto_ktp_nasabah']);
            $sheet->setCellValue('K' . $row, $imageUrl);
            $sheet->getCell('K' . $row)->getHyperlink()->setUrl($imageUrl);
            $sheet->setCellValue('L' . $row, $datum['spv']);
            $sheet->setCellValue('M' . $row, $datum['koor']);
            $sheet->setCellValue('N' . $row, $datum['asm']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'data_line_filtered_export' . '.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    // BPD DIY
    public function bpd()
    {
        $data['bpd_forms'] = $this->Admin_model->get_all_data_bpd();
        $this->load->view('admin/bpd', $data);
    }
    public function bpd_filtered()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $data['bpd_forms'] = $this->Admin_model->get_filtered_data_bpd($start_date, $end_date);
        $this->load->view('admin/bpd', $data);
    }
    public function export_bpd()
    {
        $data = $this->Admin_model->get_all_data_bpd();
        // $this->load->library('spreadsheet');

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header tabel
        $headers = ["No", "Tanggal", "Mitra Code", "Nama DSR", "Nama Nasabah", "No HP Nasabah", "Email Nasabah", "NIK Nasabah", "Nama Toko", "Alamat Toko", "Foto KTP Nasabah", "Foto Toko", "SPV", "KOOR", "ASM"];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Isi data ke tabel
        $row = 2;
        foreach ($data as $datum) {
            $sheet->setCellValue('A' . $row, $row - 1);
            $sheet->setCellValue('B' . $row, $datum['tanggal']);
            $sheet->setCellValue('C' . $row, $datum['dsr_code']);
            $sheet->setCellValue('D' . $row, $datum['dsr_name']);
            $sheet->setCellValue('E' . $row, $datum['nama_nasabah']);
            $sheet->setCellValue('F' . $row, $datum['no_hp_nasabah']);
            $sheet->setCellValue('G' . $row, $datum['email_nasabah']);
            $sheet->setCellValue('H' . $row, $datum['nik_nasabah']);
            $sheet->setCellValue('I' . $row, $datum['nama_merchant']);
            $alamat = $datum['alamat_merchant'] . ", " .
                $datum['kecamatan'] . ", " .
                $datum['kabupaten'] . ", " .
                $datum['provinsi'];
            $sheet->setCellValue('J' . $row, $alamat);
            $sheet->setCellValue('K' . $row, $datum['email_nasabah']);
            $imageUrl = base_url('uploads/' . $datum['foto_ktp_nasabah']);
            $sheet->setCellValue('L' . $row, $imageUrl);
            $sheet->getCell('L' . $row)->getHyperlink()->setUrl($imageUrl);
            $imageUrl = base_url('uploads/' . $datum['foto_toko']);
            $sheet->setCellValue('M' . $row, $imageUrl);
            $sheet->getCell('M' . $row)->getHyperlink()->setUrl($imageUrl);
            $sheet->setCellValue('N' . $row, $datum['spv']);
            $sheet->setCellValue('O' . $row, $datum['koor']);
            $sheet->setCellValue('P' . $row, $datum['asm']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'data_bpd_export_All' . '.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function export_bpd_filtered()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        if (empty($start_date) || empty($end_date)) {
            // Handle error, misalnya dengan mengatur flashdata dan redirect ke halaman sebelumnya
            $this->session->set_flashdata('error', 'Tanggal awal dan akhir harus diisi.');
            redirect('admin/bpd');
            return;
        }

        $data = $this->Admin_model->get_filtered_data_bpd($start_date, $end_date);

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header tabel
        $headers = ["No", "Tanggal", "Mitra Code", "Nama DSR", "Nama Nasabah", "No HP Nasabah", "Email Nasabah", "NIK Nasabah", "Nama Toko", "Alamat Toko", "Foto KTP Nasabah", "Foto Toko", "SPV", "KOOR", "ASM"];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Isi data ke tabel
        $row = 2;
        foreach ($data as $datum) {
            $sheet->setCellValue('A' . $row, $row - 1);
            $sheet->setCellValue('B' . $row, $datum['tanggal']);
            $sheet->setCellValue('C' . $row, $datum['dsr_code']);
            $sheet->setCellValue('D' . $row, $datum['dsr_name']);
            $sheet->setCellValue('E' . $row, $datum['nama_nasabah']);
            $sheet->setCellValue('F' . $row, $datum['no_hp_nasabah']);
            $sheet->setCellValue('G' . $row, $datum['email_nasabah']);
            $sheet->setCellValue('H' . $row, $datum['nik_nasabah']);
            $sheet->setCellValue('I' . $row, $datum['nama_merchant']);
            $alamat = $datum['alamat_merchant'] . ", " .
                $datum['kecamatan'] . ", " .
                $datum['kabupaten'] . ", " .
                $datum['provinsi'];
            $sheet->setCellValue('J' . $row, $alamat);
            $sheet->setCellValue('K' . $row, $datum['email_nasabah']);
            $imageUrl = base_url('uploads/' . $datum['foto_ktp_nasabah']);
            $sheet->setCellValue('L' . $row, $imageUrl);
            $sheet->getCell('L' . $row)->getHyperlink()->setUrl($imageUrl);
            $imageUrl = base_url('uploads/' . $datum['foto_toko']);
            $sheet->setCellValue('M' . $row, $imageUrl);
            $sheet->getCell('M' . $row)->getHyperlink()->setUrl($imageUrl);
            $sheet->setCellValue('N' . $row, $datum['spv']);
            $sheet->setCellValue('O' . $row, $datum['koor']);
            $sheet->setCellValue('P' . $row, $datum['asm']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'data_bpd_filtered_export' . '.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    // MANDIRI
    public function mandiri()
    {
        $data['mandiri_forms'] = $this->Admin_model->get_all_data_mandiri();
        $this->load->view('admin/mandiri', $data);
    }
    public function mandiri_filtered()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $data['mandiri_forms'] = $this->Admin_model->get_filtered_data_mandiri($start_date, $end_date);
        $this->load->view('admin/mandiri', $data);
    }
    public function export_mandiri()
    {
        $data = $this->Admin_model->get_all_data_mandiri();
        // $this->load->library('spreadsheet');

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header tabel
        $headers = ["No", "Tanggal", "Mitra Code", "Nama DSR", "ID Referral", "Nama Nasabah", "No HP Nasabah", "No Rek Nasabah", "Area Akuisisi", "SS Akun Berhasil Dibuat", "SS AKun Nasabah", "SPV", "KOOR", "ASM"];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Isi data ke tabel
        $row = 2;
        foreach ($data as $datum) {
            $sheet->setCellValue('A' . $row, $row - 1);
            $sheet->setCellValue('B' . $row, $datum['tanggal']);
            $sheet->setCellValue('C' . $row, $datum['dsr_code']);
            $sheet->setCellValue('D' . $row, $datum['dsr_name']);
            $sheet->setCellValue('E' . $row, $datum['id_referral']);
            $sheet->setCellValue('F' . $row, $datum['nama_nasabah']);
            $sheet->setCellValue('G' . $row, $datum['no_hp_nasabah']);
            $sheet->setCellValue('H' . $row, $datum['no_rek_nasabah']);
            $sheet->setCellValue('I' . $row, $datum['area_akuisisi']);
            $imageUrl = base_url('uploads/' . $datum['ss_akun_dibuat']);
            $sheet->setCellValue('J' . $row, $imageUrl);
            $sheet->getCell('J' . $row)->getHyperlink()->setUrl($imageUrl);
            $imageUrl = base_url('uploads/' . $datum['ss_akun']);
            $sheet->setCellValue('K' . $row, $imageUrl);
            $sheet->getCell('K' . $row)->getHyperlink()->setUrl($imageUrl);
            $sheet->setCellValue('L' . $row, $datum['spv']);
            $sheet->setCellValue('M' . $row, $datum['koor']);
            $sheet->setCellValue('N' . $row, $datum['asm']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'data_mandiri_export_All' . '.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function export_mandiri_filtered()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        if (empty($start_date) || empty($end_date)) {
            // Handle error, misalnya dengan mengatur flashdata dan redirect ke halaman sebelumnya
            $this->session->set_flashdata('error', 'Tanggal awal dan akhir harus diisi.');
            redirect('admin/mandiri');
            return;
        }

        $data = $this->Admin_model->get_filtered_data_mandiri($start_date, $end_date);

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header tabel
        $headers = ["No", "Tanggal", "Mitra Code", "Nama DSR", "ID Referral", "Nama Nasabah", "No HP Nasabah", "No Rek Nasabah", "Area Akuisisi", "SS Akun Berhasil Dibuat", "SS AKun Nasabah", "SPV", "KOOR", "ASM"];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Isi data ke tabel
        $row = 2;
        foreach ($data as $datum) {
            $sheet->setCellValue('A' . $row, $row - 1);
            $sheet->setCellValue('B' . $row, $datum['tanggal']);
            $sheet->setCellValue('C' . $row, $datum['dsr_code']);
            $sheet->setCellValue('D' . $row, $datum['dsr_name']);
            $sheet->setCellValue('E' . $row, $datum['id_referral']);
            $sheet->setCellValue('F' . $row, $datum['nama_nasabah']);
            $sheet->setCellValue('G' . $row, $datum['no_hp_nasabah']);
            $sheet->setCellValue('H' . $row, $datum['no_rek_nasabah']);
            $sheet->setCellValue('I' . $row, $datum['area_akuisisi']);
            $imageUrl = base_url('uploads/' . $datum['ss_akun_dibuat']);
            $sheet->setCellValue('J' . $row, $imageUrl);
            $sheet->getCell('J' . $row)->getHyperlink()->setUrl($imageUrl);
            $imageUrl = base_url('uploads/' . $datum['ss_akun']);
            $sheet->setCellValue('K' . $row, $imageUrl);
            $sheet->getCell('K' . $row)->getHyperlink()->setUrl($imageUrl);
            $sheet->setCellValue('L' . $row, $datum['spv']);
            $sheet->setCellValue('M' . $row, $datum['koor']);
            $sheet->setCellValue('N' . $row, $datum['asm']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'data_mandiri_filtered_export' . '.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    // BJJ DIGITAL
    public function bjj()
    {
        $data['bjj_forms'] = $this->Admin_model->get_all_data_bjj();
        $this->load->view('admin/bjj', $data);
    }
    public function bjj_filtered()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $data['bjj_forms'] = $this->Admin_model->get_filtered_data_bjj($start_date, $end_date);
        $this->load->view('admin/bjj', $data);
    }
    public function export_bjj()
    {
        $data = $this->Admin_model->get_all_data_bjj();
        // $this->load->library('spreadsheet');

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header tabel
        $headers = ["No", "Tanggal", "Mitra Code", "Nama DSR", "Nama Nasabah", "No HP Nasabah", "No Rek Nasabah", "Jenis Tabungan", "Jenis Setoran", "Nominal Setoran", "SS Dashboard", "SS Saku Utama", "SPV", "KOOR", "ASM"];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Isi data ke tabel
        $row = 2;
        foreach ($data as $datum) {
            $sheet->setCellValue('A' . $row, $row - 1);
            $sheet->setCellValue('B' . $row, $datum['tanggal']);
            $sheet->setCellValue('C' . $row, $datum['dsr_code']);
            $sheet->setCellValue('D' . $row, $datum['dsr_name']);
            $sheet->setCellValue('E' . $row, $datum['nama_nasabah']);
            $sheet->setCellValue('F' . $row, $datum['no_hp_aktif_nasabah']);
            $sheet->setCellValue('G' . $row, $datum['no_rek_nasabah']);
            $sheet->setCellValue('H' . $row, $datum['jenis_tabungan']);
            $sheet->setCellValue('I' . $row, $datum['select_setoran']);
            $sheet->setCellValue('J' . $row, $datum['nominal_setoran']);
            $imageUrl = base_url('uploads/' . $datum['ss_dashboard']);
            $sheet->setCellValue('K' . $row, $imageUrl);
            $sheet->getCell('K' . $row)->getHyperlink()->setUrl($imageUrl);
            $imageUrl = base_url('uploads/' . $datum['ss_saku_utama']);
            $sheet->setCellValue('L' . $row, $imageUrl);
            $sheet->getCell('L' . $row)->getHyperlink()->setUrl($imageUrl);
            $sheet->setCellValue('M' . $row, $datum['spv']);
            $sheet->setCellValue('N' . $row, $datum['koor']);
            $sheet->setCellValue('O' . $row, $datum['asm']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'data_bjj_export_All' . '.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function export_bjj_filtered()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        if (empty($start_date) || empty($end_date)) {
            // Handle error, misalnya dengan mengatur flashdata dan redirect ke halaman sebelumnya
            $this->session->set_flashdata('error', 'Tanggal awal dan akhir harus diisi.');
            redirect('admin/bjj');
            return;
        }

        $data = $this->Admin_model->get_filtered_data_bjj($start_date, $end_date);

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header tabel
        $headers = ["No", "Tanggal", "Mitra Code", "Nama DSR", "Nama Nasabah", "No HP Nasabah", "No Rek Nasabah", "Jenis Tabungan", "Jenis Setoran", "Nominal Setoran", "SS Dashboard", "SS Saku Utama", "SPV", "KOOR", "ASM"];
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        // Isi data ke tabel
        $row = 2;
        foreach ($data as $datum) {
            $sheet->setCellValue('A' . $row, $row - 1);
            $sheet->setCellValue('B' . $row, $datum['tanggal']);
            $sheet->setCellValue('C' . $row, $datum['dsr_code']);
            $sheet->setCellValue('D' . $row, $datum['dsr_name']);
            $sheet->setCellValue('E' . $row, $datum['nama_nasabah']);
            $sheet->setCellValue('F' . $row, $datum['no_hp_aktif_nasabah']);
            $sheet->setCellValue('G' . $row, $datum['no_rek_nasabah']);
            $sheet->setCellValue('H' . $row, $datum['jenis_tabungan']);
            $sheet->setCellValue('I' . $row, $datum['select_setoran']);
            $sheet->setCellValue('J' . $row, $datum['nominal_setoran']);
            $imageUrl = base_url('uploads/' . $datum['ss_dashboard']);
            $sheet->setCellValue('K' . $row, $imageUrl);
            $sheet->getCell('K' . $row)->getHyperlink()->setUrl($imageUrl);
            $imageUrl = base_url('uploads/' . $datum['ss_saku_utama']);
            $sheet->setCellValue('L' . $row, $imageUrl);
            $sheet->getCell('L' . $row)->getHyperlink()->setUrl($imageUrl);
            $sheet->setCellValue('M' . $row, $datum['spv']);
            $sheet->setCellValue('N' . $row, $datum['koor']);
            $sheet->setCellValue('O' . $row, $datum['asm']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'data_bjj_filtered_export' . '.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
