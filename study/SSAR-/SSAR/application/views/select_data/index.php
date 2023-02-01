              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">list all level</h6>
                </div>
                <div class="card-body">

                    <?= messege(); ?>
                    <?= success(); ?>

                    <a href="<?= base_url('select_data/add')?>" class="btn mb-3  btn-primary">Add</a>

                    <table id="table_id" class="display table-responsive-lg">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>level</th>
                                <th>#</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($levels as $d):?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $d['level']; ?></td>
                                
                                <td><a href="<?= base_url('select_data/remove/'.$d['id'])?>"  class="btn deletebtn  btn-primary">Delete</a></td>
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