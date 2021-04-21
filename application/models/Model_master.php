<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_master extends CI_Model
{
    // crud data penyakit
    public function addDataPenyakit()
    {
        $data = [
            'kode_penyakit' => $this->input->post('kode_penyakit'),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
            'created_at'    => time()
        ];

        $this->db->insert('tb_penyakit', $data);
    }

    public function editPenyakit()
    {
        $data = [
            'kode_penyakit' => $this->input->post('kode_penyakit'),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
            'created_at'    => time()
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_penyakit', $data);
    }

    // crud data gejala
    public function addDataGejala()
    {
        $data = [
            'kode_gejala'   => $this->input->post('kode_gejala'),
            'nama_gejala'   => $this->input->post('nama_gejala'),
            'solusi'        => $this->input->post('solusi'),
            'created_at'    => time()
        ];

        $this->db->insert('tb_gejala', $data);
    }

    public function editGejala()
    {
        $data = [
            'kode_gejala'   => $this->input->post('kode_gejala'),
            'nama_gejala'   => $this->input->post('nama_gejala'),
            'solusi'        => $this->input->post('solusi'),
            'created_at'    => time()
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_gejala', $data);
    }

    // rules query
    public function viewRules()
    {

        $this->db->select('tb_rules.*, tb_penyakit.nama_penyakit, tb_gejala.nama_gejala, tb_gejala.solusi');
        $this->db->from('tb_rules');
        $this->db->join('tb_penyakit', 'tb_penyakit.id = tb_rules.id_penyakit');
        $this->db->join('tb_gejala', 'tb_gejala.id = tb_rules.id_gejala');
        // $this->db->order_by('tb_submenu.order_by', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function addDataRules()
    {
        $data = [
            'id_penyakit' => $this->input->post('id_penyakit'),
            'id_gejala' => $this->input->post('id_gejala'),
        ];

        $this->db->insert('tb_rules', $data);
    }

    public function editRules()
    {
        $data = [
            'id_penyakit'   => $this->input->post('id_penyakit'),
            'id_gejala'   => $this->input->post('id_gejala'),

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_rules', $data);
    }
}
