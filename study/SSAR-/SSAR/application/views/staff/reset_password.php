              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">reset staff password</h6>
                </div>
                <div class="card-body">

                    
                    <?= messege(); ?>
                    <?= success(); ?>

                    <div class="col-md-4 ">
                    <?php echo form_open('staff/reset_password/'.$staff['ic'],['id' => 'form']);?>

                        <div class="form-group">
                        <label for="">New Password : </label>
                        <input type="password" class="form-control passwordtext <?= form_error('pass1') ? 'is-invalid':'' ?>" name="pass1" value="<?php echo set_value('pass1'); ?>" placeholder="New Password">
                        <small class="text-danger"><?php echo form_error('pass1'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="">Comfirm Password : </label>
                        <input type="password" class="form-control passwordtext <?= form_error('pass2') ? 'is-invalid':'' ?>" name="pass2" value="<?php echo set_value('pass2'); ?>" placeholder="Comfirm Password">
                        <small class="text-danger"><?php echo form_error('pass2'); ?></small>
                        </div>

                        <div class="form-group">
                          <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label text" for="customCheck">show password</label>
                          </div>
                        </div>

                        <div class="float-right">
                            <button type=" click" id="submitbtn" class="btn btn-primary">submit</button>
                        </div>
                        

                    </form>
                    </div>

                  
               
                
                </div>
              </div>




              <script>
                    $('#customCheck').change(function(){ //this button
                    var passfield = $('.passwordtext'); //this is attribute
                    
                    if(passfield.attr('type') == "password")
                    {
                      passfield.attr('type','text');
                      //$(this).text('');
                            $('.text').html("hide password");
                    }
                    else
                    {
                      passfield.attr('type','password');
                      //$(this).text('show password');
                            $('.text').html("show password");
                    }
                  });//end click
              </script>