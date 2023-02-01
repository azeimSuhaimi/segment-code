  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Portfolio</h2>
        <p>My Works</p>
      </div>

      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>

            <?php if($filters):?>
              <?php foreach($filters as $f):?>
                <li data-filter=".filter-<?= $f['filter'];?>"><?= $f['filter'];?></li>
              <?php endforeach; ?>
            <?php endif; ?>


          </ul>
        </div>
      </div>

      <div class="row portfolio-container">

        <?php if($portfolio):?>
          <?php foreach($portfolio as $p):?>
            <?php $fil = $this->db->get_where('filters', array('id' => $p['filter']))->row_array(); ?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-<?= $fil['filter'];?>">
              <div class="portfolio-wrap">
                <img src="<?= base_url();?>assets_portfolio/img/portfolio/<?= $p['image'];?>" class="img-fluid"  alt="">
                <div class="portfolio-info">
                  <h4><?= $p['title'];?></h4>
                  <p><?= $fil['filter'];?></p>
                  <div class="portfolio-links">
                    <a href="<?= base_url();?>assets_portfolio/img/portfolio/<?= $p['image'];?>"  data-gall="portfolioGallery" class="venobox" title="<?= $p['title'];?>"><i class="bx bx-plus"></i></a>
                    <a href="<?= base_url('portfolio/portfolio_details/'.$p['id']);?>" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Portfolio Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

          <?php endforeach; ?>
        <?php endif; ?>





      </div>

    </div>
  </section><!-- End Portfolio Section -->