

<a href="<?= base_url('portfolio_filter/details/'.$id_port);?>" class="btn btn-primary">back</a>


<?= $this->session->flashdata('messege');?>


<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>add new image</a>

<table class="table table-light table-hover">
    <thead>
        <tr>
            <th>no</th>
            <th>image</th>
            <th>#</th>
        </tr>
    </thead>
    <tbody>
        <?php if($image_details):?>
        <?php $i = 1; foreach($image_details as $imgd):?>
            <tr>
                <td><?= $i++;?></td>
                <td><img src="<?= base_url();?>assets_portfolio/img/portfolio/<?= $imgd['image'];?>" width="100" height="100" class="img-fluid "  alt=""></td>
                <td><a href="<?= base_url('portfolio_filter/gallery_delete/'.$imgd['id'].'/'.$imgd['image'].'/'.$imgd['id_portfolio']);?>" class="btn btn-danger delete">delete</a></td>
            </tr>
            
        <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>




<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">insert gallery</h4>
            </div>

            <?php echo form_open_multipart('portfolio_filter/gallery/'.$id_port);?>
                <div class="modal-body">
                    <input type="hidden"  name="id" id="id" value="<?= $id_port;?>">
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" class="form-control" name="image" id="image">
                        <small class=" text-muted">this is take png, jpg and jpeg only</small>
                        <small class=" text-danger"><?php echo form_error('image'); ?></small>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">insert</button>
                </div>
            </form>
        </div>
    </div>
</div>
