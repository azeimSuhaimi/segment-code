<div class="container-fluid">
    
<h3 class="text-gray-800 h3 mb-4">change password</h3>

<div class="row">
    
    <div class="col-lg-6">

    <?= $this->session->flashdata('messege');?>

        <form method="post" action="<?= base_url();?>/admin/admin_pass">
            <div class="form-group">
            <label for="current_pass">current pass     <span class="glyphicon glyphicon glyphicon-"></span></label>
            <input type="password" class="form-control" name="current_pass" id="current_pass" value="<?php echo set_value('current_pass'); ?>">
            <small class="text-danger"><?php echo form_error('current_pass'); ?></small>
            </div>

            <div class="form-group">
            <label for="new_pass1">new pass   1  <span class="glyphicon glyphicon glyphicon-"></span></label>
            <input type="password" class="form-control" name="new_pass1" id="new_pass1" value="<?php echo set_value('new_pass1'); ?>">
            <small class="text-danger"><?php echo form_error('new_pass1'); ?></small>
            </div>

            <div class="form-group">
            <label for="new_pass2">new pass  2   <span class="glyphicon glyphicon glyphicon-"></span></label>
            <input type="password" class="form-control" name="new_pass2" id="new_pass2" value="<?php echo set_value('new_pass2'); ?>">
            <small class="text-danger"><?php echo form_error('new_pass2'); ?></small>
            </div>

            <button type="submit" class="btn btn-primary">change</button>

            
        </form>
        
    </div>
    <div class="col-lg-1">
        
    </div>
    
</div>

</div>