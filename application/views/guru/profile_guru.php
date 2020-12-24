		<!-- Begin Page Content -->
        <div class="container-fluid">

		<div class="row">
			<div class="col-lg-6">

				 <!-- Page Heading -->
         		 <h1 class="h3 mb-4 text-gray-800">Detail</h1>

					<div class="card shadow">
						<div class="card-header">Data Detail Anda</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Ket</th>
											<th>Detail</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>NIP</td>
											<td><?= $user['nip']; ?></td>
										</tr>
										<tr>
											<td>2</td>
											<td>Akronim</td>
											<td><?= $user['akronim']; ?></td>
										</tr>
										<tr>
											<td>3</td>
											<td>Nama</td>
											<td><?= $user['nama_guru']; ?></td>
										</tr>
										<tr>
											<td>4</td>
											<td>Tempat Lahir</td>
											<td><?= $user['tempat_lahir_guru']; ?></td>
										</tr>
										<tr>
											<td>5</td>
											<td>Tanggal Lahir</td>
											<td><?= $user['tanggal_lahir']; ?></td>
										</tr>
										<tr>
											<td>6</td>
											<td>Agama</td>
											<td><?= $user['agama_guru']; ?></td>
										</tr>
										<tr>
											<td>7</td>
											<td>Jenis Kelamin</td>
											<td><?= $user['jeniskelamin_guru']; ?></td>
										</tr>
										<tr>
											<td>8</td>
											<td>No Telepon</td>
											<td><?= $user['telepon_guru']; ?></td>
										</tr>
										<tr>
											<td>9</td>
											<td>Email</td>
											<td><?= $user['email_guru']; ?></td>
										</tr>
										<tr>
											<td>10</td>
											<td>Alamat</td>
											<td><?= $user['alamat_guru']; ?></td>
										</tr>
										<tr>
											<td>11</td>
											<td>Pendidikan</td>
											<td><?= $user['pendidikan_guru']; ?></td>
										</tr>
										<tr>
											<td>12</td>
											<td>Status Kawin</td>
											<td><?= $user['status_kawin']; ?></td>
										</tr>
										<tr>
											<td>13</td>
											<td>Jabatan</td>
											<td><?= $user['jabatan']; ?></td>
										</tr>
										<tr>
											<td>14</td>
											<td>Status Aktif</td>
											<td><?= cek($user['status_aktif']); ?></td>
										</tr>
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