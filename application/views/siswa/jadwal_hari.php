  <!-- Begin Page Content -->
  <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12">
        
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">
            Data Jadwal
          </h1>
        
          <div class="card shadow">
            <div class="card-header">Tabel Jadwal</div>
            <div class="card-body">
              <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle mb-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Pilih Sesuai Hari
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="<?= base_url('siswa/jadwal_siswa'); ?>">Jadwal Hari Ini</a>
                  <?php foreach($hari as $h): ?>
                  <a class="dropdown-item" href="<?= base_url('siswa/jadwal_hari'); ?>/<?= $h; ?>"><?= cek_h($h); ?></a>
                  <?php endforeach; ?>
                </div>
              </div>
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
                      <th>Jam Selesai</th>
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
                      <td><?= $jwl['jam_mulai']; ?></td>
                      <td><?= $jwl['jam_selesai']; ?></td>
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
      </div>


  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
