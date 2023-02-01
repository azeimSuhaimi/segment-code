
<div class="card border-primary" style="width: 50%;">

<div class="card-body">
  <h4 class="card-title text-capitalize">edit home pages</h4>

  <?= $this->session->flashdata('messege');?>
  
  <?php echo form_open_multipart('home');?>

      <div class="form-group">
          <label for="title">Title     </label>
          <input type="text" class="form-control" name="title" id="title" placeholder="social media type" value="<?php echo $home['title']; ?>">
          <small class=" text-danger"><?php echo form_error('title'); ?></small>
      </div>

      
      <div class="row">
          
          <div class=" col-lg-6">
              <img class="img-fluid " src="<?= base_url('assets_portfolio/img/'.$home['image']);?>" alt="">
          </div>
          <div class=" col-lg-6">
            <div class="form-group">
                
                <input type="file"  name="image" id="image"  >
                <small class=" text-muted">size 1920 x 1080, type jpg|png|jpeg and recommence black image</small>
                <small class=" text-danger"><?php echo form_error('image'); ?></small>
            </div>
            <a href="<?= base_url('home/delete');?>" class="btn btn-danger delete">delete</a>
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