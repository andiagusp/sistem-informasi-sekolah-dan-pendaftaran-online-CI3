<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function getDetailSiswa($nis)
	{
		$this->db->select('nis, nama_lengkap_siswa, nama_panggilan_siswa, id_kelas_siswa, id_jurusan_siswa, tempat_lahir_siswa, tanggal_lahir_siswa, jenis_kelamin_siswa, agama_siswa, alamat_siswa, telepon_siswa, nama_ayah_siswa, nama_ibu_siswa, tahun_ajaran, kelas, jurusan');
		$this->db->join('tabel_kelas', 'id_kelas_siswa = id_kelas', 'LEFT');
		$this->db->join('tabel_jurusan', 'id_jurusan_siswa = id_jurusan', 'LEFT');
		$this->db->where('nis', $nis);
		return $this->db->get('tabel_siswa')->row_array();
	}

	public function getGuruLog($username)
	{
		return $this->db->get_where('tabel_guru', ['nip' => $username])->row_array();
	}

	public function getKelasGuru()
	{
		return $this->db->get('tabel_kelas')->result_array();
	}

	public function getJurusanGuru()
	{
		return $this->db->get('tabel_jurusan')->result_array();
	}

	public function getPelajaranGuru()
	{
		return $this->db->get('tabel_pelajaran')->result_array();
	}

	public function getJadwalGuru()
	{
		$this->db->select('id_jadwal, hari, id_kelas_jadwal, id_pelajaran_jadwal, nip_guru, jam_mulai, jam_selesai, kelas, pelajaran, kkm, nama_guru, nip, akronim');
		$this->db->join('tabel_kelas', 'id_kelas_jadwal = id_kelas', 'LEFT');
		$this->db->join('tabel_pelajaran', 'id_pelajaran_jadwal = id_pelajaran', 'LEFT');
		$this->db->join('tabel_guru', 'nip_guru = nip', 'LEFT');
		$this->db->order_by('hari', 'ASC');
		$this->db->order_by('kelas', 'ASC');
		$this->db->order_by('jam_mulai', 'ASC');
		$this->db->where('hari', cek_hari(date('D')));
		return $this->db->get('tabel_jadwal')->result_array();
	}

	public function getJadwalByQuery($kelas)
	{
		$this->db->select('id_jadwal, hari, id_kelas_jadwal, id_pelajaran_jadwal, nip_guru, jam_mulai, jam_selesai, kelas, pelajaran, kkm, nama_guru, nip, akronim');
		$this->db->join('tabel_kelas', 'id_kelas_jadwal = id_kelas', 'LEFT');
		$this->db->join('tabel_pelajaran', 'id_pelajaran_jadwal = id_pelajaran', 'LEFT');
		$this->db->join('tabel_guru', 'nip_guru = nip', 'LEFT');
		$this->db->order_by('hari', 'ASC');
		$this->db->order_by('kelas', 'ASC');
		$this->db->order_by('jam_mulai', 'ASC');
		$this->db->where('id_kelas_jadwal', $kelas);
		return $this->db->get('tabel_jadwal')->result_array();
	}

	public function getJadwalByHari($hari)
	{
		$this->db->select('id_jadwal, hari, id_kelas_jadwal, id_pelajaran_jadwal, nip_guru, jam_mulai, jam_selesai, kelas, pelajaran, kkm, nama_guru, nip, akronim');
		$this->db->join('tabel_kelas', 'id_kelas_jadwal = id_kelas', 'LEFT');
		$this->db->join('tabel_pelajaran', 'id_pelajaran_jadwal = id_pelajaran', 'LEFT');
		$this->db->join('tabel_guru', 'nip_guru = nip', 'LEFT');
		$this->db->order_by('hari', 'ASC');
		$this->db->order_by('kelas', 'ASC');
		$this->db->order_by('jam_mulai', 'ASC');
		$this->db->where('hari', $hari);
		return $this->db->get('tabel_jadwal')->result_array();
	}

	public function getCountRowSiswa()
	{
		return $this->db->get('tabel_siswa')->num_rows();
	}

	public function getLimitSiswaGuru($limit, $start, $keyword = null)
	{
		$this->db->select('nis, nama_lengkap_siswa, id_kelas_siswa, id_jurusan_siswa, kelas, jurusan, jenis_kelamin_siswa, tahun_ajaran');
		$this->db->join('tabel_kelas', 'id_kelas_siswa = id_kelas', 'LEFT');
		$this->db->join('tabel_jurusan', 'id_jurusan_siswa = id_jurusan', 'LEFT');
		$this->db->order_by('id_kelas_siswa', 'ASC');
		$this->db->order_by('nis', 'ASC');

		if($keyword)
		{
			$this->db->like('nis', $keyword);
			$this->db->or_like('nama_lengkap_siswa', $keyword);
		}

		return $this->db->get('tabel_siswa', $limit, $start)->result_array();
	}

	public function getSiswaKelasGuru($id_kelas_siswa)
	{
		$this->db->select('nis, nama_lengkap_siswa, id_kelas_siswa, id_jurusan_siswa, kelas, jurusan, jenis_kelamin_siswa, tahun_ajaran');
		$this->db->join('tabel_kelas', 'id_kelas_siswa = id_kelas', 'LEFT');
		$this->db->join('tabel_jurusan', 'id_jurusan_siswa = id_jurusan', 'LEFT');
		$this->db->order_by('id_kelas_siswa', 'ASC');
		$this->db->order_by('nis', 'ASC');
		$this->db->where('id_kelas_siswa', $id_kelas_siswa);
		return $this->db->get('tabel_siswa')->result_array();
	}


	public function getSiswaGuru()
	{
		$this->db->select('nis, nama_lengkap_siswa, id_kelas_siswa, id_jurusan_siswa, kelas, jurusan, jenis_kelamin_siswa, tahun_ajaran');
		$this->db->join('tabel_kelas', 'id_kelas_siswa = id_kelas', 'LEFT');
		$this->db->join('tabel_jurusan', 'id_jurusan_siswa = id_jurusan', 'LEFT');
		$this->db->order_by('id_kelas_siswa', 'ASC');
		$this->db->order_by('nis', 'ASC');
		return $this->db->get('tabel_siswa')->result_array();
	}

	public function getNilaiSiswa($user)
	{
		$this->db->select('id_nilai, nip_guru, nis_siswa, id_pelajaran_nilai, nilai_tugas, nilai_absen, nilai_uts, nilai_uas, semester, nip, nama_guru, akronim, nis, nama_lengkap_siswa, pelajaran');
		$this->db->join('tabel_guru', 'nip_guru = nip', 'LEFT');
		$this->db->join('tabel_siswa', 'nis_siswa = nis', 'LEFT');
		$this->db->join('tabel_pelajaran', 'id_pelajaran_nilai = id_pelajaran', 'LEFT');
		$this->db->where('nip_guru', $user['nip']);
		return $this->db->get('tabel_nilai')->result_array();
	}

	public function getRowNilai()
	{
		return $this->db->get('tabel_nilai')->num_rows();
	}

	public function getLimitNilaiSiswa($user, $limit, $start, $keyword = null)
	{
		$this->db->select('id_nilai, nip_guru, nis_siswa, id_pelajaran_nilai, nilai_tugas, nilai_absen, nilai_uts, nilai_uas, semester, nip, nama_guru, akronim, nis, nama_lengkap_siswa, pelajaran');
		$this->db->join('tabel_guru', 'nip_guru = nip', 'LEFT');
		$this->db->join('tabel_siswa', 'nis_siswa = nis', 'LEFT');
		$this->db->join('tabel_pelajaran', 'id_pelajaran_nilai = id_pelajaran', 'LEFT');
		$this->db->where('nip_guru', $user['nip']);

		if($keyword)
		{
			$this->db->like('nis_siswa', $keyword);
			$this->db->or_like('nama_lengkap_siswa', $keyword);
		}

		return $this->db->get('tabel_nilai', $limit, $start)->result_array();
	}

	public function setTambahNilai($data)
	{
		$this->db->insert('tabel_nilai', $data);
	}

	public function getDetailNilai($id_nilai)
	{
		$this->db->select('id_nilai, nip_guru, nis_siswa, id_pelajaran_nilai, nilai_tugas, nilai_absen, nilai_uts, nilai_uas, semester, nip, nama_guru, akronim, nis, nama_lengkap_siswa, pelajaran');
		$this->db->join('tabel_guru', 'nip_guru = nip', 'LEFT');
		$this->db->join('tabel_siswa', 'nis_siswa = nis', 'LEFT');
		$this->db->join('tabel_pelajaran', 'id_pelajaran_nilai = id_pelajaran', 'LEFT');
		$this->db->where('id_nilai', $id_nilai);
		return $this->db->get('tabel_nilai')->row_array();
	}

	public function setEditNilai($data, $key)
	{
		$this->db->where('id_nilai', $key);
		$this->db->update('tabel_nilai', $data);
	}

	public function setHapusNilai($id_nilai)
	{
		$this->db->delete('tabel_nilai', ['id_nilai' => $id_nilai]);
	}

	public function getNamaSiswa($nis)
	{
		return $this->db->get_where('tabel_siswa', ['nis' => $nis])->row_array();
	}

}

/*
|	Close Class
*/
