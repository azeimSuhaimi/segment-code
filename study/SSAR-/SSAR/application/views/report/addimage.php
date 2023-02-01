
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

                    <a href="<?= base_url('report/listadd')?>" class="btn mb-3  btn-primary">back</a>

                    
                    <?php echo form_open_multipart('report/addimage/'.$id,['id' => 'form']);?>

                    <div class="form-group">
                        <label class="custom-file-labe" for="">Choose file </label>
                        <input type="file" class="" name="image" id="">
                        
                    </div>

                    <div class="form-group">
                        <label for="">figure : </label>
                        <input type="text" class="form-control <?= form_error('figure') ? 'is-invalid':'' ?>" name="figure" value="<?php echo set_value('figure'); ?>" placeholder="figure">
                        <small class="text-danger"><?php echo form_error('figure'); ?></small>
                    </div>

                    <button type=" click" id="submitbtn" class="btn btn-primary m-2">Submit</button>
                    </form>

                    <table id="table_id" class="display table-responsive-lg">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>image</th>
                                <th>figure</th>
                                <th>#</th>
                                <th>#</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($gallery as $g):?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td> <img src="<?= base_url('assets/img/gallery/'.$g['image']); ?>" class="img-fluid img-thumbnail" width="200" height="200" alt=""></td>                                
                                <td><?= $g['figure']; ?></td>
                                <td><a href="<?= base_url('report/editimage/'.$g['id'])?>" class="btn  btn-primary">Edit</a></td>
                                <td><a href="<?= base_url('report/deleteimage/'.$g['id']);?>" class="btn deletebtn  btn-primary">delete</a></td>
                            
                            </tr>
                            <?php endforeach; ?>
                            
                            
                        </tbody>
                    </table>

                  
               
                
                </div>
              </div>

              <script>
                $(document).ready(function(){
                    $('#table_id').DataTable();

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
                });//end function ready
            </script>