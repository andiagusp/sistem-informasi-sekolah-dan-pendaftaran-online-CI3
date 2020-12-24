  <!-- Begin Page Content -->
  <div class="container-fluid">

      <div class="row">
        <div class="col-lg-6">
        
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Data Pelajaran</h1>
        
          <div class="card">
            <div class="card-header">Tabel Pelajaran</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Mata Pelajaran</th>
                      <th>KKM</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; foreach($pelajaran as $pel): ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $pel['pelajaran']; ?></td>
                      <td><?= $pel['kkm']; ?></td></td>
                    </tr>
                  </tbody>
                  <?php endforeach; ?>
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
