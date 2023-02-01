              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
                </div>
                <div class="card-body">

               <?= success(); ?>

                <div class="card mb-3" >
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="<?= base_url('assets/img/profile/'.$accout['image'])?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase"><?= $this->Role_model->role_type($accout['role'])['role'] ?></h5>
                        <p class="card-text text-uppercase">name : <?=$accout['name'] ?></p>
                        <p class="card-text text-uppercase">i.c :  <?=$accout['ic'] ?></p>
                        
                        <p class="card-text text-uppercase">phone : <?=$accout['phone'] ?></p>
                        <p class="card-text text-uppercase">email : <?=$accout['email'] ?></p>
                        <p class="card-text text-uppercase">department : <?=$dept['name'] ?></p>
                        <p class="card-text text-uppercase">position : <?=$position['position'] ?></p>
                        <p class="card-text text-uppercase">status : <?= $accout['status'] == '1'? 'active':'' ?></p>

                        <div class="float-right">
                          <a href="<?= base_url('user/edit')?>" class="btn btn-primary">Edit</a>
                        </div>
                        
                    </div>
                    </div>
                </div>
                </div>
                 
                </div>
              </div>