<div class="card shadow-lg mx-4">
  <div class="card-body p-3">
    <div class="row gx-4">
      <div class="col-auto">
        <div class="avatar avatar-xl position-relative">
          <img src="../assets/img/team-1.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
        </div>
      </div>
      <div class="col-auto my-auto">
        <div class="h-100">
          <h5 class="mb-1">
            <?= $this->session->nama; ?>
          </h5>
          <p class="mb-0 font-weight-bold text-sm">
            Admin
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center">
            <p class="mb-0">Edit Profil</p>
          </div>
        </div>
        <div class="card-body">
          <p class="text-uppercase text-sm">Informasi Pengguna</p>
          <div class="row">
            <form action="<?= base_url('admin/ganti_user_admin/' . $this->session->id) ?>" method="POST">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Nama</label>
                  <input class="form-control" type="text" value="<?= $this->session->nama; ?>" name="nama">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Username</label>
                  <input class="form-control" type="text" value="<?= $this->session->username; ?>" name="username">
                </div>
              </div>
              <button class="btn btn-primary btn-sm">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header pb-0">
          <p class="mb-0">Edit Profil</p>
        </div>
        <div class="card-body">
          <p class="text-uppercase text-sm">Ganti Password</p>
          <div class="row">
            <form action="<?= base_url('admin/ganti_pass_admin/' . $this->session->id) ?>" method="POST">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Password Lama</label>
                  <input class="form-control" type="password" name="passwdlama" placeholder="Masukkan Password Lama">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Password Baru</label>
                  <input class="form-control" type="password" name="passwdbaru" placeholder="Masukkan Password Baru">
                </div>
              </div>
              <button class="btn btn-danger btn-sm">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid pb-4">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header pb-0">
          <h6 class="mb-0 font-weight-bolder">Administrator</h5>
        </div>
        <div class="card-body">
          <button class="btn btn-success btn-sm btn-flat tambahAdmin"><i class="fa fa-plus"></i> Tambah Admin</button>
          <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
              <thead>
                <tr>
                  <th width="30">No.</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Reset Password</th>
                  <th>Last Login</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody id="data-admin">
                <!-- Data Admin -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid pb-4">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header pb-0">
          <h6 class="mb-0 font-weight-bolder">Reset Aplikasi</h6>
        </div>
        <div class="card-body">
          <p>*Mereset aplikasi akan menghapus semua data kecuali data Administrator</p>
          <button class="btn btn-danger btn-reset">RESET</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal tambah admin -->
<div class="modal fade" id="tambahAdmin">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-bs-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-lock"></i> Tambah Administrator</h4>
      </div>
      <div class="modal-body">
        <form id="formTambah">
          <div class="form-group">
            <label for="Nama">Nama :</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Administrator">
          </div>
          <div class="form-group">
            <label for="Username">Username :</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan Username Administrator">
          </div>
          <button class="btn btn-flat btn-success">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal edit admin -->
<div class="modal fade" id="editAdmin">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"><i class="fa fa-edit mb-2"></i> Edit Admin</h6>
      </div>
      <div class="modal-body">
        <form id="formEdit">
          <input type="hidden" name="id_admin">
          <div class="form-group">
            <label for="Nama">Nama :</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Administrator">
          </div>
          <div class="form-group">
            <label for="Username">Username :</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan Username Administrator">
          </div>
          <button class="btn btn-flat btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>