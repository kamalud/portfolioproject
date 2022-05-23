<template>
    <div class="biodataList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>biodata Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">biodata</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">biodata Table</h3>
                <router-link :to="{name:'biodataadd'}" v-if="biodatas.length < 1" class="card-tools btn btn-primary"><i class="fa fa-plus-circle"></i> add biodata</router-link>
              </div>
              <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                 <table class="table table-hover text-nowrap">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">SL NO</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Address</th>
                      <th>Birthday</th>
                      <th>Relgism</th>
                      <th>Nationalty</th>
                      <th>Gender</th>
                      <th style="width: 90px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(biodata,i) in biodatas" :key="i">
                        <td>{{i+1}}</td>
                        <td>{{ biodata.name }}</td>
                        <td>{{ biodata.email }}</td>
                        <td>{{ biodata.mobile }}</td>
                        <td>{{ biodata.address }}</td>
                        <td>{{ biodata.birthday}}</td>
                        <td>{{ biodata.relisgim}}</td>
                        <td>{{ biodata.nationality}}</td>
                        <td>{{ biodata.gender}}</td>
                      <td>
                        <router-link :to="`/biodataedit/${biodata.slug}`" class="badge bg-success"><i class="fa fa-edit"></i></router-link>
                        <a class="badge bg-danger" @click="removebiodata(biodata.slug)"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
</template>
<script>
export default {
  name:'BiodataList',
 
  computed: {
    biodatas(){
      return this.$store.getters.biodata;
    }
  },
  mounted() {
    this.$store.dispatch('biodataInfo');
  },
  methods: {
    removebiodata:function(slug){
      this.confirm(()=>{
        axios.get('/biodata/remove/'+slug).then((response)=>{
        this.$store.dispatch('biodataInfo');
        this.$message({
          message: 'biodata delete success',
          type: 'success'
        });
      });
      });
    }
  },
}
</script>