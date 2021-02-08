

    <section id="more-services" class="more-services my-5">
      <div class="container">

      	<div class="section-title" data-aos="fade-up">
          <h3>Kegiatan sanggar</h3>
        </div>

        <div class="row">
        <?php foreach ($event as $e): ?>
        	<div class="col-md-4 d-flex align-items-stretch mb-3">
	            <div class="card" style='background-image: url("<?php echo base_url(); ?>assets/gambar_event/<?= $e['gambar']; ?>");' data-aos="fade-up" data-aos-delay="100">
	              <div class="card-body">
	                <h5 style="font-size: 18px" class="card-title"><a href=""><?= $e['judul_event']; ?></a></h5>
	                <p class="card-text" style="font-size: 12px"><?= word_limiter($e['keterangan'], 8); ?>.</p>
	                <?php if ($this->uri->segment(1) == 'welcome'): ?>
                  <div class="read-more"><a href="<?= site_url(); ?>welcome/detail_event/<?= $e['id']; ?>"><i class="icofont-arrow-right"></i> Selengkapnya...</a></div>
                  <?php else: ?>
                  <div class="read-more"><a href="<?= site_url(); ?>user/event/detail/<?= $e['id']; ?>"><i class="icofont-arrow-right"></i> Selengkapnya...</a></div>
                  <?php endif ?>
	              </div>
	            </div>
	        </div>
        <?php endforeach ?>
          

      </div>
    </section><!-- End More Services Section -->

</main>