            <!-- Basic Card Example -->
            <div class="card shadow mb-4" id='app'>
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">tahun program skp</h6>
                </div>
                <div class="card-body">

                <?= form_open('skp/list_tahun_skp');?>
                    <div class="form-group">                
                        <div class="col-sm-6">
                            <select  class="form-control" name="tahun_skp">
                                <option value="">pilih tahun skp</option>
                                <?php foreach($tahunid as $tid):?>
                                    <option value="<?= $tid['id']?>"><?= $tid['tahun']?></option>
                                <?php endforeach; ?>
                                
                            </select>
                            <span class="text-danger"><?php echo form_error('tahun_skp'); ?></span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mb-3"><i class="fas fa-search"></i></button>
                </form>


               

                        
                    

                    
                
                </div>
            </div>



