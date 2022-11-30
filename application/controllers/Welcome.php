<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Welcome extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}



	public function index()
	{
		if ($this->session->userdata('role_id') == '1') {
			redirect('superadmin/dashboard');
		} elseif ($this->session->userdata('role_id') == '2') {
			redirect('admin/dashboard');
		}


		$this->load->model('Monitoring_model', 'monitoring');
		$data['title'] = "PT Tirta Investama";
		$data['title2'] = "Plant Citeureup";

		$superadmin = $this->db->query("SELECT * FROM user WHERE role_id = '1'");
		$data['superadmin'] = $superadmin->num_rows();
		$admin = $this->db->query("SELECT * FROM user WHERE role_id != '1'");
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

		$it_asset = $this->db->query("SELECT * FROM it_asset");
		$data['it_asset'] = $it_asset->num_rows();

		$ot_asset = $this->db->query("SELECT * FROM ot_asset");
		$data['ot_asset'] = $ot_asset->num_rows();


		$data['mappingitotasset'] = $this->monitoring->getAllItAsset();
		$data['mappingotasset'] = $this->monitoring->getAllOtAsset();




		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('welcome', $data);
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			if ($user['is_active'] == 1) {
				if ($password == $user['password']) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('superadmin/dashboard');
					} else {
						redirect('admin/dashboard');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Password anda salah!</strong>
            </div>');
					redirect('welcome');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Email anda tidak terdaftar!</strong>
            </div>');
				redirect('welcome');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Email anda tidak terdaftar!</strong>
            </div>');
			redirect('welcome');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Anda berhasil keluar!</strong>
        </div>');
		redirect('welcome');
	}
}
