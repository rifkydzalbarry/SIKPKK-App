<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tables Dasawisma</h1>
  <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum illo quaerat dolor optio soluta debitis beatae! Officiis tempora facilis ut.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Dasawisma
        <a class="btn btn-primary float-right btn-sm" href="#" data-toggle="modal" data-target="#addModal">
          <i class="fas fa-plus fa-sm fa-fw mr-2 text-gray-400"></i>
          Tambah Data
        </a>
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <?php if ($this->session->flashdata('alert')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Dasawisma <strong>Berhasil!</strong> <?= $this->session->flashdata('alert') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th>No</th>
              <th>Nama Dasawisma</th>
              <th>Alamat</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($dasawisma as $dw) : ?>
              <tr>
                <td><?= $no++  ?></td>
                <td><?= $dw['nama_dw']  ?></td>
                <td><?= $dw['alamat']  ?></td>
                <td class="text-center">
                  <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $dw['id_dw'] ?>">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <a href="<?= base_url() ?>dasawisma/hapusDasawisma/<?= $dw['id_dw'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                    <i class="fas fa-trash"></i>
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
        <?= form_open_multipart('dasawisma/tambahDasawisma') ?>
        <div class="form-group">
          <label for="exampleFormControlInput1"><strong>Nama Dasawisma</strong></label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_dw">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"><strong>Alamat</strong></label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"></textarea>
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
foreach ($dasawisma as $dw) : $no++; ?>
  <div class="modal fade" id="editModal<?= $dw['id_dw'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= form_open_multipart('dasawisma/ubahDasawisma') ?>
          <input type="hidden" name="id" value="<?= $dw['id_dw'] ?>">
          <div class="form-group">
            <label for="exampleFormControlInput1"><strong>Nama Dasawisma</strong></label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_dw" value="<?= $dw['nama_dw'] ?>">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1"><strong>Alamat</strong></label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"><?= $dw['alamat'] ?></textarea>
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