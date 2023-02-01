
<?= $this->session->flashdata('messege');?>



<?php if($testimonial):?>
    <?php foreach($testimonial as $test):?>
      <div class="card text-white bg-primary" style="width: 40%;">
      
        <img class="img-fluid ml-3 mt-3" width="200" height="200" src="<?= base_url('assets_portfolio/img/testimonials/'.$test['image']);?>" alt="">


        <div class="card-body text-uppercase">
        <p class="card-text">name : <?= $test['name'];?></p>
        <p class="card-text">job : <?= $test['job'];?></p>
          <p class="card-title">testimonial : <br><?= $test['testimonial'];?></p>
          
          
          <a href="<?= base_url('testimonials/edit/'.$test['id']);?>" class="btn btn-success">edit</a>
          <a href="<?= base_url('testimonials/delete/'.$test['id']);?>" class="btn btn-danger delete">delete</a>
        </div>
      </div>
    <?php endforeach; ?>
<?php else :?>
    <h1>not have testimonials yet</h1>
<?php endif; ?>


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