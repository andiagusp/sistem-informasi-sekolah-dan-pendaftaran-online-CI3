<?php 

function cek($angka)
{
	if($angka == 1)
	{
		return 'Aktif';
	}
	else
	{
		return 'Tidak aktif';
	}
}

function cek_log()
{
	$s = get_instance();
	if(empty($s->session->userdata('username')) && empty($s->session->userdata('level')))
	{
		$s->session->set_flashdata('message', '<div class="alert alert-danger">Login Dahulu</div>');
		redirect('login');
	}
}

function cek_log_cpdb()
{
	$s = get_instance();
	if(empty($s->session->userdata('email')) && empty($s->session->userdata('level')))
	{
		$s->session->set_flashdata('message', '<div class="alert alert-danger">Login Dahulu</div>');
		redirect('login');
	}
}

function cetak_log()
{
	$s = get_instance();
	if(empty($s->session->userdata('level')))
	{
		$s->session->set_flashdata('message', '<div class="alert alert-danger">Login Dahulu</div>');
		redirect('login');
	}
}

function cek_akt($number)
{
	if($number == 1)
	{
		return 'Aktif';
	}
	else
	{
		return 'Tidak Aktif';
	}
}

function cek_h($angka)
{
	if($angka == 1){ return 'senin' ;}
	elseif($angka == 2){ return 'selasa' ;}
	elseif($angka == 3){ return 'rabu' ;}
	elseif($angka == 4){ return 'kamis' ;}
	elseif($angka == 5){ return 'jumat' ;}
	elseif($angka == 6){ return 'sabtu' ;}
	elseif($angka == 7){ return 'minggu' ;}
}

function test_cetak()
{
	return 'test';	
}

function cek_hari($hari)
{
	if($hari == 'Mon'){return 1;}
	elseif($hari == 'Tue'){return 2;}
	elseif($hari == 'Wed'){return 3;}	
	elseif($hari == 'Thu'){return 4;}
	elseif($hari == 'Fri'){return 5;}	
	elseif($hari == 'Sat'){return 6;}
	elseif($hari == 'Sun'){return 7;}	
}