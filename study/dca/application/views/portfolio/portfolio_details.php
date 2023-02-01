

  <main id="main">

    <!-- ======= Portfolio Details ======= -->
    <div id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row">

          <div class="col-lg-8">
            <h2 class="portfolio-title">Detail on this project <?= $details['title'];?></h2>
            <div class="owl-carousel portfolio-details-carousel">
              <img src="<?= base_url('assets_portfolio/img/portfolio/'.$details['image']);?>"  class="img-fluid" alt="">

              <?php if($image_details):?>
                <?php foreach($image_details as $id):?>
                    <img src="<?= base_url('assets_portfolio/img/portfolio/'.$id['image']);?>"  class="img-fluid" alt="">
                <?php endforeach; ?>
              <?php endif; ?>
              
            </div>
          </div>

          <div class="col-lg-4 portfolio-info text-uppercase">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong> : <?= $details['category'];?></li>
              <li><strong>Client</strong> : <?= $details['client'];?></li>
              <li><strong>Project date</strong> : <?= $details['project_date'];?></li>
              <?php if($details['url']):?>
                <li><strong>Project URL</strong> : <a target="_blank" href="<?= $details['url'];?>">LINK</a></li>
              <?php endif; ?>
              
            </ul>

            <p>
                <?= $details['description'];?>
            </p>
          </div>

        </div>

      </div>
    </div><!-- End Portfolio Details -->

  </main><!-- End #main -->

