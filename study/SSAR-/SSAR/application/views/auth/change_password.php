

  <div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-lg-7 ">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">change password</h1>

                <h5>for : <?= $this->session->userdata('reset_password');?></h5>

              </div>
              <?= $this->session->flashdata('messege');?>
              <form class="user"  method="post" id="form" action="<?= base_url();?>auth/changepass">
                
                <div class="form-group">
                  <input type="password" id="pwd" class="form-control passwordtext form-control-user" id="password1" name="password1" value="<?= set_value('password1'); ?>"  placeholder="new password">
                  <small class="text-danger"><?php echo form_error('password1'); ?></small>
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
                  <input type="password" class="form-control passwordtext form-control-user" id="password2" name="password2" value="<?= set_value('password2'); ?>"  placeholder="comfirm password">
                  <small class="text-danger"><?php echo form_error('password2'); ?></small>
                </div>

                <div class="form-group">
                          <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label text" for="customCheck">show password</label>
                          </div>
                        </div>
           
                
                <button type="submit" id="submitbtn" class="btn btn-primary btn-user btn-block">
                  change password
                </button>
                <hr>
                
              </form>
              
             
              
            </div>
          </div>
        </div>
      </div>
    </div>

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