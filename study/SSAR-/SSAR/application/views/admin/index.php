              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">list all reports</h6>
                </div>
                <div class="card-body">
                    
                    <?= messege(); ?>
                    <?= success(); ?>



                    <table id="table_id" class="display table-responsive-lg">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>title</th>
                                <th>date send</th>
                                <th>level</th>
                                <th>admin comfirm</th>
                                <th>status</th>
                                <th>comfimation</th>
                                <th>#</th>
                                <th>#</th>   
                                <th>#</th>
                                <th>#</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($reports as $r):?>

                                <?php
                                    $user = $this->Users_model->getbyid($r['id_user']);
                                
                                ?>

                                <?php
                                    $user = $this->Users_model->getbyic($user['ic']);
                                    $kj = $this->db->get_where('users', ['role' => 3, 'department' => $user['department'] ])->row_array();
                                ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $r['title']; ?></td>
                                <td><?= date('d F Y',$r['date_send']) ; ?></td>
                                <td><?= $r['level']; ?></td>
                                <td><?= $r['admin_comfirm'] == 1 ? 'comfirm':'uncomfirm'; ?></td>
                                <td><?= $r['status'] == 1 ? 'read':'unread'; ?></td>
                                <td><?= $r['comfirmation'] == 1 ? 'comfirm':'uncomfirm'; ?></td>
                                <td><a href="<?= base_url('report/view/'.$r['id'])?>" class="btn  btn-primary">view</a></td>
                                <td><a href="<?= base_url('report/deletereport/'.$r['id'])?>" class="btn deletebtn  btn-primary">delete</a></td>
                                <td><a href="https://wa.me/+6<?= $user['phone'] ?>" target="_blank" class="btn  btn-primary <?= $user ? '':'disabled'; ?>">whatsapp staff</a></td>
                                <td><a href="https://wa.me/+6<?= $kj['phone'] ?>" target="_blank" class="btn  btn-primary <?= $kj ? '':'disabled'; ?>">whatsapp kj</a></td>
                            
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