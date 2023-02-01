





<?= $this->session->flashdata('messege');?> 
                 
    <div class="card">
        
        <div class="row">
            <div class=" col-lg-5">
            <img class="card-img-top img img-responsive " src="<?= base_url('asset/img/profile/'.$user['image']);?>" alt="">
            </div>
            
            <div class=" col-lg-7">
                
                <div class="card-body">
                    <h4 class="card-title">username : <?= $user['username'];?></h4>
                    <h4 class="card-title">name : <?= $user['name'];?></h4>
                    <h4 class="card-text">phone : <?= $user['phone'];?></h4>
                    <h4 class="card-text">email : <?= $user['email'];?></h4>
                    <h4 class="card-text">my birthday : <?= $user['birthday'];?></h4> 
                </div>

                <a href="<?= base_url();?>admin/admin_edit/<?= $user['id'];?>" class="btn btn-success" >edit</a>
                
            </div>
            
        </div>
        
        
        
    </div>




