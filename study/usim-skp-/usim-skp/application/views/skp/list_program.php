<div class="row" id="app">



    <div class=" col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">ketagori program</h6>
                </div>
                <div class="card-body">
                    
                
                <div class="form-group">
                    
                    <div class="col-sm-6">
                        <select  class="form-control" v-model="tahunid" @change="fetchprogramid()">
                            <option value="">pilih tahun skp</option>
                            <option v-for="data in skpdata" :value="data.id">{{data.tahun}}</option>
                            
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    
                    <div class="col-sm-6">
                        <select  class="form-control" v-model="programid" @change="fetch_list_skp()">
                            <option value="">pilih program</option>
                            <option v-for="data in programdata" :value="data.id">{{data.program}}</option>
                            
                        </select>
                    </div>
                </div>

                <div v-if=(programid) class="card">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary text-capitalize">ketagori program</h6>
                    </div>
                    <div class="card-body">
                        


                        <!-- Button trigger modal -->
                        <button v-on:click="modal_add()"  type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modelId">
                        <i class="fas fa-plus-square"></i>
                        </button>
                        <a  title="print data ini" :href="url" target="_blank"  class="btn btn-primary mb-2"><i class="fas fa-print"></i></a>

                        <table class="table table-responsive table-hover table-borderless">
                            <thead class="thead-dark text-center">
                                <tr>
                                
                                <th scope="col">Anggaran Yang Berkenaan Tajuk Jawatan</th>
                                <th scope="col">Kod Gaji SSM</th>
                                <th scope="col">Kod Skim</th>
                                <th scope="col">Butir - Butir Perubahan</th>
                                <th scope="col">Bilangan Jawatan</th>
                                <th scope="col">#</th>
                                <th scope="col">#</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="data in listskp" class=" text-capitalize text-center">
                                    
                                    <td>{{data.position_title}}</td>
                                    <td>{{data.salary_ssm}}</td>
                                    <td>{{data.skim}}</td>
                                    <td>{{data.detail}}</td>
                                    <td>{{data.position_number}}</td>
                                    <td><button  v-on:click="modal_update(data.id)"   class="btn btn-warning" data-toggle="modal" data-target="#modelId"><i class="fas fa-edit"></i></button></td>
                                    <td><button v-on:click="delete_list_skp_byid(data.id)"  class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                                </tr>

                                <tr v-if="listskp.length <= 0" class=" text-center">
                                        <th colspan="7" scope="row">Tiada Data Untuk Dipapar</th>
                                        
                                </tr>
                               

                                <tr class=" text-capitalize text-center">
                                    <td class=" text-center text " colspan="4"><b>Jumlah Bilangan Jawatan</b> </td>
                                    <td colspan="3">{{total_position_number.position_number}}</td>
                                </tr>
                                
                                
                            </tbody>
                        </table>
                        

                        
                    </div>
                </div>
                

                </div>
              </div>
    </div>

    
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{title}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                            <label for="">Anggaran Yang Berkenaan Tajuk Jawatan</label>
                            <input type="text" class="form-control" v-model='posi_title'>
                            <span class=" text-danger">{{posi_title_err}}</span>
                        
                    </div>

                    <div class="form-group">
                            <label for="">Kod Gaji SSM</label>
                            <input type="text" class="form-control" v-model='salary_ssm'>
                            <span class=" text-danger">{{salary_ssm_err}}</span>
                        
                    </div>

                    <div class="form-group">
                            <label for="">Kod Skim</label>
                            <input type="text" class="form-control" v-model='skim'>
                            <span class=" text-danger">{{skim_err}}</span>
                        
                    </div>

                    <div class="form-group">
                            <label for="">Butir - Butir Perubahan</label>
                            <input type="text" class="form-control" v-model='detail'>
                            <span class=" text-danger">{{detail_err}}</span>
                        
                    </div>

                    <div class="form-group">
                            <label for="">Bilangan Jawatan</label>
                            <input type="number" class="form-control" v-model='position_number'>
                            <span class=" text-danger">{{position_number_err}}</span>
                        
                    </div>
                    
                </div>

                <div class="modal-footer" v-if="btn === true">
                    <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
                    <button type="button" v-on:click="addskp()"  class="btn btn-primary">{{btn_title}}</button>
                </div>
                <div class="modal-footer" v-if="btn === false">
                    <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
                    <button type="button" v-on:click="updateskp(updateid)" class="btn btn-primary">{{btn_title}}</button>
                </div>
                
            </div>
        </div>
    </div>

    

