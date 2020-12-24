<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admn extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->session->userdata('username');
		$this->session->userdata('level');
		$this->load->model('Admn_model', 'admn');
		$this->load->library('pagination');
		cek_log();
		if($this->session->userdata('level') != 1)
		{
			redirect('Login/block');
		}
	}

	public function index()
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');
		$data['daftar'] = $this->admn->getPendaftaranBaru();
		$data['header'] = 'Selamat Datang '.$data['user']['username'];
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admn/index', $data);
		$this->load->view('templates/footer');
	}

/*
|	Method Guru
*/

	public function guru()
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');

		$config['base_url'] = 'http://smkmadanidepok.epizy.com/admn/guru';

		if(htmlspecialchars($this->input->post('cari', TRUE)))
		{
			$data['keyword'] = htmlspecialchars($this->input->post('keyword', TRUE));
			$this->session->set_userdata('keyword', $data['keyword']);
		}
		elseif(htmlspecialchars($this->input->post('unset', TRUE)))
		{
			$this->session->unset_userdata('keyword');
			$data['keyword'] = null;
		}
		else
		{
			$this->form_validation->set_rules('nip', 'NIP', 'trim|required|numeric|is_unique[tabel_guru.nip]');
			$this->form_validation->set_rules('akronim', 'Akronim', 'trim|required');
			$this->form_validation->set_rules('nama_guru', 'Nama guru', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir_guru', 'Tempat lahir', 'trim|required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'trim|required');
			$this->form_validation->set_rules('agama_guru', 'Agama', 'trim|required');
			$this->form_validation->set_rules('jeniskelamin_guru', 'Jenis kelamin', 'trim|required');
			$this->form_validation->set_rules('telepon_guru', 'Telepon guru', 'trim|required|is_unique[tabel_guru.telepon_guru]');
			$this->form_validation->set_rules('email_guru', 'Email', 'trim|required|valid_email|is_unique[tabel_guru.email_guru]');
			$this->form_validation->set_rules('alamat_guru', 'Alamat guru', 'trim|required');
			$this->form_validation->set_rules('pendidikan_guru', 'Pendidikan guru', 'trim|required');
			$this->form_validation->set_rules('status_kawin', 'Status kawin', 'trim|required');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
			$this->form_validation->set_rules('status_aktif', 'Status aktif', 'trim|required');

			$data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('nip', $data['keyword']);
		$this->db->or_like('nama_guru', $data['keyword']);
		$this->db->from('tabel_guru');

		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 10;
		$data['start'] = $this->uri->segment(3);
		$data['total_rows'] = $config['total_rows'];


		$this->pagination->initialize($config);

		$data['guru'] = $this->admn->getLimitGuru($config['per_page'], $data['start'], $data['keyword']);

		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admn/guru', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->admn->setTambahGuru();
			$this->session->set_flashdata('message', '<div class="alert alert-success">Data Guru Berhasil Ditambahkan</div>');
			redirect('admn/guru');
		}
	}

	public function detail_guru($nip)
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');
		$data['guru'] = $this->admn->getDetailGuru($nip);
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admn/detail_guru', $data);
		$this->load->view('templates/footer');
	}

	public function edit_guru($nip)
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');
		$data['guru'] = $this->admn->getDetailGuru($nip);
		$data['stat'] = [['Laki - Laki', 'Perempuan'], ['Kawin', 'Belum'], [1, 2]];

		$this->form_validation->set_rules('nip', 'NIP', 'trim|required|numeric');
		$this->form_validation->set_rules('akronim', 'Akronim', 'trim|required');
		$this->form_validation->set_rules('nama_guru', 'Nama guru', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir_guru', 'Tempat lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'trim|required');
		$this->form_validation->set_rules('agama_guru', 'Agama', 'trim|required');
		$this->form_validation->set_rules('jeniskelamin_guru', 'Jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('telepon_guru', 'Telepon guru', 'trim|required');
		$this->form_validation->set_rules('email_guru', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('alamat_guru', 'Alamat guru', 'trim|required');
		$this->form_validation->set_rules('pendidikan_guru', 'Pendidikan guru', 'trim|required');
		$this->form_validation->set_rules('status_kawin', 'Status kawin', 'trim|required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
		$this->form_validation->set_rules('status_aktif', 'Status aktif', 'trim|required');
		
		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admn/edit_guru', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->admn->setEditGuru();
			$this->session->set_flashdata('message', '<div class="alert alert-success">Data Guru Berhasil Diedit</div>');
			redirect('admn/guru');
		}
	}

	public function hapus_guru($nip)
	{
		$this->admn->setHapusGuru($nip);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data Guru Berhasil Dihapus</div>');
		redirect('admn/guru');
	}

/*
|	Close Method Guru
*/

/*
| 	Method Siswa
*/

	public function siswa()
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));	
		$data['level'] = $this->session->userdata('level');
		$data['kelas'] = $this->admn->getKelas();

		$config['base_url'] = 'http://smkmadanidepok.epizy.com/admn/siswa';

		if(htmlspecialchars($this->input->post('cari', TRUE)))
		{		
			$data['keyword'] = htmlspecialchars($this->input->post('keyword', TRUE));
			$this->session->set_userdata('keyword', $data['keyword']);
		}
		elseif(htmlspecialchars($this->input->post('unset',TRUE)))
		{
			$this->session->unset_userdata('keyword');
			$data['keyword'] = null;
		}
		else
		{
			$this->form_validation->set_rules('nis', 'Nis', 'trim|required|numeric|is_unique[tabel_siswa.nis]');
			$this->form_validation->set_rules('nama_lengkap_siswa', 'Nama lengkap', 'trim|required');
			$this->form_validation->set_rules('nama_panggilan_siswa', 'Nama panggilan', 'trim|required');
			$this->form_validation->set_rules('id_kelas_siswa', 'Kelas', 'trim|required');
			$this->form_validation->set_rules('id_jurusan_siswa', 'Jurusan', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir_siswa', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('tanggal_lahir_siswa', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin_siswa', 'Jenis kelamin', 'trim|required');
			$this->form_validation->set_rules('agama_siswa', 'agama siswa', 'trim|required');
			$this->form_validation->set_rules('alamat_siswa', 'alamat siswa', 'trim|required');
			$this->form_validation->set_rules('telepon_siswa', 'Telepon siswa', 'trim|required|numeric');
			$this->form_validation->set_rules('nama_ayah_siswa', 'Nama ayah', 'trim|required');
			$this->form_validation->set_rules('nama_ibu_siswa', 'Nama ibu', 'trim|required');
			$this->form_validation->set_rules('tahun_ajaran', 'TA', 'trim|required');

			$data['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->select('nis, nama_lengkap_siswa, id_kelas_siswa, id_jurusan_siswa, kelas, jurusan, jenis_kelamin_siswa, tahun_ajaran');
		$this->db->join('tabel_kelas', 'id_kelas_siswa = id_kelas', 'LEFT');
		$this->db->join('tabel_jurusan', 'id_jurusan_siswa = id_jurusan', 'LEFT');
		$this->db->order_by('id_kelas_siswa', 'ASC');
		$this->db->order_by('nis', 'ASC');

		$this->db->like('nama_lengkap_siswa', $data['keyword']);
		$this->db->or_like('nis', $data['keyword']);
		$this->db->or_like('kelas', $data['keyword']);
		$this->db->or_like('jurusan', $data['keyword']);
		$this->db->from('tabel_siswa');
		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 10;
 		$data['total_rows'] = $config['total_rows'];

		$this->pagination->initialize($config);	

		$data['start'] = $this->uri->segment(3);
		$data['siswa'] = $this->admn->getLimitSiswa($config['per_page'], $data['start'], $data['keyword']);
		$data['kelas'] = $this->admn->getKelas();
		$data['jurusan'] = $this->admn->getJurusan();
		
		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admn/siswa', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->admn->setTambahSiswa();
			$this->session->set_flashdata('message', '<div class="alert alert-success">Data Siswa Berhasil Ditambahkan</div>');
			redirect('admn/siswa');
		}
	}

	public function detail_siswa($nis)
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');
		$data['siswa'] = $this->admn->getDetailSiswa($nis);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admn/detail_siswa', $data);
		$this->load->view('templates/footer');
	}
	
	public function siswa_kelas($kelas)
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));	
		$data['level'] = $this->session->userdata('level');
		$data['siswa'] = $this->admn->getKelasByKelas($kelas);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admn/siswa_kelas', $data);
		$this->load->view('templates/footer');

	}

	public function edit_siswa($nis)
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');
		$data['siswa'] = $this->admn->getDetailSiswa($nis);
		$data['kelas'] = $this->admn->getKelas();
		$data['jurusan'] = $this->admn->getJurusan();
		$data['jk'] = ['laki - laki', 'perempuan'];

		$this->form_validation->set_rules('nis', 'Nis', 'trim|required|numeric');
		$this->form_validation->set_rules('nama_lengkap_siswa', 'Nama lengkap', 'trim|required');
		$this->form_validation->set_rules('nama_panggilan_siswa', 'Nama panggilan', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir_siswa', 'Tempat Lahir siswa', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir_siswa', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('id_kelas_siswa', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('id_jurusan_siswa', 'Jurusan', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin_siswa', 'Jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('agama_siswa', 'agama siswa', 'trim|required');
		$this->form_validation->set_rules('alamat_siswa', 'alamat siswa', 'trim|required');
		$this->form_validation->set_rules('telepon_siswa', 'Telepon siswa', 'trim|required|numeric');
		$this->form_validation->set_rules('nama_ayah_siswa', 'Nama ayah', 'trim|required');
		$this->form_validation->set_rules('nama_ibu_siswa', 'Nama ibu', 'trim|required');
		$this->form_validation->set_rules('tahun_ajaran', 'TA', 'trim|required');

		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admn/edit_siswa', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->admn->setEditSiswa();
			$this->session->set_flashdata('message', '<div class="alert alert-success">Data Siswa Berhasil Diedit</div>');
			redirect('admn/siswa');
		}
	}

	public function hapus_siswa($nis)
	{
		$this->admn->setHapusSiswa($nis);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data Siswa Berhasil Dihapus</div>');
		redirect('admn/siswa');
	}

/*
| 	 Close Method Siswa
*/

/*
| 	Method Pelajaran
*/

	public function pelajaran()
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');
		$data['pelajaran'] = $this->admn->getPelajaran();

		$this->form_validation->set_rules('pelajaran', 'Pelajaran', 'trim|required');
		$this->form_validation->set_rules('kkm', 'KKM', 'trim|required|numeric');

		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admn/pelajaran', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->admn->setTambahPelajaran();
			$this->session->set_flashdata('message', '<div class="alert alert-success">Data Mata Pelajaran Berhasil Ditambahkan</div>');
			redirect('admn/pelajaran');
		}
	}

	public function edit_pelajaran($id_pelajaran)
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');
		$data['pelajaran'] = $this->admn->getDetailPelajaran($id_pelajaran);

		$this->form_validation->set_rules('pelajaran', 'Pelajaran', 'trim|required');
		$this->form_validation->set_rules('kkm', 'KKM', 'trim|required|numeric');

		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admn/edit_pelajaran', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->admn->setEditPelajaran();
			$this->session->set_flashdata('message', '<div class="alert alert-success">Data Mata Pelajaran Berhasil Diedit</div>');
			redirect('admn/pelajaran');
		}
	}

	public function hapus_pelajaran($id_pelajaran)
	{
		$this->admn->setHapusPelajaran($id_pelajaran);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data Mata Pelajaran Berhasil Dihapus</div>');
		redirect('admn/pelajaran');
	}

