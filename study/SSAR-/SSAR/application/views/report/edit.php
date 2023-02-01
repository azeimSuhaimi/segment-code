

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">add new staff</h6>
                </div>
                <div class="card-body">

                <a href="<?= base_url('report/listadd/')?>" class="btn mb-3  btn-primary">back</a>

                    <?= messege() ?>
                    <?= success() ?>

                    <div class="col-md-12 ">
                    <?php echo form_open('report/edit/'.$id,['id' => 'form']);?>

                        <div class="form-group">
                        <label for="">Tajuk : </label>
                        <input type="text" class="form-control <?= form_error('title') ? 'is-invalid':'' ?>" name="title" value="<?php echo $report['title']; ?>" placeholder="Tajuk">
                        <small class="text-danger"><?php echo form_error('title'); ?></small>
                        </div>

                        <div class="row">
                        <div class=" col-lg-6">
                            <div class="form-group">
                            <label for="">Tarikh Mula: </label>
                            <input type="text" class="form-control date <?= form_error('dates') ? 'is-invalid':'' ?>" name="dates" value="<?php echo $report['date_start']; ?>">
                            <small class="text-danger"><?php echo form_error('dates'); ?></small>
                            </div>
                        </div>

                        <div class=" col-lg-6">
                            <div class="form-group">
                            <label for="">Tarikh tamat : </label>
                            <input type="text" class="form-control date <?= form_error('datee') ? 'is-invalid':'' ?>" name="datee" value="<?php echo $report['date_end']; ?>" >
                            <small class="text-danger"><?php echo form_error('datee'); ?></small>
                            </div>
                        </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="">masa mula: </label>
                                <input type="time" class="form-control <?= form_error('time') ? 'is-invalid':'' ?>" name="time" value="<?php echo $report['time_program']; ?>" placeholder="masa program mula">
                                <small class="text-danger"><?php echo form_error('time'); ?></small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label for="">masa tamat: </label>
                                <input type="time" class="form-control <?= form_error('time_end') ? 'is-invalid':'' ?>" name="time_end" value="<?php echo $report['time_program_end']; ?>" placeholder="masa program tamat">
                                <small class="text-danger"><?php echo form_error('time_end'); ?></small>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                        <label for="">Tempat : </label>
                        <input type="text" class="form-control <?= form_error('place') ? 'is-invalid':'' ?>" name="place" value="<?php echo $report['place']; ?>" placeholder="Tempat program">
                        <small class="text-danger"><?php echo form_error('place'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="">Peringkat : </label>
                        <select class="form-control <?= form_error('level') ? 'is-invalid':'' ?>" name="level">
                              <option value=""></option>
                              
                                <?php foreach($levels as $le):?>
                                    <option <?=  $le['level'] ==  $report['level'] ? 'selected':''?> value="<?= $le['level']  ?>"><?= $le['level']  ?></option>
                                <?php endforeach; ?>
                              
                        </select>
                        <small class="text-danger"><?php echo form_error('level'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="">kumpulan sasaran : </label>

                            <?php foreach($people as $p):?>
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" name="target_people[]"  <?= $p['people'] == $report['target_people'] ? 'checked':''?> value="<?= $p['people'] ?>">
                                    <label class="form-check-label" for=""><?= $p['people'] ?></label>
                                </div>
                            <?php endforeach; ?>

                            <small class="text-danger"><?php echo form_error('target_people[]'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="">bilangan peserta : </label>
                        <input type="text" class="form-control <?= form_error('total_people') ? 'is-invalid':'' ?>" name="total_people" value="<?php echo $report['total_people']; ?>" placeholder="total_people">
                        <small class="text-danger"><?php echo form_error('total_people'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="">Pengenalan : </label>
                        <textarea id="editor1" class="form-control <?= form_error('intro') ? 'is-invalid':'' ?>" id="editor" name="intro"   rows="10"><?php echo $report['intro']; ?></textarea>

                        <small class="text-danger"><?php echo form_error('intro'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="">Objective : </label>
                        <textarea id="editor2" class="form-control <?= form_error('objective') ? 'is-invalid':'' ?>" name="objective"   rows="10"><?php echo $report['objective']; ?></textarea>

                        <small class="text-danger"><?php echo form_error('objective'); ?></small>
                        </div>

                        


                        <div class="form-group">
                        <label for="">Ringkasan program : </label>
                        <textarea id="editor3" class="form-control <?= form_error('summary_program') ? 'is-invalid':'' ?>" name="summary_program"   rows="10"><?php echo $report['summary_program']; ?></textarea>

                        <small class="text-danger"><?php echo form_error('summary_program'); ?></small>
                        </div>

                        <div class="form-group">
                        <label for="">impak program : </label>
                        <textarea id="editor4" class="form-control <?= form_error('impak') ? 'is-invalid':'' ?>" name="impak"   rows="10"><?php echo $report['impak']; ?></textarea>

                        <small class="text-danger"><?= form_error('impak'); ?></small>
                        </div>







                        <div class="float-right">
                            <button type=" click" id="submitbtn" class="btn btn-primary">Submit</button>
                        </div>
                        

                    </form>
                    </div>

                  
               
                
                </div>
              </div>




              <script>



$(document).ready(function() {

    
    $('.date').datepicker({changeMonth: true,changeYear: true, showWeek: true, dateFormat:'dd/mm/yy'});


    

});

</script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor1' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#editor3' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#editor4' ) )
        .catch( error => {
            console.error( error );
        } );
</script>


