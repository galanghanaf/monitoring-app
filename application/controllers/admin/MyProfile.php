<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class MyProfile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != '2') {

            redirect('welcome');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['title'] = "My Profile";
        $this->load->view('templatesAdmin/header', $data);
        $this->load->view('templatesAdmin/sidebar');
        $this->load->view('admin/myprofile', $data);
        $this->load->view('templatesAdmin/footer');
    }




    public function edit()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')],

        )->row_array();


        $this->form_validation->set_rules('name', 'Nama', 'required');


        if ($this->form_validation->run() == false) {
            $data['title'] = "Mengubah My Profile";
            $this->load->view('templatesAdmin/header', $data);
            $this->load->view('templatesAdmin/sidebar');
            $this->load->view('admin/formUpdateMyProfile', $data);
            $this->load->view('templatesAdmin/footer');
        } else {

            $name  = $this->input->post('name', true);
            $email = $this->input->post('email', true);


            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Profil Berhasil Diubah!</strong>
            </div>');
            redirect('admin/myprofile');
        }
    }
}
