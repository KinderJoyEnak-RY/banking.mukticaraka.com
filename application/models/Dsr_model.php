<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dsr_model extends CI_Model
{

    public function get_user_details($code)
    {
        $this->db->where('code', $code);
        $query = $this->db->get('users');
        return $query->row_array();
    }
    public function get_supervisors($code)
    {
        $user = $this->get_user_details($code);
        $spv = $this->db->get_where('users', ['code' => $user['parent_code']])->row_array();
        $koor = $this->db->get_where('users', ['code' => $spv['parent_code']])->row_array();
        $asm = $this->db->get_where('users', ['code' => $koor['parent_code']])->row_array();

        return [
            'spv' => $spv['name'],
            'koor' => $koor['name'],
            'asm' => $asm['name']
        ];
    }
    public function get_referral_code($code)
    {
        $this->db->select('referral');
        $this->db->where('code', $code);
        $query = $this->db->get('users');
        $result = $query->row_array();
        return $result['referral'];
    }

    public function count_data_by_code($code, $table_name)
    {
        $this->db->where('code', $code);
        $this->db->from($table_name);
        return $this->db->count_all_results();
    }

    // CIMB
    public function get_all_cimb_forms($code)
    {
        $this->db->select('cimb_forms.*, users.code, users.name as nama_dsr');
        $this->db->from('cimb_forms');
        $this->db->join('users', 'cimb_forms.code = users.code', 'left');
        $this->db->where('cimb_forms.code', $code);
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function is_data_exist($data)
    {
        $this->db->group_start();
        $this->db->where('nama_nasabah', $data['nama_nasabah']);
        // $this->db->or_where('no_rek_nasabah', $data['no_rek_nasabah']);
        $this->db->or_where('no_mid', $data['no_mid']);
        $this->db->group_end();

        $query = $this->db->get('cimb_forms');
        return $query->num_rows() > 0;
    }
    public function add_cimb($code, $fileNames, $supervisors)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Gabungkan semua informasi alamat
        $user = $this->get_user_details($code);
        $alamat_toko = $this->input->post('alamat_toko');
        $data = array(
            'tanggal' => date('Y-m-d H:i:s'),
            'code' => $code,
            'dsr_code' => $user['code'],
            'dsr_name' => $user['name'],
            'jenis_skema' => $this->input->post('jenis_skema'),
            'nama_nasabah' => $this->input->post('nama_nasabah'),
            'no_rek_nasabah' => $this->input->post('no_rek_nasabah'),
            'nama_toko_merchant' => $this->input->post('nama_toko_merchant'),
            'no_mid' => $this->input->post('no_mid'),
            'alamat_toko' => $alamat_toko,
            'provinsi' => $this->input->post('provinsi_name'),
            'kabupaten' => $this->input->post('kabupaten_name'),
            'kecamatan' => $this->input->post('kecamatan_name'),
            'dashboard_octo_merchant' => $fileNames['dashboard_octo_merchant'],
            'foto_toko' => $fileNames['foto_toko'],
            'spv' => $supervisors['spv'],
            'koor' => $supervisors['koor'],
            'asm' => $supervisors['asm']
        );

        // Cek apakah data sudah ada
        if ($this->is_data_exist($data)) {
            return array('status' => 'error', 'message' => 'Data dengan informasi yang sama sudah ada.');
        }

        if (!$this->db->insert('cimb_forms', $data)) {
            log_message('error', 'Error inserting data: ' . print_r($this->db->error(), true));
            return array('status' => 'error', 'message' => 'Gagal menambahkan data ke database.');
        }

        log_message('info', 'Data inserted successfully: ' . print_r($data, true));
        return array('status' => 'success', 'message' => 'Data berhasil ditambahkan.');
    }
    public function delete_cimb($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('cimb_forms');
    }

    // BSI SYARIAH
    public function get_all_bsi_forms($code)
    {
        $this->db->select('bsi_forms.*, users.code, users.name as nama_dsr');
        $this->db->from('bsi_forms');
        $this->db->join('users', 'bsi_forms.code = users.code', 'left');
        $this->db->where('bsi_forms.code', $code);
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function is_data_existt($data)
    {
        $this->db->group_start();
        $this->db->where('nama_nasabah', $data['nama_nasabah']);
        $this->db->or_where('no_hp_nasabah', $data['no_hp_nasabah']);
        $this->db->or_where('no_rek_bsi_syariah_nasabah', $data['no_rek_bsi_syariah_nasabah']);
        $this->db->group_end();

        $query = $this->db->get('bsi_forms');
        return $query->num_rows() > 0;
    }
    public function add_bsi($code, $fileNames, $supervisors)
    {
        date_default_timezone_set('Asia/Jakarta');

        $user = $this->get_user_details($code);
        $kota = $this->input->post('kota');
        $data = array(
            'tanggal' => date('Y-m-d H:i:s'),
            'code' => $code,
            'dsr_code' => $user['code'],
            'dsr_name' => $user['name'],
            'nama_nasabah' => $this->input->post('nama_nasabah'),
            'no_hp_nasabah' => $this->input->post('no_hp_nasabah'),
            'no_rek_bsi_syariah_nasabah' => $this->input->post('no_rek_bsi_syariah_nasabah'),
            'kota' => $kota,
            'provinsi' => $this->input->post('provinsi_name'),
            'kabupaten' => $this->input->post('kabupaten_name'),
            'ss_info_rekening' => $fileNames['ss_info_rekening'],
            'ss_dashboard' => $fileNames['ss_dashboard'],
            'foto_ktp_nasabah' => $fileNames['foto_ktp_nasabah'],
            'spv' => $supervisors['spv'],
            'koor' => $supervisors['koor'],
            'asm' => $supervisors['asm']
        );

        // Cek apakah data sudah ada
        if ($this->is_data_existt($data)) {
            return array('status' => 'error', 'message' => 'Data dengan informasi yang sama sudah ada.');
        }

        if (!$this->db->insert('bsi_forms', $data)) {
            log_message('error', 'Error inserting data: ' . print_r($this->db->error(), true));
            return array('status' => 'error', 'message' => 'Gagal menambahkan data ke database.');
        }

        log_message('info', 'Data inserted successfully: ' . print_r($data, true));
        return array('status' => 'success', 'message' => 'Data berhasil ditambahkan.');
    }
    public function delete_bsi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('bsi_forms');
    }

    // TMRW By UOB
    public function get_all_uob_forms($code)
    {
        $this->db->select('uob_forms.*, users.code, users.name as nama_dsr');
        $this->db->from('uob_forms');
        $this->db->join('users', 'uob_forms.code = users.code', 'left');
        $this->db->where('uob_forms.code', $code);
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function is_data_existtt($data)
    {
        $this->db->group_start();
        $this->db->where('nama_nasabah', $data['nama_nasabah']);
        $this->db->or_where('no_hp_nasabah', $data['no_hp_nasabah']);
        $this->db->or_where('no_rek_nasabah', $data['no_rek_nasabah']);
        $this->db->group_end();

        $query = $this->db->get('uob_forms');
        return $query->num_rows() > 0;
    }
    public function add_uob($code, $fileName, $supervisors)
    {
        date_default_timezone_set('Asia/Jakarta');

        $user = $this->get_user_details($code);
        $kota = $this->input->post('kota');
        $data = array(
            'tanggal' => date('Y-m-d H:i:s'),
            'code' => $code,
            'dsr_code' => $user['code'],
            'dsr_name' => $user['name'],
            'jenis_skema' => $this->input->post('jenis_skema'),
            'nama_nasabah' => $this->input->post('nama_nasabah'),
            'no_hp_nasabah' => $this->input->post('no_hp_nasabah'),
            'no_rek_nasabah' => $this->input->post('no_rek_nasabah'),
            'kota' => $kota,
            'provinsi' => $this->input->post('provinsi_name'),
            'kabupaten' => $this->input->post('kabupaten_name'),
            'foto_ktp_nasabah' => $fileName['foto_ktp_nasabah'],
            'spv' => $supervisors['spv'],
            'koor' => $supervisors['koor'],
            'asm' => $supervisors['asm']
        );

        // Cek apakah data sudah ada
        if ($this->is_data_existtt($data)) {
            return array('status' => 'error', 'message' => 'Data dengan informasi yang sama sudah ada.');
        }

        if (!$this->db->insert('uob_forms', $data)) {
            log_message('error', 'Error inserting data: ' . print_r($this->db->error(), true));
            return array('status' => 'error', 'message' => 'Gagal menambahkan data ke database.');
        }

        log_message('info', 'Data inserted successfully: ' . print_r($data, true));
        return array('status' => 'success', 'message' => 'Data berhasil ditambahkan.');
    }
    public function delete_uob($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('uob_forms');
    }

    // LINE BANK
    public function get_all_line_forms($code)
    {
        $this->db->select('line_forms.*, users.code, users.name as nama_dsr');
        $this->db->from('line_forms');
        $this->db->join('users', 'line_forms.code = users.code', 'left');
        $this->db->where('line_forms.code', $code);
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function is_data_existttt($data)
    {
        $this->db->group_start();
        $this->db->where('nama_nasabah', $data['nama_nasabah']);
        $this->db->or_where('no_hp_nasabah', $data['no_hp_nasabah']);
        $this->db->or_where('no_rek_line_nasabah', $data['no_rek_line_nasabah']);
        $this->db->group_end();

        $query = $this->db->get('line_forms');
        return $query->num_rows() > 0;
    }
    public function add_line($code, $fileNames, $supervisors)
    {
        date_default_timezone_set('Asia/Jakarta');

        $user = $this->get_user_details($code);
        $kota = $this->input->post('kota');
        $data = array(
            'tanggal' => date('Y-m-d H:i:s'),
            'code' => $code,
            'dsr_code' => $user['code'],
            'dsr_name' => $user['name'],
            'nama_nasabah' => $this->input->post('nama_nasabah'),
            'no_hp_nasabah' => $this->input->post('no_hp_nasabah'),
            'kota' => $kota,
            'provinsi' => $this->input->post('provinsi_name'),
            'kabupaten' => $this->input->post('kabupaten_name'),
            'no_rek_line_nasabah' => $this->input->post('no_rek_line_nasabah'),
            'ss_detail_dashboard' => $fileNames['ss_detail_dashboard'],
            'foto_ktp_nasabah' => $fileNames['foto_ktp_nasabah'],
            'spv' => $supervisors['spv'],
            'koor' => $supervisors['koor'],
            'asm' => $supervisors['asm']
        );

        // Cek apakah data sudah ada
        if ($this->is_data_existttt($data)) {
            return array('status' => 'error', 'message' => 'Data dengan informasi yang sama sudah ada.');
        }

        if (!$this->db->insert('line_forms', $data)) {
            log_message('error', 'Error inserting data: ' . print_r($this->db->error(), true));
            return array('status' => 'error', 'message' => 'Gagal menambahkan data ke database.');
        }

        log_message('info', 'Data inserted successfully: ' . print_r($data, true));
        return array('status' => 'success', 'message' => 'Data berhasil ditambahkan.');
    }
    public function delete_line($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('line_forms');
    }

    // BPD DIY
    public function get_all_bpd_forms($code)
    {
        $this->db->select('bpd_forms.*, users.code, users.name as nama_dsr');
        $this->db->from('bpd_forms');
        $this->db->join('users', 'bpd_forms.code = users.code', 'left');
        $this->db->where('bpd_forms.code', $code);
        $this->db->order_by('tanggal', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function is_data_existtttt($data)
    {
        $this->db->group_start();
        $this->db->where('nama_nasabah', $data['nama_nasabah']);
        $this->db->or_where('no_hp_nasabah', $data['no_hp_nasabah']);
        $this->db->or_where('nik_nasabah', $data['nik_nasabah']);
        $this->db->or_where('email_nasabah', $data['email_nasabah']);
        $this->db->or_where('nama_merchant', $data['nama_merchant']);
        $this->db->group_end();

        $query = $this->db->get('bpd_forms');
        return $query->num_rows() > 0;
    }
    public function add_bpd($code, $fileNames, $supervisors)
    {
        date_default_timezone_set('Asia/Jakarta');

        $user = $this->get_user_details($code);
        $alamat_merchant = $this->input->post('alamat_merchant');
        $data = array(
            'tanggal' => date('Y-m-d H:i:s'),
            'code' => $code,
            'dsr_code' => $user['code'],
            'dsr_name' => $user['name'],
            'nama_nasabah' => $this->input->post('nama_nasabah'),
            'no_hp_nasabah' => $this->input->post('no_hp_nasabah'),
            'email_nasabah' => $this->input->post('email_nasabah'),
            'nik_nasabah' => $this->input->post('nik_nasabah'),
            'nama_merchant' => $this->input->post('nama_merchant'),
            'alamat_merchant' => $alamat_merchant,
            'provinsi' => $this->input->post('provinsi_name'),
            'kabupaten' => $this->input->post('kabupaten_name'),
            'kecamatan' => $this->input->post('kecamatan_name'),
            'foto_ktp_nasabah' => $fileNames['foto_ktp_nasabah'],
            'foto_toko' => $fileNames['foto_toko'],
            'spv' => $supervisors['spv'],
            'koor' => $supervisors['koor'],
            'asm' => $supervisors['asm']
        );

        // Cek apakah data sudah ada
        if ($this->is_data_existtttt($data)) {
            return array('status' => 'error', 'message' => 'Data dengan informasi yang sama sudah ada.');
        }

        if (!$this->db->insert('bpd_forms', $data)) {
            log_message('error', 'Error inserting data: ' . print_r($this->db->error(), true));
            return array('status' => 'error', 'message' => 'Gagal menambahkan data ke database.');
        }

        log_message('info', 'Data inserted successfully: ' . print_r($data, true));
        return array('status' => 'success', 'message' => 'Data berhasil ditambahkan.');
    }
    public function delete_bpd($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('bpd_forms');
    }
}
