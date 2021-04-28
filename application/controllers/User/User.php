<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data = [
            'judul'         => 'Home',
            'user'          => $this->Model_auth->dataLogin()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/dashboard');
        $this->load->view('templates/footer');
    }

    public function konsultasi()
    {
        $data = [
            'judul'         => 'Konsultasi',
            'user'          => $this->Model_auth->dataLogin(),
            'gejala'        => $this->db->get('tb_gejala')->result()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/konsultasi', $data);
        $this->load->view('templates/footer');
    }

    public function hasil()
    {

        $data = [
            'judul'         => 'Hasil konsultasi',
            'user'          => $this->Model_auth->dataLogin()

        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/hasil-konsultasi', $data);
        $this->load->view('templates/footer');
    }

    public function prosesHasil()
    {
        $this->Model_user->hasil();
        redirect('user/user/hasil');
    }

    public function hapusGejala($id)
    {

        $this->db->where('id_h', $id);
        $this->db->delete('tb_hasil');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        successfully deleted data
         </div>');
        redirect('user/user/hasil');
    }
}
