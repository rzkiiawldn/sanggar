<!-- ======= Footer ======= -->
  <footer id="footer" style="bottom: 0px">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">&copy; Sanggarsans</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

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

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a> 


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  
  <script language="JavaScript" src="<?= base_url(); ?>assets/user/vendor/jquery/jquery.min.js"></script>
  <script language="JavaScript" src="<?= base_url(); ?>assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script language="JavaScript" src="<?= base_url(); ?>assets/user/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script language="JavaScript" src="<?= base_url(); ?>assets/user/vendor/php-email-form/validate.js"></script>
  <script language="JavaScript" src="<?= base_url(); ?>assets/user/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script language="JavaScript" src="<?= base_url(); ?>assets/user/vendor/counterup/counterup.min.js"></script>
  <script language="JavaScript" src="<?= base_url(); ?>assets/user/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script language="JavaScript" src="<?= base_url(); ?>assets/user/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script language="JavaScript" src="<?= base_url(); ?>assets/user/vendor/venobox/venobox.min.js"></script>
  <script language="JavaScript" src="<?= base_url(); ?>assets/user/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script language="JavaScript" src="<?= base_url(); ?>assets/user/js/main.js"></script>

  <script>
    $('.custom-file-input').on('change', function() 
    { 
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
  </script> 




</body>

</html>