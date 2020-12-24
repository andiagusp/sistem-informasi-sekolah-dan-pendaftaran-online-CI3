<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Halaman Login Admn</h1>
                  </div>
                  <?= $this->session->flashdata('message'); ?>
                  <form class="user" action="<?= base_url('login/log_admn'); ?>" method="post">
                    <div class="form-group">
                      <label for="username" class="ml-2">Username</label>
                      <input type="username" class="form-control form-control-user" name="username" id="username" placeholder="username anda" value="<?= set_value('username'); ?>">
                      <?= form_error('username', '<small class="pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                      <label for="pasword" class="ml-2">Password</label>
                      <input type="password" class="form-control form-control-user" name="pasword" id="pasword" placeholder="Password">
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

    </div>

  </div>