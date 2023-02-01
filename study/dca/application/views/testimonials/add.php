
<h1 class=" text-capitalize">edit testimonial</h1>

<?= $this->session->flashdata('messege');?> 

<div class="card border-primary" style="width: 40%;">
    
        <div class="row">

            

            
            
            <div class=" col-lg-12">
                
                <div class="card-body">

                    

                    
                    <?php echo form_open_multipart('testimonials/add/');?>

                    <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name');?>">
                    <small class=" text-danger"><?php echo form_error('name'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="job">job</label>
                    <input type="text" class="form-control" name="job" id="job" value="<?= set_value('job');?>">
                    <small class=" text-danger"><?php echo form_error('job'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="testimonial">testimonial</label>
                    <input type="text" class="form-control" name="testimonial" id="testimonial" value="<?= set_value('testimonial');?>">
                    <small class=" text-danger"><?php echo form_error('testimonial'); ?></small>
                    </div>

                   



                    <button type="submit"  class="btn btn-success" >submit</button>
                    </form> 
                </div>

                

            </div>
            
        </div>
        
        
        
    </div>