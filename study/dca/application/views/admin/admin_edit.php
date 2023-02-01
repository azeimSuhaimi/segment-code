
<h1 class=" text-capitalize">edit profile</h1>

<?= $this->session->flashdata('messege');?> 

<div class="card">
    
        <div class="row">

            

            <div class=" col-lg-5">
            <img class="card-img-top img img-responsive " src="<?= base_url('asset/img/profile/'.$user['image']);?>" alt="">
            </div>
            
            <div class=" col-lg-7">
                
                <div class="card-body">

                    <h2 class="card-title">username : <?= $user['username'];?></h2>

                    
                    <?php echo form_open_multipart('admin/admin_edit/'.$user['id']);?>

                    <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?= $user['name'];?>">
                    <small class=" text-danger"><?php echo form_error('name'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="phone">phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="<?= $user['phone'];?>">
                    <small class=" text-danger"><?php echo form_error('phone'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?= $user['email'];?>">
                    <small class=" text-danger"><?php echo form_error('email'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="birthday">my birthday</label>
                    <input type="date" class="form-control" name="birthday" id="birthday" value="<?= $user['birthday'];?>">
                    <small class=" text-danger"><?php echo form_error('birthday'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" class="form-control" name="image" id="image">
                    <small class=" text-muted">this is take png, jpg and jpeg only</small>
                    <small class=" text-danger"><?php echo form_error('image'); ?></small>
                    </div>

                    <button type="submit"  class="btn btn-success" >edit</button>
                    </form> 
                </div>

                

            </div>
            
        </div>
        
        
        
    </div>