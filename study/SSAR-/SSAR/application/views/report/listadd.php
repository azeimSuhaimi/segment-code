              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">list all report</h6>
                </div>
                <div class="card-body">

                    <?= messege(); ?>
                    <?= success(); ?>

                    <a href="<?= base_url('report/')?>" class="btn mb-3  btn-primary">back</a>

                    <table id="table_id" class="display table-responsive-lg">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>title</th>
                                <th>date send</th>
                                <th>level</th>
                                <th>status</th>
                                <th>comfimation</th>
                                <th>#</th>
                                <th>#</th>
                                <th>#</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($reports as $r):?>


                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $r['title']; ?></td>
                                <td><?= date('d F Y',$r['date_send']) ; ?></td>
                                <td><?= $r['level']; ?></td>
                                <td><?= $r['status'] == 1 ? 'read':'unread'; ?></td>
                                <td><?= $r['comfirmation'] == 1 ? 'comfirm':'uncomfirm'; ?></td>
                                <td><a href="<?= base_url('report/view/'.$r['id'])?>" class="btn  btn-primary">view</a></td>
                                <td><a href="<?= base_url('report/edit/'.$r['id'])?>" class="btn  btn-primary <?= $r['comfirmation'] == 1 ? 'disabled':''; ?>">Edit</a></td>
                                <td><a href="<?= base_url('report/addimage/'.$r['id'])?>" class="btn  btn-primary <?= $r['comfirmation'] == 1 ? 'disabled':''; ?>">add gallery</a></td>
                                
                            
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