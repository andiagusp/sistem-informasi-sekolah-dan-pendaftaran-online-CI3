<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf');
		$this->load->model('Admn_model', 'adm');
		$this->load->model('Daftar_model', 'daftar');
		$this->session->userdata('username');
		$this->session->userdata('level');
		cetak_log();
	}

	public function cetak_siswa()
	{
		$data['siswa'] = $this->adm->getSiswa();
		$this->load->view('cetak/cetak_siswa', $data);
	}

	public function ket_daftar($id_daftar, $no_daftar)
	{
		$data['daftar'] = $this->daftar->getCetakDaftar($id_daftar, $no_daftar);
		$this->load->view('cetak/ket_daftar', $data);
	}

	public function bukti_bayar($id_pembayaran, $no_daftar)
	{
		$data['bayar'] = $this->adm->getDetailBayar($id_pembayaran, $no_daftar);

		$exp = explode('.', $data['bayar']['foto']);
		$data['ext'] = strtoupper($exp[1]);
		$this->load->view('cetak/bukti_bayar', $data);
	}

	public function cetak_pendaftaran($id_daftar, $no_daftar)
	{
		$data['daftar'] = $this->daftar->getCetakDaftar($id_daftar, $no_daftar);

		$this->load->view('cetak/cetak_lengkap', $data);
	}
}