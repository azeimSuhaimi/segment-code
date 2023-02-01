

  <!-- ======= Header ======= -->
  <header id="header" class="header-tops">
    <div class="container">

      <h1><a class=" text-uppercase" href="<?= base_url('portfolio/');?>"><?= $home['title'];?></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      <h2>I'm a passionate <span>graphic designer</span> from Kuala Terengganu</h2>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#header">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="<?= base_url();?>auth/">log in</a></li>
        </ul>
      </nav><!-- .nav-menu -->

      <div class="social-links">
        <?php if($social):?>
            <?php foreach($social as $soc):?>
              <a href="<?= $soc['url'];?>" target="_blank" title="<?= $soc['title'];?>" class="<?= $soc['title'];?>"><i class="<?= $soc['icon'];?>"></i></a>
            <?php endforeach; ?>
        <?php endif; ?>
              
      </div>

    </div>
  </header><!-- End Header -->












  