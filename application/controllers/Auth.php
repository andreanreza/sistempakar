<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data = [
            'judul'         => 'Login Page'
        ];

        $this->form_validation->set_rules(
            'email',
            'email',
            'required|trim|valid_email',
            [
                'required'          => 'Email is required',
                'valid_email'       => 'The email that has input is invalid'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'password',
            'required|trim|min_length[8]',
            [
                'required'          => 'Password is required',
                'min_length'        => 'Minimum 8 character password'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        } else {
            //validasi lolos
            $this->_cek_login();
        }
    }

    private function _cek_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        //cek jika ada user
        if ($user) {
            //cek usernya aktiv
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'id_role' => $user['id_role']
                    ];
                    $this->session->set_userdata($data);
                    switch ($data['id_role']) {
                        case '1':
                            redirect('admin/admin');
                            break;
                        case '2':
                            redirect('user');
                            break;
                        default:
                            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                       Who are you as ?
                        </div>');
                            redirect('auth');
                            break;
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                   Wrong password !
                   </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                This Email has not activated !
               </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
           Email is not register !
          </div>');
            redirect('auth');
        }
    }

    public function register()
    {
        $data = [
            'judul'         => 'Register Page',
            'id_role'       => $this->db->get('tb_role')->result()
        ];

        $this->form_validation->set_rules(
            'username',
            'username',
            'required|trim',
            [
                'required'          => 'Username is required',
            ]
        );
        $this->form_validation->set_rules(
            'email',
            'email',
            'required|trim|valid_email|is_unique[tb_user.email]',
            [
                'required'          => 'Email is required',
                'valid_email'       => 'The email that has input is invalid',
                'is_unique'         => 'This email has already register !'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'password',
            'required|trim|min_length[8]|matches[password1]',
            [
                'required'          => 'Password is required',
                'min_length'        => 'Minimum 8 character password',
                'matches'           => 'Password dont match !'
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'password',
            'required|trim|matches[password]',
            [
                'required'          => 'Password is required',
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/header', $data);
            $this->load->view('auth/register');
            $this->load->view('auth/footer');
        } else {
            $this->Model_auth->tambahRegister();
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Congratilation ! your account has been created. Please login
          </div>');
            redirect('auth');
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        You have been Logged out 
      </div>');
        redirect('auth');
    }

    public function blok()
    {
        echo "blok";
    }
}
