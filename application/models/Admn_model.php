<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admn_model extends CI_Model
{

/*
|	Username
*/
	public function getUserCek($user)
	{
		return $this->db->get_where('tabel_user', ['username' => $user])->row_array();
	}

	public function getAllUser()
	{
		$this->db->select('id_user, nama_user, username, pasword, level, status');
		return $this->db->get('tabel_user')->result_array();
	}

	public function getAdmn()
	{
		return $this->db->get('tabel_admin')->result_array();
	}

	public function getAdmnUser($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('tabel_admin')->row_array();
	}

	public function setAktifAdmin($id_admin, $username)
	{
		$this->db->set('status', 1);
		$this->db->where('id_admin', $id_admin);
		$this->db->where('username', $username);
		$this->db->update('tabel_admin');
	}

	public function setNonAktifAdmin($id_admin, $username)
	{
		$this->db->set('status', 0);
		$this->db->where('id_admin', $id_admin);
		$this->db->where('username', $username);
		$this->db->update('tabel_admin');
	}

	public function setHapusAdmin($id_admin, $username)
	{
		$this->db->delete('tabel_admin', ['id_admin' => $id_admin, 'username' => $username]);
	}

	public function setTambahUserAdmin()
	{
		$data = [
			'id_admin' => '',
			'nama' => htmlspecialchars($this->input->post('nama', TRUE)),
			'username' => htmlspecialchars($this->input->post('username', TRUE)),
			'password' => password_hash(htmlspecialchars($this->input->post('password1', TRUE)), PASSWORD_DEFAULT),
			'level' => 1,
			'status' => htmlspecialchars($this->input->post('status', TRUE))
		];
		$this->db->insert('tabel_admin', $data);
	}

	public function setTambahUserSiswa($result)
	{	
		$data = [
			'id_user' => '',
			'nip_nis_user' => $result['nis'],
			'nama_user' => $result['nama_lengkap_siswa'],
			'username' => $result['nis'],
			'pasword' => password_hash($result['tanggal_lahir_siswa'], PASSWORD_DEFAULT),
			'level' => 3,
			'status' => 1
		];
		$this->db->insert('tabel_user', $data);
	}

	public function setTambahUserGuru($result)
	{	
		$data = [
			'id_user' => '',
			'nip_nis_user' => $result['nip'],
			'nama_user' => $result['nama_guru'],
			'username' => $result['nip'],
			'pasword' => password_hash($result['tanggal_lahir'], PASSWORD_DEFAULT),
			'level' => 2,
			'status' => 1
		];
		$this->db->insert('tabel_user', $data);
	}

	public function setNonAktifUser($username, $id_user)
	{
		$this->db->set('status', '0');
		$this->db->where('id_user', $id_user);
		$this->db->where('username', $username);
		$this->db->update('tabel_user');
	}

	public function setAktifUser($username, $id_user)
	{
		$this->db->set('status', '1');
		$this->db->where('id_user', $id_user);
		$this->db->where('username', $username);
		$this->db->update('tabel_user');
	}

	public function setHapusUser($username, $id_user)
	{
		$this->db->delete('tabel_user', ['id_user' => $id_user, 'username' => $username]);
	}

/*
|	close username
*/

/*
|	Model Guru
*/

	public function getGuru()
	{
		$this->db->select('nip, akronim, nama_guru, jeniskelamin_guru, email_guru, status_aktif');
		return $this->db->get('tabel_guru')->result_array();
	}

	public function getCountRowGuru()
	{
		return $this->db->get('tabel_guru')->num_rows();
	}

	public function getLimitGuru($limit, $start, $keyword = null)
	{
		$this->db->select('nip, akronim, nama_guru, jeniskelamin_guru, email_guru, status_aktif');

		if($keyword)
		{
			$this->db->like('nip', $keyword);
			$this->db->or_like('nama_guru', $keyword);
		}

		return $this->db->get('tabel_guru', $limit, $start)->result_array();
	}

	public function getNipGuru($nip)
	{
		$this->db->select('nip, tanggal_lahir, nama_guru');
		$this->db->where('nip', $nip);
		return $this->db->get('tabel_guru')->row_array();
	}

	public function getDetailGuru($nip)
	{
		return $this->db->get_where('tabel_guru', ['nip' => $nip])->row_array();
	}

	public function setTambahGuru()
	{
		$data = [
				'nip' => htmlspecialchars($this->input->post('nip', TRUE)),
				'akronim' => htmlspecialchars($this->input->post('akronim', TRUE)),
				'nama_guru' => htmlspecialchars($this->input->post('nama_guru', TRUE)),
				'tempat_lahir_guru' => htmlspecialchars($this->input->post('tempat_lahir_guru', TRUE)),
				'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', TRUE)),
				'agama_guru' => htmlspecialchars($this->input->post('agama_guru', TRUE)),
				'jeniskelamin_guru' => htmlspecialchars($this->input->post('jeniskelamin_guru', TRUE)),
				'telepon_guru' => htmlspecialchars($this->input->post('telepon_guru', TRUE)),
				'email_guru' => htmlspecialchars($this->input->post('email_guru', TRUE)),
				'alamat_guru' => htmlspecialchars($this->input->post('alamat_guru', TRUE)),
				'pendidikan_guru' => htmlspecialchars($this->input->post('pendidikan_guru', TRUE)),
				'status_kawin' => htmlspecialchars($this->input->post('status_kawin', TRUE)),
				'jabatan' => htmlspecialchars($this->input->post('jabatan', TRUE)),
				'status_aktif' => htmlspecialchars($this->input->post('status_aktif', TRUE))
			];
		$this->db->insert('tabel_guru', $data);
	}

	public function setEditGuru()
	{
		$data = [
			'akronim' => htmlspecialchars($this->input->post('akronim', TRUE)),
			'nama_guru' => htmlspecialchars($this->input->post('nama_guru', TRUE)),
			'tempat_lahir_guru' => htmlspecialchars($this->input->post('tempat_lahir_guru', TRUE)),
			'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', TRUE)),
			'agama_guru' => htmlspecialchars($this->input->post('agama_guru', TRUE)),
			'jeniskelamin_guru' => htmlspecialchars($this->input->post('jeniskelamin_guru', TRUE)),
			'telepon_guru' => htmlspecialchars($this->input->post('telepon_guru', TRUE)),
			'email_guru' => htmlspecialchars($this->input->post('email_guru', TRUE)),
			'alamat_guru' => htmlspecialchars($this->input->post('alamat_guru', TRUE)),
			'pendidikan_guru' => htmlspecialchars($this->input->post('pendidikan_guru', TRUE)),
			'status_kawin' => htmlspecialchars($this->input->post('status_kawin', TRUE)),
			'jabatan' => htmlspecialchars($this->input->post('jabatan', TRUE)),
			'status_aktif' => htmlspecialchars($this->input->post('status_aktif', TRUE))
		];
		$this->db->update('tabel_guru', $data, ['nip' => htmlspecialchars($this->input->post('nip', TRUE))]);
	}

	public function setHapusGuru($nip)
	{
		$this->db->delete('tabel_guru', ['nip' => $nip]);
	}

