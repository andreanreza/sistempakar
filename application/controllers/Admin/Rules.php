<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rules extends CI_Controller
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
            'rules'         => $this->Model_master->viewRules(),
            'penyakit'      => $this->db->get('tb_penyakit')->result(),
            'gejala'        => $this->db->get('tb_gejala')->result()

        ];


        $this->form_validation->set_rules('id_penyakit', 'Nama penyakit', 'required|trim');
        $this->form_validation->set_rules('id_gejala', 'Nama gejala', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/master/rules', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_master->addDataRules();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            successfully added new data
             </div>');
            redirect('admin/Rules');
        }
    }

    public function editrules($id)
    {
        $this->Model_master->editrules($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">
        successfully edited data
       </div>');
        redirect('admin/rules');
    }

    public function hapusRules($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_rules');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        successfully deleted data
         </div>');
        redirect('admin/rules');
    }
}
