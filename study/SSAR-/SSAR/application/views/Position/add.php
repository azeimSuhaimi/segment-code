
<?php if($this->session->flashdata('messege')):?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?= $this->session->flashdata('messege');?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>             
    <?php endif; ?>


<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Add New Position</h5>


    
    <?php echo form_open('position/add', ['id' => 'form']);?>
            
            <input type="text" class="form-control mt-4 <?= form_error('position') ? 'is-invalid':'' ?>" name="position" value="<?php echo set_value('position'); ?>"  placeholder="Position">
            <span class="text-danger"><?php echo form_error('position'); ?></span>                             
        <button type="click" id="submitbtn" class="btn btn-primary mt-4">submit</button>
    </form>

  </div>
</div>