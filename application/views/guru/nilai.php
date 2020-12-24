	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-12">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Tabel Nilai</h1>
  			
  				<div class="card shadow">
  					<div class="card-header">Nilai</div>
  					<div class="card-body">

             
                <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalNilai">
                  Tambah Nilai
                </button>

                <form action="" method="post">
                  <div class="input-group mb-3">
                      <input class="btn btn-primary" type="submit" name="cari" id="cari" value="cari">
                   <div class="input-group-append">
                   <input type="text" class="form-control" placeholder="Nis, Nama" name="keyword" id="keyword" autocomplete="off">
                    </div>
                  </div>
                </form>
          

              <?= $this->session->flashdata('message'); ?>
              <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
              <h5>Total Data : <?= $total_rows; ?></h5>
               <?php if($keyword): ?>
                  <?php if(empty($nilai)): ?>
                  <div class="alert alert-danger">Data Tidak Ada</div>
                  <?php endif;?> 
                  <form action="" method="post">
                    <input type="submit" name="unset" class="btn btn-primary mb-2" value="Batalkan Pencarian">
                  </form>
                <?php endif; ?>
  						<div class="table-responsive">
  							<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIP</th>
                      <th>Nama Guru</th>
                      <th>Nis</th>
                      <th>Nama Siswa</th>
                      <th>Pelajaran</th>
                      <th>Nilai Tugas</th>
                      <th>Nilai Absen</th>
                      <th>Nilai UTS</th>
                      <th>Nilai UAS</th>
                      <th>Semester</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach($nilai as $n): ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $n['nip_guru']; ?></td>
                      <td><?= $n['nama_guru']; ?></td>
                      <td><?= $n['nis_siswa']; ?></td>
                      <td><?= $n['nama_lengkap_siswa']; ?></td>
                      <td><?= $n['pelajaran']; ?></td>
                      <td><?= $n['nilai_tugas']; ?></td>
                      <td><?= $n['nilai_absen']; ?></td>
                      <td><?= $n['nilai_uts']; ?></td>
                      <td><?= $n['nilai_uas']; ?></td>
                      <td><?= $n['semester']; ?></td>
                      <td>
                        <a href="<?= base_url('guru/edit_nilai'); ?>/<?= $n['id_nilai']; ?>" onclick="return confirm('Ingin Edit Nilai ?');" class="badge badge-success">Edit</a>
                        <a href="<?= base_url('guru/hapus_nilai'); ?>/<?= $n['id_nilai']; ?>" onclick="return confirm('Ingin Hapus Nilai ?');" class="badge badge-danger">Hapus</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>       
                </table>
                <?= $this->pagination->create_links(); ?>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>


	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Logout Modal-->
  <div class="modal fade" id="modalNilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">Tambah Nilai</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('guru/nilai'); ?>" method="post">

            <div class="form-group">
              <label for="nis_siswa" class="ml-1">NIS Siswa</label>
              <input type="text" name="nis_siswa" id="nis_siswa" autocomplete="off" class="form-control" value="<?= set_value('nis_siswa'); ?>">
            </div>

            <div class="form-group">
              <label for="id_pelajaran_nilai" class="ml-1">Mata Pelajaran</label>
              <select name="id_pelajaran_nilai" id="id_pelajaran_nilai" class="form-control"><
              <?php foreach($pelajaran as $pel): ?>
                <option value="<?= $pel['id_pelajaran']; ?>"><?= $pel['pelajaran']; ?></option>
              <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="nilai_tugas" class="ml-1">Nilai Tugas</label>
              <input type="text" name="nilai_tugas" id="nilai_tugas" autocomplete="off" class="form-control" placeholder="Contoh: 95" value="<?= set_value('nilai_tugas'); ?>">
            </div>

            <div class="form-group">
              <label for="nilai_absen" class="ml-1">Nilai Absen</label>
              <input type="text" name="nilai_absen" id="nilai_absen" autocomplete="off" class="form-control" placeholder="Contoh: 70" value="<?= set_value('nilai_absen'); ?>">
            </div>

            <div class="form-group">
              <label for="nilai_uts" class="ml-1">Nilai UTS</label>
              <input type="text" name="nilai_uts" id="nilai_uts" autocomplete="off" class="form-control" placeholder="Contoh: 85" value="<?= set_value('nilai_uts'); ?>">
            </div>

            <div class="form-group">
              <label for="nilai_uas" class="ml-1">Nilai UAS</label>
              <input type="text" name="nilai_uas" id="nilai_uas" autocomplete="off" class="form-control" placeholder="Contoh: 76" value="<?= set_value('nilai_uas'); ?>">
            </div>

            <div class="form-group">
              <label for="semester" class="ml-1">Semester</label>
              <input type="text" name="semester" id="semester" autocomplete="off" class="form-control" placeholder="Contoh: SMT 1" value="<?= set_value('semester'); ?>">
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