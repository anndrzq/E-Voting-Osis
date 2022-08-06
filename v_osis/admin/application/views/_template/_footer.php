<footer class="footer pt-3  ">
	<div class="container-fluid">
		<div class="row align-items-center justify-content-lg-between">
			<div class="col-lg-6 mb-lg-0 mb-4">
				<div class="copyright text-center text-sm text-muted text-lg-start">
					© <script>
						document.write(new Date().getFullYear())
					</script>
					<!-- 
						DILARANG MENGGANTI COPYRIGHT KARENA MENGANDUNG HAK CIPTA 
						HARGAI WAKTU YANG TELAH DI GUNAKAN UNTUK MEMBUAT PROGRAM INI DARI 0
						KARENA WAKTU TIDAK BISA DI BELI DENGAN UANG
					-->
					<a href="https://www.instagram.com/anndrzq/" target="_blank" class="font-weight-bold">Ananda Rizq</a>
					All Rights Reserved
				</div>
			</div>

		</div>
	</div>
</footer>
</div>
</main>
<div class="fixed-plugin">
	<a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
		<i class="fa fa-cog py-2"> </i>
	</a>
	<div class="card shadow-lg">
		<div class="card-header pb-0 pt-3 ">
			<div class="float-start">
				<h5 class="mt-3 mb-0">Argon Configurator</h5>
				<p>See our dashboard options.</p>
			</div>
			<div class="float-end mt-4">
				<button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
					<i class="fa fa-close"></i>
				</button>
			</div>
			<!-- End Toggle Button -->
		</div>
		<hr class="horizontal dark my-1">
		<div class="card-body pt-sm-3 pt-0 overflow-auto">
			<!-- Sidebar Backgrounds -->
			<div>
				<h6 class="mb-0">Sidebar Colors</h6>
			</div>
			<a href="javascript:void(0)" class="switch-trigger background-color">
				<div class="badge-colors my-2 text-start">
					<span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
					<span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
					<span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
					<span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
					<span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
					<span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
				</div>
			</a>
			<!-- Sidenav Type -->
			<div class="mt-3">
				<h6 class="mb-0">Sidenav Type</h6>
				<p class="text-sm">Choose between 2 different sidenav types.</p>
			</div>
			<div class="d-flex">
				<button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
				<button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
			</div>
			<p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
			<!-- Navbar Fixed -->
			<div class="d-flex my-3">
				<h6 class="mb-0">Navbar Fixed</h6>
				<div class="form-check form-switch ps-0 ms-auto my-auto">
					<input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
				</div>
			</div>
			<hr class="horizontal dark my-sm-4">
			<div class="mt-2 mb-5 d-flex">
				<h6 class="mb-0">Light / Dark</h6>
				<div class="form-check form-switch ps-0 ms-auto my-auto">
					<input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
				</div>
			</div>
			<a href="<?= base_url('logout'); ?>" class="btn btn-danger btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
		</div>
	</div>
</div>
</div>
<!--   Core JS Files   -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="../assets/js/plugins/chartjs.min.js"></script>
<script src="./../assets/css/select2/dist/js/select2.min.js"></script>
<script src="<?= base_url('./../assets/plugins/pace/pace.min.js'); ?>"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<?= ($this->session->flashdata('ubah')) ? '<script>Swal.fire("Berhasil", "Perubahan berhasil disimpan", "success")</script>' : ''; ?>
<?= ($this->session->flashdata('tambah')) ? '<script>Swal.fire("Sukses", "Kandidat berhasil ditambah", "success")</script>' : '' ?>
<?= ($this->session->flashdata('hapus')) ? '<script>Swal.fire("Sukses", "Kandidat berhasil dihapus", "success")</script>' : '' ?>
<?= ($this->session->flashdata('ganti_user')) ? '<script>Swal.fire("Berhasil", "Nama/Username berhasil diubah", "success")</script>' : '' ?>
<?= ($this->session->flashdata('ganti_pass')) ? '<script>Swal.fire("Berhasil", "Password berhasil diubah", "success")</script>' : '' ?>
<?= ($this->session->flashdata('error_pass')) ? '<script>Swal.fire("Gagal", "Password lama salah !", "error")</script>' : '' ?>
<?php if ($this->session->flashdata('error')) { ?>
	<script>
		Swal.fire('Gagal', '<?= $this->session->flashdata("error"); ?>', 'error');
	</script>
<?php }	?>
<script>
	$(document).ready(function() {
		$('.table-pemilih').DataTable();
	});
	$(document).ready(function() {
		$('.dt').DataTable();
	});

	$('.select2').select2();
	$('.select22').select2();
