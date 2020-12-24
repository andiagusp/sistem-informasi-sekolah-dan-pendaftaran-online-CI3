	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-12">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Jadwal Pelajaran</h1>
  			
  				<div class="card shadow mb-2">
  					<div class="card-header">Tabel Pelajaran</div>
  					<div class="card-body">

              <div class="form-group row ml-1">
                <div class="dropdown">
                  <a class="btn btn-primary dropdown-toggle mb-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pilih Sesuai Kelas
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?= base_url('admn/jadwal_pelajaran'); ?>">Jadwal Hari Ini</a>
                    <?php foreach($kelas as $kls): ?>
                      
                      <a class="dropdown-item" href="<?= base_url('admn/jadwal_kelas'); ?>/<?= $kls['id_kelas']; ?>"><?= $kls['kelas']; ?></a>
                    <?php endforeach; ?>
                  </div>
                </div>

                <div class="dropdown ml-1">
                  <a class="btn btn-primary dropdown-toggle mb-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pilih Sesuai Hari
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?= base_url('admn/jadwal_pelajaran'); ?>">Jadwal Hari Ini</a>
                    <?php foreach($hari as $h): ?>
                    <a class="dropdown-item" href="<?= base_url('admn/jadwal_hari'); ?>/<?= $h; ?>"><?= cek_h($h); ?></a>
                    <?php endforeach; ?>
                  </div>
                </div>  
              </div>

  						<?= $this->session->flashdata('message'); ?>
  						<div class="table-responsive">
  							<table class="table table-bordered shadow">
  								<thead>
  									<tr>
  										<th width="50">NO</th>
  										<th>Hari</th>
  										<th>Kelas</th>
  										<th>Pelajaran</th>
  										<th>Kode</th>
  										<th>Guru</th>
  										<th>Jam Mulai</th>
  										<th>Jam Selesai</th>
  										<th>Opsi</th>
  									</tr>
  								</thead>
  								<tbody>
  								<?php $i = 1; foreach($jadwal as $j): ?>
  									<tr>
  										<td><?= $i++; ?></td>
  										<td><?= cek_h($j['hari']); ?></td>
  										<td><?= $j['kelas']; ?></td>
  										<td><?= $j['pelajaran']; ?></td>
  										<td><?= $j['akronim']; ?></td>
  										<td><?= $j['nama_guru']; ?></td>
  										<td><?= $j['jam_mulai']; ?></td>
  										<td><?= $j['jam_selesai']; ?></td>
  										<td>
  											<a href="<?= base_url('admn/edit_jadwal'); ?>/<?= $j['id_jadwal']; ?>" class="badge badge-warning">Edit</a>
  											<a href="<?= base_url('admn/hapus_jadwal'); ?>/<?= $j['id_jadwal']; ?>" class="badge badge-danger">Hapus</a>
  										</td>
  									</tr>
  								<?php endforeach; ?>
  								</tbody>
  							</table>
                  <?php if(empty($jadwal)): ?>
                    <div class="alert alert-danger">
                      Tidak ada Jadwal Saat Ini
                    </div>
                  <?php endif; ?>
  						</div>
  					</div>
  				</div>
          <!-- Sesuai Hari -->
          
          <!-- baru baru ditambahkan -->
          <div class="card shadow">
            <div class="card-header">Baru - Baru Ini Ditambahkan</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered shadow">
                  <thead>
                    <tr>
                      <th width="50">NO</th>
                      <th>Hari</th>
                      <th>Kelas</th>
                      <th>Pelajaran</th>
                      <th>Kode</th>
                      <th>Guru</th>
                      <th>Jam Mulai</th>
                      <th>Jam Selesai</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach($jdwl as $jwl): ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= cek_h($jwl['hari']); ?></td>
                      <td><?= $jwl['kelas']; ?></td>
                      <td><?= $jwl['pelajaran']; ?></td>
                      <td><?= $jwl['akronim']; ?></td>
                      <td><?= $jwl['nama_guru']; ?></td>
                      <td><?= $jwl['jam_mulai']; ?></td>
                      <td><?= $jwl['jam_selesai']; ?></td>
                      <td>
                        <a href="<?= base_url('admn/edit_jadwal'); ?>/<?= $jwl['id_jadwal']; ?>" class="badge badge-warning">Edit</a>
                        <a href="<?= base_url('admn/hapus_jadwal'); ?>/<?= $jwl['id_jadwal']; ?>" class="badge badge-danger">Hapus</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>  
            </div>
          </div>
          <!-- close -->
  			</div>
  		</div>


	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->