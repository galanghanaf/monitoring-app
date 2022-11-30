<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class SwitchPoint extends CI_Controller
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

        $data['title'] = "Data Switch";
        $data['title2'] = "Plant Citeureup";

        $data['switchpoint'] = $this->Monitoring_model->getAllSwitchPoint();

        $this->load->view('templatesSuperAdmin/header', $data);
        $this->load->view('templatesSuperAdmin/sidebar');
        $this->load->view('superadmin/switchpoint', $data);
        $this->load->view('templatesSuperAdmin/footer');
    }
    public function export_csv()
    {
        $data['title'] = "Data Switch";
        $data['switchpoint'] = $this->Monitoring_model->getAllSwitchPoint();
        $this->load->view('superadmin/exportSwitch', $data);
    }


    public function tambahData()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->form_validation->set_rules('ip_address', 'IP Address', 'required');
        $this->form_validation->set_rules('mac_address', 'Mac Address', 'required');
        $this->form_validation->set_rules('hostname', 'Hostname', 'required');
        $this->form_validation->set_rules('model', 'Model', 'required');
        $this->form_validation->set_rules('asset_description', 'Asset Description', 'required');
        $this->form_validation->set_rules('serial_number', 'Serial Number', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Data Switch";
            $this->load->view('templatesSuperAdmin/header', $data);
            $this->load->view('templatesSuperAdmin/sidebar');
            $this->load->view('superadmin/formTambahSwitchPoint', $data);
            $this->load->view('templatesSuperAdmin/footer');
        } else {
            $data = [
                'asset_description'             => $this->input->post('asset_description'),
                'hostname'                      => $this->input->post('hostname'),
                'model'                         => $this->input->post('model'),
                'serial_number'                 => $this->input->post('serial_number'),
                'ip_address'                    => $this->input->post('ip_address'),
                'mac_address'                   => $this->input->post('mac_address'),
                'switch'                        => $this->input->post('switch'),
                'port'                          => $this->input->post('port'),

            ];

            $this->db->insert('switchpoint', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Switch Berhasil Ditambahkan!</strong>
            </div>');
            redirect('superadmin/switchpoint');
        }
    }

    public function updateData($id)
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();
        $data['title'] = 'Update Data Switch';

        $data['switchpoint'] = $this->db->query("SELECT * FROM switchpoint WHERE id='$id'")->result();
        $this->load->view('templatesSuperAdmin/header', $data);
        $this->load->view('templatesSuperAdmin/sidebar');
        $this->load->view('superadmin/formUpdateSwitchPoint', $data);
        $this->load->view('templatesSuperAdmin/footer');
    }
    public function updateDataAksi()
    {
        $this->_rules(); //function ini berfungsi untuk melakukan form_validation
        if ($this->form_validation->run() == FALSE) { //disini apabila form yang sudah kita buat ternyata pada saat di validasi false maka, akan dikembalikan ke tambahData
            redirect('superadmin/switchpoint');
        } else {
            $id             = $this->input->post('id');
            $asset_description     = $this->input->post('asset_description');
            $hostname      = $this->input->post('hostname');
            $model          = $this->input->post('model');
            $serial_number       = $this->input->post('serial_number');
            $ip_address       = $this->input->post('ip_address');
            $mac_address       = $this->input->post('mac_address');
            $switch       = $this->input->post('switch');
            $port       = $this->input->post('port');

            $data = array(
                'asset_description'    => $asset_description,
                'hostname'     => $hostname,
                'model'         => $model,
                'serial_number'      => $serial_number,
                'ip_address'      => $ip_address,
                'mac_address'      => $mac_address,
                'switch'      => $switch,
                'port'      => $port,

            );

            $where = array(
                'id' => $id
            );
            $this->Monitoring_model->update_data('switchpoint', $data, $where);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            </div>');
            redirect('superadmin/switchpoint');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('ip_address', 'IP Address', 'required');
        $this->form_validation->set_rules('mac_address', 'Mac Address', 'required');
    }

    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->Monitoring_model->delete_data($where, 'switchpoint');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong></div>');
        redirect('superadmin/switchpoint');
    }

    public function download()
    {
        $data['title'] = "DATA SWITCH";
        $data['switchpoint'] = $this->Monitoring_model->getAllSwitchPoint();
        $this->load->view('superadmin/downloadSwitch', $data);
    }
}