</script>
<script>
	$(document).ready(function() {
		$('.hapus').on('click', function() {
			var id = $(this).attr('data');
			var h = confirm('Anda yakin ingin menghapus kandidat ?');
			if (h) {
				window.location.assign('<?= base_url("admin/hapus_kandidat/"); ?>' + id);
			}
			return false;
		});
		$('.edit').on('click', function() {
			var id = $(this).attr('data');
			$.ajax({
				type: 'GET',
				url: '<?= base_url("admin/get_kandidat/"); ?>' + id,
				dataType: 'json',
				success: function(data) {
					$('#edit').modal('show');
					$('[name="id_kandidat"]').val(data.id_kandidat);
					$('[name="nama"]').val(data.nama_kandidat);
					$('[name="ket"]').val(data.keterangan);
					var foto = '<img class="img-circle img-responsive img-kandidat" src="' + base_url + './../assets/img/kandidat/' + data.foto + '">';
					$('#img-kandidat').html(foto);
				}
			})
			return false;
		})
	})
</script>
<script>
	$(function() {
		$('.hapus-voting').on('click', function(e) {
			e.preventDefault();
			var id = $(this).attr('data');
			Swal.fire({
				type: 'question',
				title: 'Hapus Voting ?',
				text: 'Anda yakin akan menghapus voting tersebut? Semua data terkait akan terhapus',
				showCancelButton: true,
				confirmButtonText: 'Hapus'
			}).then((result) => {
				if (result.value) {
					window.location.assign('<?= base_url("admin/hapus_voting/") ?>' + id);
				}
			});
			return false;
		})
	})
</script>
<script>
	var win = navigator.platform.indexOf('Win') > -1;
	if (win && document.querySelector('#sidenav-scrollbar')) {
		var options = {
			damping: '0.5'
		}
		Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
	}
</script>
<script>
	$(document).ajaxStart(function() {
		Pace.restart()
	})

	function dataPemilih() {
		$.ajax({
			type: 'ajax',
			url: '<?= base_url("admin/data_pemilih"); ?>',
			async: false,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td>' + (i + 1) + '.</td>' +
						'<td>' + data[i].nama + '</td>' +
						'<td>' + data[i].username + '</td>' +
						'<td><button class="btn reset-pass btn-xs btn-flat btn-warning" data="' + data[i].id_pemilih + '"><i class="fa fa-refresh"></i> Reset Password</button></td>' +
						'<td><button class="btn btn-xs btn-flat btn-success editPemilih" data="' + data[i].id_pemilih + '"><i class="fa fa-edit"></i> Edit</button>&nbsp;&nbsp;<button class="btn btn-xs btn-flat btn-danger hapusPemilih" data="' + data[i].id_pemilih + '"><i class="fa fa-trash"></i> Hapus</button></td>' +
						'</tr>';
				}
				$('#showData').html(html);
			}
		})
	}
	dataPemilih();
	$('#formtambah').on('submit', function(e) {
		e.preventDefault();
		var form = $(this);
		var nama = $('[name="nama"]').val(),
			username = $('[name="nama"]').val();

		if (nama == '' || username == '') {
			return false;
		} else {
			$.ajax({
				type: 'POST',
				url: '<?= base_url("admin/tambah_pemilih"); ?>',
				data: form.serialize(),
				success: function(data) {
					form.trigger('reset');
					Pace.restart();
					dataPemilih();
				}
			})
			return false;
		}
	})
	//Reset Password
	$('#showData').on('click', '.reset-pass', function(e) {
		e.preventDefault();
		var id = $(this).attr('data');
		var k = confirm('Password akan direset ?');
		if (k) {
			$.ajax({
				url: '<?= base_url("admin/reset_pass_pemilih/"); ?>' + id,
				success: function(data) {
					Swal.fire('Berhasil', 'Password berhasil direset', 'success');
				}
			})
			return false;
		}
	})
	//Edit Pemilih
	$('#showData').on('click', '.editPemilih', function() {
		var id = $(this).attr('data');
		$.ajax({
			type: 'GET',
			url: '<?= base_url("admin/get_pemilih/"); ?>' + id,
			dataType: 'json',
			success: function(data) {
				$('#editModal').modal('show');
				$('[name="id_pemilih"]').val(data.id_pemilih);
				$('[name="nama"]').val(data.nama);
				$('[name="username"]').val(data.username);
			}
		})
		return false;
	})
	//aksi edit
	$('#editForm').on('submit', function() {
		var id = $('[name="id_pemilih"]').val();
		$.ajax({
			type: 'POST',
			url: '<?= base_url("admin/edit_pemilih/"); ?>' + id,
			data: $('#editForm').serialize(),
			success: function(data) {
				$('#editForm').trigger('reset');
				$('#editModal').modal('hide');
				dataPemilih();
			}
		})
		return false;
	})
	//Hapus Pemilih
	$('#showData').on('click', '.hapusPemilih', function() {
		var id = $(this).attr('data');
		var k = confirm('Anda yakin ingin menghapusnya ?');
		if (k) {
			$.ajax({
				url: '<?= base_url("admin/hapus_pemilih/"); ?>' + id,
				success: function() {
					Swal.fire('Berhasil', 'Pemilih berhasil dihapus', 'success');
					dataPemilih();
				}
			})
			return false;
		}
	})
