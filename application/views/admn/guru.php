	<!-- Begin Page Content -->
	<div class="container-fluid">

		
			
		<div class="row">
			<div class="col-lg-12">
				<!-- Page Heading -->
				<h1 class="h3 mb-4 text-gray-800">Tabel Guru</h1>

				<div class="card shadow">
					<div class="card-header">Data Guru</div>
					<div class="card-body">
						<div class="form-group row">
							<div class="col-sm-6">
								<button class="btn btn-primary" data-toggle="modal" data-target="#tambahGuruModal">
									Tambah Data Guru
								</button>
							</div>
							<div class="col-sm-6">
								<form action="" method="post">
								<div class="input-group">
									<input type="text" name="keyword" id="keyword" class="form-control" autocomplete="off" placeholder="Cari nama guru, nip">
									<input type="submit" name="cari" id="cari" value="cari" class="btn btn-primary">
								</div>
								</form>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
								<?= $this->session->flashdata('message'); ?>
							</div>
							<?= validation_errors('<div class="alert alert-danger col-sm-6">','</div>'); ?>
						</div>
							
						<?php if($keyword) :?>
						<?php 	if(empty($guru)): ?>
							<div class="alert alert-danger">Data Kosong</div>
						<?php 	endif; ?>
								<form action="<?= base_url('admn/guru'); ?>" method="post">
									<input type="submit" name="unset" class="btn btn-primary mb-2" value="Batalkan Pencarian">
								</form>
						<?php endif; ?>

						<h5 class="ml-2">Jumlah Data : <?= $total_rows; ?></h5>
						<div class="table-responsive shadow">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>NIP</th>
										<th>Akronim</th>
										<th>Nama</th>
										<th>Jenis Kelamin</th>
										<th>Email</th>
										<th>Aktif</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No</th>
										<th>NIP</th>
										<th>Akronim</th>
										<th>Nama</th>
										<th>Jenis Kelamin</th>
										<th>Email</th>
										<th>Aktif</th>
										<th>Opsi</th>
									</tr>
								</tfoot>
								<tbody>
									<?php $i = 1; foreach($guru as $g): ?>
									<tr>
										<td><?= ++$start; ?></td>
										<td><?= $g['nip']; ?></td>
										<td><?= $g['akronim']; ?></td>
										<td><?= $g['nama_guru']; ?></td>
										<td><?= $g['jeniskelamin_guru']; ?></td>
										<td><?= $g['email_guru']; ?></td>
										<td><?= cek($g['status_aktif']); ?></td>
										<td>
											<a href="<?= base_url('admn/detail_guru'); ?>/<?= $g['nip']; ?>" class="badge badge-primary" >Detail</a>
											<a href="<?= base_url('admn/edit_guru'); ?>/<?= $g['nip']; ?>" class="badge badge-warning" onclick="return confirm('Edit Data <?= $g['nama_guru']; ?> ?');">Edit</a>
											<a href="<?= base_url('admn/hapus_guru'); ?>/<?= $g['nip']; ?>" class="badge badge-danger" onclick="return confirm('Hapus Data <?= $g['nama_guru']; ?> ?');">Hapus</a>
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
  <div class="modal fade" id="tambahGuruModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Tambah Data Guru</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        	<form action="<?= base_url('admn/guru'); ?>" method="post">
        		
				<div class="form-group">
					<label for="nip">NIP</label>
					<input type="text" class="form-control" name="nip" id="nip" autocomplete="off" value="<?= set_value('nip'); ?>">
				</div>
        		
				<div class="form-group">
					<label for="akronim">Akronim</label>
					<input type="text" class="form-control" name="akronim" id="akronim" autocomplete="off" value="<?= set_value('akronim'); ?>">
				</div>

				<div class="form-group">
					<label for="nama_guru">Nama Guru</label>
					<input type="text" class="form-control" name="nama_guru" id="nama_guru" autocomplete="off" value="<?= set_value('nama_guru'); ?>">
				</div>
        		
        		
				<div class="form-group">
					<label for="tempat_lahir_guru">Tempat Lahir</label>
					<input type="text" class="form-control" name="tempat_lahir_guru" id="tempat_lahir_guru" autocomplete="off" value="<?= set_value('tempat_lahir_guru'); ?>">
				</div>
        		
				<div class="form-group">
					<label for="tanggal_lahir">Tanggal Lahir</label>
					<input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="contoh: 1990-01-01" autocomplete="off" value="<?= set_value('tanggal_lahir'); ?>">
				</div>
        		
				<div class="form-group">
					<label for="agama_guru">Agama</label>
					<input type="text" class="form-control" name="agama_guru" id="agama_guru" autocomplete="off" value="<?= set_value('agama_guru'); ?>">
				</div>
        		
				<div class="form-group">
					<label for="jeniskelamin_guru">Jenis Kelamin</label>
					<select name="jeniskelamin_guru" id="jeniskelamin_guru" class="form-control">
						<option value="Laki- Laki">Laki - Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
        		
				<div class="form-group">
					<label for="telepon_guru">No Telepon</label>
					<input type="text" class="form-control" name="telepon_guru" id="telepon_guru" autocomplete="off" value="<?= set_value('telepon_guru'); ?>">
				</div>
        		
				<div class="form-group">
					<label for="email_guru">Email</label>
					<input type="text" class="form-control" name="email_guru" id="email_guru" autocomplete="off" value="<?= set_value('email_guru'); ?>">
				</div>
        		
				<div class="form-group">
					<label for="alamat_guru">Alamat</label>
					<input type="text" class="form-control" name="alamat_guru" id="alamat_guru" autocomplete="off" value="<?= set_value('alamat_guru'); ?>">
				</div>
        		
				<div class="form-group">
					<label for="pendidikan_guru">Pendidikan Guru</label>
					<input type="text" class="form-control" name="pendidikan_guru" id="pendidikan_guru" autocomplete="off" value="<?= set_value('pendidikan_guru'); ?>">
				</div>
        		
				<div class="form-group">
					<label for="nip">Status Kawin</label>
					<select name="status_kawin" id="status_kawin" class="form-control">
						<option value="Kawin">Kawin</option>
						<option value="Belum">Belum</option>
					</select>
				</div>
        		
				<div class="form-group">
					<label for="jabatan">Jabatan</label></label>
					<input type="text" class="form-control" name="jabatan" id="jabatan" autocomplete="off" value="<?= set_value('jabatan'); ?>">
				</div>
        		
				<div class="form-group">
					<label for="status_aktif">Status Aktif</label>
					<select name="status_aktif" id="status_aktif" class="form-control">
						<option value="1">Aktif</option>
						<option value="0">Tidak Aktif</option>
					</select>
				</div>

        	
		        </div>
		        <div class="modal-footer">
		          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
		          <button type="submit" class="btn btn-primary">Simpan Data</button>
		        </div>
        	</form>
      </div>
    </div>
  </div>