/*
| 	 Close Method Pelajaran
*/

/*
| 	Method Jadwal Pelajaran
*/

	public function jadwal_pelajaran()
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');
		$data['jadwal'] = $this->admn->getJadwal();
		$data['jdwl'] = $this->admn->getJadwalBaru();
		$data['hari'] = [1,2,3,4,5,6,7];
		$data['kelas'] = $this->admn->getKelas();
		$data['pelajaran'] = $this->admn->getPelajaran();
		$data['guru'] = $this->admn->getGuru();

		$this->form_validation->set_rules('hari', 'Hari', 'trim|required');
		$this->form_validation->set_rules('id_kelas_jadwal', 'id kelas jadwal', 'trim|required');
		$this->form_validation->set_rules('id_pelajaran_jadwal', 'id pelajaran jadwal', 'trim|required');
		$this->form_validation->set_rules('nip_guru', 'nip guru', 'trim|required');
		$this->form_validation->set_rules('jam_mulai', 'jam mulai', 'trim|required');
		$this->form_validation->set_rules('jam_selesai', 'jam selesai', 'trim|required');

		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admn/jadwal_pelajaran', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->admn->setTambahJadwal();
			$this->session->set_flashdata('message', '<div class="alert alert-success">Jadwal Pelajaran Berhasil Ditambah</div>');
			redirect('admn/jadwal_pelajaran');
		}
	}

	public function jadwal_hari($hari)
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');
		$data['jadwal'] = $this->admn->getJadwalByHari($hari);
		$data['jdwl'] = $this->admn->getJadwalBaru();
		$data['hari'] = [1,2,3,4,5,6,7];
		$data['kelas'] = $this->admn->getKelas();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admn/jadwal_hari', $data);
		$this->load->view('templates/footer');
	}

	public function jadwal_kelas($id_kelas)
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');
		$data['jadwal'] = $this->admn->getJadwalByKelas($id_kelas);
		$data['jdwl'] = $this->admn->getJadwalBaru();
		$data['hari'] = [1,2,3,4,5,6,7];
		$data['kelas'] = $this->admn->getKelas();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admn/jadwal_kelas', $data);
		$this->load->view('templates/footer');
	}

	public function edit_jadwal($id_jadwal)
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');
		$data['jadwal'] = $this->admn->getDetailJadwal($id_jadwal);
		$data['kelas'] = $this->admn->getKelas();
		$data['pelajaran'] = $this->admn->getPelajaran();
		$data['guru'] = $this->admn->getGuru();
		$data['hari'] = ['1', '2', '3', '4', '5'];

		$this->form_validation->set_rules('hari', 'Hari', 'trim|required');
		$this->form_validation->set_rules('id_kelas_jadwal', 'id kelas jadwal', 'trim|required');
		$this->form_validation->set_rules('id_pelajaran_jadwal', 'id pelajaran jadwal', 'trim|required');
		$this->form_validation->set_rules('nip_guru', 'nip guru', 'trim|required');
		$this->form_validation->set_rules('jam_mulai', 'jam mulai', 'trim|required');
		$this->form_validation->set_rules('jam_selesai', 'jam selesai', 'trim|required');

		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admn/edit_jadwal', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->admn->setEditJadwal();
			$this->session->set_flashdata('message', '<div class="alert alert-success">Jadwal Pelajaran Berhasil Diedit</div>');
			redirect('admn/jadwal_pelajaran');
		}


	}

	public function hapus_jadwal($id_jadwal)
	{
		$this->admn->setHapusJadwal($id_jadwal);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Jadwal Pelajaran Berhasil Dihapus</div>');
		redirect('admn/jadwal_pelajaran');
	}

