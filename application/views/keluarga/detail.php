<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Details Anggota Keluarga</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        DataTables Anggota Keluarga
        <a class="btn btn-primary float-right btn-sm" href="javascript:history.go(-1)">
          <i class="fas fa-arrow-left fa-sm fa-fw mr-2"></i>
          Kembali
        </a>
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <?php if ($this->session->flashdata('alert')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Keluarga <strong>Berhasil!</strong> <?= $this->session->flashdata('alert') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th>No</th>
              <th>Nama Lengkap</th>
              <th>Hubungan Keluarga</th>
              <th>Jenis Kelamin</th>
              <th>Tempat Lahir</th>
              <th>Tanggal Lahir</th>
              <th>Pendidikan</th>
              <th>Pekerjaan</th>
              <th>Kriteria</th>
              <th>Kebutuhan Khusus</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($keluarga as $klg) : ?>
              <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td><?= $klg['nama_lgkp'] ?></td>
                <td><?= $klg['hbkel'] ?></td>
                <td><?= $klg['jk'] ?></td>
                <td><?= $klg['tmp_lhr'] ?></td>
                <td><?= $klg['tgl_lhr'] ?></td>
                <td><?= $klg['pendidikan'] ?></td>
                <td><?= $klg['pekerjaan'] ?></td>
                <td><?= $klg['kriteria'] ?></td>
                <td><?= $klg['keb_khs'] ?></td>
                <td class="text-center">
                  <a href="<?= base_url() ?>keluarga/ubahKeluarga/<?= $klg['nik'] ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-pencil-alt"></i>
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