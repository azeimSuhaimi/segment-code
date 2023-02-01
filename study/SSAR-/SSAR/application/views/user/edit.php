              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
                </div>
                <div class="card-body">
                  
                <div class="card mb-3">

                <?php if($this->session->flashdata('messege')):?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?= $this->session->flashdata('messege');?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>             
                <?php endif; ?>



                <?php echo form_open_multipart('user/edit',['id' => 'form']);?>
                    <div class="row no-gutters">
                        <div class="col-md-4">
                        <img id="blah" src="<?= base_url('assets/img/profile/'.$accout['image'])?>" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">

                        <?php if($this->session->userdata('role') !== '1'):?>
                            <input type="hidden" class="form-control" name="name" value="<?=$accout['name'] ?>" >
                          <?php else: ?>
                            <div class="form-group">
                              <label for="">name : </label>
                              <input type="text" class="form-control <?= form_error('name') ? 'is-invalid':'' ?>" name="name" value="<?=$accout['name'] ?>" >
                              <small class="text-danger"><?php echo form_error('name'); ?></small>
                            </div>
                          <?php endif; ?>
                          
                        <?php if($this->session->userdata('role') !== '1'):?>
                          <input type="hidden" class="form-control" name="ic" value="<?=$accout['ic'] ?>" >
                        <?php else: ?>
                          <div class="form-group">
                            <label for=""> i.c : </label>
                            <input type="text" class="form-control <?= form_error('ic') ? 'is-invalid':'' ?>" name="ic" value="<?=$accout['ic'] ?>" >
                            <small class="text-danger"><?php echo form_error('ic'); ?></small>
                          </div>
                        <?php endif; ?>
                            


                        

                        <div class="form-group">
                          <label for="">phone : </label>
                          <input type="text" class="form-control <?= form_error('phone') ? 'is-invalid':'' ?>" name="phone" value="<?=$accout['phone'] ?>" >
                          <small class="text-danger"><?php echo form_error('phone'); ?></small>
                        </div>

                        <div class="form-group">
                          <label for="">email : </label>
                          <input type="text" class="form-control <?= form_error('email') ? 'is-invalid':'' ?>" name="email" value="<?=$accout['email'] ?>" >
                          <small class="text-danger"><?php echo form_error('email'); ?></small>
                        </div>

                        <?php if($this->session->userdata('role') !== '1'):?>
                          <input type="hidden" class="form-control" name="department" value="<?=$accout['department'] ?>" >
                        <?php else: ?>
                          <div class="form-group">
                          <label for="">Department : </label>
                          <select class="form-control <?= form_error('department') ? 'is-invalid':'' ?>" name="department">
                                <option value=""></option>
                                <?php foreach($dept as $d):?>
                                  <option <?= $d['id'] == $accout['department'] ?  'selected': ''?> value="<?= $d['id'] ?>"><?= $d['name'] ?></option>
                                <?php endforeach; ?>
                          </select>
                          <small class="text-danger"><?php echo form_error('department'); ?></small>
                          </div>
                        <?php endif; ?>

                        <?php if($this->session->userdata('role') !== '1'):?>
                          <input type="hidden" class="form-control" name="position" value="<?=$accout['position'] ?>" >
                        <?php else: ?>
                          <div class="form-group">
                          <label for="">Position : </label>
                          <select class="form-control <?= form_error('position') ? 'is-invalid':'' ?>" name="position">
                                <option value=""></option>
                                <?php foreach($positionall as $p):?>
                                  <option <?= $p['id'] == $accout['position'] ?  'selected': ''?> value="<?= $p['id'] ?>"><?= $p['position'] ?></option>
                                <?php endforeach; ?>
                          </select>
                          <small class="text-danger"><?php echo form_error('position'); ?></small>
                          </div>
                        <?php endif; ?>

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