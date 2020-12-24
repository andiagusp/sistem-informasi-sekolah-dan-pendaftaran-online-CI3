	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-12">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">
            <?php if($siswa[0]['kelas']): ?>
            Data Kelas <?= $siswa[0]['kelas']; ?>
            <?php else: ?>
              Data Kelas
            <?php endif; ?>
          </h1>
  			
  				<div class="card shadow">
  					<div class="card-header">
              <?php if($siswa[0]['kelas']): ?>
                Tabel Kelas <?= $siswa[0]['kelas']; ?>
              <?php else: ?>
                Tabel Kelas
              <?php endif; ?>    
            </div>
  					<div class="card-body">
  						<div class="table-responsive">
                <a href="<?= base_url('admn/siswa'); ?>" class="btn btn-primary mb-2">Kembali</a>
  						  <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nis</th>
                      <th>Nama</th>
                      <th>Kelas</th>
                      <th>Jurusan</th>
                      <th>Jenis Kelamin</th>
                      <th>Tahun Ajaran</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach($siswa as $s): ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $s['nis']; ?></td>
                      <td><?= $s['nama_lengkap_siswa']; ?></td>
                      <td><?= $s['kelas']; ?></td>
                      <td><?= $s['jurusan']; ?></td>
                      <td><?= $s['jenis_kelamin_siswa']; ?></td>
                      <td><?= $s['tahun_ajaran']; ?></td>
                      <td>
                        <a href="<?= base_url('admn/detail_siswa'); ?>/<?= $s['nis']; ?>" class="badge badge-primary">Detail</a>
                        <a href="<?= base_url('admn/edit_siswa'); ?>/<?= $s['nis']; ?>" class="badge badge-warning" onclick="return confirm('Edit Data <?= $s['nama_lengkap_siswa']; ?> ?');">Edit</a>
                        <a href="<?= base_url('admn/hapus_siswa'); ?>/<?= $s['nis']; ?>" class="badge badge-danger" onclick="return confirm('Hapus Data <?= $s['nama_lengkap_siswa']; ?> ?');">Hapus</a>
                      </td>
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
