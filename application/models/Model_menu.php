<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_menu extends CI_Model
{
    // menu utama model 
    public function editMenu()
    {
        $data = [
            'menu' => $this->input->post('menu')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_menu', $data);
    }
    // end menu utama

    // menu list model
    public function menuList()
    {
        $this->db->select('tb_menu.menu, tb_menu_list.*');
        $this->db->from('tb_menu_list');
        $this->db->join('tb_menu', 'tb_menu.id = tb_menu_list.id_menu');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambahMenuList()
    {
        $data = [
            'nama_menu' => $this->input->post('nama_menu'),
            'url'       => $this->input->post('url'),
            'icon'      => $this->input->post('icon'),
            'id_menu'   => $this->input->post('id_menu')
        ];

        $this->db->insert('tb_menu_list', $data);
    }

    public function editMenuList()
    {
        $data = [
            'nama_menu' => $this->input->post('nama_menu'),
            'url'       => $this->input->post('url'),
            'icon'      => $this->input->post('icon'),
            'id_menu'   => $this->input->post('id_menu')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_menu_list', $data);
    }
    // end model menu list

    // modal submenu 
    public function subMenu()
    {
        $this->db->select('tb_submenu.*, tb_menu_list.nama_menu');
        $this->db->from('tb_submenu');
        $this->db->join('tb_menu_list', 'tb_menu_list.id = tb_submenu.id_menu_list');
        $this->db->order_by('tb_submenu.order_by', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambahSubmenu()
    {
        $data = [
            'submenu'        => $this->input->post('submenu'),
            'url_sub'        => $this->input->post('url_sub'),
            'id_menu_list'   => $this->input->post('id_menu_list'),
            'order_by'       => $this->input->post('order_by')
        ];

        $this->db->insert('tb_submenu', $data);
    }

    public function editSubMenu()
    {
        $data = [
            'submenu'        => $this->input->post('submenu'),
            'url_sub'        => $this->input->post('url_sub'),
            'id_menu_list'   => $this->input->post('id_menu_list'),
            'order_by'       => $this->input->post('order_by')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_submenu', $data);
    }

    public function editRole()
    {
        $data = [
            'role' => $this->input->post('role')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_role', $data);
    }

    public function roleMenu()
    {
        $this->db->where('id !=', 1);
        return $this->db->get('tb_menu')->result_array();
    }
}
