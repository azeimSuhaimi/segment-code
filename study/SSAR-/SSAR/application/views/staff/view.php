              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">view staff profile</h6>
                </div>
                <div class="card-body">

                <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?= $this->session->flashdata('success');?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>             
                <?php endif; ?>

                <?php if($staff['status'] == '1'):?>
                    <a href="<?= base_url('staff/liststaff')?>" class="btn mb-3  btn-primary">back</a>
                <?php else: ?>
                    <a href="<?= base_url('staff/liststaffdisabled')?>" class="btn  mb-3 btn-primary">back</a>
                <?php endif; ?>

                <div class="card mb-3" >
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="<?= base_url('assets/img/profile/'.$staff['image'])?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase"><?= $this->Role_model->role_type($staff['role'])['role'] ?></h5>

                    
                        <p class="card-text text-uppercase">name : <?=$staff['name'] ?></p>
                        <p class="card-text text-uppercase">i.c :  <?=$staff['ic'] ?></p>
                        
                        <p class="card-text text-uppercase">phone : <?=$staff['phone'] ?></p>
                        <p class="card-text text-uppercase">email : <?=$staff['email'] ?></p>
                        <p class="card-text text-uppercase">department : <?=$dept['name'] ?></p>
                        <p class="card-text text-uppercase">position : <?=$position['position'] ?></p>
                        <p class="card-text text-uppercase">status : <?= $staff['status'] == '1'? 'active':'not active' ?></p>
                        
                        <div class="float-right">
                        <?php if($staff['status'] == '2'):?>
                            
                            <a href="<?= base_url('staff/restoredisabled/'.$staff['ic'])?>" class="btn deletebtn btn-primary">restore</a>
                        <?php else: ?>
                            <a href="<?= base_url('staff/edit/'.$staff['ic'])?>" class="btn  btn-primary">Edit</a>
                            <a href="<?= base_url('staff/reset_password/'.$staff['ic'])?>" class="btn  btn-primary">reset password</a>
                            <a href="<?= base_url('staff/disabled/'.$staff['ic'])?>"  class="btn deletebtn  btn-primary">Disabled</a>
                            
                            <?php if($staff['role'] == '3'):?>
                                <a href="<?= base_url('staff/disabledrole/'.$staff['ic'])?>"  class="btn deletebtn  btn-primary">disabled role</a>
                            <?php else: ?>
                                <a href="<?= base_url('staff/role/'.$staff['ic'])?>"  class="btn deletebtn  btn-primary">change role</a>
                            <?php endif; ?>
                        <?php endif; ?>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                 
                </div>
              </div>


              <script>
              $('.deletebtn').click(function(e){

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
              
              </script>