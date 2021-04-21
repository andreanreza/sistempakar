<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {

        $data = [
            'judul'         => 'Data Penyakit',
            'user'          => $this->Model_auth->dataLogin(),
            'penyakit'        => $this->db->get('tb_penyakit')->result_array(),

        ];

        $this->form_validation->set_rules('kode_penyakit', 'Kode Penyakit', 'required|trim');
        $this->form_validation->set_rules('nama_penyakit', 'Nama penyakit', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/master/penyakit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_master->addDataPenyakit();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            successfully added new data
             </div>');
            redirect('admin/penyakit');
        }
    }

    public function editPenyakit($id)
    {
        $this->Model_master->editPenyakit($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">
        successfully edited data
       </div>');
        redirect('admin/penyakit');
    }

    public function hapusPenyakit($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_penyakit');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        successfully deleted data
         </div>');
        redirect('admin/penyakit');
    }
}
