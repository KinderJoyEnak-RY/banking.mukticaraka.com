<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_user_by_code($code)
    {
        $this->db->where('code', $code);
        $query = $this->db->get('users');
        return $query->row_array();
    }

    public function get_all_users()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function get_users_by_level($level)
    {
        $this->db->where('level', $level);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function add_user($data)
    {
        return $this->db->insert('users', $data);
    }

    public function update_user($code, $data)
    {
        $this->db->where('code', $code);
        return $this->db->update('users', $data);
    }

    public function delete_user($code)
    {
        $this->db->where('code', $code);
        if ($this->db->delete('users')) {
            $this->session->set_flashdata('success', 'User deleted successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete user');
        }
    }

    public function get_hierarchy($code = NULL)
    {
        $hierarchy = [];
        $levels = ['BSH', 'ASM', 'KOOR', 'SPV', 'DSR', 'SDM']; // 'SDM' sudah ada

        foreach ($levels as $level) {
            $this->db->where('level', $level);
            if ($code) {
                $this->db->where('parent_code', $code);
            }
            $users = $this->db->get('users')->result_array();

            foreach ($users as $user) {
                // Jika level adalah 'DSR' atau 'SDM', anak-anaknya harus diambil dari level yang sama
                if ($level === 'DSR' || $level === 'SDM') {
                    $user['children'] = array_merge(
                        $this->get_hierarchy($user['code'], 'DSR'),
                        $this->get_hierarchy($user['code'], 'SDM')
                    );
                } else {
                    $user['children'] = $this->get_hierarchy($user['code']);
                }

                $hierarchy[] = $user;
            }

            if ($code && ($level === 'DSR' || $level === 'SDM')) {
                break;
            }
        }

        return $hierarchy;
    }

    public function get_subordinates_by_asm($asm_code)
    {
        $hierarchy = [];

        // Ambil data ASM berdasarkan kode ASM
        $this->db->where('code', $asm_code);
        $asm = $this->db->get('users')->row_array();

        // Ambil data BSH yang merupakan atasan dari ASM
        $this->db->where('code', $asm['parent_code']);
        $bsh = $this->db->get('users')->row_array();

        // Ambil semua KOOR di bawah ASM
        $this->db->where('parent_code', $asm_code);
        $koors = $this->db->get('users')->result_array();

        foreach ($koors as &$koor) {

            // Ambil semua SPV di bawah KOOR
            $this->db->where('parent_code', $koor['code']);
            $spvs = $this->db->get('users')->result_array();

            foreach ($spvs as &$spv) {

                // Ambil semua DSR di bawah SPV
                $this->db->where('parent_code', $spv['code']);
                $dsrs = $this->db->get('users')->result_array();

                $spv['dsrs'] = $dsrs;
            }

            $koor['spvs'] = $spvs;
        }

        $asm['koors'] = $koors;
        $bsh['asm'] = $asm;
        $hierarchy[] = $bsh;

        return $hierarchy;
    }

    public function get_hierarchy_by_koor($koor_code)
    {
        // Ambil data KOOR berdasarkan kode KOOR
        $this->db->where('code', $koor_code);
        $koor = $this->db->get('users')->row_array();

        // Jika KOOR tidak ditemukan, kembalikan array kosong
        if (!$koor) {
            return [];
        }

        // Ambil semua SPV yang berada di bawah KOOR
        $this->db->where('parent_code', $koor_code);
        $spvs = $this->db->get('users')->result_array();

        if (!is_array($spvs)) {
            $spvs = [];
        }

        // Untuk setiap SPV, ambil semua DSR yang berada di bawahnya
        foreach ($spvs as &$spv) {
            $this->db->where('parent_code', $spv['code']);
            $dsrs = $this->db->get('users')->result_array();

            $spv['dsrs'] = $dsrs ? $dsrs : []; // Jika tidak ada DSR, tetapkan sebagai array kosong
        }

        $koor['spvs'] = $spvs;

        return [$koor]; // Kembalikan dalam bentuk array dengan KOOR sebagai item pertama
    }

    public function get_hierarchy_by_spv($spv_code)
    {
        // Ambil data SPV berdasarkan kode SPV
        $this->db->where('code', $spv_code);
        $spv = $this->db->get('users')->row_array();

        // Jika SPV tidak ditemukan, kembalikan array kosong
        if (!$spv) {
            return [];
        }

        // Ambil semua DSR yang berada di bawah SPV
        $this->db->where('parent_code', $spv_code);
        $dsrs = $this->db->get('users')->result_array();

        $spv['dsrs'] = $dsrs ? $dsrs : []; // Jika tidak ada DSR, tetapkan sebagai array kosong

        return [$spv]; // Kembalikan dalam bentuk array dengan SPV sebagai item pertama
    }
}
