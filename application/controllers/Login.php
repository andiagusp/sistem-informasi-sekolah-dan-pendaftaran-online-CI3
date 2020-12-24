<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model', 'login');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('status');
	}

	public function index()
	{
		$data['title'] = 'Halaman Login';

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('pasword', 'Pasword', 'trim|required');


		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header_log', $data);
			$this->load->view('login/login');
			$this->load->view('templates/footer_log');
		}
		else
		{
			$this->__login_cek();
		}
	}

	public function log_admn()
	{
		$data['title'] = 'Halaman Login Admn';

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('pasword', 'Pasword', 'trim|required');

		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header_log', $data);
			$this->load->view('login/log_admn');
			$this->load->view('templates/footer_log');
		}
		else
		{
			$this->__cek__admin__log();
		}		
	}

	private function __cek__admin__log()
	{
		$u = htmlspecialchars($this->input->post('username', TRUE));
		$p = htmlspecialchars($this->input->post('pasword', TRUE));

		$data = $this->login->getAdminLog($u);
		if(!empty($data))
		{
			if($data['status'] == 1)
			{
				if(password_verify($p, $data['password']))
				{
					$s =['username' => $data['username'], 'level' => $data['level']];
					$this->session->set_userdata($s);
					redirect('admn');
				}
				else
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Anda Salah<a href="#" class="alert-link"></a></div>');
					redirect('login/log_admn');
				}
			}
			else
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak Aktif<a href="#" class="alert-link"></a></div>');
				redirect('login/log_admn');
			}
		}
		else
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak Ada<a href="#" class="alert-link"></a></div>');
			redirect('login/log_admn');
		}

	}

	private function __login_cek()
	{
		$u = htmlspecialchars($this->input->post('username', TRUE));
		$p = htmlspecialchars($this->input->post('pasword', TRUE));

		$data = $this->login->getUserLog($u);

		if(!empty($data))
		{
			if($data['status'] == 1)
			{
				if(password_verify($p, $data['pasword']))
				{
					$s =['username' => $data['username'], 'level' => $data['level']];
					$this->session->set_userdata($s);

					if($data['level'] == 2){redirect('guru');}
					elseif($data['level'] == 3){redirect('siswa');}
				}
				else
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Anda Salah<a href="#" class="alert-link"></a></div>');
					redirect('login/index');
				}
			}
			else
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak Aktif<a href="#" class="alert-link"></a></div>');
				redirect('login/index');
			}
		}
		else
		{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak Ada<a href="#" class="alert-link"></a></div>');
			redirect('login/index');
		}
	}

	public function block()
	{
		$data['level'] = $this->session->userdata('level');
		$data['title'] = 'block';

		$this->load->view('templates/header_log', $data);
		$this->load->view('login/block', $data);
		$this->load->view('templates/footer_log');
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('status');
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Telah Logout<a href="#" class="alert-link"></a></div>');
		redirect('login');
	}
}