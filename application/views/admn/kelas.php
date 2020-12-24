	<!-- Begin Page Content -->
	<div class="container-fluid">

	<!-- Kelas -->
  		<div class="row">
			<div class="col-lg-6 mb-3">
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Data Kelas</h1>
  			
  				<div class="card shadow">
  					<div class="card-header">Tabel Kelas</div>
  					<div class="card-body">
  						<button class="btn btn-primary mb-3" type="submit" data-toggle="modal" data-target="#modalKelas">
  						Tambah Data Kelas
  						</button>
	  					<?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
	  					<?= $this->session->flashdata('message'); ?>
  						<div class="table-responsive">
  							<table class="table table-bordered">
  								<thead>
  									<tr>
  										<th>No</th>
  										<th>Kelas</th>
  										<th>Kapasitas</th>
  										<th>Opsi</th>
  									</tr>
  								</thead>
  								<tbody>
  								<?php $i = 1; foreach($kls as $k): ?>
  									<tr>
  										<td><?= $i++; ?></td>
  										<td><?= $k['kelas']; ?></td>
  										<td><?= $k['kapasitas']; ?></td>
  										<td>
  											<a href="<?= base_url('admn/edit_kelas'); ?>/<?= $k['id_kelas']; ?>" class="badge badge-success" onclick="return confirm('Ingin Edit Kelas <?= $k['kelas']; ?> ?')">Edit</a>
  											<a href="<?= base_url('admn/hapus_kelas'); ?>/<?= $k['id_kelas']; ?>" class="badge badge-danger" onclick="return confirm('Ingin Hapus Kelas <?= $k['kelas']; ?> ?')">Hapus</a>
  										</td>
  									</tr>
  								<?php endforeach; ?>
  								</tbody>
  							</table>
  						</div>
  					</div>
  				</div>
  			</div>
  			<!-- Close Kelas -->

  			<div class="col-lg-6">

  				<h1 class="h3 mb-4 text-gray-800">Data Jurusan</h1>

  				<div class="card">
  					<div class="card-header">Tabel Jurusan</div>
  					<div class="card-body">

  						<button class="btn btn-primary mb-3" type="submit" data-toggle="modal" data-target="#modalJurusan">
  						Tambah Data Jurusan
	  					</button>
	  					<?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
	  					<?= $this->session->flashdata('pesan_jur'); ?>
					
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Jurusan</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody>
								<?php $i = 1; foreach($jurusan as $j): ?>
									<tr>
										<td><?= $i++; ?></td>
										<td><?= $j['jurusan']; ?></td>
										<td>
											<a href="<?= base_url('admn/hapus_jurusan'); ?>/<?= $j['id_jurusan']; ?>" class="badge badge-danger" onclick="return confirm('Ingin Hapus Jurusan <?= $j['jurusan']; ?> ?');">Hapus</a>
										</td>
									</tr>
								<?php endforeach; ?>
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

<!-- Kelas Modal-->
  <div class="modal fade" id="modalKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">Tambah Data Kelas</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('admn/kelas'); ?>" method="post">

			<div class="form-group">
				<label for="kelas" class="ml-1">Kelas</label>
				<input type="text" class="form-control" name="kelas" id="kelas" autocomplete="off" value="<?= set_value('kelas'); ?>">
			</div>

			<div class="form-group">
				<label for="kapasitas" class="ml-1">Kapasitas</label>
				<input type="text" class="form-control" name="kapasitas" id="kapasitas" autocomplete="off" value="<?= set_value('kapasitas'); ?>">
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

  <!-- Jurusan Modal-->
  <div class="modal fade" id="modalJurusan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">Tambah Data Jurusan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('admn/jurusan'); ?>" method="post">

			<div class="form-group">
				<label for="jurusan" class="ml-1">Jurusan</label>
				<input type="text" class="form-control" name="jurusan" id="jurusan" autocomplete="off" value="<?= set_value('jurusan'); ?>">
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