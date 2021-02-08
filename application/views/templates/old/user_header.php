
<!doctype html>
<html lang="en">
<head>
  <title><?= $judul; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    

  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= site_url(); ?>assets/member/fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?= site_url(); ?>assets/member/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= site_url(); ?>assets/member/css/jquery-ui.css">
  <link rel="stylesheet" href="<?= site_url(); ?>assets/member/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= site_url(); ?>assets/member/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= site_url(); ?>assets/member/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="<?= site_url(); ?>assets/member/css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="<?= site_url(); ?>assets/member/css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="<?= site_url(); ?>assets/member/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="<?= site_url(); ?>assets/member/fonts/flaticon-covid/font/flaticon.css">

  <link rel="stylesheet" href="<?= site_url(); ?>assets/member/css/aos.css">

  <link rel="stylesheet" href="<?= site_url(); ?>assets/member/css/style.css">
  <link href="<?= site_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="icon" type="text/css" href="<?= site_url(); ?>assets/img/logo2.png">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

  <link rel="stylesheet" type="text/css" href="<?= site_url(); ?>leaflet-locatecontrol/dist/L.Control.Locate.min.css" />
  <script src="<?= site_url(); ?>leaflet-locatecontrol/src/L.Control.Locate.js"></script>

  <style>
  .checked {
    color: orange;
  }
  </style>

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>