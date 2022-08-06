<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card p-3">
                <div class="table-responsive">
                    <table class="table dt table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody id="showData">
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="card p-1">
                <div class="card-header">
                    <h6 class="mb-0">Tambah Pemilih</h6>
                </div>
                <div class="card-body">
                    <form id="formtambah">
						<div class="form-group">
							<label for="nama">Nama :</label>
							<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
						</div>
						<div class="form-group">
							<label for="username">Username :</label>
							<input type="text" name="username" class="form-control" placeholder="Masukkan Username">
						</div>
						<button class="btn btn-flat btn-info">Tambah</button>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
                    <button class="close btn btn-primary btn-sm" data-bs-dismiss="modal">X</button>
					<h6 class="modal-title"><i class="fa fa-user mb-2"></i> Edit Pemilih</h5>
				</div>
				<div class="modal-body">
					<form id="editForm">
						<input type="hidden" name="id_pemilih">
						<div class="form-group">
							<label for="Nama">Nama :</label>
							<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
						</div>
						<div class="form-group">
							<label for="Username">Username :</label>
							<input type="text" name="username" class="form-control" placeholder="Masukkan Username">
						</div>
						<button class="btn btn-success btn-ubah btn-flat">Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>