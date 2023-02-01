

<div class="card border-primary" style="width: 40%;">

<div class="card-body">
  <h4 class="card-title">Add New Skills</h4>

  <?= $this->session->flashdata('messege');?>
  
  <?php echo form_open('skills/add'); ?>

      <div class="form-group">
          <label for="skill">Skill     </label>
          <input type="text" class="form-control" name="skill" id="skill" placeholder="skill" value="<?php echo set_value('skill'); ?>">
          <small class=" text-danger"><?php echo form_error('skill'); ?></small>
      </div>

      <div class="form-group">
          <label for="percent">Percent     : </label>
          <input type="text" class="form-control" name="percent" id="percent" placeholder="percent" value="<?php echo set_value('percent'); ?>">
          <small class=" text-danger"><?php echo form_error('percent'); ?></small>
      </div>



      <button type="submit" class="btn btn-primary">submit</button>
      <button type="reset" class="btn btn-warning" >refresh</button>

  </form>

</div>
</div>