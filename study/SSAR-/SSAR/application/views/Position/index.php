              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">list all department</h6>
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

                    <a href="<?= base_url('position/add')?>" class="btn mb-3  btn-primary">Add</a>

                    <table id="table_id" class="display table-responsive-lg">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Positions</th>
                                <th>#</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($positionall as $d):?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $d['position']; ?></td>
                                <td><a href="<?= base_url('position/edit/'.$d['id'])?>" class="btn  btn-primary">Edit</a></td>
                                <td>
                                    <?php if($d['status'] == '2'):?>
                                        <a href="<?= base_url('position/restoredisabled/'.$d['id'])?>" class="btn deletebtn  btn-secondary">restore</a>
                                    <?php else: ?>
                                        <a href="<?= base_url('position/disabled/'.$d['id'])?>"  class="btn deletebtn  btn-danger">Delete</a>
                                    <?php endif; ?>
                                </td>
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