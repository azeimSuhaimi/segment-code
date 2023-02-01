
<?= $this->session->flashdata('messege');?>


<?php if($social):?>

    <?php foreach($social as $s):?>

      <div class="card text-white bg-primary" style="width: 40%;">

        <div class="card-body text-uppercase">
          <h1 class="card-title"><?= $s['title'];?></h1>
          <h3 class="card-text"><i class="<?= $s['icon'];?>"></i></h3>
          <h4 class="card-text"><?= $s['url'];?></h4>
          <a href="<?= base_url('social_media/edit/'.$s['id']);?>" class="btn btn-success">edit</a>
          <a href="<?= base_url('social_media/delete/'.$s['id']);?>" class="btn btn-danger delete">delete</a>
        </div>
      </div>
    <?php endforeach; ?>
  
<?php else :?>
    <h1>not have social media yet</h1>
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