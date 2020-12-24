<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
	public function getUserLog($username)
	{
		return $this->db->get_where('tabel_user', ['username' => $username])->row_array();
	}

	public function getAdminLog($username)
	{
		return $this->db->get_where('tabel_admin', ['username' => $username])->row_array();
	}

	public function getUserCpdbLog($email)
	{
		$this->db->select('id_daftar, no_daftar, tanggal_lahir, email, role');
		$this->db->where('email', $email);
		return $this->db->get('pendaftaran')->row_array();
	}
}
