
<?php

report_status('your are not able to edit this anymore','report/listadd', $id);
?>

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">list all report</h6>
                </div>
                <div class="card-body">

                    <?= messege(); ?>
                    <?= success(); ?>

                    <a href="<?= base_url('report/addimage/'.$id)?>" class="btn mb-3  btn-primary">back</a>

                    
                    <?php echo form_open_multipart('report/editimage/'.$id,['id' => 'form']);?>

                    <div class="col-md-4">
                        <img id="blah" src="<?= base_url('assets/img/gallery/'.$gallery['image'])?>" class="card-img" alt="...">
                        </div>

                    <input type="hidden" name="id" value="<?= $id?>">
                    <div class="form-group mt-2">
                        <label class="custom-file-labe" for="">Choose file </label>
                        <input type="file" class="" name="image" onchange="readURL(this);">
                        
                    </div>

                    <div class="form-group">
                        <label for="">figure : </label>
                        <input type="text" class="form-control <?= form_error('figure') ? 'is-invalid':'' ?>" name="figure" value="<?php echo $gallery['figure']; ?>" placeholder="figure">
                        <small class="text-danger"><?php echo form_error('figure'); ?></small>
                    </div>

                    <button type=" click" id="submitbtn" class="btn btn-primary m-2">Submit</button>
                    </form>


                  
               
                
                </div>
              </div>
