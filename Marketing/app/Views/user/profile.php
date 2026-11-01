<?= $this->extend('layouts/templates/default'); ?>

<?= $this->section('content'); ?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-sm-6">
        <h1>Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/user">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </div>
    </div>
    <div class="card">
      <div class="card-header bg-gradient-secondary">
        <h3>Profile Pengguna</h3>
      </div>
      <div class="card-body" style="background-color: #ffffffc2;">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-12">
              <div class="card mb-3">

                <h4 class="font-weight-bold card-footer">Detail Profile</h4>

                <div class="row no-gutters p-3">
                  <div class="col-md-3 text-center">
                    <img src="/assets/img/<?= $user['foto']; ?>" class="w-75 card-img p-3 img-fluid rounded-circle img-thumbnail mb-3">
                    <br>
                    <h4 class="font-weight-bold"><?= $user['nama_lengkap']; ?></h4>
                    <p class="text-muted"><?= $user['email']; ?></p>
                  </div>
                  <div class="col-md-9">
                    <div class="card-body mb-3" style="border-bottom: 1px solid #dee2e6; padding-bottom: 0px;">
                      <h4 class="font-weight-bold"><?= $user['nama_lengkap']; ?></h4>
                    </div>
                    <div class="card-body row py-0">
                      <h5 class="mb-3 col-md-3 font-weight-bold">ID Pengguna</h5>
                      <h5 class="mb-3 col-md-9">: <?= $user['id_user']; ?></h5>
                    </div>
                    <div class="card-body row py-0">
                      <h5 class="mb-3 col-md-3 font-weight-bold">Role</h5>
                      <h5 class="mb-3 col-md-9">: <?= $user['id_role'] == 1 ? 'Admin' : 'Sales'; ?></h5>
                    </div>
                    <div class="card-body row py-0">
                      <h5 class="mb-3 col-md-3 font-weight-bold">Jenis Kelamin</h5>
                      <h5 class="mb-3 col-md-9">: <?= $user['jenis_kelamin']; ?></h5>
                    </div>
                    <div class="card-body row py-0">
                      <h5 class="mb-3 col-md-3 font-weight-bold">Tanggal Lahir</h5>
                      <h5 class="mb-3 col-md-9">: <span id="tglLahir"><?= $user['tgl_lahir'] ?></span></h5>
                    </div>
                    <div class="card-body row py-0">
                      <h5 class="mb-3 col-md-3 font-weight-bold">Email</h5>
                      <h5 class="mb-3 col-md-9">: <?= $user['email']; ?></h5>
                    </div>
                    <div class="card-body row py-0">
                      <h5 class="mb-3 col-md-3 font-weight-bold">Nomor Telepon</h5>
                      <h5 class="mb-3 col-md-9">: <?= $user['telepon']; ?></h5>
                    </div>
                    <div class="card-body row py-0">
                      <h5 class="mb-3 col-md-3 font-weight-bold">Alamat</h5>
                      <h5 class="mb-3 col-md-9">: <?= $user['alamat']; ?></h5>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <a href="/user/data_pengguna" class="btn btn-primary float-right">Kembali</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="border-dark mb-3">
      </div>
    </div>
  </div>
</section>

<script>
  function showEditForm() {
    document.getElementById('profile-info').style.display = 'none';
    document.getElementById('edit-profile-form').style.display = 'block';
  }

  function showProfileInfo() {
    document.getElementById('profile-info').style.display = 'block';
    document.getElementById('edit-profile-form').style.display = 'none';
  }
</script>

<?= $this->include('layouts/templates/script.php') ?>
<?= $this->endSection(); ?>