<template>
    <div class="educationList">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Education Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">education</li>
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
                <h3 class="card-title">Education Table</h3>
                <router-link :to="{name:'eductionadd'}" v-if="educations.length < 4" class="card-tools btn btn-primary"><i class="fa fa-plus-circle"></i> add education</router-link>
              </div>
              <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                 <table class="table table-hover text-nowrap">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">SL NO</th>
                      <th>Name</th>
                      <th>group</th>
                      <th>Board name</th>
                      <th>Result</th>
                      <th>Passing Year</th>
                      <th style="width: 90px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(education,i) in educations" :key="i">
                        <td>{{i+1}}</td>
                        <td>{{ education.name }}</td>
                        <td>{{ education.group }}</td>
                        <td>{{ education.board }}</td>
                        <td>{{ education.result }}</td>
                        <td>{{ education.year }}</td>

                      <td>
                        <router-link :to="`/educationedit/${education.slug}`" class="badge bg-success"><i class="fa fa-edit"></i></router-link>
                        <a class="badge bg-danger" @click="removeeducation(education.slug)"><i class="fa fa-trash"></i></a>
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
  name:'educationList',
 
  computed: {
    educations(){
      return this.$store.getters.education;
    }
  },
  mounted() {
    this.$store.dispatch('educationInfo');
  },
  methods: {
    removeeducation:function(slug){
      this.confirm(()=>{
        axios.get('/education/remove/'+slug).then((response)=>{
        this.$store.dispatch('educationInfo');
        this.$message({
          message: 'education delete success',
          type: 'success'
        });
      });
      });
    }
  },
}
</script>