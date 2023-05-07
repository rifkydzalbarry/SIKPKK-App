<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Basic Card Example -->
  <form action="" method="post">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Kegiatan PKK</h6>
      </div>
      <div class="card-body">
        <div class="row row-cols-1 row-cols-4">
          <div class="col">
            <div class="card shadow mb-2">
              <div class="card-body">
                <div class="mb-3">
                  <label for=""><strong>Nama Kegiatan</strong></label>
                  <input type="text" class="form-control" value="<?= $kegiatan['nama_kegiatan'] ?>" disabled>
                </div>
                <div class="mb-3">
                  <label for=""><strong>Nama Penduduk</strong></label>
                  <select class="form-control" name="nik" id="">
                    <option hidden>--Pilih Penduduk--</option>
                    <?php foreach ($keluarga as $klg) : ?>
                      <option value="<?= $klg['nik'] ?>"><?= $klg['nik'] ?> - <?= $klg['nama_lgkp'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="col-9">
            <!-- DataTales Example -->
            <div class="card shadow mb-2">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kegiatan Members
                </h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <?php if ($this->session->flashdata('alert')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Data Kegiatan <strong>Berhasil!</strong> <?= $this->session->flashdata('alert') ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php endif; ?>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr class="text-center">
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 mt-3">
          <a href="<?= base_url() ?>kegiatan" class="btn btn-primary position-relative">Kembali</a>
          <input type="submit" name="submit" class="btn btn-primary float-right" value="Tambah">
        </div>
      </div>
    </div>
  </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->