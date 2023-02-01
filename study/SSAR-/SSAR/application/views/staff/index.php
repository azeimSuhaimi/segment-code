              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">add new staff</h6>
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

                    <div class="col-md-6 ">
                    <?php echo form_open('staff/',['id' => 'form']);?>

                        <div class="form-group">
                        <label for="">Name : </label>
                        <input type="text" class="form-control <?= form_error('name') ? 'is-invalid':'' ?>" name="name" value="<?php echo set_value('name'); ?>" placeholder="Name">
                        <small class="text-danger"><?php echo form_error('name'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="">I.C : </label>
                        <input type="text" class="form-control <?= form_error('ic') ? 'is-invalid':'' ?>" name="ic" value="<?php echo set_value('ic'); ?>" placeholder="I.C">
                        <small class="text-danger"><?php echo form_error('ic'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="">Phone : </label>
                        <input type="text" class="form-control <?= form_error('phone') ? 'is-invalid':'' ?>" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Phone">
                        <small class="text-danger"><?php echo form_error('phone'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="">Email : </label>
                        <input type="text" class="form-control <?= form_error('email') ? 'is-invalid':'' ?>" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email">
                        <small class="text-danger"><?php echo form_error('email'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="">Department : </label>
                        <select class="form-control <?= form_error('department') ? 'is-invalid':'' ?>" name="department">
                              <option value=""></option>
                              <?php foreach($dept as $d):?>
                                <option <?= $d['id'] == set_value('department') ?  'selected': ''?> value="<?= $d['id'] ?>"><?= $d['name'] ?></option>
                              <?php endforeach; ?>
                        </select>
                        <small class="text-danger"><?php echo form_error('department'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="">Position : </label>
                        <select class="form-control <?= form_error('position') ? 'is-invalid':'' ?>" name="position">
                              <option value=""></option>
                              <?php foreach($positionall as $p):?>
                                <option <?= $p['id'] == set_value('position') ?  'selected': ''?> value="<?= $p['id'] ?>"><?= $p['position'] ?></option>
                              <?php endforeach; ?>
                        </select>
                        <small class="text-danger"><?php echo form_error('position'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="">Role : </label>
                        <select class="form-control <?= form_error('role') ? 'is-invalid':'' ?>" name="role">
                              <option value=""></option>
                              <?php foreach($role as $r):?>
                                <option <?= $r['id'] == set_value('role') ?  'selected': ''?> value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                              <?php endforeach; ?>
                        </select>
                        <small class="text-danger"><?php echo form_error('role'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="">New Password : </label>
                        <input type="password" class="form-control passwordtext <?= form_error('password') ? 'is-invalid':'' ?>" name="password" value="<?php echo set_value('password'); ?>" placeholder="New Password">
                        <small class="text-danger"><?php echo form_error('password'); ?></small>
                        </div>

                        <div class="form-group">
                          <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label text" for="customCheck">show password</label>
                          </div>
                        </div>


                        <div class="float-right">
                            <button type=" click" id="submitbtn" class="btn btn-primary">Submit</button>
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