/*
|	Close Model Guru
*/

/*
|	Model Siswa
*/

	public function getCountRowSiswa()
	{
		return $this->db->get('tabel_siswa')->num_rows();
	}

	public function getNisSiswa($nis)
	{
		$this->db->select('nis, nama_lengkap_siswa, tanggal_lahir_siswa');
		$this->db->where('nis', $nis);
		return $this->db->get('tabel_siswa')->row_array();
	}

	public function getSiswa()
	{
		$this->db->select('nis, nama_lengkap_siswa, id_kelas_siswa, id_jurusan_siswa, kelas, jurusan, jenis_kelamin_siswa, tahun_ajaran');
		$this->db->join('tabel_kelas', 'id_kelas_siswa = id_kelas', 'LEFT');
		$this->db->join('tabel_jurusan', 'id_jurusan_siswa = id_jurusan', 'LEFT');
		$this->db->order_by('id_kelas_siswa', 'ASC');
		$this->db->order_by('nis', 'ASC');
		return $this->db->get('tabel_siswa')->result_array();
	}

	public function getLimitSiswa($limit, $start, $keyword = null)
	{
		$this->db->select('nis, nama_lengkap_siswa, id_kelas_siswa, id_jurusan_siswa, kelas, jurusan, jenis_kelamin_siswa, tahun_ajaran');
		$this->db->join('tabel_kelas', 'id_kelas_siswa = id_kelas', 'LEFT');
		$this->db->join('tabel_jurusan', 'id_jurusan_siswa = id_jurusan', 'LEFT');
		$this->db->order_by('id_kelas_siswa', 'ASC');
		$this->db->order_by('nis', 'ASC');
		
		if($keyword)
		{
			$this->db->like('nama_lengkap_siswa', $keyword);
			$this->db->or_like('nis', $keyword);
			$this->db->or_like('jurusan', $keyword);
			$this->db->or_like('kelas', $keyword);
		}
		
		return $this->db->get('tabel_siswa', $limit, $start)->result_array();
	}

	public function getDetailSiswa($nis)
	{
		$this->db->select('nis, nama_lengkap_siswa, nama_panggilan_siswa, id_kelas_siswa, id_jurusan_siswa, tempat_lahir_siswa, tanggal_lahir_siswa, jenis_kelamin_siswa, agama_siswa, alamat_siswa, telepon_siswa, nama_ayah_siswa, nama_ibu_siswa, tahun_ajaran, kelas, jurusan');
		$this->db->join('tabel_kelas', 'id_kelas_siswa = id_kelas', 'LEFT');
		$this->db->join('tabel_jurusan', 'id_jurusan_siswa = id_jurusan', 'LEFT');
		$this->db->where('nis', $nis);
		return $this->db->get('tabel_siswa')->row_array();
	}

	public function getKelasByKelas($kelas)
	{
		$this->db->select('nis, nama_lengkap_siswa, id_kelas_siswa, id_jurusan_siswa, kelas, jurusan, jenis_kelamin_siswa, tahun_ajaran');
		$this->db->join('tabel_kelas', 'id_kelas_siswa = id_kelas', 'LEFT');
		$this->db->join('tabel_jurusan', 'id_jurusan_siswa = id_jurusan', 'LEFT');
		$this->db->where('id_kelas_siswa', $kelas);
		$this->db->order_by('nama_lengkap_siswa', 'ASC');
		return $this->db->get('tabel_siswa')->result_array();
	}
 
	public function setTambahSiswa()
	{
		$data = [
			'nis' => htmlspecialchars($this->input->post('nis', TRUE)),
			'nama_lengkap_siswa' => htmlspecialchars($this->input->post('nama_lengkap_siswa', TRUE)),
			'nama_panggilan_siswa' => htmlspecialchars($this->input->post('nama_panggilan_siswa', TRUE)),
			'id_kelas_siswa' => htmlspecialchars($this->input->post('id_kelas_siswa', TRUE)),
			'id_jurusan_siswa' => htmlspecialchars($this->input->post('id_jurusan_siswa', TRUE)),
			'tempat_lahir_siswa' => htmlspecialchars($this->input->post('tempat_lahir_siswa', TRUE)),
			'tanggal_lahir_siswa' => htmlspecialchars($this->input->post('tanggal_lahir_siswa', TRUE)),
			'jenis_kelamin_siswa' => htmlspecialchars($this->input->post('jenis_kelamin_siswa', TRUE)),
			'agama_siswa' => htmlspecialchars($this->input->post('agama_siswa', TRUE)),
			'alamat_siswa' => htmlspecialchars($this->input->post('alamat_siswa', TRUE)),
			'telepon_siswa' => htmlspecialchars($this->input->post('telepon_siswa', TRUE)),
			'nama_ayah_siswa' => htmlspecialchars($this->input->post('nama_ayah_siswa', TRUE)),
			'nama_ibu_siswa' => htmlspecialchars($this->input->post('nama_ibu_siswa', TRUE)),
			'tahun_ajaran' => htmlspecialchars($this->input->post('tahun_ajaran', TRUE))
		];
		$this->db->insert('tabel_siswa', $data);
	}

	public function setEditSiswa()
	{
		$data = [
			'nama_lengkap_siswa' => htmlspecialchars($this->input->post('nama_lengkap_siswa', TRUE)),
			'nama_panggilan_siswa' => htmlspecialchars($this->input->post('nama_panggilan_siswa', TRUE)),
			'id_kelas_siswa' => htmlspecialchars($this->input->post('id_kelas_siswa', TRUE)),
			'id_jurusan_siswa' => htmlspecialchars($this->input->post('id_jurusan_siswa', TRUE)),
			'tempat_lahir_siswa' => htmlspecialchars($this->input->post('tempat_lahir_siswa', TRUE)),
			'tanggal_lahir_siswa' => htmlspecialchars($this->input->post('tanggal_lahir_siswa', TRUE)),
			'jenis_kelamin_siswa' => htmlspecialchars($this->input->post('jenis_kelamin_siswa', TRUE)),
			'agama_siswa' => htmlspecialchars($this->input->post('agama_siswa', TRUE)),
			'alamat_siswa' => htmlspecialchars($this->input->post('alamat_siswa', TRUE)),
			'telepon_siswa' => htmlspecialchars($this->input->post('telepon_siswa', TRUE)),
			'nama_ayah_siswa' => htmlspecialchars($this->input->post('nama_ayah_siswa', TRUE)),
			'nama_ibu_siswa' => htmlspecialchars($this->input->post('nama_ibu_siswa', TRUE)),
			'tahun_ajaran' => htmlspecialchars($this->input->post('tahun_ajaran', TRUE))
		];
		$this->db->update('tabel_siswa', $data, ['nis' => htmlspecialchars($this->input->post('nis', TRUE))]);
	}

	public function setHapusSiswa($nis)
	{
		$this->db->delete('tabel_siswa', ['nis' => $nis]);
	}

