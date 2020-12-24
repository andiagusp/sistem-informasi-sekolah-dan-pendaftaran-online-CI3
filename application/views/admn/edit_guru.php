	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-6">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Edit Data Guru</h1>
  			
  				<div class="card shadow">
  					<div class="card-header">Form Edit</div>
  					<div class="card-body shadow">
              <?= validation_errors(); ?>
              <form action="" method="post">
                
                <div class="form-group">
                  <label for="nip" class="ml-1">NIP</label>
                  <input type="text" class="form-control" name="nip" id="nip" value="<?= $guru['nip']; ?>" autocomplete="off" readonly>
                </div>
                
                <div class="form-group">
                  <label for="akronim" class="ml-1">Akronim</label>
                  <input type="text" class="form-control" name="akronim" id="akronim" value="<?= $guru['akronim']; ?>" autocomplete="off">
                </div>
                
                <div class="form-group">
                  <label for="nama_guru" class="ml-1">Nama</label>
                  <input type="text" class="form-control" name="nama_guru" id="nama_guru" value="<?= $guru['nama_guru']; ?>" autocomplete="off">
                </div>
                
                <div class="form-group">
                  <label for="tempat_lahir_guru" class="ml-1">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir_guru" id="tempat_lahir_guru" value="<?= $guru['tempat_lahir_guru']; ?>" autocomplete="off">
                </div>
                
                <div class="form-group">
                  <label for="tanggal_lahir" class="ml-1">Tanggal Lahir</label>
                  <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= $guru['tanggal_lahir']; ?>" autocomplete="off">
                </div>
                
                <div class="form-group">
                  <label for="agama_guru" class="ml-1">Agama guru</label>
                  <input type="text" class="form-control" name="agama_guru" id="agama_guru" value="<?= $guru['agama_guru']; ?>" autocomplete="off">
                </div>
                
                <div class="form-group">
                  <label for="jeniskelamin_guru" class="ml-1">Jenis Kelamin</label>
                  <select name="jeniskelamin_guru" id="jeniskelamin_guru" class="form-control">
                    <option value="<?= $guru['jeniskelamin_guru']; ?>"><?= $guru['jeniskelamin_guru']; ?></option>
                    <?php foreach($stat[0] as $s): ?>
                    <?php if($s != $guru['jeniskelamin_guru']): ?>
                        <option value="<?= $s; ?>"><?= $s; ?></option>
                    <?php endif; endforeach; ?>
                  </select>    
                </div>
                
                <div class="form-group">
                  <label for="telepon_guru" class="ml-1">No Telepon</label>
                  <input type="text" class="form-control" name="telepon_guru" id="telepon_guru" value="<?= $guru['telepon_guru']; ?>" autocomplete="off">
                </div>
                
                <div class="form-group">
                  <label for="email_guru" class="ml-1">Email</label>
                  <input type="text" class="form-control" name="email_guru" id="email_guru" value="<?= $guru['email_guru']; ?>" autocomplete="off">
                </div>
                
                <div class="form-group">
                  <label for="alamat_guru" class="ml-1">Alamat</label>
                  <input type="text" class="form-control" name="alamat_guru" id="alamat_guru" value="<?= $guru['alamat_guru']; ?>" autocomplete="off">
                </div>
                
                <div class="form-group">
                  <label for="pendidikan_guru" class="ml-1">Pendidikan Guru</label>
                  <input type="text" class="form-control" name="pendidikan_guru" id="pendidikan_guru" value="<?= $guru['pendidikan_guru']; ?>" autocomplete="off">
                </div>
                
                <div class="form-group">
                  <label for="status_kawin" class="ml-1">Status Kawin</label>
                  <select name="status_kawin" id="status_kawin" class="form-control">
                    <option value="<?= $guru['status_kawin']; ?>"><?= $guru['status_kawin']; ?></option>
                    <?php foreach($stat[1] as $s): ?>
                      <?php if($s != $guru['status_kawin']): ?>
                        <option value="<?= $s; ?>"><?= $s; ?></option>
                      <?php endif; endforeach; ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="jabatan" class="ml-1">Jabatan</label>
                  <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?= $guru['jabatan']; ?>" autocomplete="off">
                </div>
                
                <div class="form-group">
                  <label for="status_aktif" class="ml-1">Status Aktif</label>
                  <select name="status_aktif" id="status_aktif" class="form-control">
                    <option value="<?= $guru['status_aktif']; ?>"><?= cek($guru['status_aktif']); ?></option>
                    <?php foreach($stat[2] as $s): ?>
                    <?php if($s != $guru['status_aktif']): ?>
                      <option value="<?= $s; ?>"><?= cek($s); ?></option>
                    <?php endif; endforeach; ?>
                  </select>
                </div>
                  
                <div class="form-group float-right">
                  <a href="<?= base_url('admn/guru'); ?>" class="btn btn-warning">Kembali</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

              </form>
  					</div>
  				</div>
  			</div>
  		</div>


	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->