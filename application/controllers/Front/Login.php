<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        // $this->load->database();
    }
	public function aksi_login()
	{
		$this->load->model('M_login');

        $u = $this->input->post('username');
        $p = $this->input->post('password');

        $cek = $this->M_login->cek_login_user($u, $p)->num_rows();

        if ($cek == 1) {
            $data_session = array(
                'username' => $u,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('adminpanel/dashboard');
        } else {
            redirect('adminpanel');
        }

	}

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('adminpanel');
    }
}