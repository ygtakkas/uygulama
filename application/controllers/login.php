<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

	public function index()
	{
		$this->load->view("login_view.php");
	}

    public function authenticate() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->users_model->get_user($email,$password);


        if ($user) 
        {
            $this->session->set_userdata('email', $user-> $email);
            $this->session->set_userdata('password', $user-> $password);
            redirect(base_url("welcome"));
        } else {
            $this->session->set_flashdata('error', 'Geçersiz kullanıcı adı veya şifre.');
            redirect('login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('username');
        redirect('login');
    }
}?>
