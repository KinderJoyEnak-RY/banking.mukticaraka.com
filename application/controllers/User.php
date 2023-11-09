<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	public function login()
	{
		$code = $this->input->post('code');
		$password = $this->input->post('password');

		$user = $this->User_model->get_user_by_code($code);
		if (!empty($user)) {
			if (password_verify($password, $user['password'])) {
				$this->session->set_userdata('code', $user['code']);
				$this->session->set_userdata('level', $user['level']);
				$this->session->set_userdata('name', $user['name']);

				// Cek jika level adalah DSR atau SDM, redirect ke dashboard DSR
				if ($user['level'] == 'DSR' || $user['level'] == 'SDM') {
					redirect('dsr/dashboard');
				} else {
					// Redirect user to the appropriate dashboard based on their level
					redirect(strtolower($user['level']) . '/dashboard');
				}
			} else {
				$this->session->set_flashdata('error', 'Password salah');
				redirect('user');
			}
		} else {
			$this->session->set_flashdata('error', 'Kode tidak ditemukan');
			redirect('user');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user');
	}
}
