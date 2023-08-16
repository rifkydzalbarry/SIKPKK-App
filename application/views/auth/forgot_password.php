<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center  mt-5 pt-lg-5">

    <div class="col-xl-10 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg">
        <div class="card-body p-lg-3 p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center mb-4">
                  <h1 class="h4 text-gray-900">Sistem Informasi Kegiatan PKK</h1>
                  <span class="text-muted">Forgot your password ?</span>
                </div>
                <?= $this->session->flashdata('message') ?>
                <form class="user" method="post" action="">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                  </div>

                  <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                    Reset Password
                  </button>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth') ?>">Back to Login</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>