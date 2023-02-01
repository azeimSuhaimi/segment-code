<a href="<?= base_url('social_media/');?>" class="btn btn-primary">back</a>
<br>
<br>
<div class="card border-primary" style="width: 40%;">

<div class="card-body">
  <h4 class="card-title">edit social media</h4>

  <?= $this->session->flashdata('messege');?>
  
  <?php echo form_open('social_media/edit/'.$social['id']); ?>

      <div class="form-group">
          <label for="title">Title     </label>
          <input type="text" class="form-control" name="title" id="title" placeholder="social media type" value="<?php echo $social['title']; ?>">
          <small class=" text-danger"><?php echo form_error('title'); ?></small>
      </div>

      <div class="form-group">
          <label for="icon">Icon     : <a href="https://icofont.com/icons" target="_blank">icon list</a></label>
          <input type="text" class="form-control" name="icon" id="icon" placeholder="icon for title" value="<?php echo $social['icon']; ?>">
          <small class=" text-danger"><?php echo form_error('icon'); ?></small>
      </div>

      <div class="form-group">
          <label for="url">Url social media     </label>
          <input type="text" class="form-control" name="url" id="url" placeholder="url your social media" value="<?php echo $social['url']; ?>">
          <small class=" text-danger"><?php echo form_error('url'); ?></small>    
      </div>

      <button type="submit" class="btn btn-primary">submit</button>
      <button type="reset" class="btn btn-warning" >refresh</button>

  </form>

</div>
</div>