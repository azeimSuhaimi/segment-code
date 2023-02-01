
<?= $this->session->flashdata('messege');?>



<?php if($portfolio):?>
    <?php foreach($portfolio as $s):?>
      <div class="card text-white bg-primary" style="width: 40%;">
     
        <div class="card-body text-uppercase">
          <h1 class="card-title"><?= $s['title'];?></h1>
          <?php $fil = $this->db->get_where('filters', array('id' => $s['filter']))->row_array(); ?>
          <h4 class="card-text"><?= $fil['filter'];?></h4>
          <a href="<?= base_url('portfolio_filter/details/'.$s['id']);?>" class="btn btn-success">details</a>
          
        </div>
      </div>
    <?php endforeach; ?>
<?php else :?>
    <h1>not have portfolio yet</h1>
<?php endif; ?>





<script>
$(document).ready(function()
{

  


});//end function ready
</script>