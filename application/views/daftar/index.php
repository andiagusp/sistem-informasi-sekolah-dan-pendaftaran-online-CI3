	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-12">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Halo selamat datang <?= $user['nama_lengkap']; ?></h1>
        </div>

        <div class="col-lg-6">
          <div class="alert alert-success">Pastikan Transfer Ke Nomer Rekening : 0946-01-031993-53-9 AN SMK MADANI DEPOK BANK MANDIRI</div>

  				<div class="card">
  					<div class="card-header">Keterangan Daftar Anda</div>
  					<div class="card-body">
            
            <a class="btn btn-success mb-2" href="<?= base_url('cetak/ket_daftar'); ?>/<?= $user['id_daftar']; ?>/<?= $user['no_daftar']; ?>" target="_blank"><i class="far fa-file-pdf"></i> 
                    Cetak ke PDF
            </a>

  						<div class="table-responsive">
  							<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Ket</th>
                      <th>Isi</th>           
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Nama Lengkap</td>
                      <td><?= $user['nama_lengkap']; ?></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Email</td>
                      <td><?= $user['email']; ?></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>No daftar</td>
                      <td><?= $user['no_daftar']; ?></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Tanggal Daftar</td>
                      <td><?= $user['tanggal_daftar']; ?></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Jenis Kelamin</td>
                      <td><?= $user['jenis_kelamin']; ?></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Jurusan</td>
                      <td><?= $user['jurusan']; ?></td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>NISN</td>
                      <td><?= $user['nisn']; ?></td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>Asal Sekolah</td>
                      <td><?= $user['asal_sekolah']; ?></td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>Status Bayar</td>
                      <td><?= $user['status_bayar']; ?></td>
                    </tr>
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