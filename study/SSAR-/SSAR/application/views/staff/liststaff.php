              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">list all staff active</h6>
                </div>
                <div class="card-body">

                    <?php if($this->session->flashdata('messege')):?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><?= $this->session->flashdata('messege');?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>             
                    <?php endif; ?>

                    <?php if($this->session->flashdata('success')):?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= $this->session->flashdata('success');?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>             
                    <?php endif; ?>

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
                                <th>#</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($staff as $s):?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $s['ic']; ?></td>
                                <td><?= $s['name']; ?></td>
                                <td><?= $this->Department_model->getbyid($s['department'])['name'] ?></td>
                                <td><?= $this->Position_model->getbyid($s['position'])['position'] ?></td>
                                <td><?= $this->Role_model->role_type($s['role'])['role'] ?></td>
                                <td><?= $s['status'] == '1'? 'active':'not active' ?></td>
                                
                                <td>
                                    <?php echo form_open('staff/view/'.$s['ic']);?>
                                        
                                        <button type="submit" class="btn btn-primary">View</button>
                                    </form>
                                </td>
                                <td><a href="<?= base_url('staff/remove/'.$s['ic'].'/'.$s['id'])?>" class="btn deletebtn  btn-primary">delete</a></td>
                                <td><a href="https://wa.me/+6<?= $s['phone'] ?>" target="_blank" class="btn  btn-primary ">whatsapp </a></td>
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