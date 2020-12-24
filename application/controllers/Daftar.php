<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('Daftar_model', 'daftar');
	}

	public function daftar_baru()
	{
		$data['title'] = 'Form Pendaftaran Siswa';
		$data['jurusan'] = $this->daftar->getJurusan();

		$this->form_validation->set_rules('nama_lengkap', 'Nama lengkap', 'trim|required');
		$this->form_validation->set_rules('nama_panggilan', 'Nama panggilan', 'trim|required');
		$this->form_validation->set_rules('nisn', 'Nisn', 'trim|required|numeric');
		$this->form_validation->set_rules('no_kartu_kes', 'No kartu kesehatan', 'trim|required|numeric');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
		$this->form_validation->set_rules('anakke', 'Anak ke', 'trim|required');
		$this->form_validation->set_rules('jumlah_saudara', 'Jumlah saudara', 'trim|required');
		$this->form_validation->set_rules('status_anak', 'Status anak', 'trim|required');
		$this->form_validation->set_rules('bahasa', 'Bahasa', 'trim|required');
		$this->form_validation->set_rules('id_jurusan_daftar', 'Id jurusan daftar', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required|numeric');
		$this->form_validation->set_rules('tinggal_dengan', 'Tinggal dengan', 'trim|required');
		$this->form_validation->set_rules('jarak', 'Jarak', 'trim|required');
		$this->form_validation->set_rules('kendaraan', 'Kendaraan', 'trim|required');
		$this->form_validation->set_rules('berat_badan', 'Berat badan', 'trim|required');
		$this->form_validation->set_rules('tinggi_badan', 'Tinggi badan', 'trim|required');
		$this->form_validation->set_rules('golongan_darah', 'Golongan darah', 'trim|required');
		$this->form_validation->set_rules('kegemaran', 'Kegemaran', 'trim|required');
		$this->form_validation->set_rules('asal_sekolah', 'Asal sekolah', 'trim|required');
		$this->form_validation->set_rules('alamat_sekolah', 'Alamat sekolah', 'trim|required');
		$this->form_validation->set_rules('no_ijazah', 'No ijazah', 'trim|required');
		$this->form_validation->set_rules('no_skhun', 'No SKHUN', 'trim|required');
		$this->form_validation->set_rules('nama_ayah', 'Nama ayah', 'trim|required');
		$this->form_validation->set_rules('nama_ibu', 'Nama ibu', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir_ayah', 'Tempat lahir ayah', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir_ibu', 'Tempat lahir ibu', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir_ayah', 'Tanggal lahir ayah', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir_ibu', 'Tanggal lahir ibu', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan_ayah', 'Kewarganegaraan ayah', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan_ibu', 'Kewarganegaraan ibu', 'trim|required');
		$this->form_validation->set_rules('pendidikan_ayah', 'Pendidikan ayah', 'trim|required');
		$this->form_validation->set_rules('pendidikan_ibu', 'Pendidikan ibu', 'trim|required');
		$this->form_validation->set_rules('pekerjaan_ayah', 'Pekerjaan ayah', 'trim|required');
		$this->form_validation->set_rules('pekerjaan_ibu', 'Pekerjaan ibu', 'trim|required');
		$this->form_validation->set_rules('penghasilan_ayah', 'Penghasilan ayah', 'trim|required');
		$this->form_validation->set_rules('penghasilan_ibu', 'Penghasilan ibu', 'trim|required');
		$this->form_validation->set_rules('alamat_ayah', 'Alamat ayah', 'trim|required');
		$this->form_validation->set_rules('alamat_ibu', 'Alamat ibu', 'trim|required');


		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header_log', $data);
			$this->load->view('daftar/daftar');
			$this->load->view('templates/footer_log');
		}
		else
		{
			$this->daftar->setDaftar();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil mendaftar silahkan klik pada huruf tebal untuk akses login sementara <a href="'.base_url("pdb/login_pdb").'" class="alert-link"><strong>Silahkan Klik Link Ini Untuk Login Ke Halaman Calon Siswa</strong></a></div>');
			redirect('daftar/daftar_baru');
		}
	}

}