/*
|	Close Model Siswa
*/

/*
|	 Model Pelajaran
*/

	public function getPelajaran()
	{
		return $this->db->get('tabel_pelajaran')->result_array();
	}

	public function getDetailPelajaran($id_pelajaran)
	{
		return $this->db->get_where('tabel_pelajaran', ['id_pelajaran' => $id_pelajaran])->row_array();
	}

	public function setTambahPelajaran()
	{
		$data = [
			'id_pelajaran' => '',
			'pelajaran' => htmlspecialchars($this->input->post('pelajaran', TRUE)),
			'kkm' => htmlspecialchars($this->input->post('kkm', TRUE))
		];
		$this->db->insert('tabel_pelajaran', $data);
	}

	public function setEditPelajaran()
	{
		$data = [
			'pelajaran' => htmlspecialchars($this->input->post('pelajaran', TRUE)),
			'kkm' => htmlspecialchars($this->input->post('kkm', TRUE))
		];
		$this->db->update('tabel_pelajaran', $data, ['id_pelajaran' => $this->input->post('id_pelajaran', TRUE)]);
	}

	public function setHapusPelajaran($id_pelajaran)
	{
		$this->db->delete('tabel_pelajaran', ['id_pelajaran' => $id_pelajaran]);
	}

/*
|	Close Model Pelajaran
*/

