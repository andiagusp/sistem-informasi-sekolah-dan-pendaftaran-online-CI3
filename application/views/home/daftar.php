	<!-- Begin Page Content -->
	<div class="container-fluid">

		<div class="row">
      <div class="col-lg-6">
        <div class="card shadow">
          <div class="card-header">Daftar Biaya</div>
          <div class="card-body">
            <img src="<?= base_url('assets'); ?>/img/daftar.png" width="500" alt="daftar" class="img-fluid">
          </div>
        </div>
      </div>

			<div class="col-lg-6">
        <div class="card shadow">
          <div class="card-header">Form Pendaftaran</div>
          <div class="card-body">    
  			
          <form class="user" action="<?= base_url('home/daftar'); ?>" method="post">

            <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>

            <div class="form-group ml-1">
              Keterangan Pribadi Siswa
            </div> <hr>
        
            <div class="form-group">
              <label for="nama_lengkap" class="ml-1">1. Nama Lengkap</label>
              <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?= set_value('nama_lengkap'); ?>" autocomplete="off">
            </div>
        
            <div class="form-group">
              <label for="nama_panggilan" class="ml-1">2. Nama Panggilan</label>
              <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan" value="<?= set_value('nama_panggilan'); ?>" autocomplete="off">
            </div>
        
            <div class="form-group">
              <label for="nisn" class="ml-1">3. NISN</label>
              <input type="text" class="form-control" name="nisn" id="nisn" value="<?= set_value('nisn'); ?>" autocomplete="off">
            </div>
        
            <div class="form-group">
              <label for="no_kartu_kes" class="ml-1">4. No. KIP/KIS/KPS/Jamkesmas </label>
              <input autocomplete="off" type="text" class="form-control" name="no_kartu_kes" id="no_kartu_kes" value="<?= set_value('no_kartu_kes'); ?>" placeholder="isi - jika tidak ada">
            </div>
        
            <div class="form-group">
              <label for="jenis_kelamin" class="ml-1">5. Jenis Kelamin</label>
              <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                <option value="laki - laki">Laki - Laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="tempat_lahir" class="ml-1">6. Tempat Lahir</label>
                <input autocomplete="off" type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= set_value('tempat_lahir'); ?>" placeholder="Contoh : Jakarta">
              </div>
              <div class="col-sm-6">
                <label for="tanggal_lahir" class="ml-1">7. Tanggal Lahir</label>
                <input autocomplete="off" type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>" placeholder="Contoh : 1998-01-01">
              </div>
            </div>

            <div class="form-group">
              <label for="agama" class="ml-1">8. Agama</label>
              <input autocomplete="off" type="text" class="form-control" name="agama" id="agama" value="<?= set_value('agama'); ?>">
            </div>

            <div class="form-group">
              <label for="email" class="ml-1">Email</label>
              <input autocomplete="off" type="text" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>" placeholder="email@exapmle.com (Wajib Diisi)">
            </div>

            <div class="form-group">
              <label for="kewarganegaraan" class="ml-1">9. Kewarganegaraan</label>
              <input autocomplete="off" type="text" class="form-control" name="kewarganegaraan" id="kewarganegaraan" value="<?= set_value('kewarganegaraan'); ?>">
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="anakke" class="ml-1">10. Anak Ke</label>
                <input autocomplete="off" type="text" class="form-control" name="anakke" id="anakke" value="<?= set_value('anakke'); ?>">
              </div>
              <div class="col-sm-6">
                <label for="jumlah_saudara" class="ml-1">11. Jumlah Saudara</label>
                <input autocomplete="off" type="text" class="form-control" name="jumlah_saudara" id="jumlah_saudara" value="<?= set_value('jumlah_saudara'); ?>">
              </div>
            </div>
      
            <div class="form-group">
              <label for="status_anak" class="ml-1">12.  Anak Yatim / Piatu / Yatim Piatu</label>
              <input autocomplete="off" type="text" class="form-control" name="status_anak" id="status_anak" value="<?= set_value('status_anak'); ?>">
            </div>
        
            <div class="form-group">
              <label for="bahasa" class="ml-1">13. Bahasa Sehari - hari</label>
              <input autocomplete="off" type="text" class="form-control" name="bahasa" id="bahasa" value="<?= set_value('bahasa'); ?>">
            </div>

            <div class="form-group">
              <label for="jurusan" class="ml-1">Pilih Jurusan</label>
              <select name="jurusan" id="jurusan" class="form-control">
                <?php foreach($jurusan as $j):  ?>  
                  <option value="<?= $j['id_jurusan']; ?>"><?= $j['jurusan']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
      
            <hr class="mb-5">

            <div class="form-group ml-1">
              Keterangan Tempat Tinggal Siswa
            </div>
            <hr>

            <div class="form-group">
              <label for="alamat" class="ml-1">14. Alamat Siswa</label>
                <input autocomplete="off" type="text" class="form-control" name="alamat" id="alamat" value="<?= set_value('alamat'); ?>">
            </div>

            <div class="form-group">
              <label for="telepon" class="ml-1">15. No Telepon</label>
                <input autocomplete="off" type="text" class="form-control" name="telepon" id="telepon" value="<?= set_value('telepon'); ?>">
            </div>

            <div class="form-group">
              <label for="tinggal_dengan" class="ml-1">16. Selama Bersekolah Tinggal Dengan</label>
                <input autocomplete="off" type="text" class="form-control" name="tinggal_dengan" id="tinggal_dengan" value="<?= set_value('tinggal_dengan'); ?>">
            </div>

            <div class="form-group">
              <label for="jarak" class="ml-1">17. Jarak Dari Rumah Kesekolah</label>
                <input autocomplete="off" type="text" class="form-control" name="jarak" id="jarak" value="<?= set_value('jarak'); ?>">
            </div>

            <div class="form-group">
              <label for="kendaraan" class="ml-1">18. Kesekolah Naik Kendaraan / Jalan Kaki</label>
                <input autocomplete="off" type="text" class="form-control" name="kendaraan" id="kendaraan" value="<?= set_value('kendaraan'); ?>">
            </div>

            <hr class="mb-5">

            <div class="form-group">
              Keterangan Jasmani Siswa
            </div>

            <hr>

            <div class="form-group row">
              <div class="col-sm-4 mb-3 mb-sm-0">
                <label for="berat_badan" class="ml-1">19. Berat Badan</label>
                <input autocomplete="off" type="text" class="form-control" name="berat_badan" id="berat_badan" value="<?= set_value('berat_badan'); ?>">
              </div>
              <div class="col-sm-4">
                <label for="tinggi_badan" class="ml-1">20. Tinggi Badan</label>
                <input autocomplete="off" type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" value="<?= set_value('tinggi_badan'); ?>">
              </div>
              <div class="col-sm-4">
                <label for="golongan_darah" class="ml-1">21. Golongan Darah</label>
                <input autocomplete="off" type="text" class="form-control" name="golongan_darah" id="golongan_darah" value="<?= set_value('golongan_darah'); ?>">
              </div>
            </div>

            <hr class="mb-5">
            <div class="form-group">
              Kegemaran Siswa
            </div>
            <hr>

            <div class="form-group">
              <label for="kegemaran" class="ml-1">22. Kegemaran Siswa</label>
              <input autocomplete="off" type="text" class="form-control" name="kegemaran" id="kegemaran" value="<?= set_value('kegemaran'); ?>">
            </div>
  
            <hr class="mb-5">

            <div class="form-group">
              Keterangan Tentang Pendidikan Sebelumnya
            </div>

            <hr>

            <div class="form-group">
              <label for="asal_sekolah" class="mb-1">23. Asal Sekolah</label>
              <input autocomplete="off" type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" value="<?= set_value('asal_sekolah'); ?>">
            </div>

            <div class="form-group">
              <label for="alamat_sekolah" class="mb-1">24. Alamat Sekolah</label>
              <input autocomplete="off" type="text" class="form-control" name="alamat_sekolah" id="alamat_sekolah" value="<?= set_value('alamat_sekolah'); ?>">
            </div>

            <div class="form-group">
              <label for="no_ijazah" class="mb-1">25. Tanggal dan No. Ijazah</label>
              <input autocomplete="off" type="text" class="form-control" name="no_ijazah" id="no_ijazah" value="<?= set_value('no_ijazah'); ?>" placeholder="Isi - jika belum mendapatkan ijazah">
            </div>

            <div class="form-group">
              <label for="no_skhun" class="mb-1">26. Tanggal dan No. SKHUN</label>
              <input autocomplete="off" type="text" class="form-control" name="no_skhun" id="no_skhun" value="<?= set_value('no_skhun'); ?>">
            </div>

            <hr class="mb-5">

            <div class="form-group">
              Keterangan Orang Tua Kandung / Wali
            </div>

            <hr>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="nama_ayah" class="ml-1">27. Nama Ayah</label>
                <input autocomplete="off" type="text" class="form-control" name="nama_ayah" id="nama_ayah" value="<?= set_value('nama_ayah'); ?>">
              </div>
              <div class="col-sm-6">
                <label for="nama_ibu" class="ml-1">28. Nama Ibu</label>
                <input autocomplete="off" type="text" class="form-control" name="nama_ibu" id="nama_ibu" value="<?= set_value('nama_ibu'); ?>">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="tempat_lahir_ayah" class="ml-1">29. Tempat Lahir Ayah</label>
                <input autocomplete="off" type="text" class="form-control" name="tempat_lahir_ayah" id="tempat_lahir_ayah" value="<?= set_value('tempat_lahir_ayah'); ?>">
              </div>
              <div class="col-sm-6">
                <label for="tempat_lahir_ibu" class="ml-1">30. Tempat Lahir Ibu</label>
                <input autocomplete="off" type="text" class="form-control" name="tempat_lahir_ibu" id="tempat_lahir_ibu" value="<?= set_value('tempat_lahir_ibu'); ?>">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="tanggal_lahir_ayah" class="ml-1">31. Tanggal Lahir Ayah</label>
                <input autocomplete="off" type="text" class="form-control" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" value="<?= set_value('tanggal_lahir_ayah'); ?>" placeholder="Contoh : 1990-01-01">
              </div>
              <div class="col-sm-6">
                <label for="tanggal_lahir_ibu" class="ml-1">32. Tanggal Lahir Ibu</label>
                <input autocomplete="off" type="text" class="form-control" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" value="<?= set_value('tanggal_lahir_ibu'); ?>" placeholder="Contoh : 1990-01-01">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="kewarganegaraan_ayah" class="ml-1">33. Kewarganegaraan Ayah</label>
                <input autocomplete="off" type="text" class="form-control" name="kewarganegaraan_ayah" id="kewarganegaraan_ayah" value="<?= set_value('kewarganegaraan_ayah'); ?>">
              </div>
              <div class="col-sm-6">
                <label for="kewarganegaraan_ibu" class="ml-1">34. Kewarganegaraan Ibu</label>
                <input autocomplete="off" type="text" class="form-control" name="kewarganegaraan_ibu" id="kewarganegaraan_ibu" value="<?= set_value('kewarganegaraan_ibu'); ?>">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="pendidikan_ayah" class="ml-1">35. Pendidikan Ayah</label>
                <input autocomplete="off" type="text" class="form-control" name="pendidikan_ayah" id="pendidikan_ayah" value="<?= set_value('pendidikan_ayah'); ?>">
              </div>
              <div class="col-sm-6">
                <label for="pendidikan_ibu" class="ml-1">36. Pendidikan Ibu</label>
                <input autocomplete="off" type="text" class="form-control" name="pendidikan_ibu" id="pendidikan_ibu" value="<?= set_value('pendidikan_ibu'); ?>" >
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="pekerjaan_ayah" class="ml-1">37. Pekerjaan Ayah</label>
                <input autocomplete="off" type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" value="<?= set_value('pekerjaan_ayah'); ?>">
              </div>
              <div class="col-sm-6">
                <label for="pekerjaan_ibu" class="ml-1">38. Pekerjaan Ibu</label>
                <input autocomplete="off" type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" value="<?= set_value('pekerjaan_ibu'); ?>">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="penghasilan_ayah" class="ml-1">39. Penghasilan Perbulan Ayah</label>
                <input autocomplete="off" type="text" class="form-control" name="penghasilan_ayah" id="penghasilan_ayah" value="<?= set_value('penghasilan_ayah'); ?>">
              </div>
              <div class="col-sm-6">
                <label for="penghasilan_ibu" class="ml-1">40. Penghasilan Perbulan Ibu</label>
                <input autocomplete="off" type="text" class="form-control" name="penghasilan_ibu" id="penghasilan_ibu" value="<?= set_value('penghasilan_ibu'); ?>">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="alamat_ayah" class="ml-1">41. Alamat Ayah</label>
                <input autocomplete="off" type="text" class="form-control" name="alamat_ayah" id="alamat_ayah">
              </div value="<?= set_value('alamat_ayah'); ?>">
              <div class="col-sm-6">
                <label for="alamat_ibu" class="ml-1">42. Alamat Ibu</label>
                <input autocomplete="off" type="text" class="form-control" name="alamat_ibu" id="alamat_ibu" value="<?= set_value('alamat_ibu'); ?>">
              </div>
            </div>
            <hr>

            <button type="submit" class="btn btn-primary btn-user btn-block">
              Daftar
            </button>
          </form>
        </div>
      </div>
		</div>
	</div>


	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
