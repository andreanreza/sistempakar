<?php

function cek_login()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $id_role = $ci->session->userdata('id_role');
        $menu = $ci->uri->segment(1);

        $menu = $ci->db->get_where('tb_menu', ['menu' => $menu])->row_array();
        $id_menu = $menu['id'];

        $accessMenu = $ci->db->get_where('tb_access_menu', [
            'id_role' => $id_role,
            'id_menu' => $id_menu
        ]);

        if ($accessMenu->num_rows() < 1) {
            redirect('auth/blok');
        }
    }
}
