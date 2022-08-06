</main>

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
      <div class="col-lg-6"></div>
    </div>
  </div>
</footer>
<!--   Core JS Files   -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="<?= base_url(); ?>/assets/js/core/popper.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/core/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/plugins/chartjs.min.js"></script>
<!-- Sweetalert -->
<script src="<?= base_url('/assets/js/sweetalert2.all.min.js'); ?>"></script>
<script>
  $('#formUbahPasswd').on('submit', function(e) {
    e.preventDefault();
    var id = <?= $this->session->id ?>;
    var passLama = $('[name="passwdlama"]').val(),
      passBaru = $('[name="passwdbaru"]').val();
    if (passLama != '' || passBaru != '') {
      $.ajax({
        type: 'POST',
        url: '<?= base_url("user/set_pass_id/") ?>' + id,
        data: {
          passwdLama: passLama,
          passwdBaru: passBaru
        },
        success: function(data) {
          if (data == 1) {
            $('#formUbahPasswd').trigger('reset');
            Swal.fire('Berhasil', 'Anda akan dialihkan dalam 5 detik', 'success');
            setTimeout(function() {
              window.location.reload()
            }, 5000);
          } else {
            $('#formUbahPasswd').trigger('reset');
            Swal.fire('Gagal', 'Password lama salah !', 'error');
          }
        }
      })
    } else {
      Swal.fire('Gagal', 'Form harus diisi !', 'error');
      return false;
    }
  })
  //pilih
  $('.pilih').on('click', function(e) {
    e.preventDefault();
    var id = $(this).attr('data');
    var voting = $(this).attr('data-voting');
    var nama = $(this).attr('data-nama');
    Swal.fire({
      type: 'question',
      title: 'Pilih ' + nama,
      text: 'Anda yakin akan memilih kandidat tersebut ?',
      showCancelButton: true,
      confirmButtonText: 'Pilih'
    }).then((result) => {
      if (result.value) {
        //aksi
        $.ajax({
          type: 'POST',
          url: '<?= base_url("user/pilih/") ?>' + voting + '/' + id,
          success: function(data) {
            if (data == 1) {
              Swal.fire({
                type: 'success',
                title: 'Berhasil',
                text: 'Anda telah memilih ' + nama,
              }).then((result) => {
                if (result.value) {
                  window.location.reload()
                }
              })
            }
          }
        })
      }
    })
  })
  //logout
  $('.logout').on('click', function(e) {
    e.preventDefault()
    window.location.assign('<?= base_url("user/logout") ?>')
  })
</script>

<?php if ($pilih > 0) : ?>
  <script>
    setTimeout(function() {
      window.location.assign('<?= base_url("user/logout") ?>');
    }, 120000)
  </script>
<?php endif ?>
<script>
  var ctx1 = document.getElementById("chart-line").getContext("2d");

  var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

  gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
  gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
  gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
  new Chart(ctx1, {
    type: "line",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Mobile apps",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#5e72e4",
        backgroundColor: gradientStroke1,
        borderWidth: 3,
        fill: true,
        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
        maxBarThickness: 6

      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            padding: 10,
            color: '#fbfbfb',
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#ccc',
            padding: 20,
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });
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
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= base_url(); ?>/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
<?= ($this->session->flashdata('login_gagal')) ? '<script>Swal.fire("Gagal", "Username/Password salah !", "error")</script>' : '' ?>
<?= ($this->session->flashdata('novoting')) ? '<script>Swal.fire("Gagal", "Tidak ada voting !", "error")</script>' : '' ?>
</body>

</html>