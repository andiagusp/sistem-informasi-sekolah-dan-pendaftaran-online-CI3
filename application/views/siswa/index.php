	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-12">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Halo Selamat Datang <?= $user['nama_lengkap_siswa']; ?></h1>
  			</div>

        <!-- Jadwal Hari Ini -->
        <div class="col-lg-12 mb-2">
  				<div class="card shadow">
            <div class="card-header">Jadwal Anda Hari Ini</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Hari</th>
                      <th>Kelas</th>
                      <th>Pelajaran</th>
                      <th>Kode Guru</th>
                      <th>Nama Guru</th>
                      <th>Jam Mulai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach($jadwal as $jwl): ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= cek_h($jwl['hari']); ?></td>
                      <td><?= $jwl['kelas']; ?></td>
                      <td><?= $jwl['pelajaran']; ?></td>
                      <td><?= $jwl['akronim']; ?></td>
                      <td><?= $jwl['nama_guru']; ?></td>
                      <td><?= $jwl['jam_mulai']; ?> - <?= $jwl['jam_selesai']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                  <?php if(empty($jadwal)): ?>
                    <div class="alert alert-danger">Tidak Ada Pelajaran</div>
                  <?php endif; ?>
              </div>
            </div>
          </div>
  			</div>
        <!-- Close Jadwal  -->
  		</div>


	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->