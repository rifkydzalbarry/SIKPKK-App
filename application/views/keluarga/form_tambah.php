<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

  <div class="col">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Data Keluarga</h6>
      </div>
      <div class="card-body">
        <form action="" method="post" class="row g-3">
          <div class="form-group col-md-6">
            <label for="no_kk"><strong>Nomor Kartu Keluarga</strong></label>
            <input type="number" class="form-control" name="no_kk" id="" value="<?= set_value('no_kk') ?>">
            <small id="emailHelp" class="form-text text-danger"><?= form_error('no_kk') ?></small>
          </div>
          <div class="form-group col-md-6">
            <label for="nik"><strong>Nomor Induk Kependudukan</strong></label>
            <input type="number" class="form-control" name="nik" id="" value="<?= set_value('nik') ?>">
            <small id="emailHelp" class="form-text text-danger"><?= form_error('nik') ?></small>
          </div>

          <div class="form-group col-md-6">
            <label for="nama_lgkp"><strong>Nama Lengkap</strong></label>
            <input type="text" class="form-control" name="nama_lgkp" id="" value="<?= set_value('nama_lgkp') ?>">
            <small id="emailHelp" class="form-text text-danger"><?= form_error('nama_lgkp') ?></small>
          </div>
          <div class="form-group col-md-6">
            <label label for="hbkel"><strong>Hubungan Keluarga</strong></label>
            <select class="form-control" name="hbkel" id="" value="<?= set_value('hbkel') ?>">
              <option hidden>--Pilih Hubungan Keluarga--</option>
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
            <select class="form-control" name="jk" id="" value="<?= set_value('jk') ?>">
              <option hidden>--Pilih Jenis Kelamin--</option>
              <?php foreach ($jenis_kelamin as $jk) : ?>
                <?php if ($jk == $keluarga['jk']) : ?>
                  <option value="<?= $jk ?>" selected><?= $jk ?></option>
                <?php else : ?>
                  <option value="<?= $jk ?>"><?= $jk ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group form-group col-md-4">
            <label for="tmp_lhr"><strong>Tempat Lahir</strong></label>
            <input type="text" class="form-control" name="tmp_lhr" id="" value="<?= set_value('tmp_lhr') ?>">
            <small id="emailHelp" class="form-text text-danger"><?= form_error('tmp_lhr') ?></small>
          </div>
          <div class="form-group col-md-2">
            <label for="tgl_lhr"><strong>Tanggal Lahir</strong></label>
            <input type="date" class="form-control" name="tgl_lhr" id="" value="<?= set_value('tgl_lhr') ?>">
          </div>

          <div class="form-group col-md-6">
            <label for="pendidikan"><strong>Pendidikan Terakhir</strong></label>
            <select class="form-control" name="pendidikan" id="" value="<?= set_value('pendidikan') ?>">
              <option hidden>--Pilih Pendidikan--</option>
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
            <select class="form-control" name="pekerjaan" id="" value="<?= set_value('pekerjaan') ?>">
              <option hidden>--Pilih Pekerjaan--</option>
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
              <option hidden>--Pilih Kriteria--</option>
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
            <input type="text" class="form-control" name="keb_khs" id="" value="<?= set_value('keb_khs') ?>">
          </div>

          <div class="col-12">
            <a href="<?= base_url() ?>keluarga" class="btn btn-primary position-relative">Kembali</a>
            <input type="submit" name="submit" class="btn btn-primary float-right" value="Tambah Data">
          </div>
        </form>
      </div>
    </div>

  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->