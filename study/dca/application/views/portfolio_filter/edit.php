
<a href="<?= base_url('portfolio_filter/details/'.$s['id']);?>" class="btn btn-primary">back</a>

<h1 class=" text-capitalize">edit portfolio</h1>

<?= $this->session->flashdata('messege');?> 

<div class="card">
    
        <div class="row">

            <div class=" col-lg-7">
                
                <div class="card-body">
              
                    <?php echo form_open_multipart('portfolio_filter/edit/'.$s['id']);?>

                    <div class="form-group">
                    <label for="filter">filter</label>
                    <select  class="form-control" name="filter" id="filter" >
                        <option value=""></option>
                        <?php if($filters):?>
                            <?php foreach($filters as $f):?>
                                <option <?= ($f['id'] == $s['filter'] ? 'selected' : '')?> value="<?= $f['id'];?>" <?= set_select('filter',$f['id']);?>><?= $f['filter'];?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <small class=" text-danger"><?php echo form_error('filter'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="category">category</label>
                    <input type="text" class="form-control" name="category" id="category" value="<?= $s['category'];?>">
                    <small class=" text-danger"><?php echo form_error('category'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="client">client</label>
                    <input type="text" class="form-control" name="client" id="client" value="<?= $s['client'];?>">
                    <small class=" text-danger"><?php echo form_error('client'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="project_date">project_date</label>
                    <input type="date" class="form-control" name="project_date" id="project_date" value="<?= $s['project_date'];?>">
                    <small class=" text-danger"><?php echo form_error('project_date'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="url">url (optional)</label>
                    <input type="text" class="form-control" name="url" id="url" value="<?= $s['url'];?>">
                    <small class=" text-danger"><?php echo form_error('url'); ?></small>
                    </div>

                    <div class="form-group">
                    <label for="description">description</label>
                    <textarea name="description" class="form-control" id="description" cols="30" rows="10"><?= $s['description'];?></textarea>
                    <small class=" text-danger"><?php echo form_error('description'); ?></small>
                    </div>

                    <button type="submit"  class="btn btn-success" >submit</button>
                    </form> 
                </div>

                

            </div>
            
        </div>
        
        
        
    </div>