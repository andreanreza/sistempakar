<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function index()
    {

        $data = [
            'judul'         => 'View Profile',
            'user'          => $this->Model_auth->dataLogin()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer');
    }
}
