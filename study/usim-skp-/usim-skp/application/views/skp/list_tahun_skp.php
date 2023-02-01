
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 text-uppercase">senarai tahun S.K.P: <?= $tahun['tahun'] ?></h1>
            <a  title="print senarai skp ini" href="print_tahun_skp/<?= $tahun['id']; ?>" target="_blank"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print"></i> cetak </a>
          </div>


        <!-- Basic Card Example -->
            <div class="card shadow mb-4" id='app'>
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">tahun program skp</h6>
                </div>
                <div class="card-body">


                    <?php $u= 0; $l = 1;  foreach($program as $pd):?>
                        <br>
                        <br>
                        <table class="table  table-responsive table-hover table-borderless">
                            <thead class="thead-dark text-center">
                                <tr >
                                    <th colspan="6"> <?= strtoupper('program '.$l++.' - '.$pd['program'])  ?></th>
                                </tr>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Anggaran Yang Berkenaan Tajuk Jawatan</th>
                                    <th scope="col">Kod Gaji SSM</th>
                                    <th scope="col">Kod Skim</th>
                                    <th scope="col">Butir - Butir Perubahan</th>
                                    <th scope="col">Bilangan Jawatan</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    $query = $this->db->get_where('list_skp',['program_id' => $pd['id']])->result_array();
                                ?>

                                <?php if($query): ?>

                                    <?php $i = 1; $y=0; foreach($query as $p):?>
                                        <tr  class=" text-capitalize text-center">
                                            <td><?= $i++ ?></td>
                                            <td><?= $p['position_title'] ?></td>
                                            <td><?= $p['salary_ssm'] ?></td>
                                            <td><?= $p['skim'] ?></td>
                                            <td><?= $p['detail'] ?></td>
                                            <td><?= $p['position_number'] ?> <?php $y += $p['position_number'];?></td>
                                            
                                        </tr>

                                    
                                    <?php endforeach; ?>

                                    <?php  $u += $y;?>

                                        <tr class=" text-capitalize text-center">
                                            <td class=" text-center text " colspan="5"><b>Jumlah Bilangan <?= $pd['program'] ?></b> </td>
                                            <td colspan="1"><?= $y; ?></td>
                                        </tr>

                                
                                <?php else: ?>
                                    <tr  class=" text-center">
                                        <th colspan="6" scope="row">Tiada Data Untuk Dipapar</th>
                                        
                                    </tr>
                                <?php endif; ?>

                                
                                
                            </tbody>
                        </table>
                    <?php endforeach; ?>

                    <h4 class=" text-uppercase">jumlah universiti sains islam malaysia(usim) : <b class=" "> <?= $u; ?></b></h4>

                    <p>catatan:
                    <br> 
                    Semua jawatan dalam surat kelulusan perjawatan bagi Universiti Sains Islam Malaysia(USIM)
                    sebelum ini dimansuhkan tarikh kuat kuasa perubahan ini adalah mulai januari 2021.</p>

                    

                </div>
            </div>



