


 <div class="card">
        
        <div class="row">

            
            <div class=" col-lg-7">
                
                <div class="card-body">
                    <h4 class="card-title">sender : <?= $message_details['name'];?></h4>
                    <h4 class="card-title">subject : <?= $message_details['subject'];?></h4>
                    <h4 class="card-text">date : <?=  date('d F Y', $message_details['time'])?></h4>
                    <h4 class="card-text">message :<br> <?= $message_details['message'];?></h4>
                    <a href="<?= base_url('contact/delete/'.$message_details['id']);?>" class="btn btn-danger delete">delete</a>
                </div>

               
                
            </div>
            
        </div>
        
        
        
    </div>