              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">list all report</h6>
                </div>
                <div class="card-body">

                    <?= messege(); ?>
                    <?= success(); ?>

                    <?php if($this->session->userdata('role') == 3):?>
                      
                      <a href="<?= base_url('kj/list/')?>" class="btn mb-3  btn-primary">back</a>

                    <?php endif; ?>

                    <?php if($this->session->userdata('role') == 2):?>
                      <a href="<?= base_url('report/listadd/')?>" class="btn mb-3  btn-primary">back</a>
                    <?php endif; ?>

                    <?php if($this->session->userdata('role') == 1):?>
                      <a href="<?= base_url('admin/')?>" class="btn mb-3  btn-primary">back</a>
                    <?php endif; ?>
                    
                    
                      <div class="float-right">
                            <a  href="<?= base_url('report/print/'.$report['id'])?>" target="_blank" class="btn <?= $report['comfirmation'] == 1 ? '':'disabled' ?> btn-primary">print</a>
                      </div>
                  
                    

                    <?php
                      if($this->session->userdata('role') == 3)
                      {
                        $this->db->set('status', 1);
                        $this->db->where('id', $report['id']);
                        $this->db->update('reports');
                      }
                    ?>

                    

                    <h3>Tajuk : <?= $report['title'] ?></h3>

                    <h3>Tarikh Mula : <?= $report['date_start'] ?></h3>

                    <h3>Tarikh Tamat : <?= $report['date_end'] ?></h3>

                    <h3>masa program: <?= $report['time_program'] ?></h3>

                    <h3>tempat : <?= $report['place'] ?></h3>

                    <h3>peringkat : <?= $report['level'] ?></h3>

                    <h3>kumpulan sasaran : <?= $report['target_people'] ?></h3>

                    <h3>pengenalan</h3>
                    <div>
                      <?= $report['intro'] ?>
                    </div>

                    <h3>objective </h3>

                    <div>
                      <?= $report['objective'] ?>
                    </div>



                    <h3>ringkasan program </h3>

                    <div>
                      <?= $report['summary_program'] ?>
                    </div>

                    <h3>impak </h3>

                    <div>
                      <?= $report['impak'] ?>
                    </div>

                    <br>


                  <div class="row">
                  <div class="col-12">
                  <div class="float-lef">
                    <p>disediakan</p>
                    <p>(...............................)<br>
                        name : <?= $this->Users_model->getbyid($report['id_user'])['name'] ?> <br>
                        jawatan : <?= $this->Position_model->getbyid($report['position'])['position'] ?> <br>
                        tarikh dihantar:  </p>

                    </div>

                    <br>
                   
                    <div class="float-righ">
                      <?php if($report['comfirmation'] == 1):?>
                        <p>disahkan</p>
                        <p>(...............................)<br>
                        name : <?= $id_kj['name'] ?> <br>
                        jawatan : <?= $this->Position_model->getbyid($id_kj['position'])['position'] ?> <br>
                        tarikh disahkan:  </p>


                        <?php else : ?>
                          <p>belum disahkan</p>
                      <?php endif; ?>
                    </div>
                  </div>
                  </div>






                    <h1>gallery</h1>

                    <?php if($gallery):?>
                      <?php $i=1; foreach($gallery as $galle):?>

                        <div class="text-cente">
                          <figure>
                            <img src="<?= base_url('assets/img/gallery/'.$galle['image']); ?>" width="50%" height="50%" class="img-fluid rounded" alt="">
                            <figcaption>gamabr <?= $i++; ?>. <?= $galle['figure'] ?></figcaption>
                          </figure>
                        </div>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <h5>tiada gambar </h5>
                    <?php endif; ?>



                    <?php if($report['comfirmation'] == 2) :?>
                      <?php if($this->session->userdata('role') == 3):?>
                        <a href="<?= base_url('kj/comfirm/'.$report['id'])?>" class="btn deletebtn btn-primary">comfirm</a>
                      <?php endif; ?>
                    <?php endif; ?>

                    <?php if($report['admin_comfirm'] == 2):?>
                      <?php if($this->session->userdata('role') == 1):?>
                        <a href="<?= base_url('admin/comfirm/'.$report['id'])?>" class="btn deletebtn btn-primary">comfirm</a>
                      <?php endif; ?>
                    <?php endif; ?>
                    



                  
               
                
                </div>
              </div>


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