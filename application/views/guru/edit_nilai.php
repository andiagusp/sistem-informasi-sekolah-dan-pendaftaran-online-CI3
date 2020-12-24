	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-6">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Edit Nilai</h1>
  				<div class="card shadow">
  					<div class="card-header">Tabel Nilai</div>
  					<div class="card-body">
  						<div class="table-responsive">
  							<form action="" method="post">
                  <input type="hidden" name="id_nilai" value="<?= $nilai['id_nilai']; ?>">
                  <div class="form-group">
                    <label for="nip_guru" class="ml-1">NIP Guru</label>
                    <input type="text" name="nip_guru" id="nip_guru" value="<?= $nilai['nip_guru']; ?>" readonly class="form-control">       
                  </div>

                  <div class="form-group">
                    <label for="nama_guru" class="ml-1">Nama Guru</label>
                    <input type="text" class="form-control" name="nama_guru" id="nama_guru" readonly value="<?= $nilai['nama_guru']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="nis_siswa" class="ml-1">Nis Siswa</label>
                    <input type="text" class="form-control" name="nis_siswa" id="nis_siswa" value="<?= $nilai['nis_siswa']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="nama_lengkap_siswa" class="ml-1">Nama Siswa</label>
                    <input type="text" class="form-control" name="nama_lengkap_siswa" id="nama_lengkap_siswa" readonly value="<?= $nilai['nama_lengkap_siswa']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="id_pelajaran_nilai" class="ml-1">Mata Pelajaran</label>
                    <select name="id_pelajaran_nilai" id="id_pelajaran_nilai" class="form-control">
                      <option value="<?= $nilai['id_pelajaran_nilai']; ?>"><?= $nilai['pelajaran']; ?></option>
                      <?php foreach($pel as $p): ?>
                        <?php if($nilai['id_pelajaran_nilai'] != $p['id_pelajaran']): ?>
                          <option value="<?= $p['id_pelajaran']; ?>"><?= $p['pelajaran']; ?></option>
                      <?php endif; endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="nilai_tugas" class="ml-1"> Nilai Tugas</label>
                    <input type="text" autocomplete="off" name="nilai_tugas" id="nilai_tugas" value="<?= $nilai['nilai_tugas']; ?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="nilai_absen" class="ml-1"> Nilai Absen</label>
                    <input type="text" name="nilai_absen" id="nilai_absen" value="<?= $nilai['nilai_absen']; ?>" autocomplete="off" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="nilai_uts" class="ml-1"> Nilai UTS</label>
                    <input type="text" name="nilai_uts" id="nilai_uts" value="<?= $nilai['nilai_uts']; ?>" autocomplete="off" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="nilai_uas" class="ml-1">Nilai UAS</label>
                    <input type="text" name="nilai_uas" id="nilai_uas" value="<?= $nilai['nilai_uas']; ?>" autocomplete="off" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="semester" class="ml-1">Semester</label>
                    <input type="text" autocomplete="off" name="semester" id="semester" value="<?= $nilai['semester']; ?>" class="form-control">
                  </div>

                  <div class="form-group float-right">
                    <a href="<?= base_url('guru/nilai'); ?>" class="btn btn-success">Kembali</a> 
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
<!-- End of Main Content -->s