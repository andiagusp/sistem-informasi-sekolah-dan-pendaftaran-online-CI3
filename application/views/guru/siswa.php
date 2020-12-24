<!-- Begin Page Content -->
<div class="container-fluid">	

		<div class="row">
			<div class="col-lg-12">
				<!-- Page Heading -->

				<h1 class="h3 text-gray-800">Data Siswa</h1>
				<div class="card shadow">
					<div class="card-header">Semua Kelas </div>
					<div class="card-body">
						<div class="table-responsive">

							<div class="form-group row">

								<div class="col-sm-2">
									<a class="btn btn-success" href="<?= base_url('cetak/cetak_siswa'); ?>" target="_blank"><i class="far fa-file-pdf"></i> 
										Cetak ke PDF
									</a>
								</div>

								<div class="col-sm-2">
									<div class="dropdown">
									  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Pilih Sesuai Kelas
									  </a>

									  <!-- button dropdown -->

									  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									    <a class="dropdown-item" href="<?= base_url('guru/siswa'); ?>">Semua Kelas</a>
									    <?php foreach($kelas as $kls): ?>
									    	<a class="dropdown-item" href="<?= base_url('guru/siswa_kelas'); ?>/<?= $kls['id_kelas']; ?>"><?= $kls['kelas']; ?></a>
									    <?php endforeach; ?>				    	    
									  </div>
									</div>
								</div>
								</div>

								<!-- close button dropdown -->

								
									<form action="" method="post">
									<div class="input-group mb-3">
								    	<input class="btn btn-primary" type="submit" name="cari" id="cari" value="cari">
								 	 <div class="input-group-append">
								 	 	<input type="text" class="form-control" placeholder="Cari dengan nama, nis" name="keyword" id="keyword" autocomplete="off">
								  	</div>
									</div>
								</form>
								
								<?php if($keyword): ?>
									<?php if(empty($siswa)): ?>
										<div class="alert alert-danger">Data Tidak Ditemukan</div>
									<?php endif; ?>
									<form action="" method="post">
										<input type="submit" value="batalkan pencarian" name="unset" class="btn btn-primary">
									</form>
								<?php endif; ?>

						

							<?= $this->session->flashdata('message'); ?>
							<?= validation_errors('<div class="alert alert-success">', '</div>'); ?>
						
							<h5>Jumlah Data : <?= $total_rows; ?></h5>
							<table class="table table-bordered shadow">
								<thead>
									<tr>
										<th>No</th>
										<th>NIS</th>
										<th>Nama</th>
										<th>Kelas</th>
										<th>Jurusan</th>
										<th>Jenis Kelamin</th>
										<th>Tahun Ajaran</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($siswa as $s): ?>
									<tr>
										<td><?= ++$start; ?></td>
										<td><?= $s['nis']; ?></td>
										<td><?= $s['nama_lengkap_siswa']; ?></td>
										<td><?= $s['kelas']; ?></td>
										<td><?= $s['jurusan']; ?></td>
										<td><?= $s['jenis_kelamin_siswa']; ?></td>
										<td><?= $s['tahun_ajaran']; ?></td>
										<td>
											<a href="<?= base_url('guru/detail_siswa'); ?>/<?= $s['nis']; ?>" class="badge badge-primary">Detail</a>
										</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
							<?= $this->pagination->create_links();?>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

