<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Dashboard extends CI_Controller
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
        $data['title'] = "Dashboard Monitoring"; //untuk title pada dasboard
        $data['title2'] = "Plant Citeureup";



        $superadmin = $this->db->query("SELECT * FROM user WHERE role_id = '1'");
        $data['superadmin'] = $superadmin->num_rows();
        $admin = $this->db->query("SELECT * FROM user WHERE role_id = '2'");
        $data['admin'] = $admin->num_rows();

        $task_list = $this->db->query("SELECT * FROM task_list");
        $data['task_list'] = $task_list->num_rows();

        $logbook = $this->db->query("SELECT * FROM logbook");
        $data['logbook'] = $logbook->num_rows();

        $accesspoint = $this->db->query("SELECT * FROM access_point");
        $data['accesspoint'] = $accesspoint->num_rows();
        $ipstatic = $this->db->query("SELECT * FROM ipstatic");
        $data['ipstatic'] = $ipstatic->num_rows();
        $switch = $this->db->query("SELECT * FROM switchpoint");
        $data['switch'] = $switch->num_rows();

        $itot_asset = $this->db->query("SELECT * FROM it_asset");
        $data['itot_asset'] = $itot_asset->num_rows();

        $ot_asset = $this->db->query("SELECT * FROM ot_asset");
        $data['ot_asset'] = $ot_asset->num_rows();

        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();


        $id = $this->session->userdata('id');
        $this->load->model('Monitoring_model', 'monitoring');

        $data['mappingnetwork'] = $this->monitoring->getAllSwitchPoint();
        $data['mappingnetworkap'] = $this->monitoring->getAllAccessPoint();
        $data['ipstatic2'] = $this->monitoring->getAllIpStatic();
        $data['mappingitotasset'] = $this->monitoring->getAllItAsset();
        $data['mappingotasset'] = $this->monitoring->getAllOtAsset();





        // berfungsi untuk memanggil view, yang berguna untuk menata file url
        $this->load->view('templatesSuperAdmin/header', $data);
        $this->load->view('templatesSuperAdmin/sidebar');
        $this->load->view('superadmin/dashboard', $data);
        $this->load->view('templatesSuperAdmin/footer');
    }
}
