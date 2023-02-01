

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class=" col-lg-6 ">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">

            <?= messege(); ?>
            <?= success(); ?>
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                    <p class="mb-4">We get it, stuff happens. Just enter your I,C below and we'll send email you a link to reset your password!</p>
                  </div>
                  <?php echo form_open('auth/forgot_password',['class' => 'user']); ?>
                    <div class="form-group">
                    <input type="text" class="form-control form-control-user <?= form_error('ic') ? 'is-invalid':'' ?>" id="ic"  name="ic" value="<?php echo set_value('ic'); ?>"  placeholder="IC">
                        <span class="text-danger"><?php echo form_error('ic'); ?></span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Reset Password
                    </button>
                  </form>
                  <hr>

                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/'); ?>">Already have an account? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

