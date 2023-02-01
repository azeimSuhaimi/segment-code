<a href="<?= base_url('skills/');?>" class="btn btn-primary">back</a>
<br>
<br>
<div class="card border-primary" style="width: 40%;">

<div class="card-body">
  <h4 class="card-title">Edit Skills</h4>

  <?= $this->session->flashdata('messege');?>
  
  <?php echo form_open('skills/edit/'.$skill['id']); ?>

  <!--
          <div class="form-group">
          <label for="skill">Skill     </label>
          <input type="text" class="form-control" name="skill" id="skill" placeholder="skill" value="<?php echo $skill['skill']; ?>">
          <small class=" text-danger"><?php echo form_error('skill'); ?></small>
      </div>
  -->


      <div class="form-group">
          <label for="percent">Percent     : </label>
          <input type="text" class="form-control" name="percent" id="percent" placeholder="percent" value="<?php echo $skill['percent']; ?>">
          <small class=" text-danger"><?php echo form_error('percent'); ?></small>
      </div>



      <button type="submit" class="btn btn-primary">submit</button>
      <button type="reset" class="btn btn-warning" >refresh</button>

  </form>

</div>
</div>