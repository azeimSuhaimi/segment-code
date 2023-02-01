

<div class="row" id="app_tahun">

    <div class=" col-lg-4">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">tahun program skp</h6>
                </div>
                <div class="card-body">

                    
                        <div class="form-group">
                            <div class=" col-s-10 ">
                                
                                <input type="text"  class="form-control" v-bind:class="{is_invalid: tahunerr }" v-model='tahun_skp'   placeholder="masukkan tahun baharu">
                                <span class="text-danger">{{errmsg}}</span>
                            </div>
                        </div>
                        
                        <button @click="inserttahunskp()"  class="btn btn-primary"><i class="fas fa-plus-square"></i></button>
                        <br>
                        <br>

                        <table class="table table-hover table-responsive">
                            <thead  class="thead-dark text-center">
                                <tr>
                                
                                <th scope="col">Tahun</th>
                                <th scope="col"></th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr v-for="row in skp" class=" text-uppercase">
                                    
                                    <td>{{row.tahun}}</td>
                                    <td>
                                        <button @click="removetahunskp(row.id)"  class="btn btn-danger"><i class="fas fa-trash"></i></button>                                    
                                    </td>
                                </tr>
                              
                                    <tr v-if="skp.length <= 0">
                                        <th colspan="3" scope="row">tiada data untuk dipapar</th>
                                        
                                    </tr>

                            </tbody>
                        </table>

                    
                
                </div>
            </div>
    </div>

    <div class=" col-lg-8">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">ketagori program</h6>
                </div>
                <div class="card-body">
                    
                <div class="form-group col-8">
                    
                    <select class="form-control input-lg" v-model="select_tahun" @change="fetchprogram()">
                    <option value="">pilih tahun</option>
                    <option v-for="data in tahun_data" :value="data.id">{{ data.tahun }}</option>
                    </select>
                </div>
 

                <div v-if= "select_tahun" class="card">

                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-capitalize">{{skptitle}}</h6>
                </div>
                    <div class="card-body">
                        
                        <div class="form-group">
                            <div class=" col-sm-12 ">
                                
                                <input type="text" v-model="insert_program" class="form-control"  placeholder="masukkan program baharu">
                                <span class="text-danger">{{errmsgprogram}}</span>
                                
                            </div>
                        </div>
                        <button @click="insertprogram()"  class="btn btn-primary mt-2"><i class="fas fa-plus-square"></i></button>
                        <br>
                        <br>

                        <table class="table table-responsive table-hover table-borderless">
                            <thead class="thead-dark text-center">
                                <tr>
                                
                                <th scope="col">name program</th>
                                <th scope="col"></th>
                                
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="data in program_data">
                                
                                    <td>{{data.program}}</td>
                                    <!--<td><button  class="btn btn-warning"><i class="fas fa-edit"></i></button></td>-->
                                    <td><button @click="removeprogramskp(data.id)"  class="btn btn-danger"><i class="fas fa-trash"></i></button></td>
                                </tr>

                                <tr v-if="program_data.length <= 0">
                                        <th colspan="3" scope="row">tiada data untuk dipapar</th>
                                        
                                </tr>
                                
                                
                            </tbody>
                        </table>
                        

                        
                    </div>
                </div>
                

                </div>
              </div>
    </div>

    

</div>


<script>


