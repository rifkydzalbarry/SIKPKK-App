<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

  <div class="col">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Data Kehamilan</h6>
      </div>
      <div class="card-body">
        <form action="" method="post" class="row g-3">
          <div class="form-group col-6">
            <label label for="hbkel"><strong>Istri</strong></label>
            <select class="form-control" name="nik" id="nik" onchange="detail()">
              <option hidden>--Pilih Data Istri--</option>
              <?php foreach ($keluarga as $klg) : ?>
                <?php if ($klg['hbkel'] == 'Istri') { ?>
                  <option value="<?= $klg['nik'] ?>"><?= $klg['nama_lgkp'] ?></option>
                <?php } ?>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="">NIK</label>
            <input type="text" name="vnik" id="vnik">
          </div>
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="vname" id="vname">
          </div>

          <div class="form-group col-6">
            <label label for="status"><strong>Status</strong></label>
            <select class="form-control" name="status" id="" value="<?= set_value('status') ?>">
              <option hidden>--Pilih Status--</option>
              <?php foreach ($status as $st) : ?>
                <?php if ($st == $kehamilan['status']) : ?>
                  <option value="<?= $st ?>" selected><?= $st ?></option>
                <?php else : ?>
                  <option value="<?= $st ?>"><?= $st ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-12">
            <a href="<?= base_url() ?>kehamilan" class="btn btn-primary position-relative">Kembali</a>
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

<script>
  function detail() {
    var nik = $("#nik").val();
    $.ajax({
      url: "<?= base_url() ?>kehamilan/menampilkan_istri",
      method: "POST",
      data: "nik" + nik,
      dataType: "json",
      success: function(data) {
        $("#vname").val(data.vname);
      }
    });
  }
</script>