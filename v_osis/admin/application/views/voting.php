<?php if ($cekvoting < 1) : ?>
  <div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-lg-12">
        <div class="card p-5">
          <h2 class="text-center text-uppercase font-weight-bolder"><i class="fa fa-warning"></i> Tidak Ada Voting !</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-lg-12">
        <div class="card p-1">
          <div class="card-header pb-0 p-3">
            <h6><i class="fa fa-th"></i> Tambah Voting</h6>
          </div>
          <div class="card-body">
            <form action="<?= base_url('admin/tambah_voting'); ?>" method="POST" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="NamaVoting" class="col-sm-2 control-label">Nama Voting :</label>
                  <div class="col-sm-10">
                    <input type="text" name="voting" class="form-control" placeholder="Masukkan Nama Voting" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Kandidat" class="col-sm-2 control-label">Kandidat :</label>
                  <div class="col-sm-10">
                    <select name="kandidat[]" class="form-control select2" data-placeholder="Pilih Kandidat" multiple="multiple" style="width: 100%;" required="required">
                      <?php foreach ($listkandidat as $lk) : ?>
                        <option value="<?= $lk->id_kandidat; ?>"><?= $lk->nama_kandidat; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= (count($listkandidat) < 2) ? '<h6 class="text-danger">Kandidat harus lebih dari satu!</5>' : '' ?>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="reset" class="btn btn-flat btn-default"><i class="fa fa-refresh"></i> Reset</button>
                <button class="btn btn-flat btn-danger" <?= (count($listkandidat) < 2) ? 'disabled' : '' ?>><i class="fa fa-check"></i> Tambah Voting</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php else : ?>
  <div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-lg-12">
        <div class="card p-5">
          <h2 class="text-center text-uppercase font-weight-bolder"><?= $voting->nama_voting; ?></h2>
          <hr class="horizontal dark">
          <h5 class="text-center font-weight-bolder">Kandidat</h5>
          <div class="container mt-2">
            <div class="row">
              <?php foreach ($kandidat as $k) : ?>
                <div class="col-lg-6 mt-3">
                  <div class="card p-3">
                    <img src="<?= base_url('./../assets/img/kandidat/' . $k->foto); ?>" alt="" class="mx-auto img-rounded" width="300px" height="300px" style="object-fit: cover; border-radius: 20%; object-position: top;">
                    <h3 class="text-center mt-2"><?= $k->nama_kandidat; ?></h3>
                    <p class="text-muted text-center"><?= $k->keterangan; ?></p>
                    <h3 class="text-center"><span class="badge bg-danger">Poin : <?= $k->poin ?></span></h3>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <hr class="horizontal dark">
      <h4 class="text-center">JUMLAH PEMILIH <span class="badge bg-success"><?= $jmlpemilih; ?></span></h4>
      <hr class="horizontal dark">
      <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
              <h6 class="mb-2">Sudah Memilih</h6>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-pemilih table-hover table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="30">No.</th>
                    <th>Nama</th>
                    <th>Waktu</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($sudah_memilih as $sm) : ?>
                    <tr>
                      <td><?= $no++ ?>.</td>
                      <td><?= $sm->nama ?></td>
                      <td><?= $sm->waktu ?></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="card">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-0">Belum Memilih</h6>
          </div>
          <div class="card-body mt-2">
            <table class="table table-pemilih table-hover table-bordered table-striped">
              <thead>
                <tr>
                  <th width="30">No.</th>
                  <th>Nama</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($belum_memilih as $bm) : ?>
                  <tr>
                    <td><?= $no++ ?>.</td>
                    <td><?= $bm->nama ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="card flex-row gap-2">
          <button class="btn btn-warning btn-edit mt-3" data-bs-toggle="modal" data-bs-target="#editVoting<?= $voting->id_voting; ?>"><i class="fa fa-edit"></i> Edit</button>
          <button class="btn btn-danger btn-edit hapus-voting mt-3" data='<?= $voting->id_voting ?>'><i class="fa fa-trash"></i> Hapus Voting</button>
        </div>
      </div>
    </div>

    <!-- Modal edit voting -->
    <div class="modal fade" id="editVoting<?= $voting->id_voting; ?>" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><i class="fa fa-th"></i> Edit Voting</h4>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('admin/edit_voting/' . $voting->id_voting); ?>" method="POST">
              <div class="form-group">
                <label for="NamaVoting">Nama Voting :</label>
                <input type="text" name="voting" class="form-control" value="<?= $voting->nama_voting; ?>" placeholder="Masukkan Nama Voting" required="required">
              </div>
              <!-- <div class="form-group">
								<label for="Kandidat">Kandidat :</label>
									<select name="kandidat[]" class="form-control select2" data-placeholder="Pilih Kandidat" multiple="multiple" style="width: 100%;" required="required">
										<?php foreach ($listkandidat as $lk) : ?>
										<option value="<?= $lk->id_kandidat; ?>"><?= $lk->nama_kandidat; ?></option>
										<?php endforeach; ?>
									</select>
							</div> -->
              <button type="reset" class="btn btn-flat btn-default"><i class="fa fa-refresh"></i> Reset</button>
              <button class="btn btn-flat btn-danger" <?= (count($listkandidat) < 2) ? 'disabled' : '' ?>><i class="fa fa-check"></i> Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>