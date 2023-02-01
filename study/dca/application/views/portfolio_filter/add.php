


<h1 class=" text-capitalize">add new portfolio</h1>

<?= $this->session->flashdata('messege');?> 

<div class="card border-primary" style="width: 40%;">
    
        <div class="row">

            

 
            
            <div class=" col-lg-12">
                
                <div class="card-body">

                

                    
                    <?php echo form_open_multipart('portfolio_filter/add');?>

                    <div class="form-group">
                    <label for="title">title</label>
                    <input type="text" class="form-control" name="title" id="title" value="<?= set_value('title');?>">
                    <small class=" text-danger"><?php echo form_error('title'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="filter">filter</label>
                    <select  class="form-control" name="filter" id="filter" >
                        <option value=""></option>
                        <?php if($filters):?>
                            <?php foreach($filters as $f):?>
                                <option value="<?= $f['id'];?>"><?= $f['filter'];?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <small class=" text-danger"><?php echo form_error('filter'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="category">category</label>
                    <input type="text" class="form-control" name="category" id="category" value="<?= set_value('category');?>">
                    <small class=" text-danger"><?php echo form_error('category'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="client">client</label>
                    <input type="text" class="form-control" name="client" id="client" value="<?= set_value('client');?>">
                    <small class=" text-danger"><?php echo form_error('client'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="project_date">project_date</label>
                    <input type="date" class="form-control" name="project_date" id="project_date" value="<?= set_value('project_date');?>">
                    <small class=" text-danger"><?php echo form_error('project_date'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="url">url (optional)</label>
                    <input type="text" class="form-control" name="url" id="url" value="<?= set_value('url');?>">
                    <small class=" text-danger"><?php echo form_error('url'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="description">description</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10"><?= set_value('description');?></textarea>
                    <small class=" text-danger"><?php echo form_error('description'); ?></small>
                    </div>

                    


                    

                    <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" class="form-control" name="image" id="image">
                    <small class=" text-muted">this is take png, jpg and jpeg only</small>
                    <small class=" text-danger"><?php echo form_error('image'); ?></small>
                    </div>

                    <button type="submit"  class="btn btn-success" >submit</button>
                    </form> 
                </div>

                

            </div>
            
        </div>
        
        
        
    </div>