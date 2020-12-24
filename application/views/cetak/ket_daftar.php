 <?php

$pdf = new Pdf('P', 'mm', 'A4');
$pdf->setTitle('Cetak Bukti Daftar');
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
$pdf->Cell(190, 10, 'Keterangan Daftar', 0, 1, 'C');


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
			width: 100px;
		}
	</style>
	<table cellspacing="1" cellpadding="10">
		<tr>
			<td class="s">1. </td>
			<td class="d">Nama Lenkap</td>
			<td class="t"> : '.$daftar['nama_lengkap'].'</td>
		</tr>
		<tr>
			<td class="s">2. </td>
			<td class="d">Email</td>
			<td class="t"> : '.$daftar['email'].'</td>
		</tr>
		<tr>
			<td class="s">3. </td>
			<td class="d">No Daftar</td>
			<td class="t"> : '.$daftar['no_daftar'].'</td>
		</tr>
		<tr>
			<td class="s">4. </td>
			<td class="d">Tanggal Daftar</td>
			<td class="t"> : '.$daftar['tanggal_daftar'].'</td>
		</tr>
		<tr>
			<td class="s">5. </td>
			<td class="d">Jenis Kelamin</td>
			<td class="t"> : '.$daftar['jenis_kelamin'].'</td>
		</tr>
		<tr>
			<td class="s">6. </td>
			<td class="d">Jurusan</td>
			<td class="t"> : '.$daftar['jurusan'].'</td>
		</tr>
		<tr>
			<td class="s">7. </td>
			<td class="d">NISN</td>
			<td class="t"> : '.$daftar['nisn'].'</td>
		</tr>
		<tr>
			<td class="s">8. </td>
			<td class="d">Asal Sekolah</td>
			<td class="t"> : '. $daftar['asal_sekolah'].' </td>
		</tr>
		<tr>
			<td class="s">9. </td>
			<td class="d">Status Bayar</td>
			<td class="t"> : '.$daftar['status_bayar'].' </td>
		</tr>

	</table>
';

$pdf->WriteHTMLCell(192, 0, 9, '', $html, 0);
ob_end_clean();
$pdf->Output('bukti daftar '. $daftar['no_daftar'] .'.pdf', 'I');
