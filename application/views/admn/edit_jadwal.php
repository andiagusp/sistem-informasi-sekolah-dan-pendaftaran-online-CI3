	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-6">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Jadwal Pelajaran</h1>
  			
  				<div class="card shadow">
  					<div class="card-header">Edit Jadwal Pelajaran</div>
  					<div class="card-body">
  						<div class="table-responsive">
  							<form action="" method="post">
                  <input type="hidden" name="id_jadwal" id="id_jadwal" value="<?= $jadwal['id_jadwal']; ?>">
                  <div class="form-group">
                    <label for="hari" class="ml-1">Hari</label>
                    <select name="hari" id="hari" class="form-control">
                      <option value="<?= $jadwal['hari']; ?>"><?= cek_h($jadwal['hari']); ?></option>
                      <?php foreach($hari as $h): ?>
                        <?php if($h != $jadwal['hari']): ?>
                        <option value="<?= $h; ?>"><?= cek_h($h); ?></option>
                      <?php endif; endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="id_kelas_jadwal" class="ml-1">Kelas</label>
                    <select name="id_kelas_jadwal" id="id_kelas_jadwal" class="form-control">
                      <option value="<?= $jadwal['id_kelas_jadwal']; ?>"><?= $jadwal['kelas']; ?></option>
                      <?php foreach($kelas as $kls): ?>
                      <?php if($kls['id_kelas'] != $jadwal['id_kelas_jadwal']): ?>
                        <option value="<?= $kls['id_kelas']; ?>"><?= $kls['kelas']; ?></option>
                      <?php endif; endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="id_pelajaran_jadwal" class="ml-1">Pelajaran</label>
                    <select name="id_pelajaran_jadwal" id="id_pelajaran_jadwal" class="form-control">
                      <option value="<?= $jadwal['id_pelajaran_jadwal']; ?>"><?= $jadwal['pelajaran']; ?></option>
                      <?php foreach($pelajaran as $pel): ?>
                      <?php if($pel['id_pelajaran'] != $jadwal['id_pelajaran_jadwal']): ?>
                        <option value="<?= $pel['id_pelajaran']; ?>"><?= $pel['pelajaran']; ?></option>
                      <?php endif; endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="nip_guru" class="ml-1">Kode Guru</label>
                    <select name="nip_guru" id="nip_guru" class="form-control">
                      <option value="<?= $jadwal['nip_guru']; ?>"><?= $jadwal['akronim']; ?> = <?= $jadwal['nama_guru']; ?></option>
                      <?php foreach($guru as $g): ?>
                      <?php if($g['nip'] != $jadwal['nip_guru']): ?>
                        <option value="<?= $g['nip']; ?>"><?= $g['akronim']; ?> = <?= $g['nama_guru']; ?></option>
                      <?php endif; endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="jam_mulai" class="ml-1">Jam mulai</label>
                    <input type="text" name="jam_mulai" id="jam_mulai" autocomplete="off" value="<?= $jadwal['jam_mulai']; ?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="jam_selesai" class="ml-1">Jam Selesai</label>
                    <input type="text" name="jam_selesai" id="jam_selesai" autocomplete="off" value="<?= $jadwal['jam_selesai']; ?>" class="form-control">
                  </div>

                  <div class="form-group float-right">
                    <a href="<?= base_url('admn/jadwal_pelajaran'); ?>" class="btn btn-success">Kembali</a>
                    <button type="submit" class="btn btn-primary"> Simpan</button>
                  </div>
                </form>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>


	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->