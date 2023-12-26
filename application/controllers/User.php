<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

    public function login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->user_model->get_user_by_email($email);
    
        if ($user && password_verify($password, $user['password'])) {
            $this->session->set_userdata('user_id', $user['id']);
            $this->session->set_userdata('username', $user['nama']);
            redirect('home/tipe'); 
        } else {
            $this->session->set_flashdata('error', 'Email atau password tidak valid.');
            redirect('home/login');
        }
    }

    public function register() {
        $hashed_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$data = array(
			'nama' => $this->input->post('nama'),
            'email'=> $this->input->post('email'),
            'password' => $hashed_password,
		);

        $this->user_model->insert_data($data,'user');
        $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
        redirect('home/login');
    }
 
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */