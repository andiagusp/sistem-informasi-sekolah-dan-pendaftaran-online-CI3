  <!-- Begin Page Content -->
  <div class="container-fluid">

    <div class="row">
      <!-- Data Siswa -->
      <div class="col-lg-6">
      
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Data Pendaftaran</h1>
        <div class="alert alert-danger"> Status Bayar <?= $user['status_bayar']; ?></div>
      
        <div class="card shadow mb-3">
          <div class="card-header">Data Siswa Pendaftaran</div>
          <div class="card-body">
            <div class="table-responsive">
              Keterangan Pribadi Siswa
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Ket</th>
                    <th>Isi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>No Daftar</td>
                    <td><?= $user['no_daftar']; ?></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Tanggal Daftar</td>
                    <td><?= $user['tanggal_daftar']; ?></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Nama Lengkap</td>
                    <td><?= $user['nama_lengkap']; ?></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Jurusan yang Dipilih</td>
                    <td><?= $user['jurusan']; ?></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Nama Panggilan</td>
                    <td><?= $user['nama_panggilan']; ?></td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>NISN</td>
                    <td><?= $user['nisn']; ?></td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>No KIP/KIS/KPS/DLL</td>
                    <td><?= $user['no_kartu_kes']; ?></td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>Jenis Kelamin</td>
                    <td><?= $user['jenis_kelamin']; ?></td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>Tempat Lahir</td>
                    <td><?= $user['tempat_lahir']; ?></td>
                  </tr>
                  <tr>
                    <td>10</td>
                    <td>Tanggal Lahir</td>
                    <td><?= $user['tanggal_lahir']; ?></td>
                  </tr>
                  <tr>
                    <td>11</td>
                    <td>Agama</td>
                    <td><?= $user['agama']; ?></td>
                  </tr>
                  <tr>
                    <td>12</td>
                    <td>Email</td>
                    <td><?= $user['email']; ?></td>
                  </tr>
                  <tr>
                    <td>13</td>
                    <td>Kewarganegaraan</td>
                    <td><?= $user['kewarganegaraan']; ?></td>
                  </tr>
                  <tr>
                    <td>14</td>
                    <td>Anak Ke -</td>
                    <td><?= $user['anakke']; ?></td>
                  </tr>
                  <tr>
                    <td>15</td>
                    <td>Jumlah Saudara</td>
                    <td><?= $user['jumlah_saudara']; ?></td>
                  </tr>
                  <tr>
                    <td>16</td>
                    <td>Yatim/Piatu/Yatim Piatu</td>
                    <td><?= $user['status_anak']; ?></td>
                  </tr>
                  <tr>
                    <td>17</td>
                    <td>Bahasa Sehari - hari</td>
                    <td><?= $user['bahasa']; ?></td>
                  </tr>
                  <tr>
                    <td>18</td>
                    <td>Berat Badan</td>
                    <td><?= $user['berat_badan']; ?></td>
                  </tr>
                  <tr>
                    <td>19</td>
                    <td>Tinggi Badan</td>
                    <td><?= $user['tinggi_badan']; ?></td>
                  </tr>
                  <tr>
                    <td>20</td>
                    <td>Golongan Darah</td>
                    <td><?= $user['golongan_darah']; ?></td>
                  </tr>
                  <tr>
                    <td>21</td>
                    <td>Kegemaran</td>
                    <td><?= $user['kegemaran']; ?></td>
                  </tr>
                </tbody>    
              </table>
            </div>
          </div>
        </div>

        

        <div class="card shadow">
          <div class="card-header">Data Sekolah Asal</div>
          <div class="card-body">
            <div class="table-responsive">
              <!-- data sekolah asal -->
              Data Sekolah Asal
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Ket</th>
                    <th>Isi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Asal Sekolah</td>
                    <td><?= $user['asal_sekolah']; ?></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Alamat Sekolah</td>
                    <td><?= $user['alamat_sekolah']; ?></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>No Ijazah</td>
                    <td><?= $user['no_ijazah']; ?></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>No SKHUN</td>
                    <td><?= $user['no_skhun']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- close data sekolah asal -->


      </div>
      <!-- Close col lg 6 1 -->



      <!-- Col lg 6 2-->
        
      <div class="col-lg-6">
         <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Data Pendaftaran</h1>
        <div class="alert alert-danger"> Status Bayar <?= $user['status_bayar']; ?></div>
        
        <!-- alamat siswa -->
        <div class="card shadow mb-3">
          <div class="card-header">Alamat Siswa</div>
          <div class="card-body">
            <div class="table-responsive">
              Alamat Siswa 
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Ket</th>
                    <th>Isi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Alamat Siswa</td>
                    <td><?= $user['alamat']; ?></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>No Telepon</td>
                    <td><?= $user['telepon']; ?></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Tinggal Dengan</td>
                    <td><?= $user['tinggal_dengan']; ?></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Jarak Ke Sekolah</td>
                    <td><?= $user['jarak']; ?></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Kesekolah Pakai Kendaraan / Jalan</td>
                    <td><?= $user['kendaraan']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Alamat Siswa -->
        

        <!-- Data Orang Tua -->
        <div class="card shadow">
          <div class="card-header">Data Orang Tua</div>
          <div class="card-body">
            <div class="table-responsive">
              Data Ayah dan Ibu
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Ket</th>
                    <th>Isi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Nama Ayah</td>
                    <td><?= $user['nama_ayah']; ?></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Tempat Lahir</td>
                    <td><?= $user['tempat_lahir_ayah']; ?></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Tanggal Lahir</td>
                    <td><?= $user['tanggal_lahir_ayah']; ?></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Kewarganegaraan</td>
                    <td><?= $user['kewarganegaraan_ayah']; ?></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Pendidikan</td>
                    <td><?= $user['pendidikan_ayah']; ?></td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>Pekerjaan</td>
                    <td><?= $user['pekerjaan_ayah']; ?></td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>Penghasilan</td>
                    <td><?= $user['penghasilan_ayah']; ?></td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>Alamat</td>
                    <td><?= $user['alamat_ayah']; ?></td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>Nama Ibu</td>
                    <td><?= $user['nama_ibu']; ?></td>
                  </tr>
                  <tr>
                    <td>10</td>
                    <td>Tempat Lahir</td>
                    <td><?= $user['tempat_lahir_ibu']; ?></td>
                  </tr>
                  <tr>
                    <td>11</td>
                    <td>Tanggal Lahir</td>
                    <td><?= $user['tanggal_lahir_ibu']; ?></td>
                  </tr>
                  <tr>
                    <td>12</td>
                    <td>Kewarganegaraan</td>
                    <td><?= $user['kewarganegaraan_ibu']; ?></td>
                  </tr>
                  <tr>
                    <td>13</td>
                    <td>Pendidikan</td>
                    <td><?= $user['pendidikan_ibu']; ?></td>
                  </tr>
                  <tr>
                    <td>14</td>
                    <td>Pekerjaan</td>
                    <td><?= $user['pekerjaan_ibu']; ?></td>
                  </tr>
                  <tr>
                    <td>15</td>
                    <td>Penghasilan</td>
                    <td><?= $user['penghasilan_ibu']; ?></td>
                  </tr>
                  <tr>
                    <td>16</td>
                    <td>Alamat</td>
                    <td><?= $user['alamat_ibu']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  


      <!-- Close Data Orang tua -->
    </div>


  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->