</script>
<script>
	$(document).ajaxStart(function() {
		Pace.restart();
	})

	function dataAdmin() {
		$.ajax({
			url: base_url + 'admin/data_admin',
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				for (var i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + (i + 1) + '.</td>' +
						'<td>' + data[i].nama + '</td>' +
						'<td>' + data[i].username + '</td>' +
						'<td><button class="btn reset-pass btn-xs btn-flat btn-warning" data="' + data[i].id_admin + '"><i class="fa fa-refresh"></i> Reset Password</button></td>' +
						'<td>' + data[i].last_login + '</td>' +
						'<td><button class="btn btn-xs btn-flat btn-success editAdmin" data="' + data[i].id_admin + '"><i class="fa fa-edit"></i> Edit</button>&nbsp;&nbsp;<button class="btn btn-xs btn-flat btn-danger hapusAdmin" data="' + data[i].id_admin + '"><i class="fa fa-trash"></i> Hapus</button></td>' +
						'</tr>';
				}
				$('#data-admin').html(html);
			}
		})
	}
	dataAdmin();
	$('.tambahAdmin').on('click', function() {
		$('#tambahAdmin').modal('show');
	});
	$('#formTambah').on('submit', function(e) {
		e.preventDefault();
		var form = $(this);
		var nama = $('[name="nama"]').val(),
			username = $('[name="username"]').val();
		if (nama == '' || username == '') {
			return false;
		} else {
			$.ajax({
				type: 'POST',
				url: base_url + 'admin/tambah_admin',
				data: form.serialize(),
				success: function(data) {
					form.trigger('reset');
					$('#tambahAdmin').modal('hide');
					dataAdmin();
				}
			})
			return false;
		}
	})
	//Reset Password
	$('#data-admin').on('click', '.reset-pass', function(e) {
		e.preventDefault();
		var id = $(this).attr('data');
		var k = confirm('Password akan direset ?');
		if (k) {
			$.ajax({
				url: base_url + 'admin/reset_pass_admin/' + id,
				success: function(data) {
					Swal.fire('Berhasil', 'Password berhasil direset', 'success');
				}
			})
			return false;
		}
	})
	//Edit Admin
	$('#data-admin').on('click', '.editAdmin', function() {
		var id = $(this).attr('data');
		$.ajax({
			type: 'GET',
			url: base_url + 'admin/get_admin/' + id,
			dataType: 'json',
			success: function(data) {
				$('#editAdmin').modal('show');
				$('[name="id_admin"]').val(data.id_admin);
				$('[name="nama"]').val(data.nama);
				$('[name="username"]').val(data.username);
			}
		})
		return false;
	})
	//Aksi edit
	$('#formEdit').on('submit', function(e) {
		e.preventDefault()
		var id = $('[name="id_admin"]').val();
		$.ajax({
			type: 'POST',
			url: base_url + 'admin/edit_admin/' + id,
			data: $('#formEdit').serialize(),
			success: function(data) {
				$('#formEdit').trigger('reset');
				$('#editAdmin').modal('hide');
				dataAdmin();
			}
		})
		return false;
	})
	//Hapus Admin
	$('#data-admin').on('click', '.hapusAdmin', function() {
		var id = $(this).attr('data');
		var k = confirm('Administrator akan dihapus ?');
		if (k) {
			$.ajax({
				url: base_url + 'admin/hapus_admin/' + id,
				success: function() {
					Swal.fire('Berhasil', 'Administrator berhasil dihapus', 'success');
					dataAdmin();
				}
			})
		}
	})
	//Reset aplikasi
	$('.btn-reset').on('click', function(e) {
		e.preventDefault();
		Swal.fire({
			type: 'question',
			title: 'Reset Aplikasi?',
			text: 'Anda yakin akan mereset aplikasi? Semua data akan terhapus kecuali login Administrator',
			showCancelButton: true,
			confirmButtonText: 'RESET'
		}).then((result) => {
			if (result.value) {
				window.location.assign('<?= base_url("admin/reset") ?>');
			}
		})
	})
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>