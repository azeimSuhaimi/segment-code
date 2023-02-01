
<?= messege(); ?>


<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Add New level</h5>


    
    <?php echo form_open('select_data/add', ['id' => 'form']);?>
            
            <input type="text" class="form-control mt-4 <?= form_error('level') ? 'is-invalid':'' ?>" name="level" value="<?php echo set_value('level'); ?>"  placeholder="level">
            <span class="text-danger"><?php echo form_error('level'); ?></span>                             
        <button type="click" id="submitbtn" class="btn btn-primary mt-4">add</button>
    </form>

  </div>
</div>