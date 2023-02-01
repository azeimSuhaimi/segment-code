
<div class="card border-primary" style="width: 50%;">

<div class="card-body">
  <h4 class="card-title text-capitalize">edit home pages</h4>

  <?= $this->session->flashdata('messege');?>
  
  <?php echo form_open_multipart('about_me');?>

      <div class="form-group">
          <label for="title">Title     </label>
          <input type="text" class="form-control" name="title" id="title" placeholder="title" value="<?php echo $about_me['title']; ?>">
          <small class=" text-danger"><?php echo form_error('title'); ?></small>
      </div>

      <div class="form-group">
          <label for="motto">motto     </label>
          <input type="text" class="form-control" name="motto" id="motto" placeholder="motto" value="<?php echo $about_me['motto']; ?>">
          <small class=" text-danger"><?php echo form_error('motto'); ?></small>
      </div>

      <div class="form-group">
          <label for="phone">phone     </label>
          <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" value="<?php echo $about_me['phone']; ?>">
          <small class=" text-danger"><?php echo form_error('phone'); ?></small>
      </div>

      <div class="form-group">
          <label for="email">email     </label>
          <input type="text" class="form-control" name="email" id="email" placeholder="email" value="<?php echo $about_me['email']; ?>">
          <small class=" text-danger"><?php echo form_error('email'); ?></small>
      </div>

      <div class="form-group">
          <label for="city">city     </label>
          <input type="text" class="form-control" name="city" id="city" placeholder="city" value="<?php echo $about_me['city']; ?>">
          <small class=" text-danger"><?php echo form_error('city'); ?></small>
      </div>

      <div class="form-group">
          <label for="freelance">freelance     </label>
          <input type="text" class="form-control" name="freelance" id="freelance" placeholder="freelance" value="<?php echo $about_me['freelance']; ?>">
          <small class=" text-danger"><?php echo form_error('freelance'); ?></small>
      </div>

      <div class="form-group">
          <label for="type_job">job type list     </label>
          <textarea rows="10" class="form-control" name="type_job" id="type_job" placeholder="type_job" ><?php echo $about_me['type_job']; ?></textarea>
          <small class=" text-danger"><?php echo form_error('type_job'); ?></small>
      </div>

      
      <div class="row">
          
          <div class=" col-lg-6">
              <img class="img-fluid " src="<?= base_url('assets_portfolio/img/'.$about_me['image']);?>" alt="">
          </div>
          <div class=" col-lg-6">
            <div class="form-group">
                
                <input type="file"  name="image" id="image"  >
                <small class=" text-muted">size 600 x 680, type jpg|png|jpeg and recommence black image</small>
                <small class=" text-danger"><?php echo form_error('image'); ?></small>
            </div>
            <a href="<?= base_url('about_me/delete/'.$about_me['id']);?>" class="btn btn-danger delete">delete</a>
          </div>
          
      </div>
      

      <br>



      <button type="submit" class="btn btn-primary">submit</button>
     

  </form>

</div>
</div>


<script>
$(document).ready(function()
{

  $('.delete').click(function(e){

    e.preventDefault();

    const href = $(this).attr('href');

    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes'
    }).then((result) => {
    if (result.isConfirmed) {
        
        document.location.href= href;
        
    }
    });
  });


});//end function ready
</script>