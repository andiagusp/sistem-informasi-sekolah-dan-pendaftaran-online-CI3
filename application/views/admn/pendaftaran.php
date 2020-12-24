	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-12">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Data Pendaftaran</h1>
  			
  				<div class="card">
  					<div class="card-header">Tabel Pendaftaran</div>
  					<div class="card-body">
  						<?= $this->session->flashdata('message'); ?>
  						<div class="table-responsive">
                <h5 class="ml-1">Total Data : <?= $total_rows; ?></h5>
                
                 <form action="" method="post">
                  <div class="input-group mb-3">
                    <input class="btn btn-primary" type="submit" name="cari" id="cari" value="cari">
                    <div class="input-group-append">
                      <input type="text" class="form-control" placeholder="No daftar, nama, email, Asal Sekolah" name="keyword" id="keyword" autocomplete="off">
                    </div>
                  </div>
                </form>

                <?php if($keyword): ?>
                  <form action="" method="post">
                    <input type="submit" name="unset" id="unset" class="btn btn-primary mb-1" value="Batalkan Pencarian">
                  </form>
                <?php endif; ?>

  							<table class="table table-bordered">
  								<thead>
  									<tr>
  										<th>No</th>
  										<th>Nama Lengkap</th>
  										<th>Email</th>
  										<th>No Daftar</th>
  										<th>Tanggal Daftar</th>
  										<th>Jenis Kelamin</th>
  										<th>Jurusan</th>
  										<th>NISN</th>
  										<th>Asal Sekolah</th>
  										<th>Status Bayar</th>
  										<th>Opsi</th>
  									</tr>
  								</thead>
  								<tbody>
  									<?php $i = 1; foreach($daftar as $d): ?>
  									<tr>
  										<td><?= ++$start; ?></td>
  										<td><?= $d['nama_lengkap']; ?></td>
  										<td><?= $d['email']; ?></td>
  										<td><?= $d['no_daftar']; ?></td>
  										<td><?= $d['tanggal_daftar']; ?></td>
  										<td><?= $d['jenis_kelamin']; ?></td>
  										<td><?= $d['jurusan']; ?></td>
  										<td><?= $d['nisn']; ?></td>
  										<td><?= $d['asal_sekolah']; ?></td>
  										<td><?= $d['status_bayar']; ?></td>
  										<td>
                        <a class="badge badge-secondary" href="<?= base_url('cetak/cetak_pendaftaran'); ?>/<?= $d['id_daftar']; ?>/<?= $d['no_daftar']; ?>" target="_blank"><i class="far fa-file-pdf"></i> 
                            Cetak ke PDF
                        </a>
  											<a href="<?= base_url('admn/detail_pendaftaran'); ?>/<?= $d['id_daftar']; ?>" class="badge badge-primary">Detail</a>
  											<a href="<?= base_url('admn/hapus_pendaftaran'); ?>/<?= $d['id_daftar']; ?>/<?= $d['no_daftar']; ?>" class="badge badge-danger" onclick="return confirm('Ingin Hapus <?= $d['nama_lengkap']; ?> ?');">Hapus</a>
											<?php if($d['status_bayar'] == 'lunas'): ?>
												<a href="<?= base_url('admn/batalkonfirm_pendaftaran'); ?>/<?= $d['id_daftar']; ?>/<?= $d['no_daftar']; ?>" class="badge badge-warning" onclick="return confirm('Batalkan konfirmasi <?= $d['nama_lengkap']; ?> ?');">Batalkan</a>
											<?php else: ?>
												<a href="<?= base_url('admn/konfirm_pendaftaran'); ?>/<?= $d['id_daftar']; ?>/<?= $d['no_daftar']; ?>" class="badge badge-success" onclick="return confirm('Konfirmasi <?= $d['nama_lengkap']; ?> ?');">Konfirm</a>
											<?php endif; ?>
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
