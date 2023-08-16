                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <!-- Page Heading -->
                  <h1 class="h3 mb-2 text-gray-800">Edit Profile</h1>

                  <div class="row">
                    <div class="col-lg-12">

                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Form Edit Profile
                          </h6>
                        </div>
                        <div class="card-body">
                          <?= form_open_multipart('users/edit') ?>
                          <input type="hidden" name="id" value="<?= $user['id'] ?>">
                          <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="fullname" class="col-sm-2 col-form-label">Full name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $user['fullname'] ?>">
                              <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="address" id="" cols="15" rows="3"><?= $user['address']  ?></textarea>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-2">Picture</div>
                            <div class="col-sm-10">
                              <div class="row">
                                <div class="col-sm-3">
                                  <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->