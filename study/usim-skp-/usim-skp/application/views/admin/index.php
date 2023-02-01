
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">tukar kata laluan </h6>
                </div>
                <div class="card-body">

                    <?php if($this->session->flashdata('messegeerr')):?>
                    <div class="alert alert-danger" role="alert">
                        <?= $this->session->flashdata('messegeerr');?>
                    </div>               
                    <?php endif; ?>

                    <?php if($this->session->flashdata('messegesucc')):?>
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('messegesucc');?>
                    </div>               
                    <?php endif; ?>

                    <?= form_open('admin/');?>
                    <div class=" justify-content-md-center">

                        <div class="form-group">
                            <div class=" col-sm-4 offset-md-4">
                                <label for="">Kata laluan asal</label>
                                <input type="password"  class="form-control" name="password"  value="<?php echo set_value('password'); ?>"     placeholder="masukkan kata laluan asal">
                                <span class="text-danger"><?php echo form_error('password'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class=" col-sm-4 offset-md-4">
                                <label for="">Kata laluan baharu</label>
                                <input type="password"  class="form-control" name="password1"  value="<?php echo set_value('password1'); ?>"     placeholder="masukkan kata laluan baharu">
                                <span class="text-danger"><?php echo form_error('password1'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class=" col-sm-4 offset-md-4">
                                <label for="">Sahkan kata laluan</label>
                                <input type="password"  class="form-control" name="password2"  value="<?php echo set_value('password2'); ?>"     placeholder="sahkan kata laluan baharu">
                                <span class="text-danger"><?php echo form_error('password2'); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class=" col-sm-4 offset-md-4">
                            <button type="submit"   class="btn btn-primary"><i class="fas fa-lock"></i></button>
                            </div>
                        </div>
                        
                        
                    </div>
                    </form>

                </div>
            </div>