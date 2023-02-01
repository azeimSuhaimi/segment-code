<a href="<?= base_url('filters/');?>" class="btn btn-primary">back</a>
<br>
<br>
<div class="card border-primary" style="width: 40%;">

<div class="card-body">
  <h4 class="card-title">Edit filters</h4>

  <?= $this->session->flashdata('messege');?>
  
  <?php echo form_open('filters/edit/'.$filters['id']); ?>


      <div class="form-group">
          <label for="filter">filter     : </label>
          <input type="text" class="form-control" name="filter" id="filter" placeholder="filter" value="<?php echo $filters['filter']; ?>">
          <small class=" text-danger"><?php echo form_error('filter'); ?></small>
      </div>



      <button type="submit" class="btn btn-primary">submit</button>
      <button type="reset" class="btn btn-warning" >refresh</button>

  </form>

</div>
</div>