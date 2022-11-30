<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class ItAsset extends CI_Controller
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

        $data['title'] = "IT Asset";
        $data['title2'] = "Plant Citeureup";

        $data['mapitasset'] = $this->Monitoring_model->getAllItAsset();
        $data['itasset'] = $this->Monitoring_model->getItAsset();

        $this->load->view('templatesSuperAdmin/header', $data);
        $this->load->view('templatesSuperAdmin/sidebar');
        $this->load->view('superadmin/itasset', $data);
        $this->load->view('templatesSuperAdmin/footer');
    }

    public function tambahData()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['title'] = "Tambah Data IT Asset";
        $this->load->view('templatesSuperAdmin/header', $data);
        $this->load->view('templatesSuperAdmin/sidebar');
        $this->load->view('superadmin/formTambahItAsset', $data);
        $this->load->view('templatesSuperAdmin/footer');
    }
    public function tambahDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $id                 = $this->input->post('id');
            $asset_number       = $this->input->post('asset_number');
            $asset_description  = $this->input->post('asset_description');
            $serial_number      = $this->input->post('serial_number');
            $model              = $this->input->post('model');
            $location           = $this->input->post('location');
            $photo              = $_FILES['photo']['name'];
            if ($photo = '') {
            } else {
                $config['upload_path']  = './assets/team';
                $config['allowed_types']  = 'jpg|jpeg|png|tiff';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('photo')) {
                    $photo = $this->upload->data('file_name');
                }
            }
            $mac_address        = $this->input->post('mac_address');
            $ip_address         = $this->input->post('ip_address');
            $latitude           = $this->input->post('latitude');
            $longitude          = $this->input->post('longitude');

            $data = array(

                'asset_number'      => $asset_number,
                'asset_description' => $asset_description,
                'serial_number'     => $serial_number,
                'model'             => $model,
                'location'          => $location,
                'photo'             => $photo,
                'mac_address'       => $mac_address,
                'ip_address'        => $ip_address,
                'latitude'          => $latitude,
                'longitude'         => $longitude,
            );

            $this->Monitoring_model->insert_data($data, 'it_asset');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            </div>');
            redirect('superadmin/itasset');
        }
    }

    public function updateData($id)
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();
        $data['itasset'] = $this->db->query("SELECT * FROM it_asset WHERE id='$id'")->result(); //result berfungsi untuk menggenerate/menampung/menampilkan query(data)
        $data['title'] = "Update Data IT Asset";
        $this->load->view('templatesSuperAdmin/header', $data);
        $this->load->view('templatesSuperAdmin/sidebar');
        $this->load->view('superadmin/formUpdateItAsset', $data);
        $this->load->view('templatesSuperAdmin/footer');
    }

    public function updateDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            redirect('superadmin/itasset');
        } else {
            $id                 = $this->input->post('id');
            $asset_number       = $this->input->post('asset_number');
            $asset_description  = $this->input->post('asset_description');
            $serial_number      = $this->input->post('serial_number');
            $model              = $this->input->post('model');
            $location           = $this->input->post('location');
            $photo              = $_FILES['photo']['name'];
            if ($photo = '') {
            } else {
                $config['upload_path']  = './assets/team';
                $config['allowed_types']  = 'jpg|jpeg|png|tiff';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('photo')) {
                    $photo = $this->upload->data('file_name');
                }
            }
            $mac_address        = $this->input->post('mac_address');
            $ip_address         = $this->input->post('ip_address');
            $latitude           = $this->input->post('latitude');
            $longitude          = $this->input->post('longitude');

            $data = array(
                'asset_number'      => $asset_number,
                'asset_description' => $asset_description,
                'serial_number'     => $serial_number,
                'model'             => $model,
                'location'          => $location,
                'photo'             => $photo,
                'mac_address'       => $mac_address,
                'ip_address'        => $ip_address,
                'latitude'          => $latitude,
                'longitude'         => $longitude,


            );
            $where = array(
                'id' => $id
            );

            $this->Monitoring_model->update_data('it_asset', $data, $where);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong></div>');
            redirect('superadmin/itasset');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('asset_number', 'Asset Number', 'required');
        $this->form_validation->set_rules('serial_number', 'Serial Number', 'required');
        $this->form_validation->set_rules('asset_description', 'Asset Description', 'required');
    }

    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->Monitoring_model->delete_data($where, 'it_asset');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong></div>');
        redirect('superadmin/itasset');
    }

    public function download()
    {
        $data['title'] = "DATA IT ASSET";
        $data['itasset'] = $this->Monitoring_model->getItAsset();
        $this->load->view('superadmin/downloadItAsset', $data);
    }
}
