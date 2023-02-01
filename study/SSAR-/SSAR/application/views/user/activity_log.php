              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">list all  activity</h6>
                </div>
                <div class="card-body">

                    <table id="table_id" class="display table-responsive-lg">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>date</th>
                                <th>time</th>
                                <th>activity</th>

                        
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($log as $l):?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= date('d F Y',$l['dates']) ; ?></td>
                                <td><?= $l['timess'] ; ?></td>
                                <td><?= $l['activity'] ?></td>

                          
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


