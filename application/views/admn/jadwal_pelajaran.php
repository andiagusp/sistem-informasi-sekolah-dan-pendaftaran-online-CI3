	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-12">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Jadwal Pelajaran</h1>
  			
  				<div class="card shadow mb-2">
  					<div class="card-header">Tabel Pelajaran</div>
  					<div class="card-body">
  						<button class="btn btn-primary mb-2 ml-1" data-toggle="modal" data-target="#modalJadwal">
  							Tambah Jadwal
  						</button>

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

<!-- Logout Modal-->
  <div class="modal fade" id="modalJadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">Tambah Jadwal</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('admn/jadwal_pelajaran'); ?>" method="post">

			<div class="form-group">
				<label for="hari" class="ml-1">Hari</label>
				<select name="hari" id="hari" class="form-control">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
				</select>
			</div>

			<div class="form-group">
				<label for="id_kelas_jadwal" class="ml-1">Kelas</label>
				<select name="id_kelas_jadwal" id="id_kelas_jadwal" class="form-control">
					<?php foreach($kelas as $kls): ?>
						<option value="<?= $kls['id_kelas']; ?>"><?= $kls['kelas']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label for="id_pelajaran_jadwal" class="ml-1">Pelajaran</label>
				<select name="id_pelajaran_jadwal" id="id_pelajaran_jadwal" class="form-control">
					<?php foreach($pelajaran as $pel): ?>
						<option value="<?= $pel['id_pelajaran']; ?>"><?= $pel['pelajaran']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			
			<div class="form-group">
				<label for="nip_guru" class="ml-1">Kode Guru</label>
				<select name="nip_guru" id="nip_guru" class="form-control">
					<?php foreach($guru as $g): ?>
						<option value="<?= $g['nip']; ?>"><?= $g['akronim']; ?> = <?= $g['nama_guru']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label for="jam_mulai" class="ml-1">Jam mulai</label>
				<input type="text" name="jam_mulai" id="jam_mulai" placeholder="07.50" autocomplete="off" class="form-control">
			</div>
			<div class="form-group">
				<label for="jam_selesai" class="ml-1">Jam Selesai</label>
				<input type="text" name="jam_selesai" id="jam_selesai" placeholder="07.50" autocomplete="off" class="form-control">
			</div>	

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary"> Simpan </button>
        </div>
    	</form>
      </div>
    </div>
  </div>