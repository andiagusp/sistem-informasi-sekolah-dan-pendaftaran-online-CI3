<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->session->userdata('username');
		$this->session->userdata('level');
		$this->load->model('Siswa_model', 'siswa');
		cek_log();
		if($this->session->userdata('level') != 3)
		{
			redirect('Login/block');
		}
	}

	public function index()
	{
		$data['title'] = 'Halaman Siswa';
		$data['user'] = $this->siswa->getSiswaLog($this->session->userdata('username'));
		$data['jadwal'] =  $this->siswa->getJadwalSiswa($data['user']['id_kelas_siswa']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_siswa', $data);
		$this->load->view('templates/topbar_siswa', $data);
		$this->load->view('siswa/index', $data);
		$this->load->view('templates/footer');
	}

	public function profile_siswa()
	{
		$data['title'] = 'Halaman Siswa';
		$data['user'] = $this->siswa->getSiswaLog($this->session->userdata('username'));

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_siswa', $data);
		$this->load->view('templates/topbar_siswa', $data);
		$this->load->view('siswa/profile_siswa', $data);
		$this->load->view('templates/footer');
	}

	public function pelajaran_siswa()
	{
		$data['title'] = 'Halaman Siswa';
		$data['user'] = $this->siswa->getSiswaLog($this->session->userdata('username'));
		$data['pelajaran'] = $this->siswa->getPelajaranSiswa($data['user']['id_kelas_siswa']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_siswa', $data);
		$this->load->view('templates/topbar_siswa', $data);
		$this->load->view('siswa/pelajaran_siswa', $data);
		$this->load->view('templates/footer');
	}

	public function jadwal_siswa()
	{
		$data['title'] = 'Halaman Siswa';
		$data['user'] = $this->siswa->getSiswaLog($this->session->userdata('username'));
		$data['jadwal'] = $this->siswa->getJadwalSiswa($data['user']['id_kelas_siswa']);
		$data['kelas'] = $this->siswa->getKelasSiswa();
		$data['hari'] = [1,2,3,4,5,6,7];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_siswa', $data);
		$this->load->view('templates/topbar_siswa', $data);
		$this->load->view('siswa/jadwal_siswa', $data);
		$this->load->view('templates/footer');
	}

	public function jadwal_hari($hari)
	{
		$data['title'] = 'Halaman Siswa';
		$data['user'] = $this->siswa->getSiswaLog($this->session->userdata('username'));
		$data['jadwal'] = $this->siswa->getJadwalByHari($hari, $data['user']['id_kelas_siswa']);
		$data['kelas'] = $this->siswa->getKelasSiswa();
		$data['hari'] = [1,2,3,4,5,6,7];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_siswa', $data);	
		$this->load->view('templates/topbar_siswa', $data);	
		$this->load->view('siswa/jadwal_hari', $data);
		$this->load->view('templates/footer');
	}

	public function nilai()
	{
		$data['title'] = 'Halaman Siswa';
		$data['user'] = $this->siswa->getSiswaLog($this->session->userdata('username'));
		$data['nilai'] = $this->siswa->getNilai($data['user']['nis']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_siswa', $data);	
		$this->load->view('templates/topbar_siswa', $data);	
		$this->load->view('siswa/nilai', $data);
		$this->load->view('templates/footer');
	}

}
/*
|	Close Class
*/