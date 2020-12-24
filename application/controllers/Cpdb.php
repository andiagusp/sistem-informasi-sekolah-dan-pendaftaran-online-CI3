<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpdb extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->session->userdata('id_daftar');
		$this->session->userdata('no_daftar');
		$this->session->userdata('email');
		$this->session->userdata('level');
		$this->load->model('Daftar_model', 'daftar');
		cek_log_cpdb();
		if($this->session->userdata('level') != 'cpdb')
		{
			redirect('Login/block');
		}
	}

	public function index()
	{
		$data['title'] = 'Halaman CPDB';
		$log = ['no_daftar' => $this->session->userdata('no_daftar'), 'email' => $this->session->userdata('email')];
		$data['user'] = $this->daftar->getUserLogRes($log);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_cpdb', $data);
		$this->load->view('templates/topbar_cpdb', $data);
		$this->load->view('daftar/index', $data);
		$this->load->view('templates/footer');
	}

	public function detail_cpdb()
	{
		$data['title'] = 'Halaman CPDB';
		$log = ['no_daftar' => $this->session->userdata('no_daftar'), 'email' => $this->session->userdata('email')];
		$data['user'] = $this->daftar->getUserLogRes($log);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_cpdb', $data);
		$this->load->view('templates/topbar_cpdb', $data);
		$this->load->view('daftar/detail_cpdb', $data);
		$this->load->view('templates/footer');
	}

	public function upload_bayar()
	{
		$data['title'] = 'Halaman CPDB';
		$log = ['no_daftar' => $this->session->userdata('no_daftar'), 'email' => $this->session->userdata('email')];
		$data['user'] = $this->daftar->getUserLogRes($log);

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('no_daftar', 'no daftar', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|numeric');
		$this->form_validation->set_rules('jenis_bayar', 'jenis bayar', 'trim|required');

		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_cpdb', $data);
			$this->load->view('templates/topbar_cpdb', $data);
			$this->load->view('daftar/upload_bayar', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$i = $data['user']['id_daftar'];
			$n = htmlspecialchars($this->input->post('nama', TRUE));
			$d = htmlspecialchars($this->input->post('no_daftar', TRUE));
			$e = htmlspecialchars($this->input->post('email', TRUE));
			$t = htmlspecialchars($this->input->post('telepon', TRUE));
			$j = htmlspecialchars($this->input->post('jenis_bayar', TRUE));
			$f = $_FILES['foto']['name'];

			if($f)
			{
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = '1024';
				$config['upload_path'] = './assets/img/upload/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto'))
				{
					$foto = $this->upload->data('file_name');

					$data = [
						'id_pembayaran' => '',
						'id_daftar_pembayaran' => $i,
						'no_daftar_pembayaran' => $d,
						'nama_lengkap_pembayaran' => $n,
						'email' => $e,
						'telepon' => $t,
						'jenis_bayar' => $j,
						'tanggal_bayar' => date('d - m - Y H:i:s'),
						'konfirm_status' => 'belum konfirmasi',
						'foto' => $foto
					];
					$this->daftar->setUploadBayar($data);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">file telah berhasil diupload tunggu 3x24 jam<a href="#" class="alert-link"></a></div>');
					redirect('cpdb/riwayat_bayar');
				}
				else
				{
					$this->load->view('templates/header', $data);
					$this->load->view('templates/sidebar_cpdb', $data);
					$this->load->view('templates/topbar_cpdb', $data);
					echo $this->upload->display_errors();
					$this->load->view('templates/footer');
				}
			}
		}
	}

	public function riwayat_bayar()
	{
		$data['title'] = 'Halaman CPDB';
		$log = ['no_daftar' => $this->session->userdata('no_daftar'), 'email' => $this->session->userdata('email')];
		$data['user'] = $this->daftar->getUserLogRes($log);
		$data['bayar'] = $this->daftar->getDataPembayaran($log);	

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_cpdb', $data);
		$this->load->view('templates/topbar_cpdb', $data);
		$this->load->view('daftar/riwayat_bayar', $data);
		$this->load->view('templates/footer');
	}


}