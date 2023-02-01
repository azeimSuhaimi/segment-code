

<a href="<?= base_url('portfolio_filter/');?>" class="btn btn-primary">back</a>

<?= $this->session->flashdata('messege');?>




      <div class="card text-white bg-primary" style="width: 40%;">
      <img src="<?= base_url();?>assets_portfolio/img/portfolio/<?= $s['image'];?>" width="150" height="150" class="img-fluid mt-5 ml-5"  alt="">

        <div class="card-body text-uppercase">
          <h1 class="card-title"><?= $s['title'];?></h1>

          <?php $fil = $this->db->get_where('filters', array('id' => $s['filter']))->row_array(); ?>

          <h4 class="card-text"><?= $fil['filter'];?></h4>
          <h4 class="card-text"><?= $s['category'];?></h4>
          <h4 class="card-text"><?= $s['client'];?></h4>
          <h4 class="card-text"><?= $s['project_date'];?></h4>
          <h4 class="card-text"><?= $s['url'];?></h4>
          <h4 class="card-text"><?= $s['description'];?></h4>

          <a href="<?= base_url('portfolio_filter/edit/'.$s['id']);?>" class="btn btn-success">edit</a>
          <a href="<?= base_url('portfolio_filter/gallery/'.$s['id']);?>" class="btn btn-success">gallery</a>
          <a href="<?= base_url('portfolio_filter/delete/'.$s['id'].'/'.$s['image']);?>" class="btn btn-danger delete">delete</a>
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