<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    // crud data penyakit
    public function hasil()
    {
        $id_user = $this->input->post('id_user');
        $id_gejala = $this->input->post('id_gejala');



        foreach ($id_gejala as $idg) {

            $data = [
                'id_user' => $id_user,
                'id_gejala' => $idg,
                'id_penyakit' => 3
            ];
            $this->db->insert('tb_hasil', $data);
        }
    }
}
