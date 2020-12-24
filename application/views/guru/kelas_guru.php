	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-6">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Tabel Kelas</h1>
  			
  				<div class="card shadow">
  					<div class="card-header">Tabel Kelas</div>
  					<div class="card-body">
  						<div class="table-responsive">
  							<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kelas</th>
                      <th>Kapasitas</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach($kelas as $kls): ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $kls['kelas']; ?></td>
                      <td><?= $kls['kapasitas']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
  						</div>
  					</div>
  				</div>
  			</div>
        <!-- Tutup Kelas -->

        <!-- Tabel Jurusan -->

        <div class="col-lg-6">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Tabel Jurusan</h1>

          <div class="card shadow">
            <div class="card-header">Tabel Jurusan</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Jurusan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach($jurusan as $jur): ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $jur['jurusan']; ?></td>
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
