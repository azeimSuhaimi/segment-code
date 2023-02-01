  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">DCA Admin </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#SocialMedia" aria-expanded="true" aria-controls="SocialMedia">
          <i class="fas fa-fw fa-share-alt"></i>
          <span>Social Media</span>
        </a>
        <div id="SocialMedia" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">social media Components:</h6>
            <a class="collapse-item" href="<?= base_url('social_media');?>">List Social Media</a>
            <a class="collapse-item" href="<?= base_url('social_media/add');?>">add new social media</a>
          </div>
        </div>
      </li>

      <!-- Nav Item -  -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>home/">
          <i class="fas fa-fw fa-image"></i>
          <span>Title and background</span></a>
      </li>

      <!-- Nav Item -  -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>about_me/">
          <i class="fas fa-fw fa-user"></i>
          <span>about me</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#skills" aria-expanded="true" aria-controls="skills">
          <i class="fas fa-fw fa-share-alt"></i>
          <span>Skills</span>
        </a>
        <div id="skills" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Skills Components:</h6>
            <a class="collapse-item" href="<?= base_url('skills');?>">List Skills</a>
            <a class="collapse-item" href="<?= base_url('skills/add');?>">add new Skills</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#testimonials" aria-expanded="true" aria-controls="testimonials">
          <i class="fas fa-fw fa-share-alt"></i>
          <span>Testimonials</span>
        </a>
        <div id="testimonials" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Testimonials Components:</h6>
            <a class="collapse-item" href="<?= base_url('testimonials');?>">List testimonials</a>
            <a class="collapse-item" href="<?= base_url('testimonials/add');?>">add new testimonials</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#filters" aria-expanded="true" aria-controls="filters">
          <i class="fas fa-fw fa-share-alt"></i>
          <span>filters</span>
        </a>
        <div id="filters" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">filters Components:</h6>
            <a class="collapse-item" href="<?= base_url('filters');?>">List filters</a>
            <a class="collapse-item" href="<?= base_url('filters/add');?>">add new filters</a>
          </div>
        </div>
      </li>


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#portfolio" aria-expanded="true" aria-controls="portfolio">
          <i class="fas fa-fw fa-share-alt"></i>
          <span>portfolio</span>
        </a>
        <div id="portfolio" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">portfolio Components:</h6>
            <a class="collapse-item" href="<?= base_url('portfolio_filter');?>">List portfolio</a>
            <a class="collapse-item" href="<?= base_url('portfolio_filter/add');?>">add new portfolio</a>
          </div>
        </div>
      </li>








      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">