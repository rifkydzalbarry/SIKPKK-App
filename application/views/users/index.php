<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        DataTables Users
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <?php if ($this->session->flashdata('alert')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Users <strong>Berhasil!</strong> <?= $this->session->flashdata('alert') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Email</th>

              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1;
            foreach ($tbl_user as $usr) { ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $usr->fullname ?></td>
                <td><?= $usr->address ?></td>
                <td><?= $usr->email ?></td>
                <td class="text-center" style="width:15%;">
                  <a href="<?= site_url('users/delete/' . $usr->id) ?>" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title=DELETE onclick="return confirm('Are you sure you want to delete this item?');">
                    <i class="fas fa-trash"></i>
                  </a>
                  <?php if ($usr->is_active == '1') echo '<i class="btn btn-success btn-sm" title=VERIFIED><i class="fa fa-check"></i></i>';
                  else { ?>
                    <a href="<?= site_url('users/verify/' . $usr->id) ?>" class="btn btn-secondary btn-sm" data-bs-toggle="tooltip" title=UNVERIFIED onclick="return confirm('Are you sure you want to verify this account?');">
                      <i class="fa fa-check"></i>
                    </a><?php } ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -
<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>ASK UNLA</title>
</head>

<body>
	<h1>ASK UNLA</h1>
	<h3>USER LIST</h3>
	<a href="<?= base_url() ?>">
		<h4>HOME</h4>
	</a>
	<hr>
	<a href="<?= site_url('users/add') ?>">Add User</a>
	<hr>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Fullname</th>
			<th>Alamat</th>
			<th>Email</th>
			<th colspan="3">Action</th>
		</tr>
		<?php $i = 1;
    foreach ($tbl_user as $usr) { ?>
			<tr>
				<td><?= $i++ ?></td>
				<td><?= $usr->fullname ?></td>
				<td><?= $usr->address ?></td>
				<td><?= $usr->email ?></td>
				<td><a href="<?= site_url('users/edit/' . $usr->id) ?>">Edit</a></td>
				<td><a href="<?= site_url('users/delete/' . $usr->id) ?>" onclick="return confirm('Are You Sure?')">Delete</a></td>
				<td>
					<?php if ($usr->verifikasi == '1') echo 'Verified';
          else { ?> <a href="<?= site_url('users/verify/' . $usr->id) ?>">Verify</a> <?php } ?>
				</td>
			</tr>
		<?php } ?>
	</table>
</body>

</html>