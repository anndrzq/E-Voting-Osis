<div class="container-fluid py-4">
  <div class="row mt-4">
    <div class="col-lg-12">
      <div class="card flex-row gap-2">
        <button class="btn btn-success mt-3 ms-3" data-bs-toggle="modal" data-bs-target="#tambahKandidat"><i class="fa fa-user-plus"></i> Tambah Kandidat</button>
        <div class="modal fade" id="tambahKandidat">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button class="close btn btn-primary btn-sm" data-bs-dismiss="modal">X</button>
                <h6 class="modal-title"><i class="fa fa-user-plus mb-2"></i>Tambah Kandidat</h6>
              </div>
              <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/tambah_kandidat'); ?>">
                  <div class="form-group">
                    <label for="nama">Nama Kandidat :</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Kandidat" required="required">
                  </div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan :</label>
                    <input type="text" name="ket" class="form-control" placeholder="(ex: Motto)" required="required">
                  </div>
                  <div class="form-group">
                    <label for="foto">Foto Kandidat :</label>
                    <input type="file" name="foto" required="required">
                  </div>
                  <button class="btn btn-flat btn-success">Tambah</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid py-4">
  <div class="row mt-4">
    <div class="col-lg-12">
      <div class="card p-3">
        <h2 class="text-center text-uppercase font-weight-bolder">Kandidat</h2>
        <hr class="horizontal dark">
        <div class="container mt-2">
          <div class="row">
            <?php if (count($kandidat) > 0) { ?>
              <?php foreach ($kandidat as $k) : ?>
                <div class="col-lg-4 mt-3 mx-auto">
                  <div class="card p-2">
                    <div class="card-header">
                      <?php if ($k->id_ikut_kandidat) : ?>
                        <a class="pull-right"><span class="badge bg-success"><i class="fa fa-check"></i></span></a>
                      <?php else : ?>
                        <button class="close hapus badge bg-danger" style="border: none;" data="<?= $k->id; ?>"><i class="fa fa-trash"></i></button>
                      <?php endif; ?>
                    </div>
                    <div class="card-body">
                      <img src="<?= base_url('./../assets/img/kandidat/' . $k->foto); ?>" alt="" class="mx-auto img-rounded" width="300px" height="300px" style="object-fit: cover; border-radius: 20%; object-position: top;">
                      <h4 class="text-center mt-2"><?= $k->nama_kandidat; ?></h4>
                      <p class="text-muted text-center"><?= $k->keterangan; ?></p>
                      <div class="d-grid">
                        <button class="btn block btn-danger edit" data="<?= $k->id; ?>">Edit</button>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach;
            } else { ?>
              <div class="col-lg-12">
                <div class="card p-3">
                  <h2 class="text-center"><i class="fa fa-warning"></i></h2>
                  <h3 class="text-center">TIDAK ADA KANDIDAT</h3>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close btn btn-primary" data-bs-dismiss="modal">&times;</button>
        <h6 class="modal-title"><i class="fa fa-user mb-2"></i> Edit Kandidat</h6>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/edit_kandidat') ?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id_kandidat">
          <div class="tengah" id="img-kandidat"></div>
          <div class="form-group">
            <label for="NamaKandidat">Nama Kandidat :</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Kandidat">
          </div>
          <div class="form-group">
            <label for="Keterangan">Keterangan :</label>
            <input type="text" name="ket" class="form-control" placeholder="(ex: Motto)">
          </div>
          <div class="form-group">
            <label for="Foto">Foto :</label>
            <input type="file" name="foto" id="">
          </div>
          <button class="btn btn-success btn-flat"><i class="fa fa-check"></i> Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>