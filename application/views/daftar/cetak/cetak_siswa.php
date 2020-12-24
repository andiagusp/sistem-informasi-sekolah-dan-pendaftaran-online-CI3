<?php

$pdf = new Pdf('P', 'mm', 'A4');
$pdf->setTitle('Cetak Siswa');
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

$pdf->SetFont('Helvetica', '', 10);
$pdf->Cell(190, 10, 'Daftar Siswa', 0, 1, 'C');


$pdf->Ln();
$pdf->Ln(2);

$html = '
<style>
			.hed {
				width: 20px;
			}
			table {
				border-collapse: collapse;
			}
			th, td {
				border: 1px solid #888;
			}
			table tr th {
				background-color: #888;
				color: #fff;
				font-weight: bold;
			}
		</style>
	<table>
		<thead>
			<tr>
				<th class="hed">No</th>
				<th>NIS</th>
				<th>Nama Siswa</th>
				<th>Kelas</th>
				<th>Jurusan</th>
				<th>Jenis Kelamin</th>
				<th>Tahun Ajaran</th>
			</tr>
		</thead>
		
';


$i = 1;
foreach($siswa as $s):

	$html .= '
		<tbody>
			<tr>
				<td class="hed">'. $i++ .'</td>
				<td>'. $s['nis'] .'</td>
				<td>'. $s['nama_lengkap_siswa'] .'</td>
				<td>'. $s['kelas'] .'</td>
				<td>'. $s['jurusan'] .'</td>
				<td>'. $s['jenis_kelamin_siswa'] .'</td>
				<td>'. $s['tahun_ajaran'] .'</td>
			</tr>
		</tbody>
	';

endforeach;
$html .= '</table>';

$pdf->WriteHTMLCell(192, 0, 9, '', $html, 0);
$pdf->Output('Seluruh Siswa.pdf', 'I'); 

/*
	$pdf->Cell(10, 5, $i++, 1);
	$pdf->Cell(30, 5, $s['nis'], 1);
	$pdf->Cell(45, 5, $s['nama_lengkap_siswa'], 1);
	$pdf->Cell(15, 5, $s['kelas'], 1);
	$pdf->Cell(50, 5, $s['jurusan'], 1);
	$pdf->Cell(30, 5, $s['jenis_kelamin_siswa'], 1);
	$pdf->Cell(10, 5, $s['tahun_ajaran'], 1);
	$pdf->Ln();
*/