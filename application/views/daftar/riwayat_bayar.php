	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-12">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Riwayat Pembayaran</h1>
  			
  				<div class="card">
  					<div class="card-header">Tabel Pembayaran</div>
  					<div class="card-body">
              <div class="alert alert-danger">Tunggu 3 Hari Untuk Konfirmasi</div>
  						<div class="table-responsive">
  						  <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Pendaftaran</th>
                      <th>Nama Lengkap</th>
                      <th>Email</th></th>
                      <th>Telepon</th>
                      <th>Jenis Bayar</th>
                      <th>Tanggal Bayar</th>
                      <th>Status</th>
                      <th>Foto</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach($bayar as $byr): ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $byr['no_daftar_pembayaran']; ?></td>
                      <td><?= $byr['nama_lengkap_pembayaran']; ?></td>
                      <td><?= $byr['email']; ?></td>
                      <td><?= $byr['telepon']; ?></td>
                      <td><?= $byr['jenis_bayar']; ?></td>
                      <td><?= $byr['tanggal_bayar']; ?></td>
                      <td><?= $byr['konfirm_status']; ?></td>
                      <td>
                        <a href="" class="modal-daftar badge badge-primary" data-daftar="<?= $byr['no_daftar_pembayaran']; ?>" data-nama="<?= $byr['nama_lengkap_pembayaran']; ?>" data-foto="<?= $byr['foto']; ?>" data-toggle="modal" data-target="#modalBayarDaftar">Cek Foto</a>
                        <a target="_blank" href="<?= base_url('cetak/bukti_bayar'); ?>/<?= $byr['id_pembayaran']; ?>/<?= $byr['no_daftar_pembayaran']; ?>" class="badge badge-success">Cetak</a>
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
  <div class="modal fade" id="modalBayarDaftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title-bayar">Modal Title</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="" alt="" class="modal-daftar-bayar img-fluid" width="450" height="450">
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>