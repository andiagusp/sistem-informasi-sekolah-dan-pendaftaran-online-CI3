  <!-- Begin Page Content -->
  <div class="container-fluid">

      <div class="row">
        <div class="col-lg-6">
        
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Login CPDB</h1>
        
          <div class="card">
            <div class="card-header">Form Login</div>
            <div class="card-body">
            <?= $this->session->flashdata('message');?>
              <div class="table-responsive">
                <form class="user" action="<?= base_url('home/login_cpdb'); ?>" method="post">
                  <div class="form-group">
                    <label for="username" class="ml-2">Username</label>
                    <input type="username" class="form-control form-control-user" name="username" id="username" placeholder="email anda" value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="pl-3">', '</small>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="pasword" class="ml-2">Password</label>
                    <input type="password" class="form-control form-control-user" name="pasword" id="pasword" placeholder="1998-01-01">
                    <?= form_error('pasword', '<small class="pl-3">', '</small>'); ?>
                  </div>

                  <hr>

                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                    
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