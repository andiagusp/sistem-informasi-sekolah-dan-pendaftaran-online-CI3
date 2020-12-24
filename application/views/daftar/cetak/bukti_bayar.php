 <?php

$pdf = new Pdf('P', 'mm', 'A4');
$pdf->setTitle('Cetak Bukti');
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
$pdf->Cell(190, 10, 'Bukti Bayar', 0, 1, 'C');


$pdf->Ln();
$pdf->Ln(4);

$html = '
	<style>
		table {
			border-collapse: collapse;
		}
		.s {
			width: 30px;
		}
		.d {
			width: 100px;
		}
	</style>
	<table cellspacing="1" cellpadding="3">
		<tr>
			<td class="s">1</td>
			<td class="d">No Daftar</td>
			<td class="t"> : '.$bayar['no_daftar_pembayaran'].'</td>
		</tr>
		<tr>
			<td class="s">2</td>
			<td class="d">Nama</td>
			<td class="t"> : '.$bayar['nama_lengkap_pembayaran'].'</td>
		</tr>
		<tr>
			<td class="s">3</td>
			<td class="d">Email</td>
			<td class="t"> : '.$bayar['email'].'</td>
		</tr>
		<tr>
			<td class="s">4</td>
			<td class="d">Telepon</td>
			<td class="t"> : '.$bayar['telepon'].'</td>
		</tr>
		<tr>
			<td class="s">5</td>
			<td class="d">Jenis Bayar</td>
			<td class="t"> : '.$bayar['jenis_bayar'].'</td>
		</tr>
		<tr>
			<td class="s">6</td>
			<td class="d">Tanggal Bayar</td>
			<td class="t"> : '.$bayar['tanggal_bayar'].'</td>
		</tr>
		<tr>
			<td class="s">7</td>
			<td class="d">Status</td>
			<td class="t"> : '.$bayar['konfirm_status'].'</td>
		</tr>
		<tr>
			<td class="s">8</td>
			<td class="d">Bukti Bayar</td>
			<td class="t"> : </td>
		</tr>
	</table>
';
$pdf->Image(base_url('assets/img/upload/'.$bayar['foto']), 65, 135, 120, 120);

$pdf->WriteHTMLCell(192, 0, 9, '', $html, 0);
ob_end_clean();
$pdf->Output('bukti bayar '.$bayar['jenis_bayar'].'-'.$bayar['nama_lengkap_pembayaran'].'-'.$bayar['no_daftar_pembayaran'].'.pdf', 'I');

