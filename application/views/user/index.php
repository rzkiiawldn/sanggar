

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h3 data-aos="fade-up"><b>Selamat Datang</b></h3>
          <p data-aos="fade-up" data-aos-delay="400">Temukan sanggar favoritmu sekarang !.</p>
          <div data-aos="fade-up row" data-aos-delay="800">
          	<form action="<?= base_url('user/cari_sanggar/cari'); ?>" method="post">
          	<div class="col-md-9">
	          	<div class="form-group">
	            	<select class="form-control" name="tipe_sanggar_id" required="">
		              	<option value="">--Pilih Tipe Sanggar--</option>
		              	<?php foreach ($tipe_sanggar as $ts) : ?>
		              	<option value="<?= $ts['id']; ?>"><?= $ts['tipe_sanggar']; ?></option>
		              	<?php endforeach; ?>
	            	</select>
	          	</div>
	            <div class="float-right">
	            	<button type="submit" class="btn-get-started scrollto">Cari Sanggar</button>
	            </div>
	        </div>
	        </form>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="<?= base_url(); ?>assets/img/body.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Team Section ======= -->
    <section id="team sanggar" class="team section-bg count">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Sanggar Populer</h2>
          <!-- <p>Berikut adalah sanggar yang direkomendasikan untuk anda</p> -->
        </div>

        <div class="row" data-aos="fade-up">

        <?php foreach ($sanggar as $s): ?>
          <div class="col-lg-3">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="<?= base_url(); ?>assets/img/sanggar/profile/<?= $s['foto_sanggar']; ?>" alt="User Avatar" width="130" height="110"> 
                    </div>
                  </div>
                  <ul class="list-group list-group-flush" style="height: 180px">
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2"><?= $s['nama_sanggar']; ?></strong>
                      <p style="font-size: 13px" class="mb-0">"<?= word_limiter($s['deskripsi_seni'] , 5); ?>"</p>
                      <p style="font-size: 13px" class="mb-0">Tipe sanggar : <b><?= $s['tipe_sanggar']; ?></b></p>
                      <p style="font-size: 13px" class="mb-0">Pengunjung : <b><?= $s['view']; ?></b></p>
                    </li>
                  </ul>
                  <a href="<?= base_url(); ?>user/sanggar/detail_sanggar/<?= $s['id_sanggar']; ?>" class="btn btn-info">Detail sanggar</a>
                </div>
              </div>        
        <?php endforeach ?>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq testimonials section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Berita dan kegiatan sanggar</h2>
        </div>

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-7">
          	<h3>Event Kesenian</h3><hr>

          	<?php foreach ($event as $b): ?>
	          	<div class="testimonial-wrap">
		            <div class="testimonial-item">
		              <img src="<?= base_url(); ?>assets/gambar_event/<?= $b['gambar']; ?>" class="testimonial-img" alt="">
		              <h3><?= $b['judul_event']; ?>.</h3>
		              <p style="font-size: 13px"><?= date('d F Y', $b['date_created']); ?> || Pengirim : <?= $b['pengirim']; ?> </p>
		              <p>"<?= word_limiter($b['keterangan'], 10);  ?>"</p>
		              <a style="font-size: 12px" href="<?= site_url(); ?>user/event/detail/<?= $b['id']; ?>">selengkapnya...</a>
		            </div>
		      </div>
          	<?php endforeach ?>
          </div>

          <div class="col-lg-4">
          	<h3>Berita Kesenian</h3><hr>
          	<?php foreach ($berita as $e): ?>
            <i class="bx bx-file"></i>
            <h4><?= $e['judul_berita']; ?></h4>
            <p><?= word_limiter($e['keterangan'], 6); ?>    
            <a style="font-size: 12px" href="<?= base_url(); ?>user/berita/detail/<?= $e['id']; ?>">selengkapnya...</a></p>   		
          	<?php endforeach ?>
          </div>
        </div><!-- End F.A.Q Item-->

        </div>
    </section><!-- End F.A.Q Section -->



    <!-- ======= Contact Section ======= -->
<!--     <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact Us</h2>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-about">
              <h3>SanggarSans</h3>
              <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="info">
              <div>
                <i class="ri-map-pin-line"></i>
                <p>A108 Adam Street<br>New York, NY 535022</p>
              </div>

              <div>
                <i class="ri-mail-send-line"></i>
                <p>info@example.com</p>
              </div>

              <div>
                <i class="ri-phone-line"></i>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section> --><!-- End Contact Section -->

  </main><!-- End #main -->

  