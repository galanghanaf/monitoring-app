<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class DataAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != '1') {
            redirect('welcome');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['title'] = "Data Admin";
        $data['dataadmin'] = $this->Monitoring_model->getAllDataAdmin();
        $this->load->view('templatesSuperAdmin/header', $data);
        $this->load->view('templatesSuperAdmin/sidebar');
        $this->load->view('superadmin/dataadmin', $data);
        $this->load->view('templatesSuperAdmin/footer');
    }
    public function tambahData()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already used!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]', [
            'min_length' => 'Password to short!',
            'matches' => 'Password dont match!',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]', []);


        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Data Admin";
            $this->load->view('templatesSuperAdmin/header', $data);
            $this->load->view('templatesSuperAdmin/sidebar');
            $this->load->view('superadmin/formTambahDataAdmin', $data);
            $this->load->view('templatesSuperAdmin/footer');
        } else {
            $data = [
                'name'          => htmlspecialchars($this->input->post('name', true)),
                'email'         => htmlspecialchars($this->input->post('email', true)),
                'image'         => 'avatar.png',
                'password'      => htmlspecialchars($this->input->post('password1', true)),
                'role_id'       => 2,
                'is_active'     => 1,
                'date_created'  => time(),
                'date_changed'  => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Nama Berhasil Ditambahkan!</strong>
            </div>');
            redirect('superadmin/dataadmin');
        }
    }

    /*
    fungsi function ini untuk melakukan form_validation, tujuan untuk menentukan rules dari setiap input yang ada pada views 
        //disini kita men set rules dengan required, artinya form wajib di isi
    */
    public function updateData($id)
    {

        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['title'] = "Ubah Data Admin";
        $data['dataadmin'] = $this->db->query("SELECT * FROM user WHERE id='$id'")->result();
        $this->load->view('templatesSuperAdmin/header', $data);
        $this->load->view('templatesSuperAdmin/sidebar');
        $this->load->view('superadmin/formUpdateDataAdmin', $data);
        $this->load->view('templatesSuperAdmin/footer');
    }
    public function updateDataAksi()
    {

        $this->_rulesadmin();
        if ($this->form_validation->run() == FALSE) {
            redirect('superadmin/dataadmin');
        } else {
            $id                                 = $this->input->post('id');
            $name                               = $this->input->post('name');
            $password                           = $this->input->post('password');
            $email                              = $this->input->post('email');
            $image                              = $this->input->post('image');
            $role_id                            = $this->input->post('role_id');
            $is_active                          = $this->input->post('is_active');
            $date_created                       = $this->input->post('date_created');
            $date_changed                       = time();

            $data = array(
                'name'                              => $name,
                'email'                             => $email,
                'password'                          => $password,
                'image'                             => $image,
                'role_id'                           => $role_id,
                'is_active'                         => $is_active,
                'date_created'                      => $date_created,
                'date_changed'                      => $date_changed,

            );

            $where = array(
                'id' => $id
            );
            $this->Monitoring_model->update_data('user', $data, $where);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Admin Berhasil Diupdate!</strong>
            </div>');
            redirect('superadmin/dataadmin');
        }
    }
    public function _rulesadmin()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required', []);
    }


    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->Monitoring_model->delete_data($where, 'user');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Admin Berhasil Dihapus!</strong></div>');
        redirect('superadmin/dataadmin');
    }

    public function download()
    {

        $data['title'] = "DATA ADMIN";
        $data['dataadmin'] = $this->Monitoring_model->getAllDataAdmin();
        $this->load->view('superadmin/downloadDataAdmin', $data);
    }
}