/*
|	Model Jadwal
*/

	public function getJadwal()
	{
		$this->db->select('id_jadwal, hari, id_kelas_jadwal, id_pelajaran_jadwal, nip_guru, jam_mulai, jam_selesai, kelas, pelajaran, nama_guru, akronim');
		$this->db->join('tabel_kelas', 'id_kelas_jadwal = id_kelas', 'LEFT');
		$this->db->join('tabel_pelajaran', 'id_pelajaran_jadwal = id_pelajaran', 'LEFT');
		$this->db->join('tabel_guru', 'nip_guru = nip', 'LEFT');
		$this->db->order_by('hari', 'ASC');
		$this->db->order_by('kelas', 'ASC');
		$this->db->where('hari', cek_h(date('D')));
		return $this->db->get('tabel_jadwal')->result_array();
	}

	public function getJadwalByHari($hari)
	{
		$this->db->select('id_jadwal, hari, id_kelas_jadwal, id_pelajaran_jadwal, nip_guru, jam_mulai, jam_selesai, kelas, pelajaran, nama_guru, akronim');
		$this->db->join('tabel_kelas', 'id_kelas_jadwal = id_kelas', 'LEFT');
		$this->db->join('tabel_pelajaran', 'id_pelajaran_jadwal = id_pelajaran', 'LEFT');
		$this->db->join('tabel_guru', 'nip_guru = nip', 'LEFT');
		$this->db->order_by('hari', 'ASC');
		$this->db->order_by('kelas', 'ASC');
		$this->db->where('hari', $hari);
		return $this->db->get('tabel_jadwal')->result_array();
	}

	public function getJadwalByKelas($id_kelas)
	{
		$this->db->select('id_jadwal, hari, id_kelas_jadwal, id_pelajaran_jadwal, nip_guru, jam_mulai, jam_selesai, kelas, pelajaran, nama_guru, akronim');
		$this->db->join('tabel_kelas', 'id_kelas_jadwal = id_kelas', 'LEFT');
		$this->db->join('tabel_pelajaran', 'id_pelajaran_jadwal = id_pelajaran', 'LEFT');
		$this->db->join('tabel_guru', 'nip_guru = nip', 'LEFT');
		$this->db->order_by('hari', 'ASC');
		$this->db->order_by('kelas', 'ASC');
		$this->db->where('id_kelas_jadwal', $id_kelas);
		return $this->db->get('tabel_jadwal')->result_array();
	}

	public function getJadwalBaru()
	{
		$this->db->select('id_jadwal, hari, id_kelas_jadwal, id_pelajaran_jadwal, nip_guru, jam_mulai, jam_selesai, kelas, pelajaran, nama_guru, akronim');
		$this->db->join('tabel_kelas', 'id_kelas_jadwal = id_kelas', 'LEFT');
		$this->db->join('tabel_pelajaran', 'id_pelajaran_jadwal = id_pelajaran', 'LEFT');
		$this->db->join('tabel_guru', 'nip_guru = nip', 'LEFT');
		$this->db->order_by('id_jadwal', 'DESC');
		return $this->db->get('tabel_jadwal', 10, 0)->result_array();
	}

	public function getDetailJadwal($id_jadwal)
	{
		$this->db->select('id_jadwal, hari, id_kelas_jadwal, id_pelajaran_jadwal, nip_guru, jam_mulai, jam_selesai, kelas, pelajaran, nama_guru, akronim');
		$this->db->join('tabel_kelas', 'id_kelas_jadwal = id_kelas', 'LEFT');
		$this->db->join('tabel_pelajaran', 'id_pelajaran_jadwal = id_pelajaran', 'LEFT');
		$this->db->join('tabel_guru', 'nip_guru = nip', 'LEFT');
		$this->db->where('id_jadwal', $id_jadwal);
		return $this->db->get('tabel_jadwal')->row_array();
	}

	public function setTambahJadwal()
	{
		$data = [
			'id_jadwal' => '',
			'hari' => htmlspecialchars($this->input->post('hari', TRUE)),
			'id_kelas_jadwal' => htmlspecialchars($this->input->post('id_kelas_jadwal', TRUE)),
			'id_pelajaran_jadwal' => htmlspecialchars($this->input->post('id_pelajaran_jadwal', TRUE)),
			'nip_guru' => htmlspecialchars($this->input->post('nip_guru', TRUE)),
			'jam_mulai' => htmlspecialchars($this->input->post('jam_mulai', TRUE)),
			'jam_selesai' => htmlspecialchars($this->input->post('jam_selesai', TRUE))
		];
		$this->db->insert('tabel_jadwal', $data);
	}

	public function setEditJadwal()
	{
		$data = [
			'hari' => htmlspecialchars($this->input->post('hari', TRUE)),
			'id_kelas_jadwal' => htmlspecialchars($this->input->post('id_kelas_jadwal', TRUE)),
			'id_pelajaran_jadwal' => htmlspecialchars($this->input->post('id_pelajaran_jadwal', TRUE)),
			'nip_guru' => htmlspecialchars($this->input->post('nip_guru', TRUE)),
			'jam_mulai' => htmlspecialchars($this->input->post('jam_mulai', TRUE)),
			'jam_selesai' => htmlspecialchars($this->input->post('jam_selesai', TRUE))
		];
		$this->db->update('tabel_jadwal', $data, ['id_jadwal' => htmlspecialchars($this->input->post('id_jadwal',TRUE))]);
	}

	public function setHapusJadwal($id_jadwal)
	{
		$this->db->delete('tabel_jadwal', ['id_jadwal' => $id_jadwal]);
	}

