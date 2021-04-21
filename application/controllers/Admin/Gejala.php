<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {

        $data = [
            'judul'         => 'Data Gejala',
            'user'          => $this->Model_auth->dataLogin(),
            'gejala'        => $this->db->get('tb_gejala')->result_array(),

        ];

        $this->form_validation->set_rules('kode_gejala', 'Kode gejala', 'required|trim');
        $this->form_validation->set_rules('nama_gejala', 'Nama gejala', 'required|trim');
        $this->form_validation->set_rules('solusi', 'Solusi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/master/gejala', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_master->addDataGejala();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            successfully added new data
             </div>');
            redirect('admin/Gejala');
        }
    }

    public function editGejala($id)
    {
        $this->Model_master->editGejala($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">
        successfully edited data
       </div>');
        redirect('admin/gejala');
    }

    public function hapusGejala($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_gejala');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        successfully deleted data
         </div>');
        redirect('admin/gejala');
    }
}
