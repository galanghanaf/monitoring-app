<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class OtAsset extends CI_Controller
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

        $data['title'] = "OT Asset";
        $data['title2'] = "Plant Citeureup";

        $data['mapotasset'] = $this->Monitoring_model->getAllOtAsset();
        $data['otasset'] = $this->Monitoring_model->getOtAsset();

        $this->load->view('templatesAdmin/header', $data);
        $this->load->view('templatesAdmin/sidebar');
        $this->load->view('admin/otasset', $data);
        $this->load->view('templatesAdmin/footer');
    }

    public function tambahData()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();
        $data['title'] = "Tambah Data OT Asset";

        $this->load->view('templatesAdmin/header', $data);
        $this->load->view('templatesAdmin/sidebar');
        $this->load->view('admin/formTambahOtAsset', $data);
        $this->load->view('templatesAdmin/footer');
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
            $this->Monitoring_model->insert_data($data, 'ot_asset');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            </div>');
            redirect('admin/otasset');
        }
    }

    public function updateData($id)
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();
        $data['otasset'] = $this->db->query("SELECT * FROM ot_asset WHERE id='$id'")->result(); //result berfungsi untuk menggenerate/menampung/menampilkan query(data)

        $data['title'] = "Update Data OT Asset";
        $this->load->view('templatesAdmin/header', $data);
        $this->load->view('templatesAdmin/sidebar');
        $this->load->view('admin/formUpdateOtAsset', $data);
        $this->load->view('templatesAdmin/footer');
    }

    public function updateDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            redirect('admin/otasset');
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


            $this->Monitoring_model->update_data('ot_asset', $data, $where);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong></div>');
            redirect('admin/otasset');
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
        $this->Monitoring_model->delete_data($where, 'ot_asset');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong></div>');
        redirect('admin/otasset');
    }

    public function download()
    {
        $data['title'] = "DATA OT ASSET";
        $data['otasset'] = $this->Monitoring_model->getOtAsset();
        $this->load->view('admin/downloadOtAsset', $data);
    }
}