/*
|	Close Model Jadwal
*/

/*
|	 Model Kelas
*/

	public function getKelas()
	{
		return $this->db->get('tabel_kelas')->result_array();
	}

	public function getDetailKelas($id_kelas)
	{
		return $this->db->get_where('tabel_kelas', ['id_kelas' => $id_kelas])->row_array();
	}

	public function setTambahKelas()
	{
		$data = [
			'id_kelas' => '',
			'kelas' => htmlspecialchars($this->input->post('kelas', TRUE)),
			'kapasitas' => htmlspecialchars($this->input->post('kapasitas', TRUE))
		];
		$this->db->insert('tabel_kelas', $data);
	}

	public function setEditKelas()
	{
		$data  = [
			'kelas' => htmlspecialchars($this->input->post('kelas', TRUE)),
			'kapasitas' => htmlspecialchars($this->input->post('kapasitas', TRUE))
		];
		$this->db->update('tabel_kelas', $data, ['id_kelas' => $this->input->post('id_kelas', TRUE)]);
	}

	public function setHapusKelas($id_kelas)
	{
		$this->db->delete('tabel_kelas', ['id_kelas' => $id_kelas]);
	}

/*
|	 Close Model Kelas
*/

/*
| 	Model Jurusan
*/

	public function getJurusan()
	{
		return $this->db->get('tabel_jurusan')->result_array();
	}

	public function setTambahJurusan()
	{
		$data = [
			'id_jurusan' => '',
			'Jurusan' => htmlspecialchars($this->input->post('jurusan', TRUE))
		];
		$this->db->insert('tabel_jurusan', $data);
	}

	public function setHapusJurusan($id_jurusan)
	{
		$this->db->delete('tabel_jurusan', ['id_jurusan' => $id_jurusan]);
	}
	
