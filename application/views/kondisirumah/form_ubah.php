<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Basic Card Example -->
  <form action="" method="post">
    <!-- <input type="hidden" name="id" value="<?= $kondisirumah['no_kk'] ?>"> -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Kondisi Rumah</h6>
        <a class="btn btn-primary float-right btn-sm" href="<?= base_url() ?>kondisirumah">
          <i class="fas fa-arrow-left fa-sm fa-fw mr-2"></i>
          Kembali
        </a>
      </div>
      <div class="card-body">
        <div class="row row-cols-1 row-cols-4">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="mb-3">
                  <label label for="hbkel"><strong>No KK - Kepala Keluarga</strong></label>
                  <select class="form-control" name="no_kk" id="" disabled>
                    <option hidden>--Pilih Data Keluarga--</option>
                    <?php foreach ($keluarga as $klg) : ?>
                      <?php if ($klg['hbkel'] == 'Kepala Keluarga') { ?>
                        <option value="<?= $klg['no_kk'] ?>" selected><?= $klg['no_kk'] ?> - <?= $klg['nama_lgkp'] ?></option>
                      <?php } ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="col-9">
            <div class="card">
              <div class="card-body">
                <?php foreach ($kondisirumah as $krmh) : ?>
                  <div class="form-group mb-0">
                    <div class="row">
                      <legend class="col-form-label col-sm-6 pt-0"><strong>Makanan Pokok Sehari-hari</strong></legend>
                      <div class="col-sm">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="mkn_pokok" id="inlineRadio1" value="Beras" <?php if ($krmh['mkn_pokok'] == 'Beras') { echo 'checked';} ?>>
                          <label class="form-check-label" for="inlineRadio1">Beras</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="mkn_pokok" id="inlineRadio2" value="Non Beras" <?php if ($krmh['mkn_pokok'] == 'Non Beras') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio2">Non Beras</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mb-0">
                    <div class="row">
                      <legend class="col-form-label col-sm-6 pt-0"><strong>Jamban Keluarga</strong></legend>
                      <div class="col-sm">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="jamban" id="inlineRadio1" value="Ya" <?php if ($krmh['jamban'] == 'Ya') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="jamban" id="inlineRadio2" value="Tidak" <?php if ($krmh['jamban'] == 'Tidak') { echo 'checked'; }?>>
                          <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mb-0">
                    <div class="row">
                      <legend class="col-form-label col-sm-6 pt-0"><strong>Sumber Air Keluarga</strong></legend>
                      <div class="col-sm">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="sbr_air" id="inlineRadio1" value="PDAM" <?php if ($krmh['sbr_air'] == 'PDAM') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio1">PDAM</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="sbr_air" id="inlineRadio2" value="Sumur" <?php if ($krmh['sbr_air'] == 'Sumur') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio2">Sumur</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="sbr_air" id="inlineRadio3" value="Sungai" <?php if ($krmh['sbr_air'] == 'Sungai') { echo 'checked'; }?>>
                          <label class="form-check-label" for="inlineRadio3">Sungai</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="sbr_air" id="inlineRadio4" value="Lainnya" <?php if ($krmh['sbr_air'] == 'Lainnya') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio4">Lainnya</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mb-0">
                    <div class="row">
                      <legend class="col-form-label col-sm-6 pt-0"><strong>Tempat Pembuangan Sampah</strong></legend>
                      <div class="col-sm">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="tps" id="inlineRadio1" value="Ya" <?php if ($krmh['tps'] == 'Ya') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="tps" id="inlineRadio2" value="Tidak" <?php if ($krmh['tps'] == 'Tidak') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mb-0">
                    <div class="row">
                      <legend class="col-form-label col-sm-6 pt-0"><strong>Pembuangan Air Limbah</strong></legend>
                      <div class="col-sm">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="spal" id="inlineRadio1" value="Ya" <?php if ($krmh['spal'] == 'Ya') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="spal" id="inlineRadio2" value="Tidak" <?php if ($krmh['spal'] == 'Tidak') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mb-0">
                    <div class="row">
                      <legend class="col-form-label col-sm-6 pt-0"><strong>Stiker P4K</strong></legend>
                      <div class="col-sm">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="stiker_p4k" id="inlineRadio1" value="Ya" <?php if ($krmh['stiker_p4k'] == 'Ya') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="stiker_p4k" id="inlineRadio2" value="Tidak" <?php if ($krmh['stiker_p4k'] == 'Tidak') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mb-0">
                    <div class="row">
                      <legend class="col-form-label col-sm-6 pt-0"><strong>Kriteria Rumah</strong></legend>
                      <div class="col-sm">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="krt_rmh" id="inlineRadio1" value="Sehat" <?php if ($krmh['krt_rmh'] == 'Sehat') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio1">Sehat</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="krt_rmh" id="inlineRadio2" value="Kurang Sehat" <?php if ($krmh['krt_rmh'] == 'Kurang Sehat') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio2">Kurang Sehat</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mb-0">
                    <div class="row">
                      <legend class="col-form-label col-sm-6 pt-0"><strong>Aktifitas UP2K</strong></legend>
                      <div class="col-sm">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="akf_up2k" id="inlineRadio1" value="Ya" <?php if ($krmh['akf_up2k'] == 'Ya') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="akf_up2k" id="inlineRadio2" value="Tidak" <?php if ($krmh['akf_up2k'] == 'Tidak') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group mb-0">
                    <div class="row">
                      <legend class="col-form-label col-sm-6 pt-0"><strong>Aktifitas Kegiatan Usaha Kesehatan Lingkungan</strong></legend>
                      <div class="col-sm">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="akf_kukpl" id="inlineRadio1" value="Ya" <?php if ($krmh['akf_kukpl'] == 'Ya') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="akf_kukpl" id="inlineRadio2" value="Tidak" <?php if ($krmh['akf_kukpl'] == 'Tidak') { echo 'checked';}?>>
                          <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                      </div>
                    </div>
                  </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-12 mt-3">
          <input type="submit" name="submit" class="btn btn-primary float-right" value="Ubah Data">
        </div>
      <?php endforeach; ?>
      </div>
    </div>
  </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->