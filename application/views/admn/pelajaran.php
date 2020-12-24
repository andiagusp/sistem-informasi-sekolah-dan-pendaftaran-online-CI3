	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-6">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Tabel Pelajaran</h1>
  			
  				<div class="card">
  					<div class="card-header">Data Mata Pelajaran</div>
  					<div class="card-body">
  						<div class="table-responsive">
  							<button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalPelajaran">
								Tambah Data Pelajaran
							</button>
  							<?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
							<?= $this->session->flashdata('message'); ?>
  							<table class="table table-bordered">
  								<thead>
  									<tr>
  										<th>No</th>
  										<th>Mata Pelajaran</th>
  										<th>KKM</th>
  										<th>Opsi</th>
  									</tr>
  								</thead>
  								<tbody>
  								<?php $i = 1; foreach($pelajaran as $pel): ?>
  									<tr>
  										<td><?= $i++; ?></td>
  										<td><?= $pel['pelajaran']; ?></td>
  										<td><?= $pel['kkm']; ?></td>
  										<td>
  											<a href="<?= base_url('admn/edit_pelajaran'); ?>/<?= $pel['id_pelajaran']; ?>" class="badge badge-success" onclick="return confirm('Edit Mata Pelajaran <?= $pel['pelajaran']; ?> ?')">Edit</a>
  											<a href="<?= base_url('admn/hapus_pelajaran'); ?>/<?= $pel['id_pelajaran']; ?>" class="badge badge-danger" onclick="return confirm('Hapus Mata Pelajaran <?= $pel['pelajaran']; ?> ?')">Hapus</a>
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

<!-- Logout Modal-->
  <div class="modal fade" id="modalPelajaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">Tambah Mata Pelajaran</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        	<form action="" method="post">

			<div class="form-group">
				<label for="pelajaran" class="ml-1">Mata Pelajaran</label>
				<input type="text" class="form-control" name="pelajaran" id="pelajaran" autocomplete="off" value="<?= set_value('pelajaran'); ?>">
			</div>

			<div class="form-group">
				<label for="kkm" class="ml-1">KKM</label>
				<input type="text" class="form-control" name="kkm" id="kkm" autocomplete="off" set_value="<?= set_value('kkm'); ?>">
			</div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>