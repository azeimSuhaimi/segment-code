

<div class="card border-primary" style="width: 40%;">

    <div class="card-body">
    <h4 class="card-title">Add New Skills</h4>

    <?= $this->session->flashdata('messege');?>
    
    <?php echo form_open('filters/add'); ?>

        <div class="form-group">
            <label for="filter">filter     </label>
            <input type="text" class="form-control" name="filter" id="filter" placeholder="filter" value="<?php echo set_value('filter'); ?>">
            <small class=" text-danger"><?php echo form_error('filter'); ?></small>
        </div>


        <button type="submit" class="btn btn-primary">submit</button>
        <button type="reset" class="btn btn-warning" >refresh</button>

    </form>

    </div>
</div>