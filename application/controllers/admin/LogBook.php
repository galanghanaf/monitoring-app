<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class LogBook extends CI_Controller
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

        $data['title'] = "Log Book IT Equipment";
        $data['title2'] = "Plant Citeureup";

        $data['logbook'] = $this->Monitoring_model->getAllLogBook();

        $this->load->view('templatesAdmin/header', $data);
        $this->load->view('templatesAdmin/sidebar');
        $this->load->view('admin/logbook', $data);
        $this->load->view('templatesAdmin/footer');
    }
    public function export_csv()
    {
        $data['title'] = "Data Log Book IT Equipment";
        $data['logbook'] = $this->Monitoring_model->getAllLogBook();
        $this->load->view('admin/exportLogBook', $data);
    }

    public function tambahData()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('equipment', 'Equipment', 'required');
        $this->form_validation->set_rules('asset_number', 'Asset Number', 'required');
        $this->form_validation->set_rules('serial_number', 'Serial Number', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Data Log Book";
            $this->load->view('templatesAdmin/header', $data);
            $this->load->view('templatesAdmin/sidebar');
            $this->load->view('admin/formTambahLogBook', $data);
            $this->load->view('templatesAdmin/footer');
        } else {
            $data = [
                'name'                          => $this->input->post('name'),
                'department'                    => $this->input->post('department'),
                'equipment'                     => $this->input->post('equipment'),
                'asset_number'                  => $this->input->post('asset_number'),
                'serial_number'                 => $this->input->post('serial_number'),
                'description'                   => $this->input->post('description'),
                'date'                          => $this->input->post('date'),
                'return'                        => $this->input->post('return'),
            ];

            $this->db->insert('logbook', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Log Book Berhasil Ditambahkan!</strong>
            </div>');
            redirect('admin/logbook');
        }
    }

    public function updateData($id)
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();
        $data['logbook'] = $this->db->query("SELECT * FROM logbook WHERE id='$id'")->result(); //result berfungsi untuk menggenerate/menampung/menampilkan query(data)
        $data['title'] = "Update Log Book IT Equipment";
        $this->load->view('templatesAdmin/header', $data);
        $this->load->view('templatesAdmin/sidebar');
        $this->load->view('admin/formUpdateLogBook', $data);
        $this->load->view('templatesAdmin/footer');
    }

    public function updateDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            redirect('admin/logbook');
        } else {
            $id             = $this->input->post('id');
            $name           = $this->input->post('name');
            $department     = $this->input->post('department');
            $equipment      = $this->input->post('equipment');
            $asset_number   = $this->input->post('asset_number');
            $serial_number  = $this->input->post('serial_number');
            $description    = $this->input->post('description');
            $date           = $this->input->post('date');
            $return         = $this->input->post('return');

            $data = array(
                'name'          => $name,
                'department'    => $department,
                'equipment'     => $equipment,
                'asset_number'  => $asset_number,
                'serial_number' => $serial_number,
                'description'   => $description,
                'date'          => $date,
                'return'        => $return,


            );
            $where = array(
                'id' => $id
            );

            $this->Monitoring_model->update_data('logbook', $data, $where);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong></div>');
            redirect('admin/logbook');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('equipment', 'Equipment', 'required');
        $this->form_validation->set_rules('asset_number', 'Asset Number', 'required');
        $this->form_validation->set_rules('serial_number', 'Serial Number', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
    }

    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->Monitoring_model->delete_data($where, 'logbook');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong></div>');
        redirect('admin/logbook');
    }

    public function download()
    {
        $data['title'] = "DATA LOG BOOK IT EQUIPMENT";
        $data['logbook'] = $this->Monitoring_model->getAllLogBook();
        $this->load->view('admin/downloadLogBook', $data);
    }
}
