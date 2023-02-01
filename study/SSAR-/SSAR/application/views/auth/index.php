

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class=" col-lg-10 mt-5">



        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->

            <?= messege(); ?>
            <?= success(); ?>

            <div class="row">
              <div class="col-lg-6 ">
                dsadddddddddddddd
              </div> 
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <?php echo form_open('auth',['class' => 'user']); ?>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user <?= form_error('ic') ? 'is-invalid':'' ?>" id="ic"  name="ic" value="<?php echo set_value('ic'); ?>"  placeholder="IC">
                        <span class="text-danger"><?php echo form_error('ic'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user <?= form_error('password') ? 'is-invalid':'' ?>" id="password" value="<?php echo set_value('password'); ?>" name="password" placeholder="Password">
                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                    </div>
                    <!-- <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>-->
                    
                    <button type="submit" class="btn btn-primary btn-user btn-block"> Login </button>
                   
                  </form>
                  
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/forgot_password')?>">Forgot Password?</a>
                  </div>
                  <!--
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                   -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


