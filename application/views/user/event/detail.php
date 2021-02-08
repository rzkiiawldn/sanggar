
    
    <section id="counts" class="counts portfolio my-5">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h3><?= $event['judul_event']; ?></h3>
        </div>

        <div class="row ">
          <div class="col-lg-4 col-md-6 portfolio-item filter-galeri">
             <div class="portfolio-wrap">
               <img src="<?= base_url(); ?>assets/gambar_event/<?= $event['gambar']; ?>" class="img-fluid" alt="" width="400px">
                <div class="portfolio-info">
                 <p>galeri</p>
                 <div class="portfolio-links">
                   <a href="<?= base_url(); ?>assets/gambar_event/<?= $event['gambar']; ?>" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                 </div>
               </div>
             </div>
            </div>

          <div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
            <div class="content d-flex flex-column justify-content-center">
              <div class="row">

                  <div class="count-box">
                  	<p class="mb-3" style="font-size: 13px"><?= date('d F Y', $event['date_created']); ?> || Pengirim : <?= $event['pengirim']; ?> </p>
                    <i class="bx bx-file"></i>
                    <p><?= nl2br($event['keterangan']); ?>.</p>           
                  </div>

              </div>
            </div><!-- End .content-->
          </div>
        </div>


      </div>
    </section><!-- End Counts Section --><br><br><br><br><br><br>
</main>