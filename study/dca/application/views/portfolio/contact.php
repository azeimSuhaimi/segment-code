  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

    <?= $this->session->flashdata('messege');?> 
    
      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Me</p>
      </div>

      <div class="row mt-2">

        <div class="col-md-6 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-map"></i>
            <h3>City</h3>
            <p><?= $about_me['city'];?></p>
          </div>
        </div>

        <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-share-alt"></i>
            <h3>Social Profiles</h3>
            <div class="social-links">

            <?php if($social):?>
                <?php foreach($social as $soc):?>
                  <a href="<?= $soc['url'];?>" target="_blank" title="<?= $soc['title'];?>" class="<?= $soc['title'];?>"><i class="<?= $soc['icon'];?>"></i></a>
                <?php endforeach; ?>
            <?php endif; ?>
              
            </div>
          </div>
        </div>

        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-envelope"></i>
            <h3>Email Me</h3>
            <p><?= $about_me['email'];?></p>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-phone-call"></i>
            <h3>Call Me</h3>
            <p><?= $about_me['phone'];?></p>
          </div>
        </div>
      </div>

      <form action="<?= base_url('portfolio/contact#contact');?>" method="post" role="form" class="php-email-for mt-4">
        <div class="form-row">
          <div class="col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="<?php echo set_value('name'); ?>" />
            <div class="validate"><div class="text-danger"><?php echo form_error('name'); ?></div></div>
          </div>
          <div class="col-md-6 form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" value="<?php echo set_value('email'); ?>" />
            <div class="validate"><div class="text-danger"><?php echo form_error('email'); ?></div></div>
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" value="<?php echo set_value('subject'); ?>" />
          <div class="validate"><div class="text-danger"><?php echo form_error('subject'); ?></div></div>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"><?php echo set_value('message'); ?></textarea>
          <div class="validate"><div class="text-danger"><?php echo form_error('message'); ?></div></div>
        </div>
        <div class="mb-3">
          <div class="loading"></div>
          <div class="error-message"></div>
          <div class="sent-message"></div>
        </div>
        <div class="text-center"><button class="btn btn-success" type="submit">Send Message</button></div>
      </form>

    </div>
  </section><!-- End Contact Section -->