	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-6">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Tabel Edit Pelajaran</h1>
  			
  				<div class="card shadow">
  					<div class="card-header">Edit Pelajaran</div>
  					<div class="card-body shadow">
  						<div class="table-responsive">
  							<form action="" method="post">

                  <input type="hidden" name="id_pelajaran" id="id_pelajaran" value="<?= $pelajaran['id_pelajaran']; ?>">
                  
                  <div class="form-group">
                    <label for="pelajaran" class="ml-1">Mata Pelajaran</label>
                    <input type="text" class="form-control" name="pelajaran" id="pelajaran" value="<?= $pelajaran['pelajaran']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="kkm" class="ml-1">KKM</label>
                    <input type="text" class="form-control" name="kkm" id="kkm" value="<?= $pelajaran['kkm']; ?>">
                  </div>

                  <div class="form-group float-right">
                    <a href="<?= base_url('admn/pelajaran'); ?>" class="btn btn-warning">Kembali</a>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                  </div>
                </form>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>


	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->