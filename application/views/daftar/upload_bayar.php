
    <!-- Begin Page Content -->
    <div class="container-fluid">
    	<div class="row ml-2">
    		<div class="col-lg-6 mb-3">
    			<!-- Page Heading -->
      			<h1 class="h3 mb-4 text-gray-800">Upload Bayar</h1>
      			
      			<div class="alert alert-success">Upload Bukti Transfer Kesini Ukuran File Harus Kurang dari 1MB</div>
      			<div class="alert alert-success">Pastikan Transfer Ke Nomer Rekening : 0946-01-031993-53-9 AN SMK MADANI DEPOK BANK MANDIRI</div>
      			<?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
      			<?= form_open_multipart('cpdb/upload_bayar'); ?>
      			<?= $this->session->flashdata('message'); ?>
					<div class="form-group row">
						<label for="nama" class="col-sm-4 col-form-label col-form-label-sm">Nama</label>
						<div class="col-sm-8">
						<input type="text" name="nama" class="form-control form-control-sm" id="nama" placeholder="Isi nama disini" autocomplete="off" value="<?= $user['nama_lengkap']; ?>" readonly>
						<small><?= form_error('nama'); ?></small>
						</div>
					</div>

					<div class="form-group row">
						<label for="no_daftar" class="col-sm-4 col-form-label col-form-label-sm">No Daftar</label>
						<div class="col-sm-8">
						<input type="text" name="no_daftar" class="form-control form-control-sm" id="no_daftar" placeholder="Isi no_daftar disini" autocomplete="off" value="<?= $user['no_daftar']; ?>" readonly>
						<small><?= form_error('no_daftar'); ?></small>
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-sm-4 col-form-label col-form-label-sm">Email</label>
						<div class="col-sm-8">
						<input type="text" name="email" class="form-control form-control-sm" id="email" placeholder="Isi email disini" autocomplete="off" value="<?= $user['email']; ?>" readonly>
						<small><?= form_error('email'); ?></small>
						</div>
					</div>

					<div class="form-group row">
						<label for="telepon" class="col-sm-4 col-form-label col-form-label-sm">No Telepon</label>
						<div class="col-sm-8">
						<input type="text" name="telepon" class="form-control form-control-sm" id="telepon" placeholder="Isi telepon disini" autocomplete="off">
						<small><?= form_error('telepon'); ?></small>
						</div>
					</div>

					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Jenis Bayar</label>
						<div class="col-sm-8">
						<select name="jenis_bayar" class="form-control form-control-sm">
							<option value="">-- Pilih Pembayaran --</option>
							<option value="Formulir Pendaftaran">Formulir Pendaftaran Rp. 200.000</option>
							<option value="Baju Praktek">Baju Praktek Rp. 350.000</option>
							<option value="MOPD">MOPD Rp. 250.000</option>
							<option value="Seragam Olah Raga">Seragam Olah Raga Rp. 250.000</option>
							<option value="Dasi Topi Dll">Dasi Topi Dll Rp. 250.000</option>
							<option value="Baju Muslim">Baju Muslim Rp. 200.000</option>
							<option value="Sarana Prasarana">Sarana Prasarana Rp. 395.000</option>
							<option value="SPP Bulan Juli">Spp Bulan Juli Rp. 205.000</option>
							<option value="Keseluruhan">Bayar Semua Rp. 2.100.000</option>
						</select>
						<small>Diutamakan Bayar Formulir Pendaftaran</small>
						</div>
					</div>

					<div class="form-group row">
						<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Upload bukti bayar disini</label>
						<div class="col-sm-8">
							<div class="custom-file">
							  <input required type="file" class="custom-file-input" id="foto" name="foto">
							  <label class="custom-file-label" for="foto">Choose file</label>
							</div>
							<small><?= form_error('foto'); ?></small>
						</div>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary float-right">
							Upload
						</button>
					</div>
      			</form>
    		</div>
    		<!-- close form upload -->

    		<div class="col-lg-6">
    			<div class="card shadow">
    				<div class="card-header">Biaya Pendaftaran</div>
    				<div class="card-body">
    					<div class="table-responsive">
    						<img src="<?= base_url('assets/img/daftar.png'); ?>" alt="" class="img-fluid">
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
     
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

      