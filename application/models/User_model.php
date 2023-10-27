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
        $levels = ['BSH', 'ASM', 'KOOR', 'SPV', 'DSR'];

        foreach ($levels as $level) {
            $this->db->where('level', $level);
            if ($code) {
                $this->db->where('parent_code', $code);
            }
            $users = $this->db->get('users')->result_array();

            foreach ($users as $user) {
                $user['children'] = $this->get_hierarchy($user['code']);
                $hierarchy[] = $user;
            }

            if ($code) {
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
}
