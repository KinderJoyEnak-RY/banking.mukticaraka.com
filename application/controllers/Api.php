<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('User_model', 'model');
    }

    function mitra_add_post()
    {
        $rules = [
            ['field' => 'emp_name', 'label' => 'Nama Lengkap', 'rules' => 'required'],
            ['field' => 'emp_code', 'label' => 'NIK', 'rules' => 'required|is_unique[users.code]'],
            ['field' => 'password', 'label' => 'Password', 'rules' => 'required'],
            ['field' => 'dept', 'label' => 'Level/Posisi/Dept', 'rules' => 'required'],
        ];
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            $data = [
                'code'          => $this->input->post('emp_code'),
                'name'          => $this->input->post('emp_name'),
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'level'         => $this->input->post('dept'),
                'dob'           => $this->input->post('join_date'),
                'referral'      => $this->input->post('referral'),
                'parent_code'   => $this->input->post('emp_parent')
            ];
            $this->model->add_user($data);
            $return = [
                'message' => 'Mitra/Sales Code sudah berhasil di transfer ke apps banking'
            ];
        } else {
            $return = [
                'message' => 'Mitra/Sales Code sudah terdaftar di apps banking'
            ];
        }

        $this->response($return, 200);
    }

    function mitra_status_post()
    {
        $rules = [
            ['field' => 'emp_code', 'label' => 'Code', 'rules' => 'required'],
            ['field' => 'status', 'label' => 'Status', 'rules' => 'required'],
        ];
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run()) {
            $code = $this->input->post('emp_code');

            $data = [
                'active'   => $this->input->post('status')
            ];
            $this->model->update_user($code, $data);
            $return = [
                'message' => 'Status berhasil di update'
            ];
        } else {
            $return = [
                'message' => 'Status gagal di update'
            ];
        }

        $this->response($return, 200);
    }
}
