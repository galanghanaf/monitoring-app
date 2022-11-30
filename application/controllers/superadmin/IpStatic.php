<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class IpStatic extends CI_Controller
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

        $data['title'] = "Data Ip Static";
        $data['title2'] = "Plant Citeureup";

        $data['ipstatic'] = $this->Monitoring_model->getAllIpStatic();

        $this->load->view('templatesSuperAdmin/header', $data);
        $this->load->view('templatesSuperAdmin/sidebar');
        $this->load->view('superadmin/ipstatic', $data);
        $this->load->view('templatesSuperAdmin/footer');
    }
    public function export_csv()
    {
        $data['title'] = "Data Ip Static";
        $data['ipstatic'] = $this->Monitoring_model->getAllIpStatic();
        $this->load->view('superadmin/exportIpStatic', $data);
    }


    public function tambahData()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->form_validation->set_rules('ip_address', 'IP Address', 'required');
        $this->form_validation->set_rules('mac_address', 'Mac Address', 'required');
        $this->form_validation->set_rules('host_name', 'Hostname', 'required');
        $this->form_validation->set_rules('model', 'Model', 'required');
        $this->form_validation->set_rules('serial_number', 'Serial Number', 'required');
        $this->form_validation->set_rules('asset_number', 'Asset Number', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Data Ip Static";
            $this->load->view('templatesSuperAdmin/header', $data);
            $this->load->view('templatesSuperAdmin/sidebar');
            $this->load->view('superadmin/formTambahIpStatic', $data);
            $this->load->view('templatesSuperAdmin/footer');
        } else {
            $data = [
                'port'                          => $this->input->post('port'),
                'ip_address'                    => $this->input->post('ip_address'),
                'mac_address'                   => $this->input->post('mac_address'),
                'host_name'                     => $this->input->post('host_name'),
                'manufacture'                   => $this->input->post('manufacture'),
                'model'                         => $this->input->post('model'),
                'serial_number'                 => $this->input->post('serial_number'),
                'asset_number'                  => $this->input->post('asset_number'),
                'user'                          => $this->input->post('user'),
                'password'                      => $this->input->post('password'),

            ];

            $this->db->insert('ipstatic', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Ip Static Berhasil Ditambahkan!</strong>
            </div>');
            redirect('superadmin/ipstatic');
        }
    }

    public function updateData($id)
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['ipstatic'] = $this->db->query("SELECT * FROM ipstatic WHERE id='$id'")->result(); //result berfungsi untuk menggenerate/menampung/menampilkan query(data)
        $data['title'] = "Update Data Ip Static";
        $this->load->view('templatesSuperAdmin/header', $data);
        $this->load->view('templatesSuperAdmin/sidebar');
        $this->load->view('superadmin/formUpdateIpStatic', $data);
        $this->load->view('templatesSuperAdmin/footer');
    }

    public function updateDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            redirect('superadmin/ipstatic');
        } else {
            $id              = $this->input->post('id');

            $port            = $this->input->post('port');
            $ip_address      = $this->input->post('ip_address');
            $mac_address     = $this->input->post('mac_address');
            $host_name       = $this->input->post('host_name');
            $manufacture     = $this->input->post('manufacture');
            $model           = $this->input->post('model');
            $serial_number   = $this->input->post('serial_number');
            $asset_number    = $this->input->post('asset_number');
            $user            = $this->input->post('user');
            $password        = $this->input->post('password');

            $data = array(
                'port'          => $port,
                'ip_address'    => $ip_address,
                'mac_address'   => $mac_address,
                'host_name'     => $host_name,
                'manufacture'   => $manufacture,
                'model'         => $model,
                'serial_number' => $serial_number,
                'asset_number'  => $asset_number,
                'user'          => $user,
                'password'      => $password,


            );
            $where = array(
                'id' => $id
            );

            $this->Monitoring_model->update_data('ipstatic', $data, $where);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong></div>');
            redirect('superadmin/ipstatic');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('ip_address', 'Ip Address', 'required');
        $this->form_validation->set_rules('mac_address', 'Mac Address', 'required');
    }

    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->Monitoring_model->delete_data($where, 'ipstatic');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong></div>');
        redirect('superadmin/ipstatic');
    }

    public function download()
    {
        $data['title'] = "DATA IP STATIC";
        $data['ipstatic'] = $this->Monitoring_model->getAllIpStatic();
        $this->load->view('superadmin/downloadIpStatic', $data);
    }
}
