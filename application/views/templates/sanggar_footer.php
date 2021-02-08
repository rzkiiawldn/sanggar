<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sanggar <?= date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->

  <!-- Page level custom scripts -->
  
  <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>  
  <script src="<?= base_url(); ?>assets/js/demo/chart-bar-demo.js"></script>

  <script>
    $('.custom-file-input').on('change', function() 
    { 
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    window.setTimeout(function(){
      $(".alert").fadeTo(200, 0).slideUp(200, function (){
      $(this).remove();
     });
    }, 5000);
  </script>

<!-- PEMBUKAAN PENDAFTARAN -->
  <script>

    $('.custom-pendaftaran').on('click', function() {
      const pendaftaran     = $(this).data('pendaftaran');
      const id_sanggar      = $(this).data('sanggar');

      $.ajax({
        url: "<?= base_url('sanggar/pendaftar/changeAccess_buka'); ?>",
        type: 'post',
        data: {
          pendaftaran: pendaftaran,
          id_sanggar: id_sanggar
        },
        success: function() {
          document.location.href = "<?= base_url('sanggar/pendaftar/index'); ?>";
        }

      });
    });
    
  </script>

<!-- PEMBUKAAN PENYEWAAN -->
  <script>

    $('.custom-penyewaan').on('click', function() {
      const penyewaan     = $(this).data('penyewaan');
      const id_sanggar      = $(this).data('sanggar');

      $.ajax({
        url: "<?= base_url('sanggar/penyewa/changeAccess_buka'); ?>",
        type: 'post',
        data: {
          penyewaan: penyewaan,
          id_sanggar: id_sanggar
        },
        success: function() {
          document.location.href = "<?= base_url('sanggar/penyewa/index'); ?>";
        }

      });
    });
    
  </script>

<!-- PEMBUKAAN PENGUNDANG -->
  <script>

    $('.custom-undang-acara').on('click', function() {
      const undang_acara     = $(this).data('undang_acara');
      const id_sanggar      = $(this).data('sanggar');

      $.ajax({
        url: "<?= base_url('sanggar/undang/changeAccess_buka'); ?>",
        type: 'post',
        data: {
          undang_acara: undang_acara,
          id_sanggar: id_sanggar
        },
        success: function() {
          document.location.href = "<?= base_url('sanggar/undang/index'); ?>";
        }

      });
    });
    
  </script>

  <script>

    $('.form-check-input-pendidikan').on('click', function() {
      const id_pendidikan = $(this).data('pendidikan');
      const id_sanggar    = $(this).data('sanggar');

      $.ajax({
        url: "<?= base_url('sanggar/kriteria/changeaccess_pendidikan'); ?>",
        type: 'post',
        data: {
          id_pendidikan: id_pendidikan,
          id_sanggar: id_sanggar
        },
        success: function() {
          document.location.href = "<?= base_url('sanggar/kriteria/index'); ?>";
        }

      });
    });
    
  </script>

    <script>

    $('.form-check-input-umur').on('click', function() {
      const id_umur = $(this).data('umur');
      const id_sanggar    = $(this).data('sanggar');

      $.ajax({
        url: "<?= base_url('sanggar/kriteria/changeaccess_umur'); ?>",
        type: 'post',
        data: {
          id_umur: id_umur,
          id_sanggar: id_sanggar
        },
        success: function() {
          document.location.href = "<?= base_url('sanggar/kriteria/index'); ?>";
        }

      });
    });
    
  </script>

    <script>

    $('.form-check-input-jadwal').on('click', function() {
      const id_jadwal = $(this).data('jadwal');
      const id_sanggar    = $(this).data('sanggar');

      $.ajax({
        url: "<?= base_url('sanggar/kriteria/changeaccess_jadwal'); ?>",
        type: 'post',
        data: {
          id_jadwal: id_jadwal,
          id_sanggar: id_sanggar
        },
        success: function() {
          document.location.href = "<?= base_url('sanggar/kriteria/index'); ?>";
        }

      });
    });
    
  </script>

    <script>

    $('.form-check-input-sarana').on('click', function() {
      const id_sarana = $(this).data('sarana');
      const id_sanggar    = $(this).data('sanggar');

      $.ajax({
        url: "<?= base_url('sanggar/kriteria/changeaccess_sarana'); ?>",
        type: 'post',
        data: {
          id_sarana: id_sarana,
          id_sanggar: id_sanggar
        },
        success: function() {
          document.location.href = "<?= base_url('sanggar/kriteria/index'); ?>";
        }

      });
    });
    
  </script>

    <script>

    $('.form-check-input-prasarana').on('click', function() {
      const id_prasarana = $(this).data('prasarana');
      const id_sanggar    = $(this).data('sanggar');

      $.ajax({
        url: "<?= base_url('sanggar/kriteria/changeaccess_prasarana'); ?>",
        type: 'post',
        data: {
          id_prasarana: id_prasarana,
          id_sanggar: id_sanggar
        },
        success: function() {
          document.location.href = "<?= base_url('sanggar/kriteria/index'); ?>";
        }

      });
    });
    
  </script>

    <script>

    $('.form-check-input-biaya').on('click', function() {
      const id_biaya = $(this).data('biaya');
      const id_sanggar    = $(this).data('sanggar');

      $.ajax({
        url: "<?= base_url('sanggar/kriteria/changeaccess_biaya'); ?>",
        type: 'post',
        data: {
          id_biaya: id_biaya,
          id_sanggar: id_sanggar
        },
        success: function() {
          document.location.href = "<?= base_url('sanggar/kriteria/index'); ?>";
        }

      });
    });
    
  </script>

    <script>

    $('.form-check-input-nilai').on('click', function() {
      const nilai = $(this).data('nilai');
      const id_sanggar    = $(this).data('sanggar');

      $.ajax({
        url: "<?= base_url('sanggar/kriteria/changeaccess_nilai'); ?>",
        type: 'post',
        data: {
          nilai: nilai,
          id_sanggar: id_sanggar
        },
        success: function() {
          document.location.href = "<?= base_url('sanggar/kriteria/index'); ?>";
        }

      });
    });
    
  </script>

<script>

<?php 

$labele = "";
$datane = "";

foreach ($pendaftar as $pen) {
  $labele .= '"'.$pen['tanggal_pendaftaran'].'",';
  $datane .= "".$pen['id_user'].",";
}

  $labele = rtrim($labele, ",");
  $datane = rtrim($datane, ",");
  echo "var labele = [$labele];\n";
  echo "var datane = [$datane];";

 ?>

var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
    datasets: [{
      label: "Pengunjung",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "#5a5c69",
      pointHoverBorderColor: "#5a5c69",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [
      <?= $Jan; ?>,
      <?= $Feb; ?>,
      <?= $Mar; ?>,
      <?= $Apr; ?>,
      <?= $May; ?>,
      <?= $Jun; ?>,
      <?= $Jul; ?>,
      <?= $Aug; ?>,
      <?= $Sep; ?>,
      <?= $Oct; ?>,
      <?= $Nov; ?>,
      <?= $Dec; ?>,
      ],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return ' ' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ' ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
</script>

</body>

</html>