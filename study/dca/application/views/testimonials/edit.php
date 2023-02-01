
<h1 class=" text-capitalize">edit testimonial</h1>

<?= $this->session->flashdata('messege');?> 

<div class="card">
    
        <div class="row">

            

            <div class=" col-lg-5">
            <img class="card-img-top img img-responsive " src="<?= base_url('assets_portfolio/img/testimonials/'.$testimonial['image']);?>" alt="">
            </div>
            
            <div class=" col-lg-7">
                
                <div class="card-body">

                    

                    
                    <?php echo form_open_multipart('testimonials/edit/'.$testimonial['id']);?>

                    <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?= $testimonial['name'];?>">
                    <small class=" text-danger"><?php echo form_error('name'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="job">job</label>
                    <input type="text" class="form-control" name="job" id="job" value="<?= $testimonial['job'];?>">
                    <small class=" text-danger"><?php echo form_error('job'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="testimonial">testimonial</label>
                    <input type="text" class="form-control" name="testimonial" id="testimonial" value="<?= $testimonial['testimonial'];?>">
                    <small class=" text-danger"><?php echo form_error('testimonial'); ?></small>
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