	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-6">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Detail Siswa</h1>
  			
  				<div class="card">
  					<div class="card-header">Tabel Detail Siswa</div>
  					<div class="card-body">
              <a href="<?= base_url('guru/siswa'); ?>" class="btn btn-primary mb-2">
                Kembali
              </a>
  						<div class="table-responsive">
  							<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Ket</th>
                      <th>Isi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>NIS</td>
                      <td><?= $siswa['nis']; ?></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Nama Lengkap</td>
                      <td><?= $siswa['nama_lengkap_siswa']; ?></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Nama Panggilan</td>
                      <td><?= $siswa['nama_panggilan_siswa']; ?></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Kelas</td>
                      <td><?= $siswa['kelas']; ?></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Jurusan</td>
                      <td><?= $siswa['jurusan']; ?></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Tempat Lahir</td>
                      <td><?= $siswa['tempat_lahir_siswa']; ?></td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>Tanggal Lahir</td>
                      <td><?= $siswa['tanggal_lahir_siswa']; ?></td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>Jenis Kelamin</td>
                      <td><?= $siswa['jenis_kelamin_siswa']; ?></td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>Agama</td>
                      <td><?= $siswa['agama_siswa']; ?></td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td>Alamat</td>
                      <td><?= $siswa['alamat_siswa']; ?></td>
                    </tr>
                    <tr>
                      <td>11</td>
                      <td>Telepon</td>
                      <td><?= $siswa['telepon_siswa']; ?></td>
                    </tr>
                    <tr>
                      <td>12</td>
                      <td>Nama Ayah</td>
                      <td><?= $siswa['nama_ayah_siswa']; ?></td>
                    </tr>
                    <tr>
                      <td>13</td>
                      <td>Nama Ibu</td>
                      <td><?= $siswa['nama_ibu_siswa']; ?></td>
                    </tr>
                    <tr>
                      <td>14</td>
                      <td>Tahun Ajaran</td>
                      <td><?= $siswa['tahun_ajaran']; ?></td>
                    </tr>
                  </tbody>       
                </table>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>


	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -