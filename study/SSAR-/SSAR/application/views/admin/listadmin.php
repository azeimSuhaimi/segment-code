              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">list all admin active</h6>
                </div>
                <div class="card-body">

<?= messege(); ?>

<?= success(); ?>

                    <table id="table_id" class="display table-responsive-lg">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>I.C</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Position</th>
                                <th>role</th>
                                <th>status</th>
                                <th>#</th>
                        
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($admin as $s):?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $s['ic']; ?></td>
                                <td><?= $s['name']; ?></td>
                                <td><?= $this->Department_model->getbyid($s['department'])['name'] ?></td>
                                <td><?= $this->Position_model->getbyid($s['position'])['position'] ?></td>
                                <td><?= $this->Role_model->role_type($s['role'])['role'] ?></td>
                                <td><?= $s['status'] == '1'? 'active':'not active' ?></td>
                                <td><a href="<?= base_url('admin/remove/'.$s['ic'].'/'.$s['id'])?>"  class="btn deletebtn  btn-primary">Delete</a></td>
                            </tr>
                            <?php endforeach; ?>
                            
                            
                        </tbody>
                    </table>

                  
               
                
                </div>
              </div>

            <script>
                $(document).ready(function(){
                    $('#table_id').DataTable();
                });//end function ready
            </script>


<script>
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
              
              </script>