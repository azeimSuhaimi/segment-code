



              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
                </div>
                <div class="card-body">

                    <?php if($staff['status'] == '1'):?>
                        <a href="<?= base_url('staff/view/'.$ic_id)?>" class="btn  mb-3 btn-primary">back</a>
                        
                    <?php endif; ?>

                <div class="card mb-3">

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

               


                <?php echo form_open_multipart('staff/edit/'.$ic_id,['id' => 'form']);?>
                
                    <div class="row no-gutters">
                        <div class="col-md-4">
                        <img id="blah" src="<?= base_url('assets/img/profile/'.$staff['image'])?>" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            
                        <div class="form-group">
                          <label for="">name : </label>
                          <input type="text" class="form-control <?= form_error('name') ? 'is-invalid':'' ?>" name="name" value="<?=$staff['name'] ?>" >
                          <small class="text-danger"><?php echo form_error('name'); ?></small>
                        </div>

                        <div class="form-group">
                          <label for=""> i.c : </label>
                          <input type="text" class="form-control <?= form_error('ic') ? 'is-invalid':'' ?>" name="ic" value="<?=$staff['ic'] ?>" >
                          <small class="text-danger"><?php echo form_error('ic'); ?></small>
                        </div>



                        <div class="form-group">
                          <label for="">phone : </label>
                          <input type="text" class="form-control <?= form_error('phone') ? 'is-invalid':'' ?>" name="phone" value="<?=$staff['phone'] ?>" >
                          <small class="text-danger"><?php echo form_error('phone'); ?></small>
                        </div>

                        <div class="form-group">
                          <label for="">email : </label>
                          <input type="text" class="form-control <?= form_error('email') ? 'is-invalid':'' ?>" name="email" value="<?=$staff['email'] ?>" >
                          <small class="text-danger"><?php echo form_error('email'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="">Department : </label>
                        <select class="form-control <?= form_error('department') ? 'is-invalid':'' ?>" name="department">
                              <option value=""></option>
                              <?php foreach($dept as $d):?>
                                <option <?= $d['id'] == $staff['department'] ?  'selected': ''?> value="<?= $d['id'] ?>"><?= $d['name'] ?></option>
                              <?php endforeach; ?>
                        </select>
                        <small class="text-danger"><?php echo form_error('department'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="">Position : </label>
                        <select class="form-control <?= form_error('position') ? 'is-invalid':'' ?>" name="position">
                              <option value=""></option>
                              <?php foreach($positionall as $p):?>
                                <option <?= $p['id'] == $staff['position'] ?  'selected': ''?> value="<?= $p['id'] ?>"><?= $p['position'] ?></option>
                              <?php endforeach; ?>
                        </select>
                        <small class="text-danger"><?php echo form_error('position'); ?></small>
                        </div>

                        <div class="form-group">
                          <label for="">image : </label>
                          <input type="file" class="" name="image" onchange="readURL(this);"  accept=".gif,.png,.jpg,.jpeg">
                          
                        </div>
                            
                            
                             
                             <div class="float-right">
                                <button type=" click" id="submitbtn" class="btn btn-primary">update</button>
                             </div>
                            
                            
                        </div>
                        </div>
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