	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-12">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Data Nilai </h1>
  			
  				<div class="card shadow">
  					<div class="card-header">Nilai <?= $user['nama_lengkap_siswa']; ?></div>
  					<div class="card-body">
  						<div class="table-responsive">
  							<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nip Guru</th>
                      <th>Kode guru</th>
                      <th>Nama Guru</th>
                      <th>Pelajaran</th>
                      <th>Nilai Tugas</th>
                      <th>Nilai Absen</th>
                      <th>Nilai UTS</th>
                      <th>Nilai UAS</th>
                      <th>Semester</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach($nilai as $n): ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $n['nip_guru']; ?></td>
                      <td><?= $n['akronim']; ?></td>
                      <td><?= $n['nama_guru']; ?></td>
                      <td><?= $n['pelajaran']; ?></td>
                      <td><?= $n['nilai_tugas']; ?></td>
                      <td><?= $n['nilai_absen']; ?></td>
                      <td><?= $n['nilai_uts']; ?></td>
                      <td><?= $n['nilai_uas']; ?></td>
                      <td><?= $n['semester']; ?></td>
                    </tr>
                    <?php endforeach; ?>
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
<!-- End of Main Content -->