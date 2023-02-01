 <!-- ======= About Section ======= -->
 <section id="about" class="about">

<!-- ======= About Me ======= -->
<div class="about-me container">

  <div class="section-title">
    <h2>About</h2>
    <p>Learn more about me</p>
  </div>

  <div class="row">
    <div class="col-lg-4" data-aos="fade-right">
      <img src="<?= base_url('assets_portfolio');?>/img/<?= $about_me['image'];?>" class="img-fluid" alt="">
    </div>
    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
      <h3><?= $about_me['title'];?></h3>
      <p class="font-italic">
        <?= $about_me['motto'];?>
      </p>
      <div class="row">
        <div class="col-lg-6">
          <ul>
           
            <li><i class="icofont-rounded-right"></i> <strong>Phone:</strong> <?= $about_me['phone'];?></li>
            <li><i class="icofont-rounded-right"></i> <strong>City:</strong> <?= $about_me['city'];?></li>
            <li><i class="icofont-rounded-right"></i> <strong>Email:</strong> <?= $about_me['email'];?></li>
            <li><i class="icofont-rounded-right"></i> <strong>Freelance:</strong> <?= $about_me['freelance'];?></li>

          </ul>
        </div>
        <div class="col-lg-6">
          <ul>
            <!--
                      <li><i class="icofont-rounded-right"></i> <strong>Age:</strong> 30</li>
                      <li><i class="icofont-rounded-right"></i> <strong>Degree:</strong> Master</li>
            
            -->
      
          </ul>
        </div>
      </div>
      <p>
      <?= $about_me['type_job'];?>
      </p>
    </div>
  </div>

</div><!-- End About Me -->

<!-- ======= Counts ======= -->
<div class="counts container">

  <div class="row">

    <div class="col-lg-3 col-md-6">
      <div class="count-box">
        <i class="icofont-simple-smile"></i>
        <span data-toggle="counter-up">232</span>
        <p>Happy Clients</p>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
      <div class="count-box">
        <i class="icofont-document-folder"></i>
        <span data-toggle="counter-up">521</span>
        <p>Projects</p>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
      <div class="count-box">
        <i class="icofont-live-support"></i>
        <span data-toggle="counter-up">1,463</span>
        <p>Hours Of Support</p>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
      <div class="count-box">
        <i class="icofont-users-alt-5"></i>
        <span data-toggle="counter-up">15</span>
        <p>Hard Workers</p>
      </div>
    </div>

  </div>

</div><!-- End Counts -->

<!-- ======= Skills  ======= -->
<div class="skills container">

  <div class="section-title">
    <h2>Skills</h2>
  </div>

  <div class="row skills-content">
  
    <?php if($skills):?>
      
      
        <div class="col-lg-6">
        <?php $i = 0; while($i< ceil(count($skills) /2)):?>

            <div class="progress">
              <span class="skill"><?= $skills[$i]['skill']?> <i class="val"><?= $skills[$i]['percent']?>%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?= $skills[$i]['percent']?>" aria-valuemin="0" aria-valuemax="<?= $skills[$i]['percent']?>"></div>
              </div>
            </div>

          <?php  $i++;?>
        <?php endwhile ?>
        </div>

        <div class="col-lg-6">
        
          <?php while($i< count($skills)):?>

            <div class="progress">
              <span class="skill"><?= $skills[$i]['skill']?> <i class="val"><?= $skills[$i]['percent']?>%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?= $skills[$i]['percent']?>" aria-valuemin="0" aria-valuemax="<?= $skills[$i]['percent']?>"></div>
              </div>
            </div>

          <?php  $i++;?>
          <?php endwhile ?>

        </div>
      

    <?php else :?>
    
    <?php endif; ?>

  </div>

</div><!-- End Skills -->



<!-- ======= Testimonials ======= -->
<div class="testimonials container">

  <div class="section-title">
    <h2>Testimonials</h2>
  </div>

  <div class="owl-carousel testimonials-carousel">


      <?php foreach($testimonial as $test):?>
        <div class="testimonial-item">
          <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              <?= $test['testimonial'];?>
            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
          </p>
          <img src="<?= base_url();?>assets_portfolio/img/testimonials/<?= $test['image'];?>" class="testimonial-img" alt="">
          <h3><?= $test['name'];?></h3>
          <h4><?= $test['job'];?></h4>
        </div>
      <?php endforeach; ?>





  </div>

</div><!-- End Testimonials  -->

</section><!-- End About Section -->