<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

  <div class="col">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Data Keluarga
          <a class="btn btn-primary float-right btn-sm" href="<?= base_url() ?>keluarga">
            <i class="fas fa-arrow-left fa-sm fa-fw mr-2"></i>
            Kembali
          </a>
        </h6>
      </div>
      <div class="card-body">
        <form action="" method="post" class="row g-3">
          <input type="hidden" name="id" value="<?= $keluarga['nik'] ?>">
          <div class="form-group col-md-6">
            <label for="no_kk"><strong>Nomor Kartu Keluarga</strong></label>
            <input type="number" class="form-control" name="no_kk" id="" value="<?= $keluarga['no_kk'] ?>" disabled>
            <small id="emailHelp" class="form-text text-danger"><?= form_error('no_kk') ?></small>
          </div>
          <div class="form-group col-md-6">
            <label for="nik"><strong>Nomor Induk Kependudukan</strong></label>
            <input type="number" class="form-control" name="nik" id="" value="<?= $keluarga['nik'] ?>" disabled>
            <small id="emailHelp" class="form-text text-danger"><?= form_error('nik') ?></small>
          </div>

          <div class="form-group col-md-6">
            <label for="nama_lgkp"><strong>Nama Lengkap</strong></label>
            <input type="text" class="form-control" name="nama_lgkp" id="" value="<?= $keluarga['nama_lgkp'] ?>">
            <small id="emailHelp" class="form-text text-danger"><?= form_error('nama_lgkp') ?></small>
          </div>
          <div class="form-group col-md-6">
            <label label for="hbkel"><strong>Hubungan Keluarga</strong></label>
            <select class="form-control" name="hbkel" id="">
              <?php foreach ($hbkel as $hk) : ?>
                <?php if ($hk == $keluarga['hbkel']) : ?>
                  <option value="<?= $hk ?>" selected><?= $hk ?></option>
                <?php else : ?>
                  <option value="<?= $hk ?>"><?= $hk ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label for="jk"><strong>Jenis Kelamin</strong></label>
            <select class="form-control" name="jk" id="">
              <?php foreach ($jenis_kelamin as $jk) : ?>
                <?php if ($jk == $keluarga['jk']) : ?>
                  <option value="<?= $jk ?>" selected><?= $jk ?></option>
                <?php else : ?>
                  <option value="<?= $jk ?>"><?= $jk ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
            </select>
          </div>

          <div class="form-group col-md-4">
            <label for="tmp_lhr"><strong>Tempat Lahir</strong></label>
            <input type="text" class="form-control" name="tmp_lhr" id="" value="<?= $keluarga['tmp_lhr'] ?>">
            <small id="emailHelp" class="form-text text-danger"><?= form_error('tmp_lhr') ?></small>
          </div>
          <div class="form-group col-md-2">
            <label for="tgl_lhr"><strong>Tanggal Lahir</strong></label>
            <input type="date" class="form-control" name="tgl_lhr" id="" value="<?= $keluarga['tgl_lhr'] ?>">
          </div>

          <div class="form-group col-md-6">
            <label for="pendidikan"><strong>Pendidikan Terakhir</strong></label>
            <select class="form-control" name="pendidikan" id="">
              <?php foreach ($pendidikan as $pend) : ?>
                <?php if ($pend == $keluarga['pendidikan']) : ?>
                  <option value="<?= $pend ?>" selected><?= $pend ?></option>
                <?php else : ?>
                  <option value="<?= $pend ?>"><?= $pend ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="pekerjaan"><strong>Pekerjaan</strong></label>
            <select class="form-control" name="pekerjaan" id="">
              <?php foreach ($pekerjaan as $pkr) : ?>
                <?php if ($pkr == $keluarga['pekerjaan']) : ?>
                  <option value="<?= $pkr ?>" selected><?= $pkr ?></option>
                <?php else : ?>
                  <option value="<?= $pkr ?>"><?= $pkr ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label for="kriteria"><strong>Kriteria</strong></label>
            <select class="form-control" name="kriteria" id="">
              <?php foreach ($kriteria as $krt) : ?>
                <?php if ($krt == $keluarga['kriteria']) : ?>
                  <option value="<?= $krt ?>" selected><?= $krt ?></option>
                <?php else : ?>
                  <option value="<?= $krt ?>"><?= $krt ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="keb_khs"><strong>Kebutuhan Khusus</strong></label>
            <input type="text" class="form-control" name="keb_khs" id="" value="<?= $keluarga['keb_khs'] ?>">
            <small id="emailHelp" class="form-text text-danger"><?= form_error('tmp_lhr') ?></small>
          </div>

          <div class="col-12">
            <!-- <a href="<?= base_url() ?>keluarga/detailKeluarga/<?= $keluarga['no_kk'] ?>" class="btn btn-primary position-relative">Tambah Anggota Keluarga</a> -->
            <input type="submit" name="submit" class="btn btn-primary float-right" value="Ubah Data">
          </div>
        </form>
      </div>
    </div>

  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->