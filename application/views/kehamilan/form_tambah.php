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
            <label label for="hbkel"><strong>NIK - Nama Lengkap</strong></label>
            <select name="nik" id="nik" onchange="detail_istri()" class="form-control">
              <option value="">--Pilih--</option>
              <?php
              $list = $this->db->query("SELECT * FROM tbl_keluarga");
              foreach ($list->result() as $t) :
              ?>
                <?php if ($t->hbkel == 'Istri') { ?>
                  <option value="<?= $t->nik ?>"><?= $t->nik ?> - <?= $t->nama_lgkp ?></option>
                <?php } ?>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group col-md-6" hidden>
            <label for="nama_lgkp"><strong>Nama Lengkap</strong></label>
            <input type="text" class="form-control" name="nama_lgkp" id="nama_lgkp" value="<?= set_value('nama_lgkp') ?>">
            <small id="emailHelp" class="form-text text-danger"><?= form_error('nama_lgkp') ?></small>
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
  function detail_istri() {
    var nik = $('#nik').val();
    $.ajax({
      url: "<?= base_url() ?>kehamilan/menampilkan_istri",
      method: 'post',
      data: "nik=" + nik,
      dataType: 'json',
      success: function(data) {
        $("#nama_lgkp").val(data.nama);
      }
    });
  }


  // function detail() {
  //   var nik = $("#nik").val();
  //   $.ajax({
  //     url: "<?= base_url() ?>kehamilan/menampilkan_istri",
  //     method: "POST",
  //     data: "nik" + nik,
  //     dataType: "json",
  //     success: function(data) {
  //       $("#vname").val(data.vname);
  //     }
  //   });
  // }
</script>