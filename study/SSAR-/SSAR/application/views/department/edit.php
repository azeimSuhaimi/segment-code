
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
    <h5 class="card-title">Edit Department</h5>


    
    <?php echo form_open('department/edit/'.$dept['id'], ['id' => 'form']);?>
            
            <input type="text" class="form-control mt-4 <?= form_error('name') ? 'is-invalid':'' ?>" name="name" value="<?= $dept['name']?>" placeholder="Department">
            <span class="text-danger"><?php echo form_error('name'); ?></span>                             
        <button type="click" id="submitbtn" class="btn btn-primary mt-4">Edit</button>
    </form>

  </div>
</div>