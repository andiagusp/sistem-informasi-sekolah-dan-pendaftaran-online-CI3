	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-12">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Data Pembayaran Pendaftaran</h1>
  			
  				<div class="card shadow">
  					<div class="card-header">Tabel Pembayaran</div>
  					<div class="card-body">
              <h5>Jumlah Data : <?= $total_rows; ?></h5>

              <form action="" method="post">
                <div class="input-group mb-3">
                  <input class="btn btn-primary" type="submit" name="cari" id="cari" value="cari">
                  <div class="input-group-append">
                    <input type="text" class="form-control" placeholder="no daftar, email, nama" name="keyword" id="keyword" autocomplete="off">
                  </div>
                </div>
              </form>

              <?php if($keyword): ?>
                <form action="" method="post">
                  <input type="submit" name="unset" id="unset" class="btn btn-primary mb-1" value="Batalkan Pencarian">
                </form>
              <?php endif; ?>
              
              <?= $this->session->flashdata('message'); ?>
  						<div class="table-responsive">
  							<table class="table table-bordered">
                  <thead>
                    <tr>
                      <td>No</td>
                      <td>No Pendaftaran</td>
                      <td>Nama Lengkap</td>
                      <td>Email</td>
                      <td>Telepon</td>
                      <td>Jenis Bayar</td>
                      <td>Tanggal Bayar</td>
                      <td>Status</td>
                      <td>Foto</td>
                      <td>Opsi</td>
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
                        <a href="" class="badge badge-primary tampilLayar" data-toggle="modal" data-target="#upgambar" data-foto="<?= $byr['foto']; ?>" data-daftar="<?= $byr['no_daftar_pembayaran']; ?>" data-nama="<?= $byr['nama_lengkap_pembayaran']; ?>">Cek Foto</a>
                        <a target="_blank" href="<?= base_url('cetak/bukti_bayar'); ?>/<?= $byr['id_pembayaran']; ?>/<?= $byr['no_daftar_pembayaran']; ?>" class="badge badge-success">Cetak</a>
                      </td>
                      <td>
                      <?php if($byr['konfirm_status'] == 'konfirmasi'): ?>
                        <a href="<?= base_url('admn/batalkonfirm_pembayaran'); ?>/<?= $byr['id_pembayaran']; ?>" class="badge badge-warning">Batalkan</a>
                      <?php else: ?>
                          <a href="<?= base_url('admn/konfirm_pembayaran'); ?>/<?= $byr['id_pembayaran']; ?>" class="badge badge-primary">Konfirmasi</a>
                      <?php endif; ?>
                        <a href="<?= base_url('admn/hapus_pembayaran'); ?>/<?= $byr['id_pembayaran']; ?>" class="badge badge-danger">Hapus</a>
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
  <div class="modal fade" id="upgambar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-popupimg">Modal Title</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"  align="center">
          <img src="" alt="" class="img-bayar img-fluid" width="450">
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>