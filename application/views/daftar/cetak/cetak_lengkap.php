 <?php

$pdf = new Pdf('P', 'mm', 'A4');
$pdf->setTitle('Cetak Calon Siswa');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();


$pdf->Image(base_url('assets/img/logo.png'), 15, 12, 25, 25, 'PNG');
$pdf->SetFont('Helvetica', '', 14);
$pdf->Cell(60, 5, '', 0);
$pdf->Cell(80, 5, 'SMK MADANI DEPOK', 0, 1, 'C');

$pdf->SetFont('Helvetica', '', 11);
$pdf->Cell(60, 5, '', 0);
$pdf->Cell(80, 5, 'TERAKREDITASI "A"', 0, 1, 'C');

$pdf->SetFont('Helvetica', '', 10);
$pdf->Cell(60, 5, '', 0);
$pdf->Cell(80, 5, 'KOMPETENSI KEAHLIAN TEKNIK KOMPUTER DAN JARINGAN', 0, 1, 'C');

$pdf->SetFont('Helvetica', '', 10);
$pdf->Cell(60, 5, '', 0);
$pdf->Cell(80, 5, 'KOMPETENSI KEAHLIAN TEKNIK KENDARAAN RINGAN', 0, 1, 'C');

$pdf->SetFont('Helvetica', '', 8);
$pdf->Cell(60, 5, '', 0);
$pdf->Cell(80, 5, 'IZIN OPERASIONAL SEKOLAH WALIKOTA DEPOK NO. 421.4/1623/Disdik/2009', 0, 1, 'C');

$pdf->SetFont('Helvetica', '', 8);
$pdf->Cell(60, 5, '', 0);
$pdf->Cell(80, 5, 'Jl. Mandor Samin RT 02/06 Kel. Kalibaru Kec. Cilodong Kota Depok 16414 Telp. 021-77841453', 0, 1, 'C');

$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Helvetica', '', 12);
$pdf->Cell(190, 5, 'Keterangan Daftar', 0, 1, 'C');

/* KOMPETENSI KEAHLIAN TEKNIK KOMPUTER DAN JARINGAN
KOMPETENSI KEAHLIAN TEKNIK KENDARAAN RINGAN
IZIN OPERASIONAL SEKOLAH WALIKOTA DEPOK NO. 421.4/1623/Disdik/2009
Jl. Mandor Samin RT 02/06 Kel. Kalibaru Kec. Cilodong Kota Depok 16414 Telp. 021-77841453*/

$pdf->Ln();
$pdf->Ln(4);