/*
| 	 Close Method Jadwal Pelajaran
*/

/*
| 	Method Kelas & Jurusan
*/

	public function kelas()
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');
		$data['kls'] = $this->admn->getKelas();
		$data['jurusan'] = $this->admn->getJurusan();

		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required');
		
		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admn/kelas', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->admn->setTambahKelas();
			$this->session->set_flashdata('message', '<div class="alert alert-success">Data Kelas Berhasil Ditambah</div>');
			redirect('admn/kelas');
		}
	}

	public function edit_kelas($id_kelas)
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');
		$data['kls'] = $this->admn->getDetailKelas($id_kelas);

		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required');

		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admn/edit_kelas', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->admn->setEditKelas();
			$this->session->set_flashdata('message', '<div class="alert alert-success">Data Kelas Berhasil Diedit</div>');
			redirect('admn/kelas');
		}
	}

	public function hapus_kelas($id_kelas)
	{
		$this->admn->setHapusKelas($id_kelas);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data Kelas Berhasil Dihapus</div>');
		redirect('admn/kelas');
	}

	public function jurusan()
	{
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
		
		if ($this->form_validation->run() == false) 
		{
			redirect('admn/kelas');
		} 
		else 
		{
			$this->admn->setTambahJurusan();
			$this->session->set_flashdata('pesan_jur', '<div class="alert alert-success">Data Jurusan Berhasil Ditambah</div>');
			redirect('admn/kelas');
		}
	}

	public function hapus_jurusan($id_jurusan)
	{
		$this->admn->setHapusJurusan($id_jurusan);
		$this->session->set_flashdata('pesan_jur', '<div class="alert alert-success">Data Jurusan Berhasil Dihapus</div>');
		redirect('admn/kelas');
	}


