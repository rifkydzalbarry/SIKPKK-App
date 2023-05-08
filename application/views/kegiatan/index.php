<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tables Kegiatan</h1>
  <p class="mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem ullam qui eius reiciendis laudantium vel fugiat! Magnam officia animi, natus quas voluptas distinctio voluptates assumenda et molestiae, dolores laboriosam eveniet nam voluptatem, corporis ea nesciunt? Quidem ea perspiciatis velit atque corporis dolorum, accusantium harum aspernatur reiciendis sed at perferendis quaerat.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Kegiatan
        <a class="btn btn-primary float-right btn-sm" href="#" data-toggle="modal" data-target="#addModal">
          <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
          Tambah Data
        </a>
        <a class="btn btn-primary float-right btn-sm mr-1" href="#" data-toggle="modal" data-target="#addModalMember">
          <i class="fas fa-fw fa-user-plus"></i>
        </a>
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
            <?php $no = 1;
            foreach ($kegiatan as $kgt) : ?>
              <tr>
                <td><?= $no++  ?></td>
                <td><?= $kgt['nama_kegiatan']  ?></td>
                <td class="text-center">
                  <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $kgt['id_kegiatan'] ?>">
                    <i class="fas fa-fw fa-pencil-alt"></i>
                  </button>
                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delModal<?= $kgt['id_kegiatan'] ?>">
                    <i class="fas fa-fw fa-trash"></i>
                  </button>
                  <a href="<?= base_url() ?>kegiatan/pkk/?>" class="btn btn-primary btn-sm">
                    <i class="fas fa-fw fa-user"></i>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('kegiatan/tambahKegiatan') ?>
        <div class="form-group">
          <label for="exampleFormControlInput1"><strong>Nama Kegiatan</strong></label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_kegiatan">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<!-- Add Modal Member -->
<div class="modal fade" id="addModalMember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('kegiatan/tambahKegiatanMember') ?>
        <div class="form-group">
          <label for="exampleFormControlInput1"><strong>Nama Kegiatan</strong></label>
          <select class="form-control" name="id_kegiatan" id="">
            <option hidden> -- Pilih Kegiatan -- </option>
            <?php foreach ($kegiatan as $kgt) : ?>
              <option value="<?= $kgt['id_kegiatan'] ?>"><?= $kgt['nama_kegiatan'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1"><strong>Nama Members</strong></label>
          <select class="form-control" name="nik" id="">
            <option hidden> -- Pilih Members -- </option>
            <?php foreach ($keluarga as $klg) : ?>
              <option value="<?= $klg['nik'] ?>"><?= $klg['nik'] ?> - <?= $klg['nama_lgkp'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1"><strong>Keterangan</strong></label>
          <textarea class="form-control" name="keterangan" id="" cols="30" rows="3"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<?php $no = 0;
foreach ($kegiatan as $kgt) : $no++; ?>
  <div class="modal fade" id="editModal<?= $kgt['id_kegiatan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= form_open_multipart('kegiatan/ubahKegiatan') ?>
          <input type="hidden" name="id" value="<?= $kgt['id_kegiatan'] ?>">
          <div class="form-group">
            <label for="exampleFormControlInput1"><strong>Nama Kegiatan</strong></label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_kegiatan" value="<?= $kgt['nama_kegiatan'] ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<!-- Hapus Modal -->
<?php foreach ($kegiatan as $kgt) ?>
<div class="modal fade" id="delModal<?= $kgt['id_kegiatan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('kegiatan/hapusKegiatan') ?>
        <input type="hidden" name="id" value="<?= $kgt['id_kegiatan'] ?>">
        <p>Apakah Yakin Akan Menghapus Data Ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>