$html = '
	<style>
		table {
			border-collapse: collapse;
		}
		.s {
			width: 40px;
		}
		.d {
			width: 150px;
		}
	</style>
	<table cellpadding="10">
		<tr>
			<td class="s">1</td>
			<td class="d">No Daftar</td>
			<td class="t"> : '.$daftar['no_daftar'].'</td>
		</tr>

		<tr>
			<td class="s">2</td>
			<td class="d">Tanggal Daftar</td>
			<td class="t"> : '.$daftar['tanggal_daftar'].'</td>
		</tr>

		<tr>
			<td class="s">3</td>
			<td class="d">Nama Lengkap</td>
			<td class="t"> : '.$daftar['nama_lengkap'].'</td>
		</tr>

		<tr>
			<td class="s">4</td>
			<td class="d">Nama Panggilan</td>
			<td class="t"> : '.$daftar['nama_panggilan'].'</td>
		</tr>

		<tr>
			<td class="s">5</td>
			<td class="d">NISN</td>
			<td class="t"> : '.$daftar['nisn'].'</td>
		</tr>

		<tr>
			<td class="s">6</td>
			<td class="d">No KIS/KIP/dll</td>
			<td class="t"> : '.$daftar['no_kartu_kes'].'</td>
		</tr>

		<tr>
			<td class="s">7</td>
			<td class="d">Jenis Kelamin</td>
			<td class="t"> : '.$daftar['jenis_kelamin'].'</td>
		</tr>

		<tr>
			<td class="s">8</td>
			<td class="d">Tempat Lahir</td>
			<td class="t"> : '.$daftar['tempat_lahir'].'</td>
		</tr>

		<tr>
			<td class="s">9</td>
			<td class="d">Tanggal Lahir</td>
			<td class="t"> : '.$daftar['tanggal_lahir'].'</td>
		</tr>

		<tr>
			<td class="s">10</td>
			<td class="d">Agama</td>
			<td class="t"> : '.$daftar['agama'].'</td>
		</tr>

		<tr>
			<td class="s">11</td>
			<td class="d">Email</td>
			<td class="t"> : '.$daftar['email'].'</td>
		</tr>

		<tr>
			<td class="s">12</td>
			<td class="d">Kewarganegaraan</td>
			<td class="t"> : '.$daftar['kewarganegaraan'].'</td>
		</tr>

		<tr>
			<td class="s">13</td>
			<td class="d">Anak Ke </td>
			<td class="t"> : '.$daftar['anakke'].'</td>
		</tr>

		<tr>
			<td class="s">14</td>
			<td class="d">Jumlah Saudara</td>
			<td class="t"> : '.$daftar['jumlah_saudara'].'</td>
		</tr>

		<tr>
			<td class="s">15</td>
			<td class="d">Yatim/Piatu/Yatim Piatu</td>
			<td class="t"> : '.$daftar['status_anak'].'</td>
		</tr>

		<tr>
			<td class="s">16</td>
			<td class="d">Bahasa</td>
			<td class="t"> : '.$daftar['bahasa'].'</td>
		</tr>

		<tr>
			<td class="s">17</td>
			<td class="d">Jurusan</td>
			<td class="t"> : '.$daftar['jurusan'].'</td>
		</tr>

		<tr>
			<td class="s">18</td>
			<td class="d">Alamat</td>
			<td class="t"> : '.$daftar['alamat'].'</td>
		</tr>

		<tr>
			<td class="s">19</td>
			<td class="d">Telepon</td>
			<td class="t"> : '.$daftar['telepon'].'</td>
		</tr>

		<tr>
			<td class="s">20</td>
			<td class="d">Tinggal Dengan</td>
			<td class="t"> : '.$daftar['tinggal_dengan'].'</td>
		</tr>

		<tr>
			<td class="s">21</td>
			<td class="d">Jarak</td>
			<td class="t"> : '.$daftar['jarak'].'</td>
		</tr>

		<tr>
			<td class="s">22</td>
			<td class="d">Ke Sekolah Naik</td>
			<td class="t"> : '.$daftar['kendaraan'].'</td>
		</tr>

		<tr>
			<td class="s">23</td>
			<td class="d">Berat Badan</td>
			<td class="t"> : '.$daftar['berat_badan'].'</td>
		</tr>

		<tr>
			<td class="s">24</td>
			<td class="d">Tinggi Badan</td>
			<td class="t"> : '.$daftar['tinggi_badan'].'</td>
		</tr>

		<tr>
			<td class="s">25</td>
			<td class="d">Gol Darah</td>
			<td class="t"> : '.$daftar['golongan_darah'].'</td>
		</tr>

		<tr>
			<td class="s">26</td>
			<td class="d">Kegemaran</td>
			<td class="t"> : '.$daftar['kegemaran'].'</td>
		</tr>

		<tr>
			<td class="s">27</td>
			<td class="d">Asal Sekolah</td>
			<td class="t"> : '.$daftar['asal_sekolah'].'</td>
		</tr>

		<tr>
			<td class="s">28</td>
			<td class="d">Alamat Sekolah</td>
			<td class="t"> : '.$daftar['alamat_sekolah'].'</td>
		</tr>

		<tr>
			<td class="s">29</td>
			<td class="d">No Ijazah</td>
			<td class="t"> : '.$daftar['no_ijazah'].'</td>
		</tr>

		<tr>
			<td class="s">30</td>
			<td class="d">No SKHUN</td>
			<td class="t"> : '.$daftar['no_skhun'].'</td>
		</tr>

		<tr>
			<td class="s">31</td>
			<td class="d">Nama  Ayah</td>
			<td class="t"> : '.$daftar['nama_ayah'].'</td>
		</tr>

		<tr>
			<td class="s">32</td>
			<td class="d">Nama Ibu</td>
			<td class="t"> : '.$daftar['nama_ibu'].'</td>
		</tr>

		<tr>
			<td class="s">33</td>
			<td class="d">Tempat Lahir Ayah</td>
			<td class="t"> : '.$daftar['tempat_lahir_ayah'].'</td>
		</tr>

		<tr>
			<td class="s">34</td>
			<td class="d">Tempat Lahir Ibu</td>
			<td class="t"> : '.$daftar['tempat_lahir_ibu'].'</td>
		</tr>

		<tr>
			<td class="s">35</td>
			<td class="d">Tanggal Lahir Ayah</td>
			<td class="t"> : '.$daftar['tanggal_lahir_ayah'].'</td>
		</tr>

		<tr>
			<td class="s">36</td>
			<td class="d">Tanggal Lahir Ibu</td>
			<td class="t"> : '.$daftar['tanggal_lahir_ibu'].'</td>
		</tr>

		<tr>
			<td class="s">37</td>
			<td class="d">Kewarganegaraan Ayah</td>
			<td class="t"> : '.$daftar['kewarganegaraan_ayah'].'</td>
		</tr>

		<tr>
			<td class="s">38</td>
			<td class="d">Kewarganegaraan Ibu</td>
			<td class="t"> : '.$daftar['kewarganegaraan_ibu'].'</td>
		</tr>

		<tr>
			<td class="s">39</td>
			<td class="d">Pendidikan Ayah</td>
			<td class="t"> : '.$daftar['pendidikan_ayah'].'</td>
		</tr>

		<tr>
			<td class="s">40</td>
			<td class="d">Pendidikan Ibu</td>
			<td class="t"> : '.$daftar['pendidikan_ibu'].'</td>
		</tr>

		<tr>
			<td class="s">41</td>
			<td class="d">Pekerjaan Ayah</td>
			<td class="t"> : '.$daftar['pekerjaan_ayah'].'</td>
		</tr>

		<tr>
			<td class="s">42</td>
			<td class="d">Pekerjaan Ibu</td>
			<td class="t"> : '.$daftar['pekerjaan_ibu'].'</td>
		</tr>

		<tr>
			<td class="s">43</td>
			<td class="d">Penghasilan Ayah</td>
			<td class="t"> : '.$daftar['penghasilan_ayah'].'</td>
		</tr>

		<tr>
			<td class="s">44</td>
			<td class="d">Penghasilan Ibu</td>
			<td class="t"> : '.$daftar['penghasilan_ibu'].'</td>
		</tr>

		<tr>
			<td class="s">45</td>
			<td class="d">Alamat Ayah</td>
			<td class="t"> : '.$daftar['alamat_ayah'].'</td>
		</tr>

		<tr>
			<td class="s">46</td>
			<td class="d">Alamat Ibu</td>
			<td class="t"> : '.$daftar['alamat_ibu'].'</td>
		</tr>

	</table>
	';

$pdf->WriteHTMLCell(192, 0, 9, '', $html, 0);
ob_end_clean();
$pdf->Output('Data Lengkap '.$daftar['no_daftar'].'.pdf', 'I');