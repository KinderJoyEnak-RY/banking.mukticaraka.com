<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dsr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dsr_model');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('User_model');

        if (!$this->session->userdata('code')) {
            redirect('user');
        }

        if ($this->session->userdata('level') != 'DSR') {
            $this->session->set_flashdata('error', 'You must be an DSR to view this page');
            redirect('user');
        }
    }

    public function dashboard()
    {
        $code = $this->session->userdata('code');
        $data['referral_code'] = $this->Dsr_model->get_referral_code($code);
        $data['total_cimb'] = $this->Dsr_model->count_data_by_code($code, 'cimb_forms');
        $data['total_bpd'] = $this->Dsr_model->count_data_by_code($code, 'bpd_forms');
        $data['total_line'] = $this->Dsr_model->count_data_by_code($code, 'line_forms');
        $data['total_uob'] = $this->Dsr_model->count_data_by_code($code, 'uob_forms');
        $data['total_bsi'] = $this->Dsr_model->count_data_by_code($code, 'bsi_forms');
        $this->load->view('dsr/dashboard', $data);
    }

    // CIMB
    public function cimb()
    {
        $code = $this->session->userdata('code');
        $data['cimb_forms'] = $this->Dsr_model->get_all_cimb_forms($code);
        $data['supervisors'] = $this->Dsr_model->get_supervisors($code);
        $this->load->view('dsr/cimb', $data);
    }
    public function tambah_cimb()
    {
        $code = $this->session->userdata('code');
        $data['supervisors'] = $this->Dsr_model->get_supervisors($code);
        $this->load->view('dsr/tambah_cimb', $data);  // Modifikasi baris ini untuk meneruskan $data ke tampilan
    }
    public function add_cimb()
    {
        $code = $this->session->userdata('code');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('jenis_skema', 'Jenis Skema', 'required|in_list[minyak,non_minyak]');
        $this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'required|trim');
        $this->form_validation->set_rules('no_rek_nasabah', 'No Rek Nasabah', 'required|trim|exact_length[12]|numeric');
        $this->form_validation->set_rules('nama_toko_merchant', 'Nama Toko', 'required|trim');
        $this->form_validation->set_rules('no_mid', 'No Merchant ID', 'required|trim');
        $this->form_validation->set_rules('alamat_toko', 'Alamat Toko', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('dsr/cimb');
        } else {

            // Ambil detail user
            $supervisors = $this->Dsr_model->get_supervisors($code);

            // Names of input field
            $files = ['dashboard_octo_merchant', 'foto_toko'];
            $fileNames = [];

            // Configure upload.
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 5000;
            $this->load->library('upload', $config);

            // Loop through each file
            foreach ($files as $file) {
                if (!$this->upload->do_upload($file)) {
                    // Handle error
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('dsr/cimb');
                } else {
                    // Save the file name
                    $uploadData = $this->upload->data();
                    $fileNames[$file] = $uploadData['file_name'];
                    // error_log('File Names: ' . print_r($fileNames, true));
                }
            }

            // Add CIMB data
            $result = $this->Dsr_model->add_cimb($code, $fileNames, $supervisors);
            if ($result['status'] == 'error') {
                $this->session->set_flashdata('error', $result['message']);
            } else {
                $this->session->set_flashdata('success', $result['message']);
            }
            redirect('dsr/cimb');
        }
    }
    public function delete_cimb($id)
    {
        $this->Dsr_model->delete_cimb($id);
        redirect('dsr/cimb');
    }

    // BSI Syariah
    public function bsi()
    {
        $code = $this->session->userdata('code');
        $data['bsi_forms'] = $this->Dsr_model->get_all_bsi_forms($code);
        $data['supervisors'] = $this->Dsr_model->get_supervisors($code);
        $this->load->view('dsr/bsi', $data);
    }
    public function tambah_bsi()
    {
        $code = $this->session->userdata('code');
        $data['supervisors'] = $this->Dsr_model->get_supervisors($code);
        $this->load->view('dsr/tambah_bsi', $data);  // Modifikasi baris ini untuk meneruskan $data ke tampilan
    }
    public function add_bsi()
    {
        $code = $this->session->userdata('code');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'required|trim');
        $this->form_validation->set_rules('no_hp_nasabah', 'No Tlp Nasabah', 'required|trim|numeric');
        $this->form_validation->set_rules('no_rek_bsi_syariah_nasabah', 'No Rek BSI Nasabah', 'required|trim|numeric');

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        } else {
            $code = $this->session->userdata('code');

            // Ambil detail user
            $supervisors = $this->Dsr_model->get_supervisors($code);

            // Names of input field
            $files = ['ss_info_rekening', 'ss_dashboard', 'foto_ktp_nasabah'];
            $fileNames = [];

            // Configure upload.
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 5000;
            $this->load->library('upload', $config);

            // Loop through each file
            foreach ($files as $file) {
                if (!$this->upload->do_upload($file)) {
                    // Handle error
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('dsr/bsi');
                } else {
                    // Save the file name
                    $uploadData = $this->upload->data();
                    $fileNames[$file] = $uploadData['file_name'];
                    // error_log('File Names: ' . print_r($fileNames, true));
                }
            }

            // Add BSI data
            $result = $this->Dsr_model->add_bsi($code, $fileNames, $supervisors);
            if ($result['status'] == 'error') {
                $this->session->set_flashdata('error', $result['message']);
            } else {
                $this->session->set_flashdata('success', $result['message']);
            }
            redirect('dsr/bsi');
        }
    }
    public function delete_bsi($id)
    {
        $this->Dsr_model->delete_bsi($id);
        redirect('dsr/bsi');
    }

    // TMRW By UOB
    public function uob()
    {
        $code = $this->session->userdata('code');
        $data['uob_forms'] = $this->Dsr_model->get_all_uob_forms($code);
        $data['supervisors'] = $this->Dsr_model->get_supervisors($code);
        $this->load->view('dsr/uob', $data);
    }
    public function tambah_uob()
    {
        $code = $this->session->userdata('code');
        $data['supervisors'] = $this->Dsr_model->get_supervisors($code);
        $this->load->view('dsr/tambah_uob', $data);  // Modifikasi baris ini untuk meneruskan $data ke tampilan
    }
    public function add_uob()
    {
        $code = $this->session->userdata('code');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'required|trim');
        $this->form_validation->set_rules('no_hp_nasabah', 'No HP Nasabah', 'required|trim|numeric');
        $this->form_validation->set_rules('no_rek_nasabah', 'No Rek Nasabah', 'required|trim|numeric');

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        } else {
            $code = $this->session->userdata('code');

            // Ambil detail user
            $supervisors = $this->Dsr_model->get_supervisors($code);

            // Names of input field
            $files = ['foto_ktp_nasabah'];
            $fileNames = [];

            // Configure upload.
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 5000;
            $this->load->library('upload', $config);

            // Loop through each file
            foreach ($files as $file) {
                if (!$this->upload->do_upload($file)) {
                    // Handle error
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('dsr/uob');
                } else {
                    // Save the file name
                    $uploadData = $this->upload->data();
                    $fileNames[$file] = $uploadData['file_name'];
                    // error_log('File Names: ' . print_r($fileNames, true));
                }
            }

            // Add UOB data
            $result = $this->Dsr_model->add_uob($code, $fileNames, $supervisors);
            if ($result['status'] == 'error') {
                $this->session->set_flashdata('error', $result['message']);
            } else {
                $this->session->set_flashdata('success', $result['message']);
            }
            redirect('dsr/uob');
        }
    }
    public function delete_uob($id)
    {
        $this->Dsr_model->delete_uob($id);
        redirect('dsr/uob');
    }

    // LINE BANK
    public function line()
    {
        $code = $this->session->userdata('code');
        $data['line_forms'] = $this->Dsr_model->get_all_line_forms($code);
        $data['supervisors'] = $this->Dsr_model->get_supervisors($code);
        $this->load->view('dsr/line', $data);
    }
    public function tambah_line()
    {
        $code = $this->session->userdata('code');
        $data['supervisors'] = $this->Dsr_model->get_supervisors($code);
        $this->load->view('dsr/tambah_line', $data);  // Modifikasi baris ini untuk meneruskan $data ke tampilan
    }
    public function add_line()
    {
        $code = $this->session->userdata('code');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'required|trim');
        $this->form_validation->set_rules('no_hp_nasabah', 'No HP Nasabah', 'required|trim|numeric');
        $this->form_validation->set_rules('no_rek_line_nasabah', 'No Rek Line Nasabah', 'required|trim|numeric');

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        } else {
            $code = $this->session->userdata('code');

            // Ambil detail user
            $supervisors = $this->Dsr_model->get_supervisors($code);

            // Names of input field
            $files = ['ss_detail_dashboard', 'foto_ktp_nasabah'];
            $fileNames = [];

            // Configure upload.
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 5000;
            $this->load->library('upload', $config);

            // Loop through each file
            foreach ($files as $file) {
                if (!$this->upload->do_upload($file)) {
                    // Handle error
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('dsr/line');
                } else {
                    // Save the file name
                    $uploadData = $this->upload->data();
                    $fileNames[$file] = $uploadData['file_name'];
                    // error_log('File Names: ' . print_r($fileNames, true));
                }
            }

            // Add LINE data
            $result = $this->Dsr_model->add_line($code, $fileNames, $supervisors);
            if ($result['status'] == 'error') {
                $this->session->set_flashdata('error', $result['message']);
            } else {
                $this->session->set_flashdata('success', $result['message']);
            }
            redirect('dsr/line');
        }
    }
    public function delete_line($id)
    {
        $this->Dsr_model->delete_line($id);
        redirect('dsr/line');
    }

    // BPD DIY
    public function bpd()
    {
        $code = $this->session->userdata('code');
        $data['bpd_forms'] = $this->Dsr_model->get_all_bpd_forms($code);
        $data['supervisors'] = $this->Dsr_model->get_supervisors($code);
        $this->load->view('dsr/bpd', $data);
    }
    public function tambah_bpd()
    {
        $code = $this->session->userdata('code');
        $data['supervisors'] = $this->Dsr_model->get_supervisors($code);
        $this->load->view('dsr/tambah_bpd', $data);  // Modifikasi baris ini untuk meneruskan $data ke tampilan
    }
    public function add_bpd()
    {
        $code = $this->session->userdata('code');

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'required|trim');
        $this->form_validation->set_rules('nik_nasabah', 'NIK Nasabah', 'required|trim|numeric');
        $this->form_validation->set_rules('no_hp_nasabah', 'No HP Nasabah', 'required|trim|numeric');
        $this->form_validation->set_rules('email_nasabah', 'Email Nasabah', 'required|trim');
        $this->form_validation->set_rules('nama_merchant', 'Nama Merchant', 'required|trim');
        $this->form_validation->set_rules('alamat_merchant', 'Alamat Merchant', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        } else {
            $code = $this->session->userdata('code');

            // Ambil detail user
            $supervisors = $this->Dsr_model->get_supervisors($code);

            // Names of input field
            $files = ['foto_ktp_nasabah', 'foto_toko'];
            $fileNames = [];

            // Configure upload.
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 5000;
            $this->load->library('upload', $config);

            // Loop through each file
            foreach ($files as $file) {
                if (!$this->upload->do_upload($file)) {
                    // Handle error
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('dsr/bpd');
                } else {
                    // Save the file name
                    $uploadData = $this->upload->data();
                    $fileNames[$file] = $uploadData['file_name'];
                    // error_log('File Names: ' . print_r($fileNames, true));
                }
            }

            // Add bpd data
            $result = $this->Dsr_model->add_bpd($code, $fileNames, $supervisors);
            if ($result['status'] == 'error') {
                $this->session->set_flashdata('error', $result['message']);
            } else {
                $this->session->set_flashdata('success', $result['message']);
            }
            redirect('dsr/bpd');
        }
    }
    public function delete_bpd($id)
    {
        $this->Dsr_model->delete_bpd($id);
        redirect('dsr/bpd');
    }
}