/*
|	 Close Model Jurusan
*/


/*
|	 Model pendaftaran
*/

	public function getPendaftaran()
	{
		$this->db->select('id_daftar, nama_lengkap, email, no_daftar, tanggal_daftar, jenis_kelamin, nisn, no_skhun, asal_sekolah, status_bayar, jurusan, status_bayar');
		$this->db->join('tabel_jurusan', 'id_jurusan_daftar = id_jurusan', 'LEFT');
		return $this->db->get('pendaftaran')->result_array();
	}

	public function getPendaftaranBaru()
	{
		$this->db->select('id_daftar, nama_lengkap, email, no_daftar, tanggal_daftar, jenis_kelamin, nisn, no_skhun, asal_sekolah, status_bayar, jurusan, status_bayar');
		$this->db->join('tabel_jurusan', 'id_jurusan_daftar = id_jurusan', 'LEFT');
		$this->db->order_by('id_daftar', 'DESC');
		return $this->db->get('pendaftaran', 20, 0)->result_array();
	}

	public function getLimitPendaftaran($limit, $start, $keyword = null)
	{
		$this->db->select('id_daftar, nama_lengkap, email, no_daftar, tanggal_daftar, jenis_kelamin, nisn, no_skhun, asal_sekolah, status_bayar, jurusan, status_bayar');
		$this->db->join('tabel_jurusan', 'id_jurusan_daftar = id_jurusan', 'LEFT');

		if($keyword)
		{
			$this->db->like('nama_lengkap', $keyword);
			$this->db->or_like('no_daftar', $keyword);
			$this->db->or_like('email', $keyword);
			$this->db->or_like('asal_sekolah', $keyword);
		}

		return $this->db->get('pendaftaran', $limit, $start)->result_array();
	}

	public function getLimitBayarPendaftaran($limit, $start, $keyword = null)
	{
		if($keyword)
		{
			$this->db->like('nama_lengkap_pembayaran', $keyword);
			$this->db->or_like('no_daftar_pembayaran', $keyword);
			$this->db->or_like('email', $keyword);	
		}
		return $this->db->get('tabel_pembayaran', $limit, $start)->result_array();
	}

	public function getCountsRowPendaftaran()
	{
		return $this->db->get('pendaftaran')->num_rows();
	}

	public function getCountsRowPembayaran()
	{
		return $this->db->get('tabel_pembayaran')->num_rows();
	}

	public function getDetailPendaftaran($id_daftar)
	{
		$this->db->join('tabel_jurusan', 'id_jurusan_daftar = id_jurusan', 'LEFT');
		return $this->db->get_where('pendaftaran', ['id_daftar' => $id_daftar])->row_array();
	}

	public function setHapusPendaftaran($id_daftar, $no_daftar)
	{
		$this->db->delete('pendaftaran', ['id_daftar' => $id_daftar, 'no_daftar' => $no_daftar]);
	}

	public function setKonfirmPendaftaran($id_daftar, $no_daftar)
	{
		$this->db->set('status_bayar', 'lunas');
		$this->db->where('id_daftar', $id_daftar);
		$this->db->where('no_daftar', $no_daftar);
		$this->db->update('pendaftaran');
	}

	public function setBatalKonfirmPendaftaran($id_daftar, $no_daftar)
	{
		$this->db->set('status_bayar', 'belum lunas');
		$this->db->where('id_daftar', $id_daftar);
		$this->db->where('no_daftar', $no_daftar);
		$this->db->update('pendaftaran');
	}

	public function getBayarPendaftaran()
	{
		return $this->db->get('tabel_pembayaran')->result_array();
	}

	public function getDetailPembayaran($id_pembayaran)
	{
		return $this->db->get_where('tabel_pembayaran', ['id_pembayaran' => $id_pembayaran])->row_array();
	}

	public function getDetailBayar($id_pembayaran, $no_daftar)
	{
		$this->db->where('id_pembayaran', $id_pembayaran);
		$this->db->where('no_daftar_pembayaran', $no_daftar);
		return $this->db->get('tabel_pembayaran')->row_array();
	}

	public function setKonfirmPembayaran($id_pembayaran)
	{
		$this->db->set('konfirm_status', 'konfirmasi');
		$this->db->where('id_pembayaran', $id_pembayaran);
		$this->db->update('tabel_pembayaran');
	}

	public function setBatalKonfirmPembayaran($id_pembayaran)
	{
		$this->db->set('konfirm_status', 'belum konfirmasi');
		$this->db->where('id_pembayaran', $id_pembayaran);
		$this->db->update('tabel_pembayaran');
	}

	public function setHapusPembayaran($id_pembayaran)
	{
		$this->db->delete('tabel_pembayaran', ['id_pembayaran' => $id_pembayaran]);
	}

/*
|	 Close Model Pendaftaran
*/

}
