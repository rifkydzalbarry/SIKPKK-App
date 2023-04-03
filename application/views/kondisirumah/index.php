<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tables Kondisi Rumah</h1>
  <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis voluptatibus enim maxime voluptas placeat suscipit!</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        DataTables Keluarga
        <a class="btn btn-primary float-right btn-sm" href="<?= base_url() ?>keluarga/tambahKeluarga">
          <i class="fas fa-plus fa-sm fa-fw mr-2"></i>
          Tambah Data
        </a>
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <?php if ($this->session->flashdata('alert')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Kondisi Rumah <strong>Berhasil!</strong> <?= $this->session->flashdata('alert') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th>No</th>
              <th>No KK - Kepala Keluarga</th>
              <th>Makanan Pokok</th>
              <th>Jamban</th>
              <th>Sumber Air</th>
              <th>TPS</th>
              <th>SPAL</th>
              <th>Stiker P4k</th>
              <th>Kriteria Rumah</th>
              <th>Aktifitas UP2K</th>
              <th>Aktifitas KUKPL</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($kondisirumah as $krmh) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $krmh['no_kk'] ?> - <?= $krmh['nama_lgkp'] ?></td>
                <td><?= $krmh['mkn_pokok'] ?></td>
                <td><?= $krmh['jamban'] ?></td>
                <td><?= $krmh['sbr_air'] ?></td>
                <td><?= $krmh['tps'] ?></td>
                <td><?= $krmh['spal'] ?></td>
                <td><?= $krmh['stiker_p4k'] ?></td>
                <td><?= $krmh['krt_rmh'] ?></td>
                <td><?= $krmh['akf_up2k'] ?></td>
                <td><?= $krmh['akf_kukpl'] ?></td>
                <td class="text-center">
                  <a href="<?= base_url() ?>keluarga/ubahKeluarga/<?= $krmh['nik'] ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  <a href="<?= base_url() ?>keluarga/hapusKeluarga/<?= $krmh['nik'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                    <i class="fas fa-trash"></i>
                  </a>
                  <a href="<?= base_url() ?>keluarga/detailKeluarga/<?= $krmh['no_kk'] ?>" class="btn btn-info btn-sm">
                    <i class="fas fa-info-circle"></i>
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