let app_tahun = new Vue({
    el:'#app_tahun',
    data:{
        skp:[],
        tahun_skp:'',
        check_skp:[],
        errmsg:'',
        tahunerr:false,
        select_tahun:'',
        tahun_data:'',
        program_data:'',
        status_program: false,
        insert_program:'',
        errmsgprogram:'',
        skptitle:'',




    },
    methods:{
        fetch_tahun_skp:function()
        {
            axios.post('getskp',{
                action:'getall'
            }).then(function (response){ 
                app_tahun.skp = response.data;
                app_tahun.tahun_data = response.data;
            });
        },
        fetch_tahun_skp_title:function()
        {
            axios.post('getskptitle',{
                select_tahun1:app_tahun.select_tahun
            }).then(function (response){ 
                app_tahun.skptitle = response.data['tahun'];
                
            });
        },
        removetahunskp:function(id){

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
                    
                    axios.post('deleteskp',{
                        id1:id
                    }).then(function (response){ 
                        app_tahun.fetch_tahun_skp();
                        app_tahun.fetchprogram();
                        app_tahun.select_tahun = ''
                        Swal.fire({
                            title: 'berjaya',
                            text: "data berjaya dipadam",
                            icon: 'success',
                        });
                    });
                    
                }
            });
            
        },
        removeprogramskp:function(id){

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
                    
                    axios.post('delete_program_skp_byid',{
                        id1:id
                    }).then(function (response){ 
                        app_tahun.fetchprogram();
                        Swal.fire({
                            title: 'berjaya',
                            text: "data berjaya dipadam",
                            icon: 'success',
                        });
                    });
                    
                }
            });

        },
        inserttahunskp:function()
        {
            Swal.fire({
                title: 'adakah anda pasti?',
                text: "periksa data anda!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {

                    //console.log(app_tahun.skp.length + validator.equals('12',app_tahun.skp.length));
                    var i = 0;
                    let status_tahun = true
                    for(i; i < app_tahun.skp.length; i++)
                    {
                        
                        if( validator.equals(app_tahun.tahun_skp, app_tahun.skp[i]['tahun']))
                        {
                            status_tahun = false;
                            break;
                            
                        }
                        
                        
                    }

                    if(!validator.isEmpty(app_tahun.tahun_skp))
                    {
                        if(status_tahun)
                        {
                            axios.post('inserttahunskp',{
                            tahun_skp1:app_tahun.tahun_skp,

                            }).then(function(response){
                                app_tahun.fetch_tahun_skp();
                                app_tahun.tahun_skp = '';
                                app_tahun.errmsg = '';
                                app_tahun.tahunerr = false;
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
                            app_tahun.errmsg = "data dimasukkan sudah ada";
                            app_tahun.tahunerr = true;
                        }

                    }
                    else
                    {
                        app_tahun.errmsg = "tidak boleh tinggal kosong";
                        app_tahun.tahunerr = true;
                        console.log(app_tahun);
                    }

                    
                }
            });
            

        },
        fetchprogram:function(){

            axios.post("fetchprogramid", {
                select_tahun1: app_tahun.select_tahun
            }).then(function(response){
                app_tahun.program_data = response.data;
                app_tahun.fetch_tahun_skp_title();

            }).catch(function(error){
                console.log(error);
            });
        },
        insertprogram:function()
        {
            Swal.fire({
                title: 'adakah anda pasti?',
                text: "periksa data anda!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
                }).then((result) => {
                if (result.isConfirmed) {

                    //console.log(app_tahun.skp.length + validator.equals('12',app_tahun.skp.length));
                    var i = 0;
                    let status_program = true
                    for(i; i < app_tahun.program_data.length; i++)
                    {
                        
                        if( validator.equals(app_tahun.insert_program, app_tahun.program_data[i]['program']))
                        {
                            status_program = false;
                            break;
                            
                        }
                        
                        
                    }

                    if(!validator.isEmpty(app_tahun.insert_program))
                    {
                        if(status_program)
                        {
                            axios.post('insertprogram',{
                                insert_program1:app_tahun.insert_program,
                                select_tahun1:app_tahun.select_tahun,

                            }).then(function(response){
                                app_tahun.fetchprogram();
                                app_tahun.insert_program = '';
                                app_tahun.errmsgprogram = "";
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
                            app_tahun.errmsgprogram = "data dimasukkan sudah ada";
                            
                        }

                    }
                    else
                    {
                        app_tahun.errmsgprogram = "tidak boleh tinggal kosong";
                        
                        console.log(app_tahun);
                    }

                    
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
