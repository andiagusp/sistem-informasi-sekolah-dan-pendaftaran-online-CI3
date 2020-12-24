<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->library('pagination');
		$this->session->userdata('username');
		$this->session->userdata('level');
		$this->load->model('Guru_model', 'guru');
		cek_log();
		if($this->session->userdata('level') != 2)
		{
			redirect('Login/block');
		}
	}

	public function index()
	{
		$data['title'] = 'Halaman Guru';
		$data['user'] = $this->guru->getGuruLog($this->session->userdata('username'));
		$data['jadwal'] = $this->guru->getJadwalGuru();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_guru', $data);	
		$this->load->view('templates/topbar_guru', $data);	
		$this->load->view('guru/index', $data);
		$this->load->view('templates/footer');
	}

	public function profile_guru()
	{
		$data['title'] = 'Halaman Guru';
		$data['user'] = $this->guru->getGuruLog($this->session->userdata('username'));

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_guru', $data);	
		$this->load->view('templates/topbar_guru', $data);	
		$this->load->view('guru/profile_guru', $data);
		$this->load->view('templates/footer');
	}

	public function siswa()
	{
		$data['title'] = 'Halaman Guru';
		$data['user'] = $this->guru->getGuruLog($this->session->userdata('username'));
		$data['kelas'] = $this->guru->getKelasGuru();

		$config['base_url'] = 'http://smkmadanidepok.epizy.com/guru/siswa';

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

		$this->db->like('nis', $data['keyword']);
		$this->db->or_like('nama_lengkap_siswa', $data['keyword']);
		$this->db->from('tabel_siswa');

		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 30;
 		$data['total_rows'] = $config['total_rows'];

 		$this->pagination->initialize($config);
 		$data['start'] = $this->uri->segment(3);

		$data['siswa'] = $this->guru->getLimitSiswaGuru($config['per_page'], $data['start'], $data['keyword']);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_guru', $data);	
		$this->load->view('templates/topbar_guru', $data);	
		$this->load->view('guru/siswa', $data);
		$this->load->view('templates/footer');
	}

	public function detail_siswa($nis)
	{
		$data['title'] = 'Halaman Guru';
		$data['user'] = $this->guru->getGuruLog($this->session->userdata('username'));
		$data['siswa'] = $this->guru->getDetailSiswa($nis);


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_guru', $data);	
		$this->load->view('templates/topbar_guru', $data);	
		$this->load->view('guru/detail_siswa', $data);
		$this->load->view('templates/footer');
	}

	public function siswa_kelas($id_kelas)
	{
		$data['title'] = 'Halaman Guru';
		$data['user'] = $this->guru->getGuruLog($this->session->userdata('username'));
		$data['siswa'] = $this->guru->getSiswaKelasGuru($id_kelas);
		

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_guru', $data);	
		$this->load->view('templates/topbar_guru', $data);	
		$this->load->view('guru/siswa_kelas', $data);
		$this->load->view('templates/footer');
	}

	public function kelas_guru()
	{
		$data['title'] = 'Halaman Guru';
		$data['user'] = $this->guru->getGuruLog($this->session->userdata('username'));
		$data['kelas'] = $this->guru->getKelasGuru();
		$data['jurusan'] = $this->guru->getJurusanGuru();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_guru', $data);	
		$this->load->view('templates/topbar_guru', $data);	
		$this->load->view('guru/kelas_guru', $data);
		$this->load->view('templates/footer');
	}

	public function pelajaran_guru()
	{
		$data['title'] = 'Halaman Guru';
		$data['user'] = $this->guru->getGuruLog($this->session->userdata('username'));
		$data['pelajaran'] = $this->guru->getPelajaranGuru();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_guru', $data);	
		$this->load->view('templates/topbar_guru', $data);	
		$this->load->view('guru/pelajaran_guru', $data);
		$this->load->view('templates/footer');
	}

	public function jadwal_guru()
	{
		$data['title'] = 'Halaman Guru';
		$data['user'] = $this->guru->getGuruLog($this->session->userdata('username'));
		$data['jadwal'] = $this->guru->getJadwalGuru();
		$data['kelas'] = $this->guru->getKelasGuru();
		$data['hari'] = [1,2,3,4,5,6,7];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_guru', $data);	
		$this->load->view('templates/topbar_guru', $data);	
		$this->load->view('guru/jadwal_guru', $data);
		$this->load->view('templates/footer');
	}

	public function jadwal_kelas($kelas)
	{
		$data['title'] = 'Halaman Guru';
		$data['user'] = $this->guru->getGuruLog($this->session->userdata('username'));
		$data['jadwal'] = $this->guru->getJadwalByQuery($kelas);
		$data['kelas'] = $this->guru->getKelasGuru();
		$data['hari'] = [1,2,3,4,5,6,7];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_guru', $data);	
		$this->load->view('templates/topbar_guru', $data);	
		$this->load->view('guru/jadwal_guru', $data);
		$this->load->view('templates/footer');
	}

	public function jadwal_hari($hari)
	{
		$data['title'] = 'Halaman Guru';
		$data['user'] = $this->guru->getGuruLog($this->session->userdata('username'));
		$data['jadwal'] = $this->guru->getJadwalByHari($hari);
		$data['kelas'] = $this->guru->getKelasGuru();
		$data['hari'] = [1,2,3,4,5,6,7];

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar_guru', $data);	
		$this->load->view('templates/topbar_guru', $data);	
		$this->load->view('guru/jadwal_kelas', $data);
		$this->load->view('templates/footer');
	}

	public function nilai()
	{
		$data['title'] = 'Halaman Guru';
		$data['user'] = $this->guru->getGuruLog($this->session->userdata('username'));
		$data['pelajaran'] = $this->guru->getPelajaranGuru();

		$config['base_url'] = 'http://smkmadanidepok.epizy.com/guru/nilai/';

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
			$this->form_validation->set_rules('nis_siswa', 'nis siswa', 'trim|required|numeric');
			$this->form_validation->set_rules('id_pelajaran_nilai', 'Pelajaran', 'trim|required');
			$this->form_validation->set_rules('nilai_tugas', 'nilai tugas', 'trim|required|numeric');
			$this->form_validation->set_rules('nilai_absen', 'nilai absen', 'trim|required|numeric');
			$this->form_validation->set_rules('nilai_uts', 'nilai uts', 'trim|required|numeric');
			$this->form_validation->set_rules('nilai_uas', 'nilai uas', 'trim|required|numeric');
			$this->form_validation->set_rules('semester', 'semester', 'trim|required');
			
			$data['keyword'] = $this->session->userdata('keyword');
		}
		
		$this->db->or_like('nis_siswa', $data['keyword']);
		$this->db->from('tabel_nilai');

		$config['total_rows'] = $this->db->count_all_results();
		$config['per_page'] = 30;
 		$data['total_rows'] = $config['total_rows'];

		$this->pagination->initialize($config);
		$data['start'] = $this->uri->segment(3);

		$data['nilai'] = $this->guru->getLimitNilaiSiswa($data['user'], $config['per_page'], $data['start'], $data['keyword']);

		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_guru', $data);	
			$this->load->view('templates/topbar_guru', $data);	
			$this->load->view('guru/nilai', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$nip_guru = $data['user']['nip'];
			$siswa = $this->guru->getNamaSiswa(htmlspecialchars($this->input->post('nis_siswa', TRUE)));
			$pel = htmlspecialchars($this->input->post('id_pelajaran_nilai', TRUE));
			$nilai_tugas = htmlspecialchars($this->input->post('nilai_tugas', TRUE));
			$nilai_absen = htmlspecialchars($this->input->post('nilai_absen', TRUE));
			$nilai_uts = htmlspecialchars($this->input->post('nilai_uts', TRUE));
			$nilai_uas = htmlspecialchars($this->input->post('nilai_uas', TRUE));
			$semester = htmlspecialchars($this->input->post('semester', TRUE));

			if($siswa)
			{
				$data = [
					'id_nilai' => '',
					'nip_guru' => $nip_guru,
					'nis_siswa' => $siswa['nis'],
					'id_pelajaran_nilai' => $pel,
					'nilai_tugas' => $nilai_tugas,
					'nilai_absen' => $nilai_absen,
					'nilai_uts' => $nilai_uts,
					'nilai_uas' => $nilai_uas,
					'semester' => $semester
				];
				$this->guru->setTambahNilai($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success">Nilai <strong>'. $siswa['nama_lengkap_siswa'] .'</strong> berhasil ditambahkan</div>');
				redirect('guru/nilai');
			}
			else
			{
				$this->session->set_flashdata('message', '<div class="alert alert-success">Data Tidak Ditemukan</div>');
				redirect('guru/nilai');
			}
		}
	}

	public function edit_nilai($id_nilai)
	{
		$data['title'] = 'Halaman Guru';
		$data['user'] = $this->guru->getGuruLog($this->session->userdata('username'));
		$data['nilai'] = $this->guru->getDetailNilai($id_nilai);
		$data['pel'] = $this->guru->getPelajaranGuru();

		$this->form_validation->set_rules('nis_siswa', 'nis siswa', 'trim|required|numeric');
		$this->form_validation->set_rules('id_pelajaran_nilai', 'Pelajaran', 'trim|required');
		$this->form_validation->set_rules('nilai_tugas', 'nilai tugas', 'trim|required|numeric');
		$this->form_validation->set_rules('nilai_absen', 'nilai absen', 'trim|required|numeric');
		$this->form_validation->set_rules('nilai_uts', 'nilai uts', 'trim|required|numeric');
		$this->form_validation->set_rules('nilai_uas', 'nilai uas', 'trim|required|numeric');
		$this->form_validation->set_rules('semester', 'semester', 'trim|required');

		if($this->form_validation->run() == false)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar_guru', $data);	
			$this->load->view('templates/topbar_guru', $data);	
			$this->load->view('guru/edit_nilai', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$key = htmlspecialchars($this->input->post('id_nilai', TRUE));
 			$nip_guru = $data['user']['nip'];
			$siswa = $this->guru->getNamaSiswa(htmlspecialchars($this->input->post('nis_siswa', TRUE)));
			$pel = htmlspecialchars($this->input->post('id_pelajaran_nilai', TRUE));
			$nilai_tugas = htmlspecialchars($this->input->post('nilai_tugas', TRUE));
			$nilai_absen = htmlspecialchars($this->input->post('nilai_absen', TRUE));
			$nilai_uts = htmlspecialchars($this->input->post('nilai_uts', TRUE));
			$nilai_uas = htmlspecialchars($this->input->post('nilai_uas', TRUE));
			$semester = htmlspecialchars($this->input->post('semester', TRUE));

			if($siswa)
			{
				$data = [
					'nip_guru' => $nip_guru,
					'nis_siswa' => $siswa['nis'],
					'id_pelajaran_nilai' => $pel,
					'nilai_tugas' => $nilai_tugas,
					'nilai_absen' => $nilai_absen,
					'nilai_uts' => $nilai_uts,
					'nilai_uas' => $nilai_uas,
					'semester' => $semester
				];
				$this->guru->setEditNilai($data, $key);
				$this->session->set_flashdata('message', '<div class="alert alert-success">Nilai <strong>'. $siswa['nama_lengkap_siswa'] .'</strong> berhasil diedit</div>');
				redirect('guru/nilai');
			}
			else
			{
				$this->session->set_flashdata('message', '<div class="alert alert-success">Data Tidak Ditemukan</div>');
				redirect('guru/nilai');
			}
		}
	}

	public function hapus_nilai($id_nilai)
	{
		$this->guru->setHapusNilai($id_nilai);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Nilai Berhasil Dihapus</div>');
		redirect('guru/nilai');
	}

}

/*
|	Close Class
*/
