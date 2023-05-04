<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Basic Card Example -->
  <form action="" method="post">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Ikut Kegiatan PKK</h6>
      </div>
      <div class="card-body">
        <div class="row row-cols-1 row-cols-4">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="mb-3">
                  <label label for="hbkel"><strong>Penduduk</strong></label>
                  <select class="form-control" name="nik" id="">
                    <option hidden>--Pilih Penduduk--</option>
                    <?php foreach ($keluarga as $klg) : ?>
                      <option value="<?= $klg['nik'] ?>"><?= $klg['nik'] ?> - <?= $klg['nama_lgkp'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label label for="hbkel"><strong>Kegiatan</strong></label>
                  <select class="form-control" name="nik" id="">
                    <option hidden>--Pilih Kegiatan--</option>
                    <?php foreach ($kegiatan as $kgt) : ?>
                      <option value="<?= $kgt['id_kegiatan'] ?>"><?= $kgt['nama_kegiatan'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="col-9">
            <div class="card">
              <div class="card-body">
                <div class="form-group mb-0">
                  <div class="row">
                    <legend class="col-form-label col-sm-6 pt-0"><strong>Makanan Pokok Sehari-hari</strong></legend>
                    <div class="col-sm">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="mkn_pokok" id="inlineRadio1" value="Beras">
                        <label class="form-check-label" for="inlineRadio1">Beras</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="mkn_pokok" id="inlineRadio2" value="Non Beras">
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
                        <input class="form-check-input" type="radio" name="jamban" id="inlineRadio1" value="Ya">
                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jamban" id="inlineRadio2" value="Tidak">
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
                        <input class="form-check-input" type="radio" name="sbr_air" id="inlineRadio1" value="PDAM">
                        <label class="form-check-label" for="inlineRadio1">PDAM</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sbr_air" id="inlineRadio2" value="Sumur">
                        <label class="form-check-label" for="inlineRadio2">Sumur</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sbr_air" id="inlineRadio3" value="Sungai">
                        <label class="form-check-label" for="inlineRadio3">Sungai</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sbr_air" id="inlineRadio4" value="Lainnya">
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
                        <input class="form-check-input" type="radio" name="tps" id="inlineRadio1" value="Ya">
                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tps" id="inlineRadio2" value="Tidak">
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
                        <input class="form-check-input" type="radio" name="spal" id="inlineRadio1" value="Ya">
                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="spal" id="inlineRadio2" value="Tidak">
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
                        <input class="form-check-input" type="radio" name="stiker_p4k" id="inlineRadio1" value="Ya">
                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="stiker_p4k" id="inlineRadio2" value="Tidak">
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
                        <input class="form-check-input" type="radio" name="krt_rmh" id="inlineRadio1" value="Sehat">
                        <label class="form-check-label" for="inlineRadio1">Sehat</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="krt_rmh" id="inlineRadio2" value="Kurang Sehat">
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
                        <input class="form-check-input" type="radio" name="akf_up2k" id="inlineRadio1" value="Ya">
                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="akf_up2k" id="inlineRadio2" value="Tidak">
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
                        <input class="form-check-input" type="radio" name="akf_kukpl" id="inlineRadio1" value="Ya">
                        <label class="form-check-label" for="inlineRadio1">Ya</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="akf_kukpl" id="inlineRadio2" value="Tidak">
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
          <a href="<?= base_url() ?>kondisirumah" class="btn btn-primary position-relative">Kembali</a>
          <input type="submit" name="submit" class="btn btn-primary float-right" value="Tambah Data">
        </div>
      </div>
    </div>
  </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->