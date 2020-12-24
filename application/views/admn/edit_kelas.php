	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-6">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Edit Kelas</h1>
  			
  				<div class="card">
  					<div class="card-header">Isi Data Kelas</div>
            <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
  					<div class="card-body">
  						<form action="" method="post">
                <input type="hidden" name="id_kelas" id="id_kelas" value="<?= $kls['id_kelas']; ?>">  

                <div class="form-group">
                  <label for="kelas" class="ml-1">Kelas</label>      
                  <input type="text" class="form-control" name="kelas" id="kelas" value="<?= $kls['kelas']; ?>">
                </div>
                
                <div class="form-group">
                  <label for="kapasitas" class="ml-1">Kapasitas</label>
                  <input type="text" class="form-control" name="kapasitas" id="kapasitas" value="<?= $kls['kapasitas']; ?>">
                </div>

                <div class="form-group float-right">
                  <a href="<?= base_url('admn/kelas'); ?>" class="btn btn-secondary">Kembali</a>
                  <button class="btn btn-primary" type="submit">Simpan</button>
                </div>

              </form>
  					</div>
  				</div>
  			</div>
  		</div>