</div>

<script>

let app = new Vue({
    el:'#app',
    data:{
        skpdata:[],
        tahunid:'',

        programdata:[],
        programid:'',

        listskp:[],
        total_position_number:0,

        title:'',
        btn: true,
        input:'',
        btn_title:'',

        posi_title:'',
        detail:'',
        position_number:0,
        skim:'',
        salary_ssm:'',

        posi_title_err:'',
        detail_err:'',
        position_number_err:'',
        skim_err:'',
        salary_ssm_err:'',

        updateid:'',

        url:''

    },
    methods:
    {
        fetch_tahun_skp:function()
        {
            axios.post('getskp',{
                action:'getall'
            }).then(function (response){ 
                app.skpdata = response.data;
                app.programdata = '';
                app.programid = '';
            });
        },
        fetchprogramid:function(){

            axios.post("fetchprogramid", {
                select_tahun1: app.tahunid
            }).then(function(response){
                app.programdata = '';
                app.programid = '';
                app.programdata = response.data;
                
                

            }).catch(function(error){
                console.log(error);
            });
        },
        fetch_list_skp:function(){
            axios.post("fetch_list_skp", {
                programid1: app.programid
            }).then(function(response){
                app.url = "print_list_skp/"+ app.programid;
                app.listskp = response.data;
                app.gettotalpositionnumber();
                
                

            }).catch(function(error){
                console.log(error);
            });
        },
        gettotalpositionnumber:function(){
            axios.post("gettotalpositionnumber", {
                programid1: app.programid
            }).then(function(response){

                app.total_position_number = response.data;
                
                

            }).catch(function(error){
                console.log(error);
            });
        },
        modal_add:function(){
            app.title ='Tambah Senarai S.K.P'
            app.btn=  true
            
            app.btn_title='masukkan'

            app.posi_title=''
            app.detail=''
            app.position_number=''
            app.skim=''
            app.salary_ssm=''

            app.posi_title_err = "";
            app.salary_ssm_err = "";
            app.skim_err = "";
            app.detail_err = "";
            app.position_number_err = "";
        },
        modal_update:function(id){
            app.title ='Kemaskini Senarai S.K.P'
            app.btn=  false
            app.btn_title='kemaskini'
            app.updateid = id

            axios.post("fetch_list_skp_byid", {
                id1: id
            }).then(function(response){

                app.posi_title=response.data.position_title;
                app.detail=response.data.detail;
                app.position_number=response.data.position_number;
                app.skim=response.data.skim;
                app.salary_ssm=response.data.salary_ssm;

                app.posi_title_err = "";
                app.salary_ssm_err = "";
                app.skim_err = "";
                app.detail_err = "";
                app.position_number_err = "";
                

            }).catch(function(error){
                console.log(error);
            });
        },
        addskp:function(){


            Swal.fire({
                title: 'adakah anda pasti?',
                text: "anda tidak boleh undur selepas ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    
                    if(!validator.isEmpty(app.posi_title))
                    {
                        if(!validator.isEmpty(app.salary_ssm))
                        {
                            if(!validator.isEmpty(app.skim))
                            {
                                if(!validator.isEmpty(app.detail))
                                {
                                    if(!validator.isEmpty(app.position_number))
                                    {
                                        axios.post("addskp", {
                                            programid1:app.programid,
                                            posi_title1: app.posi_title,
                                            detail1:app.detail,
                                            position_number1:app.position_number,
                                            skim1:app.skim,
                                            salary_ssm1:app.salary_ssm
                                        }).then(function(response){

                                            app.posi_title=''
                                            app.detail=''
                                            app.position_number=''
                                            app.skim=''
                                            app.salary_ssm=''

                                            app.posi_title_err = "";
                                            app.salary_ssm_err = "";
                                            app.skim_err = "";
                                            app.detail_err = "";
                                            app.position_number_err = "";

                                            app.fetch_list_skp();

                                            Swal.fire({
                                                title: 'berjaya',
                                                text: "data berjaya dimasukkan",
                                                icon: 'success',
                                            });

                                            
                                            

                                        }).catch(function(error){
                                            console.log(error);
                                        });
                                    }
                                    else
                                    {
                                        app.position_number_err = "tidak boleh tinggal kosong";
                                    }
                                }
                                else
                                {
                                    app.detail_err = "tidak boleh tinggal kosong";
                                }
                            }
                            else
                            {
                                app.skim_err = "tidak boleh tinggal kosong";
                            }
                        }
                        else
                        {
                            app.salary_ssm_err = "tidak boleh tinggal kosong";
                        }
                    }
                    else
                    {
                        app.posi_title_err = "tidak boleh tinggal kosong";
                    }
                    
                }
            });


        },
        updateskp:function(id){


            Swal.fire({
                title: 'adakah anda pasti?',
                text: "anda tidak boleh undur selepas ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    
                    if(!validator.isEmpty(app.posi_title))
                    {
                        if(!validator.isEmpty(app.salary_ssm))
                        {
                            if(!validator.isEmpty(app.skim))
                            {
                                if(!validator.isEmpty(app.detail))
                                {
                                    if(!validator.isEmpty(app.position_number))
                                    {
                                        axios.post("updateskp", {
                                            id1:app.updateid,
                                            posi_title1: app.posi_title,
                                            detail1:app.detail,
                                            position_number1:app.position_number,
                                            skim1:app.skim,
                                            salary_ssm1:app.salary_ssm
                                        }).then(function(response){

                                            

                                            app.posi_title_err = "";
                                            app.salary_ssm_err = "";
                                            app.skim_err = "";
                                            app.detail_err = "";
                                            app.position_number_err = "";

                                            app.fetch_list_skp();

                                            Swal.fire({
                                                title: 'berjaya',
                                                text: "data berjaya dikemaskini",
                                                icon: 'success',
                                            });
                                            

                                        }).catch(function(error){
                                            console.log(error);
                                        });
                                    }
                                    else
                                    {
                                        app.position_number_err = "tidak boleh tinggal kosong";
                                    }
                                }
                                else
                                {
                                    app.detail_err = "tidak boleh tinggal kosong";
                                }
                            }
                            else
                            {
                                app.skim_err = "tidak boleh tinggal kosong";
                            }
                        }
                        else
                        {
                            app.salary_ssm_err = "tidak boleh tinggal kosong";
                        }
                    }
                    else
                    {
                        app.posi_title_err = "tidak boleh tinggal kosong";
                    }
                    
                }
            });


        },
        delete_list_skp_byid:function(id){

            Swal.fire({
                title: 'adakah anda pasti?',
                text: "anda tidak boleh undur selepas ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {
                    
                    axios.post('delete_list_skp_byid',{
                        id1:id
                    }).then(function (response){ 
                        app.fetch_list_skp();
                        Swal.fire({
                            title: 'berjaya',
                            text: "data berjaya dipadam",
                            icon: 'success',
                        });
                        
                    });
                    
                }
             });
        
        },
    },
    created:function(){
        this.fetch_tahun_skp();
        //this.tahunerr = false;
        
    }
});

</script>