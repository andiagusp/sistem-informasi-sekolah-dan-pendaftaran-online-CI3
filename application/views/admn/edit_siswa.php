	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-6">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Data Siswa</h1>
  			
  				<div class="card">
  					<div class="card-header">Edit Data Siswa</div>
  					<div class="card-body">
              <?= validation_errors('<div class="alert alert-success">', '</div>'); ?>
  						<div class="table-responsive">
  							<form action="" method="post">
                  
                  <div class="form-group">
                    <label for="nis" class="ml-1">NIS</label>
                    <input type="text" class="form-control" name="nis" id="nis" value="<?= $siswa['nis']; ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label for="nama_lengkap_siswa" class="ml-1">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap_siswa" id="nama_lengkap_siswa" value="<?= $siswa['nama_lengkap_siswa']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="nama_panggilan_siswa" class="ml-1">Nama Panggilan</label>
                    <input type="text" class="form-control" name="nama_panggilan_siswa" id="nama_panggilan_siswa" value="<?= $siswa['nama_panggilan_siswa']; ?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="tempat_lahir_siswa" class="ml-1">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir_siswa" id="tempat_lahir_siswa" value="<?= $siswa['tempat_lahir_siswa']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="tanggal_lahir_siswa" class="ml-1">Tanggal Lahir</label>
                    <input type="text" class="form-control" name="tanggal_lahir_siswa" id="tanggal_lahir_siswa" value="<?= $siswa['tanggal_lahir_siswa']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="id_kelas_siswa" class="ml-1">Kelas</label>
                    <select name="id_kelas_siswa" id="id_kelas_siswa" class="form-control">
                      <option value="<?= $siswa['id_kelas_siswa']; ?>"><?= $siswa['kelas']; ?></option>
                      <?php foreach($kelas as $kls): ?>
                        <?php if($kls['id_kelas'] != $siswa['id_kelas_siswa']): ?>
                          <option value="<?= $kls['id_kelas']; ?>"><?= $kls['kelas']; ?></option>
                      <?php endif; endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="id_jurusan_siswa" class="ml-1">Jurusan</label>
                    <select name="id_jurusan_siswa" id="id_jurusan_siswa" class="form-control">
                      <option value="<?= $siswa['id_jurusan_siswa']; ?>"><?= $siswa['jurusan']; ?></option>
                      <?php foreach($jurusan as $j): ?>
                        <?php if($j['id_jurusan'] != $siswa['id_jurusan_siswa']): ?>
                        <option value="<?= $j['id_jurusan']; ?>"><?= $j['jurusan']; ?></option>
                      <?php endif; endforeach; ?>
                    </select>
                  </div>
  
                  <div class="form-group">
                    <label for="jenis_kelamin_siswa" class="ml-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin_siswa" id="jenis_kelamin_siswa" class="form-control">
                      <option value="<?= $siswa['jenis_kelamin_siswa']; ?>"><?= $siswa['jenis_kelamin_siswa']; ?></option>
                      <?php foreach($jk as $j): ?>
                        <?php if($siswa['jenis_kelamin_siswa'] != $j): ?>
                        <option value="<?= $j; ?>"><?= $j; ?></option>
                      <?php endif; endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="agama_siswa" class="ml-1">Agama</label>
                    <input type="text" class="form-control" name="agama_siswa" id="agama_siswa" value="<?= $siswa['agama_siswa']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="alamat_siswa" class="ml-1">Alamat</label>
                    <input type="text" class="form-control" name="alamat_siswa" id="alamat_siswa" value="<?= $siswa['alamat_siswa']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="telepon_siswa" class="ml-1">Nomer Telepon</label>
                    <input type="text" class="form-control" name="telepon_siswa" id="telepon_siswa" value="<?= $siswa['telepon_siswa']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="nama_ayah_siswa" class="ml-1">Nama Ayah</label>
                    <input type="text" class="form-control" name="nama_ayah_siswa" id="nama_ayah_siswa" value="<?= $siswa['nama_ayah_siswa']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="nama_ibu_siswa" class="ml-1">Nama Ibu</label>
                    <input type="text" class="form-control" name="nama_ibu_siswa" id="nama_ibu_siswa" value="<?= $siswa['nama_ibu_siswa']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="tahun_ajaran" class="ml-1">Tahun Ajaran</label>
                    <input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran" value="<?= $siswa['tahun_ajaran']; ?>">
                  </div>

                  <div class="form-group float-right">
                    <a href="<?= base_url('admn/siswa'); ?>" class="btn btn-success">Kembali</a>
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
<!-- End of Main Content -->
