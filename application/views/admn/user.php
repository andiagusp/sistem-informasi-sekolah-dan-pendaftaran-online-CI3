	<!-- Begin Page Content -->
	<div class="container-fluid">

  		<div class="row">
  			<div class="col-lg-12">
  			
  				<!-- Page Heading -->
  				<h1 class="h3 mb-4 text-gray-800">Data User</h1>
  				
  				<div class="card">
  					<div class="card-header">Tabel User</div>
  					<div class="card-body">
						<button class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalUserGuru">
		  					Tambah User Guru
		  				</button>
		  				<button class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalUserSiswa">
		  					Tambah User Siswa
		  				</button>
		  				
						<?= $this->session->flashdata('message'); ?>
						<?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

  						<div class="table-responsive">
  							<table class="table table-bordered">
  								<thead>
  									<tr>
  										<th>No</th>
                      <th>Nama User</th>
  										<th>Username</th>
  										<th>Level</th>
  										<th>Status</th>
  										<th>Opsi</th>
  									</tr>
  								</thead>
  								<tbody>
  								<?php $i = 1; foreach($restrict as $r) : ?>
  									<tr>
  										<td><?= $i++; ?></td>
                      <td><?= $r['nama_user']; ?></td>
  										<td><?= $r['username']; ?></td>
  										<td><?= $r['level']; ?></td>
  										<td><?= cek_akt($r['status']); ?></td>
  										<td>
  										<?php if($r['status'] == 1): ?>
											<a href="<?= base_url('admn/nonaktifkan_user'); ?>/<?= $r['username']; ?>/<?= $r['id_user']; ?>" class="badge badge-warning" onclick="return confirm('Nonaktikan Username <?= $r['username']; ?> ?');">Nonaktikan</a>
										<?php else: ?>
  											<a href="<?= base_url('admn/aktifkan_user'); ?>/<?= $r['username']; ?>/<?= $r['id_user']; ?>" class="badge badge-success" onclick="return confirm('Nonaktikan Username <?= $r['username']; ?> ?');">Aktifkan</a>
  										<?php endif; ?>
  											<a href="<?= base_url('admn/hapus_user'); ?>/<?= $r['username']; ?>/<?= $r['id_user']; ?>" class="badge badge-danger" onclick="return confirm('Hapus Username <?= $r['username']; ?> ?');">Hapus</a>
  										</td>
  									</tr>
  								<?php endforeach; ?>
  								</tbody>
  							</table>
  						</div>
  					</div>
  				</div>
  			</div>
        <!-- tutup tabel user -->

        <!-- tabel admin -->
        <div class="col-lg-12">
         <div class="card shadow">
           <div class="card-header">Tabel User Admin</div>
           <div class="card-body">
            <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalAdmn">
              Tambah User Admin
            </button>
             <div class="table-responsive">
               <table class="table table-bordered">
                 <thead>
                   <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>Username</th>
                     <th>Level</th>
                     <th>Status</th>
                     <th>Opsi</th>
                   </tr>
                 </thead>
                 <tbody>
                    <?php $i = 1; foreach($adm as $a): ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $a['nama']; ?></td>
                      <td><?= $a['username']; ?></td>
                      <td><?= $a['level']; ?></td>
                      <td><?= cek_akt($a['status']); ?></td>
                      <td>
                        <?php if($a['status'] == 1): ?>
                        <a href="<?= base_url('admn/nonaktifkan_admin'); ?>/<?= $a['id_admin']; ?>/<?= $a['username']; ?>" class="badge badge-warning" onclick="return confirm('Nonaktikan Username <?= $a['username']; ?> ?');">Nonaktikan</a>
                      <?php else: ?>
                          <a href="<?= base_url('admn/aktifkan_admin'); ?>/<?= $a['id_admin']; ?>/<?= $a['username']; ?>" class="badge badge-success" onclick="return confirm('Nonaktikan Username <?= $a['username']; ?> ?');">Aktifkan</a>
                        <?php endif; ?>
                          <a href="<?= base_url('admn/hapus_admin'); ?>/<?= $a['id_admin']; ?>/<?= $a['username']; ?>" class="badge badge-danger" onclick="return confirm('Hapus Username <?= $a['username']; ?> ?');">Hapus</a>  
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

<!-- modal guru-->
  <div class="modal fade" id="modalUserGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">Tambah User Guru</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        	<form action="<?= base_url('admn/user'); ?>" method="post">

        		<div class="form-group">
					<label for="username_guru" class="ml-1">Masukkan NIP Guru</label>
					<input type="text" class="form-control" name="username_guru" id="username_guru" value="<?= set_value('username_guru'); ?>" autocomplete="off" autofocus="on" required>
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

  <!-- modal siswa -->
  <div class="modal fade" id="modalUserSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">Tambah User Siswa</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        	<form action="<?= base_url('admn/user'); ?>" method="post">
				
				<div class="form-group">
					<label for="username_siswa" class="ml-1">Masukkan Nis Siswa</label>
					<input type="text" class="form-control" name="username_siswa" id="username_siswa" value="<?= set_value('username_siswa'); ?>" autocomplete="off" autofocus="on" required>
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

  <!-- modal siswa -->
  <div class="modal fade" id="modalAdmn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">Tambah User Admin</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('admn/user_admn'); ?>" method="post">
        
        <div class="form-group">
          <label for="nama" class="ml-1">Nama</label>
          <input type="text" autofocus="on" class="form-control" name="nama" id="nama" value="<?= set_value('nama'); ?>" autocomplete="off" required>
        </div>
        
        <div class="form-group">
          <label for="username" class="ml-1">Username</label>
          <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username'); ?>" autocomplete="off" autofocus="on" required>
        </div>
        
        <div class="form-group">
          <label for="password1" class="ml-1">Password</label>
          <input type="password" class="form-control" name="password1" id="password1" value="<?= set_value('password1'); ?>" autocomplete="off" placeholder="min 5" autofocus="on" required>
        </div>
        
        <div class="form-group">
          <label for="password2" class="ml-1">Confirm Password</label>
          <input type="password" class="form-control" name="password2" id="password2" value="<?= set_value('password2'); ?>" autocomplete="off" autofocus="on" required>
        </div>
        
        <div class="form-group">
          <label for="status" class="ml-1">Status</label>
          <select name="status" id="status" required class="form-control">
            <option value="">-- Status Aktif --</option>
            <option value="1">Aktif</option>
            <option value="0">Tidak Aktif</option>
          </select>
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