<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class TaskList extends CI_Controller
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

        $data['title'] = "Task List";
        $data['title2'] = "Plant Citeureup";

        $data['task_list'] = $this->Monitoring_model->getAllTaskList();

        $this->load->view('templatesAdmin/header', $data);
        $this->load->view('templatesAdmin/sidebar');
        $this->load->view('admin/tasklist', $data);
        $this->load->view('templatesAdmin/footer');
    }
    public function export_csv()
    {
        $data['title'] = "Data Task List ITOS-CTR";
        $data['task_list'] = $this->Monitoring_model->getAllTaskList();
        $this->load->view('admin/exportTaskList', $data);
    }


    public function tambahData()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('requester', 'requester', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('due_date', 'Due Date', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Data Task List";
            $this->load->view('templatesAdmin/header', $data);
            $this->load->view('templatesAdmin/sidebar');
            $this->load->view('admin/formTambahTaskList', $data);
            $this->load->view('templatesAdmin/footer');
        } else {
            $data = [
                'description'                   => $this->input->post('description'),
                'requester'                     => $this->input->post('requester'),
                'start_date'                    => $this->input->post('start_date'),
                'due_date'                      => $this->input->post('due_date'),
                'status'                        => $this->input->post('status'),
                'notes'                         => $this->input->post('notes'),

            ];

            $this->db->insert('task_list', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Task List Berhasil Ditambahkan!</strong>
            </div>');
            redirect('admin/tasklist');
        }
    }

    public function updateData($id)
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['task_list'] = $this->db->query("SELECT * FROM task_list WHERE id='$id'")->result(); //result berfungsi untuk menggenerate/menampung/menampilkan query(data)
        $data['title'] = "Update Task List ITOS-CTR";
        $this->load->view('templatesAdmin/header', $data);
        $this->load->view('templatesAdmin/sidebar');
        $this->load->view('admin/formUpdateTaskList', $data);
        $this->load->view('templatesAdmin/footer');
    }

    public function updateDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            redirect('admin/tasklist');
        } else {
            $id             = $this->input->post('id');
            $description    = $this->input->post('description');
            $requester      = $this->input->post('requester');
            $start_date     = $this->input->post('start_date');
            $due_date       = $this->input->post('due_date');
            $status         = $this->input->post('status');
            $notes          = $this->input->post('notes');


            $data = array(
                'description'   => $description,
                'requester'     => $requester,
                'start_date'    => $start_date,
                'due_date'      => $due_date,
                'status'        => $status,
                'notes'         => $notes,
            );
            $where = array(
                'id' => $id
            );

            $this->Monitoring_model->update_data('task_list', $data, $where);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong></div>');
            redirect('admin/tasklist');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('requester', 'requester', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('due_date', 'Due Date', 'required');
    }

    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->Monitoring_model->delete_data($where, 'task_list');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong></div>');
        redirect('admin/tasklist');
    }

    public function download()
    {
        $data['title'] = "DATA TASK LIST";
        $data['task_list'] = $this->Monitoring_model->getAllTaskList();
        $this->load->view('admin/downloadTaskList', $data);
    }
}
