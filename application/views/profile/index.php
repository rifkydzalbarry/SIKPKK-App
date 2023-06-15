                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800">User Profile</h1>

                  <!-- Dropdown Card Example -->
                  <!-- <div class="col-xl-3 col-md-6 mb-4"> -->

                  <div class="card border-bottom-primary shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="d-flex">
                      <div class="mr-auto"></div>
                      <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-cog fa-fw text-primary mr-5 pt-4"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#">Edit Profile</a>
                          <a class="dropdown-item" href="#">Change Password</a>
                          <a class="dropdown-item" href="#">Change Photo</a>
                        </div>
                      </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body text-center">
                      <img class="img-profile rounded-circle mb-3" src="<?= base_url('assets/img/profile/') . $user['image'] ?>" width="100vh" height="100vh">
                      <div class="h5 font-weight-bold text-primary text-uppercase mb-1">
                        <?= $user['fullname'] ?></div>
                      <div class="font-weight-bold text-gray-800"><?= $user['address'] ?></div>
                    </div>
                  </div>
                  <!-- </div> -->

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->