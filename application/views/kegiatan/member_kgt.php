<div class="container-fluid">
  <h3 class="mb-2 text-gray-800">Tables Tambah Member</h3>
  <div class="row nt-2">
    <div class="col-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Form Tambah Member</h6>
        </div>
        <div class="card-body">
          <form action="<?= base_url('kegiatan/tambahMemberKgt') ?>" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="id_kegiatan" id="" value="<?= $kegiatan['id_kegiatan'] ?>" hidden>
            </div>
            <div class="form-group">
              <label label for="hbkel"><strong>NIK - Nama Lengkap</strong></label>
              <select class="form-control" name="nik" id="">
                <option hidden>--Pilih Member--</option>
                <?php foreach ($keluarga as $klg) : ?>
                  <option value="<?= $klg['nik'] ?>"><?= $klg['nik'] ?> - <?= $klg['nama_lgkp'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="tgl_kegiatan"><strong>Tanggal Kegiatan</strong></label>
              <input type="date" class="form-control" name="tgl_kegiatan" id="" value="<?= set_value('tgl_kegiatan') ?>">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="reset" class="btn btn-danger">Reset</button>
          </form>
        </div>
      </div>
    </div>
    <!-- DataTales Example -->
    <div class="col-8">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Member
          </h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <?php if ($this->session->flashdata('alert')) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Member <strong>Berhasil!</strong> <?= $this->session->flashdata('alert') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <?php endif; ?>
            <table class="table table-bordered" id="dataTable" cellspacing="0">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama Kegiatan</th>
                  <th>Nama Member</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($member as $mbr) : ?>
                  <?php if ($mbr['id_kegiatan'] == $kegiatan['id_kegiatan']) { ?>
                    <tr>
                      <td><?= $no++  ?></td>
                      <td><?= $mbr['tgl_kegiatan']  ?></td>
                      <td><?= $mbr['nama_kgt']  ?></td>
                      <td><?= $mbr['nama_mbr']  ?></td>
                      <td class="text-center">
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $mbr['id_kgt'] ?>">
                          <i class="fas fa-fw fa-pencil-alt"></i>
                        </button>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delModal<?= $mbr['id_kgt'] ?>">
                          <i class="fas fa-fw fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                  <?php } ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>