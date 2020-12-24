<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function getUserLogRes($data)
	{
		$this->db->select('*');
		$this->db->join('tabel_jurusan', 'id_jurusan_daftar = id_jurusan', 'Left');
		$this->db->where('no_daftar', $data['no_daftar']);
		$this->db->where('email', $data['email']);
		return $this->db->get('pendaftaran')->row_array();
	}

	public function getCetakDaftar($id_daftar, $no_daftar)
	{
		$this->db->select('*');
		$this->db->join('tabel_jurusan', 'id_jurusan_daftar = id_jurusan', 'Left');
		$this->db->where('id_daftar', $id_daftar);
		$this->db->where('no_daftar', $no_daftar);
		return $this->db->get('pendaftaran')->row_array();
	}

	public function getDataPembayaran($data)
	{
		$this->db->where('no_daftar_pembayaran', $data['no_daftar']);
		$this->db->where('email', $data['email']);
		return $this->db->get('tabel_pembayaran')->result_array();
	}

	public function getJurusan()
	{
		return $this->db->get('tabel_jurusan')->result_array();
	}

	public function setUploadBayar($data)
	{
		$this->db->insert('tabel_pembayaran', $data);
	}

	public function setDaftar()
	{
		$this->db->select_max('no_daftar');
		$result =  $this->db->get('pendaftaran')->row_array();

		$exp = explode('-', $result['no_daftar']);
		$s = $exp[0];
		$n = $exp[1] + 1;
		$r = sprintf('%03s', $n);
		$no_daftar = $s.'-'.$r;

		$data = [
			'id_daftar' => '',
			'no_daftar' => $no_daftar,
			'tanggal_daftar' => date('d-m-Y H:i:s'),
			'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', TRUE)),
			'nama_panggilan' => htmlspecialchars($this->input->post('nama_panggilan', TRUE)),
			'nisn' => htmlspecialchars($this->input->post('nisn', TRUE)),
			'no_kartu_kes' => htmlspecialchars($this->input->post('no_kartu_kes', TRUE)),
			'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', TRUE)),
			'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', TRUE)),
			'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', TRUE)),
			'agama' => htmlspecialchars($this->input->post('agama', TRUE)),
			'email' => htmlspecialchars($this->input->post('email', TRUE)),
			'kewarganegaraan' => htmlspecialchars($this->input->post('kewarganegaraan', TRUE)),
			'anakke' => htmlspecialchars($this->input->post('anakke', TRUE)),
			'jumlah_saudara' => htmlspecialchars($this->input->post('jumlah_saudara', TRUE)),
			'status_anak' => htmlspecialchars($this->input->post('status_anak', TRUE)),
			'bahasa' => htmlspecialchars($this->input->post('bahasa', TRUE)),
			'id_jurusan_daftar' => htmlspecialchars($this->input->post('jurusan', TRUE)),
			'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
			'telepon' => htmlspecialchars($this->input->post('telepon', TRUE)),
			'tinggal_dengan' => htmlspecialchars($this->input->post('tinggal_dengan', TRUE)),
			'jarak' => htmlspecialchars($this->input->post('jarak', TRUE)),
			'kendaraan' => htmlspecialchars($this->input->post('kendaraan', TRUE)),
			'berat_badan' => htmlspecialchars($this->input->post('berat_badan', TRUE)),
			'tinggi_badan' => htmlspecialchars($this->input->post('tinggi_badan', TRUE)),
			'golongan_darah' => htmlspecialchars($this->input->post('golongan_darah', TRUE)),
			'kegemaran' => htmlspecialchars($this->input->post('kegemaran', TRUE)),
			'asal_sekolah' => htmlspecialchars($this->input->post('asal_sekolah', TRUE)),
			'alamat_sekolah' => htmlspecialchars($this->input->post('alamat_sekolah', TRUE)),
			'no_ijazah' => htmlspecialchars($this->input->post('no_ijazah', TRUE)),
			'no_skhun' => htmlspecialchars($this->input->post('no_skhun', TRUE)),
			'nama_ayah' => htmlspecialchars($this->input->post('nama_ayah', TRUE)),
			'nama_ibu' => htmlspecialchars($this->input->post('nama_ibu', TRUE)),
			'tempat_lahir_ayah' => htmlspecialchars($this->input->post('tempat_lahir_ayah', TRUE)),
			'tempat_lahir_ibu' => htmlspecialchars($this->input->post('tempat_lahir_ibu', TRUE)),
			'tanggal_lahir_ayah' => htmlspecialchars($this->input->post('tanggal_lahir_ayah', TRUE)),
			'tanggal_lahir_ibu' => htmlspecialchars($this->input->post('tanggal_lahir_ibu', TRUE)),
			'kewarganegaraan_ayah' => htmlspecialchars($this->input->post('kewarganegaraan_ayah', TRUE)),
			'kewarganegaraan_ibu' => htmlspecialchars($this->input->post('kewarganegaraan_ibu', TRUE)),
			'pendidikan_ayah' => htmlspecialchars($this->input->post('pendidikan_ayah', TRUE)),
			'pendidikan_ibu' => htmlspecialchars($this->input->post('pendidikan_ibu', TRUE)),
			'pekerjaan_ayah' => htmlspecialchars($this->input->post('pekerjaan_ayah', TRUE)),
			'pekerjaan_ibu' => htmlspecialchars($this->input->post('pekerjaan_ibu', TRUE)),
			'penghasilan_ayah' => htmlspecialchars($this->input->post('penghasilan_ayah', TRUE)),
			'penghasilan_ibu' => htmlspecialchars($this->input->post('penghasilan_ibu', TRUE)),
			'alamat_ayah' => htmlspecialchars($this->input->post('alamat_ayah', TRUE)),
			'alamat_ibu' => htmlspecialchars($this->input->post('alamat_ibu', TRUE)),
			'status_bayar' => 'belum lunas',
			'role' => 'cpdb'
		];
		$this->db->insert('pendaftaran', $data);
	}
}
