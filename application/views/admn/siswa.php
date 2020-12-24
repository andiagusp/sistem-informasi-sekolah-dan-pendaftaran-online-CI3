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
								<div class="col-sm-3">
									<button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahSiswa">
										Tambah Data Siswa
									</button>
								</div>

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
									    <a class="dropdown-item" href="<?= base_url('admn/siswa'); ?>">Semua Kelas</a>
									    <?php foreach($kelas as $kls): ?>
											<a class="dropdown-item" href="<?= base_url('admn/siswa_kelas/'.$kls['id_kelas']); ?>">Kelas <?= $kls['kelas']; ?></a>
									    <?php endforeach; ?>    
									  </div>
									</div>
								</div>

								<!-- close button dropdown -->

								<div class="col-sm-5">
									<form action="<?= base_url('admn/siswa'); ?>" method="post">
									<div class="input-group mb-3">
								 	 <input type="text" class="form-control" placeholder="Cari dengan nama, kelas, jurusan" name="keyword" id="keyword" autocomplete="off">
								 	 <div class="input-group-append">
								    	<input class="btn btn-primary" type="submit" name="cari" id="cari" value="cari">
								  	</div>
									</div>
								</form>
								</div>
								

							</div>

							<?= $this->session->flashdata('message'); ?>
							<?= validation_errors('<div class="alert alert-success">', '</div>'); ?>
							<?php if($keyword): 
								if(empty($siswa)):?>
									<div class="alert alert-danger">Data Kosong</div>
								<?php endif; ?>
								<form action="<?= base_url('admn/siswa'); ?>" method="post">
									<input type="submit" name="unset" class="btn btn-primary mb-2" value="Batalkan Pencarian">
								</form>
							<?php endif; ?>

							
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
										<td><?= ++$start ?></td>
										<td><?= $s['nis']; ?></td>
										<td><?= $s['nama_lengkap_siswa']; ?></td>
										<td><?= $s['kelas']; ?></td>
										<td><?= $s['jurusan']; ?></td>
										<td><?= $s['jenis_kelamin_siswa']; ?></td>
										<td><?= $s['tahun_ajaran']; ?></td>
										<td>
											<a href="<?= base_url('admn/detail_siswa'); ?>/<?= $s['nis']; ?>" class="badge badge-primary">Detail</a>
											<a href="<?= base_url('admn/edit_siswa'); ?>/<?= $s['nis']; ?>" class="badge badge-warning" onclick="return confirm('Edit Data <?= $s['nama_lengkap_siswa']; ?> ?');">Edit</a>
											<a href="<?= base_url('admn/hapus_siswa'); ?>/<?= $s['nis']; ?>" class="badge badge-danger" onclick="return confirm('Hapus Data <?= $s['nama_lengkap_siswa']; ?> ?');">Hapus</a>
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

<!-- Logout Modal-->
  <div class="modal fade" id="modalTambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">Tambah Data Siswa</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        	<form action="<?= base_url('admn/siswa'); ?>" method="post">
				
				<div class="form-group">
					<label for="nis" class="ml-1">NIS</label>
					<input type="text" class="form-control" name="nis" id="nis" autocomplete="off" value="<?= set_value('nis'); ?>">
				</div>

				<div class="form-group">
					<label for="nama_lengkap_siswa" class="ml-1">Nama Lengkap Siswa</label>
					<input type="text" class="form-control" name="nama_lengkap_siswa" id="nama_lengkap_siswa" autocomplete="off" value="<?= set_value('nama_lengkap_siswa'); ?>">
				</div>

				<div class="form-group">
					<label for="nama_panggilan_siswa" class="ml-1">Nama Panggilan Siswa</label>
					<input type="text" class="form-control" name="nama_panggilan_siswa" id="nama_panggilan_siswa" autocomplete="off" value="<?= set_value('nama_panggilan_siswa'); ?>">
				</div>

				<div class="form-group">
					<label for="id_kelas_siswa" class="ml-1">Kelas Siswa</label>
					<select name="id_kelas_siswa" id="id_kelas_siswa" class="form-control">
						<?php foreach($kelas as $kls): ?>
							<option value="<?= $kls['id_kelas']; ?>"><?= $kls['kelas']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="id_jurusan_siswa" class="ml-1">Jurusan Siswa</label>
					<select name="id_jurusan_siswa" id="id_jurusan_siswa" class="form-control">
						<?php foreach($jurusan as $j): ?>
							<option value="<?= $j['id_jurusan']; ?>"><?= $j['jurusan']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<div class="form-group">
					<label for="tempat_lahir_siswa" class="ml-1">Tempat Lahir</label>
					<input type="text" class="form-control" name="tempat_lahir_siswa" id="tempat_lahir_siswa" autocomplete="off" value="<?= set_value('tempat_lahir_siswa'); ?>">
				</div>

				<div class="form-group">
					<label for="tanggal_lahir_siswa" class="ml-1">Tanggal Lahir</label>
					<input type="text" class="form-control" name="tanggal_lahir_siswa" id="tanggal_lahir_siswa" autocomplete="off" value="<?= set_value('tanggal_lahir_siswa'); ?>">
				</div>

				<div class="form-group">
					<label for="jenis_kelamin_siswa" class="ml-1">Jenis Kelamin</label>
					<select name="jenis_kelamin_siswa" id="jenis_kelamin_siswa" class="form-control">
						<option value="laki - laki">Laki - Laki</option>
						<option value="perempuan">Perempuan</option>
					</select>
				</div>

				<div class="form-group">
					<label for="agama_siswa" class="ml-1">Agama Siswa</label>
					<input type="text" class="form-control" name="agama_siswa" id="agama_siswa" autocomplete="off" value="<?= set_value('agama_siswa'); ?>">
				</div>

				<div class="form-group">
					<label for="alamat_siswa" class="ml-1">Alamat Siswa</label>
					<input type="text" class="form-control" name="alamat_siswa" id="alamat_siswa" autocomplete="off" value="<?= set_value('alamat_siswa'); ?>">
				</div>

				<div class="form-group">
					<label for="telepon_siswa" class="ml-1">Telepon Siswa</label>
					<input type="text" class="form-control" name="telepon_siswa" id="telepon_siswa" autocomplete="off" value="<?= set_value('telepon_siswa'); ?>">
				</div>

				<div class="form-group">
					<label for="nama_ayah_siswa" class="ml-1">Nama Ayah</label>
					<input type="text" class="form-control" name="nama_ayah_siswa" id="nama_ayah_siswa" autocomplete="off" value="<?= set_value('nama_ayah_siswa'); ?>">
				</div>

				<div class="form-group">
					<label for="nama_ibu_siswa" class="ml-1">Nama Ibu</label>
					<input type="text" class="form-control" name="nama_ibu_siswa" id="nama_ibu_siswa" autocomplete="off" value="<?= set_value('nama_ibu_siswa'); ?>">
				</div>

				<div class="form-group">
					<label for="tahun_ajaran" class="ml-1">Tahun Ajaran</label>
					<input type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran" autocomplete="off" value="<?= set_value('tahun_ajaran'); ?>">
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
