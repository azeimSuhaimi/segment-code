
<?= messege(); ?>


<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Add New people</h5>


    
    <?php echo form_open('select_data/add_people', ['id' => 'form']);?>
            
            <input type="text" class="form-control mt-4 <?= form_error('people') ? 'is-invalid':'' ?>" name="people" value="<?php echo set_value('people'); ?>"  placeholder="people">
            <span class="text-danger"><?php echo form_error('people'); ?></span>                             
        <button type="click" id="submitbtn" class="btn btn-primary mt-4">add</button>
    </form>

  </div>
</div>