/*
| 	 Close Method Kelas & Jurusan
*/

/*
| 	Method Pendaftaran
*/

	public function pendaftaran()
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');
		$data['daftar'] = $this->admn->getPendaftaran();

		if(htmlspecialchars($this->input->post('cari', TRUE)))
		{
			$data['keyword'] = htmlspecialchars($this->input->post('keyword', TRUE));
			$this->session->set_userdata('keyword', $data['keyword']);
		}
		elseif(htmlspecialchars($this->input->post('unset', TRUE)))
		{
			$this->session->unset_userdata('keyword');
			$data['keyword'] = null;
		}
		else
		{
			$data['keyword'] = $this->session->userdata('keyword');
		}

		$config['base_url'] = 'http://smkmadanidepok.epizy.com/admn/pendaftaran';

		$this->db->like('nama_lengkap', $data['keyword']);
		$this->db->or_like('no_daftar', $data['keyword']);
		$this->db->or_like('email', $data['keyword']);
		$this->db->or_like('asal_sekolah', $data['keyword']);
		$this->db->from('pendaftaran');

		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 20;
		$data['start'] = $this->uri->segment(3);
		$data['total_rows'] = $config['total_rows'];

		$this->pagination->initialize($config);

		$data['daftar'] = $this->admn->getLimitPendaftaran($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admn/pendaftaran', $data);
		$this->load->view('templates/footer');
	}

	public function detail_pendaftaran($id_daftar)
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');
		$data['daftar'] = $this->admn->getDetailPendaftaran($id_daftar);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admn/detail_pendaftaran', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_pendaftaran($id_daftar, $no_daftar)
	{
		$this->admn->setHapusPendaftaran($id_daftar, $no_daftar);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasi Dihapus</div>');
		redirect('admn/pendaftaran');
	}

	public function pembayaran_pendaftaran()
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');

		if(htmlspecialchars($this->input->post('cari')))
		{
			$data['keyword'] = htmlspecialchars($this->input->post('keyword', TRUE));
			$this->session->set_userdata('keyword', $data['keyword']);
		}
		elseif(htmlspecialchars($this->input->post('unset')))
		{
			$this->session->unset_userdata('keyword');
			$data['keyword'] = null;
		}
		else
		{
			$data['keyword'] = $this->session->userdata('keyword');
		}

		$config['base_url'] = 'http://smkmadanidepok.epizy.com/admn/pembayaran_pendaftaran';

		$this->db->like('nama_lengkap_pembayaran', $data['keyword']);
		$this->db->or_like('no_daftar_pembayaran', $data['keyword']);
		$this->db->or_like('email', $data['keyword']);
		$this->db->from('tabel_pembayaran');

		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 20;
		$data['start'] = $this->uri->segment(3);
		$data['total_rows'] = $config['total_rows'];

		$this->pagination->initialize($config);

		$data['bayar'] = $this->admn->getLimitBayarPendaftaran($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admn/pembayaran_pendaftaran', $data);
		$this->load->view('templates/footer');
	}

	public function konfirm_pendaftaran($id_daftar, $no_daftar)
	{
		$data = $this->admn->getDetailPendaftaran($id_daftar, $no_daftar);
		$this->admn->setKonfirmPendaftaran($id_daftar, $no_daftar);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data Pembayaran <strong>'. $data['nama_lengkap'] .' </strong> Berhasil Dikonfirmasi</div>');
		redirect('admn/Pendaftaran');
	}

	public function batalkonfirm_pendaftaran($id_daftar, $no_daftar)
	{
		$data = $this->admn->getDetailPendaftaran($id_daftar, $no_daftar);
		$this->admn->setBatalKonfirmPendaftaran($id_daftar, $no_daftar);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data Pembayaran <strong>'. $data['nama_lengkap'] .' </strong> Dibatalkan konfirmasi</div>');
		redirect('admn/Pendaftaran');
	}

	public function konfirm_pembayaran($id_pembayaran)
	{
		$data = $this->admn->getDetailPembayaran($id_pembayaran);
		$this->admn->setKonfirmPembayaran($id_pembayaran);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data Pembayaran <strong>'. $data['nama_lengkap_pembayaran'] .' </strong> Berhasil konfirmasi</div>');
		redirect('admn/pembayaran_pendaftaran');
	}

	public function batalkonfirm_pembayaran($id_pembayaran)
	{
		$data = $this->admn->getDetailPembayaran($id_pembayaran);
		$this->admn->setBatalKonfirmPembayaran($id_pembayaran);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data Pembayaran <strong>'. $data['nama_lengkap_pembayaran'] .' </strong> Dibatalkan konfirmasi</div>');
		redirect('admn/pembayaran_pendaftaran');
	}

	public function hapus_pembayaran($id_pembayaran)
	{
		$this->admn->setHapusPembayaran($id_pembayaran);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasi Dihapus</div>');
		redirect('admn/pembayaran_pendaftaran');
	}

