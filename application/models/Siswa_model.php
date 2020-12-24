<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function getSiswaLog($nis)
	{
		$this->db->select('nis, nama_lengkap_siswa, nama_panggilan_siswa, id_kelas_siswa, id_jurusan_siswa, tempat_lahir_siswa, tanggal_lahir_siswa, jenis_kelamin_siswa, agama_siswa, alamat_siswa, telepon_siswa, nama_ayah_siswa, nama_ibu_siswa, tahun_ajaran, id_kelas, id_jurusan, kelas, jurusan');
		$this->db->join('tabel_kelas', 'id_kelas_siswa = id_kelas', 'LEFT');
		$this->db->join('tabel_jurusan', 'id_jurusan_siswa = id_jurusan', 'LEFT');
		$this->db->where('nis', $nis);
		return $this->db->get('tabel_siswa')->row_array();
	}

	public function getPelajaranSiswa()
	{
		return $this->db->get('tabel_pelajaran')->result_array();
	}

	public function getJadwalSiswa($id_kelas_jadwal)
	{
		$this->db->select('id_jadwal, hari, id_kelas_jadwal, id_pelajaran_jadwal, nip_guru, jam_mulai, jam_selesai, kelas, pelajaran, kkm, nama_guru, nip, akronim');
		$this->db->join('tabel_kelas', 'id_kelas_jadwal = id_kelas', 'LEFT');
		$this->db->join('tabel_pelajaran', 'id_pelajaran_jadwal = id_pelajaran', 'LEFT');
		$this->db->join('tabel_guru', 'nip_guru = nip', 'LEFT');
		$this->db->order_by('hari', 'ASC');
		$this->db->order_by('kelas', 'ASC');
		$this->db->order_by('jam_mulai', 'ASC');
		$this->db->where('id_kelas_jadwal', $id_kelas_jadwal);
		$this->db->where('hari', cek_hari(date('D')));
		return $this->db->get('tabel_jadwal')->result_array();
	}

	public function getJadwalByHari($hari, $id_kelas_siswa)
	{
		$this->db->select('id_jadwal, hari, id_kelas_jadwal, id_pelajaran_jadwal, nip_guru, jam_mulai, jam_selesai, kelas, pelajaran, kkm, nama_guru, nip, akronim');
		$this->db->join('tabel_kelas', 'id_kelas_jadwal = id_kelas', 'LEFT');
		$this->db->join('tabel_pelajaran', 'id_pelajaran_jadwal = id_pelajaran', 'LEFT');
		$this->db->join('tabel_guru', 'nip_guru = nip', 'LEFT');
		$this->db->order_by('hari', 'ASC');
		$this->db->order_by('kelas', 'ASC');
		$this->db->order_by('jam_mulai', 'ASC');
		$this->db->where('id_kelas_jadwal', $id_kelas_siswa);
		$this->db->where('hari', $hari);
		return $this->db->get('tabel_jadwal')->result_array();
	}

	public function getKelasSiswa()
	{
		return $this->db->get('tabel_kelas')->result_array();
	}

	public function getNilai($nis)
	{
		$this->db->select('id_nilai, nip_guru, nis_siswa, id_pelajaran_nilai, nilai_tugas, nilai_absen, nilai_uts, nilai_uas, semester, nama_guru, nama_lengkap_siswa, akronim, pelajaran');
		$this->db->join('tabel_guru', 'nip_guru = nip', 'LEFT');
		$this->db->join('tabel_siswa', 'nis_siswa = nis', 'LEFT');
		$this->db->join('tabel_pelajaran', 'id_pelajaran_nilai = id_pelajaran', 'LEFT');
		$this->db->where('nis_siswa', $nis);
		return $this->db->get('tabel_nilai')->result_array();
	}
}

/*
|	Close class
*/