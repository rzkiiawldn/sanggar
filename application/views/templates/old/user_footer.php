    <div class="site-footer">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p class="copyright"><small>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> | SanggarSans
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small></p>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div> <!-- .site-wrap -->

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
          <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= site_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

  <script src="<?= site_url(); ?>assets/member/js/jquery-3.3.1.min.js"></script>
  <script src="<?= site_url(); ?>assets/member/js/jquery-ui.js"></script>
  <script src="<?= site_url(); ?>assets/member/js/popper.min.js"></script>
  <script src="<?= site_url(); ?>assets/member/js/bootstrap.min.js"></script>
  <script src="<?= site_url(); ?>assets/member/js/owl.carousel.min.js"></script>
  <script src="<?= site_url(); ?>assets/member/js/jquery.countdown.min.js"></script>
  <script src="<?= site_url(); ?>assets/member/js/jquery.easing.1.3.js"></script>
  <script src="<?= site_url(); ?>assets/member/js/aos.js"></script>
  <script src="<?= site_url(); ?>assets/member/js/jquery.fancybox.min.js"></script>
  <script src="<?= site_url(); ?>assets/member/js/jquery.sticky.js"></script>
  <script src="<?= site_url(); ?>assets/member/js/isotope.pkgd.min.js"></script>
  <script>
    $('.custom-file-input').on('change', function() 
    { 
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
  </script>
  <script> window.setTimeout(function(){
      $(".alert").fadeTo(200, 0).slideUp(200, function (){
      $(this).remove();
     });
    }, 5000);
  </script>

  <script src="<?= site_url(); ?>assets/member/js/main.js"></script>

  


</body>
</html>