/*
| 	 Close Method Pendaftaran
*/

/*
| 	Method User
*/

	public function user()
	{
		$data['title'] = 'Halaman Admin';
		$data['user'] = $this->admn->getAdmnUser($this->session->userdata('username'));
		$data['level'] = $this->session->userdata('level');
		$data['restrict'] = $this->admn->getAllUser();
		$data['adm'] = $this->admn->getAdmn();

		$this->form_validation->set_rules('username_guru', 'Username guru', 'trim|numeric|is_unique[tabel_user.username]');
		$this->form_validation->set_rules('username_siswa', 'Username siswa', 'trim|numeric|is_unique[tabel_user.username]');
 
		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admn/user', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			if(htmlspecialchars($this->input->post('username_guru', TRUE)))
			{
				$result = $this->admn->getNipGuru(htmlspecialchars($this->input->post('username_guru', TRUE)));

				if(!empty($result))
				{
					$this->admn->setTambahUserGuru($result);
					$this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Ditambah</div>');
					redirect('admn/user');
				}
				else
				{
					$this->session->set_flashdata('message', '<div class="alert alert-success">Data Tidak Ditemukan</div>');
					redirect('admn/user');
				}
 			}
			elseif(htmlspecialchars($this->input->post('username_siswa', TRUE)))
			{
				$result = $this->admn->getNisSiswa(htmlspecialchars($this->input->post('username_siswa', TRUE)));

				if(!empty($result))
				{
					$this->admn->setTambahUserSiswa($result);
					$this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Ditambah</div>');
					redirect('admn/user');
				}
				else
				{
					$this->session->set_flashdata('message', '<div class="alert alert-success">Data Tidak Ditemukan</div>');
					redirect('admn/user');
				}
			}
		}
	}

	public function user_admn()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tabel_admin.username]');
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password2', 'trim|required|matches[password1]');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');

		if($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('message', '<div class="alert alert-success">Data Gagal Ditambahkan Perhatikan Rules</div>');
			redirect('admn/user', $data);
		}
		else
		{
			$this->admn->setTambahUserAdmin();
			$this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Ditambahkan</div>');
			redirect('admn/user');
		}
	}

	public function hapus_admin($id_admin, $username)
	{
		$this->admn->setHapusAdmin($id_admin, $username);		
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Diaktifkan</div>');
		redirect('admn/user');
	}

	public function aktifkan_admin($id_admin, $username)
	{
		$this->admn->setAktifAdmin($id_admin, $username);		
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Diaktifkan</div>');
		redirect('admn/user');
	}

	public function nonaktifkan_admin($id_admin, $username)
	{
		$this->admn->setNonAktifAdmin($id_admin, $username);		
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Dinonaktifkan</div>');
		redirect('admn/user');
	}

	public function aktifkan_user($username, $id_user)
	{
		$this->admn->setAktifUser($username, $id_user);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Diaktifkan</div>');
		redirect('admn/user');
	}

	public function nonaktifkan_user($username, $id_user)
	{
		$this->admn->setNonAktifUser($username, $id_user);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Dinonaktifkan</div>');
		redirect('admn/user');
	}

	public function hapus_user($username, $id_user)
	{
		$this->admn->setHapusUser($username, $id_user);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Data Berhasil Dihapus</div>');
		redirect('admn/user');
	}

	

/*
| 	 Close Method User
*/


}

/*
|	Close Class
*/
