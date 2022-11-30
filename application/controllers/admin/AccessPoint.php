<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class AccessPoint extends CI_Controller
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

        $data['title'] = "Data Access Point";
        $data['title2'] = "Plant Citeureup";

        $this->load->model('Monitoring_model', 'monitoring');

        $data['accesspoint'] = $this->Monitoring_model->getAllAccessPoint();
        $this->load->view('templatesAdmin/header', $data);
        $this->load->view('templatesAdmin/sidebar');
        $this->load->view('admin/accesspoint', $data);
        $this->load->view('templatesAdmin/footer');
    }
    public function export_csv()
    {
        $data['title'] = "Data Access Point";
        $data['accesspoint'] = $this->Monitoring_model->getAllAccessPoint();
        $this->load->view('admin/exportAccessPoint', $data);
    }

    public function tambahData()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->form_validation->set_rules('ip_address', 'IP Address', 'required');
        $this->form_validation->set_rules('mac_address', 'Mac Address', 'required');
        $this->form_validation->set_rules('asset_description', 'Asset Description', 'required');
        $this->form_validation->set_rules('hostname', 'Hostname', 'required');
        $this->form_validation->set_rules('model', 'Model', 'required');
        $this->form_validation->set_rules('pcb', 'PCB Serial Number', 'required');
        $this->form_validation->set_rules('assembly', 'Assembly Serial Number', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Data Access Point";
            $this->load->view('templatesAdmin/header', $data);
            $this->load->view('templatesAdmin/sidebar');
            $this->load->view('admin/formTambahAccessPoint', $data);
            $this->load->view('templatesAdmin/footer');
        } else {
            $data = [
                'asset_description'             => $this->input->post('asset_description', true),
                'hostname'                      => $this->input->post('hostname', true),
                'model'                         => $this->input->post('model'),
                'pcb'                           => $this->input->post('pcb'),
                'assembly'                      => $this->input->post('assembly'),
                'ip_address'                    => $this->input->post('ip_address'),
                'mac_address'                   => $this->input->post('mac_address'),
                'switch'                        => $this->input->post('switch'),
                'port'                          => $this->input->post('port')

            ];

            $this->db->insert('access_point', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Access Point Berhasil Ditambahkan!</strong>
            </div>');
            redirect('admin/accesspoint');
        }
    }


    public function updateData($id)
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();
        $data['title'] = "Update Data Access Point";
        $data['accesspoint'] = $this->db->query("SELECT * FROM access_point WHERE id='$id'")->result();
        $this->load->view('templatesAdmin/header', $data);
        $this->load->view('templatesAdmin/sidebar');
        $this->load->view('admin/formUpdateAccessPoint', $data);
        $this->load->view('templatesAdmin/footer');
    }
    public function updateDataAksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            redirect('admin/accesspoint');
        } else {
            $id                              = $this->input->post('id');
            $asset_description               = $this->input->post('asset_description');
            $hostname                        = $this->input->post('hostname');
            $model                           = $this->input->post('model');
            $pcb                             = $this->input->post('pcb');
            $assembly                        = $this->input->post('assembly');
            $mac_address                     = $this->input->post('ip_address');
            $ip_address                      = $this->input->post('mac_address');
            $switch                          = $this->input->post('switch');
            $port                            = $this->input->post('port');

            $data = array(
                'asset_description'             => $asset_description,
                'hostname'                      => $hostname,
                'model'                         => $model,
                'pcb'                           => $pcb,
                'assembly'                      => $assembly,
                'ip_address'                    => $ip_address,
                'switch'                        => $switch,
                'port'                          => $port,


            );

            $where = array(
                'id' => $id
            );
            $this->Monitoring_model->update_data('access_point', $data, $where);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Access Point Berhasil Diupdate!</strong>
            </div>');
            redirect('admin/accesspoint');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('ip_address', 'IP Address', 'required');
        $this->form_validation->set_rules('mac_address', 'Mac Address', 'required');
        $this->form_validation->set_rules('asset_description', 'Asset Description', 'required');
        $this->form_validation->set_rules('hostname', 'Hostname', 'required');
        $this->form_validation->set_rules('model', 'Model', 'required');
        $this->form_validation->set_rules('pcb', 'PCB Serial Number', 'required');
        $this->form_validation->set_rules('assembly', 'Assembly Serial Number', 'required');
    }

    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->Monitoring_model->delete_data($where, 'access_point');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Access Point Berhasil Dihapus!</strong></div>');
        redirect('admin/accesspoint');
    }

    public function download()
    {
        $data['title'] = "DATA ACCESS POINT";
        $data['accesspoint'] = $this->Monitoring_model->getAllAccessPoint();
        $this->load->view('admin/downloadAccessPoint', $data);
    }
}
