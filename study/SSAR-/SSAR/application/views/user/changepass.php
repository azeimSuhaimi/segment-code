              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">change my password</h6>
                </div>
                <div class="card-body">

                    <?php if($this->session->flashdata('messege')):?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= $this->session->flashdata('messege');?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>             
                    <?php endif; ?>

                    <?php if($this->session->flashdata('success')):?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= $this->session->flashdata('success');?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>             
                    <?php endif; ?>

                    <div class="col-md-4 ">
                    <?php echo form_open('user/changepass',['id' => 'form']);?>

                        <div class="form-group">
                        <label for="">Old Password : </label>
                        <input type="password" class="form-control passwordtext <?= form_error('oldpass') ? 'is-invalid':'' ?>" name="oldpass" value="<?php echo set_value('oldpass'); ?>" placeholder="Old Password">
                        <small class="text-danger"><?php echo form_error('oldpass'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="">New Password : </label>
                        <input type="password" id="pwd" class="form-control passwordtext <?= form_error('pass1') ? 'is-invalid':'' ?>" name="pass1" value="<?php echo set_value('pass1'); ?>" placeholder="New Password">
                        <small class="text-danger"><?php echo form_error('pass1'); ?></small>
                            <div id="pwd_strength_wrap">
                                <div id="passwordDescription">Password not entered</div>
                                <div id="passwordStrength" class="strength0"></div>
                                <div id="pswd_info">
                                        <strong>Strong Password Tips:</strong>
                                        <ul>
                                                <li class="invalid" id="length">At least 6 characters</li>
                                                <li class="invalid" id="pnum">At least one number</li>
                                                <li class="invalid" id="capital">At least one lowercase &amp; one uppercase letter</li>
                                                <li class="invalid" id="spchar">At least one special character</li>
                                        </ul>
                                </div><!-- END pswd_info -->
                            </div><!-- END pwd_strength_wrap -->
                        </div>

                        <div class="form-group">
                        <label for="">Comfirm Password : </label>
                        <input type="password"  class="form-control passwordtext <?= form_error('pass2') ? 'is-invalid':'' ?>" name="pass2" value="<?php echo set_value('pass2'); ?>" placeholder="Comfirm Password">
                        <small class="text-danger"><?php echo form_error('pass2'); ?></small>
                        </div>



                        <div class="form-group">
                          <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label text" for="customCheck">show password</label>
                          </div>
                        </div>

                        <div class="float-right">
                            <button type=" click" id="submitbtn" class="btn btn-primary">Edit</button>
                        </div>
                        

                    </form>
                    </div>

                  
               
                
                </div>
              </div>




<script>
    $(document).ready(function(){
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
    });






                  $("input#pwd").on("focus keyup", function () {
         
        });
         
        $("input#pwd").blur(function () {
                 
        });
        $("input#pwd").on("focus keyup", function () {
                var score = 0;
                var a = $(this).val();
                var desc = new Array();
         
                // strength desc
                desc[0] = "Too short";
            desc[1] = "Weak";
            desc[2] = "Good";
            desc[3] = "Strong";
            desc[4] = "Best";
                 
        });
         
        $("input#pwd").blur(function () {
         
        });
        $("input#pwd").on("focus keyup", function () {
                var score = 0;
                var a = $(this).val();
                var desc = new Array();
         
                // strength desc
                desc[0] = "Too short";
                desc[1] = "Weak";
                desc[2] = "Good";
                desc[3] = "Strong";
                desc[4] = "Best";
                 
                // password length
                if (a.length >= 6) {
                    $("#length").removeClass("invalid").addClass("valid");
                    score++;
                } else {
                    $("#length").removeClass("valid").addClass("invalid");
                }
         
                // at least 1 digit in password
                if (a.match(/\d/)) {
                    $("#pnum").removeClass("invalid").addClass("valid");
                    score++;
                } else {
                    $("#pnum").removeClass("valid").addClass("invalid");
                }
         
                // at least 1 capital & lower letter in password
                if (a.match(/[A-Z]/) && a.match(/[a-z]/)) {
                    $("#capital").removeClass("invalid").addClass("valid");
                    score++;
                } else {
                    $("#capital").removeClass("valid").addClass("invalid");
                }
         
                // at least 1 special character in password {
                if ( a.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) {
                        $("#spchar").removeClass("invalid").addClass("valid");
                        score++;
                } else {
                        $("#spchar").removeClass("valid").addClass("invalid");
                }
         
         
                if(a.length > 0) {
                        //show strength text
                        $("#passwordDescription").text(desc[score]);
                        // show indicator
                        $("#passwordStrength").removeClass().addClass("strength"+score);
                } else {
                        $("#passwordDescription").text("Password not entered");
                        $("#passwordStrength").removeClass().addClass("strength"+score);
                }
        });
         
        $("input#pwd").blur(function () {
         
        });
        $("input#pwd").on("focus keyup", function () {
                var score = 0;
                var a = $(this).val();
                var desc = new Array();
         
                // strength desc
                desc[0] = "Too short";
                desc[1] = "Weak";
                desc[2] = "Good";
                desc[3] = "Strong";
                desc[4] = "Best";
         
                $("#pwd_strength_wrap").fadeIn(400);
                 
                // password length
                if (a.length >= 6) {
                    $("#length").removeClass("invalid").addClass("valid");
                    score++;
                } else {
                    $("#length").removeClass("valid").addClass("invalid");
                }
         
                // at least 1 digit in password
                if (a.match(/\d/)) {
                    $("#pnum").removeClass("invalid").addClass("valid");
                    score++;
                } else {
                    $("#pnum").removeClass("valid").addClass("invalid");
                }
         
                // at least 1 capital & lower letter in password
                if (a.match(/[A-Z]/) && a.match(/[a-z]/)) {
                    $("#capital").removeClass("invalid").addClass("valid");
                    score++;
                } else {
                    $("#capital").removeClass("valid").addClass("invalid");
                }
         
                // at least 1 special character in password {
                if ( a.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) {
                        $("#spchar").removeClass("invalid").addClass("valid");
                        score++;
                } else {
                        $("#spchar").removeClass("valid").addClass("invalid");
                }
         
         
                if(a.length > 0) {
                        //show strength text
                        $("#passwordDescription").text(desc[score]);
                        // show indicator
                        $("#passwordStrength").removeClass().addClass("strength"+score);
                } else {
                        $("#passwordDescription").text("Password not entered");
                        $("#passwordStrength").removeClass().addClass("strength"+score);
                }
        });
         
        $("input#pwd").blur(function () {
                $("#pwd_strength_wrap").fadeOut(400);
        });
              </script>