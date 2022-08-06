<?php if ($pilih < 1): ?>
      <?php if ($passdefault): ?>
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-profile-bottom card">
                        <div class="card-header pb-0">
                            <h6 class="mb-0 font-weight-bolder">Ganti Password</h6>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Silahkan mengganti password untuk melanjutkan</p>
                            <form id="formUbahPasswd">
                            <div class="form-group">
                                    <label for="PasswordLama">Password Lama :</label>
                                    <input type="password" name="passwdlama" class="form-control" placeholder="Masukkan Password Lama">
                                </div>
                                <div class="form-group">
                                    <label for="PasswordBaru">Password Baru :</label>
                                    <input type="password" name="passwdbaru" class="form-control" placeholder="Masukkan Password Baru">
                                </div>
                                <button class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h3 class="text-center font-weight-bolder"><?=$voting->nama_voting?></h3>
                        </div>
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <?php foreach ($kandidat as $k): ?>
                                    <div class="col-lg-4 mt-3 text-center">
                                        <div class="card p-3">
                                            <div class="card-body">
                                                <img src="<?=base_url('/assets/img/kandidat/'.$k->foto);?>" alt="" class="mx-auto" width="300px" height="300px" style="object-fit: cover; border-radius: 20%; object-position: top;">
                                                <h4 class="text-center mt-2"><?=$k->nama_kandidat;?></h4>
                                                <p class="text-muted text-center"><?=$k->keterangan;?></p>
                                                <div class="d-grid">
                                                <button class="btn btn-danger btn-flat btn-block pilih" data="<?=$k->id_kandidat?>" data-voting="<?=$voting->id_voting?>" data-nama="<?=$k->nama_kandidat?>">Pilih</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <p class="text-muted text-center mt-4">*Silahkan pilih salah satu kandidat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php endif; ?>
<?php else: ?>
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-profile-bottom">
                    <div class="card-body">
                        <h3 class="font-weight-bolder text-center">Terima kasih anda telah berpartisipasi dalam pemilihan ini</h3>
                        <hr class="horizontal dark">
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-danger btn-flat logout text-center">LOGOUT</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>